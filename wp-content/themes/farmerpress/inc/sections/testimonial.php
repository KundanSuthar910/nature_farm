<?php
/**
 * Testimonial section
 *
 * This is the template for the content of testimonial section
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */
if ( ! function_exists( 'farmerpress_add_testimonial_section' ) ) :
    /**
    * Add testimonial section
    *
    *@since Farmerpress 1.0.0
    */
    function farmerpress_add_testimonial_section() {
        $options = farmerpress_get_theme_options();
        // Check if testimonial is enabled on frontpage
        $testimonial_enable = apply_filters( 'farmerpress_section_status', true, 'testimonial_section_enable' );

        // if( !($options['home_layout'] == 'first-design')    ){
        //     $testimonial_enable = false;
        // }

        if ( true !== $testimonial_enable ) {
            return false;
        }
        // Get testimonial section details
        $section_details = array();
        $section_details = apply_filters( 'farmerpress_filter_testimonial_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render testimonial section now.
        farmerpress_render_testimonial_section( $section_details );
    }
endif;

if ( ! function_exists( 'farmerpress_get_testimonial_section_details' ) ) :
    /**
    * testimonial section details.
    *
    * @since Farmerpress 1.0.0
    * @param array $input testimonial section details.
    */
    function farmerpress_get_testimonial_section_details( $input ) {
        $options = farmerpress_get_theme_options();

        
        $content = array();

            $page_ids = array();
            $position = array();

            for ( $i = 1; $i <= 5; $i++ ) {
                if ( ! empty( $options['testimonial_content_page_' . $i] ) ) :
                    $page_ids[] = $options['testimonial_content_page_' . $i];
                    $position[] = ! empty( $options['testimonial_position_' . $i] ) ? $options['testimonial_position_' . $i] : '';
                endif;
            }
            
            $args = array(
                'post_type'         => 'page',
                'post__in'          => ( array ) $page_ids,
                'posts_per_page'    => 5,
                'orderby'           => 'post__in',
                );                    
           

        $query = new WP_Query( $args );
        $i = 0;
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['position']  = ! empty( $position[$i] ) ? $position[$i] : '';
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = farmerpress_trim_content( 20 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id() ) : get_template_directory_uri().'/assets/uploads/no-featured-image-590x650.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
  
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// testimonial section content details.
add_filter( 'farmerpress_filter_testimonial_section_details', 'farmerpress_get_testimonial_section_details' );


if ( ! function_exists( 'farmerpress_render_testimonial_section' ) ) :
  /**
   * Start testimonial section
   *
   * @return string testimonial content
   * @since Farmerpress 1.0.0
   *
   */
   function farmerpress_render_testimonial_section( $content_details = array() ) {
        $options = farmerpress_get_theme_options();
        if ( empty( $content_details ) ) { 
            return;
        } ?>
        <div id="testimonial-section" class="relative page-section same-background" >
            <div class="wrapper">
                
                    <div class="section-header">
                        <?php if ( ! empty( $options['testimonial_title'] ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $options['testimonial_title'] ); ?></h2>
                        <?php endif; ?>
                        <?php if ( ! empty( $options['testimonial_subtitle'] ) ) : ?>
                            <h3 class="section-subtitle"><?php echo esc_html( $options['testimonial_subtitle'] ); ?></h3>
                        <?php endif; ?>
                    </div><!-- .section-header -->
                    
                    <div class="testimonial-slider-nav">
                        <?php $i =1 ; foreach ($content_details as $content):?>
                            <article>
                                <?php if (!empty($content['image'])): ?>
                                    <img src="<?php echo esc_url($content['image']); ?>" alt="<?php echo esc_attr( $content['title'] ) ?>">
                                <?php endif ?>
                            </article>
                         <?php $i++; endforeach ?>
                        
                    </div><!-- .testimonial-slider-nav -->
                    <div class="testimonial-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": true, "arrows": false, "autoplay": false, "draggable": true, "fade": false }'>
                    <?php $i = 1 ; 
                    foreach ( $content_details as $content ) : 
                        $image = $content['image'] == '' ? get_template_directory_uri().'/assets/uploads/no-featured-image-590x650.jpg' : $content['image'] ;
                        $position = isset($options['testimonial_position_'.$i]) ? $options['testimonial_position_'.$i] : __(' Happy Client', 'farmerpress' );
                    ?>
                        <article >  
                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ) ; ?></p>
                            </div><!-- .entry-content -->
                            <div class="seperator"></div>
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?>
                                    </a>
                                </h2>
                                <?php if (!empty($position)): ?> 
                                <p> <?php echo esc_html( $position ) ; ?></p>
                                <?php endif ?>
                            </header>
                        </article>
                    <?php $i++; endforeach ?>
                </div><!-- .testimonial-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #testimonial-section -->
    <?php }
endif;
