<?php
/**
 * Customizer - Mobile Settings.
 *
 * @package My Project
 */

// Settings.
$wp_customize->add_setting( 'my_project_mobile_chrome_colour', array(
	'transport' => 'postMessage',
));

// Section.
$wp_customize->add_section( 'my_project_mobile', array(
	'title'    => __( 'Mobile', 'my-project' ),
	'priority' => 11,
	'panel'    => 'kapow_theme_settings',
));

// Controls.
$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'my_project_mobile_chrome_colour',
		array(
			'label'       => __( 'Chrome Colour' , 'my-project' ),
			'description' => __( 'Select a colour to use for the Android Chrome theme.' , 'my-project' ),
			'section'     => 'my_project_mobile',
			'settings'    => 'my_project_mobile_chrome_colour',
			'priority'    => 10,
		)
	)
);
