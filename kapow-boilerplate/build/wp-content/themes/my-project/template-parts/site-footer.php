<?php
/**
 * Site Footer.
 *
 * @package My Project
 */

do_action( 'kapow_before_footer' ); ?>

<footer class="site-footer" role="contentinfo">

	<div class="site-footer__wrap">

		<?php do_action( 'kapow_before_footer_content' ); ?>

		<div class="site-info">

			<p>&copy; <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'my-project' ); ?></p>

		</div>

		<?php do_action( 'kapow_after_footer_content' ); ?>

	</div>

</footer>

<?php
do_action( 'kapow_after_footer' );
