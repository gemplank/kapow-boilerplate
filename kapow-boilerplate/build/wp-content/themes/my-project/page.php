<?php
/**
 * The template for displaying all pages (that is, 'page' post type posts).

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My Project
 */

get_header();
?>

<div class="template-page">

	<main class="site-main">

		<?php
		do_action( 'kapow_before_main_content' );

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', 'page' );
		}

		do_action( 'kapow_after_main_content' );
		?>

	</main>

	<?php get_sidebar(); ?>

</div>

<?php
get_footer();
