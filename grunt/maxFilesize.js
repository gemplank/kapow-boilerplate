// Max Filesize Task - https://github.com/alexcorre/grunt-max-filesize
// ----------------------------------------------------------------------------
module.exports = {

	// Check to see if the main stylesheet
	// is bigger than the allowed filesize
	// limit in legacy (< 9) IE browsers.
	// -------------------------------------
	css: {
		options: {
			maxBytes: 288000
		},
		src: [ '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= siteInfo.scss_file %>.css' ]
	}
}
