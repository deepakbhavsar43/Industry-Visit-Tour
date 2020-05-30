<?php
/**
 * bizstart functions and definitions
  @package Bizstart
 *
*/
/* Set the content width in pixels, based on the theme's design and stylesheet.
*/
function bizstart_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bizstart_content_width', 980 );
}
add_action( 'after_setup_theme', 'bizstart_content_width', 0 );
if( ! function_exists( 'bizstart_theme_setup' ) ) {

	function bizstart_theme_setup() {

		load_theme_textdomain( 'bizstart', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
       // Add title tag 
		add_theme_support( 'title-tag' );

		// Add default logo support		
        add_theme_support( 'custom-logo');

        add_theme_support('post-thumbnails');
        add_image_size('bizstart-about-thumbnail',370,225, true);
        add_image_size('bizstart-blog-front-thumbnail',370,225, true);
        add_image_size('bizstart-slider-thumbnail',1350,600, true);
        
        
         // Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) ); 

        $defaults = array(
			'default-image'          => get_template_directory_uri() .'/assets/images/detail-blog-baner.jpg',
			'width'                  => 1920,
			'height'                 => 540,
			'uploads'                => true,
			'default-text-color'     => "fff",
			'wp-head-callback'       => 'bizstart_header_style',
			);
		add_theme_support( 'custom-header', $defaults );
		// add excerpt support for pages
        add_post_type_support( 'page', 'excerpt' );

        if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
        }
       // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        // Menus
		register_nav_menus(array(
       'primary' => esc_html__('Primary Menu', 'bizstart'),
        
       ));
	    //About Theme		
		if ( is_admin() ) {
			require( get_template_directory() . '/include/welcome-screen.php');
		}	
		
    	// To use additional css
 	    add_editor_style( 'assets/css/editor-style.css' );
    }
	add_action( 'after_setup_theme', 'bizstart_theme_setup' );
}
/*add filter to change logo class*/
add_filter('get_custom_logo','bizstart_logo_class');

function bizstart_logo_class($html)
{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
}

/**
 * Styles the header text color displayed on the page header title
 *
 */

function bizstart_header_style()
{
	$header_text_color = get_header_textcolor();
	?>
		<style type="text/css">
			<?php
				//Check if user has defined any header image.
				if ( get_header_image() ) :
			?>
				.site-title, .site-description{
					color: #<?php echo esc_attr($header_text_color); ?>;
					
				}
			<?php endif; ?>	
		</style>
	<?php

}

  // Register Nav Walker class_alias
  require_once('class-wp-bootstrap-navwalker.php');
 
  require get_template_directory(). '/include/extras.php';
/**
 * Enqueue CSS stylesheets
 */		
if( ! function_exists( 'bizstart_enqueue_styles' ) ) {
	function bizstart_enqueue_styles() {	
	    /* ======= Google Font ========= */
	    wp_enqueue_style('bizstart-font', 'https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700');	
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
		wp_enqueue_style('animate', get_template_directory_uri() .'/assets/css/animate.css');
		wp_enqueue_style('bootstrapnav', get_template_directory_uri() . '/assets/css/bootsnav.css');
		wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css');
		wp_enqueue_style('carousel', get_template_directory_uri() .'/assets/css/owl.carousel.css');
		wp_enqueue_style('bizstart-theme', get_template_directory_uri() .'/assets/css/owl.theme.default.css');
		wp_enqueue_style('bizstart-space', get_template_directory_uri() .'/assets/css/space.css');
		wp_enqueue_style('bizstart-header', get_template_directory_uri() .'/assets/css/header.css');
		// main style
		wp_enqueue_style( 'bizstart-style', get_stylesheet_uri() );
		wp_enqueue_style('bizstart-responsive', get_template_directory_uri() .'/assets/css/responsive.css');
		wp_enqueue_style('bizstart-color', get_template_directory_uri() .'/assets/css/blue-color.css');
	}
	add_action( 'wp_enqueue_scripts', 'bizstart_enqueue_styles' );
}

/**
 * Enqueue JS scripts
*/

if( ! function_exists( 'bizstart_enqueue_scripts' ) ) {
	function bizstart_enqueue_scripts() {   
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js',array(),'', true);
		wp_enqueue_script('bootsnav', get_template_directory_uri() . '/assets/js/bootsnav.js',array(),'', true);
		wp_enqueue_script('carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js',array(),'', true);
		wp_enqueue_script('animation', get_template_directory_uri() . '/assets/js/wow.js','', true);
		wp_enqueue_script('bizstart-main', get_template_directory_uri() . '/assets/js/main.js',array(),'', true);
		
	}
	add_action( 'wp_enqueue_scripts', 'bizstart_enqueue_scripts' );
}

/**
 * admin  JS scripts
 */
function bizstart_admin_enqueue_scripts( $hook ) { 
	wp_enqueue_style( 
		'font-awesome', 
		get_template_directory_uri() . '/assets/css/font-awesome.css', 
		array(), 
		'4.7.0', 
		'all' 
	);
	wp_enqueue_style( 
		'bizstart-admin', 
		get_template_directory_uri() . '/assets/admin/css/admin.css', 
		array(), 
		'1.0.0', 
		'all' 
	);
 
}
add_action( 'admin_enqueue_scripts', 'bizstart_admin_enqueue_scripts' );

 

/**
 * Load Upsell Button In Customizer
 * 2016 &copy; [Justin Tadlock](http://justintadlock.com).
 */

require_once( trailingslashit( get_template_directory() ) . '/include/upgrade/class-customize.php' );

add_action( 'admin_init', 'bizstart_detect_button' );
	function bizstart_detect_button() {
	wp_enqueue_style( 'bizstart-info-button', get_template_directory_uri() . '/assets/css/import-button.css' );
}

/**
 * Register sidebars for bizstart
*/

function bizstart_sidebars() {

	// Blog Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', "bizstart"),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar on the blog layout.', "bizstart"),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
  	

	// Footer Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 1', "bizstart"),
		'id' => 'bizstart-footer-widget-area-1',
		'description' => esc_html__( 'The footer widget area 1', "bizstart"),
		'before_widget' => ' ',
		'after_widget' => '<div class="space-20"></div>',
		'before_title' => '<h4 class="text-capitalize text-left fw-600">',
		'after_title' => '</h4><div class="space-20"></div>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 2', "bizstart"),
		'id' => 'bizstart-footer-widget-area-2',
		'description' => esc_html__( 'The footer widget area 2', "bizstart"),
		'before_widget' => '',
		'after_widget' => '<div class="space-20"></div>',
		'before_title' => '<h4 class="text-capitalize text-left fw-600">',
		'after_title' => '</h4><div class="space-20"></div>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 3', "bizstart"),
		'id' => 'bizstart-footer-widget-area-3',
		'description' => esc_html__( 'The footer widget area 3', "bizstart"),
		'before_widget' => '',
		'after_widget' => '<div class="space-20"></div>',
		'before_title' => '<h4 class="text-capitalize text-left fw-600">',
		'after_title' => '</h4><div class="space-20"></div>',
	));	
}

add_action( 'widgets_init', 'bizstart_sidebars' );

/**
 * Comment layout
 */
 
  
function bizstart_comments( $comment, $args, $depth ) { ?>
	<li <?php comment_class('comment-section'); ?> id="li-comment-<?php comment_ID() ?>">
	    <?php if ($comment->comment_approved == '0') : ?>
			<div class="alert alert-info">
			    <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'bizstart' ) ?></p>
			</div>
		<?php endif; ?>
	    <div class="comment-wrap">
			<div class="comment-img">
				<a href="#"><?php echo get_avatar( $comment,'180', null,'User', array( 'class' => array( 'media-object','' ) )); ?></a>
			</div>	
			<h4 class="text-uppercase">
				<?php 
						/* translators: '%1$s %2$s: edit term */
				printf(esc_html__( '%1$s %2$s', 'bizstart' ), get_comment_author_link(), edit_comment_link(esc_html__( '(Edit)', 'bizstart' ),'  ','') ) ?>
	        </h4>
			<span class="fw-600"><time datetime="<?php echo comment_time('c'); ?>">
				<?php printf(  /* translators: 1: date, 2: time */
					_x( '%1$s at %2$s', '1: date, 2: time', 'bizstart' ),
						get_comment_date(),
						get_comment_time()
					); ?></time></span>
			<?php comment_text(); ?>
			<a class="reply"><i class="fa fa-reply"></i><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
	    </div>
	</li>
<?php
} 

/**
 * Customizer additions.
 */
require get_template_directory(). '/include/customizer.php';
?>