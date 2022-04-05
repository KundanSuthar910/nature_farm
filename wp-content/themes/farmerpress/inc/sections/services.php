<?php
/**
 * Services section
 *
 * This is the template for the content of services section
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */
if ( ! function_exists( 'farmerpress_add_services_section' ) ) :
    /**
    * Add services section
    *
    *@since Farmerpress 1.0.0
    */
    function farmerpress_add_services_section() {
    	$options = farmerpress_get_theme_options();
        // Check if services is enabled on frontpage
        $services_enable = apply_filters( 'farmerpress_section_status', true, 'services_section_enable' );

        if ( true !== $services_enable ) {
            return false;
        }
        // Get services section details
        $section_details = array();
        $section_details = apply_filters( 'farmerpress_filter_services_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render services section now.
        farmerpress_render_services_section( $section_details );
    }
endif;

if ( ! function_exists( 'farmerpress_get_services_section_details' ) ) :
    /**
    * services section details.
    *
    * @since Farmerpress 1.0.0
    * @param array $input services section details.
    */
    function farmerpress_get_services_section_details( $input ) {
        $options = farmerpress_get_theme_options();
        
        $content = array();       	

        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['services_content_page_' . $i] ) )
                $page_ids[] = $options['services_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    
  
        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['content']   = farmerpress_trim_content( 25 );

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
// services section content details.
add_filter( 'farmerpress_filter_services_section_details', 'farmerpress_get_services_section_details' );


if ( ! function_exists( 'farmerpress_render_services_section' ) ) :
  /**
   * Start services section
   *
   * @return string services content
   * @since Farmerpress 1.0.0
   *
   */
   function farmerpress_render_services_section( $content_details = array() ) {
        $options = farmerpress_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
       <div id="our-services" class="relative front-service page-section" style="background-image: url('<?php echo esc_url( $options['services_background_image'] ); ?>');">
                <div class="wrapper">
                    
                    <div class="section-header">
                        <?php if ( ! empty( $options['services_title'] ) ) : ?>
                            <h2 class="section-title"><?php echo esc_html( $options['services_title'] ); ?></h2>
                        <?php endif; ?>
                        <?php if ( ! empty( $options['services_description'] ) ) : ?>
                            <h3 class="section-subtitle"><?php echo wp_kses_post( $options['services_description'] ); ?></h3>
                        <?php endif; ?>
                    </div><!-- .section-header -->
                  
                    <div class=" section-content col-3 clear">
                        <?php $i =1 ; foreach ($content_details as $content): 
                        $icon    = isset($options['services_content_icon_'.$i]) ? $options['services_content_icon_'.$i] : 'fa-angellist';
                        ?>
                            <article>
                               
                                <?php if ( $icon !== '' ): ?>
                                    
                                    <div class="service-icon">
                                        <a href="<?php echo esc_url( $content['url'] ) ; ?>"><i class="fa <?php echo esc_attr( $icon ) ; ?>"></i></a>
                                    </div><!-- .service-icon -->
                                   
                                   
                                <?php endif ?>
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?></a></h2> 
                                </header>
                                 <div class="entry-content">
                                    <p><?php echo esc_html( $content['content'] ) ; ?></p>
                                </div><!-- .entry-content -->
                               
                            </article>
                        <?php $i++; endforeach ?>
                       
                    </div><!-- .col-3 -->
                </div><!-- .wrapper -->
            </div><!-- #our-servicess -->
        
    <?php }
endif;