<?php
/**
 * Recommended plugins.
 *
 * @package Travel_Eye
 */

add_action( 'tgmpa_register', 'travel_eye_activate_recommended_plugins' );

/**
 * Register recommended plugins.
 *
 * @since 1.0.0
 */
function travel_eye_activate_recommended_plugins() {

	$plugins = array(
		array(
			'name'     => __( 'Page Builder by SiteOrigin', 'travel-eye' ),
			'slug'     => 'siteorigin-panels',
			'required' => false,
		),
		array(
			'name'     => __( 'SiteOrigin Widgets Bundle', 'travel-eye' ),
			'slug'     => 'so-widgets-bundle',
			'required' => false,
		),
		array(
			'name'     => __( 'Contact Form 7', 'travel-eye' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),
	);

	$config = array();

	tgmpa( $plugins, $config );

}
