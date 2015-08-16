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

	// // RED
	$('.Red-bloqueIcon').click(function() {
		$(this).find( "i" ).toggleClass('fa-plus');
		$(this).find( "i" ).toggleClass('fa-minus');
		redPadre = $(this).closest('ul');
		redHijos = redPadre.children('ul'); 
		redHijos.toggle();
		console.log(redHijos);
	});
});