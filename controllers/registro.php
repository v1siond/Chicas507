<?php session_start();
	ob_start();
	require 'admin/config.php';
	require 'admin/functions.php';

	$conexion = conexion($db_config);

	if(!$conexion){
		header('Refresh: 1; url=http://www.chicas507.com/error.php');
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$email = filter_var($_POST['email']);
		$pass = filter_var($_POST['contra']);
		$pass2 = filter_var($_POST['con_contra']);
		$user = filter_var($_POST['usuario']);
		$phone = filter_var($_POST['telefono']);

		$error = '';

		if (empty($email) or empty($pass) or empty($pass2) or empty($user) or empty($phone)) {

			$error .='<script language="javascript">alert("Por favor rellena todos los datos correctamente");</script>';

		}else{
			$result = $conexion->prepare('SELECT m.user_model, m.telefono, m.email FROM modelo m WHERE m.user_model = :user OR  m.telefono = :phone OR m.email = :email');
			$result->execute(array(
				':email' => $email,
				':phone' => $phone,
				':user' => $user));
			$user_exist = $result->fetch();
			if ($user_exist != false) {
				$error .='<script language="javascript">alert("¡Ese Usuario ya existe!");</script>';
			}

			$pass = hash('sha512', $pass);
			$pass2 = hash('sha512', $pass2);

			if ($pass != $pass2) {
				$error .='<script language="javascript">alert("¡Las contraseñas no son iguales!");</script>';
			}

			$validacion = validar_email($email);

			if ($validacion == false) {
				$error .='<script language="javascript">alert("¡Email Inválido!");</script>';
			}
		}
		if ($error == '') {
			$status = 0;

			$statement = $conexion->prepare('INSERT INTO modelo (codigo, user_model, email, telefono, contraseña, status)
				VALUES (NULL, :user, :email, :telefono, :pass, :status)');
			$statement->execute(array(
				':user' =>$user,
				':email' => $email,
				':pass' => $pass,
				':telefono' => $phone,
				':status' => $status
				));

			$errores = $statement->errorInfo();

			foreach ($errores as $errore) {
				if(empty($errore) || $errore == 0){
					$errore = '';
					$Femail = "chicasco@freedom.theserverdns.com";
					$subject = "Nos complace darte la bienvenida a Chicas507\r\n\n";
					$subject .= "Para poder usar tu cuenta, debes completar tu anuncio y elegir tu paquete.\r\n";
					$subject .= "Todo eso lo puedes hacer desde tu panel de control.\r\n";
					$subject .= "Nota: Éste es un mensaje auto-generado, no responder.\r\n";
					$subject .= "Si tienes alguna duda, no dudes en contactarnos usando el formulario de la página de inicio.\r\n";

					$EmailSubject = 'Bienvenida a Chicas507 ';
					$mailheader = "From: ". $Femail ."\r\n";
					$MESSAGE_BODY = "Usuario: ".$user."\r\n\n";
					$MESSAGE_BODY .= "Email: ".$email."\r\n";
					$MESSAGE_BODY .= "Asunto: ".$subject."\r\n";
					if(mail($email, $EmailSubject, $MESSAGE_BODY, $mailheader)){
					    header('Refresh: 1; url=http://www.chicas507.com/exito.php');
					}
					else{
						header('Refresh: 1; url=http://www.chicas507.com/error.php');
					}
					break;
				}else{
					echo '<script language="javascript">alert(" ' . $errore . ' ");</script>';
				}
			}

		}else{
			$error .='<script language="javascript">alert("Datos Incorrectos!");</script>';
    	}
	}

	require 'resources/registro_view.php';
	ob_end_flush();
 ?>