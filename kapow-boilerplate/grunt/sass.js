// Sass Task - https://github.com/sindresorhus/grunt-sass
// ----------------------------------------------------------------------------
module.exports = {
	// Generate CSS from our SCSS files.
	// -------------------------------------
	scss: {
		options: {
			includePaths: [
				'node_modules/',
			],
			sourceMap: true,
			style: 'compressed'
		},
		files: [ {
			expand: true,
			cwd: '<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>',
			src: [
				'*.scss',
				'!/glob/*.scss'
			],
			dest: '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>',
			ext: '.css'
		} ]
	}
};
