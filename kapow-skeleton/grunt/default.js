// Default Task - The master task used to build/re-build the project.
// Comment, un-comment or re-arrange to suit your specific needs.
// ----------------------------------------------------------------------------
module.exports = function( grunt ) {
	grunt.registerTask( 'default', [
		"sync",
		"sass-globbing",
		"sass",
		"postcss",
		"cssmin",
		"copy:unminified_css",
		"copy:sourcemaps",
		"modernizr",
		"concat",
		"babel",
		"uglify",
		"copy:unminified_js",
		"newer:svgmin",
		"newer:imagemin",
		"clean",
		"notify:build"
	] );
};
