<?php
/**
 * The Header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package My Project
 */

?>
<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8 ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9 ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>
<html class="no-js ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php do_action( 'kapow_before_wp_head' ); ?>

	<?php wp_head(); ?>

	<?php do_action( 'kapow_after_wp_head' ); ?>
</head>

<body <?php body_class(); ?>>

<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content' , 'my-project' ); ?></a>
<a class="skip-link sr-only" href="#site-navigation"><?php esc_html_e( 'Skip to navigation' , 'my-project' ); ?></a>

<div class="hfeed site-container">

	<?php get_template_part( 'template-parts/site-header' ); ?>

	<div id="content" class="site-content">

		<?php do_action( 'kapow_before_main' ); ?>
