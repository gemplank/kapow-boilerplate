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

	</div>

	<?php do_action( 'kapow_before_footer' ); ?>

	<footer class="site-footer" role="contentinfo">

		<?php do_action( 'kapow_before_footer_content' ); ?>

		<div class="site-info">

			<p>&copy; <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.' , 'my-project' ); ?></p>

		</div>

		<?php do_action( 'kapow_after_footer_content' ); ?>

	</footer>

	<?php do_action( 'kapow_after_footer' ); ?>

</div>

<?php do_action( 'kapow_before_wp_footer' ); ?>

<?php wp_footer(); ?>

</body>

</html>
