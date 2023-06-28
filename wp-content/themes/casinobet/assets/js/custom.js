// Custom JS
"use strict";
var n = jQuery.noConflict();
function isotopAutoSet() {
     // Testimonials
     jQuery(".testimonial-carousel").each(function() {
        "use strict";
            n(".testimonial-carousel .elementor-widget-wrap").addClass("owl-carousel");
            n(".testimonial-carousel .elementor-widget-wrap").owlCarousel({
                navigation: false,
                pagination: true,
                autoplay:1000,
                items: 2,
                itemsLarge: [1400, 2],
                itemsDesktop: [1200, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [600, 1],
                itemsMobile: [479, 1]
            })
    });	

    // Blog
    jQuery(".blog-carousel").each(function() {
        "use strict";
        if (n(this).attr("id")) {
            var e = n(this).attr("id").replace("_blog_carousel", "");
            n(".blog-carousel").addClass("owl-carousel");
            n(".blog-carousel").owlCarousel({
                navigation: true,
                pagination: false,
                items: e,
                itemsLarge: [1400, e],
                itemsDesktop: [1200, e],
                itemsDesktopSmall: [979, 2],
                itemsTablet: [600, 2],
                itemsMobile: [479, 1]
            })
        }
    });

}
// jQuery(document).ready(function() {  "use strict";  isotopAutoSet() });
jQuery(window).on('load',function() {  "use strict";  isotopAutoSet()});
jQuery(window).resize(function() { "use strict"; isotopAutoSet()});


function singleproductcarousel() {
    "use strict";
    jQuery('.product .flex-control-thumbs').addClass('owl-carousel');
    jQuery(".product .flex-control-thumbs").owlCarousel({
        navigation: true,
        pagination: false,
        items: 4,
        itemsDesktop: [1299, 3],
        itemsDesktopSmall: [991, 3],
        itemsTablet: [600, 2],
        itemsMobile: [320, 1]
    });
}

jQuery(document).ready(function() {  "use strict";  singleproductcarousel() });
jQuery(window).load(function() {  "use strict";	singleproductcarousel() });
jQuery(window).resize(function() {  "use strict";singleproductcarousel()});

jQuery(window).on('load', function() {
    "use strict";
    var $height = 0 ;
    jQuery(".product-action-wrap").each(function(){
   if((jQuery(this).height())>$height){
    $height = jQuery(this).height();
    }
    });
    jQuery("ul.products.woo-archive-action-on-hover .woo-archive-outer").each(function(){
    jQuery(this).css("margin-bottom",-$height - 6);
    jQuery(this).css("padding-bottom",$height + 6);
	jQuery("ul.align-buttons-bottom .product-action-wrap").css("bottom", -$height - 6);
    });

    jQuery('.thebase-show-sidebar-btn').on("click",function() {
        jQuery(".primary-sidebar").toggleClass("active");
        jQuery(this).toggleClass("active");
    });
    jQuery('.thebase-hide-sidebar-btn .thebase-svg-iconset').on("click",function() {
        jQuery(".primary-sidebar").removeClass("active");
        jQuery('.thebase-show-sidebar-btn').removeClass("active");
    });
    

});
jQuery('.widget_block').on("click",function() {
    jQuery('.product-categories').slideToggle("slow");
});

 // JS for adding menu more link in navigation
function moreTab() {
    "use strict";
    var max_elem = 7;
    if (jQuery(window).width() < 1350) {
        var max_elem = 4;
    }
    jQuery('#site-navigation').addClass('more');
    var items = jQuery('#site-navigation.more .menu > li');
    var surplus = items.slice(max_elem, items.length);
    surplus.wrapAll('<li class="menu-item menu-item-type-post_type menu-item-object-page hiden_menu menu-item-has-children menu-item--has-toggle"><ul class="sub-menu">');
    jQuery('.hiden_menu').prepend('<a href="#" class="level-0  activSub">More</a>');
}
jQuery(document).ready(function() {
    "use strict";
    moreTab()
});

// JS toggle for sidebar and footer
function SidebarFooterToggle() {
    "use strict";
    jQuery('footer .widget h3,footer .widget .widget-title ,footer .woocommerce-shipping-calculator .shipping-calculator-button').parent().addClass('toggled-off');
    jQuery('footer .widget h3,footer .widget .widget-title ,footer .woocommerce-shipping-calculator .shipping-calculator-button').on("click", function() {
        if (jQuery(this).parent().hasClass('toggled-on')) {
            jQuery(this).parent().removeClass('toggled-on');
            jQuery(this).parent().addClass('toggled-off');
        } else {
            jQuery(this).parent().addClass('toggled-on');
            jQuery(this).parent().removeClass('toggled-off');
        }
        return (false);
    });
}
jQuery(document).ready(function() {
    "use strict";
    SidebarFooterToggle()
});
//upsell-cross
jQuery(".upsells ul.products").each(function() {
    if (n(this).attr("class")) {
        var e = n(this).attr("class").replace("columns-", "");
        let x = e.substr(8);
        n(".upsells ul.products").addClass("owl-carousel");
        n(".upsells ul.products").owlCarousel({
            navigation: true,
            pagination: false,
            afterAction: function(el){
                //remove class active
                this
                .$owlItems
                .removeClass('active')
                let a = 1;                    
                let z = x - a;
                
                //add class active
                this
                .$owlItems //owl internal $ object containing items
                .eq(this.currentItem + z)
                .addClass('active')    
            },
            items: x,
            itemsLarge: [1400, 5],
            itemsDesktop: [1200, 4],
            itemsDesktopSmall: [979, 3],
            itemsTablet: [767, 3],
            itemsMobile: [640, 2]
        })
    }
});



