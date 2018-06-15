<?php
/**
 * Functional theme includes and global constants/variables.
 *
 * @package My Project
 */

// Constants.
define( 'KAPOW_ROOT', __FILE__ );

// Automatically import functional includes from the inc/ folder.
foreach ( glob( get_stylesheet_directory() . '/inc/*.php' ) as $filename ) {
	require_once $filename;
}
