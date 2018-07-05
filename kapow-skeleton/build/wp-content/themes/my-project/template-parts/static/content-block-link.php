<div class="content-block">
	<div class="content-block__row">
		<div class="content-block__content">
			<h2 class="content-block__heading">Lorem ipsum dolor</h2>
			<div class="content-block__text">
				<p>Lorem ipsum dolor sit amet, consectetur.</p>
			</div>
			<a href="#" class="content-block__more">
				<?php
				echo wp_kses_post(
					sprintf(
					/* translators: post title wrapped in a <span> tag. */
					__( 'Learn More %s', 'surelight' ),
					'<span class="sr-only"> from ' . get_the_title() . '</span>'
					)
				);
				kapow_get_icon( 'chevron-icon' );
				?>
			</a>
		</div>
	</div>
</div>
