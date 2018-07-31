<?php
	require_once('../mysqli_db.php');
	session_start();
	$tipo = $_POST['tipo'];
	switch($tipo){
		case 'pago':
			$pa_cantidad = $_POST['pa_cantidad'];
			$pa_moneda = $_POST['pa_moneda'];
			$pa_metodo = $_POST['pa_metodo'];
			$pa_usuario = $_SESSION['o_usuario'];
			if(empty($pa_cantidad)){
				echo 'Disculpe, hay campos que no deben estar vac&iacute;os.';
				exit;
			}
			$con = $mysqli->query("INSERT INTO pagos (pa_usuario, pa_cantidad, pa_moneda, pa_metodo, pa_freg) VALUES ('".$pa_usuario."', '".$pa_cantidad."', '".$pa_moneda."', '".$pa_metodo."', NOW()) ");
			if($con)
				echo 'Su pago ha sido registrado satisfactoriamente, no olvide subir la correspondiente imagen en la secci&oacute;n <i>Mis pagos</i>';
			else
				echo 'Ha ocurrido un error al registrar su pago, intente nuevamente';
			break;
		case 'estado_pagina':
			$con = $mysqli->query("UPDATE ordenes SET o_estado_pagina = 'Oficial' WHERE o_usuario = '".$_SESSION['o_usuario']."' ");
			if($con)
				echo 'Usted ha decidido cambiar al estado <i>Oficial</i>. Ahora debe reportar su pago en la secci&oacute; <strong>Pagos</strong>.';
			else
				echo 'Ha ocurrido un error al actualizar su estado de p&aacute;gina';
			break;
		case 'cambio_clave':
			$o_clave = $_POST['o_clave'];
			$o_clave_nueva = $_POST['o_clave_nueva'];
			$o_clave_nueva_rep = $_POST['o_clave_nueva_rep'];
			
			if($o_clave_nueva != $o_clave_nueva_rep){
				echo 'Las contrase&ntilde;as no son iguales.';
			}elseif(strlen($o_clave_nueva)<8){
				echo 'La contrase&ntilde;a debe tener m&iacute;nimo 8 caracteres.';
			}else{
				$con1 = $mysqli->query("SELECT o_clave FROM ordenes WHERE o_clave = '".$o_clave."'");
				if($con1->num_rows!=0){
					$con = $mysqli->query("UPDATE ordenes SET o_clave = '".$o_clave_nueva."' WHERE o_clave = '".$o_clave."' ");
					if($con){
						echo 'Su contrase&ntilde;a fue actualizada correctamente.';
					}else{
						echo 'La contrase&ntilde;a ingresada es incorrecta';
					}
				}else{
					echo 'La clave actual no coincide con la que est&aacute; registrada en nuestro sistema.';
				}
			}
		break;
		case 'datos_oficiales':
			$do_usuario = $_POST['do_usuario'];
			$do_dominio = $_POST['do_dominio'];
			$do_ciclo = $_POST['do_ciclo'];
			$do_mes = date('m');
			$do_estado_pagina= $_POST['do_estado_pagina'];
			$do_plan = $_POST['do_plan'];
			
			if(empty($do_dominio) || empty($do_ciclo)){
				echo 'Disculpe, hay campos que no deben estar vac&iacute;os.';
				exit;
			}
			
			$con = $mysqli->query("INSERT INTO datos_oficiales (do_usuario, do_dominio, do_ciclo, do_mes, do_estado_pagina, do_plan, do_freg) VALUES ('".$do_usuario."', '".$do_dominio."', '".$do_ciclo."', '".$do_mes."', '".$do_estado_pagina."', '".$do_plan."', NOW()) ");
			if($con){
				/*Mensaje al correo1*/
					$para  = $do_usuario;
					$titulo = "¡Su web est&aacute; lista! | CPW Online";
					$mensaje = '
					<html>
						<head>
							<title>'.$titulo.'</title>
							<meta name="charset" content="utf-8"/>
							<meta name="author" content="CPW Online"/>
							<meta name="copyright" content="CPW Online"/>
							<style>
								div.prin{
									display:block;color:#444;font-size:12pt;margin-bottom:.1cm;
								}
								.cab{
									padding:.5cm;background:#00bdf0;margin-bottom:.1cm;text-align:center;
								}
								.cab span{
									font-size:14pt;color:#fff;
								}
						  </style>
						</head>
						<body>
							<nav class="cab">
								<span>CPW Online</span>
							</nav>
							<div class="prin">Dominio: <strong>'.$do_dominio.'</strong></div>
							<div class="prin">Ciclo de pago (Cada cuanto debe pagar su plan): <strong>'.$do_ciclo.' de cada mes</strong></div>
							<div class="prin">Plan: <strong>'.$do_plan.'</strong></div>
							<div class="prin">Hola '.$do_usuario.', ingrese a su web por medio de este enlace: <a href="'.$do_dominio.'"></a>.</div>
						</body>
					</html>
					';
					// Para enviar un correo HTML, debe establecerse la cabecera Content-type
					$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
					$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

					// Cabeceras adicionales
					$cabeceras .= 'To: CPW Online <grupocpwonline@gmail.com>' . "\r\n";
					$cabeceras .= 'To: Usted <'.$do_usuario.'>' . "\r\n";

					// Enviarlo
					mail($para, $titulo, $mensaje, $cabeceras);
					
				/*Fin Mensaje al correo1*/
				
				echo 'Los datos oficiales fueron registrados satisfactoriamente';
			}else
				echo 'Ha ocurrido un error al registrar los datos oficiales';
		break;
		case 'o_listo':
			$o_id = $_POST['o_id'];
			$con = $mysqli->query("UPDATE ordenes SET o_listo = '1' WHERE o_id = '".$o_id."' ");
			if($con)
				echo 'Operac&oacute;n finalizada correctamente';
			else
				echo 'Ha ocurrido un error al realizar la operaci&oacute;n';
		break;
		case 'pa_aprobado':
			$pa_id = $_POST['pa_id'];
			$pa_comentarios = $_POST['pa_comentarios'];
			$con = $mysqli->query("UPDATE pagos SET pa_confirmado = '1', pa_comentarios = '".$pa_comentarios."' WHERE pa_id = '".$pa_id."' ");
			if($con)
				echo 'Operac&oacute;n finalizada correctamente';
			else
				echo 'Ha ocurrido un error al realizar la operaci&oacute;n';
		break;
		case 'do_pagado':
			$do_id = $_POST['do_id'];
			$do_mes = date('m');
			$con1 = $mysqli->query("UPDATE datos_oficiales SET do_estado_cuenta = 'Pagado', do_mes = '".$do_mes."' WHERE do_id = '".$do_id."' ");
			if($con1)
				echo 'Dato oficial Pagado';
			else
				echo 'Ha ocurrido un error al realizar la operaci&oacute;n';
		break;
		case 'informacion':
			$iu_titulo = $_POST['iu_titulo'];
			$iu_contenido = $_POST['iu_contenido'];
			if(empty($iu_titulo) || empty($iu_contenido)){
				echo 'Disculpe, hay campos que no deben estar vac&iacute;os.';
				exit;
			}
			$con = $mysqli->query("INSERT INTO informaciones_u (iu_titulo, iu_contenido, iu_freg) VALUES ('".$iu_titulo."', '".$iu_contenido."', NOW()) ");
			if($con)
				echo 'Informaci&oacute;n a&ntilde;adida exitosamente.';
			else
				echo 'Ha ocurrido un error al a&ntilde;adir la informaci&oacute;n';
		break;
		case 'fase':
			$do_usuario = $_POST['do_usuario'];
			$do_dominio = $_POST['do_dominio'];
			$do_fase = $_POST['do_fase'];
			if(empty($do_usuario) || empty($do_dominio)){
				echo 'Disculpe, hay campos que no deben estar vac&iacute;os.';
				exit;
			}
			$con = $mysqli->query("UPDATE datos_oficiales SET do_fase = '".$do_fase."' WHERE do_usuario = '".$do_usuario."' AND do_dominio = '".$do_dominio."' ");
			if($con){
				/*Mensaje al correo1*/
					$para  = $do_usuario;
					$titulo = "¡Su web ha cambiado de fase: <".$do_fase.">! | CPW Online";
					$mensaje = '
					<html>
						<head>
							<title>'.$titulo.'</title>
							<meta name="charset" content="utf-8"/>
							<meta name="author" content="CPW Online"/>
							<meta name="copyright" content="CPW Online"/>
							<style>
								div.prin{
									display:block;color:#444;font-size:12pt;margin-bottom:.1cm;
								}
								.cab{
									padding:.5cm;background:#00bdf0;margin-bottom:.1cm;text-align:center;
								}
								.cab span{
									font-size:14pt;color:#fff;
								}
						  </style>
						</head>
						<body>
							<nav class="cab">
								<span>CPW Online</span>
							</nav>
							<div class="prin">Dominio: <strong>'.$do_dominio.'</strong></div>
							<div class="prin">Hola '.$do_usuario.', su cuenta ha cambiado de fase; esto ocurre cuando han transcurridos varios d&iacute;as sin haber reportado el pago del plan. Este mensaje tambi&eacute;n llega cuando su web se activa.</div>
						</body>
					</html>
					';
					// Para enviar un correo HTML, debe establecerse la cabecera Content-type
					$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
					$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

					// Cabeceras adicionales
					$cabeceras .= 'To: CPW Online <grupocpwonline@gmail.com>' . "\r\n";
					$cabeceras .= 'To: Usted <'.$do_usuario.'>' . "\r\n";

					// Enviarlo
					mail($para, $titulo, $mensaje, $cabeceras);
					
				/*Fin Mensaje al correo1*/
				
				echo 'Fase cambiada correctamente.';
			}else
				echo 'Ha ocurrido un error al cambiar la fase.';
		break;
	}
?>