<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travellator
 * @since Travellator 1.0
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="container">
        	<div id="footer-widget">
                <div class="row">
                    <div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-one-widget'); ?>
                    </div>
                    <div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-two-widget'); ?>
                    </div>
                    <div class="col-md-4">                    
                        <?php dynamic_sidebar('footer-three-widget'); ?>
                    </div>
                </div>
            </div>		
        </div>
        <div class="site-info">
        	<div class="container">
            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'depth'	=> 1, 'menu_id' => 'footer-menu' ) ); ?>
            <?php echo __('&copy; ', 'travellator') . esc_attr( get_bloginfo( 'name', 'travellator' ) );  ?>
            <?php if(is_home() && !is_paged()){?>            
                <?php _e('- Powered by ', 'travellator'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'travellator' ) ); ?>" title="<?php esc_attr_e( 'WordPress' ,'travellator' ); ?>"><?php _e('WordPress' ,'travellator'); ?></a>
                <?php _e(' and ', 'travellator'); ?><a href="<?php echo esc_url( __( 'http://protravelblogs.com/', 'travellator' ) ); ?>"><?php _e('Pro Travel Blogs', 'travellator'); ?></a>
            <?php } ?>
        	</div>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

