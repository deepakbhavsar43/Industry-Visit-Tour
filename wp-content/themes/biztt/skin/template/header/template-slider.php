<?php
 $slidervariable = array();
 for($k=1;$k<=3;$k++){?>
  <?php $banner_id = absint(get_theme_mod('banner'.$k,true)); ?>
  <?php $slidequery = new WP_query('page_id='.$banner_id); ?>
  <?php if ($slidequery->have_posts() && $banner_id>0) : 
  while( $slidequery->have_posts() ) : $slidequery->the_post();
    //$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID,'home-banner-size'));
   $thumbnail_id = get_post_thumbnail_id( $post->ID );
   $alt = esc_html(get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true));
   $image = esc_url(get_the_post_thumbnail_url( $post->ID, 'biztt-home-banner-size'));
   $title = esc_html(get_the_title( $post->ID ));
   $my_postid = $post->ID;//This is page id or post id
  $content_post = get_post($my_postid);
  $content = esc_html($content_post->post_content);
  $slidervariable[] = array('pageid'=>$post->ID,'bannerimage'=>$image,'alt'=>$alt,'slider_title'=>$title,'slider_content'=>$content);
  endwhile;
  wp_reset_postdata();
   endif;
  ?>
  
<?php }?>
<?php //print_r($slidervariable); 
 $slidervariable_count = count($slidervariable);?>
 <?php if($slidervariable_count>0){?>
<section id="banner" class="container-fluid">
<div class="row" >
<div class="col-sm-12">
  <div class="row" >
    <?php if ( is_front_page() || is_home()) {?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators hidden-xs">
      <?php for($i=0;$i<$slidervariable_count;$i++){?>
      <?php if($i==0){ $active = 'active'; }else{ $active = ''; }?>
      <li data-target="#myCarousel" data-slide-to="<?php echo esc_attr($i);?>" class="<?php echo esc_attr($active);?>"></li>      
      <?php }?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php $number = 1;?>
      <?php foreach ($slidervariable as $slidervariables){?>
      <?php if($number==1){
        $statis = "active";
      }else{
        $statis = "";
      }
      ?>

      <div class="item <?php echo esc_attr($statis);?>">
        <img class="img-responsive" src="<?php echo esc_url($slidervariables['bannerimage']); ?>" alt="<?php echo esc_attr($slidervariables['alt']);?>">
        <div class="carousel-caption hidden-xs">
          <h3><?php echo esc_html($slidervariables['slider_title']);?></h3>
          <p class="captiontext"><?php echo esc_html($slidervariables['slider_content']);?></p>
          <?php
            $slider_readmore = get_theme_mod('slider_readmore');
            if( !empty($slider_readmore) ){ ?>
            <div class="detailsbutton"><a class="button" href="<?php echo esc_url(get_permalink($slidervariables['pageid']));?>"><?php echo esc_html($slider_readmore); ?></a></div>
          <?php } ?>
        </div>
      </div>
      <?php $number++;}?>
    </div><!--carousel-inner-->

    <?php if($banner_id>0){?>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only"><?php echo esc_html__('Previous','biztt')?></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only"><?php echo esc_html__('Next','biztt')?></span>
    </a>
    <?php }?>
  </div><!--myCarousel-->
  <?php }else{?>
    <img class="img-responsive" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/images/innerpage.jpg">
  <?php }?>
  </div><!--row-->
</div><!--col-sm-12-->
</div><!--row-->
</section><!--banner-->
<?php }?>