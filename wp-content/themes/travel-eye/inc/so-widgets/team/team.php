<?php
/**
 * Team widget.
 *
 * @package Travel_Eye
 */

class Travel_Eye_Team_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'travel-eye-team',
			__( 'Travel Eye: Team', 'travel-eye' ),
			array(
				'description' => __( 'Displays a team member carousel', 'travel-eye' ),
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
				'members' => array(
					'type'       => 'repeater',
					'label'      => __('Members', 'travel-eye'),
					'item_name'  => __( 'Member', 'travel-eye' ),
					'item_label' => array(
						'selector'     => "[id*='members-full_name']",
						'update_event' => 'change',
						'value_method' => 'val',
					),

					'fields' => array(
						'full_name' => array(
							'type'  => 'text',
							'label' => __('Full Name', 'travel-eye'),
						),
						'position' => array(
							'type'  => 'text',
							'label' => __('Position', 'travel-eye'),
						),
						'profile_picture' => array(
							'type'     => 'media',
							'library'  => 'image',
							'label'    => __('Image', 'travel-eye'),
							'fallback' => true,
						),
					),
				),
				'image_size' => array(
					'type'    => 'select',
					'label'   => __( 'Image Size', 'travel-eye' ),
					'default' => 'medium',
					'options' => travel_eye_get_image_sizes_options( false, array( 'thumbnail', 'medium' ), false ),
				),
			)
		);
	}

	function get_template_name($instance){
		return 'default';
	}

}

siteorigin_widget_register( 'travel-eye-team', __FILE__, 'Travel_Eye_Team_Widget' );
