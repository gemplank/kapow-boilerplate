// SassDoc Task - https://github.com/SassDoc/grunt-sassdoc
// ----------------------------------------------------------------------------
module.exports = {

	// Generate documentation for our SCSS.
	// -------------------------------------
	options: {
		dest: '<%= siteInfo.docs_path %>/<%= siteInfo.docs_dir_scss %>'
	},
	scss: {
		src: [
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>',
			'!<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/glob/*.scss',
		]
	}
};
