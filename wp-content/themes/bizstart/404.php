<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Bizstart
*/
    get_header(); 
?>
    <!--page-404 starts-->
    <section class="page404 text-white text-center">
        <div class="space-90"></div>
        <div class="space-100"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2><?php echo esc_html__('Page Not Found', 'bizstart' ); ?></h2>
                    <img src="<?php echo esc_url( get_template_directory_uri().'/assets/images/pages/404-error.png' ); ?>">
                    <p><?php echo esc_html__( 'We can not seem to find the page you are looking for. BTW, this page is fully editable.', 'bizstart' ); ?></p>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-custom text-uppercase"> <?php echo esc_html__( 'Back to HomePage', 'bizstart' ); ?></a>
                </div>
            </div>
        </div>
        <div class="space-100"></div>
    </section>
    <!--page-404 ends-->
<?php get_footer(); ?>