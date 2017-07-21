<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <?php include '../../views/layouts/head_common.php'; ?>
</head>
<body>
  <?php include '../../views/layouts/header.php'; ?>
	<div class="main_wrapper background-container">
  	<div class="main-section row col-xs-12">
	    <header class="row presentation col-xs-12">
	      <article class="col-xs-12 text-center division-container">
	        <h2 class="title">Panel de Control</h2>
	      </article>
	      <div class="clearfix"></div>
	      <div class="division">
	        <i class="flecha-down"><i class="flecha-down2"></i></i>
	      </div>
	    </header>
  	</div>

		<div id="container" class="container">
			<?php include 'panel_admin_opciones.php'; ?>

			<div class="row anuncio admin-header">
				<div id="datos_anuncio" class="col-xs-12 col-md-8 anuncio-admin">
					<div class="col-xs-12">
						<div class="estado_anuncio"><span>BIENVENIDO: <?php echo $admin['name_admin']; ?></span></div>
					</div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="col-xs-12">
						<div class="estado_anuncio"><span>USER:  <?php echo $admin['user_admin']; ?></span></div>
						<div class="estado_anuncio"><span>EMAIL:  <?php echo $admin['email_admin']; ?></span></div>
					</div>
				</div>
			</div>
		  <?php include 'partials/lista_modelos.php'; ?>
		  <?php include 'partials/cambiar_pass.php'; ?>
		  <?php include 'partials/lista_post.php'; ?>


		</div>

		<div id="container" style="margin-top: 0;">
  		<?php include 'partials/registrar_admin.php'; ?>
		</div>
	</div>
  <?php include '../../views/layouts/footer.php'; ?>
  <?php include '../../views/layouts/foot_common.php'; ?>
	<script src="<?php echo route_js; ?>admin.js"></script>
</body>
</html>