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
					<h2 class="title"><?php echo $model['nombre_model']; ?></h2>
					<?php if (isset($errore) || isset($error_se) || isset($error_se)): ?>
						<small><?php echo $errore; ?></small>
						<small><?php echo $error_se; ?></small>
						<small><?php echo $error_se; ?></small>
					<?php endif ?>
				</article>
				<div class="clearfix"></div>
				<div class="division">
					<i class="flecha-down"><i class="flecha-down2"></i></i>
				</div>
			</header>
		</div>
		<?php if (isset($model)): ?>
			<div class="main-section row col-xs-12">
				<form class="col-xs-12 col-lg-10" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="reg_model" enctype="multipart/form-data">
					<input type="hidden" value="<?php echo $model['codigo']; ?>" name="codigo">
					<div class="input-container col-xs-12">
						<div class="input-container -center col-xs-12">
							<label class="subtitle">Biografía</label>
				      <textarea class="textarea" name="bio" id="bio" placeholder="Ej: Dulce Venezolana" maxlength="495"><?php echo $model['biografia']; ?></textarea>
					  </div>
				  </div>
					<div class="input-container col-xs-12">
						<div class="input-container -center col-xs-12">
							<label class="subtitle">Presentación</label>
							<textarea class="textarea" name="presentation" id="presentation" placeholder="Ej: Dulce Venezolana" maxlength="145" value="<?php echo $model['presentacion']; ?>"><?php echo $model['presentacion']; ?></textarea>
						</div>
				  </div>
					<div class="input-container col-xs-12">
						<h4 class="subtitle">Información Personal</h4>
						<div class="input-container col-xs-12">
							<label for="email" class="subtitle">Email</label>
							<input type="text" class="input -full" name="email" id="email" placeholder="Ej: vanessa@hotmail.com" value="<?php echo $model['email']; ?>">
				  	</div>
						<div class="input-container col-xs-12 col-md-6">
							<label for="edad" class="subtitle">Edad</label>
							<select name="edad" id="edad" class="input -full">
								<?php foreach ($edades as $edad): ?>
									<?php if ($edad == $model['edad']): ?>
										<option value="<?php echo $edad;?>" selected> <?php echo $edad; ?> años</option>
									<?php endif ?>
									<?php if ($edad != $model['edad']): ?>
										<option value="<?php echo $edad;?>"> <?php echo $edad; ?> años</option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
						</div>
						<div class="input-container col-xs-12 col-md-6">
							<label for="phone" class="subtitle">Teléfono</label>
							<input type="text" class="input -full" name="phone" id="phone" placeholder="Ej: +507 0145-5681452" value="<?php echo $model['telefono']; ?>">
						</div>
				  </div>
				  <div class="input-container col-xs-12">
				  	<h4 class="subtitle">Datos</h4>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="name" class="subtitle">Nombre Artístico</label>
							<input type="text" class="input -full" name="name" id="name" placeholder="Ej: Vanessa" value="<?php echo $model['nombre_model']; ?>">
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="province" class="subtitle">Provincia</label>
							<select name="province" id="province" class="input -full">
								<?php foreach ($provincias as $provincia): ?>
									<?php if ($provincia == $model['provincia']): ?>
										<option value="<?php echo $provincia;?>" selected> <?php echo $provincia; ?></option>
									<?php endif ?>
									<?php if ($provincia != $model['provincia']): ?>
										<option value="<?php echo $provincia;?>"> <?php echo $provincia; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="zone" class="subtitle">zona</label>
							<select name="zone" id="zone" class="input -full">
								<?php foreach ($distritos as $distrito): ?>
									<?php if ($distrito['id_distrito'] == $model['zona']): ?>
										<option value="<?php echo $distrito['id_distrito']; ?>" selected><?php echo $distrito['distrito']; ?></option>
									<?php endif ?>
									<?php if ($distrito['id_distrito'] != $model['zona']): ?>
										<option value="<?php echo $distrito['id_distrito']; ?>"><?php echo $distrito['distrito']; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="nacionalidad" class="subtitle">nacionalidad</label>
							<select name="nacionalidad" id="nacionalidad" class="input -full">
								<?php foreach ($nacionalidades as $nacionalidad): ?>
									<?php if ($nacionalidad['id_nacion'] == $model['nacionalidad']): ?>
										<option value="<?php echo $nacionalidad['id_nacion']; ?>" selected><?php echo $nacionalidad['nombre_naci']; ?></option>
									<?php endif ?>
									<?php if ($nacionalidad['id_nacion'] != $model['nacionalidad']): ?>
										<option value="<?php echo $nacionalidad['id_nacion']; ?>"><?php echo $nacionalidad['nombre_naci']; ?></option>
									<?php endif ?>
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
									<?php if ($altura == $model['altura']): ?>
										<option value="<?php echo $altura;?>" selected> <?php echo $altura; ?> cm</option>
									<?php endif ?>
									<?php if ($altura != $model['altura']): ?>
										<option value="<?php echo $altura;?>"> <?php echo $altura; ?> cm</option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="color_pelo" class="subtitle">Color de cabello</label>
							<select name="color_pelo" id="color_pelo" class="input -full">
								<?php foreach ($colores_cabello as $cabello): ?>
									<?php if ($cabello == $model['color_cabello']): ?>
										<option value="<?php echo $cabello;?>" selected> <?php echo $cabello; ?></option>
									<?php endif ?>
									<?php if ($cabello != $model['color_cabello']): ?>
										<option value="<?php echo $cabello;?>"> <?php echo $cabello; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="color_ojos" class="subtitle">color de ojos</label>
							<select name="color_ojos" id="color_ojos" class="input -full">
								<?php foreach ($colores_ojos  as $ojos): ?>
									<?php if ($ojos == $model['color_ojos']): ?>
										<option value="<?php echo $ojos;?>" selected> <?php echo $ojos; ?></option>
									<?php endif ?>
									<?php if ($ojos != $model['color_ojos']): ?>
										<option value="<?php echo $ojos;?>"> <?php echo $ojos; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="color_piel" class="subtitle"> Color de piel</label>
							<select name="color_piel" id="color_piel" class="input -full">
								<?php foreach ($colores_piel  as $piel): ?>
									<?php if ($piel == $model['color_piel']): ?>
										<option value="<?php echo $piel;?>" selected> <?php echo $piel; ?></option>
									<?php endif ?>
									<?php if ($piel != $model['color_piel']): ?>
										<option value="<?php echo $piel;?>"> <?php echo $piel; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="pechos" class="subtitle">Medida de pechos</label>
							<select name="pechos" id="pechos" class="input -full">
								<?php foreach ($tamaño_pechos as $pechos): ?>
									<?php if ($pechos == $model['pechos']): ?>
										<option value="<?php echo $pechos;?>" selected> <?php echo $pechos; ?></option>
									<?php endif ?>
									<?php if ($pechos != $model['pechos']): ?>
										<option value="<?php echo $pechos;?>"> <?php echo $pechos; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="tarifa" class="subtitle">Tarifa por hora</label>
							<select name="tarifa" id="tarifa" class="input -full">
								<?php foreach ($tarifas as $tarifa): ?>
									<?php if ($tarifa == $model['precio_hora']): ?>
										<option value="<?php echo $tarifa;?>" selected> <?php echo $model['precio_hora']; ?>$</option>
									<?php endif ?>
									<?php if ($tarifa != $model['precio_hora']): ?>
										<option value="<?php echo $tarifa;?>"> <?php echo $tarifa; ?>$</option>
									<?php endif ?>
								<?php endforeach ?>
								<?php if ($model['precio_hora'] == 'acordar con cliente'): ?>
									<option value="acordar con cliente" selected> Acordar con cliente</option>
								<?php endif ?>
								<?php if ($model['precio_hora'] != 'acordar con cliente'): ?>
									<option value="acordar con cliente"> Acordar con cliente</option>
								<?php endif ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="tarifa_dos" class="subtitle">Tarifa por 2 horas</label>
							<select name="tarifa_dos" id="tarifa_dos" class="input -full">
								<?php foreach ($tarifas as $tarifa): ?>
									<?php if ($tarifa == $model['precio_dos_horas']): ?>
										<option value="<?php echo $tarifa;?>" selected> <?php echo $model['precio_dos_horas']; ?>$</option>
									<?php endif ?>
									<?php if ($tarifa != $model['precio_dos_horas']): ?>
										<option value="<?php echo $tarifa * 2;?>"> <?php echo $tarifa * 2; ?>$</option>
									<?php endif ?>
								<?php endforeach ?>
								<?php if ($model['precio_dos_horas'] == 'acordar con cliente'): ?>
									<option value="acordar con cliente" selected> Acordar con cliente</option>
								<?php endif ?>
								<?php if ($model['precio_dos_horas'] != 'acordar con cliente'): ?>
									<option value="acordar con cliente"> Acordar con cliente</option>
								<?php endif ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="tarifa_cuatro" class="subtitle">Tarifa por 4 horas</label>
							<select name="tarifa_cuatro" id="tarifa_cuatro" class="input -full">
								<?php foreach ($tarifas as $tarifa): ?>
									<?php if ($tarifa == $model['precio_cuatro_horas']): ?>
										<option value="<?php echo $tarifa;?>" selected> <?php echo $model['precio_cuatro_horas']; ?>$</option>
									<?php endif ?>
									<?php if ($tarifa != $model['precio_cuatro_horas']): ?>
										<option value="<?php echo $tarifa * 4;?>"> <?php echo $tarifa * 4; ?>$</option>
									<?php endif ?>
								<?php endforeach ?>
								<?php if ($model['precio_cuatro_horas'] == 'acordar con cliente'): ?>
									<option value="acordar con cliente" selected> Acordar con cliente</option>
								<?php endif ?>
								<?php if ($model['precio_cuatro_horas'] != 'acordar con cliente'): ?>
									<option value="acordar con cliente"> Acordar con cliente</option>
								<?php endif ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="tarifa_ocho" class="subtitle">Tarifa por 8 horas</label>
							<select name="tarifa_ocho" id="tarifa_ocho" class="input -full">
								<?php foreach ($tarifas as $tarifa): ?>
									<?php if ($tarifa == $model['precio_ocho_horas']): ?>
										<option value="<?php echo $tarifa;?>" selected> <?php echo $model['precio_ocho_horas']; ?>$</option>
									<?php endif ?>
									<?php if ($tarifa != $model['precio_ocho_horas']): ?>
										<option value="<?php echo $tarifa * 8;?>"> <?php echo $tarifa * 8; ?>$</option>
									<?php endif ?>
								<?php endforeach ?>
								<?php if ($model['precio_ocho_horas'] == 'acordar con cliente'): ?>
									<option value="acordar con cliente" selected> Acordar con cliente</option>
								<?php endif ?>
								<?php if ($model['precio_ocho_horas'] != 'acordar con cliente'): ?>
									<option value="acordar con cliente"> Acordar con cliente</option>
								<?php endif ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="tarifa_noche" class="subtitle">Tarifa por una Noche</label>
							<select name="tarifa_noche" id="tarifa_noche" class="input -full">
								<?php foreach ($tarifas as $tarifa): ?>
									<?php if ($tarifa == $model['precio_noche']): ?>
										<option value="<?php echo $tarifa;?>" selected> <?php echo $model['precio_noche']; ?> $</option>
									<?php endif ?>
									<?php if ($tarifa != $model['precio_noche']): ?>
										<option value="<?php echo $tarifa * 12;?>"> <?php echo $tarifa * 12; ?> $</option>
									<?php endif ?>
								<?php endforeach ?>
								<?php if ($model['precio_noche'] == 'acordar con cliente'): ?>
									<option value="acordar con cliente" selected> Acordar con cliente</option>
								<?php endif ?>
								<?php if ($model['precio_noche'] != 'acordar con cliente'): ?>
									<option value="acordar con cliente"> Acordar con cliente</option>
								<?php endif ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="sexualidad" class="subtitle">Orientación Sexual</label>
							<select name="sexualidad" id="sexualidad" class="input -full">
								<?php foreach ($orientaciones as $orientacion): ?>
									<?php if ($orientacion == $model['orientacion']): ?>
										<option value="<?php echo $orientacion;?>" selected> <?php echo $orientacion; ?></option>
									<?php endif ?>
									<?php if ($orientacion != $model['orientacion']): ?>
										<option value="<?php echo $orientacion;?>"> <?php echo $orientacion; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="dias_atencion" class="subtitle">Días de Atención</label>
							<select name="dias_atencion" id="dias_atencion" class="input -full">
								<?php foreach ($dias_atencion as $dias): ?>
									<?php if ($dias == $model['dias_atencion']): ?>
										<option value="<?php echo $dias;?>" selected> <?php echo $dias; ?></option>
									<?php endif ?>
									<?php if ($dias != $model['dias_atencion']): ?>
										<option value="<?php echo $dias;?>"> <?php echo $dias; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="horario" class="subtitle">Horario</label>
							<select name="horario" id="horario" class="input -full">
								<?php foreach ($horarios as $horario): ?>
									<?php if ($horario == $model['horario']): ?>
										<option value="<?php echo $horario;?>" selected> <?php echo $horario; ?></option>
									<?php endif ?>
									<?php if ($horario != $model['horario']): ?>
										<option value="<?php echo $horario;?>"> <?php echo $horario; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="status" class="subtitle">Status</label>
							<select name="status" id="status" class="input -full">
								<?php if ($model['status'] == 1): ?>
									<option value="1" selected>Normal</option>
									<option value="2">Vip</option>
								<?php endif ?>
								<?php if ($model['status'] == 2): ?>
									<option value="1">Normal</option>
									<option value="2" selected>Vip</option>
								<?php endif ?>
							</select>
				  	</div>
				  	<div class="input-container col-xs-12 col-sm-6">
							<label for="operaciones" class="subtitle">Operaciones</label>
							<select name="operaciones" id="operaciones" class="input -full">
								<?php foreach ($operaciones as $operacion): ?>
									<?php if ($operacion == $model['operaciones']): ?>
										<option value="<?php echo $operacion; ?>" selected><?php echo $operacion; ?></option>
									<?php endif ?>
									<?php if ($operacion != $model['operaciones']): ?>
										<option value="<?php echo $operacion; ?>"><?php echo $operacion; ?></option>
									<?php endif ?>
								<?php endforeach ?>
							</select>

				  	</div>
				  </div>
					<div class="separador col-xs-12"></div>

				  <div class="input-container col-xs-12 -center">
						<h4 class="subtitle text-center">Idiomas</h4>
						<p class="subtitle text-center">Sercicios que hablas</p>
						<?php
							$cont = 0;
							foreach ($idiomas as $idioma): $control = 0;?>
							<?php foreach ($idiomas_model as $key): ?>
								<?php if ($idioma['id_idioma'] == $key['idio']): $control = $key['id_idioma'];?>
									<div class="service" style="margin-right: 2rem;">
										<input type="checkbox" name="idioma[]" value="<?php echo $idioma['id_idioma']; ?>" class="check" checked>
										<label for="idioma"><?php echo $idioma['idioma']; ?></label>
									</div>
								<?php endif ?>
							<?php endforeach ?>
							<?php if ($idioma['id_idioma'] != $control): ?>
								<div class="service" style="margin-right: 2rem;">
									<input type="checkbox" name="idioma[]" value="<?php echo $idioma['id_idioma'];?>">
									<label for="idioma"><?php echo $idioma['idioma']; ?></label>
								</div>
							<?php endif ?>

						<?php
							$cont++;
							endforeach ?>
				  </div>
					<div class="separador col-xs-12"></div>
				  <div class="input-container col-xs-12 -center">
						<h4 class="subtitle text-center">Lista de servicios</h4>
						<p class="subtitle text-center">Sercicios que ofreces</p>
						<?php
							$cont = 0;
							foreach ($servicios as $servicio): $control = 0;?>
							<?php foreach ($servs_model as $key): ?>
								<?php if ($servicio['id_serv'] == $key['servs']): $control = $servicio['id_serv'];?>
									<div class="service" style="width: 25rem;">
										<input type="checkbox" name="servicio[]" value="<?php echo $servicio['id_serv']; ?>" class="check" checked>
										<label for="servicio"><?php echo $servicio['nombre_serv']; ?></label>
									</div>
								<?php endif ?>
							<?php endforeach ?>
							<?php if ($servicio['id_serv'] != $control): ?>
								<div class="service" style="width: 25rem;">
									<input type="checkbox" name="servicio[]" value="<?php echo $servicio['id_serv']; ?>">
									<label for="servicio"><?php echo $servicio['nombre_serv']; ?></label>
								</div>
							<?php endif ?>

						<?php
							$cont++;
							endforeach ?>
				  </div>
				  <div class="input-container -center col-xs-12">
				  	<input class="default-button -black col-xs-12 col-md-5" type="submit" value="Actualizar Modelo" name="anuncio" id="boton" class="shadow">
				  </div>
				</form>
			</div>
			<div class="col-xs-12 col-md-6 fotos_anuncio">
				<div class="button col-xs-12 text-center"><a id="add_image"  href="#">Agregar Imagen</a></div>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="imagen" enctype="multipart/form-data" class="fotos_model">
					<input type="hidden" value="<?php echo $model['codigo']; ?>" name="codigo">
					<div class="button col-xs-12 text-center"><input type="submit" value="Subir Imagen" name="imagen"></div>
				</form>
			</div>
			<div class="col-xs-12 col-md-6 video_anuncio">
				<div class="button col-xs-12 text-center"><a id="add_video"  href="#">Agregar Video</a></div>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="video" enctype="multipart/form-data" class="video_model">
					<input type="hidden" value="<?php echo $model['codigo']; ?>" name="codigo">
					<div class="button col-xs-12 text-center"><input type="submit" value="Enviar Video" name="video"></div>
				</form>
			</div>
		<?php endif ?>
	</div>
	<?php include '../../views/layouts/footer.php'; ?>
	<?php include '../../views/layouts/foot_common.php'; ?>
	<script src="<?php echo route_js; ?>admin.js"></script>
</body>
</html>

