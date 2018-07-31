<!DOCTYPE HTML>
<html lang="es">
	<head>
		<title>Informaci&oacute;n | CPW Online</title>
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
				$lug = "informacion";
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
					<div class="col_1_izq">
						<h4>Descarga nuestros PDFs</h4>
						<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Si deseas tener todos nuestros manuales, informaciones, modelos, planes, entre otras cosas; descarga nuestros PDFs con informaci&oacute;n m&aacute;s detallada para que est&eacute;s con nostros <strong>Online</strong> y <strong>Offline</strong>.</p>
					</div>
					<div class="col_1_der">
						<img src="img_inf_pdf.png" alt=""/><br>
					</div>
				</div>
				<div class="col_1" style="background:#386;" id="inf_compra">
					<div class="col_1_izq">
						<h4>Informaci&oacute;n de compra</h4>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Este PDF relata todo lo necesario para que usted pueda obtener su deseada p&aacute;gina web, tantos los requisitos necesarios, como informaciones importantes, entre otros.
						</p>
					</div>
					<div class="col_1_der">
						<img class="exc" src="img/informacion_compra_cpwonline.png" alt=""/><br>
						<a class="btn-gen2" href="pdf/informacion_compra_cpwonline.pdf" target="_blank">Descargar</a>
					</div>
				</div>
				<div class="col_1" style="background:#835;" id="planes_precios">
					<div class="col_1_izq">
						<h4>Planes y Precios</h4>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Si desea saber nuestros incre&iacute;bles precios revise este PDF lleno de toda la informaci&oacute;n que todos quieren ver.
						</p>
					</div>
					<div class="col_1_der">
						<img class="exc" src="img/planes_precios_cpwonline.png" alt=""/><br>
						<a class="btn-gen2" href="pdf/planes_precios_cpwonline.pdf" target="_blank">Descargar</a>
					</div>
				</div>
				<div class="col_1" style="background:#345;" id="modelos">
					<div class="col_1_izq">
						<h4>Modelos de p&aacute;ginas web</h4>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El PDF <i>"Modelos de p&aacute;ginas web"</i> le mostrar&aacute; a usted las plantillas m&aacute;s actuales, desarrolladas en un 100% por CPW Online; cada una de ellas cuenta con perfecta sincronizaci&oacute;n con el sistema <strong>SGAC</strong>
						</p>
					</div>
					<div class="col_1_der">
						<img class="exc" src="img/modelos_web_cpwonline.png" alt=""/><br>
						<a class="btn-gen2" href="pdf/modelos_web_cpwonline.pdf" target="_blank">Descargar</a>
					</div>
				</div>
				<div class="col_1" style="background:#938;display:none;" id="dal15">
					<div class="col_1_izq">
						<h4>Sistema DAL15</h4>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proporciona toda la informaci&oacute;n y funcionamiento de este avanzad&iacute;simo sistema de cifrado/descifrado desarrollado totalmente por CPW Online.
						</p>
					</div>
					<div class="col_1_der">
						<img class="exc" src="img/dal15_cpwonline.png" alt=""/><br>
						<a class="btn-gen2" href="pdf/dal15_cpwonline.pdf" target="_blank">Descargar</a>
					</div>
				</div>
				<div class="col_1" style="background:#883;display:none;" id="sgac">
					<div class="col_1_izq">
						<h4>Sistema SGAC</h4>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Este es uno de los PDF's m&aacute;s fundamentales e importantes que usted debe de tener en su SmartPhone, ya que le proporciona todo un manual para poder utilizar y controlar el sistema SGAC desarrollado en su totalidad por CPW Online.
						</p>
					</div>
					<div class="col_1_der">
						<img class="exc" src="img/sgac_manual_cpwonline.png" alt=""/><br>
						<a class="btn-gen2" href="pdf/sgac_manual_cpwonline.pdf" target="_blank">Descargar</a>
					</div>
				</div>
				<div class="col_1" style="background:#092;" id="empresa">
					<div class="col_1_izq">
						<h4>Informaci&oacute;n de la empresa</h4>
						<p>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Este PDF lo puede leer directamente en la p&aacute;gina <i>Nosotros</i>. Proporciona toda la informaci&oacute;n acerca de CPW Online como empresa.
						</p>
					</div>
					<div class="col_1_der">
						<img class="exc" src="img/empresa_cpwonline.png" alt=""/><br>
						<a class="btn-gen2" href="pdf/empresa_cpwonline.pdf" target="_blank">Descargar</a>
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