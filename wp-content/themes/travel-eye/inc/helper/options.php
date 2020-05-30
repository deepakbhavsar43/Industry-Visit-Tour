<?php
/**
 * Helper functions related to customizer and options.
 *
 * @package Travel_Eye
 */

if ( ! function_exists( 'travel_eye_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function travel_eye_get_global_layout_options() {

		$choices = array(
			'left-sidebar'            => esc_html__( 'Primary Sidebar - Content', 'travel-eye' ),
			'right-sidebar'           => esc_html__( 'Content - Primary Sidebar', 'travel-eye' ),
			'three-columns'           => esc_html__( 'Three Columns', 'travel-eye' ),
			'no-sidebar'              => esc_html__( 'No Sidebar', 'travel-eye' ),
		);
		$output = apply_filters( 'travel_eye_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'travel_eye_get_pagination_type_options' ) ) :

	/**
	 * Returns pagination type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function travel_eye_get_pagination_type_options() {

		$choices = array(
			'default' => esc_html__( 'Default (Older / Newer Post)', 'travel-eye' ),
			'numeric' => esc_html__( 'Numeric', 'travel-eye' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'travel_eye_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function travel_eye_get_breadcrumb_type_options() {

		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'travel-eye' ),
			'simple'   => esc_html__( 'Simple', 'travel-eye' ),
			'advanced' => esc_html__( 'Advanced', 'travel-eye' ),
		);
		return $choices;

	}

endif;


if ( ! function_exists( 'travel_eye_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function travel_eye_get_archive_layout_options() {

		$choices = array(
			'full'    => esc_html__( 'Full Post', 'travel-eye' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'travel-eye' ),
		);
		$output = apply_filters( 'travel_eye_filter_archive_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'travel_eye_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable True for adding No Image option.
	 * @param array $allowed Allowed image size options.
	 * @return array Image size options.
	 */
	function travel_eye_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;
		$get_intermediate_image_sizes = get_intermediate_image_sizes();
		$choices = array();
		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'travel-eye' );
		}
		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'travel-eye' );
		$choices['medium']    = esc_html__( 'Medium', 'travel-eye' );
		$choices['large']     = esc_html__( 'Large', 'travel-eye' );
		$choices['full']      = esc_html__( 'Full (original)', 'travel-eye' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ){
					$choices[ $key ] .= ' ('. $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;


if ( ! function_exists( 'travel_eye_get_image_alignment_options' ) ) :

	/**
	 * Returns image options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function travel_eye_get_image_alignment_options() {

		$choices = array(
			'none'   => _x( 'None', 'Alignment', 'travel-eye' ),
			'left'   => _x( 'Left', 'Alignment', 'travel-eye' ),
			'center' => _x( 'Center', 'Alignment', 'travel-eye' ),
			'right'  => _x( 'Right', 'Alignment', 'travel-eye' ),
		);
		return $choices;

	}

endif;
