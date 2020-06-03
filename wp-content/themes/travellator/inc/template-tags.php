<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Travellator
 * @since Travellator 1.0
 */


if ( ! function_exists( 'travellator_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */

function travellator_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'travellator' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="fa fa-clock-o"></i>' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( '%s', 'post author', 'travellator' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fa fa-user"></i>' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span> <span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;

function travellator_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'travellator_excerpt_more');

//====================================Breadcrumbs=============================================================================================

function travellator_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo 'Home';
        echo '</a></li><li class="separator"> / </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> / </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $travellator_act = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $travellator_act as $travellator_inherit ) {
                    $output = '<li><a href="'.get_permalink($travellator_inherit).'" title="'.get_the_title($travellator_inherit).'">'.get_the_title($travellator_inherit).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    echo '</ul>';
}

function travellator_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'travellator_body_classes' );

function travellator_gallery_atts( $out, $pairs, $atts ) {
    $atts = shortcode_atts( array(
      'size' => 'medium',
    ), $atts );
 
    $out['size'] = $atts['size'];

    return $out;
 
}
add_filter( 'shortcode_atts_gallery', 'travellator_gallery_atts', 10, 3 );
?>
