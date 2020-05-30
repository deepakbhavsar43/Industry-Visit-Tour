<footer class="footer"> 
    <div class="container">
      <div class="row"><!-- row -->
            
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                  <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
                    <?php endif; // end footer widget area ?>  
                </div><!-- widgets column left end -->
                
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                  <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
                    <?php endif; // end footer widget area ?>  
              </div><!-- widgets column left end -->
                
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column left -->
                  <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
                    <?php endif; // end footer widget area ?>  
              </div><!-- widgets column left end -->
                
                
                <div class="col-lg-3 col-md-3"><!-- widgets column center -->
                
                   <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>
                    <?php endif; // end footer widget area ?>  
                </div>
          </div>
    </div>
</footer>