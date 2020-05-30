<?php   
/**
 * @package biztt
 */
 ?>
 <?php function biztt_style_js()
 {
 	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/app/require/bootstrap/css/bootstrap.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.css');
	wp_enqueue_style( 'biztt-basic-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/app/require/bootstrap/js/bootstrap.js', array('jquery'));	
	wp_enqueue_script( 'biztt-toggle-jquery', get_template_directory_uri() . '/js/biztt-toggle.js', array('jquery'));	
 }
 add_action( 'wp_enqueue_scripts', 'biztt_style_js' );
?>