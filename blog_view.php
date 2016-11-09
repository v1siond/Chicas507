<!doctype html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="Description" content="Prostituas, damas de Compañía y prepagos en Panamá. Bienvenido a Chicas 507, aquí encontraras los mejores anuncios de prostituas y prepagos de Panamá.">
	<meta name="keywords" content="putas panama, prepagos panama, contactos eroticos panama, anuncios eroticos panama, putas chicas507, prepagos chicas507, damas de compañia panama">
	<meta name="author" content="Chicas507 en Panama">
	<title>Prostitutas y Prepagos en Panamá | Chicas507.com</title>
	<link rel="stylesheet" href="css/normalize.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/blog.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="main_wrapper">
        <header id="head">
             <div class="main_header" style="top: 0px;">
                <div class="contenedor">
                    <div class="barra-header">
                        <a class="logo-header" href="index.php#head">
                            <img src="imagenes/logo.png" alt="Putas y prepagos en la ciudad de Panama Chicas507" title="Web de putas y prepagos en Panama">
                        </a>
                    </div>
                    <input type="checkbox" id="resp-menu">
                    <label id="bar-menu" for="resp-menu" class="fa fa-bars" aria-hidden="true"></label>
                    <div class="menu-header">
                        <ul class="barra-menu">
                            <li class="opcion active"><a class="active" href="index.php#head">INICIO</a></li>
                            <li class="dropdown1">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">MODELOS<b class="flecha-down"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="submenu"><a href="index.php#galeria">Modelos en Panama</a></li>
                                </ul>
                            </li>
                            <li class="dropdown2">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">BLOG<b class="flecha-down"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="submenu"><a href="index.php#blog">Últimas noticias</a></li>
                                    <li class="submenu"><a href="blog.html">Blog Chicas507</a></li>
                                    <li class="submenu"><a href="glosario.html">Glosario de términos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown3">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">CREA TU ANUNCIO<b class="flecha-down"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="submenu"><a href="index.php#ofertas">Tarifas y planes</a></li>
                                    <li class="submenu"><a href="anuncio.html">Crear anuncio</a></li>
                                    <li class="submenu"><a href="#">Modificar anuncio</a></li>
                                    <li class="submenu"><a href="#">Reportar</a></li>
                                    <li class="submenu"><a href="#">¿Como pagar mi anuncio?</a></li>
                                </ul>
                            </li>
                            <li class="opcion"><a href="index.php#contacto">CONTACTO</a></li>
                            <li class="opcion"><a href="about.html">INFORMACIÓN</a></li>
                        </ul>
                    </div>
                </div>
            </div>
       </header>
        <section id="container" class="container">
        	<article class="titulo">
        		<h2>LAS MEJORES HISTORIAS Y TIPS DE PUTAS Y PREPAGOS EN PANAMA</h2>
        		<h3>PUTAS Y PREPAGOS EN PANAMA CITY</h3>
        	</article>
            <div class="division">
                <i class="flecha-down"><i class="flecha-down2"></i></i>
            </div>
            <?php foreach ($entradas as $entrada): ?>
                <article class="entrad">
                    <div class="imagen">
                        <img src="data:image/jpg;base64,<?php echo base64_encode($entrada['imagen_entrada']); ?>" alt="">
                    </div>
                    <div class="contenido">
                        <h4><?php echo $entrada['titulo'] ?></h4>
                        <span><?php echo $entrada['fecha'] . ' by ' . $entrada['autor'] ?></span>
                        <p><?php echo $entrada['entrada']?></p>
                    </div>
                    <div class="boton"><a href="#">LEER MÁS</a></div>
                </article>
            <?php endforeach ?>
            <section class="paginacion">
                <ul>
                    <?php if ($pagina == 1):  ?>
                        <li class="disabled"><i class="fa fa-arrow-left" aria-hidden="true"></i>Anterior</li>
                    <?php else: ?>
                        <li><a href="?pagina=<?php echo $pagina - 1 ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Anterior</a></li>
                    <?php endif; ?>
                    <?php 

                        for ($i=1; $i <= $numeroPagina ; $i++) { 
                            if ($pagina == $i) {
                                echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                            }
                            else{
                                echo "<li><a href='?pagina=$i'></a>$i</li>";
                            }
                        }
                     ?>
                    <?php if ($pagina == $numeroPagina):  ?>
                        <li class="disabled">Siguiente<i class="fa fa-arrow-right" aria-hidden="true"></i></li>
                    <?php else: ?>
                        <li><a href="?pagina=<?php echo $pagina + 1 ?>">Anterior</a></li>
                    <?php endif; ?>
                </ul>
            </section>
		</section>
        <footer id="foot" class="shadow">
            <div class="footer_container">
                <p>
                    <span><i></i> República de Panama.</span>
                    <span><i></i> <a href="tel:+123456">123456</a></span>
                    <span><i></i> <a href="mailto:info@chicas507.com">info@lchicas507.com</a></span>
                    <span><img src="imagenes/visa-footer.jpg" alt="pago con tarjeta" title="Pago con tarjeta"> </span>
                </p>
                <p class="p">© 2016 <a href="http://chicas507.com">Chicas507</a> | Tu portal ideal para <strong>encuentros eróticos en la ciudad de Panama</strong> </p>
            </div>       
        </footer>
	</div>
</body>
</html>