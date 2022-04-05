<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

/**
 * farmerpress_footer_primary_content hook
 *
 * @hooked farmerpress_add_contact_section -  10
 *
 */
do_action( 'farmerpress_footer_primary_content' );

/**
 * farmerpress_content_end_action hook
 *
 * @hooked farmerpress_content_end -  10
 *
 */
do_action( 'farmerpress_content_end_action' );

/**
 * farmerpress_content_end_action hook
 *
 * @hooked farmerpress_footer_start -  10
 * @hooked farmerpress_Footer_Widgets->add_footer_widgets -  20
 * @hooked farmerpress_footer_site_info -  40
 * @hooked farmerpress_footer_end -  100
 *
 */
do_action( 'farmerpress_footer' );

/**
 * farmerpress_page_end_action hook
 *
 * @hooked farmerpress_page_end -  10
 *
 */
do_action( 'farmerpress_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
