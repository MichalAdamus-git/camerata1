/**
 * Namaha Customizer Custom Functionality
 *
 */
( function( $ ) {
	
	function namaha_set_option( id, value ) {
		var api = wp.customize;
		
		var control = api.control.instance( id );
	    control.setting.set( value );
	    return;
	}
	
    $( document ).ready( function() {

    	// Show / Hide branding container settings
        namaha_toggle_branding_container_settings();
        
        $( '#customize-control-namaha-site-branding-contained input' ).on( 'change', function() {
        	namaha_toggle_branding_container_settings();
        } );
        
        function namaha_toggle_branding_container_settings() {
        	if ( $( '#customize-control-namaha-site-branding-contained input' ).prop('checked') ) {
        		$( '#customize-control-namaha-site-branding-constrained-width' ).show();
        		
        		namaha_toggle_branding_constrained_width_settings();
        		
            } else {
            	$( '#customize-control-namaha-site-branding-constrained-width' ).hide();
            	$( '#customize-control-namaha-site-branding-width' ).hide();
            	
            }
        }
        
        // Show / Hide branding constrained width settings
        namaha_toggle_branding_constrained_width_settings();
        
        $( '#customize-control-namaha-site-branding-constrained-width input' ).on( 'change', function() {
        	namaha_toggle_branding_constrained_width_settings();
        } );
        
        function namaha_toggle_branding_constrained_width_settings() {
        	if ( $( '#customize-control-namaha-site-branding-constrained-width input' ).prop('checked') ) {
        		$( '#customize-control-namaha-site-branding-width' ).show();
        	
        	} else {
            	$( '#customize-control-namaha-site-branding-width' ).hide();
            }
        }

        // Show / hide branding overhang amount
        $( '#customize-control-namaha-site-branding-overhang input' ).on( 'change', function() {
        	namaha_toggle_branding_overhang_amount();
        } );
    	
    	// Show / Hide Navigation Menu Color setting
        namaha_toggle_navigation_settings();
        
        $( '#customize-control-namaha-navigation-menu-alignment select' ).on( 'change', function() {
        	namaha_toggle_navigation_settings();
        } );
        
        function namaha_toggle_navigation_settings() {
        	var navigationLayout = $( '#customize-control-namaha-navigation-menu-alignment select' ).val();
        	
            if ( navigationLayout == 'inline' ) {
            	$( '#customize-control-namaha-navigation-menu-rollover-underline-align-bottom' ).show();
            	$( '#customize-control-namaha-navigation-menu-color' ).hide();
            } else {
            	$( '#customize-control-namaha-navigation-menu-rollover-underline-align-bottom' ).hide();
            	$( '#customize-control-namaha-navigation-menu-color' ).show();
            }
        }        
    	
    	// Show / Hide Navigation Menu Search settings
        namaha_toggle_navigation_search_settings();
        
        $( '#customize-control-namaha-navigation-menu-search-type select' ).on( 'change', function() {
        	namaha_toggle_navigation_search_settings();
        } );
        
        function namaha_toggle_navigation_search_settings() {
        	var searchType = $( '#customize-control-namaha-navigation-menu-search-type select' ).val();
        	
            if ( searchType != 'plugin' ) {
            	$( '#customize-control-namaha-navigation-menu-search-button-text' ).show();
            	$( '#customize-control-namaha-navigation-menu-search-plugin-shortcode' ).hide();
            } else {
            	$( '#customize-control-namaha-navigation-menu-search-button-text' ).hide();
            	$( '#customize-control-namaha-navigation-menu-search-plugin-shortcode' ).show();
            }
        }        
        
    	// Show / Hide slider settings
        namaha_toggle_slider_settings();
        
        $( '#customize-control-namaha-slider-type select' ).on( 'change', function() {
        	namaha_toggle_slider_settings();
        } );
        
        function namaha_toggle_slider_settings() {
        	var sliderType = $( '#customize-control-namaha-slider-type select' ).val();
        	
            if ( sliderType == 'namaha-slider-default' ) {
            	$( '#customize-control-namaha-default-slider-info' ).show();
            	$( '#customize-control-namaha-slider-plugin-info' ).hide();
                $( '#customize-control-namaha-slider-categories' ).show();
                $( '#customize-control-namaha-slider-overlay-opacity' ).show();
                $( '#customize-control-namaha-slider-text-overlay-text-shadow' ).show();
                $( '#customize-control-namaha-slider-has-min-width' ).show();

            	namaha_toggle_slider_min_width();
                
            	$( '#customize-control-namaha-slider-transition-speed' ).show();
            	
                $( '.divider.default-slider' ).parent('li').show();
                
                $( '#customize-control-namaha-slider-plugin-shortcode' ).hide();
                
                // Header image visibility warning
                $( '#customize-control-namaha-slider-enabled-warning' ).show();
                
            } else if ( sliderType == 'namaha-slider-plugin' ) {
            	$( '#customize-control-namaha-default-slider-info' ).hide();
            	$( '#customize-control-namaha-slider-plugin-info' ).show();
                $( '#customize-control-namaha-slider-categories' ).hide();
                $( '#customize-control-namaha-slider-overlay-opacity' ).hide();
                $( '#customize-control-namaha-slider-text-overlay-text-shadow' ).hide();
                $( '#customize-control-namaha-slider-has-min-width' ).hide();
                $( '#customize-control-namaha-slider-min-width' ).hide();
                
                $( '#customize-control-namaha-slider-transition-speed' ).hide();
                
                $( '.divider.default-slider' ).parent('li').hide();
                
                $( '#customize-control-namaha-slider-plugin-shortcode' ).show();
                
                // Header image visibility warning
                $( '#customize-control-namaha-slider-enabled-warning' ).show();
                
            } else {
            	$( '#customize-control-namaha-default-slider-info' ).hide();
            	$( '#customize-control-namaha-slider-plugin-info' ).hide();
	            $( '#customize-control-namaha-slider-categories' ).hide();
                $( '#customize-control-namaha-slider-overlay-opacity' ).hide();
                $( '#customize-control-namaha-slider-text-overlay-text-shadow' ).hide();
                $( '#customize-control-namaha-slider-has-min-width' ).hide();
                $( '#customize-control-namaha-slider-min-width' ).hide();
                
                $( '#customize-control-namaha-slider-transition-speed' ).hide();
                
                $( '.divider.default-slider' ).parent('li').hide();
                
                $( '#customize-control-namaha-slider-plugin-shortcode' ).hide();
             
                // Header image visibility warning
                $( '#customize-control-namaha-slider-enabled-warning:not(:has(.dont-hide))' ).hide();
                
            }
        }
    	
        // Show / hide slider min width
        $( '#customize-control-namaha-slider-has-min-width input' ).on( 'change', function() {
        	namaha_toggle_slider_min_width();
        } );
        
        function namaha_toggle_slider_min_width() {
        	if ( $( '#customize-control-namaha-slider-has-min-width input' ).prop('checked') && $( '#customize-control-namaha-slider-has-min-width input' ).is(':visible') ) {
        		$( '#customize-control-namaha-slider-min-width' ).show();
        	} else {
        		$( '#customize-control-namaha-slider-min-width' ).hide();
        	}
        }        

        // Show / hide header image min width
        namaha_toggle_header_image_min_width();
        
        $( '#customize-control-namaha-header-image-has-min-width input' ).on( 'change', function() {
        	namaha_toggle_header_image_min_width();
        } );
        
        function namaha_toggle_header_image_min_width() {
        	if ( $( '#customize-control-namaha-header-image-has-min-width input' ).prop('checked') && $( '#customize-control-namaha-header-image-has-min-width input' ).is(':visible') ) {
        		$( '#customize-control-namaha-header-image-min-width' ).show();
        	} else {
        		$( '#customize-control-namaha-header-image-min-width' ).hide();
        	}
        }
        
        // Show / hide blog archive options
        namaha_toggle_blog_archive_settings();
        
        $( '#customize-control-namaha-blog-archive-layout select' ).on( 'change', function() {
        	namaha_toggle_blog_archive_settings();
        } );
        
        function namaha_toggle_blog_archive_settings() {
        	var blogArchiveLayout = $( '#customize-control-namaha-blog-archive-layout select' ).val();
        	
            if ( blogArchiveLayout == 'namaha-blog-archive-layout-full' ) {
                $( '#customize-control-namaha-blog-excerpt-length' ).hide();
        		$( '#customize-control-namaha-blog-read-more-text' ).hide();
                
            } else if ( blogArchiveLayout == 'namaha-blog-archive-layout-excerpt' ) {
                $( '#customize-control-namaha-blog-excerpt-length' ).show();
                $( '#customize-control-namaha-blog-read-more' ).show();
             
                namaha_toggle_blog_read_more_settings();
                
            }
        }
        
    } );
    
} )( jQuery );