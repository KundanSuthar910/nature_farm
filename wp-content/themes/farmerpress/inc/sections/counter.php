<?php
/**
 * Counter section
 *
 * This is the template for the content of counter section
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */
if ( ! function_exists( 'farmerpress_add_counter_section' ) ) :
    /**
    * Add counter section
    *
    *@since Farmerpress 1.0.0
    */
    function farmerpress_add_counter_section() {
    	$options = farmerpress_get_theme_options();
        // Check if counter is enabled on frontpage
        $counter_enable = apply_filters( 'farmerpress_section_status', true, 'counter_section_enable' );

        if ( ! $counter_enable ) {
            return false;
        }

        // Render counter section now.
        farmerpress_render_counter_section();
    }
endif;

if ( ! function_exists( 'farmerpress_render_counter_section' ) ) :
  /**
   * Start counter section
   *
   * @return string counter content
   * @since Farmerpress 1.0.0
   *
   */
   function farmerpress_render_counter_section() {
        $options = farmerpress_get_theme_options();
        $image = ( ! empty( $options['counter_image'] ) ) ? $options['counter_image'] : '' ;
        if ( $options['counter_count'] > 4 ) {
            $class = 4;
        } else {
            $class= $options['counter_count'];
        }
        ?>
            <div id="counter-section" class="relative page-section" style="background-image: url('<?php echo esc_url( $image ); ?>');">
                <!-- supports col-1, col-2, col-3, col-4 -->
                <div class="overlay"></div>
                <div class="wrapper">
                    <div class="section-content clear col-<?php echo esc_attr( $class ); ?>">

                        <?php for ( $i=1; $i <= $options['counter_count']; $i++ ) :  ?>

                            <article >
                                <?php if ( !empty( $options['counter_value_' . $i] ) ) { ?>
                                     <div class="counter-value">
                                        <h4><?php echo esc_html( $options['counter_value_' . $i ] ); ?> </h4>
                                    </div>
                                <?php } ?>
                                <header class="entry-header">
                                    <?php  if ( isset( $options['counter_text_' . $i] ) ) { ?>
                                            <h2 class="entry-title"><?php echo esc_html( $options['counter_text_' . $i ] ); ?></h2>
                                        <?php } ?>
                                        <?php  if ( isset( $options['counter_subtitle_' . $i] ) ) { ?>
                                            <p><?php echo esc_html( $options['counter_subtitle_' . $i ] ); ?></p>
                                        <?php } ?>
                                    
                                </header>
                            </article>

                        <?php endfor; ?>

                    </div>
                </div><!-- .wrapper -->
            </div><!-- #counter -->
        <?php
    }
endif;