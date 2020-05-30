<?php
/**
 * Default theme options.
 *
 * @package Travel_Eye
 */

if ( ! function_exists( 'travel_eye_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function travel_eye_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_title']            = true;
		$defaults['show_tagline']          = true;
		$defaults['contact_number']        = '234-235-5678';
		$defaults['contact_email']         = 'demo@example.com';
		$defaults['show_social_in_header'] = false;

		// Search.
		$defaults['search_placeholder'] = esc_html__( 'Search...', 'travel-eye' );

		// Layout.
		$defaults['global_layout']           = 'right-sidebar';
		$defaults['archive_layout']          = 'excerpt';
		$defaults['archive_image']           = 'large';
		$defaults['archive_image_alignment'] = 'center';
		$defaults['single_image']            = 'large';
		$defaults['single_image_alignment']  = 'center';

		// Pagination.
		$defaults['pagination_type'] = 'default';

		// Footer.
		$defaults['footer_background_image'] = get_template_directory_uri() . '/images/footer-widget-bg.jpg';
		$defaults['copyright_text']          = esc_html__( 'Copyright &copy; All rights reserved.', 'travel-eye' );
		$defaults['show_social_in_footer']   = true;
		$defaults['go_to_top']               = true;


		// Blog.
		$defaults['excerpt_length'] = 40;
		$defaults['read_more_text'] = esc_html__( 'Read More ...', 'travel-eye' );

		// Author Bio.
		$defaults['author_bio_in_single'] = true;

		// Breadcrumb.
		$defaults['breadcrumb_type'] = 'simple';

		// Pass through filter.
		$defaults = apply_filters( 'travel_eye_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
