<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */

function farmerpress_product_choices() {
    $full_product_list = array();
    $product_id = array();
    $loop = new WP_Query(array('post_type' => array('product', 'product_variation'), 'posts_per_page' => -1));
    while ($loop->have_posts()) : $loop->the_post();
        $product_id[] = get_the_id();
    endwhile;
    wp_reset_postdata();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'farmerpress' );
    foreach ( $product_id  as $id ) {
        $choices[ $id ] = get_the_title( $id );
    }
    return  $choices;
}

if ( ! function_exists( 'farmerpress_get_woo_product_cat' ) ) {
    /**
     * Get product category listing
     */
    function farmerpress_get_woo_product_cat() {
        $args = array(
            'taxonomy'   => 'product_cat',
            'orderby'    => 'name',
            'order'      => 'asc',
            'hide_empty' => false,
        );
         
        $choices = array( '' => esc_html__( '--Select--', 'farmerpress' ) );
        $product_cats = get_terms( $args );
        foreach ( $product_cats as $product_cat ) {
            $id = $product_cat->term_id;
            $title = $product_cat->name;
            $choices[ $id ] = $title;
        }
        return $choices;
    }
}

function farmerpress_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'farmerpress' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function farmerpress_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'farmerpress' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}




if ( ! function_exists( 'farmerpress_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function farmerpress_selected_sidebar() {
        $farmerpress_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'farmerpress' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'farmerpress' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'farmerpress' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'farmerpress' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'farmerpress' ),
        );

        $output = apply_filters( 'farmerpress_selected_sidebar', $farmerpress_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'farmerpress_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function farmerpress_site_layout() {
        $farmerpress_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'farmerpress_site_layout', $farmerpress_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'farmerpress_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function farmerpress_global_sidebar_position() {
        $farmerpress_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'farmerpress_global_sidebar_position', $farmerpress_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'farmerpress_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function farmerpress_sidebar_position() {
        $farmerpress_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'farmerpress_sidebar_position', $farmerpress_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'farmerpress_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function farmerpress_pagination_options() {
        $farmerpress_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'farmerpress' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'farmerpress' ),
        );

        $output = apply_filters( 'farmerpress_pagination_options', $farmerpress_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'farmerpress_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function farmerpress_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'farmerpress' ),
            'off'       => esc_html__( 'Disable', 'farmerpress' )
        );
        return apply_filters( 'farmerpress_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'farmerpress_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function farmerpress_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'farmerpress' ),
            'off'       => esc_html__( 'No', 'farmerpress' )
        );
        return apply_filters( 'farmerpress_hide_options', $arr );
    }
endif;

