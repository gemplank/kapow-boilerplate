// Custom JS for the Footer
// ----------------------------------------------------------------------------

// Document Ready
// -------------------------------------
jQuery(function($) {

    // Skip Link Focus Fix - Helps with accessibility for keyboard only users.
    // Learn more: https://github.com/Automattic/My Project/pull/136

    var is_webkit = navigator.userAgent.toLowerCase().indexOf('webkit') > -1,
        is_opera = navigator.userAgent.toLowerCase().indexOf('opera') > -1,
        is_ie = navigator.userAgent.toLowerCase().indexOf('msie') > -1;

    if ((is_webkit || is_opera || is_ie) && document.getElementById && window.addEventListener) {
        window.addEventListener('hashchange', function() {
            var id = location.hash.substring(1),
                element;

            if (!(/^[A-z0-9_-]+$/.test(id))) {
                return;
            }

            element = document.getElementById(id);

            if (element) {
                if (!(/^(?:a|select|input|button|textarea)$/i.test(element.tagName))) {
                    element.tabIndex = -1;
                }

                element.focus();
            }
        }, false);

    }

    // Init JS for Foundation if being used.
    // -------------------------------------
    if (window.Foundation !== undefined ) {
        $(document).foundation();
    }

}(jQuery));

// Window Resize
// -------------------------------------
jQuery(window).resize(function($) {

});

// Window Load
// -------------------------------------
jQuery(window).load(function($) {

}(jQuery));
