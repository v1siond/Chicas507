<?php session_start();
	ob_start();
	require '../../routes/routes.php';
	require '../../models/functions.php';
	require '../../schema/database.php';


	$conexion = conexion($db_config);
	$id_articulo = articulo($_GET['id']);

	if(!$conexion){

		header('Refresh: 1; url=http://www.chicas507.com/error.php');
	}

	if (empty($id_articulo )) {
		header('Refresh: 1; url=' . route_blog_index);
	}

	$post = obtener_entrada_id($conexion, $id_articulo);

	if (!$post) {
		header('Refresh: 1; url=' . route_blog_index);
	}

	$post = $post[0];
	$contador = 0;
	$limite = 5;
	$entradas_last = obtener_post($limite, $conexion);
	$previous =obtener_next_post($conexion, $id_articulo);
	$next = obtener_prev_post($conexion, $id_articulo);
	if ($next) {
		$next_post = $next[0];
	}
	if ($previous) {
		$prev_post = $previous[0];
	}

	require '../../views/blog/ver_post.php';
	ob_end_flush();
?>