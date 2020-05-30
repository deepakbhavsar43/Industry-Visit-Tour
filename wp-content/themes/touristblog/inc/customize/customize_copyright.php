<?php
// Footer copyright section 
function touristblog_footer_copyright( $wp_customize ) {
	$wp_customize->add_panel('touristblog_copyright', array(
		'priority' => 500,
		'capability' => 'edit_theme_options',
		'title' => __('Footer Social Icon Settings', 'touristblog'),
	) );
	
	//Footer social link 
	$wp_customize->add_section('copyright_social_icon', array(
        'title' => __('Social Link','touristblog'),
        'priority' => 45,
		'panel' => 'touristblog_copyright',
    ) );

	// Facebook link
	$wp_customize->add_setting('social_link_facebook', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control('social_link_facebook', array(
        'label' => __('Facebook URL','touristblog'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_facebook_tab',array(
        'sanitize_callback' => 'touristblog_copyright_sanitize_checkbox',
	));
	$wp_customize->add_control('Social_link_facebook_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','touristblog'),
        'section' => 'copyright_social_icon',
    ) );

	//Twitter link
	$wp_customize->add_setting( 'social_link_twitter', array(
       'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control( 'social_link_twitter', array(
        'label' => __('Twitter URL','touristblog'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 'Social_link_twitter_tab',array(
	   'sanitize_callback' => 'touristblog_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_twitter_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','touristblog'),
        'section' => 'copyright_social_icon',
    ) );

	//Linkdin link
	$wp_customize->add_setting( 'social_link_linkedin', array(
       'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control( 'social_link_linkedin', array(
        'label' => __('Linkedin URL','touristblog'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 
        'Social_link_linkedin_tab',array(
        'sanitize_callback' => 'touristblog_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_linkedin_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','touristblog'),
        'section' => 'copyright_social_icon',
    ) );

	//Google-plus link
	$wp_customize->add_setting('social_link_google', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control('social_link_google', array(
        'label' => __('Google-plus URL','touristblog'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_google_tab',array(
        'sanitize_callback' => 'touristblog_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control('Social_link_google_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','touristblog'),
        'section' => 'copyright_social_icon',
    ) );

		
	function touristblog_footer_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}
	
	function touristblog_copyright_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
}
add_action( 'customize_register', 'touristblog_footer_copyright' );
?>

<?php function touristblog_customize_css() { ?>

    <style type="text/css">
        .navbar-brand .site-title{ 
            color: #<?php echo esc_attr(get_theme_mod( 'header_textcolor' )); ?> ;
        }
    </style>

<?php } ?>

<?php add_action('wp_head', 'touristblog_customize_css'); ?>