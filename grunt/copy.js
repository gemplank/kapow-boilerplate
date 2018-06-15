// Copy Task - https://github.com/gruntjs/grunt-contrib-copy
// ----------------------------------------------------------------------------
module.exports = {

	// Copy sourcemaps to the theme.
	// -------------------------------------
	sourcemaps: {
		expand: true,
		cwd: '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>/',
		src: [ '*.map', '!<%= siteInfo.scss_file %>.css.map' ],
		dest: '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.css_dir %>'
	},
	// Copy unminified CSS to the theme.
	// -------------------------------------
	unminified_css: {
		expand: true,
		cwd: '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>/',
		src: [ '*.css', '!*.min.css', '!*.css.map' ],
		dest: '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.css_dir %>'
	},
	// Copy unminified JS to the theme.
	// -------------------------------------
	unminified_js: {
		expand: true,
		cwd: '<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/',
		src: [ '*.tmp.js' ],
		dest: '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.js_dir %>',
		ext: '.js'
	},
	// Copy Grunticon JS back to assets
	// so that it can be included in the
	// rest of the JS stack.
	// -------------------------------------
	grunticon: {
		files: [
			{
				src: ['<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.icons_dir %>/grunticon-loader.js'],
				dest: '<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/<%= siteInfo.js_lib_dir %>/_grunticon-loader_h.js'
			}
		]
	}
};
