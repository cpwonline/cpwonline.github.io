//Fondo aleatorio
	function fondo_ale(){
		var azar = Math.random()*255;
		var valor = Math.round(azar);
		document.querySelector('#cpwonline #men_unaweb').style.color = "hsla(" + valor + ", 50%, 50%, 1)";
		document.querySelector('#cpwonline .f_1').style.background = "hsla(" + valor + ", 50%, 20%, 1)";
		document.querySelector('#cpwonline .art_1').style.background = "hsla(" + valor + ", 50%, 70%, 1)";
	}
//Ampliación del plan
	function ver_plan(n){
		switch(n){
			case "0":
				$('#cpwonline #mod_plan1').css('display', 'block');
				break;
			case "1":
				$('#cpwonline #mod_plan2').css('display', 'block');
				break;
			case "2":
				$('#cpwonline #mod_plan3').css('display', 'block');
				break;
			case "3":
				$('#cpwonline #mod_plan4').css('display', 'block');
				break;
		}
	}
//Actualización de la moneda
	function cambia_moneda(){
		var moneda = document.querySelector('#s_moneda').value;
		var tipo = "varios";
		//Tiempo de espera
			document.querySelector('#cpwonline .ult1').innerHTML = "Espere";
			document.querySelector('#cpwonline .ult2').innerHTML = "Espere";
			document.querySelector('#cpwonline .ult3').innerHTML = "Espere";
			document.querySelector('#cpwonline .ult4').innerHTML = "Espere";
		//Llamada AJAX
			$.post("enlaces/actualizar.php", {o_moneda:moneda, tipo:tipo},function(r){
				$("#cpwonline div.actualizar_precio").html(r);
			});
	}
//Función de la notificación emergente
	function mov(){
		$('#cpwonline div.espera').css('right', '-50%');
	}

$(document).ready(function(){
	//Animación 
		//Dispocisión del menú a la derecha desde el inicio
			var nav_menu = "-"+$('#cpwonline header.cabecera nav.menu').css('width');
			$('#cpwonline header.cabecera nav.menu').css('right', nav_menu);
			//alert($('#cpwonline').css('width'));
		//Funciones de traer quitar el menú responsive
			//Click en la X
				$('#cpwonline .nav_icon').click(function(e){
					var nav_menu = "-"+$('#cpwonline header.cabecera nav.menu').css('width');
					if($('#cpwonline header.cabecera nav.menu').css('right') == '0px')
						$('#cpwonline header.cabecera nav.menu').css('right', nav_menu);
					else
						$('#cpwonline header.cabecera nav.menu').css('right', '0px');
				});
				$('#cpwonline a.cerrar_nav').click(function(e){
					var nav_menu = "-"+$('#cpwonline header.cabecera nav.menu').css('width');
					if($('#cpwonline header.cabecera nav.menu').css('right') == '0px')
						$('#cpwonline header.cabecera nav.menu').css('right', nav_menu);
					else
						$('#cpwonline header.cabecera nav.menu').css('right', '0px');
				});
			//Click en el NAV
				$('#cpwonline header.cabecera nav.menu').click(function(e){
					var nav_menu = "-"+$('#cpwonline header.cabecera nav.menu').css('width');
					if($('#cpwonline header.cabecera nav.menu').css('right') == '0px')
						$('#cpwonline header.cabecera nav.menu').css('right', nav_menu);
					else
						$('#cpwonline header.cabecera nav.menu').css('right', '0px');
				});
	//Pregunta
		$("#cpwonline section.pregunta a[tag='ordenar']").click(function(){
			$("#cpwonline section.ordenar").css("display", "block");
			$("#cpwonline section.contactar").css("display", "none");
		});
		$("#cpwonline section.pregunta a[tag='contactar']").click(function(){
			$("#cpwonline section.contactar").css("display", "block");
			$("#cpwonline section.ordenar").css("display", "none");
		});
	//Sesión
		//Iniciar
			$("#cpwonline section.login a[tag='sesion_iniciar']").click(function(){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html("Espere | CPW Online");
				//Datos
					var o_usuario = $('#cpwonline section.login input[name="o_usuario"]').val();
					var o_clave = $('#cpwonline section.login input[name="o_clave"]').val();
					var contador = $('#cpwonline input[name="contador"]').val();
					var tipo = "iniciar";
					$('#cpwonline input[name="contador"]').val(contador*1+1);
				//Llamada AJAX
					$.post('../enlaces/sesion.php', {o_usuario:o_usuario, o_clave:o_clave, contador:contador, tipo:tipo}, function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
		//Cerrar
			$("#cpwonline a[tag='sesion_cerrar']").click(function(){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html("Espere | CPW Online");
				//Datos
					var tipo = "cerrar";
				//Llamada AJAX
					$.post('../enlaces/sesion.php', {tipo:tipo}, function(r){
						$('#cpwonline div.espera').html(r);
						var retrasar = setTimeout(mov, 3000);
					});
			});
	//Actualizar
		//General
			$('#cpwonline i.img_col.actualizar').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Recolección de datos
					var tipo = $(this).attr("tag");
				//Llamada AJAX
					$.post("../enlaces/actualizar.php", {tipo:tipo},function(r){
						$("#cpwonline div.tabla_gen."+tipo).html(r)
						$('#cpwonline div.espera').html("Listo.");
						var retrasar = setTimeout(mov, 3000);
					});
			});
});
