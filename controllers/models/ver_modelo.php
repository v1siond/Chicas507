<?php session_start();
	ob_start();
	require '../../routes/routes.php';
	require '../../models/functions.php';
	require '../../schema/database.php';

	$conexion = conexion($db_config);
	$id_model = articulo($_GET['id']);

	$modelo = obtener_modelo($conexion, $id_model);
	$model = $modelo[0];
	$next = obtener_next_modelo($conexion, $model['codigo']);

	if ($next) {
		$next_model = $next[0];
	}
	$previous = 	obtener_prev_modelo($conexion, $model['codigo']);
	if ($previous) {
		$prev_model = $previous[0];
	}
	$servicios = obtener_servicios_galeria($conexion);
	$fotos_model = obtener_fotos_modelos($conexion);
	$idiomas = obtener_idioma_model($conexion, $id_model);

	require '../../views/models/ver_model.php';
	ob_end_flush();
?>