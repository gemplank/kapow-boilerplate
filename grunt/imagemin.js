// Imagemin Task - https://github.com/gruntjs/grunt-contrib-imagemin
// ----------------------------------------------------------------------------
module.exports = {

	// Create minified versions of the image
	// assets in the theme.
	// -------------------------------------
	images: {
		options: {
			progressive: true
		},
		files: [ {
			expand: true,
			cwd: '<%= siteInfo.assets_path %>/<%= siteInfo.img_dir %>',
			src: [ '**/*.{png,jpg,gif}' ],
			dest: '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.img_dir %>'
		} ]
	}
};
