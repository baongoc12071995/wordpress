<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Suzaku
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( has_post_thumbnail() ) :
		if ( is_single() ) {
			$destination = esc_url( get_attachment_link( get_post_thumbnail_id() ) );
		} else {
			$destination = esc_url( get_permalink() );
		}
		?>
		<figure class="entry-thumbnail">
			<a href="<?php echo $destination; ?>" rel="bookmark">
				<?php the_post_thumbnail(); ?>
			</a><!-- .entry-thumbnail -->
			
			<?php if ( is_sticky() && ! is_singular() ) : ?>
				<div class="sticky-header">
					<?php
					/* translators: Appears as an overlay over the featured image of a sticky post */
					esc_html_e( 'Featured', 'suzaku' );
					?>
				</div><!-- .sticky-header -->
			<?php endif; ?>
		</figure>
	<?php endif; ?>
	
	<header class="entry-header">
		<?php
		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) : ?>
			<div class="meta">
				<?php suzaku_posted_on(); ?>
			</div><!-- .meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_singular() ) : ?>
		<div class="entry-content">
			<?php
			the_content();
		
			wp_link_pages( array(
				'before'      => sprintf( '<div class="page-links">%s', esc_html__( 'Pages', 'suzaku' ) ),
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>'
			) );
			?>
		</div><!-- .entry-content -->
		
		<footer class="footer meta">
			<?php suzaku_entry_footer(); ?>
		</footer><!-- .footer.meta -->
	<?php endif; ?>
</article><!-- #post-## -->
