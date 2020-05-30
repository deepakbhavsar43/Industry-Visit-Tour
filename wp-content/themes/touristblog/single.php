<?php get_header(); ?>
<div class="clearfix"></div>
<!-- =========================
     Page Content Section      
============================== -->
 <main id="content">
  <div class="container">
    <div class="row"> 
      <!--/ Main blog column end -->
      <div class="<?php if( !is_active_sidebar('sidebar-1')) { echo "col-lg-12 col-md-12"; } else { echo "col-lg-9 col-md-9"; } ?>">
        <div class="single-content-container">
          <div class="row">
  		      <?php if(have_posts()) {
  		      while(have_posts()) { the_post(); ?>
            <div class="col-lg-12">
              <div class="tb-blog-post-box"> 
                <h1 class="post-title-head"><a><?php the_title(); ?></a></h1>
                <article class="small">
                  <div class="tb-blog-category post-meta-data">
                    <i class="fa fa-user meta-fa-icon-user"></i>
                    <a class="meta-user-des" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>">
                      <?php the_author(); ?>
                    </a>
                    <i class="fa fa-calendar meta-fa-icons"></i>
                    <span class="meta-data-date"><?php echo get_the_date( 'F j, Y' ); ?></span>
                  </div>
                  <a class="tb-blog-thumb">
                    <?php if(has_post_thumbnail()): ?>
                      <?php $defalt_arg =array('class' => "img-responsive"); ?>
                      <?php the_post_thumbnail('', $defalt_arg); ?>
                    <?php endif; ?>   
                  </a>
                  <div class="category-tag-div">
                    <?php $cat_list = get_the_category_list();
                    if(!empty($cat_list)) { ?>
                      <i class="fa fa-folder meta-fa-icons"></i>
                        <?php if(!empty($cat_list)) { ?>
                          <?php the_category(', '); ?>
                      <?php }
                    } ?>
                  </div>
                  <?php the_content(); ?> 
                  <div class="category-tag-div">
                    <?php the_tags( '<i class="fa fa-tag" aria-hidden="true"></i> ', ', ', '<br />' ); ?>
                  </div>
                  <?php wp_link_pages( array( 'before' => '<div class="link single-post-link">' . __( 'Pages:', 'touristblog' ), 'after' => '</div>' ) ); ?>
                </article>
              </div>
            </div>
  		      <?php } ?>
            <div class="col-lg-12">
              <div class="media tb-info-author-block"> <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>" class="tb-author-pic"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?> </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></h4>
                  <p><?php the_author_meta( 'description' ); ?></p>
                  <div class="row">
                    <div class="col-lg-6">
                      <ul class="list-inline info-author-social">
            					<?php 
            					$facebook_profile = get_the_author_meta( 'facebook_profile' );
            					if ( $facebook_profile && $facebook_profile != '' ) {
            					echo '<li class="facebook"><a href="' . esc_url($facebook_profile) . '"><i class="fa fa-facebook-square"></i></a></li>';
            					} 
  					
            					$twitter_profile = get_the_author_meta( 'twitter_profile' );
            					if ( $twitter_profile && $twitter_profile != '' ) 
            					{
            					echo '<li class="twitter"><a href="' . esc_url($twitter_profile) . '"><i class="fa fa-twitter-square"></i></a></li>';
            					}
  					
            					$google_profile = get_the_author_meta( 'google_profile' );
            					if ( $google_profile && $google_profile != '' ) {
            					echo '<li class="googleplus"><a href="' . esc_url($google_profile) . '" rel="author"><i class="fa fa-google-plus-square"></i></a></li>';
            					}
            					$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
            					if ( $linkedin_profile && $linkedin_profile != '' ) {
            					   echo '<li class="linkedin"><a href="' . esc_url($linkedin_profile) . '"><i class="fa fa-linkedin-square"></i></a></li>';
            					}
            					?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  		      <?php } ?>
           <?php comments_template('',true); ?>
          </div>
      </div>
      </div>
      <div class="col-lg-3 col-md-3">
      <?php get_sidebar(); ?>
      </div>
    </div>
    <!--/ Row end --> 
  </div>
</main>
<?php get_footer(); ?>