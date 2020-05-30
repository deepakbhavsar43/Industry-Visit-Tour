<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel_Eye
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
    <?php
	  /**
	   * Hook - travel_eye_single_image.
	   *
	   * @hooked travel_eye_add_image_in_single_display -  10
	   */
	  do_action( 'travel_eye_single_image' );
	?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travel-eye' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php travel_eye_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php
		/**
		 * Hook - travel_eye_author_bio.
		 *
		 * @hooked travel_eye_add_author_bio_in_single -  10
		 */
		do_action( 'travel_eye_author_bio' );
	?>

</article><!-- #post-## -->

