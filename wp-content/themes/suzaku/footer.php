<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Suzaku
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info meta content-wrapper">
		
			<?php
			$footer_text = get_theme_mod( 'footer_text' );
			
			if ( $footer_text ) :
				echo wp_kses( $footer_text,
					array( 'a' => array( 'href' => array() ),
						'strong' => array(),
						'em'     => array(),
						'span'   => array( 'class' => array() )
					)
				);
			else : 
			?>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'suzaku' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'suzaku' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php
				printf( esc_html__( 'Theme: %1$s by %2$s', 'suzaku' ), 'Suzaku', '<a href="http://stephencottontail.wordpress.com/" rel="designer">Stephen Dickinson</a>' );
			
			endif; ?>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
