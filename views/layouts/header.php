<header id="head">
	<div class="container">
		<section class="row">
			<article class="col-xs-3">
				<a href="<?php echo route_index; ?>" id="main_logo">
					<h1>Chicas 507</h1>
					<span>Escorts a un click de distancia</span>
				</a>
			</article>
            <input type="checkbox" id="resp-menu">
            <label id="bar-menu" for="resp-menu" class="fa fa-bars" aria-hidden="true"></label>
			<article id="opciones">
				<ul class="nav nav-pills" id="menu">
					<li><a href="<?php echo route_index; ?>">INICIO</a></li>
					<li><a href="<?php echo route_models_index;?>">MODELOS</a></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">AGENCIA<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo route_about;?>">Información</a></li>
							<li><a href="<?php echo route_casting; ?>">Casting</a></li>
						</ul>
					</li>
					<li><a href="<?php echo route_blog_index; ?>">BLOG</a></li>
					<li><a id="info" href="<?php echo route_contact; ?>">CONTACTO</a></li>
					<?php if (isset($_SESSION['user'])): ?>
						<li class="busqueda-desktop"><a href="<?php echo route_admin; ?>">PERFIL</a></li>
					<?php endif ?>
				</ul>
			</article>
		</section>
	</div>
</header>