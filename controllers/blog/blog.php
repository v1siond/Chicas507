<?php session_start();
	ob_start();
	require '../../routes/routes.php';
	require '../../models/functions.php';
	require '../../schema/database.php';

	$conexion = conexion($db_config);

	if(!$conexion){
		header('Location: http://www.chicas507.com/error.php');
	}

	$entradas = obtener_post($blog_config['post_por_pagina'], $conexion);
	$limite = 5;
	$entradas_last = obtener_post($limite, $conexion);

	if (!$entradas) {
		header('Location:' . route_blog_index);
	}

	require '../../views/blog/index.php';
	ob_end_flush();
?>
