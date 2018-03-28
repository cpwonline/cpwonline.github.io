<?php
	require_once('../mysqli_db.php');
	session_start();
	$tipo = $_POST['tipo'];
		
	switch($tipo){
		case 'ordenar':
			//Ordenar-------------------------------------------
				$o_titulo = $_POST['o_titulo'];
				$o_dominio_1 = $_POST['o_dominio_1'];
				$o_dominio_2 = $_POST['o_dominio_2'];
				$o_dominio_3 = $_POST['o_dominio_3'];
				$o_nya = $_POST['o_nya'];
				$o_cedula = $_POST['o_cedula'];
				$o_pais = $_POST['o_pais'];
				$o_estado = $_POST['o_estado'];
				$o_ciudad = $_POST['o_ciudad'];
				$o_direccion = $_POST['o_direccion'];
				$o_email = $_POST['o_email'];
				$o_tel = $_POST['o_tel'];
				$o_plan = $_POST['o_plan'];
				$o_modelo = $_POST['o_modelo'];
				$o_contenidos = $_POST['o_contenidos'];
				$o_moneda = $_POST['o_moneda'];
				$o_precio = $_POST['o_precio'];
				//Verificación de la cédula
					$con = $mysqli->query("SELECT o_cedula FROM ordenes WHERE o_cedula = '".$o_cedula."'");
					$con = $mysqli->query("SELECT o_email FROM ordenes WHERE o_email = '".$o_email."'");
					if($con->num_rows!=0){
						echo '<div class="m_error" style="display:block;">Disculpe, este DNI, Nro. de c&eacute;dula o pasaporte ya est&aacute; registrado.</div>';
					}elseif($con->num_rows!=0){
						echo '<div class="m_error" style="display:block;">Disculpe, este correo ya est&aacute; registrado.</div>';
					}else{
						//Conformación del usuario y de la clave
							$o_usuario = $o_email;
							$o_clave = substr(md5(rand()),0,10);
						//Registro de la Orden
							//Llamada
								$con = $mysqli->query("INSERT INTO ordenes (o_titulo, o_dominio_1, o_dominio_2, o_dominio_3, o_nya, o_cedula, o_pais, o_estado, o_ciudad, o_direccion, o_email, o_tel, o_plan, o_modelo, o_contenidos, o_moneda, o_precio, o_usuario, o_clave, o_freg) VALUES ('".$o_titulo."', '".$o_dominio_1."', '".$o_dominio_2."', '".$o_dominio_3."', '".$o_nya."', '".$o_cedula."', '".$o_pais."', '".$o_estado."', '".$o_ciudad."', '".$o_direccion."', '".$o_email."', '".$o_tel."', '".$o_plan."', '".$o_modelo."', '".$o_contenidos."', '".$o_moneda."', '".$o_precio."', '".$o_usuario."', '".$o_clave."', NOW() )");
								if($con){
									/*Mensaje al correo1*/
										$para  = 'support@cpwonline.com.ve'; 
										$titulo = "¡Una orden! | CPW Online";
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
													<span>¡Una orden! | CPW Online</span>
												</nav>
												<div class="prin">T&iacute;tulo de la web: <strong>'.$o_titulo.'</strong></div>
												<div class="prin">Dominio 1: <strong>'.$o_dominio_1.'</strong></div>
												<div class="prin">Dominio 2: <strong>'.$o_dominio_2.'</strong></div>
												<div class="prin">Dominio 3: <strong>'.$o_dominio_3.'</strong></div>
												<div class="prin">Nombres y apellidos: <strong>'.$o_nya.'</strong></div>
												<div class="prin">C&eacute;dula: <strong>'.$o_cedula.'</strong></div>
												<div class="prin">Pa&iacute;s: <strong>'.$o_pais.'</strong></div>
												<div class="prin">Estado: <strong>'.$o_estado.'</strong></div>
												<div class="prin">Ciudad: <strong>'.$o_ciudad.'</strong></div>
												<div class="prin">Direcci&oacute;n: <strong>'.$o_direccion.'</strong></div>
												<div class="prin">Correo: <strong>'.$o_email.'</strong></div>
												<div class="prin">Tel&eacute;fono: <strong>'.$o_tel.'</strong></div>
												<div class="prin">Plan: <strong>'.$o_plan.'</strong></div>
												<div class="prin">Modelos: <strong>'.$o_modelos.'</strong></div>
												<div class="prin">Contenidos: <strong>'.$o_contenidos.'</strong></div>
												<div class="prin">Moneda: <strong>'.$o_moneda.'</strong></div>
												<div class="prin">Total a pagar: <strong>'.$o_precio.'</strong></div>
												<div class="prin">Nombre de usuario: <strong>'.$o_usuario.'</strong></div>
												<div class="prin">Clave de acceso: <strong>'.$o_clave.'</strong></div>
												<div class="prin">Acceda mediante este enlace: <strong><a href="https://www.cpwonline.com.ve/perfil/" target="_blank">CPW Online > Perfil</a></strong></div>
											</body>
										</html>
										';
										// Para enviar un correo HTML, debe establecerse la cabecera Content-type
										$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
										$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

										// Cabeceras adicionales
										$cabeceras .= 'To: '.$o_nya.' <'.$o_email.'>' . "\r\n";
										$cabeceras .= 'From: CPW Online <support@cpwonline.com.ve>' . "\r\n";

										// Enviarlo
										mail($para, $titulo, $mensaje, $cabeceras);
										
										//Mensaje al usuario
											echo '¡Su orden est&aacute; lista! Vea su correo electr&oacute;nico para continuar con el proceso.';
									/*Fin Mensaje al correo1*/
								}else{
									echo 'Disculpe, ha ocurrido un error al registrar la orden.';
								}

					}
			
		break;
		case 'contactar':
			//Contactar-------------------------------------------
				$c_nya = $_POST['c_nya'];
				$c_email = $_POST['c_email'];
				$c_tel = $_POST['c_tel'];
				$c_asunto = $_POST['c_asunto'];
				$c_c_plan = $_POST['c_c_plan'];
				$c_plan = $_POST['c_plan'];
				$c_opi_plan = $_POST['c_opi_plan'];
				$c_mensaje = $_POST['c_mensaje'];
				$c_fecha = date('d - m - Y');
				$c_hora = date('h - i - s');
				
				/*Mensaje al correo1*/
					$para  = 'support@cpwonline.com.ve'; 
					$titulo = $c_asunto." | Contactar";
					$mensaje = '
					<html>
						<head>
							<title>'.$c_asunto.'</title>
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
							<div class="prin">Mensaje de: <strong>'.$c_nya.'</strong></div>
							<div class="prin">Correo: <strong>'.$c_email.'</strong></div>
							<div class="prin">Tel&eacute;fono: <strong>'.$c_tel.'</strong></div>
							<div class="prin">Asunto: <strong>'.$c_asunto.'</strong></div>
							<div class="prin">Quiere comprar una web: <strong>'.$c_c_plan.'</strong></div>
							<div class="prin">Plan: <strong>'.$c_plan.'</strong></div>
							<div class="prin">Opini&oacute;n de los planes: <strong>'.$c_opi_plan.'</strong></div>
							<div class="prin">Mensaje: <strong>'.$c_mensaje.'</strong></div>
							<div class="prin">Fecha: <strong>'.$c_fecha.'</strong></div>
							<div class="prin">Hora: <strong>'.$c_hora.'</strong></div>
							<div class="prin">Hola '.$c_nya.', espere a que respondamos a su mensaje. Un cordial saludo.</div>
						</body>
					</html>
					';
					// Para enviar un correo HTML, debe establecerse la cabecera Content-type
					$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
					$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";

					// Cabeceras adicionales
					$cabeceras .= 'To: CPW Online <grupocpwonline@gmail.com>' . "\r\n";
					$cabeceras .= 'To: '.$c_nya.' <'.$c_email.'>' . "\r\n";
					$cabeceras .= 'From: CPW Online <support@cpwonline.com.ve>' . "\r\n";

					// Enviarlo
					mail($para, $titulo, $mensaje, $cabeceras);
					
					//Mensaje al usuario
					echo 'Su mensaje ha sido enviado correctamente';
				/*Fin Mensaje al correo1*/
		break;
	}
?>