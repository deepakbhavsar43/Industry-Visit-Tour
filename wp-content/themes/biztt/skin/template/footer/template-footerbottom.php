<?php
 $biztt_copyright = get_theme_mod('biztt_copyright');
 $biztt_design = get_theme_mod('biztt_design');  
?>
<?php if($biztt_copyright || $biztt_design){?>
<div class="footer-bottom">

  <div class="container">

    <div class="row">

      <div class="col-sm-6 col-xs-6">

        <div class="copyright text-left">

          
            <?php if(get_theme_mod('biztt_copyright')){?>
              <?php echo esc_html($biztt_copyright);?>
            <?php }?>         
        </div><!--copyright-->

      </div>

      <div class="col-sm-6 col-xs-6">

        <div class="design text-right">
          
            <?php if(get_theme_mod('biztt_design')){?>
              <?php echo esc_html($biztt_design);?>
            <?php }?>

        </div><!--design-->

      </div><!--col-sm-6-->

    </div><!--row-->

  </div><!--container-->

</div><!--footer-bottom-->
<?php }?>