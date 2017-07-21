<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <?php include '../../views/layouts/head_common.php'; ?>
</head>
<body>
	<?php include '../../views/layouts/header.php'; ?>
	<div class="background-container">
		<div class="model-container col-xs-12 main-section row">
			<header class="presentation col-xs-12">
				<article class="col-xs-12 text-center division-container">
					<h2 class="title"><?php echo $model['nombre_model']; ?></h2>
					<small class="text"><?php echo $model['biografia']; ?></small>
				</article>
				<div class="clearfix"></div>
				<div class="division">
					<i class="flecha-down"><i class="flecha-down2"></i></i>
				</div>
			</header>
			<section class="videos-container">
				<?php if (isset($videos)): ?>
					<?php foreach ($videos as $video): ?>
						<video class="home-background" controls>
							<source src="<?php echo route_videos . $video['video']?>" type="video/mp4">
							<source src="<?php echo route_videos . $video['video']?>" type="video/flv">
							<source src="<?php echo route_videos . $video['video']?>" type="video/webm">
							<source src="<?php echo route_videos . $video['video']?>" type="video/ogg">
							<source src="<?php echo route_videos . $video['video']?>" type="video/3gp">
						</video>
					<?php endforeach ?>
				<?php endif ?>
			</section>
			<section class="fotos-container dragscroll">
				<div class="slider">
					<?php foreach ($fotos_model as $foto): ?>
						<?php if ($foto['modelo'] == $model['codigo']):?>
							<figure class="model-picture">
								<img class="photo" src="<?php echo route_images . $foto['foto']; ?>" alt="<?php echo $model['nombre_model']; ?>">
							</figure>
						<?php endif ?>
					<?php endforeach ?>
				</div>
			</section>
		</div>
	</div>
	<div class="background-container -grey">
		<div class="model-container main-section row">
			<section class="model-info">
				<div class="inner-section col-xs-11 col-sm-5 col-lg-3 -center">
					<h4 class="subtitle  d600">
						¡Reserva ahora!
					</h4>
					<p class="texto">
						<?php echo $model['presentacion'] ?>.
					</p>
					<a class="default-button -inverted" target="_self" href="tel://+507<?php echo $model['telefono']; ?>">LLama</a>
					<a class="default-button -inverted" target="_self" href="mailto:chicasco@freedom.theserverdns.com">Escríbemos</a>
				</div>
				<ul class="inner-section col-xs-11 col-sm-5 col-lg-3 -left">
					<h4 class="subtitle d600">
						Info
					</h4>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Nombre:</strong></p>
	            <p class="d300 col-xs-7"><?php echo $model['nombre_model']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Ojos:</strong></p>
	            <p class="d300 col-xs-7"><?php echo $model['color_ojos']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Cabello:</strong></p>
	            <p class="d300 col-xs-7"><?php echo $model['color_cabello']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Piel:</strong></p>
	            <p class="d300 col-xs-7"><?php echo $model['color_piel']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Altura:</strong></p>
	            <p class="d300 col-xs-7"><?php echo $model['altura']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Pechos:</strong></p>
	            <p class="d300 col-xs-7"><?php echo $model['pechos']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Edad:</strong></p>
	            <p class="d300 col-xs-7"><?php echo $model['edad']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Nacionalidad:</strong></p>
	            <p class="col-xs-7 d300"><?php echo $model['nombre_naci']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Idioma:</strong></p>
	            <p class="col-xs-7 d300">
	            	<?php foreach ($idiomas as $idioma): ?>
	            		- <?php echo $idioma['idioma']; ?> <br>
	            	<?php endforeach ?>
	            </p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Provincia:</strong></p>
	            <p class="col-xs-7 d300"><?php echo $model['provincia']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Zona:</strong></p>
	            <p class="col-xs-7 d300"><?php echo $model['distrito']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Orientación:</strong></p>
	            <p class="col-xs-7 d300"><?php echo $model['orientacion']; ?></p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-5"><strong>Horario:</strong></p>
	            <p class="col-xs-7 d300"><?php echo $model['horario']; ?></p>
	        </li>
				</ul>
				<ul class="inner-section col-xs-11 col-sm-5 col-lg-3 -left">
					<h4 class="subtitle  d600">
						Tarifas
					</h4>
	        <li class="dato">
	            <p class="col-xs-9"><strong>1 Hora:</strong></p>
	            <p class="col-xs-3 d300"><?php echo $model['precio_hora']; ?>$</p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-9"><strong>2 Horas:</strong></p>
	            <p class="col-xs-3 d300"><?php echo $model['precio_dos_horas']; ?>$</p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-9"><strong>4 Horas (comidas y cenas):</strong></p>
	            <p class="d300 col-xs-3"><?php echo $model['precio_cuatro_horas']; ?>$</p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-9"><strong>8 Horas (comidas y cenas):</strong></p>
	            <p class="d300 col-xs-3"><?php echo $model['precio_ocho_horas']; ?>$</p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-9"><strong>Noche (12H):</strong></p>
	            <p class="col-xs-3 d300"><?php echo $model['precio_noche']; ?>$</p>
	        </li>
	        <li class="dato">
	            <p class="col-xs-9"><strong>Viajes/Otros:</strong></p>
	            <p class="col-xs-3 d300">Consultar</p>
	        </li>
				</ul>
				<ul class="inner-section col-xs-11 col-sm-5 col-lg-3 -flex">
					<h4 class="subtitle  d600">
						Servicios
					</h4>
					<?php foreach ($servicios as $servicio): ?>
						<?php if ($servicio['model'] == $model['codigo']): ?>
							<li class="servicio"><span><?php echo $servicio['nombre_serv']; ?></span></li>
						<?php endif ?>
					 <?php endforeach ?>
				</ul>
			</section>
		</div>
	</div>
	<div class="background-container">
		<div class="model-container col-xs-12 main-section row">
			<section class="prev-next-container row">
				<?php if (!empty($prev_model)): ?>
					<a class="link-wrapper" href="<?php echo route_ver_modelo_galery;?>?id=<?php echo $prev_model['codigo']; ?>">
						<article class="prev-next-wrapper -prev">
							<i class="fa fa-long-arrow-left"></i>
							<?php foreach ($fotos_model as $foto): ?>
								<?php if ($foto['modelo'] == $prev_model['codigo']):?>
									<figure class="circle-picture">
										<img class="photo" src="<?php echo route_images . $foto['foto']; ?>" alt="<?php echo $prev_model['nombre_model']; ?>">
									</figure>
								<?php
									break;
									endif
								?>
							<?php endforeach ?>
							<div class="info">
								<p class="name"><?php echo $prev_model['nombre_model'] ?></p>
								<p class="zone"><?php echo $prev_model['provincia'] ?> </p>
							</div>
						</article>
					</a>
				<?php endif ?>
				<?php if (!empty($next_model)): ?>
					<a class="link-wrapper" href="<?php echo route_ver_modelo_galery;?>?id=<?php echo $next_model['codigo']; ?>">
						<article class="prev-next-wrapper -next">
							<div class="info">
								<p class="name"><?php echo $next_model['nombre_model'] ?></p>
								<p class="zone"><?php echo $next_model['provincia'] ?> </p>
							</div>
							<?php foreach ($fotos_model as $foto): ?>
								<?php if ($foto['modelo'] == $next_model['codigo']):?>
									<figure class="circle-picture">
										<img class="photo" src="<?php echo route_images . $foto['foto']; ?>" alt="<?php echo $next_model['nombre_model']; ?>">
									</figure>
								<?php
									break;
									endif
								?>
							<?php endforeach ?>
							<i class="fa fa-long-arrow-right"></i>
						</article>
					</a>
				<?php endif ?>
			</section>
		</div>
	</div>
	<?php include '../../views/layouts/footer.php'; ?>
	<script src= "<?php echo route_js; ?>dragscroll.js"></script>
	<?php include '../../views/layouts/foot_common.php'; ?>
</body>
</html>