jQuery(document).ready(function() {

	jQuery('.videos_m').click(function(e) {

		$('.contra').removeClass('active');
		$('.contra').addClass('off');
		$('.pago').removeClass('active');
		$('.pago').addClass('off');
		$('.anuncio').removeClass('active');
		$('.anuncio').addClass('off');
		$('.fotos').removeClass('active');
		$('.fotos').addClass('off');

		$('.videos').removeClass('off');
		$('.videos').addClass('active');

		e.preventDefault();
	});

	jQuery('.fotos_m').click(function(e) {

		$('.contra').removeClass('active');
		$('.contra').addClass('off');
		$('.pago').removeClass('active');
		$('.pago').addClass('off');
		$('.anuncio').removeClass('active');
		$('.anuncio').addClass('off');
		$('.videos').removeClass('active');
		$('.videos').addClass('off');

		$('.fotos').removeClass('off');
		$('.fotos').addClass('active');

		e.preventDefault();
	});

	jQuery('.listmodels').click(function(e) {

		$('.contra').removeClass('active');
		$('.contra').addClass('off');
		$('.re_admin').removeClass('active');
		$('.re_admin').addClass('off');

		$('.listado').removeClass('off');
		$('.listado').addClass('active_flex');
		$('.posts').removeClass('active_flex');
		$('.posts').addClass('off');

		e.preventDefault();
	});

	jQuery('.r_admin').click(function(e) {

		$('.contra').removeClass('active');
		$('.contra').addClass('off');
		$('.listado').removeClass('active_flex');
		$('.listado').addClass('off');
		$('.posts').removeClass('active_flex');
		$('.posts').addClass('off');

		$('.re_admin').removeClass('off');
		$('.re_admin').addClass('active');

		e.preventDefault();
	});

	jQuery('.articulo_v').click(function(e) {

		$('.contra').removeClass('active');
		$('.contra').addClass('off');
		$('.listado').removeClass('active_flex');
		$('.listado').addClass('off');
		$('.re_admin').removeClass('active');
		$('.re_admin').addClass('off');

		$('.posts').removeClass('off');
		$('.posts').addClass('active_flex');

		e.preventDefault();
	});


	jQuery('.cambiar_contraseña ').click(function(e) {

		$('.listado').removeClass('active_flex');
		$('.listado').addClass('off');
		$('.anuncio').removeClass('active');
		$('.anuncio').addClass('off');
		$('.videos').removeClass('active');
		$('.videos').addClass('off');
		$('.posts').removeClass('active_flex');
		$('.posts').addClass('off');
		$('.re_admin').removeClass('active');
		$('.re_admin').addClass('off');

		$('.admin-header').removeClass('off');
		$('.admin-header').addClass('active');
		$('.contra').removeClass('off');
		$('.contra').addClass('active');
		e.preventDefault();
	});

		var max_fields    = 3;

    //append imagenes
    var wrapper         = $(".fotos_model"); //Fields wrapper
    var add_button      = $("#add_image"); //Add button ID

    var x = 0; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-md-12"><label for="img" class="col-xs-4">Imagen '+ x +':</label><input style="overflow: hidden;" type="file" name="img[]" class="col-xs-8"><a href="#" class="remove_field col-xs-12">Remover</a></div>');//add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })

    //append videos
    var max_fields1      = 1;
    var wrapper1         = $(".video_model"); //Fields wrapper
    var add_button1      = $("#add_video"); //Add button ID

    var b = 0; //initlal text box count
    $(add_button1).click(function(e){ //on add input button click
        e.preventDefault();

        if(b < max_fields1){ //max input box allowed
            b++; //text box increment
            $(wrapper1).append('<div class="col-md-12"><label for="video" class="col-xs-4">Video '+ b +':</label><input style="overflow: hidden;" type="file" name="video" class="col-xs-8"><a href="#" class="remove_field col-xs-12">Remover</a></div>');//add input box
        }
    });

    $(wrapper1).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); b--;
    })
});