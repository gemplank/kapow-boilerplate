// Sass Lint Task - https://github.com/sasstools/grunt-sass-lint
// ----------------------------------------------------------------------------
module.exports = {

	// Lint SCSS files.
	// -------------------------------------
	options: {
		configFile: 'config/.sasslint.yml',
		formatter: 'stylish',
		outputFile: '<%= siteInfo.reports_path %>/sasslint.md'
	},
	target: [
		'<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/**/*.scss',
		'!<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/glob/*.scss'
	]
};

