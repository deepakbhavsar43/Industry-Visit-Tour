<?php

class Travel_Eye_Booking_Form_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'travel-eye-booking',
			__('Travel Eye: Booking Form', 'travel-eye'),
			array(
				'description' => __( 'Display form from Contact Form 7.', 'travel-eye'),
			),
			array(

			),
			array(
				'title' => array(
					'type'  => 'text',
					'label' => __('Title', 'travel-eye'),
				),
				'sub_title' => array(
					'type'  => 'text',
					'label' => __('Subtitle', 'travel-eye'),
				),
				'form_id' => array(
					'type'    => 'select',
					'label'   => __('Form', 'travel-eye'),
					'options' => $this->get_form_options(),
				),
				'start_offset' => array(
					'type'        => 'number',
					'label'       => __( 'Widget Start Offset', 'travel-eye' ),
					'description' => __( 'in px', 'travel-eye' ),
					'default'     => 0,
				),
			),
			plugin_dir_path(__FILE__)
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}

	function get_style_name( $instance ) {
		return 'default';
	}

	function get_form_options() {
		$output = array();
		$output[] = __( '&mdash; Select &mdash;', 'travel-eye' );
		$qargs = array(
			'post_type' => 'wpcf7_contact_form',
			);
		$all_posts = get_posts( $qargs );
		if ( ! empty( $all_posts ) ) {
			foreach ( $all_posts as $p ) {
				$output[$p->ID] = esc_html( $p->post_title );
			}
		}
		return $output;
	}

	function get_less_variables( $instance ) {

		$less_vars = array();

		if ( ! empty( $instance['start_offset'] ) ) {
			$less_vars['start_offset'] = intval( $instance['start_offset'] ) . 'px';
		}
		return $less_vars;

	}


}

siteorigin_widget_register( 'travel-eye-booking', __FILE__, 'Travel_Eye_Booking_Form_Widget' );
