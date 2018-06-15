// Spritesmith Task - https://github.com/Ensighten/grunt-spritesmith
// ----------------------------------------------------------------------------
module.exports = {

	// Generate an image sprite from PNG
	// assets with useful SCSS variables.
	// -------------------------------------
	all: {
		src: [
			'<%= siteInfo.assets_path %>/<%= siteInfo.img_dir %>/*.png',
			'!<%= siteInfo.assets_path %>/<%= siteInfo.img_dir %>/sprite.png'
		],
		dest: '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.img_dir %>/sprite.png',
		destCss: '<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/<%= siteInfo.scss_base_dir %>/_sprites.scss',
		imgPath: '<%= wpInfo.assets_path %>/<%= wpInfo.img_dir %>/sprite.png?' + ( new Date().getTime() ),
	}
};
