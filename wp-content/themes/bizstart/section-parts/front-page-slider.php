<?php
/**
 * Template part - Features Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Bizstart
*/

$bizstart_slider_no        = 3;
$bizstart_slider_pages      = array();
for( $i = 1; $i <= $bizstart_slider_no; $i++ ) {
    $bizstart_slider_pages[]    =  get_theme_mod( "bizstart_slider_page_$i", 1 );
    $bizstart_slider_btntxt[]    =  get_theme_mod( "bizstart_slider_btntxt_$i", 1 );
    $bizstart_slider_btnurl[]    =  get_theme_mod( "bizstart_slider_btnurl_$i", 1 );
}
$bizstart_slider_args  = array(
    'post_type' => 'page',
    'post__in' => array_map( 'absint', $bizstart_slider_pages ),
    'posts_per_page' => absint($bizstart_slider_no),
    'orderby' => 'post__in'
); 
	
$bizstart_slider_query = new  wp_Query( $bizstart_slider_args );

if ($bizstart_slider_query->have_posts() ) { ?>
    <!-- slider_area starts-->
    <section class="slider_area text-center">
        <div id="slider" class="slider_full owl-carousel owl-theme">
            <?php
		    $count = 0;
		    while($bizstart_slider_query->have_posts()) :
			    $bizstart_slider_query->the_post();
            ?>
				<div class="slider_item">
				    <?php if(has_post_thumbnail()) : ?>
						<?php the_post_thumbnail(); ?>
					<?php endif; ?>
					<div class="slider_content">
						<div class="container overly">
							<div class=" slider_content_table">
								<div class="slider_content_table_cell">
									<h2 data-animation-in="zoomInLeft">
										<?php the_title(); ?>
									</h2>
								    <?php the_content(); ?>
								    <?php if($bizstart_slider_btntxt[$count] != ""){ ?>
										<div class="slider_button">
											<a class="btn download" href="<?php echo esc_url($bizstart_slider_btnurl[$count]); ?>" data-animation-in="fadeInLeft">
												<?php echo esc_html($bizstart_slider_btntxt[$count]); ?>
												<img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/arrow-right.png'); ?>" alt="<?php echo esc_attr__('arrow','bizstart')?>" />
											</a>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
            <?php
			$count = $count + 1;
			endwhile;
			wp_reset_postdata();
            ?>  
        </div>
    </section>
    <!-- slider_area ends-->
<?php }
else 
	{?>
	<section class="banner" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
	<div class="overlay-bg padding-banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="banner-head text-white">
						<h2><?php the_title(); ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}
?>