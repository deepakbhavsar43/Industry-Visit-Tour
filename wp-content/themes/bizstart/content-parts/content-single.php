<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(has_post_thumbnail()) : ?>
	    <div class="recent-img">
	        <?php the_post_thumbnail('bizstart-page-thumbnail', array('class' => 'img-responsive')); ?>
	    </div>
    <?php endif; ?>
    <ul class="meta">
		<li> 
			<i class="fa fa-calendar"></i> 
			<?php 
				 the_date();
			?> 
		</li>
		<li>
			<i class="fa fa-comments-o"></i>
			<?php 
			    comments_number( __('0 Comment', 'bizstart'), __('1 Comment', 'bizstart'), __('% Comments', 'bizstart') ); 
			?>
		</li>
		<li> 
			<i class="fa fa-user"></i>
			<?php echo esc_html__('By ','bizstart'); ?>
			<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
			    <?php 
				   the_author(); 
			    ?>
			</a>
		</li>
		<?php if (has_tag()) : ?>
		    <li>
		    	<i class="fa fa-tag"></i>
		    	<span> <?php echo __(' ', 'bizstart' ); ?><?php the_tags('&nbsp;'); ?> </span> 
		    </li>
	    <?php endif; ?> 
    </ul>

    <div class="post-info">
        <div class="post-detail">
			<h2>
				<?php the_title(); ?>
			</h2>
			<?php the_content(); ?>
			<?php
			    wp_link_pages( array(
				  'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'bizstart' ),
				  'after'  => '</div>',
			    ) );
		    ?>
        </div>
    </div>
</div>