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
	if (!$adm) {
		header('Refresh: 1; url=' . route_admin);
	}
	$admin = $adm[0];

	if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {

		$titulo = limpiarDatos($_POST['titulo']);
		$texto = $_POST['texto'];
		$img = @getimagesize($_FILES['blog_img']['tmp_name']);
		$carpeta_destino = '../images/';
		$archivo_subido = $carpeta_destino . $_FILES['blog_img']['name'];
		move_uploaded_file($_FILES['blog_img']['tmp_name'], $archivo_subido);
		$id = $admin['id_admin'];

		$guardado = $conexion->prepare(
			'INSERT INTO entradas_blog (autor, entrada, fecha, id_entrada, imagen_entrada, titulo)
			VALUES (:autor, :entrada, now(), null, :imagen, :titulo)'
			);
		$guardado->execute(array(
			':autor' => $id,
			':entrada' => $texto,
			':imagen' => $_FILES['blog_img']['name'],
			':titulo' => $titulo
			));

		$error = $guardado->errorInfo();
		foreach ($error as $errores) {
			if(empty($errores)){
				header('Location: http://www.chicas507.com/exito.php');
			}
		}
	}

	require '../../views/admin/nuevo_post.php';
?>