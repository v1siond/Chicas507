<div class="row listado fadeInRight" data-wow-duration="1s">
	<?php foreach ($listmodels as $model): ?>
		<div id="modelo-cuadro" class="col-xs-12 col-md-5">
			<div class="col-xs-12 col-md-8 info-model">
				<div class="model-date">Código: <span><?php echo $model['codigo']; ?></span></div>
				<div class="model-date">Modelo: <span><?php echo $model['nombre_model']; ?></span></div>
				<div class="model-date">Email: <span><?php echo $model['email'];?></span></div>
			</div>
			<div class="col-xs-12 col-md-4">
				<?php foreach ($fotos_model as $foto): ?>
					<?php if ($model['codigo'] == $foto['modelo']): ?>
						<img class="photo" src="<?php echo route_images . $foto['foto']; ?>" alt="<?php echo $foto['nombre_model']; ?>">
					<?php break;
						endif ?>
				<?php endforeach ?>
			</div>
			<div class="col-xs-12 options">
				<ul class="model-action">
					<li class="action"><a href="<?php echo route_ver_modelo_admin . '?id=' . $model['codigo']; ?>">ver</a></li>
					<li class="action"><a href="<?php echo route_borrar_modelo . '?id=' . $model['codigo']; ?>" onclick="return confirm('¿Estás Seguro?');">Borrar</a></li>
				</ul>
			</div>
		</div>
	<?php endforeach ?>
</div>