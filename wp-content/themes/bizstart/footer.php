<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Bizstart
 */
 
?>
<!-- footer starts-->
<section id="footer" class="footer bg-gray text-white text-center">
    <?php $bizstart_footer_section = get_theme_mod('bizstart_footer_section_hideshow','show');
    $bizstart_footer_title = get_theme_mod('bizstart-footer_title');
    if ($bizstart_footer_section =='show') { 
    ?>
        <div class="container">
            <div class="space-50"></div>
            <div class="foot-mid border-bt">
                <div class="row">
                    <div class="col-sm-4 col-xs-12 text-left">
                        <?php dynamic_sidebar('bizstart-footer-widget-area-1'); ?>
                    </div>
                    <div class="col-sm-4 col-xs-12 text-left">
                        <?php dynamic_sidebar('bizstart-footer-widget-area-2'); ?> 
                    </div>
                    <div class="col-sm-4 col-xs-12 text-left">
                       <?php dynamic_sidebar('bizstart-footer-widget-area-3'); ?>
                    </div>
                </div>
                <div class="space-50"></div>
            </div>
        </div>
        <div class="container">
            <div class="footer-bottom">
                <div class="space-20"></div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <?php if( $bizstart_footer_title ) : ?> 
                     
                           <p><?php echo wp_kses_post( html_entity_decode(esc_html($bizstart_footer_title))); ?></p>

                           <p>
                        <?php else : 
                            /* translators: 1: poweredby, 2: link, 3: span tag closed  */
						   printf( esc_html__( ' %1$sPowered by %2$s%3$s', 'bizstart' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'bizstart' ) ) .'" target="_blank">WordPress.</a>', '</span>' );
                           /* translators: 1: poweredby, 2: link, 3: span tag closed  */
						   printf( esc_html__( ' Theme: bizstart by: %1$sDesign By %2$s%3$s', 'bizstart' ), '<span>', '<a href="'. esc_url( __( 'https://freehtmldesigns.com/', 'bizstart' ) ) .'" target="_blank">Freehtmldesigns</a>', '</span>' );
						?>
                            </p>
                        <?php endif;  ?>
                    </div>
                </div>
                <div class="space-20"></div>
            </div>
        </div>
    <?php } ?>
</section>
<!-- footer ends-->
<?php wp_footer(); ?>
</body>
</html>