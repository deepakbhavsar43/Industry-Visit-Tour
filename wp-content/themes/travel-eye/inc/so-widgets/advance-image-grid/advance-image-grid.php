<?php

class Travel_Eye_Advance_Image_Grid_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'travel-eye-advance-image-grid',
			__( 'Travel Eye: Advance Image Grid', 'travel-eye' ),
			array(
				'description' => __( 'Displays an images in grid layout', 'travel-eye' ),
				),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'travel-eye' ),
				),
				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Sub Title', 'travel-eye' ),
				),
				'images' => array(
					'type' => 'repeater',
					'label' => __( 'Images', 'travel-eye' ),
					'item_name'  => __( 'Image', 'travel-eye' ),
					'item_label' => array(
						'selector'     => "[name*='title']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'image' => array(
							'label'    => __( 'Image', 'travel-eye' ),
							'type'     => 'media',
							'library'  => 'image',
							'fallback' => true,
						),
						'title' => array(
							'label' => __( 'Image title', 'travel-eye' ),
							'type'  => 'text',
						),
						'url' => array(
							'label' => __( 'URL', 'travel-eye' ),
							'type'  => 'link',
						),
					),
				),
				'display' => array(
					'type' => 'section',
					'label' => __( 'Display', 'travel-eye' ),
					'fields' => array(
						'attachment_size' => array(
							'label'   => __( 'Image Size', 'travel-eye' ),
							'type'    => 'select',
							'default' => 'medium',
							'options' => travel_eye_get_image_sizes_options( false, array( 'thumbnail', 'medium' ), false ),
						),
						'column_number' => array(
							'label'   => __( 'No of Columns', 'travel-eye' ),
							'type'    => 'select',
							'default' => 5,
							'options' => array(
								'3' => 3,
								'4' => 4,
								'5' => 5,
								),
						),
					),
				),
			)
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}

}

siteorigin_widget_register( 'travel-eye-advance-image-grid', __FILE__,'Travel_Eye_Advance_Image_Grid_Widget' );
