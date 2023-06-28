/**
 * Ajax install the Theme Plugin
 *
 */
(function($, window, document, undefined){
	"use strict";
	$(function(){
		$( '#thebase-notice-gutenberg-plugin .notice-dismiss' ).on( 'click', function( event ) {
			thebase_dismissGutenbergNotice();
		} );
		function thebase_dismissGutenbergNotice(){
			var data = new FormData();
			data.append( 'action', 'thebase_dismiss_gutenberg_notice' );
			data.append( 'security', thebaseGutenbergDeactivate.ajax_nonce );
			$.ajax({
				url : thebaseGutenbergDeactivate.ajax_url,
				method:  'POST',
				data: data,
				contentType: false,
				processData: false,
			});
		}
	});
})(jQuery, window, document);