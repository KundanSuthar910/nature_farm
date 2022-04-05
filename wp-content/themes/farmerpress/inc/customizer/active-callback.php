<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

/**
 * Check if Introduction  design section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */

if ( ! function_exists( 'farmerpress_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Farmerpress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function farmerpress_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'farmerpress_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'farmerpress_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Farmerpress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function farmerpress_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'farmerpress_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'farmerpress_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Farmerpress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function farmerpress_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'farmerpress_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'farmerpress_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Farmerpress 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function farmerpress_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

/**
 * Check if testimonial section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[testimonial_section_enable]' )->value() );
}

/**
 * Check if testimonial section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_subscription_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[subscription_section_enable]' )->value() );
}

/**
 * Check if slider section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[slider_section_enable]' )->value() );
}



//--------------Product CTA section------------------------//


/**
 * Check if PRoduct CTA section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[cta_section_enable]' )->value() );
}



//--------------Popular Product section------------------------//

/**
 * Check if popular_product section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_popular_product_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[popular_product_section_enable]' )->value() );
}



//--------------Services section------------------------//


/**
 * Check if services section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_services_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[services_section_enable]' )->value() );
}


//--------------Business About Us section------------------------//


/**
 * Check if Business About Us section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_about_us_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[about_us_section_enable]' )->value() );
}

//--------------Business counter section------------------------//

/**
 * Check if counter section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_counter_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[counter_section_enable]' )->value() );
}


//--------------Business Team section------------------------//

/**
 * Check if team section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_team_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[team_section_enable]' )->value() );
}


//--------------Gallery section------------------------//


/**
/**
 * Check if gallery section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_gallery_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[gallery_section_enable]' )->value() );
}


//--------------Benefits section------------------------//


/**
 * Check if Benefits section is enabled.
 *
 * @since Farmerpress 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function farmerpress_is_benefits_section_enable( $control ) {
	return ( $control->manager->get_setting( 'farmerpress_theme_options[benefits_section_enable]' )->value() );
}

