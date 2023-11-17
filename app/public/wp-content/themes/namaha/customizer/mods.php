<?php
/**
 * Functions used to implement options
 *
 * @package Customizer Library Demo
 */

/**
 * Enqueue Google Fonts Example
 */
function namaha_customizer_theme_fonts() {
	
	$default_fonts = array(
		'namaha-site-title-font',
		'namaha-navigation-menu-font',
		'namaha-heading-font',
		'namaha-body-font',
		'namaha-button-font'
	);
	
	$font_families = array();
	
	foreach ( $default_fonts as $font ) {
		$fontmod = get_theme_mod( $font, customizer_library_get_default( $font ) );
	    if ( $fontmod != customizer_library_get_default( $font ) ) {
			$font_families[] = $fontmod;
	    }	
	}

	$font_uri = customizer_library_get_google_font_uri( $font_families );

	// Load Google Fonts
	wp_enqueue_style( 'namaha_customizer_theme_fonts', $font_uri, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'namaha_customizer_theme_fonts' );