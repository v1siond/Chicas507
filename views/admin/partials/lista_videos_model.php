<div class="row videos off wow fadeInRight" data-wow-duration="1s">
	<div class="col-xs-12 videos-container">
		<?php foreach ($videos_model as $video): ?>
			<?php if ($cantidad_video > 1): ?>
				<div class="video col-xs-12 col-sm-5">
			<?php endif ?>
			<?php if ($cantidad_video <= 1): ?>
				<div class="video col-xs-12 col-sm-8 col-sm-offset-2">
			<?php endif ?>

				<video alt="Actualiza tu navegador" controls>
					<source src="<?php echo route_videos . $video['video']; ?>" type="video/mp4">
				</video>
				<a href="<?php echo route_borrar_video . '?id=' . $video['id_video']; ?>" onclick="return confirm('¿Estás Seguro?');">Borrar</a>
			</div>
		<?php endforeach ?>
	</div>
</div>