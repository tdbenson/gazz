-

jQuery(document).ready(function(){
// Target your #container, #wrapper etc.
    jQuery("#wrapper").fitVids();

    jQuery('#container').each(function(index, element) {
    	var element = jQuery(element);
    	element.css({ 'opacity': 0});
    });


    // Sub Menu Item Arrows
	jQuery('#site-navigation #theme-menu-main li').each(function(index, element) {
		var item = jQuery(element);
		var parent = jQuery('#theme-menu-main > li:first-child');
		var subMenu = item.children('ul');
		var isSubmenu = item.parent().hasClass('sub-menu');

		// Add dropdown indicators
		if ( parent && item.children().hasClass('sub-menu') && !isSubmenu ) {
			var arrowDown = ' <i class="icon-plus"></i>';
			item.children('a').append(arrowDown);
		}

		// Submenus in submenus
		if (isSubmenu && subMenu.length) {
			var arrowRight = ' <i class="icon-plus"></i>&nbsp;&nbsp;';
			item.children('a').append(arrowRight);
		}

	});

	// Collapsible Menu
	jQuery('#theme-sidebar-menu li').each(function(index, element) {
		var item = jQuery(element);
		var parent = jQuery('#theme-sidebar-menu > li:first-child');
		var subMenu = item.children('ul');
		var isSubmenu = item.parent().hasClass('sub-menu');

		// Add dropdown indicators
		// parent
		if ( parent && item.children().hasClass('sub-menu') && !isSubmenu ) {
			var contentHtml = item.children('a').html();
			item.children('a').html('<span>' + contentHtml + '</span>');
			var iconPlus = ' <i class="icon-plus"></i>';
			item.children('a').append(iconPlus);
		}

		// Submenus in submenus
		if (isSubmenu && subMenu.length) {
			var iconPlus = ' <i class="icon-plus"></i>';
			item.children('a').append(iconPlus);
		}

	});

	jQuery('#theme-sidebar-menu li a [class^="icon-"], #theme-sidebar-menu li a [class*=" icon-"]').each(function(index, element) {
		var item = jQuery(element);

		item.click(function(e) {
			e.preventDefault();

			if( item.hasClass('icon-plus') ){
				item.removeClass('icon-plus');
				item.addClass('icon-minus');
			} else {
				item.removeClass('icon-minus');
				item.addClass('icon-plus');
			}

			item.parent().next('.sub-menu').slideToggle(400);
		});
	});


	// Append arrows to some elements
	var rarr = jQuery('<i class="icon-double-angle-right"> </i>');
	jQuery('.widget li > a:first-child').each(function(index, element) {
			element = jQuery(element);
			if( !element.parents(".widget").hasClass('widget_td_categories') && !element.parents(".widget").hasClass('widget_themedutch_posts') )
				element.prepend(rarr);
	});

	// Input field placeholder text
	jQuery('input[placeholder]').each(function(index, element) {
		var element = jQuery(element);

		var placeholderText = element.attr('placeholder');
		if (!placeholderText === '')
			return;
		element.removeAttr('placeholder');

		// Place first placeholder
		if (element.val() === '') {
			element.val(placeholderText);
			element.addClass('placeholderActive');
		}

		element.bind('focus', function() {
			if (element.val() === placeholderText) {
				element.val('');
				element.removeClass('placeholderActive');
			}
		});
		element.bind('blur', function() {
			if (element.val() === '') {
				element.val(placeholderText);
				element.addClass('placeholderActive');
			}
		});
	});

    // show the back top link
    toTop();

    // Setup PrettyPhoto links
	//
	jQuery('a[data-rel^="prettyPhoto"]').prettyPhoto({
		animationSpeed: 'normal', /* fast/slow/normal */
		slideshow: 3000,
		autoplay_slideshow: false,
		theme: "pp_default", /*pp_default/light_rounded/dark_rounded/dark_square/light_square/facebook */
		opacity: 0.35, /* Value between 0 and 1 */
		hook: 'data-rel',
		showTitle: false /* true/false */
	});

	// Responsive Menu (TinyNav)
	jQuery("#theme-menu-main").tinyNav({
		active: 'current_page_item', // Set the "active" class for default menu
		label: '', // String: Sets the <label> text for the <select> (if not set, no label will be added)
	    header: '', // String: Specify text for "header" and show header instead of the active item
	});

	// Responsive Menu (Selectbox)
	jQuery(function () {
	    jQuery(".tinynav").selectbox();
	});

	// Cleanup empty p tags
	jQuery('p').each(function(index, element) {
		element = jQuery(element);
		if ( element.html() === '' || element.html() === '<br>')
			element.remove();
	});

	//Search on top
	jQuery("#theme-search-icon").bind({
		click: function() {
			jQuery(".theme-search .container").animate({top: 0}, 350);
		},
		mouseenter: function() {
			jQuery(this).addClass("hover");
		},
		mouseleave: function() {
			jQuery(this).removeClass("hover");
		}

	});

	//Search on top
	jQuery("#theme-hand-icon").bind({
		click: function() {
			jQuery("#sidebar-selector").animate({top: 0}, 350);
		},
		mouseenter: function() {
			jQuery(this).addClass("hover");
		},
		mouseleave: function() {
			jQuery(this).removeClass("hover");
		}

	});

	// Search close button
	jQuery(".theme-search .container #close").bind({
		click: function() {
			jQuery(".theme-search .container").animate({top: -180}, 350);
			jQuery("#theme-search-icon").removeClass("hover");
		}
	});

	// Sidebar selector close button
	jQuery("#sidebar-selector .close").bind({
		click: function() {
			jQuery('#sidebar-selector').animate({top: -200}, 350);
		}
	});

	// Check the Left/Right hand preference and apply
	if ( localStorage ) {
		retrieve_hand_preference();
	}

	// Sidebar selector left and right button
	jQuery("#sidebar-selector .left_sidebar").bind({
		click: function() {
			save_hand_preference('left');
		}
	});

	jQuery("#sidebar-selector .right_sidebar").bind({
		click: function() {
			save_hand_preference('right');
		}
	});

	var show = false;
	var hide = true;
	// Show/Hide Background
	jQuery('#hide-show-bg .icon-minus').click(function(e) {
	    e.preventDefault();

	    if (hide) {
			show = true;
			hide = false;
	        jQuery("#container").animate({"left": "-=2800px"}, "slow");
	        //$("#show-wall-image").css("display","none");
	        //$("#show-wall").removeClass("show-download");

	        jQuery('#hide-show-bg .icon-plus').css('opacity', 1);
	        jQuery('#hide-show-bg .icon-minus').css('opacity', 0.5);
	    }
	 });

	 jQuery('#hide-show-bg .icon-plus').click(function(e) {
	    e.preventDefault();

	    if (show) {
			show = false;
			hide = true;
	        jQuery("#container").animate({"left": "+=2800px"}, "slow");
	        //$("#show-wall-image").css("display","block");
	        //$("#show-wall").addClass("show-download");
	        //$('#show-wall').html("Show site");

	        jQuery('#hide-show-bg .icon-plus').css('opacity', 0.5);
	        jQuery('#hide-show-bg .icon-minus').css('opacity', 1);
        }
	 });


});

jQuery(window).load(function() {

	jQuery('#container').each(function(index, element) {
    	var element = jQuery(element);
    	element.css({ 'opacity': 1});
    });

	// Remove loader when ready
	jQuery('.core-loader').delay(50).fadeOut(150);

	// Fades Site Navigation
	jQuery('#site-navigation li').fadeTo("slow", 1);

	jQuery('#hide-show-bg .icon-plus').css('opacity', 0.5);

	// Sidebar Heights
	var ua = navigator.userAgent;
    var checker = {
      iphone: ua.match(/(iPhone|iPod)/),
      blackberry: ua.match(/BlackBerry/),
      android: ua.match(/Android/)
    };
    if (checker.android){
        //empty
    }
    else if (checker.iphone){
        //empty
    }
    else if (checker.blackberry){
        //empty
    }
    else {

	    // Correct the main column borders
	    var maxHeight = jQuery('#wrapper').height();
		var contentHeight = jQuery('.theme_content_area').height();
		var sidebarColHeight = jQuery('#sidebar').height();
		var fwaH = jQuery('#footer-widget-area').height();

	    if ( maxHeight < contentHeight  ) {
			maxHeight = contentHeight;
		}else if ( maxHeight < sidebarColHeight  ) {
			maxHeight = sidebarColHeight;
		}

		if ( sidebarColHeight > contentHeight ){
		    jQuery('#content-main').height(sidebarColHeight);
		    if ( fwaH < 1 ) {
		        jQuery('.theme-content').height(sidebarColHeight-(fwaH+30));
		        jQuery('.theme-sidebar').height(sidebarColHeight-(fwaH));
		    }
		}


        // Correct the sidebar borders
		var minContentHeight = jQuery('#content-main .theme-content').height();
		var maxContentHeight = minContentHeight;
		if(jQuery('#content-main .theme-sidebar').length > 0 ) {
			jQuery('#content-main .theme-sidebar').each(function(index, element){
				var element = jQuery(element);
				var elementHeight = element.height();

				if ( elementHeight > maxContentHeight ){
					maxContentHeight = elementHeight;
				}

			});

			if ( maxContentHeight > minContentHeight  ) {
				jQuery('#content-main .theme-content').stop(true, true).animate({height: maxContentHeight-30 }, 350);
			} else {
				jQuery('#content-main .theme-sidebar').stop(true, true).animate({height: maxContentHeight+30 }, 350);
			}

		}

		// Correct Footer Widget Sidebar
		var minFooterHeight = 100;
		var maxFooterHeight = minFooterHeight;
		if(jQuery('#footer-widget-area .footer-sidebar').length > 0 ) {

			jQuery('#footer-widget-area .footer-sidebar').each(function(index, element){
				var element = jQuery(element);
				var elementHeight = element.height();

				if ( elementHeight > maxFooterHeight ){
					maxFooterHeight = elementHeight;
				}

			});

			if ( maxFooterHeight > minFooterHeight  ) {
				jQuery('#footer-widget-area .footer-sidebar').stop(true, true).animate({height: maxFooterHeight+65 }, 350);
			}
		}


		if ( sidebarColHeight < contentHeight ) {
			//jQuery('#sidebar').height(jQuery('.theme_content_area').height()+65);
			//jQuery('#sidebar').height(jQuery('.theme_content_area').height());
		}

    }

});

/*!
 * Responsive JS Plugins v1.2.2
 */
// Placeholder
jQuery(function(){
    //jQuery('input[placeholder], textarea[placeholder]').placeholder();
});

// Have a custom video player? We now have a customSelector option where you can add your own specific video vendor selector (mileage may vary depending on vendor and fluidity of player):
// jQuery("#thing-with-videos").fitVids({ customSelector: "iframe[src^='http://example.com'], iframe[src^='http://example.org']"});
// Selectors are comma separated, just like CSS
// Note: This will be the quickest way to add your own custom vendor as well as test your player's compatibility with FitVids.


// Masonry
//jQuery(function(){
//    jQuery('#container').masonry({
//      itemSelector: '.grid',
//      columnWidth: 200,
      //isAnimated: !Modernizr.csstransitions,
//      isFitWidth: true
//    });
//  });

// To top
//
function toTop() {
	var TOP_MINIMUM = 200;
	var ANIMATE_SPEED = 500;

	var toTop = jQuery('.scroll-top');

	function updateToTop() {
		var scrollTop = jQuery(window).scrollTop();

		if (scrollTop > TOP_MINIMUM)
			toTop.stop(true, true).slideDown(ANIMATE_SPEED);
		else if (scrollTop <= TOP_MINIMUM)
			toTop.stop(true, true).slideUp(ANIMATE_SPEED);
	}

	jQuery(window).scroll(updateToTop);
	updateToTop();

	// To top button
	toTop.bind('click', function() {
		jQuery('html, body').stop(true, true).animate({scrollTop: 0}, ANIMATE_SPEED);
		return false;
	});
}

//Left/Right hand preferences
//

function supportsLocalStorage(){
	if ( localStorage ) {
		return true;
	}

	return false;
}

// Save the Left/Right hand preferences
function save_hand_preference(handPreference){
	if (!supportsLocalStorage()) { return false; }

	localStorage["handPreference"] = handPreference;

	apply_hand_preference();

	return true;
}

// Retrieve the Left/Right hand preferences
function retrieve_hand_preference(handPreference){
	if (!supportsLocalStorage()) { return false; }

	var handPreference = localStorage["handPreference"];

	if ( !handPreference ) {
		localStorage["handPreference"] = handPreference;
	}

	apply_hand_preference();

	return true;
}

// Apply the Left/Right hand preferences
function apply_hand_preference(){

	var handPreference = localStorage["handPreference"];

	jQuery('#wrapper .theme_content_area').stop(true,true).animate({opacity: 0}, 800);
	jQuery('#sidebar').stop(true,true).animate({opacity: 0}, 800);

	if ( handPreference == 'left' ) {
		jQuery('#wrapper .theme_content_area').removeClass('grid');
		jQuery('#sidebar').removeClass('grid');

		jQuery('#wrapper .theme_content_area').addClass('grid-right');
		jQuery('#sidebar').addClass('grid-right');
	} else {
		jQuery('#wrapper .theme_content_area').removeClass('grid-right');
		jQuery('#sidebar').removeClass('grid-right');

		jQuery('#wrapper .theme_content_area').addClass('grid');
		jQuery('#sidebar').addClass('grid');
	}

	jQuery('#wrapper .theme_content_area').stop(true,true).animate({opacity: 1}, 800);
	jQuery('#sidebar').stop(true,true).animate({opacity: 1}, 800);

	return true;
}

