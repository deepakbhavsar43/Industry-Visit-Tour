<?php if ( ! empty( $instance['title'] ) ) : ?>
	<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title']; ?>
<?php endif; ?>
<?php if ( ! empty( $instance['sub_title'] ) ) : ?>
	<h4 class="widget-sub-title"><?php echo esc_html( $instance['sub_title'] ); ?></h4>
<?php endif; ?>

<?php if( !empty($instance['images']) ) : ?>
	<div class="advance-image-grid-wrapper advance-image-grid-col-<?php echo absint( $instance['display']['column_number'] ); ?>">
		<?php
		foreach( $instance['images'] as $image ) {

			$image_id = $image['image'];
			$image_fallback = $image['image_fallback'];

			$image_details = siteorigin_widgets_get_attachment_image_src(
				$image_id,
				$instance['display']['attachment_size'],
				$image_fallback
				);

			echo '<div class="advance-image-grid-image">';
				echo '<div class="advance-image-grid-image-inner">';
				if ( ! empty( $image['url'] ) ) {
					echo '<a href="' . sow_esc_url( $image['url'] ) . '">';
				}

				if ( ! empty( $image_details ) ) {
					echo '<img src="' . esc_url( $image_details[0] ) . '" alt="' . esc_attr( $image['title'] ) . '" />';
				}

				if ( ! empty( $image['title'] ) ) {
					echo '<h4>' . esc_html( $image['title'] ) . '</h4>';
				}

				if ( ! empty( $image['url'] ) ) {
					echo '</a>';
				}
				echo '</div>';
			echo '</div>';

		}
		?>
	</div><!-- .advance-image-grid-wrapper -->
<?php endif; ?>
