$(document).ready(function(){
	$.stellar({
		horizontalScrolling: false,
		responsive: true
	});

	new WOW().init();

	$('.dropdown').on('show.bs.dropdown', function(e){
		$(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});
    $('.dropdown').on('hide.bs.dropdown', function(e){
    	$(this).find('.dropdown-menu').first().stop(true, true).slideUp();
  	});
});
