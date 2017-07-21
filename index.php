<?php session_start();
	ob_start();
	require 'routes/routes.php';
	require 'models/functions.php';
	require 'schema/database.php';
	require 'views/home/index.php';
	ob_end_flush();
?>