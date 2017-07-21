<?php session_start();
	ob_start();
	require '../../routes/routes.php';
	require '../../models/functions.php';
	require '../../schema/database.php';

	$conexion = conexion($db_config);

	$modelos = obtener_modelos($conexion);
	$servicios = obtener_servicios_galeria($conexion);
	$fotos_model = obtener_fotos_modelos($conexion);

	require '../../views/models/index.php';
	ob_end_flush();
?>