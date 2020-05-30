     <div class="container-fluid page_content row ourresources">
        <div class="col-sm-12 ">
          
          <div class="row">
            <?php
            $boxheading = get_theme_mod('boxheading');
            if( !empty($boxheading) ){ ?>
            <h2><?php echo esc_html($boxheading); ?></h2>
          <?php } ?>
            <?php
 $boxvariable = array();
 for($k=1;$k<=4;$k++){?>
  <?php $boxid = absint(get_theme_mod('box'.$k));?>
  <?php $boxquery = new WP_query('page_id='.$boxid); //print_r($boxquery);?>
  <?php if ($boxquery->have_posts() && $boxid>0) : 
  while( $boxquery->have_posts() ) : $boxquery->the_post();
    //$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID,'home-banner-size'));
   $thumbnail_id = get_post_thumbnail_id( $post->ID );
   $alt = esc_html(get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true));
   $image = esc_url(get_the_post_thumbnail_url( $post->ID, 'biztt-home-box-size'));
   $title = esc_html(get_the_title( $post->ID ));
   $my_postid = $post->ID;
 $content = esc_html(biztt_get_excerpt($my_postid,'100'));
  $url = esc_url(get_the_permalink($my_postid));
  $boxvariable[] = array('boxid'=>$post->ID,'boximage'=>$image,'alt'=>$alt,'box_title'=>$title,'box_content'=>$content,'url'=>$url);
  endwhile;
  wp_reset_postdata();
   endif;
  ?>
  
<?php }?>
<?php //echo "<pre>";print_r($boxvariable); echo "</pre>";?>
<?php foreach($boxvariable as $boxvariables){?>
  <div class="col-md-3 text-center mainbox">
    <div class="thumbnail">
      <a href="<?php echo esc_url($boxvariables['url']);?>">
        <img src="<?php echo esc_url($boxvariables['boximage']);?>" title="<?php echo esc_attr($boxvariables['alt']);?>" class="img-responsive img-thumbnail">         
      </a>
      <div class="caption">
          <a href="<?php echo esc_url($boxvariables['url']);?>"><h3><?php echo esc_html($boxvariables['box_title']);?></h3></a>
      </div>
      <p class="box_content"><?php echo esc_html($boxvariables['box_content']); ?></p>
        <?php
            $boxreadmore = get_theme_mod('boxreadmore');
            if( !empty($boxreadmore) ){ ?>  
              <div class="readmorebox">
          <a class="rdmore" href="<?php echo esc_url($boxvariables['url']);?>">
            <?php echo esc_html($boxreadmore); ?>
          </a>
          </div><!--readmorebox-->
          <?php } ?>
    </div>
  </div>
  <?php }?>  
  <div class="clearfix"></div>
</div>
</div><!--site-main -->
<div class="clearfix"></div>