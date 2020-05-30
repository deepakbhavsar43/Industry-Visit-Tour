<?php
/**
 * Theme Customizer.
 *
 * @package Travel_Eye
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function travel_eye_customize_register( $wp_customize ) {

	// Load custom controls.
	require get_template_directory() . '/inc/customizer/control.php';

	// Load customize helpers.
	require get_template_directory() . '/inc/helper/options.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/sanitize.php';

	// Load customize callback.
	require get_template_directory() . '/inc/customizer/callback.php';

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Load customize option.
	require get_template_directory() . '/inc/customizer/option.php';

	// Load reset option.
	require get_template_directory() . '/inc/customizer/reset.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'Travel_Eye_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Travel_Eye_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Travel Eye Pro', 'travel-eye' ),
				'pro_text' => esc_html__( 'Buy Pro', 'travel-eye' ),
				'pro_url'  => 'https://themepalace.com/downloads/travel-eye-pro',
				'priority'  => 1,
			)
		)
	);

}
add_action( 'customize_register', 'travel_eye_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function travel_eye_customize_preview_js() {

	wp_enqueue_script( 'travel_eye_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );

}
add_action( 'customize_preview_init', 'travel_eye_customize_preview_js' );

/**
 * Load styles for Customizer.
 *
 * @since 1.0.0
 */
function travel_eye_load_customizer_styles() {

	global $pagenow;

	if ( 'customize.php' === $pagenow ) {
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_style( 'travel-eye-customizer-style', get_template_directory_uri() . '/css/customizer' . $min . '.css', false, '1.4.0' );
	}

}

add_action( 'admin_enqueue_scripts', 'travel_eye_load_customizer_styles' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.4.0
 */
function travel_eye_customizer_control_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script( 'travel-eye-customize-controls', get_template_directory_uri() . '/js/customize-controls' . $min . '.js', array( 'customize-controls' ) );

	wp_enqueue_style( 'travel-eye-customize-controls', get_template_directory_uri() . '/css/customize-controls' . $min . '.css' );

}

add_action( 'customize_controls_enqueue_scripts', 'travel_eye_customizer_control_scripts', 0 );
