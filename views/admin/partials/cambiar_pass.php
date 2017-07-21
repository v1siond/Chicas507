<div class="row contra off wow fadeInRight" data-wow-duration="1s">
	<div class="col-xs-12 col-md-6 col-md-offset-3 marco_pass">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="change_pass">
			<div class="col-xs-12">
				<label for="pass_v" class="col-xs-12">Contreaseña Actual</label>
				<input type="password" class="col-xs-12" name="pass_v" id="pass_v" placeholder="Ej: Dulce Venezolana" value="">
			</div>
			<div class="col-xs-12">
				<label for="pass_n" class="col-xs-12">Contreaseña Nueva</label>
				<input type="password" class="col-xs-12" name="pass_n" id="pass_n" placeholder="Ej: Dulce Venezolana" value="">
			</div>
			<div class="col-xs-12">
				<label for="pass_c" class="col-xs-12">Repetir Contreaseña Nueva</label>
				<input type="password" class="col-xs-12" name="pass_c" id="pass_c" placeholder="Ej: Dulce Venezolana" value="">
			</div>
			<div class="col-xs-12 enviar_anuncio">
				<div class="button col-xs-12 col-md-6 col-md-offset-3 text-center"><input type="submit" value="Cambiar Contraseña" name="change_pass"></div>
			</div>
		</form>
	</div>
</div>