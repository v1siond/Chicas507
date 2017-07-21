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
          <h2 class="title">Contacto</h2>
        </article>
        <div class="clearfix"></div>
        <div class="division">
          <i class="flecha-down"><i class="flecha-down2"></i></i>
        </div>
      </header>
      <form class="col-xs-11 col-lg-10" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="contacto" enctype="multipart/form-data">
        <div class="input-container">
          <input class="input" type="text" name="nombre" placeholder="Nombre*">
          <input class="input" type="text" name="apellido" placeholder="Apellido*">
          <input class="input" type="text" name="email" placeholder="Email*">
          <input class="input" type="text" name="asunto" placeholder="Asunto*">
        </div>
        <div class="input-container">
          <textarea class="textarea" name="mensaje" placeholder="Mensaje"></textarea>
        </div>
        <div class="input-container -center">
          <input class="default-button -black col-xs-12 col-md-5" type="submit" value="Enviar" id="boton" class="shadow" name="contacto">
        </div>
      </form>
      <small class="text text-center">Chicas507 es la agencia de escorts y acompañantes de lujo con más prestigio de Panamá, con sede en ciudad de Panamá. Puede realizar sus reservas de los servicios de escorts y azafatas de lujo de la agencia de escorts Chicas507 para el día y hora deseado, hasta con un mes de antelación, bien dirigiéndose a nuestro correo electrónico chicasco@freedom.theserverdns.com o llamando a los teléfonos +507 xxx xxx xxx o +507 xxx xxx xxx. Recuerde que si desea que una de nuestras señoritas le acompañe de viaje, debe hacer la reserva con un mínimo de 3 días de antelación.</small>
    </div>
  </div>
  <?php include '../../views/layouts/footer.php'; ?>
  <?php include '../../views/layouts/foot_common.php'; ?>
</body>
</html>

