<?php
/**
 * Enqueue script and style assets.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_scripts/
 * @link https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
 * @link https://developer.wordpress.org/reference/hooks/customize_preview_init/
 *
 * @package My Project
 */

// Setup variables.
$debug_mode   = false;
$asset_suffix = '.min';

// Check if WordPress is in debug mode, if it is then we do not want to
// load the minified assets.
if ( defined( 'WP_DEBUG' ) && true === WP_DEBUG ) {
	$debug_mode   = true;
	$asset_suffix = '';
}

/**
 * Enqueue assets for the front-end.
 */
function kapow_enqueue_assets() {

	global $asset_suffix;

	// Header JS.
	$header_js_url  = get_stylesheet_directory_uri() . '/assets/js/header' . $asset_suffix . '.js';
	$header_js_path = dirname( MY_PROJECT_THEME_ROOT ) . '/assets/js/header' . $asset_suffix . '.js';

	wp_enqueue_script(
		'my-project-header-js',
		$header_js_url,
		array(),
		filemtime( $header_js_path ),
		true
	);

	// Footer JS.
	$footer_js_url  = get_stylesheet_directory_uri() . '/assets/js/footer' . $asset_suffix . '.js';
	$footer_js_path = dirname( MY_PROJECT_THEME_ROOT ) . '/assets/js/footer' . $asset_suffix . '.js';

	wp_enqueue_script(
		'my-project-footer-js',
		$footer_js_url,
		array( 'jquery' ),
		filemtime( $footer_js_path ),
		true
	);

	// Comments JS.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Legacy IE JS in the header.
	$header_ie_js_url  = get_stylesheet_directory_uri() . '/assets/js/header_ie' . $asset_suffix . '.js';
	$header_ie_js_path = dirname( MY_PROJECT_THEME_ROOT ) . '/assets/js/header_ie' . $asset_suffix . '.js';

	wp_enqueue_script(
		'my-project-ie-polyfills',
		$header_ie_js_url,
		array(),
		filemtime( $header_ie_js_path ),
		true
	);
	wp_script_add_data( 'my-project-ie-polyfills', 'conditional', 'lt IE 9' );

	// Stylesheet.
	$my_project_style_url  = get_stylesheet_uri();
	$my_project_style_path = dirname( MY_PROJECT_THEME_ROOT ) . '/style.css';

	wp_enqueue_style(
		'my-project-style',
		$my_project_style_url,
		array(),
		filemtime( $my_project_style_path )
	);
}
add_action( 'wp_enqueue_scripts', 'kapow_enqueue_assets', 10 );

/**
 * Enqueue assets for the admin area.
 */
function kapow_enqueue_admin_assets() {

	global $asset_suffix;

	// Admin stylesheet.
	$admin_style_url  = get_stylesheet_directory_uri() . '/assets/css/admin' . $asset_suffix . '.css';
	$admin_style_path = dirname( MY_PROJECT_THEME_ROOT ) . '/assets/css/admin' . $asset_suffix . '.css';
	wp_enqueue_script(
		'my-project-admin-style',
		$admin_style_url,
		array(),
		filemtime( $admin_style_path )
	);

	// Editor stylesheet.
	$editor_css_url  = get_stylesheet_directory_uri() . '/assets/css/editor' . $asset_suffix . '.css';
	$editor_css_path = dirname( MY_PROJECT_THEME_ROOT ) . '/assets/css/editor' . $asset_suffix . '.css';
	add_editor_style( $editor_css_url . '?v=' . filemtime( $editor_css_path ) );
}
add_action( 'admin_enqueue_scripts', 'kapow_enqueue_admin_assets', 10 );

/**
 * Enqueue JS handlers to make the Customizer
 * live preview reload changes asynchronously.
 */
function kapow_enqueue_customize_preview_js() {

	global $asset_suffix;

	$live_preview_js_url  = get_stylesheet_directory_uri() . '/assets/js/customizer' . $asset_suffix . '.js';
	$live_preview_js_path = dirname( MY_PROJECT_THEME_ROOT ) . '/assets/js/customizer' . $asset_suffix . '.js';

	wp_enqueue_script(
		'my-project-customizer',
		$live_preview_js_url,
		array( 'customize-preview' ),
		filemtime( $live_preview_js_path ),
		true
	);
}
add_action( 'customize_preview_init', 'kapow_enqueue_customize_preview_js', 10 );
