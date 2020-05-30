<?php
/**
 * Core functions.
 *
 * @package Travel_Eye
 */

/**
 * Get theme option.
 *
 * @since 1.0.0
 *
 * @param string $key Option key.
 * @return mixed Option value.
 */
function travel_eye_get_option( $key = '' ) {

	global $travel_eye_default_options;
	if ( empty( $key ) ) {
		return;
	}

	$default = ( isset( $travel_eye_default_options[ $key ] ) ) ? $travel_eye_default_options[ $key ] : '';
	$theme_options = get_theme_mod( 'theme_options', $travel_eye_default_options );
	$theme_options = array_merge( $travel_eye_default_options, $theme_options );
	$value = '';
	if ( isset( $theme_options[ $key ] ) ) {
		$value = $theme_options[ $key ];
	}
	return $value;

}

/**
 * Get all theme options.
 *
 * @since 1.0.0
 *
 * @return array Theme options.
 */
function travel_eye_get_options() {

	$value = array();
	$value = get_theme_mod( 'theme_options' );
	return $value;

}
