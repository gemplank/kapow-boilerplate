<?php
/**
 * The Header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package My Project
 */

$logo          = get_theme_mod( 'kapow_logo' );
$logo_2x       = get_theme_mod( 'kapow_logo_retina' );
$chrome_colour = get_theme_mod( 'kapow_mobile_chrome_colour' );
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

	<?php
	// Set the theme accent colour used by Chrome on Android.
	if ( ! empty( $chrome_colour ) ) {
		echo '<meta name="theme-color" content="' . esc_attr( $chrome_colour ) . '">';
	}
	?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php do_action( 'kapow_before_wp_head' ); ?>

	<?php wp_head(); ?>

	<?php do_action( 'kapow_after_wp_head' ); ?>
</head>

<body <?php body_class(); ?>>

<a class="skip-link sr-only" href="#content"><?php esc_html_e( 'Skip to content' , 'my-project' ); ?></a>
<a class="skip-link sr-only" href="#site-navigation"><?php esc_html_e( 'Skip to navigation' , 'my-project' ); ?></a>

<div class="hfeed site">

	<?php do_action( 'kapow_before_header' ); ?>

	<header class="site-header" role="banner">

		<?php do_action( 'kapow_before_header_content' ); ?>

		<div class="site-identity">

			<?php
			if ( ! empty( $logo ) ) { ?>

				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img
						src="<?php echo esc_url( $logo ); ?>"
						<?php if ( ! empty( $logo_2x ) ) { ?>
							srcset="<?php echo esc_url( $logo_2x ); ?> 2x"
						<?php } ?>
						alt="<?php bloginfo( 'name' ); ?>"
					/>
				</a>

			<?php
			} elseif ( is_front_page() && is_home() ) { ?>

				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</h1>

			<?php
			} else { ?>

				<p class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?>
					</a>
				</p>

			<?php
			}
			$description = get_bloginfo( 'description' );

			if ( ! empty( $description ) ) {
				echo '<p class="site-description">' . esc_html( $description ) . '</p>';
			}
			?>

		</div>

		<nav id="site-navigation" class="site-navigation" role="navigation">

			<button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php esc_html_e( 'Main Menu' , 'my-project' ); ?>
				<?php kapow_get_icon( 'menu', 32, 32 ); ?>
			</button>

			<?php
			do_action( 'kapow_before_primary_nav' );

			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
				)
			);

			do_action( 'kapow_after_primary_nav' ); ?>

		</nav>

		<?php do_action( 'kapow_after_header_content' ); ?>

	</header>

	<?php do_action( 'kapow_after_header' ); ?>

	<div id="content" class="site-content">

		<?php do_action( 'kapow_before_main' ); ?>
