<?php session_start();
	ob_start();
	require 'routes/routes.php';


	if (isset($_SESSION['user'])) {
		header('Refresh: 5; url=' . route_admin);
	}else{
		header('Refresh: 5; url=' . route_login);
	}
	ob_end_flush();
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <?php include 'views/layouts/head_common.php'; ?>
</head>
<body>
	<?php include 'views/layouts/header.php'; ?>
  <div class="background-container">
    <div class="main-section col-xs-10 row">
      <header class="presentation col-xs-12">
        <article class="col-xs-12 text-center division-container">
          <h2 class="title">ERROR</h2>
          <h3>Bueno, esto es algo incómodo..</h3>
          <small class="text">Algo ha fallado, no eres tú, somos nosotros, prueba a recargar la página, si el problema persiste, por favor repórtalo
					desde la sección de contacto.</small>
        </article>
        <div class="clearfix"></div>
        <div class="division">
          <i class="flecha-down"><i class="flecha-down2"></i></i>
        </div>
      </header>
    </div>
  </div>
	<?php include 'views/layouts/footer.php'; ?>
	<?php include 'views/layouts/foot_common.php'; ?>
</body>
</html>