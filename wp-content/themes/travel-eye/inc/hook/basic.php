<?php
/**
 * Basic theme functions.
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package Travel_Eye
 */

if ( ! function_exists( 'travel_eye_customize_search_form' ) ) :
	/**
	 * Customize search form.
	 *
	 * @since 1.0.0
	 *
	 * @return string The search form HTML output.
	 */
	function travel_eye_customize_search_form() {

		$search_placeholder = travel_eye_get_option( 'search_placeholder' );
		$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
	      <label>
	        <span class="screen-reader-text">' . _x( 'Search for:', 'label', 'travel-eye' ) . '</span>
	        <input type="search" class="search-field" placeholder="' . esc_attr( $search_placeholder ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'travel-eye' ) . '" />
	      </label>
	      <input type="submit" class="search-submit" value="&#xf002;" />
	    </form>';

		return $form;

	}

endif;

add_filter( 'get_search_form', 'travel_eye_customize_search_form', 15 );

if ( ! function_exists( 'travel_eye_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function travel_eye_implement_excerpt_length( $length ) {

		$excerpt_length = travel_eye_get_option( 'excerpt_length' );
		if ( empty( $excerpt_length ) ) {
			$excerpt_length = $length;
		}
		return apply_filters( 'travel_eye_filter_excerpt_length', esc_attr( $excerpt_length ) );

	}

endif;

if ( ! function_exists( 'travel_eye_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function travel_eye_implement_read_more( $more ) {

		$flag_apply_excerpt_read_more = apply_filters( 'travel_eye_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more;
		}

		$output = $more;
		$read_more_text = travel_eye_get_option( 'read_more_text' );
		if ( ! empty( $read_more_text ) ) {
			$output = ' <a href="'. esc_url( get_permalink() ) . '" class="read-more">' . esc_html( $read_more_text ) . '</a>';
			$output = apply_filters( 'travel_eye_filter_read_more_link' , $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'travel_eye_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function travel_eye_content_more_link( $more_link, $more_link_text ) {

		$flag_apply_excerpt_read_more = apply_filters( 'travel_eye_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more_link;
		}

		$read_more_text = travel_eye_get_option( 'read_more_text' );
		if ( ! empty( $read_more_text ) ) {
			$more_link = str_replace( $more_link_text, esc_html( $read_more_text ), $more_link );
		}
		return $more_link;

	}

endif;

if ( ! function_exists( 'travel_eye_custom_body_class' ) ) :
	/**
	 * Custom body class
	 *
	 * @since 1.0.0
	 *
	 * @param string|array $input One or more classes to add to the class list.
	 * @return array Array of classes.
	 */
	function travel_eye_custom_body_class( $input ) {

		// Global layout.
		global $post;
		$global_layout = travel_eye_get_option( 'global_layout' );
		$global_layout = apply_filters( 'travel_eye_filter_theme_global_layout', $global_layout );

		// Check if single.
		if ( $post  && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'travel_eye_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		$input[] = 'global-layout-' . esc_attr( $global_layout );

		// Archive image alignment.
		$archive_image_alignment = travel_eye_get_option( 'archive_image_alignment' );
		$input[] = 'archive-image-alignment-' . esc_attr( $archive_image_alignment );

		// Add common class for sidebar enabled condition.
		if ( 'no-sidebar' !== $global_layout ) {
			$input[] = 'sidebar-enabled';
		}

		// Common class for three columns.
		switch ( $global_layout ) {
			case 'three-columns':
			case 'three-columns-pcs':
			case 'three-columns-cps':
			case 'three-columns-psc':
			case 'three-columns-pcs-equal':
			case 'three-columns-scp-equal':
				$input[] = 'three-columns-enabled';
		    break;

			default:
		    break;
		}

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$input[] = 'group-blog';
		}

		return $input;

	}
endif;

add_filter( 'body_class', 'travel_eye_custom_body_class' );

if ( ! function_exists( 'travel_eye_featured_image_instruction' ) ) :

	/**
	 * Message to show in the Featured Image Meta box.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Admin post thumbnail HTML markup.
	 * @param int    $post_id Post ID.
	 * @return string HTML.
	 */
	function travel_eye_featured_image_instruction( $content, $post_id ) {

		$allowed = array( 'post', 'page' );
		if ( in_array( get_post_type( $post_id ), $allowed ) ) {
			$content .= '<strong>' . __( 'Recommended Image Sizes', 'travel-eye' ) . ':</strong><br/>';
			$content .= __( 'Banner Image', 'travel-eye' ) . ' : 1400px X 320px';
		}

		return $content;

	}

endif;
add_filter( 'admin_post_thumbnail_html', 'travel_eye_featured_image_instruction', 10, 2 );

if ( ! function_exists( 'travel_eye_custom_content_width' ) ) :

	/**
	 * Custom content width.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_custom_content_width() {

		global $post, $content_width;

		$global_layout = travel_eye_get_option( 'global_layout' );
		$global_layout = apply_filters( 'travel_eye_filter_theme_global_layout', $global_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'travel_eye_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = esc_attr( $post_options['post_layout'] );
			}
		}

		switch ( $global_layout ) {

			case 'no-sidebar':
				$content_width = 1220;
				break;

			case 'three-columns':
			case 'three-columns-pcs':
			case 'three-columns-cps':
			case 'three-columns-psc':
			case 'no-sidebar-centered':
				$content_width = 570;
				break;

			case 'three-columns-pcs-equal':
			case 'three-columns-scp-equal':
				$content_width = 363;
				break;

			case 'left-sidebar':
			case 'right-sidebar':
				$content_width = 895;
				break;

			default:
				break;
		}

	}
endif;

add_action( 'template_redirect', 'travel_eye_custom_content_width' );

if ( ! function_exists( 'travel_eye_hook_read_more_filters' ) ) :

	/**
	 * Hook read more filters.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_hook_read_more_filters() {
		if ( is_home() || is_category() || is_tag() || is_author() || is_date() ) {
			add_filter( 'excerpt_length', 'travel_eye_implement_excerpt_length', 999 );
			add_filter( 'the_content_more_link', 'travel_eye_content_more_link', 10, 2 );
			add_filter( 'excerpt_more', 'travel_eye_implement_read_more' );
		}
	}
endif;

add_action( 'wp', 'travel_eye_hook_read_more_filters' );

if ( ! function_exists( 'travel_eye_customizer_reset_callback' ) ) :

	/**
	 * Callback for reset in Customizer.
	 *
	 * @since 1.6.2
	 */
	function travel_eye_customizer_reset_callback() {

		$reset_all_settings = travel_eye_get_option( 'reset_all_settings' );

		if ( true === $reset_all_settings ) {

			// Reset custom theme options.
			set_theme_mod( 'theme_options', array() );

			// Reset custom header and backgrounds.
			remove_theme_mod( 'custom_logo' );
			remove_theme_mod( 'header_image' );
			remove_theme_mod( 'header_image_data' );
			remove_theme_mod( 'background_image' );
			remove_theme_mod( 'background_color' );
		}

	}
endif;

add_action( 'customize_save_after', 'travel_eye_customizer_reset_callback' );
