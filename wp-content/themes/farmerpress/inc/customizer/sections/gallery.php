<?php
/**
 * gallery Section options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add gallery section
$wp_customize->add_section( 'farmerpress_gallery_section', array(
	'title'             => esc_html__( 'Gallery','farmerpress' ),
	'description'       => esc_html__( 'Gallery Section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_front_page_panel',
) );

// gallery content enable control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[gallery_section_enable]', array(
	'default'			=> 	$options['gallery_section_enable'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[gallery_section_enable]', array(
	'label'             => esc_html__( 'Gallery Section Enable', 'farmerpress' ),
	'section'           => 'farmerpress_gallery_section',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );


for ( $i = 1; $i <= 7; $i++ ) :
	// gallery pages drop down chooser control and setting
	$wp_customize->add_setting( 'farmerpress_theme_options[gallery_content_page_' . $i . ']', array(
		'sanitize_callback' => 'farmerpress_sanitize_page',
	) );

	$wp_customize->add_control( new Farmerpress_Dropdown_Chooser( $wp_customize, 'farmerpress_theme_options[gallery_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'farmerpress' ), $i ),
		'section'           => 'farmerpress_gallery_section',
		'choices'			=> farmerpress_page_choices(),
		'active_callback'	=> 'farmerpress_is_gallery_section_enable',
	) ) );

endfor;
