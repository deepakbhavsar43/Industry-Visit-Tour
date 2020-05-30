<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel_Eye
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php travel_eye_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
    <?php
	  $archive_layout = travel_eye_get_option( 'archive_layout' );
		?>
		<?php if ( has_post_thumbnail() ) :  ?>
			<?php
			$archive_image           = travel_eye_get_option( 'archive_image' );
			$archive_image_alignment = travel_eye_get_option( 'archive_image_alignment' );
			?>
			<?php if ( 'disable' !== $archive_image ) : ?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( esc_attr( $archive_image ), array( 'class' => 'align'. esc_attr( $archive_image_alignment ) ) ); ?>
				</a>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( 'full' === $archive_layout ) :  ?>
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travel-eye' ),
					'after'  => '</div>',
				) );
			?>
		<?php else : ?>
			<?php the_excerpt(); ?>
		<?php endif ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php travel_eye_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
