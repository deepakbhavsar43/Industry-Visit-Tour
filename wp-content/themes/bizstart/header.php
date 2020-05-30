<?php 
/**
 * The header for our theme.
 *
 * Displays all of the <head> section 
 *
 * @package Bizstart
 */
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
	<?php wp_head(); ?>
</head> 
<body <?php body_class(); ?>>
    <!-- ====== scroll to top ====== -->
    <a id="myBtn" title="<?php echo esc_attr__('Go to top','bizstart'); ?> " href="javascript:void(0)">
        <i class="fa fa-chevron-up"></i>
    </a>
    <!-- Header starts-->
    <header>
        <div class="navigation">
            <nav class="navbar animated navbar-default bootsnav menubar bg-transparent">
                <div class="container">
                    <!-- Start Header Navigation -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                            <i class="fa fa-bars"></i>
                        </button>
                        <?php    
                        if (has_custom_logo()) :
                        ?> 
                            <h1><?php the_custom_logo();?></h1>
                        <?php  
						endif;
						if (display_header_text()==true){?>
						<h1>
						 	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
								<span class="site-title" ><?php bloginfo( 'title' ); ?></span><br>
								<span class="site-description"><?php bloginfo( 'description' ); ?></span>
							</a>
						</h1>
                        <?php }
                         
                        ?>
                    </div>
                    <!-- End Header Navigation -->
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-menu">
                        
                            <?php wp_nav_menu( array
                                ('container'        => 'ul', 
                                'theme_location'    => 'primary', 
                                'menu_class'        => 'nav navbar-nav navbar-right', 
                                'items_wrap'        => '<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">%3$s</ul>',
                                'fallback_cb'       => 'bizstart_wp_bootstrap_navwalker::fallback',
                                'walker'            => new bizstart_wp_bootstrap_navwalker()
                                )); 
                            ?>          
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </nav>
        </div>
    </header>
    <!-- Header ends -->