<!DOCTYPE HTML>
<html lang="es">
	<head>
		<title>Nosotros | CPW Online</title>
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
		?>
	</head>
	<body id="cpwonline">
		<header class="cabecera">
			<?php
				$dir = "cab.php";
				$lug = "nosotros";
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
			<article class="art_8">
				<div class="col_1">
					<div class="col_1_izq" style="width:100%;">
						<h4>&iquest;Interesado en nosotros?</h4>
						<p>&nbsp;&nbsp;&nbsp;Si has llegado hasta ac&aacute;, es porque verdaderamente te importa saber un poco m&aacute;s acerca de nuestra empresa.</p>
					</div>
				</div>
				<div class="col_1" style="background:#DDD;">
					<div class="col_1_izq" style="width:100%;">
						<h4 style="color:#444;">Fundamentos del Equipo CPW Online</h4>
						<section class="equipo_cpwonline">
							<article class="art_fund">
								<div class="img"><img src="../images/equipo/fund_jfrivas.png" alt=""/></div>
								<h3>Jos&eacute; F. Rivas</h3>
								<p>Cofundador, CEO y CFO de CPW Online.</p>
							</article>
							<article class="art_fund">
								<div class="img"><img src="../images/equipo/fund_deguerra.png" alt=""/></div>
								<h3>Damaglys E. Guerra</h3>
								<p>Cofundador, COO y CSO de CPW Online.</p>
							</article>
						</section>
					</div>
				</div>
				<div class="col_1" style="background:#386;">
					<div class="col_1_izq" style="width:100%;">
						<h4>Visi&oacute;n</h4>
						<p>&nbsp;&nbsp;&nbsp;
							Nuestra visi&oacute;n es ser la mayor empresa creadora de p&aacute;ginas web en toda latinoam&eacute;rica; ser una empresa, en la cual, todos (empresarios, inversionistas, profesionales o no profesionales)  puedan sentirse c&oacute;modos, sin temor a perder su dinero o esfuerzo; ser un fundamento para muchas empresas que est&eacute;n empezando y una fuente de ayuda para aquellas que m&aacute;s lo necesiten; ofrecer los precios m&aacute;s econ&oacute;micos del mercado y p&aacute;ginas web de calidad.
						</p>
					</div>
				</div>
				<div class="col_1" style="background:#835;">
					<div class="col_1_izq" style="width:100%;">
						<h4>Misi&oacute;n</h4>
						<p>&nbsp;&nbsp;&nbsp;
							Nuestra misi&oacute;n es dar el 100% de nuestra capacidad al crear cada sitio web, sea pequeño o grande; indagar sobre nuevas t&eacute;cnicas y m&eacute;todos para emplearlos en el proceso de creaci&oacute;n de las web, implantar nuevas tecnolog&iacute;as acordes a las funcionalidades de los sitios para mejorar la rapidez, eficiencia y calidad; ser una empresa fiable, responsable, autodid&aacute;ctica y emprendedora; capaz de ayudar, atender y responder a las necesidades de cada cliente.
						</p>
					</div>
				</div>
				<div class="col_1" style="background:#345;">
					<div class="col_1_izq" style="width:100%;">
						<h4>Objetivos</h4>
						<p>
							- Programar cada una de las webs con los lenguajes y Frameworks m&aacute;s r&aacute;pidos, fiables y reconocidos.
							<br>
							- Ofrecer un panel de administraci&oacute;n (SGAC) r&aacute;pido, f&aacute;cil de usar, sencillo y manejable.
							<br>
							- Crear archivos PDF de ayuda para ser desgargados por los usuarios que no tengan la disponibilidad de estar conectados a internet, debido a circunstancias espec&iacute;ficas, para que as&iacute; puedan entender mejor cada uno de los servicios y productos.
							<br>
							- Ofrecer un Sistema (DAL15) que proteja los datos de los clientes, que no tenga vulnerabilidades, que sea confiable, r&aacute;pido y estable.
							<br>
						</p>
					</div>	
				</div>
				<div class="col_1" style="background:#032;">
					<div class="col_1_izq" style="width:100%;">
						<h4>Pol&iacute;ticas</h4>
						<p>
							- La empresa se compromete a no divulgar ninguna de las informaciones proporcionadas por los clientes.
							<br>
							- La empresa no se compromete a descifrar ni descubrir los registros guardados en las bases de datos (a menos que as&iacute; el cliente lo requiera, por extrav&iacute;o o p&eacute;rdida de alguna informaci&oacute;n relevante).
							<br>
							- La empresa se compromete a realizar y verificar los respaldos de su sitio web, en caso de: p&eacute;rdidas de informaci&oacute;n, migraci&oacute;n de los servidores, desaparici&oacute;n de la empresa responsable de hosting y dominio.
							<br>
							- La empresa se compromete a no eliminar los respaldos (en caso de que se hayan hecho) de sitios webs en reposo o suspendidos, para que de esta manera, los datos puedan ser utilizados por el cliente que tuvo el inconveniente al no concretar el ciclo de pagos.
							<br>
							- La empresa no se hace responsable de reclamos hechos por pagos o transacciones no notificadas, le recordamos que todos los pagos deben ser notificados.
							<br>
						</p>
					</div>	
				</div>
				<div class="col_1" style="background:#184;">
					<div class="col_1_izq" style="width:100%;">
						<h4>Acerca de la empresa</h4>
						<p>&nbsp;&nbsp;&nbsp;
							Debido a las dificultades que hay en Venezuela para el registro de nuevas empresas, la empresa CPW Online, por los momentos, no se encuentra registrada en el marco legal venezolano. Mas, el equipo de CPW Online hace todo el esfuerzo para realizar todos los registros necesarios como: registro de derechos de autor, registro de la empresa, registro de patentes, registro de marcas, entre otros. Gracias por su comprensi&oacute;n, en caso de dudas, visite la secci&oacute;n de contacto.<br><br><a class="btn-gen2" href="../contacto/">Contactar</a>
						</p>
					</div>	
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