<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'farmerpress_single_post_section', array(
	'title'             => esc_html__( 'Single Post','farmerpress' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'farmerpress' ),
	'panel'             => 'farmerpress_theme_options_panel',
) );

// Tourableve date meta setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'farmerpress' ),
	'section'           => 'farmerpress_single_post_section',
	'on_off_label' 		=> farmerpress_hide_options(),
) ) );

// Tourableve author meta setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'farmerpress' ),
	'section'           => 'farmerpress_single_post_section',
	'on_off_label' 		=> farmerpress_hide_options(),
) ) );

// Tourableve author category setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'farmerpress' ),
	'section'           => 'farmerpress_single_post_section',
	'on_off_label' 		=> farmerpress_hide_options(),
) ) );

// Tourableve tag category setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'farmerpress' ),
	'section'           => 'farmerpress_single_post_section',
	'on_off_label' 		=> farmerpress_hide_options(),
) ) );
