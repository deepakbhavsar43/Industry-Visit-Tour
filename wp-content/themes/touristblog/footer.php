<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package touristblog
 */ ?>
<!--==================== tb-FOOTER AREA ====================-->
<footer> 
  <div class="overlay"> 
  <!--Start tb-footer-widget-area-->
  <?php if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
  <div class="tb-footer-widget-area">
    <div class="container">
      <div class="row">
        <?php  dynamic_sidebar( 'footer_widget_area' ); ?>
      </div>
    </div>
  </div>
  <?php } ?>
  <!--End tb-footer-widget-area-->
  <div class="tb-footer-copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <?php /* translators: 1: URL Of WEB */ ?>
            <p>&copy; <?php echo esc_html(date('Y')).' '; bloginfo( 'name' ); ?> | <?php printf( esc_html__( 'Theme by %1$s', 'touristblog' ),  '<a href="'.esc_url('https://touristblog.com/').'" rel="designer">touristblog</a>' ); ?></p>
          </div>
        <div class="col-lg-6 col-sm-6 text-right">
			    <ul class="tb-social">
                       <?php if(get_theme_mod('social_link_facebook')) { ?>
            <li><span class="icon-soci"> <a href="<?php echo esc_url(get_theme_mod('social_link_facebook')); ?>" <?php if(get_theme_mod('Social_link_facebook_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-facebook"></i></a></span></li>
            <?php } if(get_theme_mod('social_link_twitter')) { ?>
            <li><span class="icon-soci"><a href="<?php echo esc_url(get_theme_mod('social_link_twitter')); ?>" <?php if(get_theme_mod('Social_link_twitter_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-twitter"></i></a></span></li>
            <?php } if(get_theme_mod('social_link_linkedin')) { ?>
            <li><span class="icon-soci"><a href="<?php echo esc_url(get_theme_mod('social_link_linkedin')); ?>" <?php if(get_theme_mod('Social_link_linkedin_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-linkedin"></i></a></span></li>
            <?php } if(get_theme_mod('social_link_google')) { ?>
            <li><span class="icon-soci"><a href="<?php echo esc_url(get_theme_mod('social_link_google')); ?>" <?php if(get_theme_mod('Social_link_google_tab')==1){ echo "target='_blank'"; } ?> ><i class="fa fa-google-plus"></i></a></span></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
</footer>
</div>
<!--Scroll To Top--> 
<a href="#" class="ti_scroll bounceInRight  animated"><i class="fa fa-angle-double-up"></i></a> 
<!--/Scroll To Top-->
<?php wp_footer(); ?>
</body>
</html>