<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
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
 
<div class="itsource-comments comments">

	<?php if ( have_comments() ) : ?>
	  <div class="comment-wrap">
		<div class="title">
			<h3><?php comments_number(esc_attr__('No comments', 'gosofie'), esc_attr__('1 comment', 'gosofie'), esc_attr__('% comments', 'gosofie')); ?>
				
			</h3>
		</div> 

		<ol class="comment-list">
			<?php wp_list_comments( 'callback=gosofie_comment_callback&reply_text=Reply' ); ?>
		</ol><!-- .comment-list -->

		<?php gosofie_comment_nav(); ?>
      </div>
	<?php endif;?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_attr_e( 'Comments are closed.', 'gosofie' ); ?></p>
	<?php endif; ?>

	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$fields =  array(
		'author' => '<div class="comment-form-author"><label for="author"><span class="screen-reader-text">' . esc_attr__( 'Name *'  , 'gosofie' ) . '</span></label><input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Enter Name here...'  , 'gosofie' ) . '"/><div class="icon-bg"><i class="far fa-user"></i></div></div>',
		'email'  => '<div class="comment-form-email"><label for="email"><span class="screen-reader-text">' . esc_attr__( 'Email *'  , 'gosofie' ) . '</span></label><input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="' . esc_attr__( 'Enter email here...'  , 'gosofie' ) . '"/><div class="icon-bg"><i class="far fa-envelope"></i></div></div>',
		'url'  => '<div class="comment-form-url"><label for="url"><span class="screen-reader-text">' . esc_attr__( 'Website *'  , 'gosofie' ) . '</span></label><input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . esc_attr__( 'Enter Your Website...'  , 'gosofie' ) . '"/><div class="icon-bg"><i class="fas fa-globe"></i></div></div>',
				
	);
	$required_text = esc_attr__(' Required fields are marked ', 'gosofie').' <span class="required">*</span>';
	?>
	<?php comment_form( array( 
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' , 'gosofie' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a> <a href="%3$s" title="Log out of this account">Log out?</a>'  , 'gosofie' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'comment_notes_before' => '',
		'title_reply' => esc_attr__( 'Leave a Comment'  , 'gosofie' ),
		'title_reply_to' => esc_attr__( 'Leave a reply to %s'  , 'gosofie' ),
		'cancel_reply_link' => esc_attr__( 'Cancel reply'  , 'gosofie' ) . '',
		'label_submit' => esc_attr__( 'Post Comment'  , 'gosofie' ),
		'comment_field' => '<div class="comment-form-comment"><label for="comment"><span class="screen-reader-text">' . esc_attr__( 'Comment *'  , 'gosofie' ) . '</span></label><textarea id="comment" class="form-control-textarea" name="comment" rows="8" aria-required="true" placeholder="' . esc_attr__( 'Enter Comment here...'  , 'gosofie' ) . '"></textarea><div class="icon-bg"><i class="far fa-edit"></i></div></div>',
	)); 
	?>	

</div><!-- #comments -->

