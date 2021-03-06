// Watch Task - https://github.com/gruntjs/grunt-contrib-watch
// ----------------------------------------------------------------------------
module.exports = {
	options: {
		// Livereload support - requires a browser plugin
		livereload: true,
		spawn: false
	},

	// Process plugin code.
	// -------------------------------------
	code_plugins: {
	  files: [ '<%= wpPlugins %>' ],
	  tasks: [
		// 'phplint:plugins',
		// 'phpdoc:plugins',
		// 'notify:code_plugins'
	  ]
	},

	// Process theme code.
	// -------------------------------------
	code_theme: {
	  files: [ '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/**/*.php' ],
	  tasks: [
		// 'phplint:theme',
		// 'phpdoc:theme',
		// 'notify:code_theme'
	  ]
	},

	// Minify JPG & PNG images.
	// -------------------------------------
	images_jpg: {
		files: [ '<%= siteInfo.assets_path %>/<%= siteInfo.img_dir %>/**/*.{jpg,png,gif}' ],
		tasks: [
			'newer:imagemin',
			'notify:images'
		]
	},

	// Minify SVG images.
	// -------------------------------------
	images_svg: {
		files: [ '<%= siteInfo.assets_path %>/<%= siteInfo.svgs_dir %>/**/*.svg' ],
		tasks: [
			'newer:svgmin',
			'notify:images'
		]
	},

	// Process scripts.
	// -------------------------------------
	scripts: {
		files: [
			'<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/**/*.js',
			'!<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/<%= siteInfo.js_lib_dir %>/_modernizr-custom_h.js',
		],
		tasks: [
			'modernizr',
			'concat',
			'babel',
			'uglify',
			'clean',
			'notify:scripts'
		]
	},

	// Process styles.
	// -------------------------------------
	styles: {
		files: [
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/**/*.scss',
			'!<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/glob/*.scss',
		],
		tasks: [
			"sass-globbing",
			"sass",
			"postcss",
			"cssmin",
			"copy:unminified_css",
			"copy:sourcemaps",
			'notify:styles'
		]
	}
};
