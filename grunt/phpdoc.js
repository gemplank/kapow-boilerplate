// PHPdoc Task - https://github.com/chrisklaussner/grunt-phpdoc
// ----------------------------------------------------------------------------
module.exports = {

	// Generate theme and plugin
	// documentation.
	// -------------------------------------
	all: {
		src: [
			'<%= wpPlugins %>',
			'<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>'
		],
		dest: '<%= siteInfo.docs_path %>/<%= siteInfo.docs_dir_php %>'
	},
	// Generate theme documentation.
	// -------------------------------------
	theme: {
		src: [ '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>' ],
		dest: '<%= siteInfo.docs_path %>/<%= siteInfo.docs_dir_php %>'
	},
	// Generate plugin documentation.
	// -------------------------------------
	plugins: {
		src: [
			'<%= wpInfo.wp_content %>/plugins/index.php', // hack to ensure phpdoc doesn't fail if no plugins are specified
			'<%= wpPlugins %>'
		],
		dest: '<%= siteInfo.docs_path %>/<%= siteInfo.docs_dir_php %>'
	}
}
