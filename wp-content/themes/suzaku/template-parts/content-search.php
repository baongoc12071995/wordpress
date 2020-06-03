<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Suzaku
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( has_post_thumbnail() ) :
		$destination = esc_url( get_permalink() );
	?>
		<figure class="entry-thumbnail">
			<a href="<?php echo $destination; ?>" rel="bookmark">
				<?php the_post_thumbnail(); ?>
			</a><!-- .entry-thumbnail -->
		</figure>
	<?php endif; ?>
	
	<header class="entry-header">
		<?php
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
			<div class="meta">
				<?php suzaku_posted_on(); ?>
			</div><!-- .meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
