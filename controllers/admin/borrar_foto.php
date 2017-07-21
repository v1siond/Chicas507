<?php session_start();
	ob_start();
	require '../../routes/routes.php';
	require '../../models/functions.php';
	require '../../schema/database.php';

	sesion();

	$conexion = conexion($db_config);

	if(!$conexion){
		header('Location: http://www.chicas507.com/error.php');
	}
	sesion();

	$usuario = $_SESSION['user'];

    $modelo = obtener_modelos_admin($conexion, $usuario);
	$model = $modelo[0];
	$model_id = $model['codigo'];
	$id = limpiarDatos($_GET['id']);

	if (!$id) {
		header('Location: http://www.chicas507.com/error.php');
	}else{
		$consulta = $conexion->prepare('DELETE FROM fotos_modelo WHERE id_foto = :id AND modelo = :codigo');
		$consulta->execute(array(':id' => $id, ':codigo' => $model_id));
		$error = $consulta->errorInfo();
		foreach ($error as $errores) {
			if(empty($errores) || $error == 0){
				$error = '';
				header('Location: http://www.chicas507.com/exito.php');
			}else{
				header('Location: http://www.chicas507.com/error.php');
			}
		}
	}
	ob_end_flush();
?>