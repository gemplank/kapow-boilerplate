// SVG Min Task - https://github.com/sindresorhus/grunt-svgmin
// ----------------------------------------------------------------------------
module.exports = {

    // Minifiy SVG files.
    // -------------------------------------
    options: {
        plugins: [
        {
            removeTitle: false
        },
        {
            removeDimensions: true
        },
        {
            removeViewBox: false
        },
        {
            removeUselessStrokeAndFill: true
        },
        {
            sortAttrs: true
        }]
    },
    svg: {
        files: [{
            expand: true,
            cwd: '<%= siteInfo.assets_path %>/<%= siteInfo.icons_dir %>',
            src: ['**/*.svg'],
            dest: '<%= wpInfo.wp_content %>/<%= wpInfo.themes_dir %>/<%= wpInfo.theme_name %>/<%= wpInfo.assets_dir %>/<%= wpInfo.icons_dir %>'
        }]
    }
};
