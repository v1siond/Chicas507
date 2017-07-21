 <?php

 	function conexion($db_config){

		try {
			$conexion = new PDO('mysql:host=localhost;dbname='.$db_config['basedatos'], $db_config['user'], $db_config['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
			return $conexion;
		} catch (Exception $e) {
			echo $e.getMessage();
			return false;
		}

 	}

 	function limpiarDatos($datos){

 		$datos = trim($datos);
 		$datos = stripslashes($datos);
 		$datos = htmlspecialchars($datos);
 		return $datos;
 	}

 	function pagina_actual(){

 		return isset($_GET['p']) ? (int)$_GET['p'] : 1;

 	}

 	function numero_paginas($post_por_pagina, $conexion){

		$total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
		$total_post->execute();
		$total_post = $total_post->fetch()['total'];

		$numero_paginas = ceil($total_post / $post_por_pagina);
		return $numero_paginas;
 	}

 	function obtener_post($post_por_pagina, $conexion){

 		$inicio = (pagina_actual() > 1) ? (pagina_actual() * $post_por_pagina - $post_por_pagina) : 0;
 		$entradas = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM entradas_blog b LEFT JOIN admin a ON b.autor = a.id_admin GROUP BY b.id_entrada ORDER BY b.id_entrada DESC LIMIT $inicio, $post_por_pagina");
 		$entradas->execute();
		return $entradas->fetchAll();

 	}

 	function obtener_post_mes_año($conexion){

 		$entradas = $conexion->prepare("SELECT DATE_FORMAT(fecha, '%Y') as year, DATE_FORMAT(fecha, '%m') as month, titulo, id_entrada FROM blog ORDER BY year DESC");
 		$entradas->execute();
		return $entradas->fetchAll();
 	}

 	function articulo($id){
 		return (int)limpiarDatos($id);
 	}


 	function obtener_entrada_id($conexion, $id){

 		$result = $conexion->query("SELECT * FROM entradas_blog b LEFT JOIN admin a ON b.autor = a.id_admin WHERE id_entrada = $id GROUP BY b.id_entrada LIMIT 1 ");
 		$result = $result->fetchAll();
 		return($result) ? $result : false;
 	}

 	function obtener_entrada_autor($post_por_pagina, $conexion, $user){

 		$inicio = (pagina_actual() > 1) ? (pagina_actual() * $post_por_pagina - $post_por_pagina) : 0;
 		$result = $conexion->prepare("SELECT * FROM admin a INNER JOIN entradas_blog b ON b.autor = a.id_admin WHERE user_admin = '$user' GROUP BY b.id_entrada ORDER BY b.id_entrada DESC LIMIT $inicio, $post_por_pagina");
 		$result->execute();
 		return $result->fetchAll();
 	}

 	function obtener_next_post($conexion, $id){

 		$prev_model = $conexion->prepare("SELECT * FROM entradas_blog
 			WHERE id_entrada > '$id' LIMIT 1");
 		$prev_model->execute();
		return $prev_model->fetchAll();

 	}

 	function obtener_prev_post($conexion, $id){

 		$prev_model = $conexion->prepare("SELECT * FROM entradas_blog
 			WHERE id_entrada < '$id' LIMIT 1");
 		$prev_model->execute();
		return $prev_model->fetchAll();

 	}

 	function fecha($fecha){

 		$timestamp = strtotime($fecha);
 		$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

 		$dia = date('d', $timestamp);
 		$mes = date('m', $timestamp) - 1;
 		$año = date('y', $timestamp);

 		$fecha = "$dia de " . $meses[$mes] . " del 20$año";
 		return $fecha;
 	}

 	function obtener_idioma($conexion){

 		$modelos = $conexion->prepare("SELECT * FROM idioma
			ORDER BY id_idioma DESC
 			");
 		$modelos->execute();
		return $modelos->fetchAll();

 	}

 	function obtener_idioma_model($conexion, $id){

 		$modelos = $conexion->prepare("SELECT * FROM modelo m
			LEFT JOIN idioma_modelo im ON m.codigo = im.model
			LEFT JOIN idioma i ON i.id_idioma = im.idio
			WHERE m.codigo = '$id' ORDER BY i.id_idioma DESC");
 		$modelos->execute();
		return $modelos->fetchAll();

 	}

 	function obtener_modelos($conexion){

 		$modelos = $conexion->prepare("SELECT * FROM modelo m
			LEFT JOIN idioma_modelo im ON m.codigo = im.model
			LEFT JOIN idioma i ON i.id_idioma = im.idio
      LEFT JOIN servs_modelo sm ON m.codigo = sm.model
			LEFT JOIN servicios s ON s.id_serv = sm.servs
      LEFT JOIN nacionalidad n on m.nacionalidad = n.id_nacion
      LEFT JOIN distritos d ON d.id_distrito = m.zona
      LEFT JOIN fotos_modelo fm on m.codigo = fm.modelo
      LEFT JOIN video_modelo vm ON vm.modelo_video = m.codigo
			GROUP BY m.codigo ORDER BY m.codigo DESC
 			");
 		$modelos->execute();
		return $modelos->fetchAll();

 	}

 	function obtener_modelo_last($conexion){

 		$modelos = $conexion->prepare("SELECT codigo FROM modelo ORDER BY codigo DESC LIMIT 1
 			");
 		$modelos->execute();
		return $modelos->fetchAll();

 	}

 	function obtener_modelo($conexion, $id){

 		$modelo = $conexion->prepare("SELECT * FROM modelo m
			LEFT JOIN idioma_modelo im ON m.codigo = im.model
			LEFT JOIN idioma i ON i.id_idioma = im.idio
  		LEFT JOIN servs_modelo sm ON m.codigo = sm.model
			LEFT JOIN servicios s ON s.id_serv = sm.servs
  		LEFT JOIN nacionalidad n ON m.nacionalidad = n.id_nacion
  		LEFT JOIN distritos d ON d.id_distrito = m.zona
  		LEFT JOIN fotos_modelo fm ON m.codigo = fm.modelo
			WHERE m.codigo = '$id' LIMIT 1
 			");
 		$modelo->execute();
		return $modelo->fetchAll();
 	}

 	function obtener_next_modelo($conexion, $id){

 		$prev_model = $conexion->prepare("SELECT * FROM modelo
 			WHERE codigo > '$id' LIMIT 1");
 		$prev_model->execute();
		return $prev_model->fetchAll();

 	}

 	function obtener_prev_modelo($conexion, $id){

 		$prev_model = $conexion->prepare("SELECT * FROM modelo
 			WHERE codigo < '$id' LIMIT 1");
 		$prev_model->execute();
		return $prev_model->fetchAll();

 	}

 	function lista_modelos($conexion){

 		$modelo = $conexion->prepare("SELECT codigo, nombre_model, email FROM modelo
 			ORDER BY codigo DESC
 			");
 		$modelo->execute();
		return $modelo->fetchAll();

 	}

 	function obtener_fotos_modelos($conexion){

 		$modelo = $conexion->prepare("SELECT * FROM fotos_modelo fm
			LEFT JOIN modelo m ON fm.modelo = m.codigo
			ORDER BY  m.codigo DESC
 			");
 		$modelo->execute();
		return $modelo->fetchAll();
 	}

 	function obtener_fotos_modelo_admin($conexion, $id){

 		$modelo = $conexion->prepare("SELECT * FROM fotos_modelo fm
			LEFT JOIN modelo m ON fm.modelo = m.codigo
			WHERE m.codigo = '$id'
			ORDER BY fm.id_foto
 			");
 		$modelo->execute();
		return $modelo->fetchAll();
 	}

 	function review_fotos($conexion, $id){

 		$modelo = $conexion->prepare("SELECT * FROM fotos_modelo fm
			LEFT JOIN modelo m ON fm.modelo = m.codigo
            WHERE m.codigo = '$id'
 			");
 		$modelo->execute();
		return $modelo->fetchAll();
 	}

 	function obtener_fotos_id($conexion, $id){

 		$foto_id = $conexion->prepare("SELECT *, COUNT(fm.modelo) as cantidad_foto FROM fotos_modelo fm
			LEFT JOIN modelo m ON fm.modelo = m.codigo
			WHERE fm.modelo = $id ORDER BY m.codigo LIMIT 1
 			");
 		$foto_id->execute();
		return $foto_id->fetchAll();
 	}

 	function obtener_fotos_upload($conexion, $id){

 		$foto_id = $conexion->prepare("SELECT * FROM fotos_modelo fm
			LEFT JOIN modelo m ON fm.modelo = m.codigo
			WHERE fm.modelo = $id ORDER BY fm.id_foto
 			");
 		$foto_id->execute();
		return $foto_id->fetchAll();
 	}

 	function obtener_video_upload($conexion, $id){

 		$foto_id = $conexion->prepare("SELECT * FROM video_modelo vm
			LEFT JOIN modelo m ON vm.modelo_video = m.codigo
			WHERE vm.modelo_video = $id ORDER BY vm.id_video
 			");
 		$foto_id->execute();
		return $foto_id->fetchAll();
 	}

 	function obtener_videos_id($conexion, $id){

 		$video_id = $conexion->prepare("SELECT *, COUNT(vm.modelo_video) as cantidad_video FROM video_modelo vm
			LEFT JOIN modelo m ON vm.modelo_video = m.codigo
			WHERE vm.modelo_video = '$id' ORDER BY m.codigo LIMIT 1
 			");
 		$video_id->execute();
		return $video_id->fetchAll();
 	}

 	function obtener_videos_modelos($conexion){

 		$medicos = $conexion->prepare("SELECT * FROM video_modelo vm
			LEFT JOIN modelo m ON vm.modelo_video = m.codigo
			ORDER BY m.codigo
 			");
 		$medicos->execute();
		return $medicos->fetchAll();
 	}

 	function obtener_videos_modelos_admin($conexion, $id){

 		$medicos = $conexion->prepare("SELECT * FROM video_modelo vm
			LEFT JOIN modelo m ON vm.modelo_video = m.codigo
			WHERE m.codigo = '$id' ORDER BY m.codigo
 			");
 		$medicos->execute();
		return $medicos->fetchAll();
 	}

 	function review_video($conexion, $id){

 		$medicos = $conexion->prepare("SELECT * FROM video_modelo vm
			LEFT JOIN modelo m ON vm.modelo_video = m.codigo
			WHERE m.codigo = '$id' LIMIT 1
 			");
 		$medicos->execute();
		return $medicos->fetchAll();
 	}

 	function review_model($conexion, $id){

 		$medicos = $conexion->prepare("SELECT * FROM modelo m
			LEFT JOIN idioma_modelo im ON m.codigo = im.model
			LEFT JOIN idioma i ON i.id_idioma = im.idio
      LEFT JOIN servs_modelo sm ON m.codigo = sm.model
			LEFT JOIN servicios s ON s.id_serv = sm.servs
      LEFT JOIN nacionalidad n ON m.nacionalidad = n.id_nacion
      LEFT JOIN distritos d ON d.id_distrito = m.zona
      LEFT JOIN fotos_modelo fm ON m.codigo = fm.modelo
      LEFT JOIN video_modelo vm ON vm.modelo_video = m.codigo
			WHERE m.codigo = '$id' LIMIT 1
 			");
 		$medicos->execute();
		return $medicos->fetchAll();
 	}


 	function obtener_admin($conexion, $user){

 		$admin = $conexion->prepare("SELECT * FROM admin
 			WHERE user_admin = '$user' LIMIT 1
 			");
 		$admin->execute();
		return $admin->fetchAll();
 	}

 	function obtener_servicios_galeria($conexion){

 		 $result = $conexion->query("SELECT * FROM servicios s
            LEFT JOIN servs_modelo sm ON s.id_serv = sm.servs ORDER BY sm.model");
 		 $result = $result->fetchAll();
 		 return($result) ? $result : false;
 	}


 	function obtener_servicios($conexion){

 		 $result = $conexion->query("SELECT * FROM servicios ORDER BY id_serv");
 		 $result = $result->fetchAll();
 		 return($result) ? $result : false;
 	}

 	function obtener_servicios_model($conexion, $id){

 		 $result = $conexion->prepare("SELECT * FROM servicios s
            LEFT JOIN servs_modelo sm ON s.id_serv = sm.servs
            LEFT JOIN modelo m ON m.codigo = sm.model
            WHERE m.codigo = $id ORDER BY sm.servs");
 		 $result->execute();
 		 return $result->fetchAll();
 	}

 	function obtener_nacionalidad($conexion){

 		 $result = $conexion->query("SELECT * FROM nacionalidad ORDER BY id_nacion");
 		 $result = $result->fetchAll();
 		 return($result) ? $result : false;
 	}

 	function obtener_distrito($conexion){

 		 $result = $conexion->query("SELECT * FROM distritos ORDER BY id_distrito");
 		 $result = $result->fetchAll();
 		 return($result) ? $result : false;
 	}

 	function sesion(){
 		if (!isset($_SESSION['user'])) {
 			header('Location:' . route_login);
 		}
 	}

	function validar_email($email) {
	    return filter_var($email, FILTER_VALIDATE_EMAIL)
	        && preg_match('/@.+\./', $email);
	}

	function getMimeType($archivo){
		$mimetype = false;
		if(function_exists('finfo_fopen')) {
		 // open with FileInfo
		} elseif(function_exists('getimagesize')) {
		 // open with GD
		} elseif(function_exists('exif_imagetype')) {
		// open with EXIF
		} elseif(function_exists('mime_content_type')) {
		$mimetype = mime_content_type($archivo);
		}
		return $mimetype;
	 }
?>