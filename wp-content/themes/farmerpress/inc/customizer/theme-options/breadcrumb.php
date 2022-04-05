<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

$wp_customize->add_section( 'farmerpress_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','farmerpress' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'farmerpress' ),
	'section'          	=> 'farmerpress_breadcrumb',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'farmerpress_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'farmerpress' ),
	'active_callback' 	=> 'farmerpress_is_breadcrumb_enable',
	'section'          	=> 'farmerpress_breadcrumb',
	'type'				=> 'text'
) );
