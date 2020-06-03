<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="wow fadeInDown feature-content-title">
            <?php echo get_the_title(); ?>
        </h2>
    </header><!-- .entry-header -->

    <div class="entry-content">
            <?php the_content(); ?>
            <?php
                wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zeal' ),
                        'after'  => '</div>',
                ) );
            ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
            <?php
                    edit_post_link(
                            sprintf(
                                    /* translators: %s: Name of current post */
                                    esc_html__( 'Edit %s', 'zeal' ),
                                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                            ),
                            '<span class="edit-link">',
                            '</span>'
                    );
            ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->