<!DOCTYPE HTML>
<html lang="es">
	<head>
		<title>Modelos Web | CPW Online</title>
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
				$lug = "modelos";
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
			<article class="art_6">
				<h3>Modelos de P&aacute;ginas Web</h3>
				<div class="cont_mod">
					<div class="mod_1">
						<img src="mod/1.png" alt=""><br>
						<a style="margin-left:0.4em;" class="btn-gen" href="../contacto/">Contactar</a>
						<a style="margin-left:0.4em;" class="btn-gen2" href="../informacion/#modelos">Leer m&aacute;s</a>
					</div>
					<div class="mod_1">
						<img src="mod/2.png" alt=""><br>
						<a style="margin-left:0.4em;" class="btn-gen" href="../contacto/">Contactar</a>
						<a style="margin-left:0.4em;" class="btn-gen2" href="../informacion/#modelos">Leer m&aacute;s</a>
					</div>
					<div class="mod_1">
						<img src="mod/3.png" alt=""><br>
						<a style="margin-left:0.4em;" class="btn-gen" href="../contacto/">Contactar</a>
						<a style="margin-left:0.4em;" class="btn-gen2" href="../informacion/#modelos">Leer m&aacute;s</a>
					</div>
					<div class="mod_1">
						<img src="mod/4.png" alt=""><br>
						<a style="margin-left:0.4em;" class="btn-gen" href="../contacto/">Contactar</a>
						<a style="margin-left:0.4em;" class="btn-gen2" href="../informacion/#modelos">Leer m&aacute;s</a>
					</div>
					<div class="mod_1">
						<img src="mod/5.png" alt=""><br>
						<a style="margin-left:0.4em;" class="btn-gen" href="../contacto/">Contactar</a>
						<a style="margin-left:0.4em;" class="btn-gen2" href="../informacion/#modelos">Leer m&aacute;s</a>
					</div>
					<div class="mod_1">
						<img src="mod/6.png" alt=""><br>
						<a style="margin-left:0.4em;" class="btn-gen" href="../contacto/">Contactar</a>
						<a style="margin-left:0.4em;" class="btn-gen2" href="../informacion/#modelos">Leer m&aacute;s</a>
					</div>
					<div class="mod_1">
						<img src="mod/7.png" alt=""><br>
						<a style="margin-left:0.4em;" class="btn-gen" href="../contacto/">Contactar</a>
						<a style="margin-left:0.4em;" class="btn-gen2" href="../informacion/#modelos">Leer m&aacute;s</a>
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