<?php   
/**
 * @package biztt
 */
 ?>
 <?php
function biztt_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'biztt' ),
		'description'   => esc_html__( 'Appears on sidebar', 'biztt' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="" class="widget">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'biztt' ),
		'description'   => esc_html__( 'Appears on footer', 'biztt' ),
		'id'            => 'footer-1',
		'before_widget' => '',		
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1><aside id="" class="widget">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'biztt' ),
		'description'   => esc_html__( 'Appears on footer', 'biztt' ),
		'id'            => 'footer-2',
		'before_widget' => '',		
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1><aside id="" class="widget">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'biztt' ),
		'description'   => esc_html__( 'Appears on footer', 'biztt' ),
		'id'            => 'footer-3',
		'before_widget' => '',		
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1><aside id="" class="widget">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'biztt' ),
		'description'   => esc_html__( 'Appears on footer', 'biztt' ),
		'id'            => 'footer-4',
		'before_widget' => '',		
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1><aside id="" class="widget">',
		'after_widget'  => '</aside>',
	) );	
}
add_action( 'widgets_init', 'biztt_widgets_init' );
?>