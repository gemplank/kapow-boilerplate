<?php
/**
 * Template Name: Static
 */
?>

<div class="static-main">

	<?php get_header();

		// 1. Scans $main_dir for folders.
		// 2. Creates a view for each folder.
		// 3. Outputs all php files to that view.
		// 4. Applies flag classes to a parent div around each teplate part.

		// Dir to scan
		$main_dir			= get_template_directory() . '/template-parts/';

		foreach(glob( $main_dir . '*' , GLOB_ONLYDIR) as $dir) {
			$folders[] = basename($dir);
		}
	?>

	<div class="static-wrap">
		<div class="static-header">
			<div class="static-heading__left">
				<h1 class="static-heading">Static Styleguide</h1>
				<div class="static-label">Updated: <?php echo date('g:i:sa'); ?></div>
			</div>
			<ul id="static-header__nav" class="static-header__nav">
				<?php foreach ( $folders as $folder ) {
					echo '<li>';
						echo '<a href="" id="' . $folder . '">' . $folder . '</a>';
					echo '</li>';
				}; ?>
			</ul>
		</div>
	</div>

	<?php // Loop folders
	foreach ( $folders as $folder ) {
		$glob = glob ( $main_dir . $folder . '/*.php' ); ?>

		<section class="static-page <?php echo $folder; ?>">
			<div class="static-folder-header">
				<div class="static-wrap">
					<h2 class="static-heading">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve"><path d="M456.3,160c-1.1,0-4.3,0-8.3,0v-41c0-13.3-9.4-23-22.8-23H230.9c-2.8,0-4.3-0.6-6.1-2.4l-22.5-22.5l-0.2-0.2 c-4.9-4.6-8.9-6.9-17.3-6.9H88.7C74.9,64,64,74.3,64,87v73c-4,0-7.1,0-8.3,0c-12.8,0-25.3,5.1-23.5,24.3C34,203.5,55.7,423,55.7,423 c2.7,17.8,11.7,25,25,25h352.5c12.7,0,21-7.8,23-25c0,0,22.2-212.9,23.6-233.5S470.9,160,456.3,160z M80,87c0-4.3,4.4-7,8.7-7h96.1 c3.5,0,3.7,0.2,6.2,2.5l22.5,22.4c4.8,4.8,10.4,7.1,17.4,7.1h194.3c4.5,0,6.8,2.6,6.8,7v41c-72,0-280,0-352,0V87z M440.2,423 c-0.8,4.7-3.7,9-8,9H82c-4.5,0-9.5-3.5-10.3-9l-24-239c0-4.4,3.6-8,8-8h400.6c4.4,0,8,3.6,8,8L440.2,423z"/></svg>&nbsp; <?php echo $folder; ?>
					</h2>
				</div>
			</div>

			<?php // Loop files
			foreach ( $glob as $file ) {
				$file_slug			= pathinfo( $file )['filename'];
				$file_name			= str_replace("-", " ", $file_slug);
				$file_lines			= file($file);
				$flag_classes		= array(" ");
				?>

				<div id="<?php echo $file_slug; ?>" class="static-wrap">

					<h3 class="static-heading"><?php echo $file_name; ?></h3>

					<div class="static-info">
						<div class="static-info__row">
							<div class="static-info__col">
								<div class="static-label">File: </div><?php echo $folder . '/' . $file_slug; ?>
							</div>

							<?php // Loop lines in file, search for @flags line
							foreach ($file_lines as $lineNumber => $line) {
								if (strpos($line, '@flags') !== false) {

									// Array of flag values
									$flagline = explode( " " , $line );

									// Things to remove from the above
									$removals = array(""," ", "*", "@flags");
									$flags = array_values(array_diff($flagline, $removals));

									// Return flags
									echo '<div class="static-info__col"><div class="static-label">Flags:</div>' . implode(" ", $flags) . '</div>';

									// Prefix flags to make the classes
									$flag_classes = $flags;
									foreach ($flag_classes as &$value) {
										$value = 'static-'.$value;
									}
									unset($value);
								}
							}
							?>
						</div>
					</div>
				</div>

				<div class="static-part <?php echo implode(" ", $flag_classes); ?>">
					<?php include( $file ); ?>
				</div>

				<div class="static-wrap">
					<hr>
				</div>

				<?php unset($flags, $flag_classes);
			}  // End loop files ?>

		</section>

	<?php } // End loop folders ?>

	<script>
		// View changing JS
		const staticNav 	= document.querySelectorAll('#static-header__nav>li>a');
		const staticPages	= document.querySelectorAll(`section.static-page`);

		function toggleOpen(e) {
			e.preventDefault();

			var targetName 	= this.id;
			target			= document.querySelector(`section.static-page.${targetName}`);

			staticNav.forEach(link => link.classList.remove('active'));
			this.classList.add('active');

			staticPages.forEach(page => page.classList.remove('active'));

			setTimeout( function() {
				staticPages.forEach(page => page.classList.remove('display'));
				target.classList.add('display');
			}, 150);

			setTimeout( () => { target.classList.toggle('active') }, 300);
		}

		staticNav.forEach(link => link.addEventListener('click', toggleOpen));

	</script>

	<?php get_footer(); ?>

</div> <!-- End static-main -->
