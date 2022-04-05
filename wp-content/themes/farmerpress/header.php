<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Farmerpress
	 * @since Farmerpress 1.0.0
	 */

	/**
	 * farmerpress_doctype hook
	 *
	 * @hooked farmerpress_doctype -  10
	 *
	 */
	do_action( 'farmerpress_doctype' );

?>
<head>
<?php
	/**
	 * farmerpress_before_wp_head hook
	 *
	 * @hooked farmerpress_head -  10
	 *
	 */
	do_action( 'farmerpress_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * farmerpress_page_start_action hook
	 *
	 * @hooked farmerpress_page_start -  10
	 *
	 */
	do_action( 'farmerpress_page_start_action' ); 

	/**
	 * farmerpress_loader_action hook
	 *
	 * @hooked farmerpress_loader -  10
	 *
	 */
	do_action( 'farmerpress_before_header' );

	/**
	 * farmerpress_header_action hook
	 *
	 * @hooked farmerpress_header_start -  10
	 * @hooked farmerpress_site_branding -  20
	 * @hooked farmerpress_site_navigation -  30
	 * @hooked farmerpress_header_end -  50
	 *
	 */
	do_action( 'farmerpress_header_action' );

	/**
	 * farmerpress_content_start_action hook
	 *
	 * @hooked farmerpress_content_start -  10
	 *
	 */
	do_action( 'farmerpress_content_start_action' );

	/**
	 * farmerpress_header_image_action hook
	 *
	 * @hooked farmerpress_header_image -  10
	 *
	 */
	do_action( 'farmerpress_header_image_action' );

    if ( farmerpress_is_frontpage() ) {
    	$options = farmerpress_get_theme_options();
    
		$sections = array( 'slider', 'about_us','popular_product', 'services', 'gallery', 'benefits', 'counter','team','testimonial','cta' );
    	
		foreach ( $sections as $section ) {
			add_action( 'farmerpress_primary_content', 'farmerpress_add_'. $section .'_section' );
		}
		do_action( 'farmerpress_primary_content' );
	}