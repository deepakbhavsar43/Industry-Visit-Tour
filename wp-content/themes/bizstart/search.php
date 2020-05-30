<?php
/**
 * The template for displaying search results pages.
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
					   <?php if ( have_posts() ) : ?>
						<h2><?php 
					/* translators: %s: search term */
					printf( esc_html__( 'Search Results for: %s', 'bizstart' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
					   <?php else : ?>
					   <h2><?php
					/* translators: %s: nothing found term */
					printf( esc_html__( 'Nothing Found for: %s', 'bizstart' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
					<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Page banner ends -->
<!-- single column starts-->
<section class="single-column text-center">
	<div class="space-130"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post(); ?>
					<div class="row">
						<div class="col-sm-12">
							<div class="post-wrap">
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<?php get_template_part('content-parts/content','search'); ?>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
					<?php the_posts_pagination(
						array(
						  'prev_text' =>esc_html__('&laquo;','bizstart'),
						  'next_text' =>esc_html__('&raquo;','bizstart')
						)
					); ?>
				<?php else : 
					get_template_part( 'content-parts/content', 'none' );
				endif; ?>		
			</div>
			<div class="col-md-4 text-left">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<div class="space-130"></div>
</section>

<!-- single column ends-->
<?php get_footer(); ?>