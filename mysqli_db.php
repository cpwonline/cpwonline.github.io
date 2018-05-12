<?php
	$dat = 0;
	if($dat){
		/*Conexión a la base de datos de CPW Online*/
			$mysqli = new mysqli('142.44.139.35', 'cpwonlin_general', 'Juniorydamaglys2', 'cpwonlin_general');
			if($mysqli->connect_errno){
				echo "\n Fallo al conectar a la base de datos.\n";
				echo "\n".$mysqli->connect_errno."\n";
				exit; 
			}
	}else{
		/*Conexión a la base de datos local*/
			$mysqli = new mysqli('localhost', 'josefelixrc', '26552160', 'web_cpwonline');
			if($mysqli->connect_errno){
				echo "\n Fallo al conectar a la base de datos.\n";
				echo "\n".$mysqli->connect_errno."\n";
				exit;
			}
	}
	function verificacion_ciclo($dia, $mes){
		$hoy_dia = date('d');
		$hoy_mes = date('m');
		if($hoy_dia > $dia && $hoy_mes == $mes)
			return false;
		if($hoy_dia < $dia && $hoy_mes > $mes)
			return false;
		if($hoy_dia >= $dia && $hoy_mes > $mes)
			return true;
	}
	function mes($num){
		$mes = array();
		$mes = [
			"01" => "Enero",
			"02" => "Febrero",
			"03" => "Marzo",
			"04" => "Abril",
			"05" => "Mayo",
			"06" => "Junio",
			"07" => "Julio",
			"08" => "Agosto",
			"09" => "Septiembre",
			"10" => "Octubre",
			"11" => "Noviembre",
			"12" => "Diciembre",
			1 => "Enero",
			2 => "Febrero",
			3 => "Marzo",
			4 => "Abril",
			5 => "Mayo",
			6 => "Junio",
			7 => "Julio",
			8 => "Agosto",
			9 => "Septiembre"
		];
		return $mes[$num];
	}
	function make_safe($v) {
		$v = addslashes(trim($v));
		return $v;
	} 
?>