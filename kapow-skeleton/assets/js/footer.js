// Custom JS for the Footer.
// ----------------------------------------------------------------------------

// Document Ready.
// -------------------------------------
jQuery( function( $ ) {

	// Responsive Background Images.
	// -------------------------------------
	// responsiveBackgroundImages( '.js-bg-img' );

	// Window Resize & Orientation Change.
	// -------------------------------------
	var resizeTimer;
	$( window ).on( "resize orientationchange", function( event ) {

		clearTimeout( resizeTimer );

		resizeTimer = setTimeout( function() {
			// Do stuff.
			// responsiveBackgroundImages( '.js-bg-img' );
		}, 100 );
	});

}( jQuery ));

// Window Load.
// -------------------------------------
jQuery( window ).load( function( $ ) {
	// Do stuff.
}( jQuery ));
