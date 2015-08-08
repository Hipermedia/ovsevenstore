jQuery(document).ready(function($) {

	//Aquí van los Jquerys y JS personalizados del tema

	// Reduce el header al hacer scrolldown; la animación se realiza con CSS
	$(window).on("scroll touchmove", function () {
		$('#header-wrapper').toggleClass('tiny', $(document).scrollTop() > 0);
		$('#header').toggleClass('tiny', $(document).scrollTop() > 0);
	});
	
	// Versión responsive del menú; oculta la navegación y en su defecto aparece un botón para mostrar u ocultarl la navegación
	$('.toggle-nav').click(function(e) {
        $(this).toggleClass('activo');
        $('#header-main-nav ul').toggleClass('activo'); 
        e.preventDefault();
    });

	// Pone la clase .active a cualquier link que haya en el documento que corresponda con el url actual
	var url = window.location.href;
	$('a[href="'+url+'"]').addClass('active');


	//Agrega una animación al hacer scroll al llegar a un elemento gracias a waypoints

	$('.titulo').waypoint(function(direction) {
	  $('.titulo').addClass( 'fadeInUp animated' );
	},{
	  offset:'20%'
	});

	// HOME LOGIN FORM
	$('#wp-submit').toggleClass('btn btn-primary btn-round');
	$('.login-remember label').addClass('checkbox');
	$(".login-remember label").attr("for","rememberme"); 
	$("#rememberme").attr("data-toggle","checkbox"); 

	// Registri API
	$('#acf-registradoApi ul li label').addClass('checkbox');
	$('#acf-registradoApi ul li label').attr("for","acf-field-registradoApi-1");
	$('#acf-registradoApi ul li label').prepend("Confirmo que los datos de este formulario son correctos");
	$("#acf-field-registradoApi-1").attr("data-toggle","checkbox"); 


    // GET SHITS DONE     
    $('.btn-tooltip').tooltip();
    $('.label-tooltip').tooltip();
    $('.pick-class-label').click(function(){
        var new_class = $(this).attr('new-class');  
        var old_class = $('#display-buttons').attr('data-class');
        var display_div = $('#display-buttons');
        if(display_div.length) {
        var display_buttons = display_div.find('.btn');
        display_buttons.removeClass(old_class);
        display_buttons.addClass(new_class);
        display_div.attr('data-class', new_class);
        }
    });


    $( "#slider-range" ).slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 75, 300 ],
	});
	$( "#slider-default" ).slider({
			value: 70,
			orientation: "horizontal",
			range: "min",
			animate: true
	});
	$('.carousel').carousel({
      interval: 4000
    });
      
    



});