<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'farmerpress_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','farmerpress' ),
	'description'       => esc_html__( 'Excerpt section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[blog_read_more_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_read_more_text'],
) );

$wp_customize->add_control( 'farmerpress_theme_options[blog_read_more_text]', array(
	'label'       		=> esc_html__( 'Blog Page Read More Button Text', 'farmerpress' ),
	'section'     		=> 'farmerpress_excerpt_section',
	'type'        		=> 'text',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'farmerpress_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'farmerpress_sanitize_number_range',
	'validate_callback' => 'farmerpress_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'farmerpress_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'farmerpress' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'farmerpress' ),
	'section'     		=> 'farmerpress_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );
