<?php
/**
 * Functions for users wanting to upgrade to premium
 *
 * @package Namaha
 */

/**
 * Display the upgrade to Premium page & load styles.
 */
function namaha_premium_admin_menu() {
    global $namaha_upgrade_page;
    $namaha_upgrade_page = add_theme_page(
    	__( 'Namaha Premium', 'namaha' ),
    	'<span class="premium-link" style="">'. __( 'Namaha Premium', 'namaha' ) .'</span>',
    	'edit_theme_options',
    	'premium_upgrade',
    	'namaha_render_upgrade_page'
	);
}
add_action( 'admin_menu', 'namaha_premium_admin_menu' );

/**
 * Enqueue admin stylesheet only on upgrade page.
 */
function namaha_load_upgrade_page_scripts( $hook ) {
    global $namaha_upgrade_page;
    if ( $hook != $namaha_upgrade_page ) {
		return;
    }
    
    wp_enqueue_style( 'namaha-upgrade-body-font-default', '//fonts.googleapis.com/css?family=Lato:400,400italic', array(), NAMAHA_THEME_VERSION );
    wp_enqueue_style( 'namaha-upgrade-heading-font-default', '//fonts.googleapis.com/css?family=Montserrat:500,700', array(), NAMAHA_THEME_VERSION );
    wp_enqueue_style( 'namaha-upgrade', get_template_directory_uri() .'/upgrade/library/css/upgrade.css', array(), NAMAHA_THEME_VERSION );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/library/fonts/otb-font-awesome/css/font-awesome.css', array(), '4.7.0' );
    wp_enqueue_script( 'caroufredsel-js', get_template_directory_uri() .'/library/js/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), NAMAHA_THEME_VERSION, true );
    wp_enqueue_script( 'namaha-upgrade-custom-js', get_template_directory_uri() .'/upgrade/library/js/upgrade.js', array( 'jquery' ), NAMAHA_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'namaha_load_upgrade_page_scripts' );

/**
 * Render the premium upgrade/order page
 */
function namaha_render_upgrade_page() {

	if ( isset( $_GET['action'] ) ) {
		$action = $_GET['action'];
	} else {
		$action = 'view-page';
	}

	switch ( $action ) {
		case 'view-page':
			get_template_part( 'upgrade/library/template-parts/content', 'upgrade' );
			break;
	}
}
