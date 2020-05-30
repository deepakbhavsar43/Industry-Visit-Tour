<div class="booking-form-widget-wrapper">

	<?php if ( ! empty( $instance['title'] ) ) : ?>
		<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] ?>
	<?php endif; ?>
	<?php if ( ! empty( $instance['sub_title'] ) ) : ?>
		<h4 class="widget-sub-title"><?php echo esc_html( $instance['sub_title'] ); ?></h4>
	<?php endif; ?>

	<?php if ( defined( 'WPCF7_VERSION' ) ) : ?>
		<?php
		if ( ! empty( $instance['form_id'] ) && absint( $instance['form_id'] ) > 0  ) {
			$shortcode = '[contact-form-7 id="' . absint( $instance['form_id'] ) . '"]';
			echo do_shortcode( $shortcode );
		}
		else {
			if ( current_user_can( 'administrator' ) ) {
				_e( 'Booking form is not selected.', 'travel-eye' );
			}
		}
		?>
	<?php else : ?>
		<?php if ( current_user_can( 'administrator' ) ) : ?>
			<?php _e( 'Please install and activate Contact Form 7.', 'travel-eye' ); ?>
		<?php endif; ?>
	<?php endif; ?>

</div><!-- .booking-form-widget-wrapper  -->
