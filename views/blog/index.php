<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <?php include '../../views/layouts/head_common.php'; ?>
</head>
<body>
  <?php include '../../views/layouts/header.php'; ?>
  <div class="background-container">
    <div class="main-section row">
      <header class="row presentation col-xs-12">
        <article class="col-xs-12 text-center division-container">
          <h2 class="title">Blog Chicas 507</h2>
          <small class="text">Consejos, novedades y mucho más para disfrutar al máximo con nuestras escorts</small>
        </article>
        <div class="clearfix"></div>
        <div class="division">
          <i class="flecha-down"><i class="flecha-down2"></i></i>
        </div>
      </header>
      <section class="col-xs-12 col-sm-8 main-section row">
        <?php foreach ($entradas as $entrada): ?>
          <article class="col-xs-12 post-container">
            <figure class="col-xs-12 col-sm-5 image">
                <img src="<?php echo route_images . $entrada['imagen_entrada']; ?>" alt="<?php echo $entrada['titulo']; ?>">
            </figure>
            <div class="col-xs-12 col-sm-7 blog-content">
              <h4 class="subtitle"><a href="ver_post.php?id=<?php echo $entrada['id_entrada']; ?>"><?php echo $entrada['titulo']; ?></a></h4>
              <small class="date"><?php echo $entrada['fecha'] . ' by ' . $entrada['name_admin']; ?></small>
              <p class="text"><?php echo substr($entrada['entrada'], 0, strpos(wordwrap($entrada['entrada'], 200), "\n")); ?>...</p>
              <a href="ver_post.php?id=<?php echo $entrada['id_entrada']; ?>">LEER MÁS</a>
            </div>
          </article>
        <?php endforeach ?>
        <?php include '../../views/layouts/paginacion.php'; ?>
      </section>
      <aside class="col-xs-12 col-sm-4 col-lg-3 latest-post">
        <header class="row presentation">
          <article class="text-center division-container">
            <h2 class="title -medium">Ultimos Post</h2>
          </article>
          <div class="division -small">
            <i class="flecha-down"><i class="flecha-down2"></i></i>
          </div>
        </header>
        <?php foreach ($entradas_last as $last_post): ?>
          <article class="post text-center">
            <a href="ver_post.php?id=<?php echo $last_post['id_entrada']; ?>"><?php echo $last_post['titulo']; ?></a>
          </article>
        <?php endforeach ?>
      </aside>
  	</div>
  </div>
  <?php include '../../views/layouts/footer.php'; ?>
  <?php include '../../views/layouts/foot_common.php'; ?>
</body>
</html>