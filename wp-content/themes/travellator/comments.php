<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travellator
 * @since Travellator 1.0
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
<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'travellator' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'travellator' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'travellator' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'travellator' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'travellator' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'travellator' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'travellator' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'travellator' ); ?></p>
	<?php endif; ?>
    
	<?php // comment_form(); ?>
    
     <?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$comments_args = array(
        // change the title of send button
        // 'label_submit'=>'Send',
        // change the title of the reply section
        // 'title_reply'=>'Write a Reply or Comment',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => ' ',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="'. esc_html_e( 'Your Message...', 'travellator' ).'" rows="8" cols="37" wrap="hard"></textarea></p>',
		'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' =>
		  '<div class="row"><div class="col-md-4"><p class="comment-form-author">' .
		  '<input id="author" placeholder="'. esc_html_e('Your name *...', 'travellator') .'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		  '" size="30"' . $aria_req . ' />' . ( $req ? '<span style="color:red" class="required"></span>' : '' ) . '</p></div>',
		'email' =>
		  '<div class="col-md-4"><p class="comment-form-email">' .
		  '<input id="email" placeholder="'. esc_html_e('Your email *...', 'travellator') .'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		  '" size="30"' . $aria_req . ' />' . ( $req ? '<span style="color:red" class="required"></span>' : '' ) . '</p></div>',
		'url' =>
		  '<div class="col-md-4"><p class="comment-form-url">' .
		  '<input id="url" placeholder="'. esc_html_e('Your website...', 'travellator') .'" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		  '" size="30" /></p></div></div>'
		)
	  ),
	);

	comment_form($comments_args); ?>

</div><!-- #comments -->

