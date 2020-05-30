<?php
/**
 * Functions hooked to core hooks.
 *
 */

if ( ! function_exists( 'bizstart_customize_search_form' ) ) :

	/** Customize search form.
	 **/
	function bizstart_customize_search_form() {

		$form = '<div class="search-container"><form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		
			<span class="screen-reader-text">' . esc_html( '', 'label', 'bizstart' ) . '</span>
			<input type="search" class="search-field" placeholder="' . esc_attr_x( 'Type to search here...', 'placeholder', 'bizstart' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'bizstart' ) . '" />
			
			<input type="submit" class="search-submit" value="&#xf002;" /></form></div>';

		return $form;

	}
	
endif;

add_filter( 'get_search_form', 'bizstart_customize_search_form', 15 );


$bizstart_page_home = esc_html(__( '3 Home Pages', 'bizstart' ));
$bizstart_page_home_details = esc_html(__('Bizstart supports 3 types of Home Pages with different UI elements styles - slider and so more', 'bizstart' ));
$bizstart_page_layout = esc_html(__( '2 Header Preset', 'bizstart' ));
$bizstart_page_layout_details = esc_html(__('Theme offers 2 tytpes of header navgiation preset so you can change and select your header design on a single click', 'bizstart' ));
$bizstart_unlimited_color = esc_html(__( 'Unlimited Color Scheme', 'bizstart' ));
$bizstart_unlimited_color_details = esc_html(__( 'Theme support Unlimited Color Option that mean you can design your website with any color.', 'bizstart' ));
$bizstart_custom_contact = esc_html(__( 'Contact Form 7', 'bizstart' ));
$bizstart_custom_contact_details = esc_html(__( 'Bizstart Pro support contact form 7 that mean you can easily add your contact form with theme design ', 'bizstart' ));
$bizstart_portfolio = esc_html(__( 'Service Page', 'bizstart' ));
$bizstart_portfolio_details = esc_html(__( 'Theme have 2 types of services designs presets!', 'bizstart' ));
$bizstart_typography = esc_html(__( 'Typography', 'bizstart' ));
$bizstart_typography_details = esc_html(__('Theme loves typography, you can choose from over 500+ Google Fonts and Standard Fonts to customize your site!', 'bizstart' ));
$bizstart_slider = esc_html(__( 'Unlimited Image Slides', 'bizstart' ));
$bizstart_slider_details = esc_html(__('Theme includes Flex slider . You can add unlimited slides on your home page', 'bizstart' ));
$bizstart_pricing = esc_html(__( 'Team Page', 'bizstart' ));
$bizstart_pricing_details = esc_html(__('You can add unlimited team members with team deatil page and also display their social profiles ', 'bizstart' ));
$bizstart_retina_ready = esc_html(__( 'Retina Ready', 'bizstart' ));
$bizstart_retina_ready_details = esc_html(__( 'Theme is Retina Ready. So, Everything looks amazingly sharp and crisp on high resolution retina displays of all sizes!', 'bizstart' ));
$bizstart_icons = esc_html(__( 'Bizstart Icons', 'bizstart' ));
$bizstart_icons_details = esc_html(__( ' Choose from over 2500+ icons are fully integrated into the theme for you. ', 'bizstart' ));
$bizstart_support = esc_html(__( 'Excellent Support', 'bizstart' ));
$bizstart_support_details = esc_html(__( 'We truly care about our customers and themes performance. We assure you that you will get the best after sale support like never before!', 'bizstart' ));
$bizstart_responsive_layout = esc_html(__( 'Responsive Layout', 'bizstart' ));
$bizstart_responsive_layout_details = esc_html( __('Theme is fully responsive and can adapt to any screen size. Resize your browser window to view it!', 'bizstart' ));
$bizstart_testimonials = esc_html( __( 'Testimonials', 'bizstart' ));
$bizstart_testimonials_details = esc_html( __( 'Display your clients\' glowing comments about your business on your homepage. Showing a specific number of testimonials with use of testimonial widget. ', 'bizstart' ));
$bizstart_social_media = esc_html( __( 'Social Media', 'bizstart' ));
$bizstart_social_media_details = esc_html( __( 'Want your users to stay in touch? No problem, Theme has Social Media icons all throughout the theme!', 'bizstart' ));
$bizstart_google_map = esc_html( __( 'Add Timeline', 'bizstart' ));
$bizstart_google_map_details = esc_html( __('This Theme includes Timeline shortcode, So you can easily display your company history to your visitors or  your clients', 'bizstart' ));
$bizstart_customization = esc_html( __( 'Customization', 'bizstart' ));
$bizstart_customization_details = esc_html( __('With advanced theme options, page options & extensive docs, its never been easier to customize a theme!', 'bizstart' ));
$bizstart_demo_content = esc_html( __( 'Demo content', 'bizstart' ));
$bizstart_demo_content_details = esc_html( __('Theme includes single click demo content. You can quickly setup the site like our demo and get started easily!', 'bizstart' ));
$bizstart_improvement = esc_html( __( 'Improvement', 'bizstart' ));
$bizstart_improvement_details = esc_html( __('We love our theme and customers. We are committed to improve and add new features to Theme!', 'bizstart' ));

$bizstart_view_demo = esc_html( __( 'View Demo', 'bizstart'));
$bizstart_upgrade_to_pro = esc_html( __( 'Upgrade To Pro', 'bizstart' ));

$bizstart_why_upgrade = <<< FEATURES

<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-cog"></i></div>
	<h3>$bizstart_page_home</h3>
	<p>$bizstart_page_home_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-th-large"></i></div>
	<h3>$bizstart_page_layout</h3>
	<p>$bizstart_page_layout_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-th"></i></div>
	<h3>$bizstart_unlimited_color</h3>
	<p>$bizstart_unlimited_color_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-envelope"></i></div>
	<h3>$bizstart_custom_contact</h3>
	<p>$bizstart_custom_contact_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-list-alt"></i></div>
	<h3>$bizstart_portfolio</h3>
	<p>$bizstart_portfolio_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-font"></i></div>
	<h3>$bizstart_typography</h3>
	<p>$bizstart_typography_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-slideshare"></i></div>
	<h3>$bizstart_slider</h3>
	<p>$bizstart_slider_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-user"></i></div>
	<h3>$bizstart_pricing</h3>
	<p>$bizstart_pricing_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3>$bizstart_retina_ready</h3>
	<p>$bizstart_retina_ready_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-dashboard"></i></div>
	<h3>$bizstart_icons</h3>
	<p>$bizstart_icons_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-magic"></i></div>
	<h3>$bizstart_support</h3>
	<p>$bizstart_support_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-desktop"></i></div>
	<h3>$bizstart_responsive_layout</h3>
	<p>$bizstart_responsive_layout_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-rocket"></i></div>
	<h3>$bizstart_testimonials</h3>
	<p>$bizstart_testimonials_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-skype"></i></div>
	<h3>$bizstart_social_media</h3>
	<p>$bizstart_social_media_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-map-marker"></i></div>
	<h3>$bizstart_google_map</h3>
	<p>$bizstart_google_map_details</p>
</div>
<div class="one-third column clear">
	<div class="icon-wrap"><i class="fa  fa-5x fa-edit"></i></div>
	<h3>$bizstart_customization</h3>
	<p>$bizstart_customization_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-check"></i></div>
	<h3>$bizstart_demo_content</h3>
	<p>$bizstart_demo_content_details</p>
</div>
<div class="one-third column">
	<div class="icon-wrap"><i class="fa  fa-5x fa-signal"></i></div>
	<h3>$bizstart_improvement</h3>
	<p>$bizstart_improvement_details</p>
</div>
FEATURES;

function Bizstart_zone_theme_page() {
	$title = esc_html(__('Bizstart Theme','bizstart'));
	add_theme_page( 
		esc_html(__( 'Upgrade To Bizstart Pro','bizstart')),
		$title.'', 
		'edit_theme_options',
		'Bizstart_zone_upgrade',
		'Bizstart_zone_display_upgrade'
	);
}

add_action('admin_menu','Bizstart_zone_theme_page');


function Bizstart_zone_display_upgrade() {
  $theme_data = wp_get_theme('bizstart'); 
    
    // Check for current viewing tab
    $tab = null;
    if ( isset( $_GET['tab'] ) ) {
        $tab = $_GET['tab'];
    } else {
        $tab = null;
    } 
     
    $pro_theme_url = 'http://freehtmldesigns.com/bizstart-premium-wordpress-theme/';
    $pro_theme_demo = 'http://freehtmldesigns.com/demo/bizstart-pro/';
    $doc_url  = 'http://freehtmldesigns.com/docs/bizstart-doc/index.html';
    $support_url = 'https://wordpress.org/support/theme/bizstart';   
    $rating_url = 'https://wordpress.org/support/theme/bizstart/reviews/?filter=5';   
    
    $current_action_link =  admin_url( 'themes.php?page=Bizstart_zone_upgrade&tab=pro_features' ); ?>
    <style>
	.about-wrap .about-text {
		margin: 0em 0px 0em 0  !important;;
		margin-bottom: 25px !important;
		min-height: 60px;
		color: #555d66;
	}
	.about-wrap {		
		max-width: 1200px;	
	}
	</style>
	<div class="Bizstart-zone-wrapper about-wrap">
        <h1><?php printf(esc_html__('Welcome to %1$s - Version %2$s', 'bizstart'), $theme_data->Name ,$theme_data->Version ); ?></h1><?php
       	printf( __('<div class="about-text"> Bizstart is a free Bizstart wordpress. Theme has responsive design made with bootstrap, retina ready blog layout enable and with sidebar. Bizstart comes with full screen slider, high quality Home Page including gallery or portfolio section, testimonial section, service section, team section, recent post section & client logo section. Bizstart fully customizable built on wordpress customizer that enable you to configure your website in live preview. Theme is SEO friendly, Cross browser compatible And compatible with all major plugins.', 'bizstart') ); ?>
       <p class="upgrade-btn"><a class="upgrade" href="<?php echo esc_url($pro_theme_url); ?>" target="_blank"><?php printf( __( 'Upgrade To %1s Pro - $55', 'bizstart'), $theme_data->Name ); ?></a></p>

	   <h2 class="nav-tab-wrapper">
	        <a href="?page=Bizstart_zone_upgrade" class="nav-tab<?php echo is_null($tab) ? ' nav-tab-active' : null; ?>"><?php echo $theme_data->Name; ?></a>
<a href="?page=Bizstart_zone_upgrade&tab=pro_features" class="nav-tab<?php echo $tab == 'pro_features' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'PRO Features', 'bizstart' );  ?></a>
            <a href="?page=Bizstart_zone_upgrade&tab=free_vs_pro" class="nav-tab<?php echo $tab == 'free_vs_pro' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'Free VS PRO', 'bizstart' ); ?></a>
	        <?php do_action( 'Bizstart_zone_admin_more_tabs' ); ?>
	    </h2>      

        <?php if ( is_null( $tab ) ) { ?>
            <div class="theme_info info-tab-content">
                <div class="theme_info_column clearfix">
                    <div class="theme_info_left">
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Customizer', 'bizstart' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'bizstart'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'bizstart'); ?></a>
                            </p>
                        </div>
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Theme Documentation', 'bizstart' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'bizstart'), $theme_data->Name); ?></p>
                            <p>
                                <a href="<?php echo esc_url($doc_url); ?>" target="_blank" class="button button-secondary"><?php esc_html_e(' Documentation', 'bizstart'); ?></a>
                            </p>
                            <?php do_action( 'Bizstart_zone_dashboard_theme_links' ); ?>
                        </div>  
                        <div class="theme_link">
                            <h3><?php esc_html_e( 'Having Trouble, Need Support?', 'bizstart' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through Genex free support ticket system.', 'bizstart'), $theme_data->Name); ?></p>
                            <p>  
                                <a href="<?php echo esc_url($support_url); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Create a support ticket', 'bizstart'), $theme_data->Name); ?></a>
                            </p>
                        </div> 
						 <div class="theme_link">
                            <h3><?php esc_html_e( 'Please Rate Us', 'bizstart' ); ?></h3>
                            <p class="about"><?php printf(esc_html__('We need your help to expand or and portoflio so please rate us on wordpress ', 'bizstart'), $theme_data->Name); ?></p>
                            <p>  
                                <a href="<?php echo esc_url($rating_url); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Rate This Theme', 'bizstart'), $theme_data->Name); ?></a>
                            </p>
                        </div> 
                       
                    </div>  
                    <div class="theme_info_right">
                        <?php echo sprintf ( '<img src="'. get_template_directory_uri() .'/screenshot.jpg" alt="%1$s" />',__('Theme screenshot','bizstart') ); ?>
                    </div>
                </div> 
            </div>
        <?php } ?>
	
        <?php if ( $tab == 'pro_features' ) { ?>
            <div class="pro-features-tab info-tab-content"><?php
			    global $bizstart_why_upgrade; ?>
				<div class="wrap clearfix">
				    <?php echo $bizstart_why_upgrade; ?>
				</div>
			</div><?php   
		} ?>  

       <!-- Free VS PRO tab -->
        <?php if ( $tab == 'free_vs_pro' ) { ?>
            <div class="free-vs-pro-tab info-tab-content">
	            <div id="free_pro">
	                <table class="free-pro-table">
		                <thead>
			                <tr>
			                    <th></th>  
			                    <th><?php echo esc_html($theme_data->Name); ?> Free</th>
			                    <th><?php echo esc_html($theme_data->Name); ?> PRO</th>
			                </tr>
		                </thead>
		                <tbody>
		                    <tr>
		                        <td><h3><?php _e('Responsive Design', 'bizstart'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                        <td><h3><?php _e('Support', 'bizstart'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>		                    
		                    <tr>
		                        <td><h3><?php _e('Custom Logo Option', 'bizstart'); ?></h3></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                        <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                         <td><h3><?php _e('Social Links', 'bizstart'); ?></h3></td>
		                         <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                         <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	 <td><h3><?php _e('Unlimited color option', 'bizstart'); ?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	 <td><h3><?php _e('3 Home page', 'bizstart'); ?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Sticky Header Option', 'bizstart');?></h3></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 <tr>
		                    	 <td><h3><?php _e('Header Presets', 'bizstart'); ?></h3></td>
		                    	 <td class="only-pro"><?php _e('1', 'bizstart'); ?></td>
		                    	 <td class="only-lite"><?php _e('2', 'bizstart'); ?></td>
		                    </tr>	
		                     <tr>
		                    	 <td><h3><?php _e('Pre Defined Page Templates', 'bizstart');?></h3></td>
		                    	 <td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	 <td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('2 Services Presets', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('Team With Detail Page', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    <tr>
		                    	<td><h3><?php _e('Redux Theme Option Panel', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr> 
							<tr>
		                    	<td><h3><?php _e('Boxed Layout', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Contact Form 7', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('15+ Shortcodes', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Google Fonts', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							<tr>
		                    	<td><h3><?php _e('Bizstart Icons Inbuilt', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Multiple Service Layouts', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
							 <tr>
		                    	<td><h3><?php _e('Team Page', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Multiple Blog Layouts', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Page Animation', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                     <tr>
		                    	<td><h3><?php _e('Premium Priority Support', 'bizstart');?></h3></td>
		                    	<td class="only-pro"><span class="dashicons-before dashicons-no-alt"></span></td>
		                    	<td class="only-lite"><span class="dashicons-before dashicons-yes"></span></td>
		                    </tr>
		                    
		                    <tr class="ti-about-page-text-center">
		                        <td><a href="<?php echo esc_url($pro_theme_demo); ?>" target="_blank" class="button button-primary button-hero"><?php printf( __( '%1s Pro Demo', 'bizstart'), $theme_data->Name ); ?></a></td>
		                    	<td colspan="2"><a href="<?php echo esc_url($pro_theme_url); ?>" target="_blank" class="button button-primary button-hero"><?php printf( __( 'Upgrade To %1s Pro', 'bizstart'), $theme_data->Name ); ?></a></td>
		                    </tr>
		                </tbody>
	                </table>			    
				</div>
			</div><?php 
		} ?>

    </div><?php
} ?>