<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <?php include '../../views/layouts/head_common.php'; ?>
</head>
<body>
  <?php include '../../views/layouts/header.php'; ?>
  <div class="background-container">
    <div class="main-section col-xs-10 row">
      <header class="presentation col-xs-12">
        <article class="col-xs-12 text-center division-container">
          <h2 class="title">Ingreso al Sistema</h2>
        </article>
        <div class="clearfix"></div>
        <div class="division">
          <i class="flecha-down"><i class="flecha-down2"></i></i>
        </div>
      </header>
    </div>
    <div class="main-section col-xs-10 row">
      <form class="col-xs-12 col-lg-10" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="registro" enctype="multipart/form-data">
        <div class="input-container">
          <input class="input" type="text" name="usuario" required placeholder="Usuario O Email">
          <input class="input" type="password" name="contra" required placeholder="Contraseña">
        </div>
        <div class="input-container -center">
          <input class="default-button -black col-xs-12 col-md-5" type="submit" value="Entrar" id="boton" class="shadow" name="contacto">
        </div>
      </form>
    </div>
  </div>
  <?php include '../../views/layouts/footer.php'; ?>
  <?php include '../../views/layouts/foot_common.php'; ?>
</body>
</html>