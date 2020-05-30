<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Use this page template to remove the sidebar from any page.
 * 
 */
?>
<?php
    get_header(); 
?>

<!-- Page banner starts-->
<section class="banner" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
	<div class="overlay-bg padding-banner">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="banner-head text-white">
						<?php if (is_home() || is_front_page()) { ?>						
							<h2><?php the_title(); ?></h2>
						<?php } else { ?>
							<h2><?php wp_title(''); ?></h2>							
						<?php } ?>						
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
		<div class="post-wrap">
			<?php if(have_posts()) : ?>
				<?php while(have_posts()) : the_post(); ?>
					<div class="recent-img">
					   <?php if(has_post_thumbnail()) : ?>
					   <?php the_post_thumbnail('bizstart-page-thumbnail', array('class' => 'img-responsive')); ?>
					   <?php endif; ?>
					</div>
					<div class="post-info">
						<div class="post-detail">
							<?php the_content();  
									wp_link_pages( array(
									'before' => '<p>' . esc_html__( 'Pages:', 'bizstart' ),
									'after'  => '</p>',
									) );
									?>
						</div>
					</div>
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
	<div class="space-130"></div>
</section>
<!-- blog-details-page ends-->
<?php get_footer(); ?>