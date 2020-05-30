<?php
/**
 * CSS related hooks.
 *
 * This file contains hook functions which are related to CSS.
 *
 * @package Travel_Eye
 */

if ( ! function_exists( 'travel_eye_trigger_custom_css_action' ) ) :

	/**
	 * Do action theme custom CSS.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_trigger_custom_css_action() {

		/**
		 * Hook - travel_eye_action_theme_custom_css.
		 */
		do_action( 'travel_eye_action_theme_custom_css' );

	}

endif;

add_action( 'wp_head', 'travel_eye_trigger_custom_css_action', 99 );
