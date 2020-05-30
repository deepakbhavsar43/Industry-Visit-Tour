<?php 
/**
 * Template Name: Home Page
 *
*/
get_header();
get_template_part( 'section-parts/front-page-slider' );
get_template_part( 'section-parts/front-page-thecontent');
get_template_part( 'section-parts/front-page-aboutus' );
get_template_part( 'section-parts/front-page-services' );
get_template_part( 'section-parts/front-page-blogpost' );
get_footer(); 
?>