<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function farmerpress_body_classes( $classes ) {
	$options = farmerpress_get_theme_options();

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}// Adds a class of hfeed to non-singular pages.

	$classes[] = 'absolute-header';	

	if ($options['gallery_section_enable']==true ) {
		$classes[] = 'gallery-section-enabled';	
	}




	// Add a class for layout
	$classes[] = esc_attr( $options['site_layout'] );

	// Add a class for sidebar
	$sidebar_position = farmerpress_layout();
	$sidebar = 'sidebar-1';
	if ( is_singular() || is_home() ) {
		$id = ( is_home() && ! is_front_page() ) ? get_option( 'page_for_posts' ) : get_the_id();
	  	$sidebar = get_post_meta( $id, 'farmerpress-selected-sidebar', true );
	  	$sidebar = ! empty( $sidebar ) ? $sidebar : 'sidebar-1';
	}
	
	if ( class_exists( 'WooCommerce' ) && ( is_shop() || is_product_category() || is_product_tag()|| is_product()) && ! is_active_sidebar('woocommerce-sidebar') ) {
		$classes[] = 'no-sidebar';
	} elseif ( is_active_sidebar( $sidebar ) ) {
		$classes[] = esc_attr( $sidebar_position );
	} else {
		$classes[] = 'no-sidebar';
	}

	if ( (class_exists('WooCommerce') &&( is_woocommerce()) || is_front_page() )) {
		$classes[]		= 'woocommerce';
	}
	return $classes;
}
add_filter( 'body_class', 'farmerpress_body_classes' );
