/* global thebaseShopConfig */
/**
 * File Shop-init.js.
 * Gets Shop toggle working.
 */

(function() {
	'use strict';
	window.thebaseShop = {
		createCookie: function( name, value, length, unit ) {
			if ( length ) {
				var date = new Date();
				if ( 'minutes' == unit ) {
					date.setTime( date.getTime() + ( length * 60 * 1000 ) );
				} else if ( 'hours' == unit ) {
					date.setTime( date.getTime() + ( length * 60 * 60 * 1000 ) );
				} else {
					date.setTime( date.getTime()+(length*24*60*60*1000));
				}
				var expires = "; expires="+date.toGMTString();
			} else {
				var expires = "";
			}
	
			document.cookie = thebaseShopConfig.siteSlug + '-' + name+"="+value+expires+"; path=/";
		},
		/**
		 * the script to get layout cookie
		 */
		getCookie: function ( name ) {
			var value = "; " + document.cookie;
			var parts = value.split("; " + thebaseShopConfig.siteSlug + '-' + name + "=");
			if ( parts.length == 2 ) return parts.pop().split(";").shift();
		},
		/**
		 * Initiate the script to toggle shop layout
		 */
		initShopToggle: function() {
			if ( ! document.body.classList.contains( 'woocommerce' ) && ! document.body.classList.contains( 'archive' ) ) {
				return;
			}

			var shopToggle = document.querySelectorAll( '.thebase-toggle-shop-layout' );

			// No point if no navs.
			if ( ! shopToggle.length ) {
				return;
			}
			
			var shopCookie = window.thebaseShop.getCookie( 'shopLayout' );
			if ( shopCookie && ( 'grid' === shopCookie || 'list' === shopCookie ) ) {
				var startToggle = document.querySelector( '.thebase-toggle-' + shopCookie );
				window.thebaseShop.toggleShop( startToggle );
			}

			for ( let i = 0; i < shopToggle.length; i++ ) {
				shopToggle[ i ].addEventListener( 'click', function (event) {
					event.preventDefault();
					window.thebaseShop.toggleShop( shopToggle[ i ] );
				} );
			}
		},
		/**
		 * Initiate the script to toggle shop layout
		 */
		toggleShop: function( element ) {
			if ( ! element.classList.contains('toggle-active') ) {
				element.classList.add('toggle-active');
				window.thebaseShop.createCookie( 'shopLayout', element.dataset.archiveToggle, 30, 'days' );
			}
			if ( 'grid' === element.dataset.archiveToggle ) {
				var otherToggle = document.querySelector( '.thebase-toggle-list' );
			} else {
				var otherToggle = document.querySelector( '.thebase-toggle-grid' );
			}
			otherToggle.classList.remove('toggle-active');
			if ( 'grid' === element.dataset.archiveToggle ) {
				var products = document.querySelector( '.woo-archive-loop.products-list-view' );
			} else {
				var products = document.querySelector( '.woo-archive-loop.products-grid-view' );
			}
			if ( ! products ) {
				products = document.querySelector( '.woo-archive-loop' );
			}
			products.classList.remove( 'products-list-view' );
			products.classList.remove( 'products-grid-view' );
			products.classList.add( 'products-' + element.dataset.archiveToggle + '-view' );
		},
		/**
		 * Initiate the script to toggle shop layout
		 */
		initShopCatToggle: function() {

			var catToggle = document.querySelectorAll( '.widget_product_categories' );

			// No point if no navs.
			if ( ! catToggle.length ) {
				return;
			}
			for ( let i = 0; i < catToggle.length; i++ ) {
				var childUl = catToggle[ i ].querySelectorAll( '.cat-parent' );
				if ( childUl.length ) {
					for ( let n = 0; n < childUl.length; n++ ) {
						var element = document.createElement('button');
						element.setAttribute( 'aria-label', thebaseConfig.screenReader.expand );
						element.classList.add( 'thebase-cat-toggle-sub' );
						if ( childUl[n].classList.contains('current-cat') || childUl[n].classList.contains('current-cat-parent') ) {
							element.classList.add( 'toggle-active' );
							element.setAttribute( 'aria-label', thebaseConfig.screenReader.collapse );
							childUl[n].classList.add( 'sub-toggle-active' );
						}
						childUl[n].appendChild( element );
						element.addEventListener( 'click', function ( event ) {
							event.preventDefault();
							window.thebaseShop.toggleCatShop( event );
						} );
					}
				}
			}
		},
		/**
		 * Initiate the script to toggle shop layout
		 */
		toggleCatShop: function( event ) {
			var element = event.srcElement;
			if ( ! element.classList.contains('toggle-active') ) {
				element.classList.add('toggle-active');
			} else {
				element.classList.remove('toggle-active');
			}
			if ( ! element.parentNode.classList.contains('sub-toggle-active') ) {
				element.parentNode.classList.add('sub-toggle-active');
			} else {
				element.parentNode.classList.remove('sub-toggle-active');
			}
		},
		// Initiate the menus when the DOM loads.
		init: function() {
			window.thebaseShop.initShopToggle();
			window.thebaseShop.initShopCatToggle();
		}
	}
	if ( 'loading' === document.readyState ) {
		// The DOM has not yet been loaded.
		document.addEventListener( 'DOMContentLoaded', window.thebaseShop.init );
	} else {
		// The DOM has already been loaded.
		window.thebaseShop.init();
	}
})();
