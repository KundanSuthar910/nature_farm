<?php
/**
 * Team Section options
 *
 * @package Theme Palace
 * @subpackage Farmerpress
 * @since Farmerpress 1.0.0
 */

// Add Team section
$wp_customize->add_section( 'farmerpress_team_section', array(
	'title'             => esc_html__( 'Teams','farmerpress' ),
	'description'       => esc_html__( 'Teams Section options.', 'farmerpress' ),
	'panel'             => 'farmerpress_front_page_panel',
) );

// Team content enable control and setting
$wp_customize->add_setting( 'farmerpress_theme_options[team_section_enable]', array(
	'default'			=> 	$options['team_section_enable'],
	'sanitize_callback' => 'farmerpress_sanitize_switch_control',
) );

$wp_customize->add_control( new Farmerpress_Switch_Control( $wp_customize, 'farmerpress_theme_options[team_section_enable]', array(
	'label'             => esc_html__( 'Team Section Enable', 'farmerpress' ),
	'section'           => 'farmerpress_team_section',
	'on_off_label' 		=> farmerpress_switch_options(),
) ) );

// team title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[team_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['team_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[team_title]', array(
	'label'           	=> esc_html__( 'Title', 'farmerpress' ),
	'section'        	=> 'farmerpress_team_section',
	'active_callback' 	=> 'farmerpress_is_team_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[team_title]', array(
		'selector'            => '#our-team h2.section-title',
		'settings'            => 'farmerpress_theme_options[team_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_team_title_partial',
    ) );
}

// team title setting and control
$wp_customize->add_setting( 'farmerpress_theme_options[team_subtitle]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['team_subtitle'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'farmerpress_theme_options[team_subtitle]', array(
	'label'           	=> esc_html__( 'Sub Title', 'farmerpress' ),
	'section'        	=> 'farmerpress_team_section',
	'active_callback' 	=> 'farmerpress_is_team_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'farmerpress_theme_options[team_subtitle]', array(
		'selector'            => '#our-team .section-header h3',
		'settings'            => 'farmerpress_theme_options[team_subtitle]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'farmerpress_team_subtitle_partial',
    ) );
}



for ( $i = 1; $i <= 4; $i++ ) :

	// team pages drop down chooser control and setting
	$wp_customize->add_setting( 'farmerpress_theme_options[team_content_page_' . $i . ']', array(
		'sanitize_callback' => 'farmerpress_sanitize_page',
	) );

	$wp_customize->add_control( new Farmerpress_Dropdown_Chooser( $wp_customize, 'farmerpress_theme_options[team_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'farmerpress' ), $i ),
		'section'           => 'farmerpress_team_section',
		'choices'			=> farmerpress_page_choices(),
		'active_callback'	=> 'farmerpress_is_team_section_enable',
	) ) );


	// team custom content
	$wp_customize->add_setting( 'farmerpress_theme_options[team_content_custom_position_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'farmerpress_theme_options[team_content_custom_position_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Position %d', 'farmerpress' ), $i ),
		'section'           => 'farmerpress_team_section',
		'active_callback'	=> 'farmerpress_is_team_section_enable',
	) );

	// team social
	$wp_customize->add_setting( 'farmerpress_theme_options[team_social_' . $i. ']', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new Farmerpress_Multi_Input_Custom_Control( $wp_customize, 'farmerpress_theme_options[team_social_' . $i. ']', array(
		'label'             => esc_html__( 'Social ', 'farmerpress' ),
		'button_text'       => esc_html__( 'Add social.', 'farmerpress' ),
		'section'           => 'farmerpress_team_section',
		'active_callback' 	=> 'farmerpress_is_team_section_enable',
	) ) );

	// Separator setting
	$wp_customize->add_setting( 'farmerpress_theme_options[team_separator_' . $i . ']', array(
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( new Farmerpress_Note_Control( $wp_customize, 'farmerpress_theme_options[team_separator_' . $i . ']', array(
		'section'           => 'farmerpress_team_section',
		'active_callback'	=> 'farmerpress_is_team_section_enable',
		'type'				=> 'custom-html',
	) ) );
endfor;

