<?php
/**
 * @flags wrap
 */
 ?>

<div class="icon-block">
	<span class="icon-block__icon">
		<?php kapow_get_svg('tap-icon', 40, 40); ?>
	</span>
	<div class="icon-block__content">
		<h2 class="icon-block__heading">Lorem ipsum dolor</h2>
		<div class="icon-block__text">
			<p>Lorem ipsum dolor sit amet, consectetur.</p>
		</div>
		<a href="#" class="icon-block__more">
			<?php
			echo wp_kses_post(
			sprintf(
				/* translators: post title wrapped in a <span> tag. */
				__( 'Learn More %s', 'my-project' ),
				'<span class="sr-only"> from ' . get_the_title() . '</span>'
				)
			);
			kapow_get_svg( 'chevron-icon' );
			?>
		</a>
	</div>
</div>
