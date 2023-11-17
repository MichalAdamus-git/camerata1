/**
 * Namaha Theme Custom Functionality
 *
 */
( function( $ ) {
    var wpAdminBarHeight 	   = 0;
    var siteHeaderHeight 	   = 0;

	var $main_navigation;
	var $main_navigation_selector;
	
	if ( $( '.main-navigation' ).length ) {
		$main_navigation 		  = $( '.main-navigation' );
		$main_navigation_selector = '.main-navigation';
	} else if ( $( '.main-navigation-mega-menu' ).length ) {
		$main_navigation 		  = $( '.main-navigation-mega-menu' );
		$main_navigation_selector = '.main-navigation-mega-menu';
	}

	var solidify = false;
	var solidify_breakpoint    = parseInt( namaha.solidify_breakpoint );
	var sliderTransitionSpeed  = parseInt( namaha.sliderTransitionSpeed );
	var mobile_menu_breakpoint = parseInt( namaha.mobile_menu_breakpoint );
	var fontAwesomeVersion 	   = namaha.fontAwesomeVersion;
	
    $( document ).ready( function() {
    	var scrollbar_width = namaha_get_scrollbar_width();
    	$('body:not(.mobile-device) .slider-container.default .slider .slide').css( 'width', 'calc(100vw - ' + scrollbar_width + 'px)' ).css( 'max-width', 'calc(100vw - ' + scrollbar_width + 'px)' );
    	
    	namaha_image_has_loaded();
    	
    	$('.hiddenUntilLoadedImageContainer img, img.hideUntilLoaded').one("load", function() {
	    }).each(function() {
	    	if (this.complete) {
	    		$(this).trigger( 'load' );
	    	}
	    });
    	
    	// Stop the WooCommerce product review form submitting when fields are empty
    	$('#commentform').removeAttr('novalidate');
    	
	    // Themify Product Filter
    	$( document ).on( 'wpf_ajax_success', function() {
    		namaha_image_has_loaded();
    	} );
    	
    	// Jetpack infinite scroll
    	$( document.body ).on( 'post-load', function () {
    		namaha_image_has_loaded();
    	} );
    	
        // Add button to sub-menu parent to show nested pages on the mobile menu
    	if (fontAwesomeVersion == '4.7.0') {
	    	font_awesome_code = 'otb-fa';
	    	font_awesome_icon_prefix = 'otb-';
    	} else {
    		font_awesome_code = 'fa';
	    	font_awesome_icon_prefix = '';
    	}
    	
        // Add button to sub-menu parent to show nested pages on the mobile menu
        $( $main_navigation_selector + ' li.page_item_has_children, ' + $main_navigation_selector + ' li.menu-item-has-children' ).prepend( '<span class="menu-dropdown-btn"><i class="' + font_awesome_code + ' ' +  font_awesome_icon_prefix + 'fa-angle-right"></i></span>' );
        
        // Add a hover class to navigation menu items when focused
        $( $main_navigation_selector + ' a' ).on( 'focus blur', function() {
        	$( this ).parents( 'li' ).toggleClass( 'hover' );
        });
        
        // Sub-menu toggle button
        $( $main_navigation_selector + ' a[href="#"], .menu-dropdown-btn' ).bind( 'click', function(e) {
        	e.preventDefault();
        	
        	if ( $(this).has( 'ul' ) && namaha_get_viewport().width <= mobile_menu_breakpoint ) {
	            $(this).parent().toggleClass( 'open-page-item' );
	            $(this).parent().find('.otb-fa:first').toggleClass('otb-fa-angle-right').toggleClass('otb-fa-angle-down');
	            $(this).parent().find('.fa:first').toggleClass('fa-angle-right').toggleClass('fa-angle-down');
        	}
        });
        
        var focused_mobile_menu_item;
        
        // Remove all hover classes from menu items when anything  on the page is clicked
        $( document ).bind( 'click', function(e) {
        	if ( e.target != focused_mobile_menu_item ) {
        		$( 'body.mobile-device ' + $main_navigation_selector + ' li.menu-item-has-children' ).removeClass('hover');
        	}
        	
        	focused_mobile_menu_item = null;
        });

        $( 'body.mobile-device ' + $main_navigation_selector + ' li.menu-item-has-children > a' ).bind( 'click', function(e) {
        	e.preventDefault();
        	menu_item = $(this).parent();

        	// If a menu item with a submenu is clicked that doesn't have a # for a URL show the submenu
        	if ( menu_item.find('a').attr('href') != '#' && !menu_item.hasClass('hover') ) {
        		focused_mobile_menu_item = e.target;        		
        		menu_item.addClass('hover');
        		
        	// If the submenu is already displaying then go to it's URL
        	} else if ( menu_item.hasClass('hover') ) {
        		window.location.href = menu_item.find('a').attr('href');
        	}
        });
        
        // Set the vertical position of the side-aligned social links - a third of the users screen height
        $('.side-aligned-social-links').css('top', function() {
        	return ( screen.height / 3 ) + wpAdminBarHeight;
        });
		
        namaha_toggle_header_element_opacity();
    	namaha_set_slider_height();
    	
    	// Wrap the SiteOrigin Layout Slider widget navigation controls in a container div for styling purposes
    	$('.sow-slide-nav.sow-slide-nav-next, .sow-slide-nav.sow-slide-nav-prev').wrapAll('<div class="otb-sow-slide-nav-wrapper"></div');

		// Add selected menu item indicators
    	$( $main_navigation_selector + '.rollover-underline .menu > ul > li > a, .rollover-underline ul.menu > li > a').append('<div class="indicator"></div>');
    	
    	// Once the header image has loaded remove the loading class and set the height to auto 
        if ( $(".header-image img").length > 0 ) {
    	    var img = $('<img/>');
    	    img.attr("src", $(".header-image img").attr("src") ); 
    		
    	    img.on('load', function() {
    			initFittext();
    			initFitbutton();
    			namaha_pad_text_overlay_container();
    	    	
    	    	$('.site-header').removeClass('forced-solid');
    	    	$('.header-image').removeClass('loading');
    	    	$('.header-image').css('height', 'auto');
    		});
        }
    	
        $( 'a.scroll-link' ).bind( 'click', function(e) {
        	var name  = $(this).attr( 'href' ).substring( 1 );
        	
    		e.preventDefault();
    		namaha_scroll_to_anchor(name);        	
        });
        
        $( 'button.scroll-link' ).bind( 'click', function(e) {
    		e.preventDefault();
        	
        	var name  = $(this).attr( 'rel' ).substring( 1 );
    		namaha_scroll_to_anchor(name);        	
        });
        
        // Mobile menu toggle button
        $( '.header-menu-button' ).on( 'click', function(e) {
        	$( 'body' ).toggleClass( 'show-main-menu' );
        	$( $main_navigation_selector + ' #main-menu' ).addClass( 'animate' );

        	if ( $( 'body' ).hasClass( 'show-main-menu' ) ) {
            	$( this ).attr( 'aria-expanded', 'true' );
        	} else {
        		$( this ).attr( 'aria-expanded', 'false' );
        	}
        });
        
        $( '.main-menu-close' ).on( 'click', function(e) {
            $( '.header-menu-button' ).click();
            $( $main_navigation_selector + ' #main-menu' ).addClass( 'animate' );
            $( '.header-menu-button' ).focus();
        });
        
        $( document ).on( 'keyup',function(e) {
        	if ( $( 'body' ).hasClass( 'show-main-menu' ) && e.keyCode == 27 ) {
        		$( '.header-menu-button' ).click();
        		$( '.header-menu-button' ).focus();
        	}
        });
        
        $main_navigation.on( 'transitionend webkittransitionend', function() {
        	$( $main_navigation_selector + ' #main-menu' ).removeClass( 'animate' );
        });
    	
        // Scroll to content button
        $( '.scroll-to-content' ).on( 'click', function(e) {
        	e.preventDefault();
        	
        	namaha_scroll_to_pos( $('.content-container').offset().top );
        });
        
        // Show / Hide navigation search slidedown
        $(".search-button:not(.plugin)").on( 'click', function(e) {
        	e.preventDefault();
        	
        	if ( !$(".search-slidedown").hasClass('open') ) {
	        	$(".search-slidedown").addClass('open');
	        	$(".search-slidedown").css('visibility', 'visible');
	        	$(".search-slidedown").animate( { opacity: 1 }, 150 );
	            $(".search-slidedown .search-field").focus();
        	} else {
	        	$(".search-slidedown").removeClass('open');
	        	$(".search-slidedown").animate( { opacity: 0 }, 150, function() {
	        		$(".search-slidedown").css('visibility', 'hidden');
	        	});
        	}
        });

        // Show border on focus of content BBPress search - can't be achieved with CSS alone due to the required HTML structure
        $( '#bbp-search-form .search-field' ).on( 'focus', function() {
        	$( '.bbp-search-container' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.bbp-search-container' ).toggleClass('focused'); 
        });

        // Show border on focus of sidebar MailChimp for WordPress widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.widget-area .widget_mc4wp_form_widget input[type="email"]' ).on( 'focus', function() {
        	$( '.widget-area .widget_mc4wp_form_widget' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.widget-area .widget_mc4wp_form_widget' ).toggleClass('focused'); 
        });
        
        // Show border on focus of footer MailChimp for WordPress widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.site-footer-widgets .widget_mc4wp_form_widget input[type="email"]' ).on( 'focus', function() {
        	$( '.site-footer-widgets .widget_mc4wp_form_widget' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.site-footer-widgets .widget_mc4wp_form_widget' ).toggleClass('focused'); 
        });
        
        // Show border on focus of sidebar search widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.widget-area .widget_search .search-field' ).on( 'focus', function() {
        	$( '.widget-area .widget_search' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.widget-area .widget_search' ).toggleClass('focused'); 
        });
        
        // Show border on focus of footer search widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.site-footer-widgets .widget_search .search-field' ).on( 'focus', function() {
        	$( '.site-footer-widgets .widget_search' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.site-footer-widgets .widget_search' ).toggleClass('focused'); 
        });
        
        // Show border on focus of sidebar product search widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.widget-area .widget_product_search .search-field' ).on( 'focus', function() {
        	$( '.widget-area .widget_product_search' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.widget-area .widget_product_search' ).toggleClass('focused'); 
        });
        
        // Show border on focus of footer product search widget - can't be achieved with CSS alone due to the required HTML structure
        $( '.site-footer-widgets .widget_product_search .search-field' ).on( 'focus', function() {
        	$( '.site-footer-widgets .widget_product_search' ).toggleClass('focused'); 
        }).on( 'blur', function() {
        	$( '.site-footer-widgets .widget_product_search' ).toggleClass('focused'); 
        });
        
        // Custom click functionality required because of replacing the search widget button with a link 
        $(".search-submit").bind('click', function(event) {
        	var form = $(this).parents("form");

            // Don't search if no keywords have been entered
        	if ( form.find(".search-field").val() == "") {
        		event.preventDefault();
        	} else {
        		form.submit();
        	}
        });
        
        // Custom click functionality required because of replacing the MailChimp for WordPress widget button with a link 
        $(".mc4wp-submit").bind('click', function(event) {
        	var form = $(this).parents("form");

            // Don't submit if no email address has been entered
        	if ( form.find('input[type="email"]').val() == "") {
        		event.preventDefault();
        	} else {
        		form.submit();
        	}
        });
        	
    });
    
    $(window).resize(function () {
    	clearTimeout( window.resizedFinished );
    	
    	// Use setTimeout to stop the code from running before the window has finished resizing
    	window.resizedFinished = setTimeout(function() {

			initFittext();
			initFitbutton();
			namaha_scale_slider_controls();
			namaha_set_slider_controls_visibility();
	        namaha_toggle_header_element_opacity();
	        namaha_pad_text_overlay_container();
	    	namaha_set_search_block_position();
			namaha_constrain_text_overlay_opacity();
			
		}, 0);
    }).resize();
    
    $(window).on('load', function() {
    	namaha_home_slider();
    	namaha_set_search_block_position();
    });
    
    $(window).scroll(function(e) {
		animateInitialPageScroll = false;
		
		var scrollTop = parseInt( $(window).scrollTop() ) + 28 + wpAdminBarHeight;
    });
    
    function namaha_scale_slider_controls() {
    	// Slider control buttons
    	var sliderControlButtons = $('.slider-container.default .prev, .slider-container.default .next');
		var maxsliderControlButtonSize = 49;
		var minsliderControlButtonSize = 26;

		// Slider control arrows
    	var sliderControlArrows = $('.slider-container.default .prev .otb-fa, .slider-container.default .next .otb-fa, .slider-container.default .prev .fa, .slider-container.default .next .fa');
		var maxsliderControlArrowSize;
		var sliderControlArrowLineHeight;
    	
		var maxsliderControlArrowSize = 75;
		var minsliderControlArrowSize = 40;
		var maxsliderControlArrowLineHeight = 75;
		var minsliderControlArrowLineHeight = 40;
		var compressor = 1;
		
		var sliderTextOverlay = $('.slider-container.default .slider .slide .overlay-container .overlay');
		
		var sliderControlButtonHeight = Math.max(Math.min( sliderTextOverlay.width() / (compressor*10), maxsliderControlButtonSize), minsliderControlButtonSize);
		
		sliderControlButtons.css({
			'height': sliderControlButtonHeight,
			'width': sliderControlButtonHeight
		});
		
		sliderControlArrowLineHeight = sliderControlButtonHeight * (94 / 100);
		
		sliderControlArrows.css({
			'font-size': Math.max(Math.min( sliderTextOverlay.width() / (compressor*10), maxsliderControlArrowSize), minsliderControlArrowSize),
			'line-height': sliderControlArrowLineHeight + 'px'
		});
	}
    
    function namaha_constrain_text_overlay_opacity() {
    	var sliderTextOverlay = $('.slider-container.default .slider .slide .overlay-container .overlay');
		var sliderTextOverlayOpacity = $('.slider-container.default .slider .slide .overlay-container .overlay .opacity');
		var headerImageTextOverlay = $('.header-image .overlay-container .overlay');
		var headerImageTextOverlayOpacity = $('.header-image .overlay-container .overlay .opacity');
		
		if ( !$('.slider-container.default').hasClass('loading') && sliderTextOverlayOpacity.length > 0 && sliderTextOverlayOpacity.outerHeight() >= sliderTextOverlay.height() ) {
			sliderTextOverlayOpacity.addClass('constrained');
		} else {
			sliderTextOverlayOpacity.removeClass('constrained');
		}
		
		if ( !$('.header-image').hasClass('loading') && headerImageTextOverlayOpacity.length > 0 && headerImageTextOverlayOpacity.outerHeight() >= headerImageTextOverlay.height() ) {
			headerImageTextOverlayOpacity.addClass('constrained');
		} else {
			headerImageTextOverlayOpacity.removeClass('constrained');
		}
    }
    
    function namaha_set_slider_controls_visibility() {
    	var sliderContainer = $('.slider-container.default'); 
		var controlsContainer = $( '.slider-container.default .controls-container' );
		var textOverlayOpacity = $( '.slider-container.default .slider .slide .overlay-container .overlay .opacity' );

		if ( !sliderContainer.hasClass('loading') && controlsContainer.length > 0 && textOverlayOpacity.length > 0 && textOverlayOpacity.css('display') != 'none' ) {
			var prevButton = $( '.slider-container.default .controls-container .controls .prev' );
			var nextButton = $( '.slider-container.default .controls-container .controls .next' );
			
			var prevButtonLeftOffset = 0;
			var nextButtonLeftOffset = 0;

			var textOverlayOpacityLeftOffset = textOverlayOpacity.offset().left - sliderContainer.offset().left;
			var textOverlayOpacityRightOffset = controlsContainer.width() - ( textOverlayOpacityLeftOffset + textOverlayOpacity.outerWidth() );
			
			if ( prevButton.css('left').indexOf('px') > -1 ) {
				prevButtonLeftOffset = parseFloat( prevButton.css('left').replace('px', '') ); 
			} else if ( prevButton.css('left').indexOf('%') > -1 ) {
				prevButtonLeftOffset = ( parseFloat( prevButton.css('left').replace('%', '') ) * controlsContainer.width() ) / 100;
			}
	
			if ( nextButton.css('right').indexOf('px') > -1 ) {
				nextButtonLeftOffset = parseFloat( nextButton.css('left').replace('px', '') ); 
			} else if ( nextButton.css('right').indexOf('%') > -1 ) {
				nextButtonLeftOffset = ( parseFloat( nextButton.css('left').replace('%', '') ) * controlsContainer.width() ) / 100;
			}
			
			if (
				textOverlayOpacityLeftOffset - ( prevButtonLeftOffset + prevButton.outerWidth() ) <= 10 || 
				nextButtonLeftOffset - textOverlayOpacityRightOffset <= 10
			) {
				controlsContainer.css('display', 'none');
			} else {
				controlsContainer.css('display', 'block');
			}
    	}
    }
	
    // Initalise fittext
    function initFittext() {
        $('.slider-container.default .slider .slide .overlay-container .overlay .opacity h1, .slider-container.default .slider .slide .overlay-container .overlay .opacity h2').fitText(2, { minFontSize: '17px', maxFontSize: '40px' });
        $('.slider-container.default .slider .slide .overlay-container .overlay .opacity').fitText(2.5, { minFontSize: '13px', maxFontSize: '24px' });
        $('.header-image .overlay-container .overlay .opacity h1, .header-image .overlay-container .overlay .opacity h2').fitText(2, { minFontSize: '17px', maxFontSize: '40px' });
        $('.header-image .overlay-container .overlay .opacity').fitText(2.5, { minFontSize: '13px', maxFontSize: '24px' });
    }

    // Initalise fitbutton
    function initFitbutton() {
		$('.slider-container.default .slider .slide .overlay-container .overlay .opacity').fitButton(2.5, { minFontSize: '10px', maxFontSize: '15px', minHorizontalPadding: '10px', maxHorizontalPadding: '29px', minVerticalPadding: '12px', maxVerticalPadding: '20px' });
		$('.header-image .overlay-container .overlay .opacity').fitButton(2.5, { minFontSize: '10px', maxFontSize: '15px', minHorizontalPadding: '10px', maxHorizontalPadding: '29px', minVerticalPadding: '12px', maxVerticalPadding: '20px' });
    }
    
    function namaha_set_search_block_position() {
    	if ( $('.search-button').length > 0 ) {
    		$('.search-slidedown .search-block').css('left', ( $('.search-button').position().left + parseInt( $('.search-button').css('padding-left').replace('px', '') ) ) - ( $('.search-slidedown .search-block').width() - $('.search-button').width() ) );
    	}
    }
    
    function namaha_toggle_header_element_opacity() {
    	//
    	if ( !($('body').hasClass('mobile-device') && $('.site-header').hasClass('mobile-sticky-disabled')) ) {
    	
		    if ( namaha_get_viewport().width <= solidify_breakpoint ) {
	    		if ( $('.site-header').hasClass('transparent') ) {
	    			$('.site-header').data('opacity', 'transparent');
	    			$('.site-header').removeClass('transparent');
	    		} else if ( $('.site-header').hasClass('translucent') ) {
	    			$('.site-header').data('opacity', 'translucent');
	    			$('.site-header').removeClass('translucent');
	    		}
	
	    		if ( $('.site-header').hasClass('floated') ) {
	    			$('.site-header').addClass('mustBeFloated').removeClass('floated');
	    		}
	    		if ( ( $('.site-header').data('opacity') == 'transparent' || $('.site-header').data('opacity') == 'translucent' ) && solidify ) {
	    			$('.site-header').addClass('fauxSolid');
	    		}
	    		
	    		if ( $main_navigation.hasClass('transparent') ) {
	    			$main_navigation.data('opacity', 'transparent');
	    			$main_navigation.removeClass('transparent');
	    		} else if ( $main_navigation.hasClass('translucent') ) {
	    			$main_navigation.data('opacity', 'translucent');
	    			$main_navigation.removeClass('translucent');
	    		}
	    		
	    		if ( $main_navigation.hasClass('floated') ) {
	    			$main_navigation.addClass('mustBeFloated').removeClass('floated');
	    		}
	    		if ( ( $main_navigation.data('opacity') == 'transparent' || $main_navigation.data('opacity') == 'translucent' ) && solidify ) {
	    			$main_navigation.addClass('fauxSolid');
	    		}
	    		
		    } else {
		    	if ( !$('.site-header').hasClass('fauxSolid') && !$('.site-header').hasClass('floated') ) {
		    		$('.site-header').addClass( $('.site-header').data('opacity' ) );
		    	}
		    	if ( $('.site-header').hasClass('mustBeFloated') ) {
		    		$('.site-header').addClass( 'floated' );
	        		$('.site-header').removeClass('fauxSolid mustBeFloated');
		    	}
		    	
		    	if ( !$main_navigation.hasClass('fauxSolid') && !$main_navigation.hasClass('floated') ) {
		    		$main_navigation.addClass( $main_navigation.data('opacity' ) );
		    	}
		    	if ( $main_navigation.hasClass('mustBeFloated') ) {
		    		$main_navigation.addClass( 'floated' );
	        		$main_navigation.removeClass('fauxSolid mustBeFloated');
		    	}
		    	
		    }
		    
    	}
	    
    }
    
    function namaha_set_slider_height() {
        // Set the height of the slider to the height of the first slide's image
    	var firstSlide  = $(".slider-container.default .slider .slide:eq(0)");
    	var headerImage = $(".header-image img");
    	if ( firstSlide.length > 0 ) {
    		var firstSlideImage = firstSlide.find('img').first();
    		
    		if ( firstSlideImage.length > 0) {
    			
    			if ( firstSlideImage.attr('height') > 0 ) {
    				
    				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
    				var firstSlideImageWidth  = firstSlideImage.attr('width');
    				var firstSlideImageHeight = firstSlideImage.attr('height');
    				var sliderWidth = $('.slider-container').width();
    				var widthPercentage;
    				var widthRatio;
    				
    				widthRatio = sliderWidth / firstSlideImageWidth;
    				
    				$('.slider-container.loading').css('height', Math.round( widthRatio * firstSlideImageHeight ) + parseInt( $('.slider-container').css('paddingTop').replace('px', '') ) );
    			}
    		}
    	} else if ( headerImage.length > 0 ) {
    		
    		if ( headerImage.attr('height') > 0 ) {

				// The height needs to be dynamically calculated with responsive in mind ie. the height of the image will obviously grow
				var headerImageWidth  = headerImage.attr('width');
				var headerImageHeight = headerImage.attr('height');
				var headerImageContainerWidth = $('.header-image').width();
				var widthPercentage;
				var widthRatio;
				
				widthRatio = headerImageContainerWidth / headerImageWidth;
				
				$('.header-image.loading').css('height', Math.round( widthRatio * headerImageHeight ) + parseInt( $('.header-image').css('paddingTop').replace('px', '') ) );
    		}
    	}
    }
    
    function namaha_pad_text_overlay_container() {
    	var textOverlayOffset;
    	var sliderControlsOffset = 0;
		var main_navigation_parent_item;
		
		if ( $( $main_navigation_selector + ' .menu > li').length > 0 ) {
			main_navigation_parent_item = $( $main_navigation_selector + ' .menu > li');
		} else {
			main_navigation_parent_item = $( $main_navigation_selector + ' .menu > ul > li');
		}

    	if ( $('.site-header').hasClass('translucent') || $('.site-header').hasClass('transparent') || $('.site-header').hasClass('floated') || $('.site-header').hasClass('mustBeFloated') ) {

    		textOverlayOffset = $('.site-header .site-logo-area').outerHeight(true);
    		sliderControlsOffset = $('.site-header .site-logo-area').outerHeight(true);
    		
    		// Only include the height of the navigation menu if it's positioned below the site logo container
    		// NB: THIS NEEDS TO BE RETHOUGHT BECAUSE IF THE LOGO COMES DOWN LOWER THAN THE NAV THE PADDING SHOULD BE BASED ON THE LOGO
    		// ALSO IN THE EVENT THAT THE NAVIGATION MENU IS POSITIONED BELOW THE SITE LOGO AND IS TRANSPARENT IT SHOULD NOT COUNT THE ENTIRE NAVGATION HEIGHT
    		//if ( $('.site-header.left-aligned ' + $main_navigation_selector + '.inline').length > 0 ) {
    		
    	} else if ( ( $( $main_navigation_selector + '.translucent').length > 0 || $( $main_navigation_selector + '.transparent').length > 0 ) && !$main_navigation.hasClass('below-header-media') ) {
    		textOverlayOffset = $main_navigation.outerHeight(true);
    		sliderControlsOffset = $main_navigation.outerHeight(true);
    		
    		// Reduce the offset if the rollover style of the navigation menu is an underline and the navigation menu is inline or transparent
    		if ( $( $main_navigation_selector + '.transparent').length > 0 && ( $( $main_navigation_selector + '.rollover-underline').length > 0 ) ) {
				textOverlayOffset = textOverlayOffset - main_navigation_parent_item.css('paddingBottom').replace('px', '');
				sliderControlsOffset = sliderControlsOffset - main_navigation_parent_item.css('paddingBottom').replace('px', '');
				
				if ( $( $main_navigation_selector + ' .menu .indicator' ).length > 0 ) {
					textOverlayOffset -= ( parseInt( $( $main_navigation_selector + ' .menu .indicator' ).css('marginBottom').replace('px', '') ) ) ;
					sliderControlsOffset += $( $main_navigation_selector + ' .menu .indicator' ).height();
					
					textOverlayOffset -= ( parseInt( $( $main_navigation_selector + ' .menu .indicator' ).css('marginBottom').replace('px', '') ) ) ;
					sliderControlsOffset += $( $main_navigation_selector + ' .menu .indicator' ).height();
				}
			}
    		
    	}
    	
    	if ( textOverlayOffset ) {
			// If the default slider is being used and there's a text overlay then set the top padding 
			if ( $('.slider-container.default .slider .slide .overlay-container').length > 0 ) {
				$('.slider-container .slider .slide .overlay-container').css('paddingTop', textOverlayOffset);
				$('.slider-container .controls-container').css('marginTop', sliderControlsOffset);
				
			// If there's a header image text overlay then set the top padding
			} else if ( $('.header-image .overlay-container').length > 0 ) {
				// You need to include the height of the top bar as the overlay container has an absolute position and doesn't obey the padding set in namaha_set_top_bar_offset
				$('.header-image .overlay-container').css('paddingTop', textOverlayOffset);
			}
    	}
	}
    
    function namaha_get_viewport() {
        var e = window;
        var a = 'inner';
        
        if ( !('innerWidth' in window ) ) {
            a = 'client';
            e = document.documentElement || document.body;
        }
    	
        return {
        	width: e[ a + 'Width' ],
        	height: e[ a + 'Height' ]
        };
    }
    
    function namaha_get_scrollbar_width() {

  	  // Creating invisible container
  	  const outer = document.createElement('div');
  	  outer.style.visibility = 'hidden';
  	  outer.style.overflow = 'scroll'; // forcing scrollbar to appear
  	  outer.style.msOverflowStyle = 'scrollbar'; // needed for WinJS apps
  	  document.body.appendChild(outer);

  	  // Creating inner element and placing it in the container
  	  const inner = document.createElement('div');
  	  outer.appendChild(inner);

  	  // Calculating difference between container's full width and the child width
  	  const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);

  	  // Removing temporary elements from the DOM
  	  outer.parentNode.removeChild(outer);

  	  return scrollbarWidth;
  	}
    
    function namaha_image_has_loaded() {
    	var container;

    	$('.hiddenUntilLoadedImageContainer img').on('load',function(){
	    	container = $(this).parents('.hiddenUntilLoadedImageContainer');
	    	container.removeClass('loading');
	    	
	    	(function(container){
	    	    setTimeout(function() {
	    	    	container.addClass('transition');
	    	    }, 50);
	    	})(container);
	    });
    	
	    $('img.hideUntilLoaded').on('load', function(){
	    	container = $(this).parents('.featured-image-container');
	    	container.removeClass('loading');
	    });
	}
    
    function namaha_home_slider() {
    	if ( $('.slider').length ) {
    	
	        $(".slider").carouFredSel({
	            responsive: true,
	            circular: true,
	            infinite: false,
	            width: 1200,
	            height: 'variable',
	            items: {
	                visible: 1,
	                width: 1200,
	                height: 'variable'
	            },
	            onCreate: function(items) {
        			initFittext();
        			initFitbutton();

            		namaha_pad_text_overlay_container();
        			
	            	$('.site-header').removeClass('forced-solid');
	            	$('.slider-container').css('height', 'auto');
	            	$('.slider-container').removeClass('loading');
	            	
	            	//setTimeout(function(){
	            		namaha_set_slider_controls_visibility();
		    			namaha_constrain_text_overlay_opacity();
	            	//}, 1000);
	            },
	            scroll: {
	                fx: 'uncover-fade',
	                duration: sliderTransitionSpeed
	            },
	            auto: false,
	            pagination: '.slider-container.default .pagination',
	            prev: ".slider-container.default .prev",
	            next: ".slider-container.default .next",
	            swipe: {
	            	onTouch: true
	            }
	        });

    	}
    }

    function trapFocus( element, namespace ) {
	    var focusableEls = element.find( 'a, button' );
	    var firstFocusableEl = focusableEls[0];
	    var lastFocusableEl = focusableEls[focusableEls.length - 1];
	    var KEYCODE_TAB = 9;
	
	    firstFocusableEl.focus();
	
	    element.keydown( function(e) {
	        var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );
	
	        if ( !isTabPressed ) { 
	            return;
	        }
	
	        if ( e.shiftKey ) /* shift + tab */ {
	            if ( document.activeElement === firstFocusableEl ) {
	                lastFocusableEl.focus();
	                e.preventDefault();
	            }
	        } else /* tab */ {
	            if ( document.activeElement === lastFocusableEl ) {
	                firstFocusableEl.focus();
	                e.preventDefault();
	            }
	        }
	
	    });
    }

} )( jQuery );