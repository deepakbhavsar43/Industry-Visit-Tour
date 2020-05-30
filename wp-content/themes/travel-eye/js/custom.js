( function( $ ) {

	$( document ).ready(function($){

		// Implement go to top.
		if ( 1 === parseInt( Travel_Eye_Custom_Options.go_to_top_status, 10 ) ) {

			var $scroll_obj = $( '#btn-scrollup' );

			$( window ).scroll(function(){
				if ( $( this ).scrollTop() > 100 ) {
					$scroll_obj.fadeIn();
				} else {
					$scroll_obj.fadeOut();
				}
			});

			$scroll_obj.click(function(){
				$( 'html, body' ).animate( { scrollTop: 0 }, 600 );
				return false;
			});

		} // End if go to top.

	    // Trigger mobile menu.
	    $('#mobile-trigger').sidr({
			timing: 'ease-in-out',
			speed: 500,
			source: '#mob-menu',
			name: 'sidr-main'
	    });

	});

} )( jQuery );
