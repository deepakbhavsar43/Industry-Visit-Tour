<?php
/**
 * 404 pages (Not Found).
 *
 * @package biztt
 */

get_header(); ?>

<div class="container">
    <div class="page_content row">
        <section class="site-main col-md-8" id="sitemain">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found', 'biztt' ); ?></h1>
            </header><!-- .page-header -->
            <div class="page-content">
                <p class="text-404"><?php esc_html_e( 'Looks like you have taken a wrong turn...Don\'t worry... it happens to the best of us.', 'biztt' ); ?></p>
               
            </div><!-- .page-content -->
        </section>
        <div class="col-md-4" id="sidebar">
            <?php echo get_sidebar();?>
        </div><!--col-md-4-->
        <div class="clearfix"></div>
    </div><!--row-->
</div><!--container-->
<?php get_footer(); ?>