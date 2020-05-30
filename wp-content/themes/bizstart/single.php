<?php
/**
 * The template for displaying all single posts.
 *
 * @package Bizstart
 */
    get_header(); 
?>
<!-- Page banner starts-->
<section class="banner" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
	<div class="overlay-bg padding-banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="banner-head text-white">
						<h2><?php wp_title(''); ?></h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Page banner ends -->
<!-- blog-details-page-sidebar starts-->
<section class="blog-details-page-sidebar">
	<div class="space-130"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="post-wrap">
					<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							<?php  get_template_part( 'content-parts/content', 'single' ); ?>
						<?php endwhile; ?>
					<?php else : 
						get_template_part( 'content-parts/content', 'none' );
					endif; ?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif; ?> 
					</div>
				</div>
			</div>
			<div class="col-md-4 ">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<div class="space-130"></div>
</section>
<!-- blog-details-page ends-->
<?php get_footer(); ?>