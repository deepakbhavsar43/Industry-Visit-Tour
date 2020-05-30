<?php
/**
 * Template part - AboutUs Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bizstart
*/

	$bizstart_about_title =  get_theme_mod('bizstart-about_title');  
	$bizstart_about_subtitle =  get_theme_mod('bizstart-about_subtitle');  
	$bizstart_aboutus_section     = get_theme_mod( 'bizstart_aboutus_section_hideshow','hide');

	$bizstart_about_no        = 1;
	$bizstart_about_pages      = array();
	
	for( $i = 1; $i <= $bizstart_about_no; $i++ ) {
		$bizstart_about_pages[]    =  get_theme_mod( "bizstart_about_page_$i", 1 );
		 
	}

	$bizstart_about_args  = array(
		'post_type' => 'page',
		'post__in' => array_map( 'absint', $bizstart_about_pages ),
		'posts_per_page' => absint($bizstart_about_no),
		'orderby' => 'post__in'
	   
	); 

	$bizstart_about_query = new   wp_Query( $bizstart_about_args );

	if( $bizstart_aboutus_section == "show") :
?>
		<section id="about" class="about text-center">
			<div class="space-130"></div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<?php if($bizstart_about_title != "")
						{?>
							<h3 class="text-capitalize text-blue"><?php echo esc_html($bizstart_about_title); ?></h3>
							<img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/border/about-border.png');?>" alt="<?php echo esc_attr__('border','bizstart')?>" />
						<?php 
						}?>	
						<div class="space-60"></div>
						<p class="fw-500">
							<?php echo  esc_html($bizstart_about_subtitle); 
							?>
						</p>
					</div>
				</div>
				<div class="space-60"></div>
				<div class="row">
					<?php 
					if($bizstart_about_query->have_posts()):
						while($bizstart_about_query->have_posts()) :
							$bizstart_about_query->the_post();
						    if(has_post_thumbnail()) { ?>
								<div class="col-sm-6 hidden-xs">
									<?php 
									if(has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('bizstart-about-thumbnail'); ?>
									<?php endif; ?>							
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="row">
										<div class="col-sm-12 text-left ">
											<?php the_excerpt(); ?>
											<div class="space-40"></div>
											<a href="<?php the_permalink() ?>" class="btn btn-custom text-blue">
												<?php echo esc_html__('Read More', 'bizstart' ); ?>
												<i class="fa fa-long-arrow-right"></i>
											</a>
										</div>
									</div>
								</div>
							<?php 
							} else 
							{ ?>
								<div class="col-sm-12 text-left ">
									<?php the_excerpt(); ?>
									<div class="space-40"></div>
									<a href="<?php the_permalink() ?>" class="btn btn-custom text-blue">
										<?php echo esc_html__('Read More', 'bizstart' ); ?>
										<i class="fa fa-long-arrow-right"></i>
									</a>
								</div>
						    <?php
					        }
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