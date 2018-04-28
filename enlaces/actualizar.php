<?php
	require_once('../mysqli_db.php');
	session_start();
	$tipo = $_POST['tipo'];
		
	switch($tipo){
		case 'uno':
			$o_moneda = $_POST['o_moneda'];
			$o_plan = $_POST['o_plan'];
			$con = $mysqli->query("SELECT * FROM precios ORDER BY p_freg");
			while($ro = $con->fetch_array()){
				$p_plan = $ro['p_plan'];
				$p_moneda = $ro['p_moneda'];
				$p_valor = $ro['p_valor'];
				
				$precios[$p_plan][$p_moneda] = $p_valor;
			}
			echo $precios[$o_plan][$o_moneda];
		break;
		case 'varios':
			$o_moneda = $_POST['o_moneda'];
			$con = $mysqli->query("SELECT * FROM precios WHERE p_moneda = '".$o_moneda."' ORDER BY p_freg");
			$a = 1;
			while($ro = $con->fetch_array()){
				$p_valor = $ro['p_valor'];
				$p_moneda = $ro['p_moneda'];
				if($p_valor!="No disponible")
					$p_valor.="/mes";
				else
					$p_moneda = "";
?>
				<script>
					document.querySelector('#cpwonline .ult<?=$a?>').innerHTML = "<?=$p_moneda?> <?=$p_valor?>";
				</script>
<?php
				$a++;
			}
		break;
		case 'pagos':
?>
			<div class="fil pr">
			<div class="cam">ID de pago</div>
			<div class="cam">Cantidad</div>
			<div class="cam">Moneda</div>
			<div class="cam">M&eacute;todo</div>
			<div class="cam">Confirmado</div>
			<div class="cam">Comentarios</div>
			<div class="cam">Fecha de registro</div>
			<div class="cam">Imagen</div>
			</div>
			<?php
			$con = $mysqli->query("SELECT * FROM pagos WHERE pa_usuario = '".$_SESSION['o_usuario']."' ");
			if($con->num_rows === 0)
				echo 'No hay pagos reportados';
			while($ro = $con->fetch_array()){
				$pa_id = $ro['pa_id'];
				$pa_cantidad = $ro['pa_cantidad'];
				$pa_moneda = $ro['pa_moneda'];
				$pa_metodo = $ro['pa_metodo'];
				$pa_confirmado = $ro['pa_confirmado'];
				if($pa_confirmado) $pa_confirmado = "<strong>Aprobado</strong>"; else $pa_confirmado = "En espera";
				$pa_imagen = $ro['pa_imagen'];
				$pa_comentarios = $ro['pa_comentarios'];
				$pa_freg = $ro['pa_freg'];
			?>
				<div class="fil">
					<div class="cam"><?=$pa_id?></div>
					<div class="cam"><?=$pa_cantidad?></div>
					<div class="cam"><?=$pa_moneda?></div>
					<div class="cam"><?=$pa_metodo?></div>
					<div class="cam"><?=$pa_confirmado?></div>
					<div class="cam"><?=$pa_comentarios?></div>
					<div class="cam"><?=$pa_freg?></div>
			<?php
					if(empty($pa_imagen)){
			?>
						<div class="cam" tag="<?=$pa_id?>">
								<input type="file" name="pa_imagen" tag="pa_imagen_<?=$pa_id?>"/>
								<a class="btn-gen subir_imagen_pago"  tag="<?=$pa_id?>">Subir</a>
							</div>
			<?php
					}else{
						echo '<div class="cam">S&iacute;</div>';
					}
			?>
					<div class="cam"><a class="btn-gen2 eliminar_pago" tag="<?=$pa_id?>">Eliminar<i class="<?=$pa_id?>" tag="<?=$pa_imagen?>"></i></a></div>
				</div>
			<?php
			}
		break;
	}
?>