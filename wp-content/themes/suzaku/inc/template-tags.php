<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Suzaku
 */

if ( ! function_exists( 'suzaku_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post date and author.
 */
function suzaku_posted_on() {
	$date = sprintf( '<time class="entry-date" datetime="%1$s"><a href="%2$s" rel="bookmark">%3$s</time>',
		esc_attr( get_the_date( 'c' ) ),
		esc_url( get_permalink() ),
		esc_html( get_the_date() )
	);
	
	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);

	printf( esc_html__( 'Posted on %1$s by %2$s', 'suzaku' ), $date, $author );
}
endif;

if ( ! function_exists( 'suzaku_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function suzaku_entry_footer() {
	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( esc_html__( ', ', 'suzaku' ) );
	if ( $categories_list && suzaku_categorized_blog() ) {
		printf( '<span class="cat-links meta-info">%s</span>', $categories_list );
	}

	/* translators: used between list items, there is a space after the comma */
	$tags_list = get_the_tag_list( '', esc_html__( ', ', 'suzaku' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links meta-info">%s</span>', $tags_list );
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'suzaku' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		),
		'<span class="edit-link meta-info">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function suzaku_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'suzaku_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'suzaku_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so suzaku_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so suzaku_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in suzaku_categorized_blog.
 */
function suzaku_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'suzaku_categories' );
}
add_action( 'edit_category', 'suzaku_category_transient_flusher' );
add_action( 'save_post',     'suzaku_category_transient_flusher' );
