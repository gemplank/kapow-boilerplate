<?php
/**
 * Custom template tags for this theme.
 *
 * @package My Project
 */

/**
 * Get SVG icons
 *
 * @param string $slug   Slug name of the icon.
 * @param int    $width  Width of the icon in pixels.
 * @param int    $height Height of the icon in pixels.
 */
function kapow_get_icon( $slug, $width = 24, $height = 24 ) {

	if ( empty( $slug ) ) {
		return;
	}

	// Menu.
	if ( 'menu-icon' === $slug ) {
		?>
		<svg class="<?php echo esc_attr( $slug ); ?>" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;">
			<title><?php esc_html_e( 'Menu Icon', 'my-project' ); ?></title>
			<rect class="rect1" width="320" height="32"></rect>
			<rect class="rect2" width="320" height="32"></rect>
			<rect class="rect3" width="320" height="32"></rect>
		</svg>
		<?php
	}
}

/**
 * Generate a responsive <picture> element.
 *
 * @param int    $img_id           Post ID of the image attachment.
 * @param array  $img_settings     Array of media query slugs and breakpoints.
 * @param string $default_img_size Slug name of the default size to be used.
 * @param bool   $retina_support   Whether to output markup that supports retina.
 */
function kapow_responsive_image( $img_id, $img_settings, $default_img_size = '', $retina_support = false ) {

	// If the ID is empty, return an error.
	if ( empty( $img_id ) ) {
		return;
	}

	// Handle a string being passed in.
	$img_id = intval( $img_id );

	// Is this a valid image?
	$status = get_post_status( $img_id );

	// If not, return an error.
	if ( empty( $status ) || empty( $img_settings ) ) {
		return;
	} else {

		// Get the alt tag.
		$img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );

		// Empty variable for the default image src.
		$default_img_src = '';

		// Build the srcset.
		//
		// We're expecting an array containing items
		// that hold the `size` and `breakpoint`
		// values for the name of the size and the
		// breakpoint, respectively.
		$srcsets = array();

		// Loop through the image settings.
		foreach ( $img_settings as $key => $setting ) {

			// Get the size and breakpoint.
			$img_size       = ( isset( $setting['size'] ) ) ? $setting['size'] : '';
			$img_breakpoint = ( isset( $setting['breakpoint'] ) ) ? $setting['breakpoint'] : '';

			// Check both values are valid.
			if ( ! empty( $img_size ) && ! empty( $img_breakpoint ) ) {

				// Get the standard image src.
				$img_src = wp_get_attachment_image_src( $img_id, $img_size );

				// If this is the first image in the array,
				// we'll use that as the default image.
				//
				// This can be overriden in the function
				// arguments.
				if ( 0 === $key ) {
					$default_img_src = $img_src[0];
				}

				// If retina support is enabled add the 2x image.
				if ( ! empty( $retina_support ) ) {

					// Try to get the retina image src.
					$retina_img_src = wp_get_attachment_image_src( $img_id, $img_size . '_2x' );

					// Add the info to the srcset array if
					// the retina size is available.
					if ( ! empty( $retina_img_src ) ) {
						$srcsets[] = array( $retina_img_src[0] . ' 2x', $img_breakpoint );
					}
				}

				// Add the standard 1x image.
				$srcsets[] = array( $img_src[0] . ' 1x', $img_breakpoint );
			}
		}

		// If the default image size has been passed in.
		if ( ! empty( $default_img_size ) ) {

			// Get the standard version of default image src.
			$default_img = wp_get_attachment_image_src( $img_id, $default_img_size );

			// Override the default default.
			if ( ! empty( $default_img ) ) {
				$default_img_src = $default_img[0];
			}
		}

		// Open.
		echo '<picture>';

		// Output each source.
		foreach ( $srcsets as $srcset ) {
			echo '<source srcset="' . esc_attr( $srcset[0] ) . '" media="(min-width: ' . esc_attr( $srcset[1] ) . ')" />';
		}

		// Output the image class and default src.
		echo '<img src="' . esc_url( $default_img_src ) . '"';

		// Output the alt tag.
		if ( ! empty( $img_alt ) ) {
			echo 'alt="' . esc_attr( $img_alt ) . '"';
		}

		// Close.
		echo '/></picture>';
	}
}

/**
 * Responsive background image attributes
 *
 * Example `$img_settings` array...
 *
 * ```php
 * $settings = array(
 *   array(
 *      'size' => 'featured-image-mobile',
 *      'breakpoint' => '480',
 *   ),
 *   array(
 *      'size' => 'featured-image-tablet',
 *      'breakpoint' => '768',
 *   ),
 *   array(
 *      'size' => 'featured-image-desktop',
 *      'breakpoint' => '1024',
 *   ),
 * );
 * ```
 *
 * @param int    $img_id           Post ID of the image attachment.
 * @param array  $img_settings     Array of image sizes and breakpoints.
 * @param string $default_img_size Slug name of the default size to be used.
 * @param string $retina_support   Whether to enable retina support.
 * @param bool   $return           Whether to return or echo the attributes.
 */
function kapow_responsive_bg_image_attrs( $img_id, $img_settings, $default_img_size, $retina_support = false, $return = true ) {

	// If the ID is empty, return an error.
	if ( empty( $img_id ) ) {
		return;
	}

	// Handle a string being passed in.
	$img_id = intval( $img_id );

	// Is this a valid image?
	$status = get_post_status( $img_id );

	// Only proceed if the image has a published status,
	// an array of settings and a default image size.
	if ( empty( $status ) || empty( $img_settings ) || empty( $default_img_size ) ) {
		return;
	} else {

		$data_attributes = '';

		// Loop through the image settings.
		foreach ( $img_settings as $key => $setting ) {

			// Get the size.
			$img_size       = ( isset( $setting['size'] ) ) ? $setting['size'] : '';
			$img_breakpoint = ( isset( $setting['breakpoint'] ) ) ? $setting['breakpoint'] : '';

			// Check both values are valid.
			if ( ! empty( $img_size ) && ! empty( $img_breakpoint ) ) {

				$img_src = wp_get_attachment_image_src( $img_id, $img_size );
				$img_url = ( ! empty( $img_src ) ) ? $img_src[0] : '';

				if ( ! empty( $img_url ) ) {
					$data_attributes .= 'data-bg-' . esc_attr( $img_breakpoint ) . '="' . esc_url( $img_url ) . '" '; // Must be a space at the end!.
				}

				// If retina support is enabled.
				if ( ! empty( $retina_support ) ) {
					// Try to get the retina image src.
					$retina_img_src = wp_get_attachment_image_src( $img_id, $img_size . '_2x' );
					$retina_img_url = ( ! empty( $retina_img_src ) ) ? $retina_img_src[0] : '';

					// Add the info to the srcset array if
					// the retina size is available.
					if ( ! empty( $retina_img_url ) ) {
						$data_attributes .= 'data-bg-' . esc_attr( $img_breakpoint ) . '-2x="' . esc_url( $retina_img_url ) . '" '; // Must be a space at the end!.
					}
				}
			}
		}

		$default_img_src = wp_get_attachment_image_src( $img_id, $default_img_size );

		if ( ! empty( $default_img_src ) ) {
			$data_attributes .= 'data-default-bg="' . esc_url( $default_img_src[0] ) . '" ';
		}

		if ( $return ) {
			return $data_attributes;
		} else {
			echo $data_attributes; // WPCS: XSS OK.
		}
	}
}

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function kapow_entry_info() {
	$time_kapow_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	$time_kapow_string = sprintf( $time_kapow_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		/* translators:  1: date the post was published. */
		esc_html_x( 'Posted on %s', 'post date', 'my-project' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_kapow_string . '</a>'
	);

	$byline = sprintf(
		/* translators:  1: author of the post. */
		esc_html_x( 'by %s', 'post author', 'my-project' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<p><span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span></p>'; // WPCS: XSS OK.
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function kapow_entry_meta() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		$categories_list = get_the_category_list( esc_html__( ', ', 'my-project' ) );
		$tags_list       = get_the_tag_list( '', esc_html__( ', ', 'my-project' ) );

		if ( $categories_list && kapow_categorized_blog() || $tags_list ) {
			echo '<p>';
		}

		if ( $categories_list && kapow_categorized_blog() ) {
			printf( /* Translators: used between list items, there is a space after the comma. */
			'<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'my-project' ) . '</span>', wp_kses_post( $categories_list ) ); // WPCS: XSS OK.
		}

		if ( $tags_list ) {
			printf( /* Translators: used between list items, there is a space after the comma. */
			'<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'my-project' ) . '</span>', wp_kses_post( $tags_list ) ); // WPCS: XSS OK.
		}

		if ( $categories_list && kapow_categorized_blog() || $tags_list ) {
			echo '</p>';
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<p><span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'my-project' ), esc_html__( '1 Comment', 'my-project' ), esc_html__( '% Comments', 'my-project' ) );
		echo '</span></p>';
	}

	if ( get_edit_post_link() ) {
		edit_post_link( esc_html__( 'Edit', 'my-project' ), '<span class="edit-link">', '</span>' );
	}
}

/**
 * Returns true if a blog has more than 1 category.
 */
function kapow_categorized_blog() {
	$all_the_cool_cats = get_transient( 'kapow_categories' );
	if ( false === $all_the_cool_cats ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'kapow_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so kapow_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so kapow_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in kapow_categorized_blog.
 */
function kapow_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'kapow_categories' );
}
add_action( 'edit_category', 'kapow_category_transient_flusher' );
add_action( 'save_post', 'kapow_category_transient_flusher' );
