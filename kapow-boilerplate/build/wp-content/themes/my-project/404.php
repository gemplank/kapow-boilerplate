<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://developer.wordpress.org/themes/functionality/404-pages/
 *
 * @package My Project
 */

get_header(); ?>

	<main class="site-main">

		<?php do_action( 'kapow_before_main_content' ); ?>

		<section class="error-404 not-found" aria-labelledby="not-found-heading">

			<header class="page-header">

				<h1 id="not-found-heading" class="page-title">
					<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'my-project' ); ?>
				</h1>

			</header>

			<div class="page-content">

				<?php do_action( 'kapow_before_post_content' ); ?>

				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'my-project' ); ?></p>

				<?php
				get_search_form();

				do_action( 'kapow_after_post_content' );
				?>

			</div>

		</section>

		<?php do_action( 'kapow_after_main_content' ); ?>

	</main>

<?php
get_footer();
