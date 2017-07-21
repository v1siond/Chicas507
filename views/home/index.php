<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="<?php echo route_css; ?>application.css">
    <?php include './views/layouts/head_common.php'; ?>
</head>
<body>
	<?php include './views/layouts/header.php'; ?>
	<div class="home-container">
		<section class="banner-container -fullheight">
			<video class="home-background" autoplay loop poster="<?php echo route_images; ?>gal1.jpg">
				<source src="<?php echo route_videos; ?>sexy_dance.mp4" type="video/mp4">
			</video>
		</section>
		<section class="banner-content row col-xs-11 col-sm-10 col-lg-8">
			<div class="mensaje">
				<h2 class="d600">Bienvenido a</h2>
			</div>
			<h2 class="main-text">Chicas 507</h3>
			<h3 class="d300">Escorts de alto standing, listas para satisfacer los deseos y necesidades de los clientes más exigentes en Panamá.</h3>
			<a href="<?php echo route_models_index;?>" class="default-button">Descubre nuestras escorts</a>
		</section>
	</div>
	<?php include './views/layouts/footer.php'; ?>
	<script src="<?php echo route_js; ?>animate_section.js"></script>
	<?php include './views/layouts/foot_common.php'; ?>
</body>
</html>