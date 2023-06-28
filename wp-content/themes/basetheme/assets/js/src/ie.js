/* global cssVars */
/**
 * File ie.js.
 *
 * Handles running the css var ponyfill
 */
(function() {
	'use strict';
	window.thebaseIE = {
		/**
		 * Initiate the script to process all
		 */
		initAll: function( element ) {
			cssVars({
				// Targets
				rootElement   : document,
				shadowDOM     : false,
			  
				// Sources
				include       : 'link[rel=stylesheet],style',
				exclude       : '',
				variables     : {},
			  
				// Options
				onlyLegacy    : true,
				preserveStatic: true,
				preserveVars  : false,
				silent        : false,
				updateDOM     : true,
				updateURLs    : true,
				watch         : false,
			});
		},
		// Initiate the menus when the DOM loads.
		init: function() {
			if ( typeof cssVars == 'function' ) {
				window.thebaseIE.initAll();
			} else {
				var initLoadDelay = setInterval( function(){ if ( typeof cssVars == 'function' ) { window.thebaseIE.initAll(); clearInterval(initLoadDelay); } }, 200 );
			}
		}
	}
	if ( 'loading' === document.readyState ) {
		// The DOM has not yet been loaded.
		document.addEventListener( 'DOMContentLoaded', window.thebaseIE.init );
	} else {
		// The DOM has already been loaded.
		window.thebaseIE.init();
	}
})();