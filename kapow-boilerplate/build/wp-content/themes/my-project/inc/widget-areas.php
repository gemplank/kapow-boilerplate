<?php
/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @package My Project
 */

/**
 * Register sidebars for widgets.
 */
function kapow_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'my-project' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'kapow_widgets_init', 10 );
