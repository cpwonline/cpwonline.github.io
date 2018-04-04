<?php
	require_once('../mysqli_db.php');
	session_start();
	$tipo = $_POST['tipo'];
		
	switch($tipo){
		case 'pago':
			$pa_id = $_POST['pa_id'];
			$pa_imagen = $_POST['pa_imagen'];
			$con = $mysqli->query("DELETE FROM pagos WHERE pa_id = '".$pa_id."' ");
			if($con){
				echo 'El pago fue borrado con &eacute;xito, actualice la secci&oacute;n <i>Mis Pagos</i> para ver sus pagos.';
				if(!empty($pa_imagen)) unlink($pa_imagen);
			}else
				echo 'Ha ocurrido un error al intentar borrar el pago, intente nuevamente.';
		break;
		case 'datos_oficiales':
			$do_id = $_POST['do_id'];
			$con = $mysqli->query("DELETE FROM datos_oficiales WHERE do_id = '".$do_id."' ");
			if($con){
				echo 'El dato oficial fue borrado exitosamente.';
			}else
				echo 'Ha ocurrido un error al intentar borrar el dato oficial, intente nuevamente.';
		break;
		case 'informacion_u':
			$iu_id = $_POST['iu_id'];
			$con = $mysqli->query("DELETE FROM informaciones_u WHERE iu_id = '".$iu_id."' ");
			if($con){
				echo 'La informaci&oacute;n fue borrada exitosamente.';
			}else
				echo 'Ha ocurrido un error al intentar borrar la informaci&oacute;n, intente nuevamente.';
		break;
		case 'orden':
			$o_id = $_POST['o_id'];
			$con = $mysqli->query("DELETE FROM ordenes WHERE o_id = '".$o_id."' ");
			if($con){
				echo 'La orden fue borrada exitosamente.';
			}else
				echo 'Ha ocurrido un error al intentar borrar la orden, intente nuevamente.';
		break;
	}
?>