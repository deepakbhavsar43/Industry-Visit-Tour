<?php
/**
 * Reset theme options.
 *
 * @package Travel_Eye
 */

// Reset Section.
$wp_customize->add_section( 'section_reset_all_settings',
	array(
		'title'       => esc_html__( 'Reset All Theme Settings', 'travel-eye' ),
		'description' => esc_html__( 'Caution: All theme settings along with custom header and custom background will be reset to default. Refresh the page after save to view full effects.', 'travel-eye' ),
		'priority'    => 200,
		'capability'  => 'edit_theme_options',
		'panel'       => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'theme_options[reset_all_settings]', array(
	'default'           => false,
	'capability'        => 'edit_theme_options',
	'transport'         => 'postMessage',
	'sanitize_callback' => 'travel_eye_sanitize_checkbox',
));
$wp_customize->add_control( 'reset_all_settings', array(
    'label'    => __( 'Check to reset all settings', 'travel-eye' ),
    'type'     => 'checkbox',
    'section'  => 'section_reset_all_settings',
    'settings' => 'theme_options[reset_all_settings]',
));
