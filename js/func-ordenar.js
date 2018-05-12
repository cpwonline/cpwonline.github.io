//Auto ajuste del plan y modelo por GET
	function escoge_modelo(modelo){
		/*	PRUEBA DE ELEGIR EL MODELO CON EXPRESIONES REGULARES Y FUNCIONES COMPLEJAS
			modelos = new Array('A17-1','A17-2','A17-3','A17-4','A17-5','A18-1','A18-2');
			var mod = modelos[modelo-1];
			alert("este es mod: "+mod);
			var reemplazo_linea = linea.replace(/modelo/g , " selected>"+mod);
			return reemplazo_linea;
			var linea = '<select name="o_modelo"><option value="A17-1">A17-1</option><option value="A17-2">A17-2</option><option value="A17-3">A17-3</option><option value="A17-4">A17-4</option><option value="A17-5">A17-5</option><option value="A18-1">A18-1</option><option value="A18-2">A18-2</option></select>';
		*/
		var dir2 = "";
		switch(modelo){
			case "1":
				dir2 = '<select name="o_modelo"><option value="A17-1" selected>A17-1</option><option value="A17-2">A17-2</option><option value="A17-3">A17-3</option><option value="A17-4">A17-4</option><option value="A17-5">A17-5</option><option value="A18-1">A18-1</option><option value="A18-2">A18-2</option></select>';
			break;
			case "2":
				dir2 = '<select name="o_modelo"><option value="A17-1">A17-1</option><option value="A17-2" selected>A17-2</option><option value="A17-3">A17-3</option><option value="A17-4">A17-4</option><option value="A17-5">A17-5</option><option value="A18-1">A18-1</option><option value="A18-2">A18-2</option></select>';
			break;
			case "3":
				dir2 = '<select name="o_modelo"><option value="A17-1">A17-1</option><option value="A17-2">A17-2</option><option value="A17-3" selected>A17-3</option><option value="A17-4">A17-4</option><option value="A17-5">A17-5</option><option value="A18-1">A18-1</option><option value="A18-2">A18-2</option></select>';
			break;
			case "4":
				dir2 = '<select name="o_modelo"><option value="A17-1">A17-1</option><option value="A17-2">A17-2</option><option value="A17-3">A17-3</option><option value="A17-4" selected>A17-4</option><option value="A17-5">A17-5</option><option value="A18-1">A18-1</option><option value="A18-2">A18-2</option></select>';
			break;
			case "5":
				dir2 = '<select name="o_modelo"><option value="A17-1">A17-1</option><option value="A17-2">A17-2</option><option value="A17-3">A17-3</option><option value="A17-4">A17-4</option><option value="A17-5" selected>A17-5</option><option value="A18-1">A18-1</option><option value="A18-2">A18-2</option></select>';
			break;
			case "6":
				dir2 = '<select name="o_modelo"><option value="A17-1">A17-1</option><option value="A17-2">A17-2</option><option value="A17-3">A17-3</option><option value="A17-4">A17-4</option><option value="A17-5">A17-5</option><option value="A18-1" selected>A18-1</option><option value="A18-2">A18-2</option></select>';
			break;
			case "7":
				dir2 = '<select name="o_modelo"><option value="A17-1">A17-1</option><option value="A17-2">A17-2</option><option value="A17-3">A17-3</option><option value="A17-4">A17-4</option><option value="A17-5">A17-5</option><option value="A18-1">A18-1</option><option value="A18-2" selected>A18-2</option></select>';
			break;
		}
		return dir2;
	}
	function seleccionar(plan, modelo){
		var dir="";
		if(plan=="Economic"){
			dir = '<select name="o_plan"><option value="Economic" selected>Economic</option><option value="Deluxe">Deluxe</option><option value="Ultimate">Ultimate</option><option value="Super-Economic">Super-Economic</option></select>';
		}
		if(plan=="Deluxe"){
			dir = '<select name="o_plan"><option value="Economic">Economic</option><option value="Deluxe" selected>Deluxe</option><option value="Ultimate">Ultimate</option><option value="Super-Economic">Super-Economic</option></select>';
		}
		if(plan=="Ultimate"){
			dir = '<select name="o_plan"><option value="Economic">Economic</option><option value="Deluxe" selected>Deluxe</option><option value="Ultimate" selected>Ultimate</option><option value="Super-Economic">Super-Economic</option></select>';
		}
		if(plan=="Super-Economic"){
			dir = '<select name="o_plan"><option value="Economic">Economic</option><option value="Deluxe">Deluxe</option><option value="Ultimate">Ultimate</option><option value="Super-Economic" selected>Super-Economic</option></select>';
		}
		document.querySelector('#cpwonline div[tag="cont_select_o_plan"]').innerHTML = dir;
		document.querySelector('#cpwonline div[tag="cont_select_o_modelo"]').innerHTML = escoge_modelo(modelo);
	}
$(document).ready(function(){
	//Actualización del precio//
		//Moneda
			$("#cpwonline select[name='o_moneda']").change(function(e){
				e.preventDefault();
				//Animación
					$('#cpwonline input[name="o_precio"]').val('Espere | CPW Online');
				//Recolección de datos
					var o_plan = $("#cpwonline select[name='o_plan']").val();
					var o_moneda = $("#cpwonline select[name='o_moneda']").val();
					var tipo = "uno";
				//Llamada AJAX
					$.post("../enlaces/actualizar.php", {o_plan:o_plan, o_moneda:o_moneda, tipo:tipo},function(r){
						$("#cpwonline input[name='o_precio']").val(r);
					});
			});
		//Plan
			$("#cpwonline select[name='o_plan']").change(function(e){
				e.preventDefault();
				//Animación
					$('#cpwonline input[name="o_precio"]').val('Espere | CPW Online');
				//Recolección de datos
					var o_plan = $("#cpwonline select[name='o_plan']").val();
					var o_moneda = $("#cpwonline select[name='o_moneda']").val();
					var tipo = "uno";
				//Llamada AJAX
					$.post("../enlaces/actualizar.php", {o_plan:o_plan, o_moneda:o_moneda, tipo:tipo},function(r){
						$("#cpwonline input[name='o_precio']").val(r);
					});
			});
		//Actualizar
			$("#cpwonline a[tag='o_actualizar_precio']").click(function(e){
				$("#cpwonline select[name='o_plan']").change();
			});
	//Ordenar o contactar//
		//Ordenar
			$('#cpwonline a[tag="o_enviar"]').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Espere | <span>CPW Online</span>');
				//Datos
					var o_titulo = $("#cpwonline input[name='o_titulo']").val();
					var o_dominio_1 = $("#cpwonline input[name='o_dominio_1']").val();
					var o_dominio_2 = $("#cpwonline input[name='o_dominio_2']").val();
					var o_dominio_3 = $("#cpwonline input[name='o_dominio_3']").val();
					var o_nya = $("#cpwonline input[name='o_nya']").val();
					var o_cedula = $("#cpwonline input[name='o_cedula']").val();
					var o_pais = $("#cpwonline input[name='o_pais']").val();
					var o_estado = $("#cpwonline input[name='o_estado']").val();
					var o_ciudad = $("#cpwonline input[name='o_ciudad']").val();
					var o_direccion = $("#cpwonline input[name='o_direccion']").val();
					var o_email = $("#cpwonline input[name='o_email']").val();
					var o_tel = $("#cpwonline input[name='o_tel']").val();
					var o_plan = $("#cpwonline select[name='o_plan']").val();
					var o_modelo = $("#cpwonline select[name='o_modelo']").val();
					var o_contenidos = $("#cpwonline textarea[name='o_contenidos']").val();
					var o_moneda = $("#cpwonline select[name='o_moneda']").val();
					var o_precio = $("#cpwonline input[name='o_precio']").val();
					var tipo = "ordenar";
					if(o_precio==""){
						$("#cpwonline select[name='o_plan']").change();
						$('#cpwonline a[tag="o_enviar"]').click();
					}else if(o_precio == "No disponible"){
						$('#cpwonline div.espera').html('El monto no est&aacute; disponible en la moneda seleccionada.');
						var retrasar = setTimeout(mov, 3000);
					}else{
						//Función
							if(o_nya == "" || o_titulo == "" || o_dominio_1 == "" || o_dominio_2 == "" || o_dominio_3 == "" || o_cedula == "" || o_pais == "" || o_estado == "" || o_ciudad == "" || o_direccion == "" || o_email == "" || o_tel == "" || o_contenidos == ""){
								$('#cpwonline div.espera').html('Disculpe, hay campos que est&aacute;n vac&iacute;os');
								var retrasar = setTimeout(mov, 3000);
							}else{
								//Llamada AJAX
									$.post("../enlaces/ordenar_contactar.php", {o_nya:o_nya, o_titulo:o_titulo, o_dominio_1:o_dominio_1, o_dominio_2:o_dominio_2, o_dominio_3:o_dominio_3, o_cedula:o_cedula, o_pais:o_pais, o_estado:o_estado, o_ciudad:o_ciudad, o_direccion:o_direccion, o_email:o_email, o_tel:o_tel, o_plan:o_plan, o_modelo:o_modelo, o_contenidos:o_contenidos, o_moneda:o_moneda, o_precio:o_precio, tipo:tipo},function(r){
										$('#cpwonline div.espera').html(r);
										var retrasar = setTimeout(mov, 3000);
									});
							}
					}
			});
		//Contactar
			$('#cpwonline a[tag="c_enviar"]').click(function(e){
				//Animación
					$('#cpwonline div.espera').css('right', '.5cm');
					$('#cpwonline div.espera').html('Verificando datos | <span>CPW Online</span>');
				//Recolección de datos
					var c_nya = $('#cpwonline input[name="c_nya"]').val();
					var c_email = $('#cpwonline input[name="c_email"]').val();
					var c_tel = $('#cpwonline input[name="c_tel"]').val();
					var c_asunto = $('#cpwonline select[name="c_asunto"]').val();
					var c_c_plan = $('#cpwonline select[name="c_c_plan"]').val();
					var c_plan = $('#cpwonline select[name="c_plan"]').val();
					var c_opi_plan = $('#cpwonline select[name="c_opi_plan"]').val();
					var c_mensaje = $('#cpwonline textarea[name="c_mensaje"]').val();
					var tipo = "contactar";
				//Operación
					if(c_nya =="" || c_email == "" || c_tel == "" || c_mensaje == ""){
						$('#cpwonline div.espera').html("Disculpe, hay campos que no deben estar vac&iacute;os.");
						var retrasar = setTimeout(mov, 3000);
					}else{
						//Llamada AJAX
							$.post("../enlaces/ordenar_contactar.php", {c_nya:c_nya, c_email:c_email, c_tel:c_tel, c_asunto:c_asunto, c_c_plan:c_c_plan, c_plan:c_plan, c_opi_plan:c_opi_plan, c_mensaje:c_mensaje, tipo:tipo},function(r){
								$('#cpwonline div.espera').html(r);
								var retrasar = setTimeout(mov, 3000);
							});
					}
			});
});