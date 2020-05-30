<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage bizstart
 * @since Bizstart 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
    return;
}
?>

<div class="comment-section">
    <div id="comments" class="user-comment">

    <?php if ( have_comments() ) : ?>
        <h3>
            <?php
                $comments_number = get_comments_number();
                if ( 1 === $comments_number ) {
                    /* translators: %s: post title */
                    printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','bizstart' ), get_the_title() );
                } else {
                    printf(
                        /* translators: 1: number of comments, 2: post title */
                        _nx(
                            '%1$s Comment',
                            '%1$s Comments',
                            $comments_number,
                            'comments title',
                            'bizstart'
                        ),
                        esc_html(number_format_i18n( $comments_number ) ),
                        get_the_title()
                    );
                }
            ?>
        </h3>

        <?php the_comments_navigation(); ?>

        <ul>
            <?php
                wp_list_comments( array(
                    'style'       => 'ul',
                    'short_ping'  => true,
                    'avatar_size' => 42,
                    'callback' => 'bizstart_comments',
                ) );
            ?>
        </ul><!-- .comment-list -->

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for have_comments(). ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'bizstart' ) ) :
    ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bizstart' ); ?></p> 
    <?php endif; ?>
    
    <?php 
        $req      = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );

        $comments_args = array
        (
            'submit_button' => '<div class="form-group">'.
              '<input  name="%1$s" type="submit" id="%2$s" class="btn-submit" value="%4$s" />'.
            '</div>',
            'title_reply'  =>  __( '<h4>Leave a comment</h4>', 'bizstart'  ), 
            'comment_notes_after' => '',  
                
            'comment_field' =>  
                '<textarea class="form-control" id="comment" name="comment" placeholder="' . esc_attr( 'Comment here', 'bizstart' ) . '" rows="12" aria-required="true" '. $aria_req . '>' .
                '</textarea>',
            'fields' => apply_filters( 'comment_form_default_fields', array (
                'author' => '<div >'.               
                    '<input id="author" class="form-control" name="author" placeholder="' . esc_attr( 'Your Name *', 'bizstart' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' /></div>',
                'email' =>'<div >'.
                    '<input id="email" class="form-control" name="email" placeholder="' . esc_attr( 'Your Email *', 'bizstart' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' /></div>',
            
            ) ),
        );
    ?>
    </div>
</div>
<div class="comment-box" id="comment-box"> 
    <?php
    comment_form($comments_args);
    ?>
</div> 