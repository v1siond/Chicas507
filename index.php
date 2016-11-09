<?php 
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=chicas507','root','');
	} catch (Exception $e) {

		echo "ERROR: " . $e->getMessage();
		die();
	}

	$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$modelosPorFila = 24;

	$inicio = ($pagina > 1) ? ($pagina * $modelosPorFila - $modelosPorFila) : 0;

	$modelos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM modelo LIMIT $inicio, $modelosPorFila");

	$modelos->execute();
	$modelos = $modelos->fetchAll();

	$imagen_nacionalidad = $conexion->prepare("SELECT imagen_naci * FROM nacionalidad");

    $imagen_nacionalidad->execute();
    $imagen_nacionalidad=$imagen_nacionalidad->fetchAll();
	
	if (!$modelos) {
		header('Location: index_view.php');
	}

	require 'index_view.php';
	
 ?>