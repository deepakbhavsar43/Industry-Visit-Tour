<?php

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function touristblog_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Open Sans:400,700,900');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return esc_url( $fonts_url );
	
}
function touristblog_scripts_styles() {
    wp_enqueue_style( 'touristblog-fonts', touristblog_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'touristblog_scripts_styles' );
?>