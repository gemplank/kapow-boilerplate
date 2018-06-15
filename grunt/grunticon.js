// Grunticon Task - https://github.com/filamentgroup/grunticon
// ----------------------------------------------------------------------------
module.exports = {

	// Automatically process icon SVG & PNG
	// files for use in Sass codebase.
	// -------------------------------------
	icons: {
		files: [{
			expand: true,
			cwd: '<%= siteInfo.assets_path %>/<%= siteInfo.icons_dir %>/',
			src: ['*.svg', '*.png'],
			dest: '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.icons_dir %>',
		}],
		options: {
			enhanceSVG: true,
			compressPNG: true,
			loadersnippet: 'grunticon-loader.js',
			pngpath: 'assets'
		}
	}
}
