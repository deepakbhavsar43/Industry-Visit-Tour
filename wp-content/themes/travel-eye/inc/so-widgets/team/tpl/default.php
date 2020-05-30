<?php if ( ! empty( $instance['title'] ) ) : ?>
	<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] ?>
<?php endif; ?>
<?php if ( ! empty( $instance['sub_title'] ) ) : ?>
	<h4 class="widget-sub-title"><?php echo esc_html( $instance['sub_title'] ); ?></h4>
<?php endif; ?>
<?php
	$instance['per_row'] = 4;
	$last_row = floor( ( count($instance['members']) - 1 ) / $instance['per_row'] );
?>

<div class="wt-members-list wt-members-column-<?php echo esc_attr( $instance['per_row'] ); ?>">

	<?php foreach( $instance['members'] as $i => $member ) : ?>

		<?php if( $i % $instance['per_row'] == 0 && $i != 0 ) : ?>
			<div class="clear-fix"></div>
		<?php endif; ?>

		<div class="wt-members-member <?php if(  floor( $i / $instance['per_row'] ) == $last_row ) echo 'wt-members-member-last-row' ?>">

			<div class="wt-image-container">
				<?php
					$profile_picture = $member['profile_picture'];
					$profile_picture_fallback = $member['profile_picture_fallback'];
					$image_details = siteorigin_widgets_get_attachment_image_src(
						$profile_picture,
						$instance['image_size'],
						$profile_picture_fallback
					);
					if ( ! empty( $image_details ) ) {
						echo '<img src="' . esc_url( $image_details[0] ) . '" />';
					}
				 ?>
			</div><!-- .wt-image-container -->
			<div class="wt-info-container">
				<?php if ( ! empty( $member['full_name'] ) ) : ?>
					<h4><?php echo esc_html( $member['full_name'] ); ?></h4>
				<?php endif ?>
				<?php if ( ! empty( $member['position'] ) ) : ?>
					<p><?php echo esc_html( $member['position'] ); ?></p>
				<?php endif ?>
			</div><!-- .wt-info-container -->

		</div>

	<?php endforeach; ?>

</div>
