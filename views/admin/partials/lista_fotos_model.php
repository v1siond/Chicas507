<section class="fotos-container wow fadeInRight" data-wow-duration="1s">
	<div class="slider">
		<?php foreach ($fotos_model as $foto): ?>
			<?php if ($foto['modelo'] == $model['codigo']):?>
				<figure class="model-picture">
					<img class="photo" src="<?php echo route_images . $foto['foto']; ?>" alt="<?php echo $model['nombre_model']; ?>">
					<a href="<?php echo route_borrar_foto . '?id=' . $foto['id_foto']; ?>" onclick="return confirm('¿Estás Seguro?');">Borrar</a>
				</figure>
			<?php endif ?>
		<?php endforeach ?>
	</div>
</section>