<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <?php include '../../views/layouts/head_common.php'; ?>
</head>
<body>
	<?php include '../../views/layouts/header.php'; ?>
	<div class="main_wrapper background-container">
		<div class="model-container col-xs-12 main-section row -padding-sides">
			<header class="presentation col-xs-12">
				<article class="col-xs-12 text-center division-container">
					<h2 class="title">Registro de Modelos</h2>
					<small> <?php if (isset($errore)): echo $errore;?>
					<?php endif ?></small>
				</article>
				<div class="clearfix"></div>
				<div class="division">
					<i class="flecha-down"><i class="flecha-down2"></i></i>
				</div>
			</header>
		</div>
		<div class="main-section row col-xs-12">
			<form class="col-xs-12 col-lg-10" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="reg_model" enctype="multipart/form-data">
				<div class="input-container col-xs-12">
					<div class="input-container -center col-xs-12">
						<label class="subtitle">Biografía</label>
			      <textarea class="textarea" name="bio" id="bio" placeholder="Ej: Dulce Venezolana" maxlength="495"></textarea>
				  </div>
			  </div>
				<div class="input-container col-xs-12">
					<div class="input-container -center col-xs-12">
						<label class="subtitle">Presentación</label>
						<textarea class="textarea" name="presentation" id="presentation" placeholder="Ej: Dulce Venezolana" maxlength="145"></textarea>
					</div>
			  </div>
				<div class="input-container col-xs-12">
					<h4 class="subtitle">Información Personal</h4>
					<div class="input-container col-xs-12">
						<label for="email" class="subtitle">Email</label>
						<input type="text" class="input -full" name="email" id="email" placeholder="Ej: vanessa@hotmail.com">
			  	</div>
					<div class="input-container col-xs-12 col-md-6">
						<label for="edad" class="subtitle">Edad</label>
						<select name="edad" id="edad" class="input -full">
							<?php foreach ($edades as $edad): ?>
								<option value="<?php echo $edad;?>"> <?php echo $edad; ?> años</option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="input-container col-xs-12 col-md-6">
						<label for="phone" class="subtitle">Teléfono</label>
						<input type="text" class="input -full" name="phone" id="phone" placeholder="Ej: +507 0145-5681452">
					</div>
			  </div>
			  <div class="input-container col-xs-12">
			  	<h4 class="subtitle">Datos</h4>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="name" class="subtitle">Nombre Artístico</label>
						<input type="text" class="input -full" name="name" id="name" placeholder="Ej: Vanessa">
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="province" class="subtitle">Provincia</label>
						<select name="province" id="province" class="input -full">
							<?php foreach ($provincias as $provincia): ?>
								<option value="<?php echo $provincia;?>"> <?php echo $provincia; ?></option>
							<?php endforeach ?>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="zone" class="subtitle">zona</label>
						<select name="zone" id="zone" class="input -full">
							<?php foreach ($distritos as $distrito): ?>
								<option value="<?php echo $distrito['id_distrito']; ?>"><?php echo $distrito['distrito']; ?></option>
							<?php endforeach ?>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="nacionalidad" class="subtitle">nacionalidad</label>
						<select name="nacionalidad" id="nacionalidad" class="input -full">
							<?php foreach ($nacionalidades as $nacionalidad): ?>
								<option value="<?php echo $nacionalidad['id_nacion']; ?>"><?php echo $nacionalidad['nombre_naci']; ?></option>
							<?php endforeach ?>
						</select>
			  	</div>
			  </div>
				<div class="separador col-xs-12"></div>
			  <div class="input-container col-xs-12">
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="altura" class="subtitle">altura</label>
						<select name="altura" id="altura" class="input -full">
							<?php foreach ($alturas as $altura): ?>
								<option value="<?php echo $altura;?>"> <?php echo $altura; ?> cm</option>
							<?php endforeach ?>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="color_pelo" class="subtitle">Color de cabello</label>
						<select name="color_pelo" id="color_pelo" class="input -full">
							<?php foreach ($colores_cabello as $cabello): ?>
								<option value="<?php echo $cabello;?>"> <?php echo $cabello; ?></option>
							<?php endforeach ?>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="color_ojos" class="subtitle">color de ojos</label>
						<select name="color_ojos" id="color_ojos" class="input -full">
							<?php foreach ($colores_ojos  as $ojos): ?>
								<option value="<?php echo $ojos;?>"> <?php echo $ojos; ?></option>
							<?php endforeach ?>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="color_piel" class="subtitle"> Color de piel</label>
						<select name="color_piel" id="color_piel" class="input -full">
							<?php foreach ($colores_piel  as $piel): ?>
								<option value="<?php echo $piel;?>"> <?php echo $piel; ?></option>
							<?php endforeach ?>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="pechos" class="subtitle">Medida de pechos</label>
						<select name="pechos" id="pechos" class="input -full">
							<?php foreach ($tamaño_pechos as $pechos): ?>
								<option value="<?php echo $pechos;?>"> <?php echo $pechos; ?></option>
							<?php endforeach ?>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="tarifa" class="subtitle">Tarifa por hora</label>
						<select name="tarifa" id="tarifa" class="input -full">
							<?php foreach ($tarifas as $tarifa): ?>
								<option value="<?php echo $tarifa;?>"> <?php echo $tarifa; ?> $</option>
							<?php endforeach ?>
							<option value="acordar con cliente"> acordar con cliente</option>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="tarifa_dos" class="subtitle">Tarifa por 2 horas</label>
						<select name="tarifa_dos" id="tarifa_dos" class="input -full">
							<?php foreach ($tarifas as $tarifa): ?>
								<option value="<?php echo $tarifa* 2;?>"> <?php echo $tarifa * 2; ?> $</option>
							<?php endforeach ?>
							<option value="acordar con cliente"> acordar con cliente</option>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="tarifa_cuatro" class="subtitle">Tarifa por 4 horas</label>
						<select name="tarifa_cuatro" id="tarifa_cuatro" class="input -full">
							<?php foreach ($tarifas as $tarifa): ?>
								<option value="<?php echo $tarifa* 4;?>"> <?php echo $tarifa * 4; ?> $</option>
							<?php endforeach ?>
							<option value="acordar con cliente"> acordar con cliente</option>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="tarifa_ocho" class="subtitle">Tarifa por 8 horas</label>
						<select name="tarifa_ocho" id="tarifa_ocho" class="input -full">
							<?php foreach ($tarifas as $tarifa): ?>
								<option value="<?php echo $tarifa* 8;?>"> <?php echo $tarifa * 8; ?> $</option>
							<?php endforeach ?>
							<option value="acordar con cliente"> acordar con cliente</option>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="tarifa_noche" class="subtitle">Tarifa por una Noche</label>
						<select name="tarifa_noche" id="tarifa_noche" class="input -full">
							<?php foreach ($tarifas as $tarifa): ?>
								<option value="<?php echo $tarifa* 12;?>"> <?php echo $tarifa * 12; ?> $</option>
							<?php endforeach ?>
							<option value="acordar con cliente"> acordar con cliente</option>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="sexualidad" class="subtitle">Orientación Sexual</label>
						<select name="sexualidad" id="sexualidad" class="input -full">
							<?php foreach ($orientaciones as $orientacion): ?>
								<option value="<?php echo $orientacion;?>"> <?php echo $orientacion; ?></option>
							<?php endforeach ?>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="dias_atencion" class="subtitle">Días de Atención</label>
						<select name="dias_atencion" id="dias_atencion" class="input -full">
							<?php foreach ($dias_atencion as $dias): ?>
								<option value="<?php echo $dias;?>"> <?php echo $dias; ?></option>
							<?php endforeach ?>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="horario" class="subtitle">Horario</label>
						<select name="horario" id="horario" class="input -full">
							<?php foreach ($horarios as $horario): ?>
								<option value="<?php echo $horario;?>"> <?php echo $horario; ?></option>
							<?php endforeach ?>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="status" class="subtitle">Status</label>
						<select name="status" id="status" class="input -full">
								<option value="1">Normal</option>
								<option value="2">Vip</option>
						</select>
			  	</div>
			  	<div class="input-container col-xs-12 col-sm-6">
						<label for="operaciones" class="subtitle">Operaciones</label>
						<select name="operaciones" id="operaciones" class="input -full">
								<option value="pechos">Pechos</option>
								<option value="nalgas">Nalgas</option>
								<option value="cara">Cara</option>
								<option value="ninguna">Ninguna</option>
						</select>

			  	</div>
			  </div>
				<div class="separador col-xs-12"></div>

			  <div class="input-container col-xs-12 -center">
					<h4 class="subtitle text-center">Idiomas</h4>
					<p class="subtitle text-center">Sercicios que hablas</p>
					<?php foreach ($idiomas as $idioma):?>
							<div class="service" style="margin-right: 2rem;">
								<input type="checkbox" name="idioma[]" value="<?php echo $idioma['id_idioma'];?>">
								<label for="idioma"><?php echo $idioma['idioma']; ?></label>
							</div>
					<?php endforeach ?>
			  </div>
				<div class="separador col-xs-12"></div>
			  <div class="input-container col-xs-12 -center">
					<h4 class="subtitle text-center">Lista de servicios</h4>
					<p class="subtitle text-center">Sercicios que ofreces</p>
					<?php foreach ($servicios as $servicio):?>
							<div class="service" style="width: 25rem;">
								<input type="checkbox" name="servicio[]" value="<?php echo $servicio['id_serv']; ?>">
								<label for="servicio"><?php echo $servicio['nombre_serv']; ?></label>
							</div>
					<?php endforeach ?>
			  </div>
			  <div class="input-container -center col-xs-12">
			  	<input class="default-button -black col-xs-12 col-md-5" type="submit" value="Registrar Modelo" name="anuncio" id="boton" class="shadow">
			  </div>
			</form>
		</div>
	</div>
	<?php include '../../views/layouts/footer.php'; ?>
	<?php include '../../views/layouts/foot_common.php'; ?>
	<script src="<?php echo route_js; ?>admin.js"></script>
</body>
</html>