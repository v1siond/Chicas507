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
          <small class="text"><?php echo $post['titulo']; ?></small>
        </article>
        <div class="clearfix"></div>
        <div class="division">
          <i class="flecha-down"><i class="flecha-down2"></i></i>
        </div>
      </header>
      <section class="col-xs-12 col-sm-8 main-section row">
        <article class="col-xs-12 post-container">
          <figure class="col-xs-12 image -full">
              <img src="<?php echo route_images . $post['imagen_entrada']; ?>" alt="<?php echo $post['titulo']; ?>">
          </figure>
          <div class="col-xs-12 blog-content">
            <small class="date"><?php echo $post['fecha'] . ' por ' . $post['name_admin']; ?></small>
            <p class="text"><?php echo nl2br($post['entrada']);?></p>
          </div>
        </article>
        <div class="background-container">
          <section class="prev-next-container row">
            <?php if (!empty($prev_post)): ?>
              <a class="link-wrapper" href="<?php echo route_ver_post;?>?id=<?php echo $prev_post['id_entrada']; ?>">
                <article class="prev-next-wrapper -prev">
                  <i class="fa fa-long-arrow-left"></i>
                    <figure class="circle-picture">
                      <img class="photo" src="<?php echo route_images . $prev_post['imagen_entrada']; ?>" alt="<?php echo $prev_post['titulo']; ?>">
                    </figure>
                  <div class="info">
                    <p class="name"><?php echo $prev_post['titulo'] ?></p>
                  </div>
                </article>
              </a>
            <?php endif ?>
            <?php if (!empty($next_post)): ?>
              <a class="link-wrapper" href="<?php echo route_ver_post;?>?id=<?php echo $next_post['id_entrada']; ?>">
                <article class="prev-next-wrapper -next">
                  <div class="info">
                    <p class="name"><?php echo $next_post['titulo'] ?></p>
                  </div>
                  <figure class="circle-picture">
                    <img class="photo" src="<?php echo route_images . $next_post['imagen_entrada']; ?>" alt="<?php echo $next_post['titulo']; ?>">
                  </figure>
                  <i class="fa fa-long-arrow-right"></i>
                </article>
              </a>
            <?php endif ?>
          </section>
        </div>
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