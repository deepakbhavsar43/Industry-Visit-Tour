<?php
/**
 * Template file.
 *
 * @package Travel_Eye
 */

?>
<div class="section-content section-alignment-<?php echo esc_attr( $instance['align'] ); ?>">
	<?php if ( ! empty( $instance['primary_title'] ) ) : ?>
		<h3 <?php echo esc_attr( $instance['size'] ); ?> class="widget-title"><?php echo esc_html( $instance['primary_title'] ); ?></h3>
	<?php endif; ?>

	<?php if ( ! empty( $instance['secondary_title'] ) ) : ?>
		<h4 class="secondary-title"><?php echo esc_html( $instance['secondary_title'] ); ?></h4>
	<?php endif; ?>

	<?php if ( ! empty( $instance['title_content'] ) ) : ?>
		<p class="title-content"><?php echo esc_html( $instance['title_content'] ); ?></p>
	<?php endif; ?>
</div><!-- .section-content -->
