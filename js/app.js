(function( $ ) {

	/**
	 * When clicked, toggle aria-expanded attribute on self, and toggle is-open
	 * class on target of aria-controls attribute.
	 */
	$( '.js-usermenu-toggle' ).click( function() {
		
		var toggle = $( this );
		var target = $( '#menu-user-links' );
		var expanded = target.is(':visible');
		var icon	 = $( this ).find('.fa');

		if( icon.hasClass('fa-bars') ) {
			icon.removeClass('fa-bars').addClass('fa-close');
		} else {
			icon.removeClass('fa-close').addClass('fa-bars');
		}

		target.slideToggle();
	} );



	$('#bb-note').on('click', function(){

		console.log('test');

		if( $(this).find('.text').hasClass('show') ) {

			$(this).find('.text').removeClass('show');
			

		} else {

			$(this).find('.text').addClass('show');
		}


	})

	$('.nav-link-user-avatar').on('click', function(e){

		e.preventDefault();

		if( $('.header .popover').hasClass('show') ) {

			$('.header .popover').removeClass('show');

		} else {

			$('.header .popover').addClass('show');

		}

	});



})( jQuery );



