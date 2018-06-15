<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My Project
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

	<header class="entry-header">

		<?php do_action( 'kapow_featured_image' ); ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-info">
			<?php kapow_entry_info(); ?>
		</div>

	</header>

	<div class="entry-content">

		<?php do_action( 'kapow_before_post_content' ); ?>

		<?php the_content(); ?>

		<?php do_action( 'kapow_after_post_content' ); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:' , 'my-project' ),
				'after'  => '</div>',
			) );
		?>

	</div>

	<footer class="entry-footer">

		<div class="entry-meta">
			<?php kapow_entry_meta(); ?>
		</div>

	</footer>

</article>
