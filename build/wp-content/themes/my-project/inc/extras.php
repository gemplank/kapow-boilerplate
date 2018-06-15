<?php
/**
 * Theme specific functions that act independently of the theme templates.
 *
 * @package My Project
 */

/**
 * Add theme support for Jetpack Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function kapow_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'kapow_infinite_scroll_render',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'kapow_jetpack_setup', 10 );

/**
 * Custom render function for Jetpack Infinite Scroll.
 */
function kapow_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
}
