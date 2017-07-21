<div class="wow off re_admin fadeInRight marco_pass">
	<div class="background-container row" data-wow-duration="1s" id="registro">
		<form class="col-xs-11 col-lg-10" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="registro" enctype="multipart/form-data">
			<div class="input-container">
	      <input class="input" type="text" name="usuario" required placeholder="Nombre de Usuario">
	      <input class="input" type="password" name="contra" required placeholder="Contraseña">
	      <input class="input" type="password" name="con_contra" required placeholder="Confirmar Contraseña">
	      <input class="input" type="text" name="nombre" required placeholder="Nombre y Apellido">
	      <input class="input -full" type="email" name="email" required placeholder="Email">
		  </div>
		  <div class="input-container -center">
		  	<input class="default-button -black col-xs-12 col-md-5" type="submit" name="re_admin" value="Enviar" id="boton" class="shadow">
		  </div>
		</form>
	</div>
</div>