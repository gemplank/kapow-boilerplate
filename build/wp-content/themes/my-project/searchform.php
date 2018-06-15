<?php
/**
 * Search Form.
 *
 * @package My Project
 */

?>

<form method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<label for="s" class="sr-only"><?php esc_html_e( 'Search', 'my-project' ); ?>
		<input
		type="text"
		class="search-form--field"
		name="s"
		id="s"
		placeholder="<?php esc_attr_e( 'Search', 'my-project' ); ?>"
		/>
	</label>

	<input
	type="submit"
	class="search-form--submit"
	name="submit"
	id="search-submit"
	value="<?php esc_attr_e( 'Search', 'my-project' ); ?>" />

</form>
