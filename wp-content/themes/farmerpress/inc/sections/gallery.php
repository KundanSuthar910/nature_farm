<?php
/**
 * Gallery section
 *
 * This is the template for the content of gallery section
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */
if ( ! function_exists( 'farmerpress_add_gallery_section' ) ) :
    /**
    * Add gallery section
    *
    *@since Farmerpress 1.0.0
    */
    function farmerpress_add_gallery_section() {
    	$options = farmerpress_get_theme_options();
        // Check if gallery is enabled on frontpage
        $gallery_enable = apply_filters( 'farmerpress_section_status', true, 'gallery_section_enable' );

        if ( true !== $gallery_enable ) {
            return false;
        }
        // Get gallery section details
        $section_details = array();
        $section_details = apply_filters( 'farmerpress_filter_gallery_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render gallery section now.
        farmerpress_render_gallery_section( $section_details );
    }
endif;

if ( ! function_exists( 'farmerpress_get_gallery_section_details' ) ) :
    /**
    * gallery section details.
    *
    * @since Farmerpress 1.0.0
    * @param array $input gallery section details.
    */
    function farmerpress_get_gallery_section_details( $input ) {
        $options = farmerpress_get_theme_options();
        
        $content = array();

        $page_ids = array();

        for ( $i = 1; $i <=7; $i++ ) {
            if ( ! empty( $options['gallery_content_page_' . $i] ) )
                $page_ids[] = $options['gallery_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint(7 ),
            'orderby'           => 'post__in',
            );                    
          

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// gallery section content details.
add_filter( 'farmerpress_filter_gallery_section_details', 'farmerpress_get_gallery_section_details' );


if ( ! function_exists( 'farmerpress_render_gallery_section' ) ) :
  /**
   * Start gallery section
   *
   * @return string gallery content
   * @since Farmerpress 1.0.0
   *
   */
   function farmerpress_render_gallery_section( $content_details = array() ) {
        $options = farmerpress_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <div id="gallery-section" class="relative page-section same-background">
            <div class="wrapper">
                <div class="gallery-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows": false, "autoplay": false, "draggable": true, "fade": false, "adaptiveHeight": true }'>
                    <?php foreach ($content_details as $content):?>
                        <?php if (!empty($content['image'])): ?>
                            <article>
                                <img src="<?php echo esc_url($content['image']); ?>" alt="<?php echo esc_attr( $content['title'] ) ?>">
                            </article>
                        <?php endif ?>
                     <?php endforeach ?>
                </div><!-- .gallery-slider -->

                <div class="gallery-slider-nav">
                    <?php foreach ($content_details as $content):?>
                        <?php if (!empty($content['image'])): ?>
                            <article>
                                <img src="<?php echo esc_url($content['image']); ?>" alt="<?php echo esc_attr( $content['title'] ) ?>">
                            </article>
                        <?php endif; ?>
                     <?php endforeach ?>
                </div><!-- .gallery-slider-nav -->
            </div><!-- .wrapper -->
        </div> 
    <?php }
endif;