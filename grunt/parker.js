// Parker Task - Analyse CSS - https://github.com/leny/grunt-parker
// ----------------------------------------------------------------------------
module.exports = {

	// Parse CSS and report useful insights.
	// -------------------------------------
	options: {
		file: '<%= siteInfo.reports_path %>/parker.md',
		title: '<%= siteInfo.fancy_name %> Parker Report'
	},
	css: {
		src: '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>/<%= siteInfo.scss_file %>.css'
	},
};
