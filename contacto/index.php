<!DOCTYPE HTML>
<html lang="es">
	<head>
		<title>Contacto | CPW Online</title>
		<?php 
			$dir = "head.php";
			$lug = "otro";
			if(file_exists($dir)){
				include('head.php');
				head($lug);
			}else{
				include('../head.php');
				head($lug);
			}
			require_once('../mysqli_db.php');
		?>
	</head>
	<body id="cpwonline">
		<header class="cabecera">
			<?php 
				$dir = "cab.php";
				$lug = "contacto";
				if(file_exists($dir)){
					include('cab.php');
					cab($lug);
				}else{
					include('../cab.php');
					cab($lug);
				}
			?>
		</header>
		<section class="contenedor">
			<article class="art_7_0">
				<p>En esta secci&oacute;n podr&aacute;s contactarte con nosotros u ordenar una p&aacute;gina web. <strong>En caso de poseer dudas, visite la secci&oacute;n de <i>Informaci&oacute;n</i></strong></p>
			</article>
			<article class="art_7">
				<img src="../images/img_art_1_3.png" alt=""/>
				<div class="f_1"></div>
				<div class="contacto_1">
					<h3>BIENVENIDO</h3>
					<h3>A la secci&oacute;n</h3>
					<h3>de Contacto</h3>
				</div>
				<div class="contacto_2">
					<div tag="form_gen">
						<div class="dentro">
							<!--Pregunta-->
								<section class="pregunta">
									<p>¿Usted desea?</p>
									<a class="btn-gen" tag="ordenar">Ordenar</a>
									<a class="btn-gen2" tag="contactar">Contactar</a>
								</section>
								<!--Contactar-->
									<section class="contactar">
										<h4 style="padding:.4cm;margin-bottom:.3cm;background:#444;color:#fff;">Contactar</h4>
										<input type="text" name="c_nya" placeholder="Nombres y apellidos"/>
										<input type="email" name="c_email" placeholder="Email"/>
										<input type="text" name="c_tel" placeholder="Tel&eacute;fono"/>
										<h6>&iquest;Deseas comprar un plan web?</h6>
										<select name="c_c_plan">
											<option value="S&iacute;">S&iacute;</option>
											<option value="No">No</option>
										</select>
										<h6>&iquest;Por qu&eacute; quieres contactarte con nosotros?</h6>
										<select name="c_asunto">
											<option value="Quisiera comprar una web">Quisiera comprar una web</option>
											<option value="n/a">Sin opini&oacute;n</option>
											<option value="Por curiosidad">Por curiosidad</option>
											<option value="Quiero hacer un reclamo">Quiero hacer un reclamo</option>
											<option value="Me llamo la atenci&oacute;n el sitio web">Me llamo la atenci&oacute;n el sitio web</option>
											<option value="Alguien me lo recomend&oacute;">Alguien me lo recomend&oacute;</option>
											<option value="Quisiera m&aacute;s informaci&oacute;n detallada">Quisiera m&aacute;s informaci&oacute;n detallada</option>
											<option value="Otro">Otro</option>
										</select>
										<h6>Si fueses a elegir un plan, &iquest;Cu&aacute;l elegir&iacute;as?</h6>
										<select name="c_plan">
											<option value="n/a">Sin opini&oacute;n</option>
											<option value="Economic">Economic</option>
											<option value="Deluxe">Deluxe</option>
											<option value="Ultimate">Ultimate</option>
											<option value="Super-Economic">Super-Economic</option>
										</select>
										<h6>&iquest;Qu&eacute; te parecen nuestros Planes?</h6>
										<select name="c_opi_plan">
											<option value="n/a">Sin opini&oacute;n</option>
											<option value="Sumamente caros">Sumamente caros</option>
											<option value="Caros">Caros</option>
											<option value="Normal">Normal</option>
											<option value="Muy econ&oacute;micos">Muy econ&oacute;micos</option>
										</select><br>
										<h6>Escribe lo que quieres decirnos</h6>
										<textarea name="c_mensaje"></textarea><br>
										<a class="btn-gen" tag="c_enviar">Enviar</a>
									</section>
									
								<!--Ordenar-->
									<section class="ordenar">
										<h4 style="padding:.4cm;margin-bottom:.3cm;background:#444;color:#fff;">Ordenar</h4>
										<h6>T&iacute;tulo de tu web: </h6>
										<input type="text" name="o_titulo" required/>
										<h6>Dominio 1: </h6>
										<input type="text" name="o_dominio_1" required/>
										<h6>Dominio 2: </h6>
										<input type="text" name="o_dominio_2" required/>
										<h6>Dominio 3: </h6>
										<input type="text" name="o_dominio_3" required/>
										<h6>Informaci&oacute;n personal: </h6>
										<input type="text" name="o_nya" placeholder="Nombres y apellidos" required/>
										<input type="text" name="o_cedula" placeholder="DNI, c&eacute;dula o pasaporte" required/>
										<input type="text" name="o_pais" placeholder="Pa&iacute;s" required/>
										<input type="text" name="o_estado" placeholder="Estado o provincia" required/>
										<input type="text" name="o_ciudad" placeholder="Ciudad" required/>
										<input type="text" name="o_direccion" placeholder="Direcci&oacute;n" required/>
										<input type="email" name="o_email" placeholder="Email" required/>
										<input type="tel" name="o_tel" placeholder="Tel&eacute;fono" required/>
										<h6>Plan web a elegir:</h6>
										<div tag="cont_select_o_plan">
											<select name="o_plan">
												<option value="Economic">Economic</option>
												<option value="Deluxe">Deluxe</option>
												<option value="Ultimate">Ultimate</option>
												<option value="Super-Economic">Super-Economic</option>
											</select>
										</div>
										<h6>Modelo web a elegir:</h6>
										<div tag="cont_select_o_modelo">
											<select name="o_modelo">
												<option value="A17-1">A17-1</option>
												<option value="A17-2">A17-2</option>
												<option value="A17-3">A17-3</option>
												<option value="A17-4">A17-4</option>
												<option value="A17-5">A17-5</option>
												<option value="A18-1">A18-1</option>
												<option value="A18-2">A18-2</option>
											</select>
										</div>
										<h6>Contenidos de la p&aacute;gina web:</h6>
										<textarea name="o_contenidos"></textarea>
										<h6>Moneda en la que desea pagar: </h6>
										<select name="o_moneda">
											<option value="USD">USD</option>
											<option value="/S">/S</option>
											<option value="BsF">BsF</option>
										</select>
										<h6>Total a pagar: </h6>
										<input type="text" name="o_precio" value="" readonly/>
										<a class="btn-gen2" tag="o_actualizar_precio" style="padding:4px 7px;font-size:9pt;">Actualizar precio</a>
										<h6>¿Pagos? ¡No te preocupes! Puedes reportarlos luego, te enviaremos unos datos a tu correo. Al hacer click en <i>Ordenar</i> usted est&aacute; de acuerdo con nuestras pol&iacute;ticas.</h6>
										<br><a class="btn-gen" tag="o_enviar">Ordenar</a>
									</section>
						</div>
					</div>
				</div>
			</article>
			<?php
				//Inicio para saber si se quiere ordenar o contactar
					if(isset($_GET['orden'])){
						if($_GET['orden']=="1"){
							if(empty($_GET['plan']))
								$plan = "Economic";
							else
								$plan = $_GET['plan'];
							if(empty($_GET['modelo']))
								$modelo = 1;
							else
								$modelo = $_GET['modelo'];
			?>
							<script>
								document.querySelector("#cpwonline section.ordenar").style.display="block";
								document.querySelector("#cpwonline section.contactar").style.display="none";
								var plan = "<?=$plan?>";
								var modelo = "<?=$modelo?>";
								seleccionar(plan, modelo);
							</script>
			<?php
						}
					}
			?>
		</section>
		<footer class="pie">
			<?php 
				$dir = "pie.php";
				if(file_exists($dir)){
					include('pie.php');
				}else{
					include('../pie.php');
				}
			?>
		</footer>
	</body>
</html>