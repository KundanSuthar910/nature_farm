<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'farmerpress_layout', array(
	'title'               => esc_html__('Layout','farmerpress'),
	'description'         => esc_html__( 'Layout section options.', 'farmerpress' ),
	'panel'               => 'farmerpress_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[site_layout]', array(
	'sanitize_callback'   => 'farmerpress_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Farmerpress_Custom_Radio_Image_Control ( $wp_customize, 'farmerpress_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'farmerpress' ),
	'section'             => 'farmerpress_layout',
	'choices'			  => farmerpress_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'farmerpress_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Farmerpress_Custom_Radio_Image_Control ( $wp_customize, 'farmerpress_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'farmerpress' ),
	'section'             => 'farmerpress_layout',
	'choices'			  => farmerpress_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'farmerpress_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Farmerpress_Custom_Radio_Image_Control ( $wp_customize, 'farmerpress_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'farmerpress' ),
	'section'             => 'farmerpress_layout',
	'choices'			  => farmerpress_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'farmerpress_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Farmerpress_Custom_Radio_Image_Control( $wp_customize, 'farmerpress_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'farmerpress' ),
	'section'             => 'farmerpress_layout',
	'choices'			  => farmerpress_sidebar_position(),
) ) );