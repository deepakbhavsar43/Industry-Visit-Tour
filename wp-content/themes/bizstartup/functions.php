<?php 
add_action( 'wp_enqueue_scripts', 'bizstartup_theme_css',20);
function bizstartup_theme_css() {
	wp_enqueue_style( 'bizstartup-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bizstartup-style',get_stylesheet_directory_uri() . '/css/bizstartup.css');
  
}