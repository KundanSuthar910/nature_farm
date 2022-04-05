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
$class = has_post_thumbnail() ? 'has-post-thumbnail' : '';
$options = farmerpress_get_theme_options();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry' . $class ); ?>>
    <div class="post-item-wrapper">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image">
                <a href="<?php the_permalink() ; ?>"><img src="<?php the_post_thumbnail_url('full'); ?>"></a>
            </div><!-- .featured-image -->
        <?php endif; ?>

        <div class="entry-container">
            <div class="entry-meta">
                <?php 
                    if ( ! $options['hide_date'] ) :
                        farmerpress_posted_on(); 
                    endif; 
                ?>
                <?php 
                if ( ! $options['hide_author'] ) :
                    echo farmerpress_author( get_the_author_meta( 'ID' ) );
                endif; ?>
            </div><!-- .entry-meta -->

            <header class="entry-header">
               <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->
            <?php if (!empty( $options['blog_read_more_text'] )): ?>
                <div class="more-link">
                    <a href="<?php the_permalink() ; ?>"><?php echo esc_html($options['blog_read_more_text']) ?></a>
                </div><!-- .more-link -->
            <?php endif ?>
        </div><!-- .entry-container -->
    </div><!-- .post-wrapper -->
</article>