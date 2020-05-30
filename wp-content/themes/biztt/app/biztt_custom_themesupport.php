<?php   
/**
 * @package biztt
 */
 ?>
 <?php
 if ( ! function_exists( 'biztt_setup' ) ) :
function biztt_setup() {   
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'biztt' ),
		'footer' => esc_html__( 'Footer Menu', 'biztt' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );	
} 
endif; // biztt_setup
add_action( 'after_setup_theme', 'biztt_setup' );
?>