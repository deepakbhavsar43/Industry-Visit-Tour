<?php
/**
 * Featured Trips widget.
 *
 * @package Travel_Eye
 */

class Travel_Eye_Featured_Trips_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'travel-eye-featured-trips',
			__( 'Travel Eye: Featured Trips', 'travel-eye' ),
			array(
				'description' => __( 'Displays featured trips in carousel', 'travel-eye' ),
			),
			array(),
			array(
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Title', 'travel-eye' ),
				),
				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Sub Title', 'travel-eye' ),
				),
				'trips' => array(
					'type'       => 'repeater',
					'label'      => __( 'Trips', 'travel-eye' ),
					'item_name'  => __( 'Trip', 'travel-eye' ),
					'item_label' => array(
						'selector'     => "[id*='trips-trip_name']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'trip_name' => array(
							'type'  => 'text',
							'label' => __( 'Name', 'travel-eye' ),
						),
						'trip_price' => array(
							'type'  => 'text',
							'label' => __( 'Price', 'travel-eye' ),
						),
						'trip_days' => array(
							'type'  => 'text',
							'label' => __( 'Days', 'travel-eye' ),
						),
						'trip_url' => array(
							'type'  => 'link',
							'label' => __( 'URL', 'travel-eye' ),
						),
						'profile_picture' => array(
							'type'     => 'media',
							'library'  => 'image',
							'label'    => __( 'Image', 'travel-eye' ),
							'fallback' => true,
						),
					),
				),
			)
		);

	}

	function get_template_name( $instance ) {
		return 'default';
	}

	function initialize() {

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		$this->register_frontend_styles(
			array(
				array(
					'slick-css',
					get_template_directory_uri() . '/third-party/slick/slick' . $min . '.css',
					array(),
					'1.5.9',
				),
			)
		);

		$this->register_frontend_scripts(
			array(
				array(
					'slick-js',
					get_template_directory_uri() . '/third-party/slick/slick' . $min . '.js',
					array( 'jquery' ),
					'1.5.9',
					true,
				),
				array(
					'travel-eye-featured-trips-custom',
					get_template_directory_uri() . '/inc/so-widgets/featured-trips/js/custom.js',
					array( 'jquery', 'slick-js' ),
					'1.0.0',
					true,
				),
			)
		);

	}
}

siteorigin_widget_register( 'travel-eye-featured-trips', __FILE__, 'Travel_Eye_Featured_Trips_Widget' );
