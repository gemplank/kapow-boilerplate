<?php
/**
 * Template part for displaying page content in front-page.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My Project
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

	<?php do_action( 'kapow_front_page_intro' ); ?>

	<header class="entry-header sr-only">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header>

	<div class="entry-content">

		<?php do_action( 'kapow_before_post_content' ); ?>

		<?php the_content(); ?>

		<?php do_action( 'kapow_after_post_content' ); ?>

	</div>

	<footer class="entry-footer">

		<?php
		// No meta required, just the edit post link.
		if ( get_edit_post_link() ) {
			edit_post_link( esc_html__( 'Edit', 'my-project' ), '<span class="edit-link">', '</span>' );
		}
		?>

	</footer>

</article>
