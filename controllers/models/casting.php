<?php session_start();
	ob_start();
	require '../../routes/routes.php';
	require '../../models/functions.php';
	require '../../schema/database.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$nombre = limpiarDatos($_POST['nombre']);
		$apellido = limpiarDatos($_POST['apellido']);
		$email = limpiarDatos($_POST['email']);
		$telefono = limpiarDatos($_POST['telefono']);
		$edad = limpiarDatos($_POST['edad']);
		$nacionalidad = limpiarDatos($_POST['nacionalidad']);
		$asunto = 'Me gustaría ser parte de Chicas507';
		$descripcion = limpiarDatos($_POST['descripcion']);

		if (empty($nombre) || empty($apellido) || empty($email) || empty($telefono) || empty($edad) || empty($nacionalidad) || empty($descripcion)) {
			echo '<script language="javascript">alert("Rellena todos los campos!");</script>';
		}else{
			$validacion = validar_email($email);
	    $to='admin@chicas507.com';
	    $subject=$asunto;
	    $from = $nombre."<".$apellido.">";
	    $mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
	    $headers = "From: $from\r\n" .
	    "MIME-Version: 1.0\r\n" .
	      "Content-Type: multipart/mixed;\r\n" .
	      " boundary=\"{$mime_boundary}\"";
	    $message="Información: \n\n";
	    $message .= "Nombre:".$nombre." ".$apellido."\n\n";
	    $message .= "Email:".$email."\n\n";
	    $message .= "Telefono:".$telefono."\n\n";
	    $message .= "Edad:".$edad."\n\n";
	    $message .= "Nacionalidad:".$nacionalidad."\n\n";
	    $message .= "Descripcion:".$descripcion;
	    $message = "This is a multi-part message in MIME format.\n\n" .
	      "--{$mime_boundary}\n" .
	      "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
	      "Content-Transfer-Encoding: 7bit\n\n" .
	    $message . "\n\n";

	    foreach($_FILES as $userfile){
	      $tmp_name = $userfile['tmp_name'];
	      $type = $userfile['type'];
	      $name = $userfile['name'];
	      $size = $userfile['size'];
	      if (file_exists($tmp_name)){
	         if(is_uploaded_file($tmp_name)){
	            $file = fopen($tmp_name,'rb');
	            $data = fread($file,filesize($tmp_name));
	            fclose($file);
	            $data = chunk_split(base64_encode($data));
	         }

	         $message .= "--{$mime_boundary}\n" .
	            "Content-Type: {$type};\n" .
	            " name=\"{$name}\"\n" .
	            "Content-Disposition: attachment;\n" .
	            " filename=\"{$fileatt_name}\"\n" .
	            "Content-Transfer-Encoding: base64\n\n" .
	         $data . "\n\n";
	      }
	    }
	    $message.="--{$mime_boundary}--\n";
			if ($validacion != false) {
				if (@mail($to, $subject, $message, $headers))
				  header('Location: http://www.chicas507.com/exito.php');
				else
				  header('Location: http://www.chicas507.com/error.php');
			}else{
				echo 'email inválido';
			}
		}
	}

	require '../../views/models/casting.php';
	ob_end_flush();
?>