<?php do_action( 'kapow_before_header' ); ?>

<header class="site-header" role="banner">

	<div class="site-header__wrap">
	<?php do_action( 'kapow_before_header_content' ); ?>

		<div class="site-header__row">

			<div class="site-header__logo">

				<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

					LOGO

				</a>

			</div>

			<div class="site-header__menu-toggle">

				<button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">

					<?php kapow_get_icon( 'menu-icon', 40, 40 ); ?>

				</button>

			</div>

			<div class="site-header__navigation">

				<nav id="header-navigation" class="header-navigation" role="navigation">

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

			</div>

		</div>

	<?php do_action( 'kapow_after_header_content' ); ?>
	</div>

</header>

<?php do_action( 'kapow_after_header' ); ?>
