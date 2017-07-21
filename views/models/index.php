<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <?php include '../../views/layouts/head_common.php'; ?>
</head>
<body>
	<?php include '../../views/layouts/header.php'; ?>
	<div class="background-container">
		<header class="banner-container -default">
			<figure class="background-cover">
				<img src="<?php echo route_images . 'gal5.jpg'; ?>" alt="galería">
			</figure>
		</header>
		<section class="model-index main-section row">
			<article class="row">
				<div class="col-xs-12 text-center division-container">
					<h2 class="title">Modelos</h2>
					<small class="text">A continuación podrá deleitarse con las mejores escorts de lujo en Panamá. Espectaculares chicas de compañía dispuestas a hacerle pasar un rato inolvidable en su tiempo de ocio, viajes y reuniones.</small>
				</div>
				<div class="clearfix"></div>
				<div class="division">
					<i class="flecha-down"><i class="flecha-down2"></i></i>
				</div>
			</article>
			<section class="gallery-container row">
				<article class="models-container col-xs-12">
					<?php $cont = 0; foreach ($modelos as $modelo):?>
						<div class="model-wrapper" >
							<a class="model link-wrapper" href="<?php echo route_ver_modelo_galery;?>?id=<?php echo $modelo['codigo']; ?>">
								<figure class="model-picture">
									<?php if ($modelo['status'] > 1): ?>
										<span class="model-tag -long">Vip</span>
									<?php endif ?>
									<?php if ($modelo['status'] <= 1 && $cont < 5): ?>
										<span class="model-tag">Novedad</span>
									<?php endif ?>
									<?php foreach ($fotos_model as $foto): ?>
										<?php if ($modelo['codigo'] == $foto['modelo']): ?>
											<img class="photo" src="<?php echo route_images . $foto['foto']; ?>" alt="<?php echo $foto['nombre_model']; ?>">
										<?php break;
											endif ?>
									<?php endforeach ?>
								</figure>
							</a>
							<div class="model-data">
								<h3 class="name"><?php echo $modelo['nombre_model']; ?></h3>
								<small class="location"><?php echo $modelo['distrito']; ?></small>
								<a class="default-button -inverted col-xs-12" target="_self" href="tel://+507<?php echo $modelo['telefono']; ?>">LLama</a>
							</div>
						</div>
					<?php $cont++; endforeach ?>
				</article>
			</section>
		</section>
	</div>
	<?php include '../../views/layouts/footer.php'; ?>
	<?php include '../../views/layouts/foot_common.php'; ?>
</body>
</html>