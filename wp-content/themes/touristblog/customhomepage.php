<?php 
/* Template Name: HomePage */ 

get_header();

?>
<div class="custom-header-image">
	<img src="<?php esc_url(header_image()); ?>" alt="" />
</div>

<!--   Showing Latest Posts   -->

<?php $the_query = new WP_Query( array( 'post_type' => 'post', 'showposts' => 3, 'post__not_in' => get_option( 'sticky_posts' ) )); ?>
<div class="latest-posts-container">
	<h5 class="recent-travel-stories"><?php esc_html_e('Some Recent Travel Stories From My travels','touristblog'); ?></h5>
	<div class="container">
		<div class="grid">
			<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
			<?php get_template_part('latest_posts'); ?>
			<?php 
				endwhile;
				wp_reset_postdata();
			?>
		</div>
	</div>
</div>

<?php
	get_footer();
?>