<?php session_start();
	ob_start();
	require '../../routes/routes.php';
	require '../../models/functions.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$nombre = limpiarDatos($_POST['nombre']);
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$asunto = $_POST['asunto'];
		$mensaje = $_POST['mensaje'];

		if (empty($nombre) || empty($email) || empty($asunto) || empty($mensaje)) {
			echo '<script language="javascript">alert("Rellena todos los campos!");</script>';
		}else{
			$validacion = validar_email($email);

			if ($validacion != false) {
				$subject = $mensaje;
				$email_chicas = 'admin@chicas507.com';

				$EmailSubject = $asunto;
				$mailheader = "From: ". $nombre . " " . $apellido ." \r\n";
				$MESSAGE_BODY .= "Email: ".$email."\r\n";
				$MESSAGE_BODY .= "Asunto: ".$subject."\r\n";
				if(mail($email_chicas, $EmailSubject, $MESSAGE_BODY, $mailheader)){
				    header('Refresh: 1; url=http://www.chicas507.com/exito.php');
				}
				else{
					header('Refresh: 1; url=http://www.chicas507.com/error.php');
				}
			}else{
				echo 'email inválido';
			}
		}
	}
	require '../../views/agency/contact.php';
	ob_end_flush();
?>
