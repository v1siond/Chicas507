var siguiente = $('#btn-next');
var anterior = $('#btn-prev');
var min = 0;
var max = $('#min_modelos img').length;
var current = 0;

$(document).ready(function(){
	anterior.hide();
	$('#min_modelos img').eq(current).addClass('active');
	var fondo = document.querySelectorAll('#min_modelos img')[current].src
	$('#foto_modelo').css('background', 'url(' + fondo + ')');
	$('#foto_modelo').css('background-size', '100% 100%');
});

$('#min_modelos img').click(function(e){
	$('#fotos img').removeClass('active');
	var img = e.target.src;
	var i = $(this).index();
	var model = $(this).attr('class');

	$('aside.datos').addClass('off');	
	$('aside#' + model).removeClass('off');
	$('aside#' + model).addClass('on');	

	current = i;
	$(this).addClass('active');
	$(this).siblings().removeClass('active'); 
	$('#foto_modelo').css('background', 'url(' + img + ')');
	$('#foto_modelo').css('background-size', '100% 100%');

	if(current == max-1){
		siguiente.hide();
	}
	else{
		siguiente.show();
	}
	if(current < 1){
		anterior.hide();
	}
	else
	{
		anterior.show();
	}
})

$('#fotos img').click(function(e){
	$('#min_modelos img').removeClass('active');
	var img = e.target.src;
	$(this).addClass('active');
	$(this).siblings().removeClass('active'); 
	$('#foto_modelo').css('background', 'url(' + img + ')');
	$('#foto_modelo').css('background-size', '100% 100%');
})

siguiente.on('click',function() {

	if(current < max){
		anterior.show();
		$('#min_modelos img').removeClass('active');
		$('#fotos img').removeClass('active');
		current++;
		$('#min_modelos img').eq(current).addClass('active');
		var fondo = document.querySelectorAll('#min_modelos img')[current].src
		$('#foto_modelo').css('background', 'url(' + fondo + ')');
		$('#foto_modelo').css('background-size', '100% 100%');
		if(current == max-1){
			siguiente.hide();
		}
	}
})
anterior.on('click',function() {
	
		$('#min_modelos img').removeClass('active');
		$('#fotos img').removeClass('active');
		siguiente.show();
		current--;
		$('#min_modelos img').eq(current).addClass('active');
		var fondo = document.querySelectorAll('#min_modelos img')[current].src
		$('#foto_modelo').css('background', 'url(' + fondo + ')');
		$('#foto_modelo').css('background-size', '100% 100%');
		if(current < 1){
			anterior.hide();
		}
})