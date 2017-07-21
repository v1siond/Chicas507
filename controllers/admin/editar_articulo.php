<?php session_start();
	ob_start();
	require '../../routes/routes.php';
	require '../../models/functions.php';
	require '../../schema/database.php';
	$conexion = conexion($db_config);

	if(!$conexion){

		header('Refresh: 1; url=http://www.chicas507.com/error.php');
	}

	sesion();
	$usuario = $_SESSION['user'];
	$adm = obtener_admin($conexion, $usuario);
	$id_articulo = articulo($_GET['id']);

	if (!$adm) {
		header('Refresh: 1; url=' . route_admin);
	}

	if (empty($id_articulo )) {
		header('Refresh: 1; url=' . route_admin);
	}
	$admin = $adm[0];
	$post = obtener_entrada_id($conexion, $id_articulo);

	if (!$post) {
		header('Refresh: 1; url=' . route_admin);
	}

	$post = $post[0];
	$contador = 0;


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$titulo = limpiarDatos($_POST['titulo']);
		$id = limpiarDatos($_POST['id']);
		$texto = $_POST['texto'];
		$img_guardada = $_POST['old_img'];
		$img = @getimagesize($_FILES['blog_img']['tmp_name']);

		if (empty($img)) {
			$img = $img_guardada;
		}else{
			$carpeta_destino = '../images/';
			$archivo_subido = $carpeta_destino . $_FILES['blog_img']['name'];
			move_uploaded_file($_FILES['blog_img']['tmp_name'], $archivo_subido);
			$img = $_FILES['blog_img']['name'];
		}

		$guardado = $conexion->prepare('UPDATE entradas_blog SET
			entrada = :texto,
			titulo = :titulo,
			imagen_entrada = :imagen
			WHERE id_entrada = :id');

		$guardado->execute(array(
			':texto' => $texto,
			':titulo' => $titulo,
			':imagen' => $img,
			':id' => $id,
			));

		$error = $guardado->errorInfo();
		foreach ($error as $errores) {
			if(empty($errores)){
				$error = '';
				header('Location: http://www.chicas507.com/exito.php');
			}else{
				$error = '<li>' . $errores . '</li>';
			}
		}
	}

	require '../../views/admin/editar_post.php';
?>