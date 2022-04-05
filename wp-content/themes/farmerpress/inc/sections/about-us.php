<?php
/**
 * Product Zoom section
 *
 * This is the template for the content of about_us section
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */
if ( ! function_exists( 'farmerpress_add_about_us_section' ) ) :
    /**
    * Add about_us section
    *
    *@since Farmerpress 1.0.0
    */
    function farmerpress_add_about_us_section() {
        $options = farmerpress_get_theme_options();
        // Check if about_us is enabled on frontpage
        $about_us_enable = apply_filters( 'farmerpress_section_status', true, 'about_us_section_enable' );

        if ( true !== $about_us_enable ) {
            return false;
        }
        // Get about_us section details
        $section_details = array();
        $section_details = apply_filters( 'farmerpress_filter_about_us_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about_us section now.
        farmerpress_render_about_us_section( $section_details );
    }
endif;

if ( ! function_exists( 'farmerpress_get_about_us_section_details' ) ) :
    /**
    * about_us section details.
    *
    * @since Farmerpress 1.0.0
    * @param array $input about_us section details.
    */
    function farmerpress_get_about_us_section_details( $input ) {
        $options = farmerpress_get_theme_options();
        
        $content = array();

        $page_id = ! empty( $options['about_us_content_page'] ) ? $options['about_us_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    
           
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = farmerpress_trim_content( 40 );
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
// about_us section content details.
add_filter( 'farmerpress_filter_about_us_section_details', 'farmerpress_get_about_us_section_details' );


if ( ! function_exists( 'farmerpress_render_about_us_section' ) ) :
  /**
   * Start about_us section
   *
   * @return string about_us content
   * @since Farmerpress 1.0.0
   *
   */
   function farmerpress_render_about_us_section( $content_details = array() ) {
        $options = farmerpress_get_theme_options();


        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="about-us" class="relative page-section same-background">
            <div class="wrapper">
                <?php foreach ( $content_details as $content ) :  ?>
                    <article class="<?php echo ! empty( $content['image'] ) ? 'has-post-thumbnail' : 'no-featured-image'; ?>" >
                        <?php if (! empty( $content['image'] ) ) : ?>
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ) ?>"></a>
                            </div>
                        <?php endif ?>

                        <div class="entry-container">
                            <header class="entry-header">
                                <?php if (! empty( $content['title'] ) ): ?>
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                <?php endif ?>

                                <?php if (! empty( $options['about_us_subtitle'] ) ): ?>
                                    <h3 class="section-subtitle"><?php echo esc_html( $options['about_us_subtitle'] ) ?></h3>
                                <?php endif ?>
                                    
                            </header>

                            <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>

                                <?php if ( !empty( $options['about_us_btn_label'] )  ) : ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-fill" > <?php echo esc_html( $options['about_us_btn_label'] ) ?>                                  
                                        </a>
                                    </div>
                                <?php endif; ?>
                        </div><!-- .entry-container -->
                    </article>
                <?php endforeach;?>
            </div><!-- .wrapper -->
        </div><!-- #about-us -->      
<?php    }
endif;