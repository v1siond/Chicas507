<div class="row listado posts off wow fadeInRight" data-wow-duration="1s">
	<?php if (!empty($list_post) && isset($list_post)): ?>
		<?php foreach ($list_post as $post): ?>
			<div id="modelo-cuadro" class="col-xs-12 col-md-5">
				<div class="col-xs-12 col-md-8 info-model">
					<div class="model-date">Código: <span><?php echo $post['id_entrada']; ?></span></div>
					<div class="model-date">Fecha: <span><?php echo $post['fecha']; ?></span></div>
					<div class="model-date">Titulo: <span><?php echo $post['titulo'];?></span></div>
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="status">
						<figure>
							<img src="<?php echo route_images . $post['imagen_entrada'];?>" alt="">
						</figure>
					</div>
				</div>
				<div class="col-xs-12 options">
					<ul class="model-action">
						<li class="action"><a href="<?php echo route_ver_post . '?id=' . $post['id_entrada']; ?>">ver</a></li>
						<li class="action"><a href="<?php echo route_editar_articulo . '?id=' . $post['id_entrada']; ?>">editar</a></li>
						<li class="action"><a href="<?php echo route_borrar_post . '/?id=' . $post['id_entrada']; ?>" onclick="return confirm('¿Estás Seguro?');">Borrar</a></li>

					</ul>
				</div>
			</div>
		<?php endforeach ?>
		<?php include '../../views/layouts/paginacion.php'; ?>
	<?php endif ?>
</div>
