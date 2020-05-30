<?php 
/* For Search Results
*/
?>
<div class="recent-img">
    <?php if(has_post_thumbnail()) : ?>
        <?php the_post_thumbnail('bizstart-page-thumbnail', array('class' => 'img-responsive')); ?>
    <?php endif; ?>
    <span>
        <?php 
           echo get_the_date();
        ?> 
    </span>
</div>
<div class="post-info">
    <h3>
        <a href="<?php the_permalink(); ?>" class="fw-600 text-black">
            <?php the_title(); ?>
        </a>
    </h3>
    <div class="by-admin">
        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 32 ); ?>
        <?php echo esc_html__('By ','bizstart'); ?>
        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
            <?php 
               the_author(); 
            ?>
        </a>
    </div>
    
    <?php the_excerpt(); ?>
    
    <div class="post-bottom clearfix">
        <a href="<?php the_permalink() ?>" class="text-white btn btn-custom">
		    <?php echo esc_html__('Read More', 'bizstart' ); ?> 
        </a>
        <div class="post-image">
            <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home/chat.png');?>" alt="<?php echo esc_attr__('chat','bizstart')?>" class="post-img">
            <span class="chat">
			    <?php comments_number( __('0 Comment', 'bizstart'), __('1 Comment', 'bizstart'), __('% Comments', 'bizstart') ); ?>
			</span>
        </div>
    </div>
</div>