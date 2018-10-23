<?php
	function etiq($prin, $sla){
		if($sla=="/"){
			$tab = [
				0 => "Home",
				"modelos/" => "Modelos",
				"contacto/" => "Contacto",
				"informacion/" => "Informaci&oacute;n",
				"nosotros/" => "Nosotros"
			];
?>
				<div class="logo"><a href=""><img src="images/logo.png" alt=""/></a></div>
				<img class="nav_icon" src="images/nav_icon.png" alt=""/>
				<nav class="menu">
					<ul class="menu">
						<li class="cerrar_nav"><a class="cerrar_nav">x</a></li>
<?php			
						foreach($tab as $i => $elemento){
							if($elemento == "Home")
								$v = "";
							else
								$v = $i;
							if($elemento==$prin){
								?><li><a id="prin" href="<?=$v?>"><?=$elemento?></a></li><?php
							}else{
								?><li><a href="<?=$v?>"><?=$elemento?></a></li><?php
							}
						}
?>
					</ul>
				</nav>
<?php
		}elseif($sla=="../"){
			$tab = [
				"../" => "Home",
				"../modelos/" => "Modelos",
				"../contacto/" => "Contacto",
				"../informacion/" => "Informaci&oacute;n",
				"../nosotros/" => "Nosotros"
			];
?>
				<div class="logo"><a href="../"><img src="../images/logo.png" alt=""/></a></div>
				<img class="nav_icon" src="../images/nav_icon.png" alt=""/>
				<nav class="menu">
					<ul class="menu">
						<li class="cerrar_nav"><a class="cerrar_nav">x</a></li>
<?php			
						foreach($tab as $i => $elemento){
							if($elemento==$prin){
								?><li><a id="prin" href="<?=$i?>"><?=$elemento?></a></li><?php
							}else{
								?><li><a href="<?=$i?>"><?=$elemento?></a></li><?php
							}
						}
?>
					</ul>
				</nav>
<?php
		}
	}
	
	//Función principal de la cabecera
	function cab(&$lug){
		$sla = ["/", "../"];
		if($lug=="home"){
			$prin = "Home";
			echo etiq($prin, $sla[0]);
		}elseif($lug=="modelos"){
			$prin = "Modelos";
			echo etiq($prin, $sla[1]);
		}elseif($lug=="contacto"){
			$prin = "Contacto";
			echo etiq($prin, $sla[1]);
		}elseif($lug=="informacion"){
			$prin = "Informaci&oacute;n";
			echo etiq($prin, $sla[1]);
		}elseif($lug=="nosotros"){
			$prin = "Nosotros";
			echo etiq($prin, $sla[1]);
		}elseif($lug=="none"){
			$prin = "none";
			echo etiq($prin, $sla[0]);
		}elseif($lug=="../none"){
			$prin = "none";
			echo etiq($prin, $sla[1]);
		}
	}
?>
