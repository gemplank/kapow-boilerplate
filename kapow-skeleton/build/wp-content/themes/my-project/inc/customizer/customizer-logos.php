<?php
/**
 * Customizer - Logo Settings.
 *
 * @package My Project
 */

// Settings.
$wp_customize->add_setting( 'my_project_logo', array(
	'transport' => 'postMessage',
));

$wp_customize->add_setting( 'my_project_logo_retina', array(
	'transport' => 'postMessage',
));

// Section.
$wp_customize->add_section( 'my_project_logos', array(
	'title'    => __( 'Logos', 'my-project' ),
	'priority' => 10,
	'panel'    => 'kapow_theme_settings',
));

// Controls.
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'my_project_logo',
		array(
			'label'       => __( 'Site Logo' , 'my-project' ),
			'description' => __( 'Upload a custom logo for your site.' , 'my-project' ),
			'section'     => 'my_project_logos',
			'settings'    => 'my_project_logo',
			'priority'    => 10,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'my_project_logo_retina',
		array(
			'label'       => __( 'Site Logo (Retina)' , 'my-project' ),
			'description' => __( 'Upload a retina version (2x) version of your custom logo.' , 'my-project' ),
			'section'     => 'my_project_logos',
			'settings'    => 'my_project_logo_retina',
			'priority'    => 11,
		)
	)
);
