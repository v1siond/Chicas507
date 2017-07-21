<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <?php include '../../views/layouts/head_common.php'; ?>
</head>
<body>
	<div class="main_wrapper main-section">
  <?php include '../../views/layouts/header.php'; ?>
    <header class="row presentation col-xs-12">
      <article class="col-xs-12 text-center division-container">
        <h2 class="title">Panel de Control</h2>
      </article>
      <div class="clearfix"></div>
      <div class="division">
        <i class="flecha-down"><i class="flecha-down2"></i></i>
      </div>
    </header>
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

			<div class="row articulo wow fadeInRight" data-wow-duration="1s">
				<div class="col-xs-12 col-md-8 col-md-offset-2 article-container">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" value="<?php echo $post['id_entrada']; ?>" name="id">
						<input type="text" name="titulo" placeholder="Titulo del Artículo" class="col-xs-12" value="<?php echo $post['titulo']; ?>">
						<textarea name="texto" placeholder="Texto del Artículo" class="col-xs-12"><?php echo $post['entrada'];?></textarea>
						<input type="file" name="blog_img" class="button col-xs-12 button-article">
						<input type="hidden" name="old_img" value="<?php echo $post['imagen_entrada']; ?>">
						<input type="submit" value="Actualizar Articulo" class="button col-xs-12 col-md-3 button-article">
					</form>
				</div>
			</div>
		</div>
	</div>
  <?php include '../../views/layouts/footer.php'; ?>
  <?php include '../../views/layouts/foot_common.php'; ?>
	<script src="<?php echo route_js; ?>admin.js"></script>
</body>
</html>