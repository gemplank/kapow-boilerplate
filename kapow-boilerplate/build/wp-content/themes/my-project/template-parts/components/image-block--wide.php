<?php
/**
 * @flags wrap
 */
 ?>

<div class="image-block image-block--wide">
	<div class="image-block__row">
		<div class="image-block__image">
			<img src="https://picsum.photos/800/600/?random" alt="Team Image">
		</div>
		<div class="image-block__content">
			<div class="image-block__content-inner">
				<h2 class="image-block__heading">Lorem ipsum dolor</h2>
				<div class="image-block__text">
					<p>Lorem ipsum dolor sit amet, consectetur.</p>
				</div>
				<a href="#" class="image-block__more">
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
	</div>
</div>
