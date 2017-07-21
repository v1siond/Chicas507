<!doctype html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <?php include '../../views/layouts/head_common.php'; ?>
</head>
<body>
	<?php include '../../views/layouts/header.php'; ?>
	<div class="main_wrapper background-container">
		<div class="model-container col-xs-12 main-section row">
			<header class="presentation col-xs-12">
				<article class="col-xs-12 text-center division-container">
					<h2 class="title"><?php echo $model['nombre_model']; ?></h2>
				</article>
				<div class="clearfix"></div>
				<div class="division">
					<i class="flecha-down"><i class="flecha-down2"></i></i>
				</div>
			</header>
		</div>
		<div class="main-section row col-xs-12">
			<div class="row anuncio wow fadeInLeft" data-wow-duration="1s">
				<?php if (isset($model)): ?>
					<div id="datos_anuncio" class="-border-right col-xs-12">
						<div class="col-xs-12">
							<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="anuncio">
								<div class="col-xs-12 bio">
									<label for="bio" class="col-xs-12">Biografía</label>
									<textarea class="col-xs-12 col-md-11" name="bio" id="bio" placeholder="Ej: Dulce Venezolana" maxlength="495"><?php echo $model['biografia']; ?></textarea>
								</div>
								<div class="col-xs-12 bio">
									<label for="presentation" class="col-xs-12">Presentación</label>
									<textarea class="col-xs-12 col-md-11" name="presentation" id="presentation" placeholder="Ej: Dulce Venezolana" value="<?php echo $model['presentacion']; ?>" maxlength="145"><?php echo $model['presentacion']; ?></textarea>
								</div>
								<div class="col-xs-12 col-md-5">
									<label for="name" class="col-xs-12">nombre artístico</label>
									<input type="text" class="col-xs-12" name="name" id="name" placeholder="Ej: Vanessa" value="<?php echo $model['nombre_model']; ?>">
								</div>
								<div class="col-xs-12 col-md-5 col-md-offset-1">
									<label for="phone" class="col-xs-12">Teléfono</label>
									<input type="text" class="col-xs-12" name="phone" id="phone" placeholder="Ej: +58 0145-5681452" value="<?php echo $model['telefono']; ?>">
								</div>
								<div class="col-xs-12 col-md-5">
									<label for="province" class="col-xs-12">Provincia</label>
									<select name="province" id="province" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5 col-md-offset-1">
									<label for="zone" class="col-xs-12">zona</label>
									<select name="zone" id="zone" class="col-xs-12">
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
								<div class="separador col-xs-11"></div>
								<div class="clearfix"></div>
								<div class="col-xs-12 col-md-5">
									<label for="nacionalidad" class="col-xs-12">nacionalidad</label>
									<select name="nacionalidad" id="nacionalidad" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5 col-md-offset-1">
									<label for="edad" class="col-xs-12">edad</label>
									<select name="edad" id="edad" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5">
									<label for="altura" class="col-xs-12">altura</label>
									<select name="altura" id="altura" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5 col-md-offset-1">
									<label for="color_pelo" class="col-xs-12">Color de cabello</label>
									<select name="color_pelo" id="color_pelo" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5">
									<label for="color_ojos" class="col-xs-12">color de ojos</label>
									<select name="color_ojos" id="color_ojos" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5 col-md-offset-1">
									<label for="color_piel" class="col-xs-12"> color de piel</label>
									<select name="color_piel" id="color_piel" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5">
									<label for="pechos" class="col-xs-12">medida de pechos</label>
									<select name="pechos" id="pechos" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5 col-md-offset-1">
									<label for="tarifa" class="col-xs-12">Tarifa por hora</label>
									<select name="tarifa" id="tarifa" class="col-xs-12">
										<?php foreach ($tarifas as $tarifa): ?>
											<?php if ($tarifa == $model['pago']): ?>
												<option value="<?php echo $tarifa;?>" selected> <?php echo $tarifa; ?> $</option>
											<?php endif ?>
											<?php if ($tarifa != $model['pago']): ?>
												<option value="<?php echo $tarifa;?>"> <?php echo $tarifa; ?> $</option>
											<?php endif ?>
										<?php endforeach ?>
									</select>
								</div>
								<div class="col-xs-12 col-md-5 col-md-offset-1">
									<label for="sexualidad" class="col-xs-12">Orientación Sexual</label>
									<select name="sexualidad" id="sexualidad" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5">
									<label for="dias_atencion" class="col-xs-12">Días de Atención</label>
									<select name="dias_atencion" id="dias_atencion" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5 col-md-offset-1">
									<label for="horario" class="col-xs-12">Horario</label>
									<select name="horario" id="horario" class="col-xs-12">
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
								<div class="col-xs-12 col-md-5">
									<label for="lugar_atencion" class="col-xs-12">Lugares de Atención</label>
									<select name="lugar_atencion" id="lugar_atencion" class="col-xs-12">
										<?php foreach ($lugares_atencion as $lugar): ?>
											<?php if ($lugar == $model['lugar_atencion']): ?>
												<option value="<?php echo $lugar;?>" selected> <?php echo $lugar; ?></option>
											<?php endif ?>
											<?php if ($lugar != $model['lugar_atencion']): ?>
												<option value="<?php echo $lugar;?>"> <?php echo $lugar; ?></option>
											<?php endif ?>
										<?php endforeach ?>
									</select>
								</div>
								<div class="separador col-xs-11"></div>
								<div class="clearfix"></div>
								<div class="col-xs-12 servicios_features">
									<div class="header">
										<div class="servicios_head col-xs-12">
											<h4 class="col-xs-12 text-center">Lista de servicios</h4>
											<p class="col-xs-12 text-center">Sercicios que ofreces</p>
											<div class="servicios col-xs-12">
												<?php
													$cont = 0;
													foreach ($servicios as $servicio): $control = 0;?>
													<?php foreach ($servs_model as $key): ?>
														<?php if ($servicio['id_serv'] == $key['servs']): $control = $key['servs'];?>
															<div class="service">
																<input type="checkbox" name="servicio[]" value="<?php echo $servicio['id_serv']; ?>" class="check" checked>
																<label for="servicio"><?php echo $servicio['nombre_serv']; ?></label>
															</div>
														<?php endif ?>
													<?php endforeach ?>
													<?php if ($servicio['id_serv'] != $control): ?>
														<div class="service">
															<input type="checkbox" name="servicio[]" value="<?php echo $servicio['id_serv']; ?>">
															<label for="servicio"><?php echo $servicio['nombre_serv']; ?></label>
														</div>
													<?php endif ?>

												<?php
													$cont++;
													endforeach ?>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-11 enviar_anuncio">
									<div class="button col-xs-12 col-md-6 col-md-offset-3 text-center"><input type="submit" value="Actualizar Modelo" name="anuncio"></div>
								</div>
							</form>
						</div>
					</div>
				<?php endif ?>
				<?php if (isset($model)): ?>
					<div class="col-xs-12 col-md-4 fotos_anuncio">
						<div class="button col-xs-12 text-center"><a id="add_image"  href="#">Agregar Imagen</a></div>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="imagen" enctype="multipart/form-data" class="fotos_model">
							<div class="button col-xs-12 text-center"><input type="submit" value="Subir Imagen" name="imagen"></div>
						</form>
					</div>
					<div class="col-xs-12 col-md-4 video_anuncio">
						<div class="button col-xs-12 text-center"><a id="add_video"  href="#">Agregar Video</a></div>
						<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="video" enctype="multipart/form-data" class="video_model">
							<div class="button col-xs-12 text-center"><input type="submit" value="Enviar Video" name="video"></div>
						</form>
					</div>
				<?php endif ?>
			</div>
			<?php include 'partials/lista_fotos_model.php'; ?>
			<?php include 'partials/lista_videos_model.php'; ?>
		</div>
	</div>
	<?php include '../../views/layouts/footer.php'; ?>
	<?php include '../../views/layouts/foot_common.php'; ?>
	<script src="<?php echo route_js; ?>admin.js"></script>
</body>
</html>