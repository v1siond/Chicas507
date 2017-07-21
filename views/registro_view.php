<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo route_index; ?>/css/registro.css">
    <?php include 'inc/head_common.php'; ?>
</head>
<body>
	<div class="main_wrapper">
		<?php include 'inc/header.php'; ?>

		<div id="container" class="container">
			<div class="row">
				<article class="col-xs-12 text-center">
					<div id="mensaje">
						<h2>REGISTRO DE MODELOS</h2>
						<h3>FORMA PARTE DE LA MEJOR WEB DE PREPAGOS DE PANAMÁ</h3>
					</div>
				</article>
				<div class="clearfix"></div>
				<div class="division">
					<i class="flecha-down"><i class="flecha-down2"></i></i>
				</div>
				<section id="registro" class="col-xs-12 text-center">
					<article class="formulario">
						<h4>REGISTRO PARA NUEVAS MODELOS</h4>
						<p class="text-justify">Para ser parte de nuestro exclusivo grupo de modelos, primero debes crear una cuenta utilizando el siguiente formulario, luego podrás acceder al portal y anunciarte, también recibirás la información de tu cuenta en el correo electrónico</p>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="registro" enctype="multipart/form-data">
							<div class="row">
								<div class="col-xs-12 col-sm-6" id="datos"><input class="form-control" type="text" name="usuario" required placeholder="Nombre de Usuario"></div>
								<div class="col-xs-12 col-sm-6" id="datos"><input class="form-control" type="text" name="telefono" required placeholder="Telefono"></div>
								<div class="col-xs-12 col-sm-6" id="datos"><input class="form-control" type="password" name="contra" required placeholder="Contraseña"></div>
								<div class="col-xs-12 col-sm-6" id="datos"><input class="form-control" type="password" name="con_contra" required placeholder="Confirmar Contraseña"></div>
								<div class="col-xs-12" id="email"><input class="form-control" type="email" name="email" required placeholder="Email"></div>
								<div class="clearfix"></div>
								<div class="col-xs-12" id="boton"><button class="btn btn-success btn-lg" type="submit">ENVIAR</button></div>
							</div>
						</form>
					</article>
					<article class="content text-justify">
						<h4>YA TENGO UNA CUENTA ¿Y AHORA?</h4>
						<p>Si ya posees una cuenta, puedes acceder desde la pestaña de INGRESO del menú superior, tambien pueder hacer clic <a href="<?php echo route_index; ?>/login.php">AQUÍ</a> y te llevaremos a la página de acceso al sistema. Recuerda que para ingresar al sistema, es necesario contar con el: NOMBRE DE USUARIO ó EMAIL y la CONTRASEÑA</p>
					</article>
					<article class="content text-justify">
						<h4>¡OLVIDÉ MI CONTRASEÑA! ¿QUÉ HAGO?</h4>
						<p>Puedes recuperar la contraseña dando click en <a href="<?php echo route_index; ?>/recuperar_contraseña.php">RECUPERAR CONTRASEÑA</a>, te será enviada al correo o número de teléfono registrado.</p>
					</article>
				</section>
				<article class="col-xs-12 text-center">
					<div id="mensaje">
						<h2>CONDICIONES DE USO</h2>
						<h3>LEER ANTES DE EMPEZAR A USAR EL SERVICIO</h3>
					</div>
				</article>
				<div class="col-xs-12" class="division">
					<i class="flecha-down"><i class="flecha-down2"></i></i>
				</div>
				<section id="condiciones" class="col-xs-12 text-justify">
					<div id="condi">
						<h4>CONDICIONES DE USO - CHICAS507</h4>
						<p>Para anunciarse en Chicas507, se deberán tomar en cuenta las siguientes políticas:</p>
						<p>El anunciante deberá registrarse llenando los campos requeridos correctamente y con información real, una vez completado el proceso de registro, el anunciante podrá ingresar a su cuenta desde donde podrá realizar su anuncio llenando todos los campos del formulario. Una vez publicado el anuncio, el anunciante podrá ver, modificar o eliminar su anuncio si asi lo desea.</p>
						<p>El anuncio permanecerá publicado hasta que caduque o el anunciante decida dejar de usar los servicios de Chicas507. Una vez seleccionado el paquete deseado, podrá ver los métodos de pago. Si el modo elegido es mediante depósito bancario, el anunciante deberá enviar un email con la foto del comprobante, respondiendo al correo que recibido.</p>
						<p>Chicas507 posee una serie de paquetes con distintos beneficios, para consultar el costo, sólo hay que revisar la sección de PLANES y TARIFAS en la página principal. Para su contratación, sólo deberá elegir el plan deseado desde el panel de control de su cuenta, Una vez confirmado el pago; el anuncio se activará con los beneficios correspondientes durante un período de 30 días a partir de la contratación.</p>
						<p>1. El anunciante deberá completar todos los campos obligatorios del formulario y facilitar un teléfono válido para ser contactado.</p>
						<p>2. El anunciante deberá, en todo momento, proporcionar información real y verdadera, todo contenido falso o inexacto será penalizado.</p>
						<p>3. El anunciante no publicará un anuncio idéntico o similar a otro existente. No usara fotos falsas ni con publicidad de otras paginas.</p>
						<p>4. El anunciante no utilizará correos ficticios o duplicados para publicar un anuncio ni utilizará palabras no relacionados al anuncio ("Keyword Spamming").</p>
						<p>5. El anunciante deberá usar datos reales en la publicación de una oferta, esta información habrá de ser cierta, exacta y coincidente.</p>
						<p>6. El anunciante deberá identificarse correctamente para conocer la identidad real y poder llevar a cabo los cobros correspondientes a los servicios contratados.</p>
						<p>7. El anunciante no deberá usar robots, spiders, "scrapers" o cualquier otro medio automático para acceder a Chicas507, copiar, retirar o publicar contenido.</p>
					</div>
					<div id="leer"><a href="<?php echo route_index; ?>/about.php">LEER MÁS</a></div>
				</section>
			</div>
		</div>

		<?php include 'inc/footer.php'; ?>
	</div>
	<?php include 'inc/foot_common.php'; ?>
</body>
</html>