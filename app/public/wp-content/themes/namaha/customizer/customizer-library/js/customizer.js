/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Custom logo
	wp.customize( 'custom_logo', function( value ) {
		value.bind( function( to ) {
			$( '.site-header .branding .custom-logo-link' ).addClass('custom-logo-link-removed').removeClass('custom-logo-link');
			
			if ( to ) {
				window.parent.jQuery( '#customize-control-namaha-translucent-header-logo' ).removeClass( 'hidden' );
				window.parent.jQuery( '#customize-control-namaha-transparent-header-logo' ).removeClass( 'hidden' );
			} else {
				window.parent.jQuery( '#customize-control-namaha-translucent-header-logo' ).addClass( 'hidden' );
				window.parent.jQuery( '#customize-control-namaha-transparent-header-logo' ).addClass( 'hidden' );
			}
		} );
	} );
	
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-header .branding .title' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-header .branding .description' ).text( to );
		} );
	} );

	/*
	// Background color
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			$( '.content-container' ).css( {
				'background-color': to
			} );
		} );
	} );
	*/
	
	/*
	wp.customize.section( 'header_image', function( section ) {
    	section.expanded.bind( function( isExpanded ) {
        	var url;
            if ( isExpanded ) {
            	url = wp.customize.settings.url.home;
            	wp.customize.previewer.previewUrl.set( url );
            }
        } );
    } );
	*/
	
	function namaha_get_option( id, value ) {
		var api = wp.customize;
		
		var control = api.control.instance( id );
	    return control.setting.get();
	}

} )( jQuery );
