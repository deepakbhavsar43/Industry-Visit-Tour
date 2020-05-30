<?php
/**
 * Template part - Service Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bizstart
*/
$bizstart_services_title = get_theme_mod('bizstart-services_title');
$bizstart_services_subtitle = get_theme_mod('bizstart-services_subtitle');
$bizstart_services_section     = get_theme_mod( 'bizstart_services_section_hideshow','hide');
$bizstart_col_layout         = get_theme_mod( 'bizstart_service_bizstart_col_layout', '4' );


$bizstart_service_no_excerpt = get_theme_mod('bizstart_service_no_excerpt');

$bizstart_services_no        = 6;
$bizstart_services_pages      = array();
$bizstart_services_icons     = array();

for( $i = 1; $i <= $bizstart_services_no; $i++ ) {
  $bizstart_services_pages[]    =  get_theme_mod( "bizstart_service_page_$i", 1 );
  $bizstart_services_icons[]    = get_theme_mod( "bizstart_page_service_icon_$i", '' );
}

$bizstart_services_args  = array(
  'post_type' => 'page',
  'post__in' => array_map( 'absint', $bizstart_services_pages ),
  'posts_per_page' => absint($bizstart_services_no),
  'orderby' => 'post__in'
 
); 

$bizstart_services_query = new   wp_Query( $bizstart_services_args );

if( $bizstart_services_section == "show") :

?>
	<!-- services starts-->
	<section id="service" class="service text-white text-center">
	    <div class="space-130"></div>
		<div class="container">
			<div class="row">
			    <div class="col-sm-12 text-center">
					<?php if($bizstart_services_title != "")
					{?>
						<h3 class="text-capitalize">
						    <?php echo esc_html($bizstart_services_title); ?>
						</h3>
						<img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/border/service-border.png');?>" alt="<?php echo esc_attr__('border','bizstart')?>">
				    <?php }?>
				    <div class="space-60"></div>
				    <p class="fw-500">
					    <?php echo  esc_html($bizstart_services_subtitle); ?>
				    </p>
			    </div>
			</div>
			<div class="space-60"></div>
			<div class="row">
			    <?php
			    if($bizstart_services_query->have_posts()):
					$count = 0;
					while($bizstart_services_query->have_posts()) :
						$bizstart_services_query->the_post();
				    ?>
						<div class="col-lg-<?php echo $bizstart_col_layout; ?> col-md-<?php echo $bizstart_col_layout; ?>">
						    <ul>
								<li class="service-inner ptb-20">
									<?php if($bizstart_services_icons[$count] !="")
									{?>
										<span class="fa <?php echo esc_attr($bizstart_services_icons[$count]); ?>"></span>
									<?php 
									} ?>
									<a href="<?php the_permalink();?>">
										<h3 class="ptb-10 fw-600 text-capitalize">
										    <?php the_title(); ?>
										</h3>
								    </a>
									<?php the_excerpt(); ?>
								</li>
						    </ul>
						</div>
					<?php
					$count = $count + 1;
					endwhile;
					wp_reset_postdata();
				endif;?>  
			</div>
	    </div>
	    <div class="space-130"></div>
	</section>
<?php
endif;
?>