/**
 * Initilize Responsive Background Images
 *
 * The header sometimes loads before jQuery has loaded,
 * we have put it in a function so we can wait until jQuery has loaded.
 */
function isHighDensity(){
    return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 124dpi), only screen and (min-resolution: 1.3dppx), only screen and (min-resolution: 48.8dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 2.6/2), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (min-device-pixel-ratio: 1.3)').matches)) || (window.devicePixelRatio && window.devicePixelRatio > 1.3));
}


function isRetina(){
    return ((window.matchMedia && (window.matchMedia('only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx), only screen and (min-resolution: 75.6dpcm)').matches || window.matchMedia('only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min--moz-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)').matches)) || (window.devicePixelRatio && window.devicePixelRatio >= 2)) && /(iPad|iPhone|iPod)/g.test(navigator.userAgent);
}

var initResponsiveBackgroungImages = function( $ ) {

	'use strict';

	// Change the CSS background-image of an
	// element or collection of elements at
	// different breakpoints based on image
	// sources stored in data attributes
	// on the element(s).
	//
	// This function is bound to the window
	// and be used in the global scope.
	// -------------------------------------
	window.responsiveBackgroundImages = function( selector ) {

		// Abort if Modernizr is not available.
		// -------------------------------------
		if ( typeof Modernizr === 'undefined' ) {
			return;
		}

		// Abort if we have no selector.
		// -------------------------------------
		if ( ! selector ) {
			return;
		}

		// Change this to the appropriate CSS
		// selector and walk away; you're done!
		// -------------------------------------
		var $bg_img_el  = $( selector );

		// Iterate over all elements that have
		// the chosen selector.
		// -------------------------------------
		$bg_img_el.each( function( index, element ) {

			// Set-up our variables.
			// -------------------------------------
			var css_prop        = 'background-image',
				$img_target     = $(element),
				img_data        = [],
				img_default_src = '',
				// Gets the URL from the background-image property.
				img_current_src = $(element)
					.css( css_prop )
					.replace ( "url(", "" )
					.replace( ")", "")
					.replace( /\"/gi, "" );

			// Get all of the element attributes.
			// -------------------------------------
			$.each( this.attributes, function( index, element ) {

				// Get and store the default image.
				// -------------------------------------
				if ( this.name.indexOf( 'data-default-bg' ) !== -1 ) {
					img_default_src = this.value || '';
				}

				// Get and store the breakpoint and the
				// image src as an object in our array
				// of image data.
				// -------------------------------------
				if ( this.name.indexOf( 'data-bg-' ) !== -1 ) {

					// Regex to extract the breakpoint value
					// from the attribute name.
					// -------------------------------------
					var regex = /data-bg-(\d*)/i,
						match = this.name.match( regex );

					// Make sure we only add the the image
					// data if the URL is present and we
					// have a match.
					// -------------------------------------
					if (
						this.value !== '' &&
						typeof this.value !== 'undefined' &&
						typeof match[1] !== 'undefined'
						) {

						img_data.push({
							breakpoint: parseInt( match[1] ),
							src: this.value,
							retina: ( this.name.indexOf('2x') !== -1 ? true : false )
						});
					}
				}
			});

			function compare_retina(a,b) {
				if (a.retina < b.retina)
					return -1;
				if (a.retina > b.retinag)
					return 1;
			  return 0;
			}
			function compare_breakpoint(a,b) {
				if (a.breakpoint < b.breakpoint)
					return -1;
				if (a.breakpoint > b.breakpoint)
					return 1;
			  return 0;
			}

			img_data.sort( compare_retina );
			img_data.sort( compare_breakpoint );

			// Iterate over our data object and
			// replace the background image with the
			// most appropriate version for the
			// current viewport size if required.
			// -------------------------------------
			for ( var i = 0; i < img_data.length; i++ ) {

				// Set-up our variables.
				// -------------------------------------
				var next    = i+1,
					// Ensure the first breakpoint value is always zero.
					bp_min  = i === 0 ? 0 : img_data[ i ].breakpoint,
					// Ensure the last breakpoint value is always high.
					bp_max  = i === img_data.length - 1 ? 9999 : img_data[ next ].breakpoint -1;

				// Carry out a Modernzir media query
				// check for each breakpoint defined in
				// our array, and update the background
				// image CSS property for the element.
				// -------------------------------------
				if ( Modernizr.mq( 'screen and ( min-width: ' + bp_min + 'px ) and ( max-width: ' + bp_max + 'px )' ) ) {

					var pixelRatio = window.devicePixelRatio,
					    retina     = img_data[ i ].retina,
						src        = img_data[ i ].src;

					// if ( pixelRatio < 2 && ( isHighDensity() || isRetina() ) ) {
					// 	pixelRatio = 2;
					// }

                    //Hack this in
                    pixelRatio = 2;

					// Only update the background image if
					// the image for this breakpoint is not
					// the same as the existing image.
					//
					// Furthermore, only update the image
					// based on the retina/non-retina
					// conditions.
					// -------------------------------------
					if (
						img_current_src !== src
						&& ( retina === false && pixelRatio < 2 || retina === true && pixelRatio > 1 )
					 	) {
						$img_target.css( css_prop, 'url("' + src + '")' );
					}
				}
			}

			// Use the default image as a fallback
			// if this element still does not have a
			// background image set, for whatever
			// reason that may be.
			// -------------------------------------
			var bg_img = $img_target
				 .css( css_prop )
				 .replace ( "url(", "" )
				 .replace( ")", "")
				 .replace( /\"/gi, "" );

			if (
				bg_img === 'none'  &&
				img_default_src !== ''
				) {

				$img_target.css( css_prop, 'url("' + img_default_src + '")' );
			}
		});
	};
};

/**
 * Defer loading until jQuery has loaded
 */
function defer( method ) {
    if ( window.jQuery ) {
        method( window.jQuery );
    } else {
        setTimeout(function() { defer( method ) }, 50);
    }
}

// Load the Backround Images when jQuery has loaded.
defer( initResponsiveBackgroungImages );
