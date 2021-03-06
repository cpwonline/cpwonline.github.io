<!DOCTYPE HTML>
<html lang="es">
	<!--
		CPW Online | Página principal de la empresa CPW Online
		v 1.1.1
	-->
	<head>
		<title>Creaci&oacute;n de P&aacute;ginas Web Comerciales, para Empresas, para PYMES, Personales y m&aacute;s | CPW Online</title>
		<?php 
			$dir = "head.php";
			$lug = "home";
			if(file_exists($dir)){
				include('head.php');
				head($lug);
			}else{
				include('../head.php');
				head($lug);
			}
			session_start();
			require_once('mysqli_db.php');
		?>
	</head>
	<body id="cpwonline">
		<header class="cabecera">
			<?php 
				$dir = "cab.php";
				$lug = "home";
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
			<article class="art_1">
				<i class="cuadro1"></i><i class="cuadro2"></i>
				<div class="f_1"></div>
				<div class="rota_1">
					<img src="images/img_art_1.png" alt="">
					<div class="text">
						<h3 class="swing" id="men_unaweb" onclick="fondo_ale();">¿Una web?</h3>
						<h3>&iexcl;Ten la tuya&excl;</h3>
						<a href="perfil/" class="btn-gen">Login</a>
						<a href="contacto/" class="btn-gen4">Contactar</a>
					</div>
				</div>
			</article>
			<article class="art_2">
				<h3>Nuestros Planes y precios</h3>
				<ul class="list_pyp">
					<?php
						$moneda="USD";
						$con = $mysqli->query("SELECT * FROM precios WHERE p_moneda='".$moneda."' ORDER BY p_freg");
						while($ro = $con->fetch_array()){
							$p_plan = $ro['p_plan'];
							$p_moneda = $ro['p_moneda'];
							$p_valor = $ro['p_valor'];
							$precio[$p_plan] = $p_valor;
						}
					?>
					<a href="#mod_plan1" onclick="ver_plan('0');"><li class="pyp_1">
						<div><span>Economic</span></div>
						<div><span>Sitio Web, Dominio y Hosting incluido</span></div>
						<div><span>Administración por SGAC | ECONOMIC</span></div>
						<div><span>Dise&ntilde;o web: Plantilla</span></div>
						<div><span>M&aacute;s...</span></div>
						<div><span class="ult1">$ <?=$precio['Economic']?>/mes</span></div>
					</li></a>
					<a href="#mod_plan2" onclick="ver_plan('1');"><li class="pyp_2">
						<div><span>Deluxe</span></div>
						<div><span>Sitio Web, Dominio y Hosting incluido</span></div>
						<div><span>Administración por SGAC | DELUXE</span></div>
						<div><span>Dise&ntilde;o web: Plantilla o Personalizado</span></div>
						<div><span>Mucho M&aacute;s...</span></div>
						<div><span class="ult2">$ <?=$precio['Deluxe']?>/mes</span></div>
					</li></a>
					<a href="#mod_plan3" onclick="ver_plan('2');"><li class="pyp_3">
						<div><span>Ultimate</span></div>
						<div><span>Sitio Web, Dominio y Hosting incluido</span></div>
						<div><span>Administración por SGAC | ULTIMATE</span></div>
						<div><span>Dise&ntilde;o web: Plantilla o Personalizado</span></div>
						<div><span>Much&iacute;simo M&aacute;s...</span></div>
						<div><span class="ult3">$ <?=$precio['Ultimate']?>/mes</span></div>
					</li></a>
					<a href="#mod_plan4" onclick="ver_plan('3');"><li class="pyp_4">
						<div><span>Super-Economic</span></div>
						<div><span>Sitio Web, Dominio (.ve) y Hosting incluido</span></div>
						<div><span>Administración por SGAC | SUPER-ECONOMIC</span></div>
						<div><span>Dise&ntilde;o web: Plantilla</span></div>
						<div><span>Much&iacute;simo M&aacute;s...</span></div>
						<div><span class="ult4">$ <?=$precio['Super-Economic']?>/mes</span></div>
					</li></a>
				</ul>
				<div class="verEn">
					<div class="actualizar_precio"></div>
					<span>Ver en: </span>
					<select id="s_moneda" onchange="cambia_moneda();">
						<option value="USD">USD $ (D&oacute;lares Am&eacute;ricanos)</option>
						<option value="/S">/S. (Soles Peruanos)</option>
						<option value="BsF">BsF (Bol&iacute;vares Fuertes Venezolanos)</option>
					</select>
				</div>
				<!--MODALES-->
					<!--Modal de ver plan1------------------------------------------------>
						<div class="gen_modal" id="mod_plan1"><div class="modal-content">
								<div class="header otro"><h2>Plan ECONOMIC</h2></div>
								<div class="copy" id="copy">
									<p style="text-align: center;">
										<?php
											include('planes/plan1.php');
										?>
									</p>
								</div>
								<div class="cf footer">
									<section class="cont_a">
										<a class="btn-gen2" onclick="$('#mod_plan1').css('display','none');">Cerrar</a>
										<a class="btn-gen" href="contacto/?orden=1&plan=Economic">Ordenar</a>
									</section>
								</div>
							</div>
							<div class="overlay"></div>
						</div>
					<!--Fin Modal de Modal de ver plan1------------------------------------------------>
					<!--Modal de ver plan2------------------------------------------------>
						<div class="gen_modal" id="mod_plan2"><div class="modal-content">
								<div class="header otro"><h2>Plan DELUXE</h2></div>
								<div class="copy" id="copy">
									<p style="text-align: center;">
										<?php
											include('planes/plan2.php');
										?>
									</p>
								</div>
								<div class="cf footer">
									<section class="cont_a">
										<a class="btn-gen2" onclick="$('#mod_plan2').css('display','none');">Cerrar</a>
										<a class="btn-gen" href="contacto/?orden=1&plan=Deluxe">Ordenar</a>
									</section>
								</div>
							</div>
							<div class="overlay"></div>
						</div>
					<!--Fin Modal de Modal de ver plan2------------------------------------------------>
					<!--Modal de ver plan3------------------------------------------------>
						<div class="gen_modal" id="mod_plan3"><div class="modal-content">
								<div class="header otro"><h2>Plan ULTIMATE</h2></div>
								<div class="copy" id="copy">
									<p style="text-align: center;">
										<?php
											include('planes/plan3.php');
										?>
									</p>
								</div>
								<div class="cf footer">
									<section class="cont_a">
										<a class="btn-gen2" onclick="$('#mod_plan3').css('display','none');">Cerrar</a>
										<a class="btn-gen" href="contacto/?orden=1&plan=Ultimate">Ordenar</a>
									</section>
								</div>
							</div>
							<div class="overlay"></div>
						</div>
					<!--Fin Modal de Modal de ver plan3------------------------------------------------>
					<!--Modal de ver plan4------------------------------------------------>
						<div class="gen_modal" id="mod_plan4"><div class="modal-content">
								<div class="header otro"><h2>Plan SUPER-ECONOMIC</h2></div>
								<div class="copy" id="copy">
									<p style="text-align: center;">
										<?php
											include('planes/plan4.php');
										?>
									</p>
								</div>
								<div class="cf footer">
									<section class="cont_a">
										<a class="btn-gen2" onclick="$('#mod_plan4').css('display','none');">Cerrar</a>
										<a class="btn-gen" href="contacto/?orden=1&plan=Super-Economic">Ordenar</a>
									</section>
								</div>
							</div>
							<div class="overlay"></div>
						</div>
					<!--Fin Modal de Modal de ver plan4------------------------------------------------>
			</article>
			<article class="art_3">
				<div class="col_1">
					<h5>Mejores precios</h5>
					<p>Los precios m&aacute;s tentativos del mercado los tenemos nosotros.</p>
				</div>
				<div class="col_2">
					<h5>M&aacute;s ventas</h5>
					<p>Consigue obtener m&aacute;s clientes potenciales con una web profesional.</p>
				</div>
				<div class="col_3">
					<h5>Mejores resultados</h5>
					<p>¡En CPW Online rompemos las barreras: precio bajo - buena calidad, precio alto - excelente calidad!</p>
				</div>
			</article>
			<article class="art_4">
				<div class="text"><h4>¿Qu&eacute; esperas para comprar tu web?</h4><a href="contacto/?orden=1" class="btn-gen">Ordenar</a></div>
			</article>
			<article class="art_5">
				<h3>Nuestros beneficios</h3>
				<div class="col_1">
					<img src="images/g_lla.png" alt=""/>
					<h5>Comunicaci&oacute;n constante</h5>
					<p>Para una mejor comunicaci&oacute;n contamos con: secci&oacute;n de contacto, diagn&oacute;stico de errores, chats en redes sociales (WhatsApp, Facebook, Messenger), correos electr&oacute;nicos.</p>
					<a class="btn-gen" href="informacion/#inf_compra">Leer m&aacute;s</a>
				</div>
				<div class="col_2">
					<img src="images/g_din.png" alt=""/>
					<h5>Ahorra dinero</h5>
					<p>Nuestros Planes y precios son &uacute;nicos en el mercado, ¡Compru&eacute;balo por ti mismo! Con precios tan induditables ¿C&oacute;mo dudar?</p>
					<a class="btn-gen" href="informacion/#planes_precios">Leer m&aacute;s</a>
				</div>
				<div class="col_3">
					<img src="images/g_ser.png" alt=""/>
					<h5>Servicio de prueba</h5>
					<p>&iquest;Sab&iacute;as que puedes pedir tu p&aacute;gina web gratuitamente? ¡S&iacute;! Si tienes temor de perder dinero, tiempo o esfuerzo, nuestras web primero se crean gratuitamente, y si quieres comprar o no, es tu decisi&oacute;n; sin compromisos.</p>
					<a class="btn-gen" href="informacion/#inf_compra">Leer m&aacute;s</a>
				</div>
			</article>
			<article class="art_4">
				<div class="text">
					<h4>
						&iquest;No est&aacute;s seguro? &iquest;M&aacute;s informaci&oacute;n?
						<a href="informacion/" class="btn-gen3">Leer m&aacute;s</a>
					</h4>
					<h4>
						Tambi&eacute;n puedes ver nuestros modelos web
						<a class="btn-gen" href="modelos/">Ver Modelos</a>
					</h4>
				</div>
			</article>
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