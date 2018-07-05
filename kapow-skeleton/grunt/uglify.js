// Uglify Task - https://github.com/gruntjs/grunt-contrib-uglify
// ----------------------------------------------------------------------------
module.exports = {

	// Uglify all of our JS assets.
	// -------------------------------------
	options: {
		banner: '/*! <%= package.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n',
		// Turning off mangling keeps the original
		// code intact, reducing errors.
		// -------------------------------------
		mangle: false,
		// Generate a sourcemap for each
		// Javascript file.
		// -------------------------------------
		sourceMap: false
	},
	// Uglify header JS.
	// -------------------------------------
	header: {
		files: {
			'<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.js_dir %>/header.min.js': [ '<%= concat.header.dest %>' ]
		}
	},
	// Uglify header JS for IE.
	// -------------------------------------
	header_ie: {
		files: {
			'<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.js_dir %>/header_ie.min.js': [ '<%= concat.header_ie.dest %>' ]
		}
	},
	// Uglify footer JS.
	// -------------------------------------
	footer: {
		files: {
			'<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.js_dir %>/footer.min.js': [ '<%= concat.footer.dest %>' ]
		}
	},
	// Uglify customizer JS.
 	// -------------------------------------
	customizer: {
		files: {
			'<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.js_dir %>/customizer.min.js': [ '<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/customizer.js' ]
		}
	},
	// Uglify admin JS.
	// -------------------------------------
	admin: {
		files: {
			'<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.js_dir %>/admin.min.js': [ '<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/admin.js' ]
		}
	},
};
