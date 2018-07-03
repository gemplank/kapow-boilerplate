// CSSMin Task - https://github.com/gruntjs/grunt-contrib-cssmin
// ----------------------------------------------------------------------------
module.exports = {

	// Front End Styles.
	// -------------------------------------
	frontend: {
		options: {
			compatibility: 'ie8',
			sourceMap: true,
			outFile: '<%= siteInfo.scss_file %>.css.map',
			rebase: true
		},
		src: '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>/<%= siteInfo.scss_file %>.css',
		dest: '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= siteInfo.scss_file %>.css'
	},
	// Back End Styles.
	// -------------------------------------
	backend: {
		options: {
			sourceMap: false,
		},
		files: [ {
			expand: true,
			cwd: '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>',
			src: [
				'*.css',
				'!<%= siteInfo.scss_file %>.css'
			],
			dest: '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.css_dir %>',
			ext: '.min.css'
		} ]
	}
};
