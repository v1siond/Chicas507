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

	$id = limpiarDatos($_GET['id']);

	if (!$id) {
		header('Location: http://www.chicas507.com/error.php');
	}else{

		$consulta1 = $conexion->prepare('SELECT codigo FROM modelo WHERE codigo = :user LIMIT 1');
		$consulta1->execute(array(':user' => $id));
		$result = $consulta1->fetchAll();

		if(!$result){
			header('Location: http://www.chicas507.com/error.php');
		}else{
			$delete_photo = $conexion->prepare('DELETE FROM fotos_modelo WHERE modelo = :id');
			$delete_photo->execute(array(':id' => $id));
			$error = $delete_photo->errorInfo();
			foreach ($error as $errores) {
				if(empty($errores) || $error == 0){
					$error = '';
					header('Location: http://www.chicas507.com/exito.php');
				}else{
					echo $errores;
					header('Location: http://www.chicas507.com/error.php');
				}
			}

			$delete_video = $conexion->prepare('DELETE FROM video_modelo WHERE modelo_video = :id');
			$delete_video->execute(array(':id' => $id));
			$error = $delete_video->errorInfo();
			foreach ($error as $errores) {
				if(empty($errores) || $error == 0){
					$error = '';
					header('Location: http://www.chicas507.com/exito.php');
				}else{
					echo $errores;
					header('Location: http://www.chicas507.com/error.php');
				}
			}
			$delete_model = $conexion->prepare('DELETE FROM modelo WHERE codigo = :id');
			$delete_model->execute(array(':id' => $id));
			$error = $delete_model->errorInfo();
			foreach ($error as $errores) {
				if(empty($errores) || $error == 0){
					$error = '';
					header('Location: http://www.chicas507.com/exito.php');
				}else{
					echo $errores;
					header('Location: http://www.chicas507.com/error.php');
				}
			}
		}
	}
	ob_end_flush();
?>