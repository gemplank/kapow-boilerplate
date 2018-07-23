<?php
/**
 * The template for displaying the front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My Project
 */

get_header(); ?>

	<?php do_action( 'kapow_front_page_intro' ); ?>

	<main class="site-main">

		<div class="template-front-page">

			<?php do_action( 'kapow_before_main_content' );

			while ( have_posts() ) {

				the_post();

				get_template_part( 'template-parts/content', 'page-front' );
			}

			do_action( 'kapow_after_main_content' ); ?>

		</div>

	</main>

<?php
get_footer();
