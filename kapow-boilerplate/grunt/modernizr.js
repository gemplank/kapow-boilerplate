// Modernizr Task - https://github.com/Modernizr/grunt-modernizr
// ----------------------------------------------------------------------------
module.exports = {

    // Generate a custom Modernizr build
    // based on the checks found in our
    // Sass & Javascript.
    // -------------------------------------
    custom: {
        "cache": true,
        "uglify": false,
        "options": [
            "domPrefixes",
            "prefixes",
            "mq",
            "prefixed",
            "testAllProps",
            "testProp",
            "setClasses"
        ],
        "tests": [
            "flexbox",
            "cssanimations",
            "cssgradients",
            "csstransforms",
            "csstransitions",
            "csscolumns",
            "cssvhunit",
            "cssvwunit",
            "placeholder",
            "localstorage",
            "inlinesvg",
            "canvas",
            "shapes",
            "svg",
            "video"
        ],
        "excludeTests": [
            "hidden"
        ],
        "devFile": "node_modules/@bower_components/modernizr/src/Modernizr.js",
        "dest": "<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/<%= siteInfo.js_lib_dir %>/_modernizr-custom_h.js",
        "crawl": true,
        "files": {
            "src": [
                '<%= siteInfo.assets_path %>/<%= siteInfo.scss_dir %>/**/*.scss',
                '<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/**/*.js',
                '!<%= siteInfo.assets_path %>/<%= siteInfo.js_dir %>/<%= siteInfo.js_lib_dir %>/_modernizr-custom_h.js'
            ]
        }
    }
};
