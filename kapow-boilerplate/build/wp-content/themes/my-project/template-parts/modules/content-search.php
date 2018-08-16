<?php
/**
 * Template part for displaying results in search pages.
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

		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

		if ( 'post' === get_post_type() ) {
			?>

			<div class="entry-info">
				<?php kapow_entry_info(); ?>
			</div>

			<?php
		}
		?>

	</header>

	<div class="entry-summary">

		<?php
		do_action( 'kapow_before_search_excerpt' );

		the_excerpt();

		do_action( 'kapow_before_search_excerpt' );
		?>

	</div>

	<footer class="entry-footer">

		<div class="entry-meta">
			<?php kapow_entry_meta(); ?>
		</div>

	</footer>

</article>
