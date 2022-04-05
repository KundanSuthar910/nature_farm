<?php
/**
 * popular product section
 *
 * This is the template for the content of popular product section
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */
if ( ! function_exists( 'farmerpress_add_popular_product_section' ) ) :
    /**
    * Add popular_product section
    *
    *@since Farmerpress 1.0.0
    */
    function farmerpress_add_popular_product_section() {
        $options = farmerpress_get_theme_options();
        // Check if popular_product is enabled on frontpage
        $popular_product_enable = apply_filters( 'farmerpress_section_status', true, 'popular_product_section_enable' );
        if ( true !== $popular_product_enable ) {
            return false;
        }
        if ( !class_exists('WooCommerce') ) {
            return;
        }
        // Render popular_product section now.
        farmerpress_render_popular_product_section();
    }
endif;

if ( ! function_exists( 'farmerpress_render_popular_product_section' ) ) :
  /**
   * Start popular_product section
   *
   * @return string popular_product content
   * @since Farmerpress 1.0.0
   *
   */
   function farmerpress_render_popular_product_section() {
        $options = farmerpress_get_theme_options();
    
     ?>

         <div id="our-products" class="relative page-section same-background">
                <div class="wrapper">
                    <?php if (!empty( $options['popular_product_title'] ) || !empty( $options['popular_product_subtitle'] ) ): ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['popular_product_title'] ) ; ?></h2>
                         <h3 class="section-subtitle"><?php echo esc_html( $options['popular_product_subtitle'] ) ; ?></h3>
                    </div><!-- .section-header -->
                <?php endif ?>
                <?php if (!empty( $options['popular_product_des'] ) ): ?>
                    <div class="section-content">
                        <p><?php echo esc_html( $options['popular_product_des'] ) ; ?></p>
                    </div><!-- .section-content -->
                <?php endif; ?>
                    <div class="col-2 clear">
                       <?php for ( $i=1; $i <= 4; $i++ ) {
                       if ( ! empty( $options['popular_product_cat_' . $i] ) ) {
                            $product_cat =$options['popular_product_cat_' . $i ];
                        }
                        if ( ! empty( $options['popular_product_image_' . $i] ) ) {
                             $image =$options['popular_product_image_' . $i ];
                         }

                            if ( ! empty( $options['popular_product_cat_' . $i] ) ) :
                                 
                                $term_obj = get_term( $product_cat, '', OBJECT, 'raw' );
                                $cat_image = wp_get_attachment_url(get_term_meta($term_obj->term_id, 'thumbnail_id', true ));
                                $cat_name = $term_obj->name;
                                $cat_slug = $term_obj->slug;
                                $cat_des = $term_obj->description;
                                $cat_link = get_category_link( $options['popular_product_cat_'.$i] );
                            
                        ?> 
                            <article>
                                <div class="product-item-wrapper">
                                    <?php if ($cat_image): ?>
                                        <div class="featured-image">
                                            <a href="<?php echo esc_url($cat_link); ?>"><img src="<?php echo esc_url( $cat_image ); ?>" alt="<?php echo esc_html( $cat_name ); ?>"></a>
                                        </div><!-- .featured-image -->
                                    <?php endif; ?>
                                    <div class="entry-container">
                                        <?php if (!empty($cat_name)): ?>
                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html( $cat_name ); ?></a></h2>
                                            </header>
                                        <?php endif; ?>
                                        <?php if (!empty($cat_des)): ?>
                                            <div class="entry-content">
                                                <p><?php echo esc_html( $cat_des ); ?></p>
                                            </div><!-- .entry-content -->
                                        <?php endif ?>
                                        <ul>
                                            <?php 
                                                if (!empty($product_cat)) {

                                                    $args = array(
                                                    'post_type'         => 'product',
                                                    'posts_per_page'    => 4,
                                                    'tax_query'         => array(
                                                        array(
                                                            'taxonomy'  => 'product_cat',
                                                            'field'     => 'id',
                                                            'terms'     => $product_cat
                                                        )
                                                    ) );
                                             
                                             $query = new WP_Query( $args );
                                            if ( $query->have_posts() ) : 
                                                while ( $query->have_posts() ) : $query->the_post(); ?>
                                                    <li>
                                                        <h4 class="product-title"><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h4>
                                                        <?php $product_id= get_the_id(); ?>
                                                        <?php $terms = wp_get_post_terms( get_the_id(), 'product_tag' );
                                                            $j=1;
                                                            foreach($terms as $term){
                                                            $term_id = $term->term_id; // Product tag Id
                                                            $term_name = $term->name; // Product tag Name 
                                                            ?>
                                                            <?php if ($j==1): ?>
                                                                <span class="new-arrival"><?php echo esc_html($term_name); ?> </span>
                                                                <?php endif ?>
                                                            <?php $j++; } ?>
                                                        <span class="price">
                                                           <?php 
                                                                $product = new WC_Product( get_the_id() );
                                                                echo $product->get_price_html();
                                                            ?>
                                                        </span><!-- .price -->
                                                    </li>
                                                <?php endwhile; ?>
                                            <?php endif; }  ?>
                                        </ul>
                                    </div><!-- .entry-container -->
                                </div><!-- .product-item-wrapper -->
                            </article>
                        <?php endif;
                        } ?>
                    </div><!-- .col-2 -->
                </div><!-- .wrapper -->
            </div><!-- #our-products -->
    <?php }
endif;