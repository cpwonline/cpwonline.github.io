<?php
	session_start();
	require_once('../mysqli_db.php');
	$tipo = $_POST['tipo'];
	
	switch($tipo){
		case 'iniciar':
			$o_usuario = make_safe($_POST['o_usuario']);
			$o_clave = make_safe($_POST['o_clave']);
			$contador = $_POST['contador'];
			
			$con = $mysqli->query("SELECT * FROM ordenes WHERE o_usuario = '".$o_usuario."' AND o_clave = '".$o_clave."' LIMIT 1");
			if($con->num_rows===0){
				echo "Usuario o clave incorrectos. ";
				if($contador>9){
					$con2 = $mysqli->query("UPDATE ordenes SET o_estado_cuenta = 'Bloqueado' WHERE o_usuario = '".$o_usuario."' ");
					if($con2)
						echo "Usted ha alcanzado el l&iacute;mite de intentos fallidos. ";
					echo "Comun&iacute;quese con los desarrolladores.";
				}
				exit;
			}
			$row = $con->fetch_array();
			$o_admin = $row['o_admin'];
			if($row['o_estado_cuenta']!="Bloqueado"){
				$_SESSION['o_usuario'] = $o_usuario;
				$_SESSION['o_admin'] = $o_admin;
?>
				<script type="text/javascript">
					window.location.reload();
				</script>
<?php
			}else{
				echo "Disculpe, este usuario est&aacute; bloqueado. Comun&iacute;quese con los desarrolladores.";
			}
		break;
		case 'cerrar':
			if(!empty($_SESSION['o_usuario'])){
				session_destroy();
?>
				<script>
					window.location.reload();
				</script>
<?php
			}else{
				echo 'Disculpe, ha ocurrido un error.';
			}
		break;
	}
?>










