<?php

class Travel_Eye_Address_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'travel-eye-address',
			__( 'Travel Eye: Address', 'travel-eye' ),
			array(
				'description' => __('Displays an contact address details', 'travel-eye' ),

				),
			array(),
			array(

				'title' => array(
					'type' => 'text',
					'label' => __('Title', 'travel-eye'),
				),

				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Sub Title', 'travel-eye' ),
				),

				'address_repeater' => array(
					'type'      => 'repeater',
					'label'     => __('Enter Contact Details.', 'travel-eye'),
					'item_name' => __( 'Details', 'travel-eye' ),
					'item_label' => array(
						'selector'     => "[id*='address_repeater-contact']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'icon' => array(
							'type'  => 'icon',
							'label' => __( 'Select Icon', 'travel-eye' )
						),
						'contact' => array(
							'type'  => 'text',
							'label' => __( 'Enter Address Details like Phone Number / Address / Location', 'travel-eye' )
						),
						'contact_detail' => array(
							'type' => 'text',
							'label' => __( 'Enter Details for Above Fields', 'travel-eye' )
						)

					),
				),

			)
		);
	}
	function get_template_name($instance){
		return 'default';
	}

}
siteorigin_widget_register( 'travel-eye-address', __FILE__,'Travel_Eye_Address_Widget');
