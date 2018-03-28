function pago_subir(){
	$('#cpwonline a.subir_imagen_pago').click();
}
function pago_eliminar(){
	$('#cpwonline a.eliminar_pago').click();
}

function mov(){
	$('#cpwonline div.espera').css('right', '-50%');
}
function lista_menus(){
	lista = new Array('1', '2', '3', '4', '5');
	return lista;
}
/*Guardado de la imagen del pago*/
	function iniciar(pa_id){
		id = pa_id;
		cajadatos=document.querySelector('#cpwonline div.cam[tag="'+pa_id+'"]');
		var archivos=document.querySelector('#cpwonline input[tag="pa_imagen_'+pa_id+'"]');
		archivos.addEventListener('change', subir, false);
	}
	function subir(e){
		var archivos=e.target.files;
		var archivo=archivos[0];
		var datos=new FormData();
		datos.append('archivo',archivo);
		datos.append('pa_id',id);
		var url="../enlaces/imagen_pago.php";
		var solicitud=new XMLHttpRequest();
		var xmlupload=solicitud.upload;
		xmlupload.addEventListener('loadstart',comenzar,false);
		xmlupload.addEventListener('progress',estado,false);
		xmlupload.addEventListener('load',mostrar,false);
		solicitud.open("POST", url, true);
		solicitud.send(datos);
	}
	function comenzar(){
		cajadatos.innerHTML='<progress class="pro_gen" value="0" max="100">0%</progress>';
	}
	function estado(e){
		if(e.lengthComputable){
			var por=parseInt(e.loaded/e.total*100);
			var barraprogreso=cajadatos.querySelector("progress");
			barraprogreso.value=por;
			barraprogreso.innerHTML=por+'%';
		}
	}
	function mostrar(e){
		cajadatos.innerHTML='Imagen guardada';
	}
/*fin Guardado de la imagen del pago*/

$(document).ready(function(){
	//Pedida de los menus
		lista = new Array(5);
		lista = lista_menus();
		
		//Función click de los menus de la cabecera
			$('#cpwonline section.perfil ul.arriba li').click(function(e){
				var estoy = $(this).attr("tag");
				for(var a = 0; a < 5; a++){
					if(lista[a] === estoy){
						$('#cpwonline section.perfil section.abajo article[tag="'+lista[a]+'"]').css("display", "block");
						$('#cpwonline section.perfil ul.arriba li[tag="'+lista[a]+'"]').css("border-bottom", "2px solid #fff");
						
					}else{
						$('#cpwonline section.perfil section.abajo article[tag="'+lista[a]+'"]').css("display", "none");
						if(a == 0)
							$('#cpwonline section.perfil ul.arriba li[tag="'+lista[a]+'"]').css("border-bottom", "2px solid #009bd0");
						if(a == 1)
							$('#cpwonline section.perfil ul.arriba li[tag="'+lista[a]+'"]').css("border-bottom", "2px solid #00ace0");
						if(a == 2)
							$('#cpwonline section.perfil ul.arriba li[tag="'+lista[a]+'"]').css("border-bottom", "2px solid #00bdf0");
						if(a == 3)
							$('#cpwonline section.perfil ul.arriba li[tag="'+lista[a]+'"]').css("border-bottom", "2px solid #11cef1");
						if(a == 4)
							$('#cpwonline section.perfil ul.arriba li[tag="'+lista[a]+'"]').css("border-bottom", "2px solid #22dff2");
					}
				}
			});
			$('#cpwonline section.perfil ul.arriba li[tag="1"]').click();
			
	//Reportes//
		//Pagos
			$('#cpwonline a[tag="reportar_pago"]').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var pa_cantidad = $('#cpwonline input[name="pa_cantidad"]').val();
					var pa_moneda = $('#cpwonline select[name="pa_moneda"]').val();
					var pa_metodo = $('#cpwonline select[name="pa_metodo"]').val();
					var tipo = "pago";
				//Llamada AJAX
					$.post("../enlaces/reportes.php", {pa_cantidad:pa_cantidad, pa_moneda:pa_moneda, tipo:tipo, pa_metodo:pa_metodo},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Estado a oficial
			$('#cpwonline a[tag="reportar_pagina_oficial"]').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var tipo = "estado_pagina";
				//Llamada AJAX
					$.post("../enlaces/reportes.php", {tipo:tipo},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Cambio de clave
			$('#cpwonline a[tag="reportar_cambio_clave"]').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var o_clave = $('#cpwonline input[name="o_clave"]').val();
					var o_clave_nueva = $('#cpwonline input[name="o_clave_nueva"]').val();
					var o_clave_nueva_rep = $('#cpwonline input[name="o_clave_nueva_rep"]').val();
					var tipo = "cambio_clave";
				//Llamada AJAX
					$.post("../enlaces/reportes.php", {o_clave:o_clave, o_clave_nueva:o_clave_nueva, o_clave_nueva_rep:o_clave_nueva_rep, tipo:tipo},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Datos oficiales
			$('#cpwonline a[tag="reportar_do"]').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var do_usuario = $('#cpwonline input[name="do_usuario"]').val();
					var do_dominio = $('#cpwonline input[name="do_dominio"]').val();
					var do_ciclo = $('#cpwonline input[name="do_ciclo"]').val();
					var do_estado_pagina = $('#cpwonline select[name="do_estado_pagina"]').val();
					var do_plan = $('#cpwonline select[name="do_plan"]').val();
					var tipo = "datos_oficiales";
				//Llamada AJAX
					$.post("../enlaces/reportes.php", {do_usuario:do_usuario, do_dominio:do_dominio, do_ciclo:do_ciclo, do_plan:do_plan, do_estado_pagina:do_estado_pagina, tipo:tipo},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Listo de una orden
			$('#cpwonline a.reportar_o_listo').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var o_id = $(this).attr('tag');
					var tipo = "o_listo";
				//Llamada AJAX
					$.post("../enlaces/reportes.php", {o_id:o_id, tipo:tipo},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Aprobación de un pago
			$('#cpwonline a[tag="reportar_aprobacion_pago"]').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var pa_id = $('#cpwonline input[name="pa_id"]').val();
					var pa_comentarios = $('#cpwonline input[name="pa_comentarios"]').val();
					var tipo = "pa_aprobado";
				//Llamada AJAX
					$.post("../enlaces/reportes.php", {pa_id:pa_id, pa_comentarios:pa_comentarios, tipo:tipo},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Información
			$('#cpwonline a[tag="reportar_informacion"]').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var iu_titulo = $('#cpwonline input[name="iu_titulo"]').val();
					var iu_contenido = $('#cpwonline textarea[name="iu_contenido"]').val();
					var tipo = "informacion";
				//Llamada AJAX
					$.post("../enlaces/reportes.php", {iu_titulo:iu_titulo, iu_contenido:iu_contenido, tipo:tipo},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
	//Click al boton de subir imagen de pago
		$('#cpwonline a.subir_imagen_pago').click(function(e){
				var pa_id = $(this).attr('tag');
				$('#cpwonline input[tag="pa_imagen_'+pa_id+'"]').click();
				iniciar(pa_id);
		});
	//Eliminar//
		//Pagos
			$('#cpwonline a.eliminar_pago').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var pa_id = $(this).attr('tag');
					var pa_imagen = $("#cpwonline section.perfil i."+pa_id).attr('tag');
					var tipo = "pago";
				//Llamada AJAX
					$.post("../enlaces/eliminar.php", {pa_id:pa_id, tipo:tipo, pa_imagen:pa_imagen},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Datos oficiales
			$('#cpwonline a.eliminar_do').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var do_id = $(this).attr('tag');
					var tipo = "datos_oficiales";
				//Llamada AJAX
					$.post("../enlaces/eliminar.php", {do_id:do_id, tipo:tipo},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Informaciones
			$('#cpwonline a.eliminar_iu').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var iu_id = $(this).attr('tag');
					var tipo = "informacion_u";
				//Llamada AJAX
					$.post("../enlaces/eliminar.php", {iu_id:iu_id, tipo:tipo},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Orden
			$('#cpwonline a.eliminar_o').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var o_id = $(this).attr('tag');
					var tipo = "orden";
				//Llamada AJAX
					$.post("../enlaces/eliminar.php", {o_id:o_id, tipo:tipo},function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
});










