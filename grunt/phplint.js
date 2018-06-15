// PHPlint Task - https://github.com/jgable/grunt-phplint
// ----------------------------------------------------------------------------
module.exports = {

	// Lint Theme and Plugin PHP files.
	// -------------------------------------
	all: [
		'<%= wpPlugins %>',
		'<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/**/*.php'
	],
	// Lint Plugin PHP files.
	// -------------------------------------
	plugins: [ '<%= wpPlugins %>' ],
	// Lint Theme PHP files.
	// -------------------------------------
	theme: [ '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/**/*.php' ]
};
