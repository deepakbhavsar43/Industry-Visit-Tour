<?php 
add_action( 'customize_register', 'biztt_customize_register_custom_controls', 9 );
function biztt_customize_register_custom_controls( $wp_customize ) {
    get_template_part( 'app/require/proupgrade/biztt','sectionpro');
}
function biztt_customize_controls_js() {
    $theme = wp_get_theme();
    wp_enqueue_script( 'biztt-customizer-section-pro-jquery', get_template_directory_uri() . '/app/require/proupgrade/biztt-customize-controls.js', array( 'customize-controls' ), $theme->get( 'Version' ), true );
    wp_enqueue_style( 'biztt-customizer-section-pro', get_template_directory_uri() . '/app/require/proupgrade/biztt-customize-controls.css', $theme->get( 'Version' ) );
}
add_action( 'customize_controls_enqueue_scripts', 'biztt_customize_controls_js' );
?>
<?php
function biztt_enqueue_comments_reply() {
if( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'comment_form_before', 'biztt_enqueue_comments_reply' );
?>
<?php 
if ( ! function_exists( 'biztt_sanitize_page' ) ) :
    function biztt_sanitize_page( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' === get_post_status( $page_id ) ? $page_id : $setting->default );
    }

endif;
function biztt_customize_register($wp_customize){

    // Register custom section types.
    $wp_customize->register_section_type( 'biztt_Customize_Section_Pro' );

    // Register sections.
    $wp_customize->add_section( new biztt_Customize_Section_Pro(
        $wp_customize,
        'theme_go_pro',
        array(
            'priority' => 1,
            'title'    => esc_html__( 'BizTT Pro', 'biztt' ),
            'pro_text' => esc_html__( 'Upgrade To Pro', 'biztt' ),
            'pro_url'  => 'https://themestulip.com/themes/biztt-multipurpose-wordpress-theme/',
        )
    ) );

    //  =============================
    //  = slider section              =
    //  =============================
    $wp_customize->add_section('biztt_banner', array(
        'title'    => esc_html__('BizTT Home Slider', 'biztt'),
        'description' => esc_html__('banner Size Should be ( 1600x750 ).','biztt'),
        'priority' => 36,
    ));
   
    $wp_customize->add_setting('banner1',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'biztt_sanitize_page'
    ));
    
    $wp_customize->add_control('banner1',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for banner first:','biztt'),
            'section'   => 'biztt_banner'
    )); 

    $wp_customize->add_setting('banner2',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'biztt_sanitize_page'
    ));
    
    $wp_customize->add_control('banner2',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for banner second:','biztt'),
            'section'   => 'biztt_banner'
    )); 

    $wp_customize->add_setting('banner3',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'biztt_sanitize_page'
    ));
    
    $wp_customize->add_control('banner3',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for banner third:','biztt'),
            'section'   => 'biztt_banner'
    )); 
// Slider Read More Button Text
    $wp_customize->add_setting('slider_readmore',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('slider_readmore',array( 
            'type'  => 'text',
            'label' => esc_html__('Add slider Read more button name here','biztt'),
            'section'   => 'biztt_banner',
            'setting'   => 'slider_readmore'
    )); // Slider Read More Button Text

//  =============================
    //  = box section              =
    //  =============================
    $wp_customize->add_section('biztt_box', array(
        'title'    => esc_html__('BizTT HomePage Business Box', 'biztt'),
        'description' => esc_html__('Upload image, it will auto crop with 400*250.','biztt'),
        'priority' => 36,
    ));
   
   // Slider Read More Button Text
    $wp_customize->add_setting('boxheading',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('boxheading',array( 
            'type'  => 'text',
            'label' => esc_html__('Add box heading','biztt'),
            'section'   => 'biztt_box',
            'setting'   => 'boxheading'
    )); // Slider Read More Button Text

    $wp_customize->add_setting('box1',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'biztt_sanitize_page'
    ));
    
    $wp_customize->add_control('box1',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box first:','biztt'),
            'section'   => 'biztt_box'
    )); 

    $wp_customize->add_setting('box2',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'biztt_sanitize_page'
    ));
    
    $wp_customize->add_control('box2',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box second:','biztt'),
            'section'   => 'biztt_box'
    )); 

    $wp_customize->add_setting('box3',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'biztt_sanitize_page'
    ));
    
    $wp_customize->add_control('box3',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box third:','biztt'),
            'section'   => 'biztt_box'
    )); 

     $wp_customize->add_setting('box4',array(
            'default'   => '0',         
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'biztt_sanitize_page'
    ));
    
    $wp_customize->add_control('box4',array(
            'type'  => 'dropdown-pages',
            'label' => esc_html__('Select page for box fourth:','biztt'),
            'section'   => 'biztt_box'
    )); 

    // Slider Read More Button Text
    $wp_customize->add_setting('boxreadmore',array(
            'default'   => null,
            'sanitize_callback' => 'sanitize_text_field'    
    ));
    
    $wp_customize->add_control('boxreadmore',array( 
            'type'  => 'text',
            'label' => esc_html__('Add Read More Text','biztt'),
            'section'   => 'biztt_box',
            'setting'   => 'boxreadmore'
    )); // Slider Read More Button Text


  //  =============================
    //  = Footer              =
    //  =============================

    $wp_customize->add_section('biztt_footer', array(
        'title'    => esc_html__('BizTT Footer', 'biztt'),
        'description' => '',
        'priority' => 37,
    ));

	// Footer design and developed
	 $wp_customize->add_setting('biztt_design', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'
    ));
 
    $wp_customize->add_control('biztt_design', array(
        'label'      => esc_html__('Design and developed', 'biztt'),
        'section'    => 'biztt_footer',
        'setting'   => 'biztt_design',
		'type'	   =>'textarea'
    ));
	// Footer copyright
	 $wp_customize->add_setting('biztt_copyright', array(
        'default'        => '',
		'sanitize_callback' => 'sanitize_textarea_field'       
    ));
 
    $wp_customize->add_control('biztt_copyright', array(
        'label'      => esc_html__('Copyright', 'biztt'),
        'section'    => 'biztt_footer',
        'setting'   => 'biztt_copyright',
		'type'	   =>'textarea'
    ));	
}
add_action('customize_register', 'biztt_customize_register');
?>