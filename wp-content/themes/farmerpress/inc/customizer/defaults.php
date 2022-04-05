<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 * @return array An array of default values
 */

function farmerpress_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$farmerpress_default_options = array(
		// Color Options
		'header_title_color'			=> '#fff',
		'header_tagline_color'			=> '#fff',
		'header_txt_logo_extra'			=> 'show-all',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'blog_read_more_text'           => esc_html__( 'Read More', 'farmerpress' ),
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'farmerpress' ), '[the-year]', '[site-link]' ),
		'footer_social_enable'			=> true,
		'scroll_top_visible'        	=> true,
		'footer_menu_enable'		    => true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,



		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'farmerpress' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,
		'hide_author'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		'nav_search_enable'				=> true,
		'nav_search_enable'				=> true,

		// slider section 
		'slider_section_enable'			=> false,
		'slider_subtitle'				=> esc_html__( 'Back To', 'farmerpress' ),
		'slider_btn_label'				=> esc_html__( 'Discover Now', 'farmerpress' ),
		
		// about_us section
		'about_us_section_enable'		=> false,
		'about_us_subtitle'				=> esc_html__( 'We have developed a new yield farming tech & we want to explain a few concepts.', 'farmerpress' ),
		'about_us_btn_label'			=> esc_html__( 'Read More', 'farmerpress' ),
		
		//services section
		'services_section_enable'		=> false,
		'services_title'				=> esc_html__( 'Our Services', 'farmerpress' ),
		'services_description'			=> esc_html__( 'Feel our hospitality & services towards you', 'farmerpress' ),
		
		//gallery section
		'gallery_section_enable'		=> false,
		'gallery_content_type'			=> 'page',
		'gallery_count'					=> 3,
		
		// benefits section
		'benefits_section_enable'			=> false,
		'benefits_btn_label'				=> esc_html__( 'Read More', 'farmerpress' ),
		'benefits_title'					=> esc_html__( 'The Future of Farming!', 'farmerpress' ),
		'benefits_subtitle'					=> esc_html__( 'We have developed a new yield farming tech & we want to explain a few concepts.', 'farmerpress' ),
		
		// team
		'team_section_enable'			=> false,
		'team_title'					=> esc_html__( 'Our Team', 'farmerpress' ),
		'team_subtitle'					=> esc_html__( 'We have a very professional farmers for better farming', 'farmerpress' ),
		
		// testimonial
		'testimonial_section_enable'		=> false,
		'testimonial_subtitle'				=> esc_html__( 'What our clients says about us!!', 'farmerpress' ),
		'testimonial_title'					=> esc_html__( 'Latest Testimonials', 'farmerpress' ),
		
		
		// product_layout_cta 
		'cta_section_enable'			=> false,
		'cta_btn_label'					=> esc_html__( 'Read More', 'farmerpress' ),
		'cta_subtitle'					=> esc_html__( 'Need More features?', 'farmerpress' ),
		'alt_cta_btn_label'				=> esc_html__( 'Call To Action', 'farmerpress' ),
		'cta_image'						=> get_template_directory_uri().'/assets/uploads/cta-bg.jpg',
		
	
		// popular section
		'popular_product_section_enable'	=> false,
		'popular_product_count'				=> 2,
		'popular_product_list_count'		=> 4,
		'popular_product_title'				=> esc_html__( 'Our Products', 'farmerpress' ),
		'popular_product_subtitle'			=> esc_html__( 'Discover our various products and services', 'farmerpress' ),
		'popular_product_des'				=> esc_html__( 'When we started with iearn, the options were simplistic, you had Aave, Compound, Dydx, and Fulcrum. Each offered lending markets for different assets. This was a good time.', 'farmerpress' ),		

		// counter
		'counter_section_enable'		=> false,
		'counter_count'					=> 4,



	);

	$output = apply_filters( 'farmerpress_default_theme_options', $farmerpress_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}