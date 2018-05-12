<div class="vist_plan">
	<div class="den"><h6>Sitio Web:</h6> S&iacute;</div>
	<div class="den"><h6>Dominio:</h6> S&iacute;</div>
	<div class="den"><h6>Hosting:</h6> S&iacute;</div>
	<div class="den"><h6>Administración por SGAC:</h6> DELUXE</div>
	<div class="den"><h6>Dise&ntilde;o web:</h6> Plantilla o personalizado</div>
	<div class="den"><h6>Secci&oacute;n de contacto:</h6> S&iacute;</div>
	<div class="den"><h6>Responsive Design:</h6> Escritorio, tabletas y tel&eacute;fonos</div>
	<div class="den"><h6>Certificado SSL:</h6> S&iacute;</div>
	<div class="den"><h6>Cuentas de correo:</h6> 50</div>
	<div class="den"><h6>Almacenamiento:</h6> 100Gb</div>
	<div class="den"><h6>Diagn&oacute;stico de errores:</h6> S&iacute;</div>
	<div class="den"><h6>Copias de seguridad/d&iacute;a:</h6> S&iacute;</div>
	<div class="den"><h6>Panel de estad&iacute;sticas:</h6> S&iacute;</div>
	<div class="den"><h6>Protecci&oacute;n fuerza bruta:</h6> S&iacute;</div>
	<div class="den"><h6>Indexaci&oacute;n</h6> No</div>
	<div class="den"><h6>Sistema DAL15:</h6> No</div>
	<div class="den"><h6>Procesamiento y memoria:</h6> Normal</div>
	<div class="den"><h6>Servidor:</h6> Normal</div>
	<?php
		$plan = "Deluxe";
		$con = $mysqli->query("SELECT * FROM precios WHERE p_plan = '".$plan."' ORDER BY p_freg");
		while($ro = $con->fetch_array()){
			$p_plan = $ro['p_plan'];
			$p_moneda = $ro['p_moneda'];
			$p_valor = $ro['p_valor'];
	?>
			<div class="den"><h6>Precio (<?=$p_moneda?>):</h6> <?=$p_valor?>/mes</div>
	<?php
		}
	?>
	
	<br>
	<h6>Consulte m&aacute;s informaci&oacute;n en la secci&oacute;n de informaci&oacute;n: 
		<br><br><a class="btn-gen2" href="informacion/#planes_precios">Informaci&oacute;n > Planes y precios</a>
		<a class="btn-gen2" href="modelos/">Ver los modelos disponibles</a>
	</h6>
</div>