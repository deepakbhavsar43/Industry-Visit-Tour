<?php
/**
 * Theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Travel_Eye
 */

if ( ! function_exists( 'travel_eye_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function travel_eye_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'travel-eye' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'travel-eye-featured-banner', 1400, 320, true );

		// This theme uses wp_nav_menu() in four location.
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary Menu', 'travel-eye' ),
			'footer'   => esc_html__( 'Footer Menu', 'travel-eye' ),
			'social'   => esc_html__( 'Social Menu', 'travel-eye' ),
			'notfound' => esc_html__( '404 Menu', 'travel-eye' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'travel_eye_custom_background_args', array(
			'default-color' => '#ffffff',
			'default-image' => '',
		) ) );

		// Set up the WordPress core custom header feature.
		add_theme_support( 'custom-header', apply_filters( 'travel_eye_custom_header_args', array(
				'default-image' => get_template_directory_uri() . '/images/header-banner.jpg',
				'width'         => 1400,
				'height'        => 320,
				'flex-height'   => true,
				'header-text'   => false,
		) ) );

		// Register default headers.
		register_default_headers( array(
			'dinner-table' => array(
				'url'           => '%s/images/header-banner.jpg',
				'thumbnail_url' => '%s/images/header-banner.jpg',
				'description'   => _x( 'Beautiful Nature', 'header image description', 'travel-eye' ),
			),

		) );

		/*
		 * Enable support for custom logo.
		 */
		add_theme_support( 'custom-logo' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		/*
		 * Enable support for selective refresh of widgets in Customizer.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		// Editor style.
		add_editor_style( 'css/editor-style' . $min . '.css' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Load Supports.
		require get_template_directory() . '/inc/support.php';

		global $travel_eye_default_options;
		$travel_eye_default_options = travel_eye_get_default_theme_options();

	}
endif;

add_action( 'after_setup_theme', 'travel_eye_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travel_eye_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travel_eye_content_width', 640 );
}
add_action( 'after_setup_theme', 'travel_eye_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travel_eye_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'travel-eye' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Primary Sidebar.', 'travel-eye' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'travel-eye' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Secondary Sidebar.', 'travel-eye' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'travel_eye_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function travel_eye_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/third-party/font-awesome/css/font-awesome' . $min . '.css', '', '4.7.0' );

	$fonts_url = travel_eye_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'travel-eye-google-fonts', $fonts_url, array(), null );
	}

	wp_enqueue_style( 'travel-eye-style', get_stylesheet_uri(), array(), '1.7.2' );

	wp_enqueue_style( 'sidr', get_template_directory_uri() .'/third-party/sidr/css/jquery.sidr.dark' . $min . '.css', '', '2.2.1' );

	wp_enqueue_script( 'travel-eye-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . $min . '.js', array(), '20130115', true );

	wp_enqueue_script( 'sidr', get_template_directory_uri() . '/third-party/sidr/js/jquery.sidr' . $min . '.js', array( 'jquery' ), '2.2.1', true );

	wp_enqueue_script( 'travel-eye-custom', get_template_directory_uri() . '/js/custom' . $min . '.js', array( 'jquery' ), '1.4.0', true );

	$custom_args = array(
		'go_to_top_status' => ( true === travel_eye_get_option( 'go_to_top' ) ) ? 1 : 0,
	);
	wp_localize_script( 'travel-eye-custom', 'Travel_Eye_Custom_Options', $custom_args );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'travel_eye_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function travel_eye_admin_scripts( $hook ) {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
		wp_enqueue_style( 'travel-eye-metabox', get_template_directory_uri() . '/css/metabox' . $min . '.css', '', '1.0.0' );
		wp_enqueue_script( 'jquery-easytabs', get_template_directory_uri() . '/third-party/easytabs/js/jquery.easytabs' . $min . '.js', array( 'jquery' ), '3.2.0', true );
		wp_enqueue_script( 'travel-eye-custom-admin', get_template_directory_uri() . '/js/admin' . $min . '.js', array( 'jquery', 'jquery-easytabs' ), '1.0.0', true );
	}

}
add_action( 'admin_enqueue_scripts', 'travel_eye_admin_scripts' );

/**
 * Load init.
 */
require get_template_directory() . '/inc/init.php';
