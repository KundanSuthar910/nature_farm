<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Farmerpress
* @since Farmerpress 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'farmerpress_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'farmerpress_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'farmerpress' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'farmerpress' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
	'active_callback' => 'farmerpress_is_static_homepage_enable',
) );