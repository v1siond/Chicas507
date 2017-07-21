<?php session_start();
	ob_start();
	require '../../routes/routes.php';
	require '../../models/functions.php';
	require '../../schema/database.php';

	$conexion = conexion($db_config);

	if(!$conexion){
		header('Refresh: 1; url=http://www.chicas507.com/error.php');
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$usuario = $_POST['usuario'];
		$pass = $_POST['contra'];
		$pass = hash('sha512', $pass);
		echo $pass;
		if ( ($usuario != null || $usuario != "") && ( $pass != null || $pass != "" )) {
		  $result = $conexion->prepare("SELECT * FROM admin WHERE user_admin = '$usuario' AND pass_admin = '$pass'");
			$result->execute();
			$resultado = $result->fetchAll();
		    if (!empty($resultado)) {
		        $_SESSION['user'] = $usuario;
						header('Refresh: 1; url=' . route_admin);
		    } else {
					echo '<script language="javascript">alert("¡Datos Incorrectos!");</script>';
		    }
		}
	}
	require '../../views/session/new_session.php';
	ob_end_flush();
?>
