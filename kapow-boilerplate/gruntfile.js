module.exports = function(grunt) {
	require('load-grunt-config')(grunt, {
		init: true,
		jitGrunt: {
			jitGrunt: true,
			// -------------------------------------
			// These static mappings help Grunt play
			// nicely with certain plugins.
			// -------------------------------------
			staticMappings: {}
		},
		// -----------------------------------------------------------------------------
		// Anything you define within the main 'data' object can be accessed
		// both in the Gruntfile and in the individual task configurations e.g.
		// <%= wpInfo.theme_name %>, <%= siteInfo.assets_path %> etc.
		// -----------------------------------------------------------------------------
		data: {
			// -------------------------------------
			// Project specific settings.
			// -------------------------------------
			siteInfo: {
				// -------------------------------------
				// The 'fancy' name for your project
				// e.g. 'My First Website'.
				// -------------------------------------
				fancy_name: 'My Project',

				// -------------------------------------
				// Assets path relative to the project
				// root - NO trailing slash.
				// -------------------------------------
				assets_path: 'assets',

				// -------------------------------------
				// Image assets directory.
				// -------------------------------------
				img_dir: 'images',

				// -------------------------------------
				// Javascript assets directory.
				// -------------------------------------
				js_dir: 'js',

				// -------------------------------------
				// JS libraries directory
				// -------------------------------------
				js_lib_dir: 'lib',

				// -------------------------------------
				// JS parts directory
				// -------------------------------------
				js_parts_dir: 'parts',

				// -------------------------------------
				// Sass assets directory.
				// -------------------------------------
				scss_dir: 'scss',

				// -------------------------------------
				// Name of your main Sass file and
				// consequent CSS file.
				// -------------------------------------
				scss_file: 'style',

				// -------------------------------------
				// CSS assets directory.
				// -------------------------------------
				css_dir: 'css',

				// -------------------------------------
				// Font assets directory.
				// -------------------------------------
				fonts_dir: 'fonts',

				// -------------------------------------
				// SVG assets directory
				// -------------------------------------
				svgs_dir: 'svgs'
			},

			// -------------------------------------
			// WordPress specific settings
			// -------------------------------------
			wpInfo: {
				// -------------------------------------
				// Path to wp-content relative to the
				// project root.
				// -------------------------------------
				wp_content: 'build/wp-content',

				// -------------------------------------
				// Themes directory.
				// -------------------------------------
				themes_dir: 'themes',

				// -------------------------------------
				// WordPress theme directory.
				// -------------------------------------
				theme_name: 'my-project',

				// -------------------------------------
				// Theme assets directory.
				// -------------------------------------
				assets_dir: 'assets',

				// -------------------------------------
				// Theme images directory.
				// -------------------------------------
				img_dir: 'images',

				// -------------------------------------
				// Theme Javascript directory.
				// -------------------------------------
				js_dir: 'js',

				// -------------------------------------
				// Theme CSS directory.
				// -------------------------------------
				css_dir: 'css',

				// -------------------------------------
				// Theme fonts directory.
				// -------------------------------------
				fonts_dir: 'fonts',

				// -------------------------------------
				// Theme SVGs directory
				svgs_dir: 'svgs'
				// -------------------------------------
			},

			// -------------------------------------
			// Array of paths to WordPress plugin
			// folders/files that require linting
			// -------------------------------------
			wpPlugins: [
				'<%= wpInfo.wp_content %>/plugins/kapow-core/**/*.php',
				'<%= wpInfo.wp_content %>/plugins/my-project-core/**/*.php',
			],

			// -------------------------------------
			// Array of paths to Javascript files
			// for inclusion in the HEADER.
			//
			// As a rule, include bower_components
			// first, then theme specific files.
			//
			// Files that reside in the `parts/` or
			// `lib/` directories ending with the
			// `_f.js` suffix will be automatically
			// included for concatenation.
			// -------------------------------------
			concatHead: [
				'node_modules/picturefill/dist/picturefill.js',
				'<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/<%= siteInfo.js_lib_dir %>/_*_h.js',
				'<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/<%= siteInfo.js_parts_dir %>/_*_h.js',
				'<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/header.js'
			],

			// -------------------------------------
			// Array of paths to Javascript files
			// for inclusion in the HEADER for IE.
			// -------------------------------------
			concatHeadIE: [
				'node_modules/es5-shim/es5-shim.js',
				'node_modules/html5shiv/dist/html5shiv.js',
				'node_modules/selectivizr/selectivizr.js',
				'node_modules/respondJS/src/respond.js',
				'<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/header_ie.js'
			],

			// -------------------------------------
			// Array of paths to Javascript files
			// for inclusion in the FOOTER.
			//
			// As a rule, include bower_components
			// first, then theme specific files.
			//
			// Files that reside in the `parts/` or
			// `lib/` directories ending with the
			// `_f.js` suffix will be automatically
			// included for concatenation.
			// -------------------------------------
			concatFoot: [
				'<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/<%= siteInfo.js_lib_dir %>/_*_f.js',
				'<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/<%= siteInfo.js_parts_dir %>/_*_f.js',
				'<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/footer.js'
			],

			// -------------------------------------
			// Array of objects that have Bower `src`
			// and theme `dest` paths to facilitate
			// syncing of files and/or folders.
			//
			// There is no need for `bower_components`
			// in the `src` if you specify `cwd` in
			// the object. This is useful if you wish
			// to define multiple `src` paths.
			//
			// If you need to sync a directory in
			// its entirety, append `/**` to the
			// path to the source directory.
			//
			// Finally, remember the `dest` path is
			// relative to the project root, not the
			// `cwd` if specified.
			// -------------------------------------
			syncAssets: [
				// -------------------------------------
				// Example to use as basis for any new
				// Bower folder/file syncing.
				//
				// {
				//     cwd: 'bower_components',
				//     src: ['path/**'],
				//     dest: 'dest/'
				// }
				// -------------------------------------
				{
					src: ['<%= siteInfo.assets_path %>/<%= siteInfo.fonts_dir %>/**'],
					dest: '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/'
				}
			]
		}
	});
	// -----------------------------------------------------------------------------
	// Provides a summary of the time tasks have taken.
	// -----------------------------------------------------------------------------
	require('time-grunt')(grunt);

	// -----------------------------------------------------------------------------
	// Silences grunt-newer.
	// https://github.com/tschaub/grunt-newer/issues/52#issuecomment-59397284
	// -----------------------------------------------------------------------------
	var origLogHeader = grunt.log.header;
	grunt.log.header = function(msg) {
		if (!/newer(-postrun)?:/.test(msg)) {
			origLogHeader.apply(this, arguments);
		}
	};
};
