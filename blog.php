<?php 
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=chicas507','root','');
	} catch (Exception $e) {

		echo "ERROR: " . $e->getMessage();
		die();
	}

	$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$postPorpagina = 5;

	$inicio =($pagina > 1) ? ($pagina * $postPorpagina - $postPorpagina) : 0;

	$entradas = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM entradas_blog LIMIT $inicio, $postPorpagina");

	$entradas->execute();
	$entradas = $entradas->fetchAll();
	
	if (!$entradas) {
		header('Location: blog.php');
	}

	$totalEntradas = $conexion->query('SELECT FOUND_ROWS() as total');
	$totalEntradas = $totalEntradas->fetch()['total'];

	$numeroPagina = ceil($totalEntradas / $postPorpagina);
	require 'blog_view.php';
	
 ?>