<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'farmerpress_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','farmerpress' ),
	'description'       => esc_html__( 'Archive section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'farmerpress_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'farmerpress' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'farmerpress' ),
	'section'           => 'farmerpress_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'farmerpress_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'farmerpress' ),
	'section'           => 'farmerpress_archive_section',
	'on_off_label' 		=> farmerpress_hide_options(),
) ) );

// Archive category setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'farmerpress' ),
	'section'           => 'farmerpress_archive_section',
	'on_off_label' 		=> farmerpress_hide_options(),
) ) );
