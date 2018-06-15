// ESLint Task - https://github.com/sindresorhus/grunt-eslint
// ----------------------------------------------------------------------------
module.exports = {

	options: {
		configFile: 'grunt/config/eslintrc.json',
		outputFile: '<%= siteInfo.reports_path %>/eslint.md',
		quiet: true
	},
	// Lint our Javascript.
	// -------------------------------------
	scripts: {
		src: [
			'<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/**/*.js',
			'!<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/<%= siteInfo.js_lib_dir %>/**/*.js'
		]
	}
};
