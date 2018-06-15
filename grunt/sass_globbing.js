// Sass Globbing Task - https://github.com/DennisBecker/grunt-sass-globbing
// ----------------------------------------------------------------------------
module.exports = {

	// Glob files from multiple directories
	// in our SCSS codebase, which reduces
	// the need to manually add new partials
	// to the main `style.scss` file.
	// -------------------------------------
	scss: {
		files: {
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/glob/_baseMap.scss':
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/base/**/*.scss',
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/glob/_componentsMap.scss':
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/components/**/*.scss',
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/glob/_modulesMap.scss':
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/modules/**/*.scss',
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/glob/_templatesMap.scss':
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/templates/**/*.scss',
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/glob/_vendorMap.scss':
			'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/vendor/**/*.scss',
		},
		options: {
			useSingleQuotes: false,
			signature: ''
		}
	}
}
