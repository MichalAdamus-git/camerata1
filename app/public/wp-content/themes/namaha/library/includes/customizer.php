<?php
/**
 * Namaha Theme Customizer
 *
 * @package Namaha
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function namaha_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'namaha_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function namaha_customize_preview_js() {
	wp_enqueue_script( 'namaha_customizer', get_template_directory_uri() . '/library/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'namaha_customize_preview_js' );

/**
 * Enqueue Namaha custom customizer styling.
 */
function namaha_load_customizer_script() {
    wp_enqueue_script( 'namaha-customizer-custom', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), NAMAHA_THEME_VERSION, true );
    wp_enqueue_style( 'namaha-customizer', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'namaha_load_customizer_script' );


/**
 * Function to create Customizer internal linking.
 */
function namaha_customizer_internal_links() { ?>
	<script type="text/javascript">
		(function($) {
			$(document).ready(function() {
				var api = wp.customize;
				api.bind('ready', function() {
					$(['control', 'section', 'panel']).each(function(i, type) {
						$('a[rel="tc-'+type+'"]').click(function(e) {
							e.preventDefault();
							var id = $(this).attr('href').replace('#', '');
							if(api[type].has(id)) {
								api[type].instance(id).focus();
							}
						});
					});
				});
			});
		})(jQuery);
	</script><?php
}

add_action( 'customize_controls_print_scripts', 'namaha_customizer_internal_links' );
