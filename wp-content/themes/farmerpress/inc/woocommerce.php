<?php
/**
 * Farmerpress WooCommerce compatibility hooks.
 *
 * This is the template that includes all WooCommerce hooks to make the theme compatible with WooCommerce.
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description' ,10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' ,10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb' ,20 );

function farmerpress_before_main_content() {
	
	echo '<div id="inner-content-wrapper" class="wrapper page-section">';
}
add_action( 'woocommerce_before_main_content', 'farmerpress_before_main_content', 5 );

function farmerpress_after_main_content() {
	echo '</div>';
} 
add_action( 'woocommerce_sidebar', 'farmerpress_after_main_content', 20 );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'farmerpress_loop_columns');
if ( ! function_exists('farmerpress_loop_columns')) {
	/**
	 * Shop Page no. of column
	 *
	 * @since FarmerPress  Pro 1.0
	 *
	 */
	function farmerpress_loop_columns() {
		return 3; // 3 products per row
	}
}

// remove title
add_filter('woocommerce_show_page_title', 'farmerpress_hide_title' );
function farmerpress_hide_title() {
	return false;
}