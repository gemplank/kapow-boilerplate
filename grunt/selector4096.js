// Selector 4096 Task - https://github.com/hail2u/grunt-selector4096
// ----------------------------------------------------------------------------
module.exports = {

	// Check to see if the number of CSS
	// selectors in the main stylesheet
	// exceeds the number allowed by legacy
	// Internet Explorer browsers (<= 9).
	// -------------------------------------
	style: [ '<%= siteInfo.assets_path %>/<%= siteInfo.css_dir %>/<%= siteInfo.scss_file %>.css' ],
};
