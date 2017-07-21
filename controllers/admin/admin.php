<?php session_start();
	ob_start();
	require '../../routes/routes.php';
	require '../../models/functions.php';
	require '../../schema/database.php';

	$conexion = conexion($db_config);
	$fotos_model = obtener_fotos_modelos($conexion);

	if(!$conexion){
		header('Refresh: 1; url=http://www.chicas507.com/error.php');
	}

	sesion();

	$usuario = $_SESSION['user'];

	$adm = obtener_admin($conexion, $usuario);
	if(!$adm){
		header('Refresh: 1; url=http://www.chicas507.com/error.php');
	}
	$admin = $adm[0];
	$listmodels = lista_modelos($conexion);
	$list_post = obtener_entrada_autor($blog_config['post_por_pagina'], $conexion, $usuario);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (isset($_POST["re_admin"])) {
			$admin_user = $_POST['usuario'];
			$admin_contra = $_POST['contra'];
			$conf_contra = $_POST['con_contra'];
			$admin_email = $_POST['email'];
			$nombre_admin = $_POST['nombre'];

			$error = '';

			if (empty($admin_user) or empty($admin_contra) or empty($conf_contra) or empty($admin_email) or empty($nombre_admin)) {

				$error .='<script language="javascript">alert("Por favor rellena todos los datos correctamente");</script>';

			}else{
				$result = $conexion->prepare('SELECT a.user_admin, a.email_admin FROM admin a WHERE a.user_admin = :user OR a.email_admin = :email');
				$result->execute(array(
					':email' => $admin_email,
					':user' => $admin_user));
				$user_exist = $result->fetch();
				if ($user_exist != false) {
					$error .='<script language="javascript">alert("¡Ese Usuario ya existe!");</script>';
				}

				$admin_contra = hash('sha512', $admin_contra);
				$conf_contra = hash('sha512', $conf_contra);

				if ($admin_contra != $conf_contra) {
					$error .='<script language="javascript">alert("¡Las contraseñas no son iguales!");</script>';
				}

				$validacion = validar_email($admin_email);

				if ($validacion == false) {
					$error .='<script language="javascript">alert("¡Email Inválido!");</script>';
				}
			}
			if ($error == '') {

				$statement = $conexion->prepare('INSERT INTO admin (id_admin, pass_admin, user_admin, email_admin, name_admin, nivel_user)
					VALUES (NULL, :pass, :user, :email, :name, 1)');
				$statement->execute(array(
					':pass' =>$admin_contra,
					':user' => $admin_user,
					':email' => $admin_email,
					':name' => $nombre_admin,
					));

				$errores = $statement->errorInfo();

				foreach ($errores as $errore) {
					if(empty($errore) || $errore == 0){
						header('Refresh: 1; url=http://www.chicas507.com/exito.php');
						break;
					}else{
						echo '<script language="javascript">alert(" ' . $errore . ' ");</script>';
					}
				}

			}else{
				$error .='<script language="javascript">alert("Datos Incorrectos!");</script>';
	    	}
		}

		if(isset($_POST["change_pass"])){
			$old_pass = $_POST['pass_v'];
			$new_pass = $_POST['pass_n'];
			$confirm_new = $_POST['pass_c'];

			if (isset($model)) {
				$pass_control = $model['contraseña'];
				$user_id = $model['codigo'];
			}elseif (isset($admin)) {
				$pass_control = $admin['pass_admin'];
				$user_id = $admin['id_admin'];
			}

			$old_pass = hash('sha512', $old_pass);
			$new_pass = hash('sha512', $new_pass);
			$confirm_new = hash('sha512', $confirm_new);
			$error = '';

			if (empty($old_pass) || $old_pass == '' || empty($new_pass) || $new_pass == '' || $confirm_new == '' || empty($confirm_new)) {
				echo '<script language="javascript">alert("Debe rellenar todos los campos");</script>';
				$error .='No rellenó todos los campos';
			}

			if ($old_pass != $pass_control && $new_pass != $confirm_new) {
				echo '<script language="javascript">alert("Las Contraseñas no Coinciden");</script>';
				$error .='Las contraseñas no son iguales';
			}

			if ($error == '') {
				$guardado = $conexion->prepare('UPDATE admin SET
					pass_admin = :pass
					WHERE id_admin = :id');

				$guardado->execute(array(
					':pass' => $new_pass,
					':id' => $user_id
					));
				if (isset($guardado)) {
					$error = $guardado->errorInfo();
					foreach ($error as $errores) {
						if(empty($errores)){
							header('Refresh: 1; url=http://www.chicas507.com/exito.php');
							$error = '';
						}else{
							$error = '<li>' . $errores . '</li>';
						}
					}
				}
			}
		}
	}

	require '../../views/admin/index.php';
	ob_end_flush();
?>