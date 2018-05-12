<?php
	require_once('../mysqli_db.php');
	session_start();
	$pa_id = $_POST['pa_id'];
	$pa_imagen = $_FILES['archivo'];
	$url =  '../perfil/img/reportes_pagos/'.$_SESSION['o_usuario'];
	$nombre_imagen = $pa_id."_".$pa_imagen['name'];
	$nombre_completo = $url.'/'.$nombre_imagen;
	if(!is_dir($url))
		mkdir($url);
	if(copy($pa_imagen['tmp_name'], $url.'/'.$nombre_imagen)){
		$con = $mysqli->query("UPDATE pagos SET pa_imagen = '".$nombre_completo."' WHERE pa_id='".$pa_id."' ");
	}
?>