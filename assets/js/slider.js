//almacenar slider en una variable
var slider = $('#slider');
//almacenar botones
var siguiente = $('#btn-next');
var anterior = $('#btn-prev');

//mover ultima imagen al primer lugar
$('#slider article:last').insertBefore('#slider article:first');
//mostrar la primera imagen con margen de -100%
slider.css('margin-left', '-'+100+'%');

function moverD() {
	slider.animate({marginLeft:'-'+200+'%'}, 700, function(){
		$('#slider article:first').insertAfter('#slider article:last');
		slider.css('margin-left', '-'+100+'%');
        $('')
	});
}

function moverI() {
	slider.animate({marginLeft:0}, 700, function(){
		$('#slider article:last').insertBefore('#slider article:first');
		slider.css('margin-left', '-'+100+'%');
	});
}

function autoplay() {
    interval = setInterval(function(){
        moverD();
    }, 10000);
}

siguiente.on('click',function() {
    moverD();
    clearInterval(interval);
    autoplay();
});

anterior.on('click',function() {
    moverI();
    clearInterval(interval);
    autoplay();
});



