<?php

class Travel_Eye_Title_Subtitle_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'travel-eye-title-subtitle',
			__( 'Travel Eye: Title', 'travel-eye' ),
			array(
				'description' => __( 'A simple title and subtitle widget.', 'travel-eye' ),
			),
			array(),
			array(
				'primary_title' => array(
					'type'  => 'text',
					'label' => __( 'Primary Title', 'travel-eye' ),
				),

				'secondary_title' => array(
					'type'  => 'text',
					'label' => __( 'Secondary Title', 'travel-eye' ),
				),

				'title_content' => array(
					'type'  => 'textarea',
					'label' => __( 'Sub Title', 'travel-eye' ),
				),

				'align' => array(
					'type'    => 'select',
					'label'   => __( 'Alignment', 'travel-eye' ),
					'default' =>'center',
					'options' => array(
						'left'   => __( 'Left', 'travel-eye' ),
						'right'  => __( 'Right', 'travel-eye' ),
						'center' => __( 'Center', 'travel-eye' ),
					),
				),

			)
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'travel-eye-title-subtitle', __FILE__, 'Travel_Eye_Title_Subtitle_Widget' );
