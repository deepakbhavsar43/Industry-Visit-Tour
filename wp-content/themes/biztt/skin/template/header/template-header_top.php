<div id="maintopdiv">
<section id="main_navigation">
  <div class="main-navigations">
  <div class="container" >
  <div class="row">  
            <div class="col-sm-3 leftlogo">            
                <?php if (display_header_text()==true){?>
                  <div class="logotxt">
                    <h1><a href="<?php echo esc_url( home_url( '/') ); ?>"><?php bloginfo('name'); ?></a></h1>
                    <p><?php bloginfo('description'); ?></p>
                  </div>
                <?php } ?>
            </div> <!--col-sm-3--> 

              <div class="main-navigation-inner col-sm-9 rightmenu">
                  <div class="toggle">
                            <a class="togglemenu" href="#"><?php esc_html_e('Menu','biztt'); ?></a>
                         </div><!-- toggle --> 
                  <div class="sitenav">
                      <?php
                      wp_nav_menu( array(
                      'theme_location' => 'primary'
                      ) );
                      ?>
                        </div><!-- site-nav -->
              </div><!--<div class="row">-->
        </div><!--main-navigation-->
  </div><!--container-->
</div><!--main-navigations-->
</section><!--main_navigation-->
</div><!--maintopdiv-->