<?php
/**
 * Customizer API Registration.
 *
 * @link https://developer.wordpress.org/themes/customize-api/
 *
 * @package My Project
 */

/**
 * Register or modify Customizer settings/sections/panels/controls.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kapow_customize_register( $wp_customize ) {

	// Add our top level theme settings panel.
	$wp_customize->add_panel( 'kapow_theme_settings', array(
		'title'    => __( 'Theme Settings', 'my-project' ),
		'priority' => 10,
	));

	// Automatically require any partials found in the customizer/ directory
	// that begin with `customizer-` in the filename.
	foreach ( glob( get_stylesheet_directory() . '/inc/customizer/customizer-*.php' ) as $filename ) {
		require_once $filename;
	}

	// Add postMessage support for site title and description for the Theme Customizer.
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'kapow_customize_register', 10 );
