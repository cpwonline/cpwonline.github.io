<!DOCTYPE HTML>
<html lang="es">
	<head>
		<title>Perfil | CPW Online</title>
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
			session_start();
			require_once('../mysqli_db.php');
		?>
	</head>
	<body id="cpwonline">
		<header class="cabecera">
			<?php
				$dir = "cab.php";
				$lug = "../none";
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
			<article class="art_9">
				<?php
					if(empty($_SESSION['o_usuario'])){
				?>
						<section class="login">
							<h4>¡Bienvenido! Ingrese sus datos para acceder.</h4>
							<h5>¡Ten tu web con CPW Online!</h5>
							<div class="cont_input">
								<input type="text" name="o_usuario" placeholder="Usuario"/>
								<input type="password" name="o_clave" placeholder="Clave"/>
								<input type="hidden" name="contador" value="1"/>
							</div>
							<a class="btn-gen" tag="sesion_iniciar">Iniciar sesi&oacute;n</a>
							<a class="btn-gen" tag="olvide_clave">Olvid&eacute; mi contrase&ntilde;a</a>
						</section>
				<?php
					}else{
						if($_SESSION['o_admin']=="0"){
							include('0.php');
						}elseif($_SESSION['o_admin']=="1"){
							include('1.php');
						}
					}
				?>
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