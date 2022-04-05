<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'farmerpress_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'farmerpress' ),
		'priority'   			=> 900,
		'panel'      			=> 'farmerpress_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'farmerpress_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'farmerpress_santize_allow_tag',
		'transport'				=> 'refresh',
	)
);
$wp_customize->add_control( 'farmerpress_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'farmerpress' ),
		'section'    			=> 'farmerpress_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[copyright_text]', array(
		'selector'            => '.site-info .wrapper span',
		'settings'            => 'farmerpress_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'farmerpress_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'farmerpress_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'farmerpress' ),
		'section'    			=> 'farmerpress_section_footer',
		'on_off_label' 		=> farmerpress_switch_options(),
    )
) );

$wp_customize->add_setting( 'farmerpress_theme_options[footer_social_enable]', array(
	'default'			=> 	$options['footer_social_enable'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[footer_social_enable]', array(
	'label'             => esc_html__( 'Social Menu Enable', 'farmerpress' ),
	'section'           => 'farmerpress_section_footer',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );

