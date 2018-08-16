<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My Project
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

	<header class="entry-header">

		<?php
		do_action( 'kapow_featured_image' );

		the_title( '<h1 class="entry-title">', '</h1>' );
		?>

	</header>

	<div class="entry-content">

		<?php
		do_action( 'kapow_before_post_content' );

		the_content();

		do_action( 'kapow_after_post_content' );
		?>

	</div>

	<footer class="entry-footer">

		<div class="entry-meta">
			<?php kapow_entry_meta(); ?>
		</div>

	</footer>

</article>
