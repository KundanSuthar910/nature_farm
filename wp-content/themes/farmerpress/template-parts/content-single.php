<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */
$options = farmerpress_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear ' . $class ); ?>>
	<?php
		if ( ! $options['single_post_hide_date'] ) :
			farmerpress_posted_on(); 
		endif;
	?>
    <div class="entry-content">
        <?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'farmerpress' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'farmerpress' ),
				'after'  => '</div>',
			) );
		?>
    </div><!-- .entry-content -->
    
    <div class="entry-meta">
        <?php  
        if ( ! $options['single_post_hide_author'] ) :
				echo farmerpress_author( get_the_author_meta( 'ID' ) );
			endif; 
        	farmerpress_single_categories();
        	farmerpress_entry_footer();
    	?>
    </div><!-- .entry-meta -->


</article><!-- #post-## -->

