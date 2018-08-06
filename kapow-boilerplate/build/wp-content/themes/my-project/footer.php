<?php
/**
 * The Footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package My Project
 */

?>
				<?php do_action( 'kapow_after_main' ); ?>

			</div> <!-- site-content -->

			<?php get_template_part( 'template-parts/site-footer' ); ?>

		</div> <!-- hfeed site-container -->

		<?php
		do_action( 'kapow_before_wp_footer' );

		wp_footer();
		?>

	</body>

</html>
