<?php if ( ! empty( $instance['title'] ) ) : ?>
	<?php echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'] ?>
<?php endif; ?>
<?php if ( ! empty( $instance['sub_title'] ) ) : ?>
	<h4 class="widget-sub-title"><?php echo esc_html( $instance['sub_title'] ); ?></h4>
<?php endif; ?>

<?php
$carousel_args = array(
	'slidesToShow' => 4,
	'dots'         => false,
	'prevArrow'    => '<span data-role="none" class="slick-prev" tabindex="0"><i class="fa fa-long-arrow-left"></i></span>',
	'nextArrow'    => '<span data-role="none" class="slick-next" tabindex="0"><i class="fa fa-long-arrow-right"></i></span>',
	'responsive'   => array(
		array(
			'breakpoint' => 1024,
			'settings'   => array(
				'slidesToShow' => 3,
				),
			),
		array(
			'breakpoint' => 768,
			'settings'   => array(
				'slidesToShow' => 2,
				),
			),
		array(
			'breakpoint' => 480,
			'settings'   => array(
				'slidesToShow' => 1,
				),
			),
		),
	);
$carousel_args_encoded = wp_json_encode( $carousel_args );
?>

<div class='travel-eye-featured-trips' data-slick='<?php echo $carousel_args_encoded; ?>'>

	<?php foreach ( $instance['trips'] as $i => $trip ) : ?>
		<?php
			$profile_picture = $trip['profile_picture'];
			$profile_picture_fallback = $trip['profile_picture_fallback'];
			$image_details = siteorigin_widgets_get_attachment_image_src(
				$profile_picture,
				'medium',
				$profile_picture_fallback
				);
			$link_open = '';
			$link_close = '';
			if ( ! empty( $trip['trip_url'] ) ) {
				$link_open = '<a href="' . sow_esc_url( $trip['trip_url'] ) . '">';
				$link_close = '</a>';
			}
		?>
		<div class="product-list">
			<div class="product-list-wrap">

				<?php if ( ! empty( $image_details ) ) : ?>
					<img src="<?php echo esc_url( $image_details[0] ) ?>" alt="<?php echo esc_attr( $trip['full_name'] ); ?>">
				<?php endif; ?>
				<div class="trip-info">
					<h5><?php echo $link_open; ?><?php echo esc_html( $trip['trip_name'] ); ?><?php echo $link_close; ?></h5>
					<?php if ( ! empty( $trip['trip_price'] ) ) : ?>
						<span class="trip-price"><?php echo esc_attr( $trip['trip_price'] ); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $trip['trip_days'] ) ) : ?>
						<span class="trip-day"><?php echo esc_attr( $trip['trip_days'] ); ?><br />&nbsp;<?php _e( 'Days', 'travel-eye' ); ?></span>
					<?php endif; ?>
				</div><!-- .trip-info -->

			</div><!-- .product-list-wrap -->
		</div><!-- .product-list -->
	<?php endforeach; ?>

</div><!-- .travel-eye-featured-trips -->
