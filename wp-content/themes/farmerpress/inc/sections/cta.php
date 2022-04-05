<?php
/**
 * Introduction section
 *
 * This is the template for the content of cta section
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */
if ( ! function_exists( 'farmerpress_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Farmerpress 1.0.0
    */
    function farmerpress_add_cta_section() {
        $options = farmerpress_get_theme_options();
        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'farmerpress_section_status', true, 'cta_section_enable' );

        // if( !($options['home_layout'] == 'product')    ){
        //     $cta_enable = false;
        // }

        if ( true !== $cta_enable ) {
            return false;
        }
        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'farmerpress_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render cta section now.
        farmerpress_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'farmerpress_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Farmerpress 1.0.0
    * @param array $input cta section details.
    */
    function farmerpress_get_cta_section_details( $input ) {
        $options = farmerpress_get_theme_options();
        
        $content = array();
     
        $page_id = ! empty( $options['cta_content_page'] ) ? $options['cta_content_page'] : '';
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
// cta section content details.
add_filter( 'farmerpress_filter_cta_section_details', 'farmerpress_get_cta_section_details' );


if ( ! function_exists( 'farmerpress_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Farmerpress 1.0.0
   *
   */
   function farmerpress_render_cta_section( $content_details = array() ) {
        $options = farmerpress_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <?php foreach ( $content_details as $content ) :  ?>
            <div id="call-to-action"  class="relative page-section" style="background-image:url(<?php echo esc_url( $content['image'] ); ?>)">
                <div class="wrapper">
                   
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?>.</h2>
                    </div><!-- .section-header -->
                    

                    <div class="entry-content">
                        <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                    </div><!-- .section-content -->

                    <div class="read-more">
                        <?php if ( !empty( $options['cta_btn_label'] ) ) : ?>
                            <a href="<?php echo esc_url($content['url']) ?>" class="btn btn-first"><?php echo esc_html($options['cta_btn_label']) ?></a>
                        <?php  endif; ?>
                    </div><!-- .read-more -->
                </div><!-- .wrapper -->
            </div><!-- #cta -->
        <?php endforeach;?>      
<?php    }
endif;