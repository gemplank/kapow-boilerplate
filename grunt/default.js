// Default Task - The master task used to build/re-build the project.
// Comment, un-comment or re-arrange to suit your specific needs.
// ----------------------------------------------------------------------------
module.exports = function( grunt ) {
	grunt.registerTask( 'default', [
		"sync",
		// "phplint",
		// "sasslint",
		// "eslint",
		"spritesmith",
		"grunticon",
		"copy:grunticon",
		"sass-globbing",
		"sass",
		"postcss",
		"cssmin",
		"copy:unminified_css",
		// "legacy-browsers",
		"copy:sourcemaps",
		"modernizr",
		"concat",
		"babel",
		"uglify",
		"copy:unminified_js",
		"newer:svgmin",
		"newer:imagemin",
		"clean",
		// "phpdoc",
		// "sassdoc",
		// "jsdoc",
		"notify:build"
	] );
};
