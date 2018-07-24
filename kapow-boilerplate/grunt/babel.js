// Babel Task - https://github.com/babel/grunt-babel
// ----------------------------------------------------------------------------
module.exports = {
	options: {
		presets: ['@babel/preset-env']
	},
	// Transpile the Javascript.
	//
	// NOTE: We're overwriting the .tmp.js
	// files with the transpiled versions.
	// -------------------------------------
	js: {
		files: [ {
			expand: true,
			cwd: '<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>',
			src: ['*.tmp.js'],
			dest: '<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>',
			ext: '.tmp.js'
		} ]
	}
};
