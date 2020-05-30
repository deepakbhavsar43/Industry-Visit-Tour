<?php 
// To display Blog Post section on front page
?>
<?php  
$bizstart_blog_title =  get_theme_mod('bizstart_blog_title');  
$bizstart_blog_section = get_theme_mod('bizstart_blog_section_hideshow','show');

if ($bizstart_blog_section =='show') { 
?>

 <!-- post starts-->
    <section id="post" class="post text-center">
        <div class="space-130"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                	<?php if($bizstart_blog_title !="")
				    {?>
                        <h3 class="text-capitalize text-blue"><?php echo esc_html($bizstart_blog_title); ?></h3>
                        <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/border/post-border.png');?>" alt="<?php echo esc_attr__('border','bizstart')?>">
                    <?php 
				    } ?>
                    <div class="space-60"></div>
                </div>
            </div>
            <div class="space-60"></div>
            <div class="row center-grid">
            	<?php 
				$bizstart_latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
				if ( $bizstart_latest_blog_posts->have_posts() ) : 
					while ( $bizstart_latest_blog_posts->have_posts() ) : $bizstart_latest_blog_posts->the_post(); 
		        ?>
					<div class="col-md-4 col-sm-6">
						<div class="post-wrap">
							<div class="recent-img">
							    <?php if(has_post_thumbnail()) : ?>
									<?php the_post_thumbnail('bizstart-blog-front-thumbnail'); ?>
								<?php endif; ?>
								<span>
									<?php echo get_the_date();  
									?>
								</span>
							</div>
							<div class="post-info">
								<h3>
									<a href="<?php the_permalink(); ?>" class="fw-600 text-black"><?php the_title(); ?></a>
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
								<?php the_excerpt();?>
								<div class="post-bottom clearfix">
									<a href="<?php the_permalink() ?>" class="text-white btn btn-custom"> 
									    <?php echo esc_html__('Read More', 'bizstart' ); ?>
									</a>
									<div class="post-image">
										<img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/home/chat.png');?>" alt="<?php echo esc_attr__('border','bizstart')?>" class="post-img">
										<span class="chat">
										    <?php comments_number( __('0 Comment', 'bizstart'), __('1 Comment', 'bizstart'), __('% Comments', 'bizstart') ); ?>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endwhile; 
				endif; ?>
            </div>
        </div>
        <div class="space-130"></div>
    </section>
<?php } ?>