<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package My Project
 */

get_header(); ?>

	<main class="site-main">

	<?php do_action( 'kapow_before_main_content' );

	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content', 'single' );

		the_post_navigation();

		// If comments are open or we have at least one comment,
		// load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	}

	do_action( 'kapow_after_main_content' ); ?>

	</main>

<?php
get_sidebar();
get_footer();
