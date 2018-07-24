<?php
/**
 * Theme setup.
 *
 * @link https://developer.wordpress.org/reference/hooks/after_setup_theme/
 * @link https://developer.wordpress.org/reference/functions/add_theme_support/
 *
 * @package My Project
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kapow_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on My Project, use a find and replace
	 * to change 'my-project' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'my-project', get_stylesheet_directory() . '/languages' );

	/*
	 * Register navigation menus.
	 */
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'my-project' ),
		'footer'  => esc_html__( 'Footer Menu', 'my-project' ),
	) );

	/*
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Enable support Selective Refresh in the Customizer.
	 */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
add_action( 'after_setup_theme', 'kapow_theme_setup', 10 );
