<?php

class Travel_Eye_Social_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'travel-eye-social',
			__( 'Travel Eye: Social', 'travel-eye' ),
			array(
				'description' => __( 'Social Icons Widget.', 'travel-eye' ),
			),
			array(),
			array(
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Primary Title', 'travel-eye' ),
				),

				'subtitle' => array(
					'type'  => 'text',
					'label' => __( 'Secondary Title', 'travel-eye' ),
				),

			)
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}

}

siteorigin_widget_register( 'travel-eye-social', __FILE__, 'Travel_Eye_Social_Widget' );
