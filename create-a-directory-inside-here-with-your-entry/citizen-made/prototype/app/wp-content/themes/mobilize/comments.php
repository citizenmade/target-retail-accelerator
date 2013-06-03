<?php
/**
 * @package WordPress
 * @subpackage Mobilize
 * @since Mobilize 1.0
 */
?>

<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'mobilize' ); ?></p>
			</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>
                        

<?php if ( comments_open() ){ ?>
                        <div class="clear"></div>
<div id="comments" class="itemComments">


<?php if ( have_comments() ){ ?>
    <br/>
 <h3 class="itemCommentsCounter"><?php comments_number('No Comments','One Comment','% Comments'); ?> to "<?php the_title(); ?>"</h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ){ // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'mobilize' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'mobilize' ) ); ?></div>
			</div> <!-- .navigation -->
<?php }// check for comment navigation ?>

			<ul id="commentlist" class="commentlist ui-listview ui-listview-inset ui-corner-all ui-shadow" data-role="" data-inset="true"<?php jqmobile_ui('comment');?>>
				
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use abrax_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define abrax_comment() and that will be used instead.
					 * See mobilize_comment() in mobilize/functions.php for more.
					 */
                                $args = array('style' => 'ul',
                                'callback'          => 'well_comment',
                                'type'              => 'all',
                                'avatar_size'       => 80,
                                'reverse_top_level' => null
                                 );
					wp_list_comments( $args );
				?>
			</ul>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ){// Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'mobilize' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'mobilize' ) ); ?></div>
			</div><!-- .navigation -->
<?php }

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
} // end have_comments() ?>

                       <?php //print_r('author: ' . $aria_req);
                       $auxchar="'";
                       if(!isset($aria_req)) $aria_req='';
					   if( current_user_can('level_10') ) 
                       $admclass="admincoment";
                       $comment_args = array( 'title_reply'          => __( 'Your Comment', 'mobilize'  ),
                            'title_reply_to'       => __( 'Leave a Reply to %s' , 'mobilize' ),
                           'label_submit' => __('Send', 'mobilize' ),
                           'logged_in_as' => '',
                           'comment_notes_before' => '',
                           'id_form' => 'itemCommentsForm',
                           'id_submit' => 'submitCommentButton',
                           'fields' => apply_filters( 'comment_form_default_fields', array(
    'author' => '<p><label class="formComment" for="userName">' . __('Name', 'mobilize' ) . ' *</label>' .
                '<input type="text" id="userName" class="inputbox" name="author" value="' . $commenter['comment_author'] . '" size="30"' . $aria_req . '
                    onfocus="if(this.value==' . $auxchar . $commenter['comment_author'] . $auxchar . ') this.value=' . $auxchar . $auxchar . ';" onblur="if(this.value==' . $auxchar . $auxchar . ') this.value=' . $auxchar . $commenter['comment_author'] . $auxchar . ';" /><span class="clear"></span></p>',
					
    'email'  => '<p><label class="formComment" for="commentEmail">' . __('Email', 'mobilize' ) . ' *</label>' .
                '<input type="text" id="commentEmail" class="inputbox" name="email" value="' . $commenter['comment_author_email'] . '" size="30"' . $aria_req . '
                    onfocus="if(this.value==' . $auxchar . $commenter['comment_author_email'] . $auxchar . ') this.value=' . $auxchar . $auxchar . ';" onblur="if(this.value==' . $auxchar . $auxchar . ') this.value=' . $auxchar . $commenter['comment_author_email'] . $auxchar . ';" /><span class="clear"></span></p>') ),
					
    'comment_field' => '<p><label class="formComment" for="commentText">' . __('Message', 'mobilize' ) . ' *</label>' .
                '<textarea id="comment" class="inputbox btn '.$admclass.'" name="comment" cols="45" rows="8" aria-required="true" ></textarea><span class="clear"></span></p>',
    'comment_notes_after' => '',
);
comment_form($comment_args); ?>

</div><!-- #comments -->

<?php } ?>