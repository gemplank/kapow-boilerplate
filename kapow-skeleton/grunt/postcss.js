// PostCSS Task - https://github.com/nDmitry/grunt-postcss
// ----------------------------------------------------------------------------
module.exports = {
	// Run our CSS through various tools for
	// enhanced browser support & fallbacks.
	// -------------------------------------
	options: {
		map: true,
		processors: [
			require( 'autoprefixer' )( {
				browsers: [ '> 5%', 'last 2 versions' ]
			} ),
			require( 'pixrem' )( {
				atrules: true
			} )
		]
	},
	styles: {
		src: '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>/<%= siteInfo.scss_file %>.css',
	},
	rtl: {
		src: '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>/rtl.css',
	},
	admin: {
		src: '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>/admin.css',
	},
	editor: {
		src: '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>/editor.css',
	}
}
