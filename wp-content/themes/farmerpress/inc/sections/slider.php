<?php
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */
if ( ! function_exists( 'farmerpress_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Farmerpress 1.0.0
    */
    function farmerpress_add_slider_section() {
    	$options = farmerpress_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'farmerpress_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'farmerpress_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        farmerpress_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'farmerpress_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Farmerpress 1.0.0
    * @param array $input slider section details.
    */
    function farmerpress_get_slider_section_details( $input ) {
        $options = farmerpress_get_theme_options();
        
        $content = array();
     
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['slider_content_page_' . $i] ) )
                $page_ids[] = $options['slider_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( 3 ),
            'orderby'           => 'post__in',
            );                    
           


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = farmerpress_trim_content( 10 );
                $page_post['blogexcerpt']   = farmerpress_trim_content( 30 );

                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
// slider section content details.
add_filter( 'farmerpress_filter_slider_section_details', 'farmerpress_get_slider_section_details' );


if ( ! function_exists( 'farmerpress_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Farmerpress 1.0.0
   *
   */
   function farmerpress_render_slider_section( $content_details = array() ) {
        $options = farmerpress_get_theme_options();


        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows": true, "autoplay": false, "draggable": true, "fade": false }'>    
            <?php $i = 1 ; 
            foreach ($content_details as $content): 
                $image = $content['image'] == '' ? get_template_directory_uri().'/assets/uploads/no-featured-image-590x650.jpg' : $content['image'] ;
            ?>
                <article >

                    <div class="featured-image">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr( $content['title'] ) ?>">
                        <div class="overlay"></div>
                    </div><!-- .featured-image -->
            
                    <div class="wrapper">
                        <div class="entry-container">
                            <header class="entry-header">
                                <h3 class="sub-title"><?php echo esc_html( $options['slider_subtitle'] ) ?></h3>
                                <h2 class="entry-title"><?php echo esc_html( $content['title'] ); ?></h2>
                            </header>
                           
                            
                            <?php if ( !empty( $options['slider_btn_label'] ) ) : ?>
                            <div class="read-more">
                                <a href="<?php echo esc_url($content['url']); ?>" class="btn"><?php echo esc_html( $options['slider_btn_label'] ) ?></a>
                            </div><!-- .read-more -->
                        <?php endif; ?>
                        </div><!-- .entry-container -->
                    </div><!-- .wrapper -->
                </article>
            <?php $i++; endforeach ; ?>
        </div><!-- #featured-slider -->
                       
    <?php }
endif;