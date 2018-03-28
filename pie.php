<div class="cab_footer">
	<?php 
		$dir = "cab.php";
		if(file_exists($dir)){
			$lug = "none";
			cab($lug);
		}else{
			$lug = "../none";
			cab($lug);
		}
	?>
</div>
<div class="copy">
	<span>&copy; <?=date('Y')?> Todos los derechos reservados | <strong>CPW Online</strong></span>
</div>