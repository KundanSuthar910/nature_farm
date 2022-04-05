<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'farmerpress_pagination', array(
	'title'               => esc_html__('Pagination','farmerpress'),
	'description'         => esc_html__( 'Pagination section options.', 'farmerpress' ),
	'panel'               => 'farmerpress_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'farmerpress' ),
	'section'             => 'farmerpress_pagination',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'farmerpress_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'farmerpress_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'farmerpress' ),
	'section'             => 'farmerpress_pagination',
	'type'                => 'select',
	'choices'			  => farmerpress_pagination_options(),
	'active_callback'	  => 'farmerpress_is_pagination_enable',
) );
