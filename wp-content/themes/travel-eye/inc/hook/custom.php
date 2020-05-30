<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Travel_Eye
 */

if ( ! function_exists( 'travel_eye_skip_to_content' ) ) :

	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_skip_to_content() {
	?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'travel-eye' ); ?></a><?php
	}

endif;

add_action( 'travel_eye_action_before', 'travel_eye_skip_to_content', 15 );

if ( ! function_exists( 'travel_eye_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_site_branding() {

	?>
    <div class="site-branding">

		<?php travel_eye_the_custom_logo(); ?>

		<?php $show_title = travel_eye_get_option( 'show_title' ); ?>
		<?php $show_tagline = travel_eye_get_option( 'show_tagline' ); ?>
		<?php if ( true === $show_title || true === $show_tagline ) :  ?>
        <div id="site-identity">
			<?php if ( true === $show_title ) :  ?>
	            <?php if ( is_front_page() && is_home() ) : ?>
	              <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	            <?php else : ?>
	              <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	            <?php endif; ?>
			<?php endif; ?>

			<?php if ( true === $show_tagline ) :  ?>
	            <p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php endif ?>
        </div><!-- #site-identity -->
		<?php endif ?>

    </div><!-- .site-branding -->

    <?php

	}

endif;

add_action( 'travel_eye_action_header', 'travel_eye_site_branding' );


if ( ! function_exists( 'travel_eye_add_primary_navigation' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_add_primary_navigation() {
	?>
    <div id="main-nav" class="clear-fix">
        <nav id="site-navigation" class="main-navigation" role="navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'travel-eye' ); ?></button>
            <div class="wrap-menu-content">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => 'travel_eye_primary_navigation_fallback',
				) );
				?>
            </div><!-- .menu-content -->
        </nav><!-- #site-navigation -->
    </div> <!-- #main-nav -->
    <?php
	}

endif;
add_action( 'travel_eye_action_header', 'travel_eye_add_primary_navigation', 20 );

if ( ! function_exists( 'travel_eye_footer_copyright' ) ) :

	/**
	 * Footer copyright
	 *
	 * @since 1.0.0
	 */
	function travel_eye_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'travel_eye_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}

		// Footer Menu.
		$footer_menu_content = wp_nav_menu( array(
			'theme_location' => 'footer',
			'container'      => 'div',
			'container_id'   => 'footer-navigation',
			'depth'          => 1,
			'fallback_cb'    => false,
			'echo'           => false,
		) );

		// Copyright content.
		$copyright_text = travel_eye_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'travel_eye_filter_copyright_text', $copyright_text );
		if ( ! empty( $copyright_text ) ) {
			$copyright_text = wp_kses_data( $copyright_text );
		}
	?>

    <?php if ( ! empty( $footer_menu_content ) ) : ?>
		<?php echo $footer_menu_content; ?>
    <?php endif ?>
    <?php if ( has_nav_menu( 'social' ) && true === travel_eye_get_option( 'show_social_in_footer' ) ) : ?>
    	<nav id="social-navigation-footer" class="so-widget-travel-eye-social" role="navigation" aria-label="<?php esc_attr_e( 'Social Menu', 'travel-eye' ); ?>">
    	    <?php
    	        wp_nav_menu( array(
					'theme_location' => 'social',
					'menu_class'     => 'social-links size-medium',
					'container'      => '',
					'depth'          => 1,
					'fallback_cb'    => false,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
    	        ) );
    	    ?>
    	</nav><!-- #social-navigation-footer -->
    <?php endif ?>
    <?php if ( ! empty( $copyright_text ) ) :  ?>
      <div class="copyright">
        <?php echo $copyright_text; ?>
      </div><!-- .copyright -->
    <?php endif; ?>
    <div class="site-info">
	    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'travel-eye' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'travel-eye' ), 'WordPress' ); ?></a>
    	<span class="sep"> | </span>
    	<?php printf( esc_html__( '%1$s by %2$s', 'travel-eye' ), 'Travel Eye', '<a href="' . esc_url( 'https://wenthemes.com/' ) . '" rel="designer" target="_blank">WEN Themes</a>' ); ?>
    </div><!-- .site-info -->
    <?php
	}

endif;

add_action( 'travel_eye_action_footer', 'travel_eye_footer_copyright', 10 );


if ( ! function_exists( 'travel_eye_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_add_sidebar() {

		global $post;

		$global_layout = travel_eye_get_option( 'global_layout' );
		$global_layout = apply_filters( 'travel_eye_filter_theme_global_layout', $global_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'travel_eye_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}
		// Include Secondary sidebar.
		switch ( $global_layout ) {
		  case 'three-columns':
		  case 'three-columns-pcs':
		  case 'three-columns-cps':
		  case 'three-columns-psc':
		  case 'three-columns-pcs-equal':
		  case 'three-columns-scp-equal':
		    get_sidebar( 'secondary' );
		    break;

		  default:
		    break;
		}

	}

endif;

add_action( 'travel_eye_action_sidebar', 'travel_eye_add_sidebar' );


if ( ! function_exists( 'travel_eye_custom_posts_navigation' ) ) :
	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_custom_posts_navigation() {

		$pagination_type = travel_eye_get_option( 'pagination_type' );

		switch ( $pagination_type ) {

			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'travel_eye_action_posts_navigation', 'travel_eye_custom_posts_navigation' );


if ( ! function_exists( 'travel_eye_add_image_in_single_display' ) ) :

	/**
	 * Add image in single post.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_add_image_in_single_display() {

		global $post;

		// Bail if current post is built with Page Builder.
        if ( true === travel_eye_content_is_pagebuilder() ) {
			return;
        }
		// Bail if checkbox Use Featured Image as Banner is enabled.
		$values = get_post_meta( $post->ID, 'travel_eye_theme_settings', true );
        if ( isset( $values['use_featured_image_as_banner'] ) && 1 === absint( $values['use_featured_image_as_banner'] ) ) {
			return;
        }
		if ( has_post_thumbnail() ) {

			$values = get_post_meta( $post->ID, 'travel_eye_theme_settings', true );
			$single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';

			if ( ! $single_image ) {
				$single_image = travel_eye_get_option( 'single_image' );
			}

			if ( 'disable' !== $single_image ) {
				$single_image_alignment = 'center';
				$args = array(
					'class' => 'align' . esc_attr( $single_image_alignment ),
				);
				the_post_thumbnail( esc_attr( $single_image ), $args );
			}
		}

	}

endif;

add_action( 'travel_eye_single_image', 'travel_eye_add_image_in_single_display' );

if ( ! function_exists( 'travel_eye_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_add_breadcrumb() {

		// Bail if Breadcrumb disabled.
		$breadcrumb_type = travel_eye_get_option( 'breadcrumb_type' );
		if ( 'disabled' === $breadcrumb_type ) {
			return;
		}

		// Bail if Home Page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		// Check if breadcrumb is disabled in single.
		global $post;
		if ( is_singular() ) {
			$values = get_post_meta( $post->ID, 'travel_eye_theme_settings', true );
			$disable_breadcrumb = isset( $values['disable_breadcrumb'] ) ? absint( $values['disable_breadcrumb'] ) : 0;
			if ( 1 === $disable_breadcrumb ) {
				return;
			}
		}

		// Render breadcrumb.
		echo '<div id="breadcrumb"><div class="container">';
		switch ( $breadcrumb_type ) {
			case 'simple':
				travel_eye_simple_breadcrumb();
			break;

			case 'advanced':
				if ( function_exists( 'bcn_display' ) ) {
					bcn_display();
				}
				else {
					travel_eye_simple_breadcrumb();
				}
			break;

			default:
			break;
		}
		echo '</div><!-- .container --></div><!-- #breadcrumb -->';
		return;

	}

endif;

add_action( 'travel_eye_action_before_content', 'travel_eye_add_breadcrumb' , 7 );


if ( ! function_exists( 'travel_eye_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_footer_goto_top() {

		$go_to_top = travel_eye_get_option( 'go_to_top' );
		if ( true === $go_to_top ) {
			echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-double-up"></i></a>';
		}

	}

endif;

add_action( 'travel_eye_action_after', 'travel_eye_footer_goto_top', 20 );


if( ! function_exists( 'travel_eye_check_custom_header_status' ) ) :

	/**
	 * Check status of custom header.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_check_custom_header_status( $input ) {

		global $post;

		if ( is_front_page() && 'posts' === get_option( 'show_on_front' ) ) {
			$input = false;
		}
		else if ( is_home() && ( $blog_page_id = travel_eye_get_index_page_id( 'blog' ) ) > 0 ) {
			$values = get_post_meta( $blog_page_id, 'travel_eye_theme_settings', true );
			$disable_banner_area = isset( $values['disable_banner_area'] ) ? absint( $values['disable_banner_area'] ) : 0;
			if ( 1 === $disable_banner_area ) {
				$input = false;
			}
		}
		else if ( $post ) {
			if ( is_singular() ) {
				$values = get_post_meta( $post->ID, 'travel_eye_theme_settings', true );
				$disable_banner_area = isset( $values['disable_banner_area'] ) ? absint( $values['disable_banner_area'] ) : 0;
				if ( 1 === $disable_banner_area ) {
					$input = false;
				}
			}
		}

		return $input;

	}

endif;

add_filter( 'travel_eye_filter_custom_header_status', 'travel_eye_check_custom_header_status' );


if ( ! function_exists( 'travel_eye_add_custom_header' ) ) :

	/**
	 * Add Custom Header.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_add_custom_header() {

		$flag_apply_custom_header = apply_filters( 'travel_eye_filter_custom_header_status', true );
		if ( true !== $flag_apply_custom_header ) {
			return;
		}
		$attribute = '';
		$attribute = apply_filters( 'travel_eye_filter_custom_header_style_attribute', $attribute );
		?>
		<div id="custom-header" <?php echo ( ! empty( $attribute ) ) ? ' style="' . esc_attr( $attribute ) . '" ' : ''; ?>>
			<div class="container">
				<?php
					/**
					 * Hook - travel_eye_action_custom_header.
					 */
					do_action( 'travel_eye_action_custom_header' );
				?>
			</div><!-- .container -->
		</div><!-- #custom-header -->
		<?php

	}
endif;

add_action( 'travel_eye_action_before_content', 'travel_eye_add_custom_header', 5 );

if ( ! function_exists( 'travel_eye_add_title_in_custom_header' ) ) :

	/**
	 * Add title in Custom Header.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_add_title_in_custom_header() {
		$tag = 'h1';
		if ( is_front_page() ) {
			$tag = 'h2';
		}
		$custom_page_title = apply_filters( 'travel_eye_filter_custom_page_title', '' );
		?>
		<div class="header-content">
			<?php if ( ! empty( $custom_page_title ) ) : ?>
				<div class="title-wrap">
				<?php echo '<' . $tag . ' class="page-title">'; ?>
				<?php echo esc_html( $custom_page_title ); ?>
				<?php echo '</' . $tag . '>'; ?>
				</div>
			<?php endif ?>
	        <?php if ( is_singular( 'post' ) ) : ?>
		        <div class="header-meta">
	        	<?php travel_eye_posted_on_custom(); ?>
		        </div><!-- .entry-meta -->
	        <?php endif ?>
        </div><!-- .header-content -->
		<?php
	}

endif;

add_action( 'travel_eye_action_custom_header', 'travel_eye_add_title_in_custom_header' );

if ( ! function_exists( 'travel_eye_customize_page_title' ) ) :

	/**
	 * Add title in Custom Header.
	 *
	 * @since 1.0.0
	 *
	 * @param string $title Title.
	 * @return string Modified title.
	 */
	function travel_eye_customize_page_title( $title ) {

		if ( is_home() && ( $blog_page_id = travel_eye_get_index_page_id( 'blog' ) ) > 0 ) {
			$title = get_the_title( $blog_page_id );
		}
		elseif ( is_singular() ) {
			$title = get_the_title();
		}
		elseif ( is_archive() ) {
			$title = strip_tags( get_the_archive_title() );
		}
		elseif ( is_search() ) {
			$title = sprintf( __( 'Search Results for: %s', 'travel-eye' ),  get_search_query() );
		}
		elseif ( is_404() ) {
			$title = __( '404!', 'travel-eye' );
		}
		return $title;
	}
endif;

add_filter( 'travel_eye_filter_custom_page_title', 'travel_eye_customize_page_title' );


if ( ! function_exists( 'travel_eye_add_image_in_custom_header' ) ) :

	/**
	 * Add image in Custom Header.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_add_image_in_custom_header( $input ) {

		$image_details = array();

		// For is_home().
		if ( is_home() && ( $blog_page_id = travel_eye_get_index_page_id( 'blog' ) ) > 0 ) {
			$values = get_post_meta( $blog_page_id, 'travel_eye_theme_settings', true );
			$use_featured_image_as_banner = isset( $values['use_featured_image_as_banner'] ) ? absint( $values['use_featured_image_as_banner'] ) : 0;
			if ( 1 === $use_featured_image_as_banner ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $blog_page_id ), 'travel-eye-featured-banner' );
				if ( ! empty( $image ) ) {
					$image_details['url']    = $image[0];
					$image_details['width']  = $image[1];
					$image_details['height'] = $image[2];
				}
			}
		}
		// Fetch image info if singular.
		else if ( is_singular() ) {
			global $post;
			$values = get_post_meta( $post->ID, 'travel_eye_theme_settings', true );
			$use_featured_image_as_banner = isset( $values['use_featured_image_as_banner'] ) ? absint( $values['use_featured_image_as_banner'] ) : 0;
			if ( 1 === $use_featured_image_as_banner ) {
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'travel-eye-featured-banner' );
				if ( ! empty( $image ) ) {
					$image_details['url']    = $image[0];
					$image_details['width']  = $image[1];
					$image_details['height'] = $image[2];
				}
			}

		}
		if ( empty( $image_details ) ) {
			// Fetch from Custom Header Image.
			$image = get_header_image();
			if ( ! empty( $image ) ) {
				$image_details['url']    = $image;
				$image_details['width']  =  get_custom_header()->width;
				$image_details['height'] =  get_custom_header()->height;
			}
		}

		if ( ! empty( $image_details ) ) {
			$input .= 'background-image:url(' . esc_url( $image_details['url'] ) . ');';
			$input .= 'background-size:cover;';
		}

		return $input;

	}

endif;

add_filter( 'travel_eye_filter_custom_header_style_attribute', 'travel_eye_add_image_in_custom_header' );


if ( ! function_exists( 'travel_eye_add_author_bio_in_single' ) ) :

	/**
	 * Display Author bio.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_add_author_bio_in_single() {

		if ( is_singular( 'post' ) ) {
			$author_bio_in_single = travel_eye_get_option( 'author_bio_in_single' );
			if ( true !== $author_bio_in_single ) {
				return;
			}
			get_template_part( 'template-parts/author-bio', 'single' );
		}

	}
endif;

add_action( 'travel_eye_author_bio', 'travel_eye_add_author_bio_in_single' );

if ( ! function_exists( 'travel_eye_add_background_image_in_footer' ) ) :

	/**
	 * Add background image in footer.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args Footer args.
	 * @return array Modified array.
	 */
	function travel_eye_add_background_image_in_footer( $args ) {

		$footer_background_image_url = travel_eye_get_option( 'footer_background_image' );
		if ( ! empty( $footer_background_image_url ) ){
			$args['container_style'] = 'background-image: url(' . esc_url( $footer_background_image_url ) . ');background-size:cover;';
		}
		return $args;
	}

endif;

add_filter( 'travel_eye_filter_footer_widgets_args', 'travel_eye_add_background_image_in_footer');


if ( ! function_exists( 'travel_eye_add_top_header' ) ) :

	/**
	 * Add top header.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_add_top_header() {

		$contact_number        = travel_eye_get_option( 'contact_number' );
		$contact_email         = travel_eye_get_option( 'contact_email' );
		$show_social_in_header = travel_eye_get_option( 'show_social_in_header' );
		?>
		<div id="top-header">
			<div class="container">
				<?php if ( ! empty( $contact_number ) || ! empty( $contact_email ) ) : ?>
					<div id="quick-contact">
						<ul>
							<li class="quick-message"><?php _e( 'Have any questions?', 'travel-eye' ); ?></li>
							<?php if ( ! empty( $contact_email ) ) : ?>
								<li class="quick-email"><a href="mailto:<?php echo esc_attr( $contact_email ); ?>"><?php echo esc_attr( $contact_email ); ?></a></li>
							<?php endif ?>
							<?php if ( ! empty( $contact_number ) ) : ?>
								<li class="quick-call"><a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $contact_number ) ); ?>"><?php echo esc_attr( $contact_number ); ?></a></li>
							<?php endif; ?>
						</ul>
					</div><!-- #quick-contact -->
				<?php endif; ?>
				<div id="header-search">
					<?php if ( true === $show_social_in_header && has_nav_menu( 'social' ) ) : ?>
				    	<nav id="social-navigation-header" class="so-widget-travel-eye-social" role="navigation" aria-label="<?php esc_attr_e( 'Header Social Menu', 'travel-eye' ); ?>">
				    	    <?php
				    	        wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links size-medium',
									'container'      => '',
									'depth'          => 1,
									'fallback_cb'    => false,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
				    	        ) );
				    	    ?>
				    	</nav><!-- #social-navigation-header -->
					<?php endif; ?>

				<div class="right-bar">
					<?php get_search_form(); ?>
				</div>
				</div><!-- #header-search -->
			</div>
		</div><!-- #top-header -->
		<?php

	}
endif;

add_action( 'travel_eye_action_before_header', 'travel_eye_add_top_header', 5 );

if ( ! function_exists( 'travel_eye_mobile_navigation' ) ) :

	/**
	 * Primary navigation.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_mobile_navigation() {
	?>
	    <a id="mobile-trigger" href="#mob-menu"><i class="fa fa-bars"></i></a>
	    <div id="mob-menu">
			<?php
	        wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => '',
				'fallback_cb'    => 'travel_eye_primary_navigation_fallback',
	        ) );
			?>
	    </div><!-- #mob-menu -->
    <?php

	}

endif;
add_action( 'travel_eye_action_before', 'travel_eye_mobile_navigation', 20 );

/**
 * Contact Form 7 date picker fix.
 */
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

if ( ! function_exists( 'travel_eye_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function travel_eye_primary_navigation_fallback() {
		echo '<ul>';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Home', 'travel-eye' ). '</a></li>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 7,
		) );
		echo '</ul>';

	}

endif;
