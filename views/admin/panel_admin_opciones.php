<div class="col-xs-12 panel-o">
	<?php $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
		if ($host == "www.chicas507.com/controllers/admin/admin.php" || $host == "chicas507.com/controllers/admin/admin.php") { ?>
			<div class="button listmodels col-xs-12 col-md-2 text-center"><a href="#">Lista Modelos</a></div>
			<div class="button cambiar_contraseña col-xs-12 col-md-2 text-center"><a href="#">Cambiar Contraseña</a></div>
			<div class="button articulo_n col-xs-12 col-md-2 text-center"><a href="<?php echo route_nuevo_articulo; ?>">Nuevo Artículo</a></div>
			<div class="button articulo_v col-xs-12 col-md-2 text-center"><a href="#">Mis Artículos</a></div>
			<div class="button r_admin col-xs-12 col-md-2 text-center"><a href="#">Registrar Admin</a></div>
			<div class="button articulo_n col-xs-12 col-md-2 text-center"><a href="<?php echo route_registrar_modelo; ?>">Registrar Modelo</a></div>
			<div class="button cerrar col-xs-12 col-md-2 text-center"><a href="<?php echo route_cerrar_session; ?>">Cerrar Sesión</a></div>
	<?php
		}else { ?>
			<div class="button col-xs-12 col-md-2 text-center"><a href="<?php echo route_admin; ?>">Atrás</a></div>
			<div class="button cerrar col-xs-12 col-md-2 text-center"><a href="<?php echo route_cerrar_session; ?>">Cerrar Sesión</a></div>
	<?php
		}
	?>
</div>