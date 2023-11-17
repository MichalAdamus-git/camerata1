<?php
/**
 * Namaha functions and definitions
 *
 * @package Namaha
 */
define( 'NAMAHA_THEME_VERSION' , '1.0.37' );

global $solidify_breakpoint, $mobile_menu_breakpoint, $demo_slides;

$namaha_child_themes = array();

if ( empty( $demo_slides ) ) {
	$demo_slides = array(
		'slide1' => array(
			'image' => get_template_directory_uri() . '/library/images/demo/slider-default01.jpg',
			'text' => ''
		),
		'slide2' => array(
			'image' => get_template_directory_uri() . '/library/images/demo/slider-default02.jpg',
			'text' => ''
		)
	);
}

if ( ! function_exists( 'namaha_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function namaha_theme_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 837; /* pixels */
	}
	
	$editor_styles = array( 'library/css/editor-style.css' );
	
	$editor_styles[] = namaha_fonts_url();
	
	add_editor_style( $editor_styles );
	
	// Setting this to true can be used to test how the Premium theme will look for someone that had the free version intalled beforehand
	if ( !get_theme_mod( 'otb_namaha_dot_org' ) ) set_theme_mod( 'otb_namaha_dot_org', true );
	if ( !get_theme_mod( 'otb_namaha_activated' ) ) set_theme_mod( 'otb_namaha_activated', date('Y-m-d') );
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Namaha, use a find and replace
	 * to change 'namaha' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'namaha', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'namaha' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'navigation-widgets'
		)
	);
	
	/*
	 * Setup Custom Logo Support for theme
	* Supported from WordPress version 4.5 onwards
	* More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
	*/
	if ( function_exists( 'has_custom_logo' ) ) {
		add_theme_support( 'custom-logo' );
	}
	
	// The custom header is used if no slider is enabled
	add_theme_support( 'custom-header', array(
        'default-image' => get_template_directory_uri() . '/library/images/headers/default.jpg',
		'width'         => 1500,
		'height'        => 744,
		'flex-width'    => true,
		'flex-height'   => true,
		'header-text'   => false,
		'video' 		=> false
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'namaha_custom_background_args', array(
		'default-image' => '',
	) ) );
    
    add_theme_support( 'title-tag' );

	// Gutenberg Support
    add_theme_support( 'align-wide' );
    
	// Toggle WordPress 5.8+ block-based widgets
	if ( !get_theme_mod( 'namaha-gutenberg-enable-block-based-widgets', customizer_library_get_default( 'namaha-gutenberg-enable-block-based-widgets' ) ) ) {
		remove_theme_support( 'widgets-block-editor' );
	}
    
 	add_theme_support( 'woocommerce', array(
 		'gallery_thumbnail_image_width' => 300
 	) );
	
	if ( get_theme_mod( 'namaha-woocommerce-product-image-zoom', true ) ) {	
		add_theme_support( 'wc-product-gallery-zoom' );
	}	
	
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'custom-spacing' );
}
endif; // namaha_theme_setup
add_action( 'after_setup_theme', 'namaha_theme_setup' );

if ( ! function_exists( 'namaha_fonts_url' ) ) :
	/**
	 * Register custom fonts.
	 */
	function namaha_fonts_url() {
		$fonts_url = '';
	
		$font_families = array();
		
		$font_families[] = 'Philosopher:100,300,400,500,600,700,800';
		$font_families[] = 'Lato:300,300italic,400,400italic,600,600italic,700,700italic';
		$font_families[] = 'Lora:400italic';
		
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
	
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	
		return esc_url_raw( $fonts_url );
	}
endif;

/**
 * Enqueue admin scripts and styles.
 */
function namaha_admin_scripts() {
	wp_enqueue_style( 'namaha-admin', get_template_directory_uri() . '/library/css/admin.css', array(), NAMAHA_THEME_VERSION );
	wp_enqueue_script( 'namaha-admin', get_template_directory_uri() . '/library/js/admin.js', NAMAHA_THEME_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'namaha_admin_scripts' );

// Adjust content_width for full width pages
function namaha_adjust_content_width() {
    global $content_width;

	if ( namaha_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}

    if ( is_page_template( 'template-full-width.php' ) || is_page_template( 'template-full-width-no-bottom-margin.php' ) ) {
    	$content_width = 1140;
	} else if ( ( is_page_template( 'template-left-primary-sidebar.php' ) || basename( get_page_template() ) === 'page.php' ) && !is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 1140;
	} else if ( is_single() && !$is_woocommerce && get_theme_mod( 'namaha-blog-full-width-single', customizer_library_get_default( 'namaha-blog-full-width-single' ) ) ) {
		$content_width = 1140;
	} else if ( is_search() && get_theme_mod( 'namaha-search-results-full-width', customizer_library_get_default( 'namaha-search-results-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( namaha_is_woocommerce_activated() && is_shop() && get_theme_mod( 'namaha-layout-woocommerce-shop-full-width', customizer_library_get_default( 'namaha-layout-woocommerce-shop-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( namaha_is_woocommerce_activated() && is_product() && get_theme_mod( 'namaha-layout-woocommerce-product-full-width', customizer_library_get_default( 'namaha-layout-woocommerce-product-full-width' ) ) ) {
		$content_width = 1140;
	} else if ( namaha_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && get_theme_mod( 'namaha-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'namaha-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$content_width = 1140;
	}
}
add_action( 'template_redirect', 'namaha_adjust_content_width' );

function namaha_review_notice() {
	$user_id = get_current_user_id();
	$message = 'Thank you for using Namaha! We hope you\'re enjoying the theme, please consider <a href="https://wordpress.org/support/theme/namaha/reviews/#new-post" target="_blank">rating it on wordpress.org</a> :)';
	
	if ( !get_user_meta( $user_id, 'namaha_review_notice_dismissed' ) ) {
		$class = 'notice notice-success is-dismissible';
		printf( '<div class="%1$s"><p>%2$s</p><p><a href="?namaha-review-notice-dismissed">Dismiss this notice</a></p></div>', esc_attr( $class ), $message );
	}
}
$today = new DateTime( date( 'Y-m-d' ) );
$activate  = new DateTime( date( get_theme_mod( 'otb_namaha_activated' ) ) );
if ( $activate->diff($today)->d >= 14 ) {
	add_action( 'admin_notices', 'namaha_review_notice' );
}

function namaha_review_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['namaha-review-notice-dismissed'] ) ) {
		add_user_meta( $user_id, 'namaha_review_notice_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'namaha_review_notice_dismissed' );

function namaha_admin_notice() {
	$user_id = get_current_user_id();
	
	$message = array (
		'id' => 17,
		'heading' => 'Christmas Sale',
		'text' => '<a href="https://www.outtheboxthemes.com/go/theme-notification-christmas-day-2022-wordpress-themes/"><span style="font-size: 20px">🎄</span>Get 20% off any of our Premium WordPress themes until Christmas Day!<span style="font-size: 20px">🎄</span></a>',
		'link' => 'https://www.outtheboxthemes.com/go/theme-notification-christmas-day-2022-wordpress-themes/'
	);
	
	if ( !empty( $message['text'] ) && !get_user_meta( $user_id, 'namaha_admin_notice_' .$message['id']. '_dismissed' ) ) {
		$class = 'notice otb-notice notice-success is-dismissible';
		printf( '<div class="%1$s"><img src="https://www.outtheboxthemes.com/wp-content/uploads/2020/12/logo-red.png" class="logo" /><h3>%2$s</h3><p>%3$s</p><p style="margin:0;"><a class="button button-primary" href="%4$s" target="_blank">Read More</a> <a class="button button-dismiss" href="?namaha-admin-notice-dismissed&namaha-admin-notice-id=%5$s">Dismiss</a></p></div>', esc_attr( $class ), $message['heading'], $message['text'], $message['link'], $message['id'] );
	}
}

if ( date('Y-m-d') <= '2022-12-25' ) {
	add_action( 'admin_notices', 'namaha_admin_notice' );
}

function namaha_admin_notice_dismissed() {
    $user_id = get_current_user_id();
    if ( isset( $_GET['namaha-admin-notice-dismissed'] ) ) {
    	$namaha_admin_notice_id = $_GET['namaha-admin-notice-id'];
		add_user_meta( $user_id, 'namaha_admin_notice_' .$namaha_admin_notice_id. '_dismissed', 'true', true );
	}
}
add_action( 'admin_init', 'namaha_admin_notice_dismissed' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function namaha_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'namaha' ),
		'id'            => 'sidebar-1',
		'description'   => 'This sidebar will appear on the Blog or any page that uses either the Default or Left Primary Sidebar template.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
	
	register_sidebar(array(
		'name' => __( 'Footer', 'namaha' ),
		'id' => 'footer',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div><div class="divider"></div>' 
	));
	
	register_sidebar(array(
		'name' => __( 'Footer Bottom Bar - Right', 'namaha' ),
		'id' => 'footer-bottom-bar-right',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>' 
	));
}
add_action( 'widgets_init', 'namaha_widgets_init' );

function namaha_set_variables() {
	global $solidify_breakpoint, $mobile_menu_breakpoint;
	
	$mobile_menu_breakpoint = 1000;
	$solidify_breakpoint = 1000;
}
add_action('init', 'namaha_set_variables', 10);

/**
 * Enqueue scripts and styles.
 */
function namaha_theme_scripts() {
	global $solidify_breakpoint, $mobile_menu_breakpoint;
	
	wp_enqueue_style( 'namaha-fonts', namaha_fonts_url(), array(), NAMAHA_THEME_VERSION );
	wp_enqueue_style( 'namaha-header-left-aligned', get_template_directory_uri().'/library/css/header-left-aligned.css', array(), NAMAHA_THEME_VERSION );
	
	if ( get_theme_mod( 'namaha-font-awesome-version', customizer_library_get_default( 'namaha-font-awesome-version' ) ) == '4.7.0' ) {
		wp_enqueue_style( 'otb-font-awesome-otb-font-awesome', get_template_directory_uri().'/library/fonts/otb-font-awesome/css/otb-font-awesome.css', array(), '4.7.0' );
		wp_enqueue_style( 'otb-font-awesome-font-awesome-min', get_template_directory_uri().'/library/fonts/otb-font-awesome/css/font-awesome.min.css', array(), '4.7.0' );
	} else if ( get_theme_mod( 'namaha-font-awesome-version', customizer_library_get_default( 'namaha-font-awesome-version' ) ) == '5.5.0' ) {
		wp_enqueue_style( 'otb-font-awesome', '//use.fontawesome.com/releases/v5.5.0/css/all.css', array(), '5.5.0' );
	} else {
		wp_enqueue_style( 'otb-font-awesome', '//use.fontawesome.com/releases/v6.1.1/css/all.css', array(), '6.1.1' );
	}
	
	wp_enqueue_style( 'namaha-style', get_stylesheet_uri(), array(), NAMAHA_THEME_VERSION );
	
	if ( namaha_is_woocommerce_activated() ) {
    	wp_enqueue_style( 'namaha-woocommerce-custom', get_template_directory_uri().'/library/css/woocommerce-custom.css', array(), NAMAHA_THEME_VERSION );
	}

	wp_enqueue_script( 'namaha-navigation', get_template_directory_uri() . '/library/js/navigation.js', array(), NAMAHA_THEME_VERSION, true );
	wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/library/js/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), NAMAHA_THEME_VERSION, true );
	wp_enqueue_script( 'namaha-touchswipe', get_template_directory_uri() . '/library/js/jquery.touchSwipe.min.js', array('jquery'), NAMAHA_THEME_VERSION, true );
	wp_enqueue_script( 'namaha-color', get_template_directory_uri() . '/library/js/jquery.color.min.js', array('jquery'), NAMAHA_THEME_VERSION, true );
	wp_enqueue_script( 'namaha-fittext', get_template_directory_uri() . '/library/js/jquery.fittext.min.js', array('jquery'), NAMAHA_THEME_VERSION, true );
	wp_enqueue_script( 'namaha-fitbutton', get_template_directory_uri() . '/library/js/jquery.fitbutton.min.js', array('jquery'), NAMAHA_THEME_VERSION, true );
	wp_enqueue_script( 'namaha-custom', get_template_directory_uri() . '/library/js/custom.js', array('jquery'), NAMAHA_THEME_VERSION, true );
	
    $namaha_client_side_variables = array(
    	'site_url' 				 => site_url(),
    	'solidify_breakpoint' 	 => $solidify_breakpoint,
		'sliderTransitionSpeed'  => intval( get_theme_mod( 'namaha-slider-transition-speed', customizer_library_get_default( 'namaha-slider-transition-speed' ) ) ),
    	'mobile_menu_breakpoint' => intval( $mobile_menu_breakpoint ),
    	'fontAwesomeVersion'	 => get_theme_mod( 'namaha-font-awesome-version', customizer_library_get_default( 'namaha-font-awesome-version' ) ),
    );
    
    wp_localize_script( 'namaha-custom', 'namaha', $namaha_client_side_variables );

	wp_enqueue_script( 'namaha-skip-link-focus-fix', get_template_directory_uri() . '/library/js/skip-link-focus-fix.js', array(), NAMAHA_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'namaha_theme_scripts' );

function namaha_set_elementor_default_schemes( $config ) {
	echo '<!--';
	echo 'namaha_set_elementor_default_schemes'; 
	echo '-->';
	
	// Primary
	$config['schemes']['items']['color']['items']['1']['value'] = get_theme_mod( 'namaha-heading-font-color', customizer_library_get_default( 'namaha-heading-font-color' ) );
	
	// Secondary
	$config['schemes']['items']['color']['items']['2']['value'] = get_theme_mod( 'namaha-primary-color', customizer_library_get_default( 'namaha-primary-color' ) );
	
	// Text
	$config['schemes']['items']['color']['items']['3']['value'] = get_theme_mod( 'namaha-body-font-color', customizer_library_get_default( 'namaha-body-font-color' ) );
	
	// Accent
	$config['schemes']['items']['color']['items']['4']['value'] = get_theme_mod( 'namaha-primary-color', customizer_library_get_default( 'namaha-primary-color' ) );

	$config['default_schemes']['color']['items'] = [
		'1' => get_theme_mod( 'namaha-heading-font-color', customizer_library_get_default( 'namaha-heading-font-color' ) ),
		'2' => get_theme_mod( 'namaha-primary-color', customizer_library_get_default( 'namaha-primary-color' ) ),
		'3' => get_theme_mod( 'namaha-body-font-color', customizer_library_get_default( 'namaha-body-font-color' ) ),
		'4' => get_theme_mod( 'namaha-primary-color', customizer_library_get_default( 'namaha-primary-color' ) )
	];
	
	// Primary Headline
	$config['schemes']['items']['typography']['items']['1']['value'] = [
		'font-family' => get_theme_mod( 'namaha-heading-font', customizer_library_get_default( 'namaha-heading-font' ) ),
		'font-weight' => get_theme_mod( 'namaha-heading-font-weight', customizer_library_get_default( 'namaha-heading-font-weight' ) )
	];
	
	// Secondary Headline
	$config['schemes']['items']['typography']['items']['2']['value'] = [
		'font-family' => get_theme_mod( 'namaha-heading-font', customizer_library_get_default( 'namaha-heading-font' ) ),
		'font-weight' => get_theme_mod( 'namaha-heading-font-weight', customizer_library_get_default( 'namaha-heading-font-weight' ) )
	];

	// Body Text
	$config['schemes']['items']['typography']['items']['3']['value'] = [
		'font-family' => get_theme_mod( 'namaha-body-font', customizer_library_get_default( 'namaha-body-font' ) ),
		'font-weight' => '400'
	];

	// Accent Text
	$config['schemes']['items']['typography']['items']['4']['value'] = [
		'font-family' => get_theme_mod( 'namaha-heading-font', customizer_library_get_default( 'namaha-heading-font' ) ),
		'font-weight' => '400'
	];

	$config['schemes']['items']['color-picker']['items']['1']['value'] = get_theme_mod( 'namaha-primary-color', customizer_library_get_default( 'namaha-primary-color' ) );
	$config['schemes']['items']['color-picker']['items']['2']['value'] = get_theme_mod( 'namaha-secondary-color', customizer_library_get_default( 'namaha-secondary-color' ) );
	$config['schemes']['items']['color-picker']['items']['3']['value'] = get_theme_mod( 'namaha-body-font-color', customizer_library_get_default( 'namaha-body-font-color' ) );
	$config['schemes']['items']['color-picker']['items']['4']['value'] = get_theme_mod( 'namaha-link-color', customizer_library_get_default( 'namaha-link-color' ) );
	$config['schemes']['items']['color-picker']['items']['5']['value'] = get_theme_mod( 'namaha-footer-color', customizer_library_get_default( 'namaha-footer-color' ) );
	$config['schemes']['items']['color-picker']['items']['6']['value'] = '';
	$config['schemes']['items']['color-picker']['items']['7']['value'] = '';
	$config['schemes']['items']['color-picker']['items']['8']['value'] = '';

	$config['default_schemes']['color-picker']['items'] = [
		'1' => get_theme_mod( 'namaha-primary-color', customizer_library_get_default( 'namaha-primary-color' ) ),
		'2' => get_theme_mod( 'namaha-secondary-color', customizer_library_get_default( 'namaha-secondary-color' ) ),
		'3' => get_theme_mod( 'namaha-body-font-color', customizer_library_get_default( 'namaha-body-font-color' ) ),
		'4' => get_theme_mod( 'namaha-link-color', customizer_library_get_default( 'namaha-link-color' ) ),
		'5' => get_theme_mod( 'namaha-footer-color', customizer_library_get_default( 'namaha-footer-color' ) ),
		'6' => '',
		'7' => '',
		'8' => ''
	];
	
	return $config;
};
add_filter('elementor/editor/localize_settings', 'namaha_set_elementor_default_schemes', 100);

/**
 * Load Gutenberg stylesheet.
*/
function namaha_gutenberg_assets() {
	wp_enqueue_style( 'namaha-gutenberg-editor', get_theme_file_uri( '/library/css/gutenberg-editor-style.css' ), false, NAMAHA_THEME_VERSION );
	
	// Output inline styles based on theme customizer selections
	require get_template_directory() . '/library/includes/gutenberg-editor-styles.php';
}
add_action( 'enqueue_block_editor_assets', 'namaha_gutenberg_assets' );

// Recommended plugins installer
require_once get_template_directory() . '/library/includes/class-tgm-plugin-activation.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/library/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/library/includes/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/library/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/library/includes/jetpack.php';

// Helper library for the theme customizer.
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';

// Define options for the theme customizer.
require get_template_directory() . '/customizer/customizer-options.php';

// Output inline styles based on theme customizer selections.
require get_template_directory() . '/customizer/styles.php';

// Additional filters and actions based on theme customizer selections.
require get_template_directory() . '/customizer/mods.php';

// Include TRT Customize Pro library
require_once( get_template_directory() . '/trt-customize-pro/class-customize.php' );

/**
 * Premium Upgrade Page
 */
include get_template_directory() . '/upgrade/upgrade.php';

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function namaha_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'namaha_pingback_header' );

if ( ! function_exists( 'namaha_load_dynamic_css' ) ) :

	/**
	 * Add Dynamic CSS
	 */
	function namaha_load_dynamic_css() {
		global $solidify_breakpoint, $mobile_menu_breakpoint, $namaha_child_themes;
		
		$site_branding_padding_top 		   = floatVal( get_theme_mod( 'site_branding_padding_top', customizer_library_get_default( 'site_branding_padding_top' ) ) );
		$site_branding_padding_bottom 	   = floatVal( get_theme_mod( 'site_branding_padding_bottom', customizer_library_get_default( 'site_branding_padding_bottom' ) ) );
		$namaha_slider_has_min_width 	   = get_theme_mod( 'namaha-slider-has-min-width', customizer_library_get_default( 'namaha-slider-has-min-width' ) );
		$namaha_slider_min_width 		   = floatVal( get_theme_mod( 'namaha-slider-min-width', customizer_library_get_default( 'namaha-slider-min-width' ) ) );
		$namaha_header_image_has_min_width = get_theme_mod( 'namaha-header-image-has-min-width', customizer_library_get_default( 'namaha-header-image-has-min-width' ) );
		$namaha_header_image_min_width 	   = floatVal( get_theme_mod( 'namaha-header-image-min-width', customizer_library_get_default( 'namaha-header-image-min-width' ) ) );
		$header_center_aligned_breakpoint  = get_theme_mod( 'namaha-header-center-aligned-breakpoint', customizer_library_get_default( 'namaha-header-center-aligned-breakpoint' ) );
		
		$include_dir;
		
		// If a child theme is being used that's not an official Namaha child theme and the dynamic-css.php file exists in the child theme then load it
		// This has been implemented so that if a child theme is running on the free version Namaha it will load the child theme's dynamic-css.php file
		// But if it's running on Namaha Premium that can be overidden and the parent theme's dynamic-css.php file will be loaded instead as it contains more extensive styling
		if ( !in_array( basename( get_stylesheet_directory() ), $namaha_child_themes ) && file_exists( get_stylesheet_directory() . '/library/includes/dynamic-css.php' ) ) {
			$include_dir = get_stylesheet_directory();
		} else {
			$include_dir = get_template_directory();
		}
		
		require $include_dir . '/library/includes/dynamic-css.php';
	}
endif;
add_action( 'wp_head', 'namaha_load_dynamic_css' );

// Create function to check if WooCommerce exists.
if ( ! function_exists( 'namaha_is_woocommerce_activated' ) ) :
	function namaha_is_woocommerce_activated() {
	    if ( class_exists( 'woocommerce' ) ) {
	    	return true;
		} else {
			return false;
		}
	}
endif; // namaha_is_woocommerce_activated

if ( namaha_is_woocommerce_activated() ) {
    require get_template_directory() . '/library/includes/woocommerce-inc.php';
}

// Add CSS class to body by filter
function namaha_add_body_class( $classes ) {
	
	$classes[] = get_theme_mod( 'namaha-paragraph-line-height', customizer_library_get_default( 'namaha-paragraph-line-height' ) );
	$classes[] = 'font-awesome-' . get_theme_mod( 'namaha-font-awesome-version', customizer_library_get_default( 'namaha-font-awesome-version' ) );
	
	if( wp_is_mobile() ) {
		$classes[] = 'mobile-device';
	}

	if ( get_theme_mod( 'namaha-media-crisp-images', customizer_library_get_default( 'namaha-media-crisp-images' ) ) ) {
		$classes[] = 'crisp-images';
	}
	
	if ( get_theme_mod( 'namaha-content-links-have-underlines', customizer_library_get_default( 'namaha-content-links-have-underlines' ) ) ) {
		$classes[] = 'content-links-have-underlines';
	}
	
	if ( get_theme_mod( 'namaha-page-builders-use-theme-styles', customizer_library_get_default( 'namaha-page-builders-use-theme-styles' ) ) ) {
		$classes[] = 'namaha-page-builders-use-theme-styles';
	}
	
	if ( namaha_is_woocommerce_activated() && is_shop() && get_theme_mod( 'namaha-layout-woocommerce-shop-full-width', customizer_library_get_default( 'namaha-layout-woocommerce-shop-full-width' ) ) ) {
		$classes[] = 'namaha-shop-full-width';
	}
	
	if ( namaha_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && get_theme_mod( 'namaha-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'namaha-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$classes[] = 'namaha-shop-full-width';
	}
	
	if ( namaha_is_woocommerce_activated() && is_product() && get_theme_mod( 'namaha-layout-woocommerce-product-full-width', customizer_library_get_default( 'namaha-layout-woocommerce-product-full-width' ) ) ) {
		$classes[] = 'namaha-product-full-width';
	}

	if ( !get_theme_mod( 'namaha-woocommerce-breadcrumbs', customizer_library_get_default( 'namaha-woocommerce-breadcrumbs' ) ) ) {
		$classes[] = 'namaha-shop-no-breadcrumbs';
	}
	
	if ( namaha_is_woocommerce_activated() && is_woocommerce() ) {
		$is_woocommerce = true;
	} else {
		$is_woocommerce = false;
	}

	if ( namaha_is_woocommerce_activated() && is_shop() && !is_active_sidebar( 'sidebar-1' ) && !get_theme_mod( 'namaha-layout-woocommerce-shop-full-width', customizer_library_get_default( 'namaha-layout-woocommerce-shop-full-width' ) ) ) {
		$classes[] = 'full-width';
	} else if ( namaha_is_woocommerce_activated() && is_product() && !is_active_sidebar( 'sidebar-1' ) && !get_theme_mod( 'namaha-layout-woocommerce-product-full-width', customizer_library_get_default( 'namaha-layout-woocommerce-product-full-width' ) ) ) {
		$classes[] = 'full-width';
	} else if ( namaha_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) && !is_active_sidebar( 'sidebar-1' ) && !get_theme_mod( 'namaha-layout-woocommerce-category-tag-page-full-width', customizer_library_get_default( 'namaha-layout-woocommerce-category-tag-page-full-width' ) ) ) {
		$classes[] = 'full-width';
	}

	return $classes;
}
add_filter( 'body_class', 'namaha_add_body_class' );

/**
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
 */
if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Fire the wp_body_open action.
	 */
	function wp_body_open() {
		/**
		 * Triggered after the opening <body> tag.
		 */
		do_action( 'wp_body_open' );
	}
endif;

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	if ( get_theme_mod( 'namaha-woocommerce-shop-display-thumbnail-loader-animation', customizer_library_get_default( 'namaha-woocommerce-shop-display-thumbnail-loader-animation' ) ) ) {
		echo '<div class="hiddenUntilLoadedImageContainer loading">';
	}
}, 9 );

add_action( 'woocommerce_before_shop_loop_item_title', function() {
	if ( get_theme_mod( 'namaha-woocommerce-shop-display-thumbnail-loader-animation', customizer_library_get_default( 'namaha-woocommerce-shop-display-thumbnail-loader-animation' ) ) ) {
		echo '</div>';
	}
}, 11 );

// Set the number or products per page
function namaha_loop_shop_per_page( $cols ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	// Return the number of products you wanna show per page.
	$cols = get_theme_mod( 'namaha-woocommerce-products-per-page' );
	
	return $cols;
}
add_filter( 'loop_shop_per_page', 'namaha_loop_shop_per_page', 20 );

// Product thumbnails
if (!function_exists('namaha_woocommerce_product_thumbnails_columns')) {
	function namaha_woocommerce_product_thumbnails_columns() {
		return 3;
	}
}
add_filter ( 'woocommerce_product_thumbnails_columns', 'namaha_woocommerce_product_thumbnails_columns' );

// Display an Out of Stock label on out of stock products
function namaha_out_of_stock_notice() {
    global $product;
    if ( !$product->is_in_stock() ) {
		echo '<p class="stock out-of-stock">';
		echo __( 'Out of Stock', 'namaha' );
		echo '</p>';
    }
}
add_action( 'woocommerce_after_shop_loop_item_title', 'namaha_out_of_stock_notice', 10 );

// Set the blog excerpt length
function namaha_excerpt_length( $length ) {
	if ( is_admin() || ( !is_home() && !is_category() && !is_tag() && !is_search() ) ) {
		return $length;
	} else {
		return intval( get_theme_mod( 'namaha-blog-excerpt-length', customizer_library_get_default( 'namaha-blog-excerpt-length' ) ) );
	}
}
add_filter( 'excerpt_length', 'namaha_excerpt_length', 999 );

// Unset the blog excerpt read more text
if ( ! function_exists( 'namaha_excerpt_more' ) ) {
	function namaha_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		
		} else {
			return ' <a class="read-more" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . wp_kses_post( pll__( get_theme_mod( 'namaha-blog-read-more-text', customizer_library_get_default( 'namaha-blog-read-more-text' ) ) ) ) . '</a>';
		}
	}
}
add_filter( 'excerpt_more', 'namaha_excerpt_more' );

// Set the site logo URL
function namaha_custom_logo_url( $html ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	
	$logo_link_content = home_url( '/' );
	
	$html = sprintf( '<a href="%1$s" title="%2$s" rel="home" itemprop="url">%3$s</a>',
				esc_url( $logo_link_content ),
				esc_attr( get_bloginfo( 'name', 'display' ) ) .' - '. esc_attr( get_bloginfo( 'description', 'display' ) ),
	        	wp_get_attachment_image( $custom_logo_id, 'full', false, array(
	            	'class' => 'custom-logo',
	        		'alt' => esc_attr( get_bloginfo( 'name' ) ) .' - '. esc_attr( get_bloginfo( 'description', 'display' ) )
				) )
	    	);

	return $html;    
}
add_filter( 'get_custom_logo', 'namaha_custom_logo_url' );

/**
 * Adjust is_home query if namaha-slider-categories is set
 */
function namaha_set_blog_queries( $query ) {
    
    $slider_categories = get_theme_mod( 'namaha-slider-categories' );
    $slider_type = get_theme_mod( 'namaha-slider-type', customizer_library_get_default( 'namaha-slider-type' ) );
    
    if ( $slider_categories && $slider_type == 'namaha-slider-default' ) {
    	
    	$is_front_page = ( $query->get('page_id') == get_option('page_on_front') || is_front_page() );
    	
    	if ( count($slider_categories) > 0) {
    		// do not alter the query on wp-admin pages and only alter it if it's the main query
    		if ( !is_admin() && !$is_front_page  && $query->get('id') != 'slider' || !is_admin() && $is_front_page && $query->get('id') != 'slider' ){
				$query->set( 'category__not_in', $slider_categories );
    		}
    	}
    }
	    
}
add_action( 'pre_get_posts', 'namaha_set_blog_queries' );

function namaha_filter_recent_posts_widget_parameters( $params ) {

	$slider_categories = get_theme_mod( 'namaha-slider-categories' );
    $slider_type = get_theme_mod( 'namaha-slider-type', customizer_library_get_default( 'namaha-slider-type' ) );
	
	if ( $slider_categories && $slider_type == 'namaha-slider-default' ) {
		if ( count($slider_categories) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			$params['category__not_in'] = $slider_categories;
		}
	}
	
	return $params;
}
add_filter( 'widget_posts_args', 'namaha_filter_recent_posts_widget_parameters' );

/**
 * Adjust the widget categories query if namaha-slider-categories is set
 */
function namaha_set_widget_categories_args($args){
	$slider_categories = get_theme_mod( 'namaha-slider-categories' );
    $slider_type = get_theme_mod( 'namaha-slider-type', customizer_library_get_default( 'namaha-slider-type' ) );
	
	if ( $slider_categories && $slider_type == 'namaha-slider-default' ) {
		if ( count($slider_categories) > 0) {
			$exclude = implode(',', $slider_categories);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter( 'widget_categories_args', 'namaha_set_widget_categories_args' );

function namaha_set_widget_categories_dropdown_arg($args){
	$slider_categories = get_theme_mod( 'namaha-slider-categories' );
    $slider_type = get_theme_mod( 'namaha-slider-type', customizer_library_get_default( 'namaha-slider-type' ) );
	
	if ( $slider_categories && $slider_type == 'namaha-slider-default' ) {
		if ( count($slider_categories) > 0) {
			$exclude = implode(',', $slider_categories);
			$args['exclude'] = $exclude;
		}
	}
	
	return $args;
}
add_filter( 'widget_categories_dropdown_args', 'namaha_set_widget_categories_dropdown_arg' );

if ( ! function_exists( 'namaha_add_menu_items' ) ) :
	function namaha_add_menu_items( $items, $args ) {

		if ( function_exists( 'max_mega_menu_is_enabled' ) && max_mega_menu_is_enabled( 'primary' ) ) {
			return $items;
		}

	    if ( $args->theme_location == 'primary' ) {
	    	
	    	$navigation_menu_search_type = get_theme_mod( 'namaha-navigation-menu-search-type', customizer_library_get_default( 'namaha-navigation-menu-search-type' ) );
	
			if( get_theme_mod( 'namaha-navigation-menu-search-button', customizer_library_get_default( 'namaha-navigation-menu-search-button' ) ) ) :
				$items .= '<li class="search-button no-indicator ' .esc_attr( $navigation_menu_search_type). '">';
				
				if ( $navigation_menu_search_type == 'default' ) {
					if ( get_theme_mod( 'namaha-font-awesome-version', customizer_library_get_default( 'namaha-font-awesome-version' ) ) == '4.7.0' ) {
						$font_awesome_code = 'otb-fa';
						$font_awesome_icon_prefix = 'otb-';
					} else {
						$font_awesome_code = 'fa-solid';
						$font_awesome_icon_prefix = '';
					}
					
		        	$items .= '<a href="#"><i class="' .$font_awesome_code. ' ' .$font_awesome_icon_prefix. 'fa-search search-btn"></i></a>';
				} else {
					$items .= do_shortcode( get_theme_mod( 'namaha-navigation-menu-search-plugin-shortcode', customizer_library_get_default( 'namaha-navigation-menu-search-plugin-shortcode' ) ) );
				}
				
		        $items .= '</li>';
			endif;
	
	    }
	    return $items;
	}
endif;
add_filter( 'wp_nav_menu_items', 'namaha_add_menu_items', 10, 2 );

function namaha_allowed_tags() {
	global $allowedtags;
	$allowedtags["h1"] = array();
	$allowedtags["h2"] = array();
	$allowedtags["h3"] = array();
	$allowedtags["h4"] = array();
	$allowedtags["h5"] = array();
	$allowedtags["h6"] = array();
	$allowedtags["p"] = array();
	$allowedtags["br"] = array();
	$allowedtags["a"] = array(
		'href' => true,
		'class' => true
	);
	$allowedtags["i"] = array(
		'class' => true
	);
}
add_action('init', 'namaha_allowed_tags', 10);

function namaha_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => __( 'Elementor', 'namaha' ),
			'slug'      => 'elementor',
			'required'  => false
		),
		array(
			'name'      => __( 'SiteOrigin Widgets Bundle', 'namaha' ),
			'slug'      => 'so-widgets-bundle',
			'required'  => false
		),
		array(
			'name'      => __( 'Recent Posts Widget Extended', 'namaha' ),
			'slug'      => 'recent-posts-widget-extended',
			'required'  => false
		),
		array(
			'name'      => __( 'WPForms', 'namaha' ),
			'slug'      => 'wpforms-lite',
			'required'  => false
		),
		array(
			'name'      => __( 'Photo Gallery by Supsystic', 'namaha' ),
			'slug'      => 'gallery-by-supsystic',
			'required'  => false
		),
		array(
			'name'      => __( 'WooCommerce', 'namaha' ),
			'slug'      => 'woocommerce',
			'required'  => false
		)
	);

	$config = array(
		'id'           => 'namaha',            // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => ''                       // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'namaha_register_required_plugins' );

/**
 * Determine if Custom Post Type
 * usage: if ( is_this_a_custom_post_type() )
 *
 * References/Modified from:
 * @link https://codex.wordpress.org/Function_Reference/get_post_types
 * @link http://wordpress.stackexchange.com/users/73/toscho <== love this person!
 * @link http://wordpress.stackexchange.com/a/95906/64742
 */
function namaha_is_this_a_custom_post_type( $post = NULL ) {

    $all_custom_post_types = get_post_types( array ( '_builtin' => false ) );

    //* there are no custom post types
    if ( empty ( $all_custom_post_types ) ) return false;

    $custom_types      = array_keys( $all_custom_post_types );
    $current_post_type = get_post_type( $post );

    //* could not detect current type
    if ( ! $current_post_type )
        return false;

    return in_array( $current_post_type, $custom_types );
}

/**
 * Remove blog menu link class 'current_page_parent' when on an unrelated CPT
 * or search results page
 * or 404 page
 * dep: is_this_a_custom_post_type() function
 * modified from: https://gist.github.com/ajithrn/1f059b2201d66f647b69
 */
function namaha_if_cpt_or_search_or_404_remove_current_page_parent_on_blog_page_link( $classes, $item, $args ) {
    if ( namaha_is_this_a_custom_post_type() || is_search() || is_404() ) {
        $blog_page_id = intval( get_option('page_for_posts') );

        if ( $blog_page_id != 0 && $item->object_id == $blog_page_id ) {
			unset( $classes[array_search( 'current_page_parent', $classes )] );
        }

	}

    return $classes;
}
add_filter( 'nav_menu_css_class', 'namaha_if_cpt_or_search_or_404_remove_current_page_parent_on_blog_page_link', 10, 3 );

if ( function_exists( 'pll_register_string' ) ) {
	/**
	* Register some string from the customizer to be translated with Polylang
	*/
	function namaha_pll_register_string() {
		// Header
		pll_register_string( 'namaha-header-info-text', get_theme_mod( 'namaha-header-info-text', customizer_library_get_default( 'namaha-header-info-text' ) ), 'namaha', false );
		
		// Site Intro
		pll_register_string( 'namaha-header-site-intro-text', get_theme_mod( 'namaha-header-site-intro-text', customizer_library_get_default( 'namaha-header-site-intro-text' ) ), 'namaha', false );
		
		// Search
		pll_register_string( 'namaha-search-placeholder-text', get_theme_mod( 'namaha-search-placeholder-text', customizer_library_get_default( 'namaha-search-placeholder-text' ) ), 'namaha', false );
		pll_register_string( 'namaha-website-text-no-search-results-heading', get_theme_mod( 'namaha-website-text-no-search-results-heading', customizer_library_get_default( 'namaha-website-text-no-search-results-heading' ) ), 'namaha', false );
		pll_register_string( 'namaha-website-text-no-search-results-text', get_theme_mod( 'namaha-website-text-no-search-results-text', customizer_library_get_default( 'namaha-website-text-no-search-results-text' ) ), 'namaha', true );
		
		// Header media
		pll_register_string( 'namaha-header-image-text', get_theme_mod( 'namaha-header-image-text', customizer_library_get_default( 'namaha-header-image-text' ) ), 'namaha', true );
		
		// Blog read more
		pll_register_string( 'namaha-blog-read-more-text', get_theme_mod( 'namaha-blog-read-more-text', customizer_library_get_default( 'namaha-blog-read-more-text' ) ), 'namaha', true );
		
		// 404
		pll_register_string( 'namaha-website-text-404-page-heading', get_theme_mod( 'namaha-website-text-404-page-heading', customizer_library_get_default( 'namaha-website-text-404-page-heading' ) ), 'namaha', true );
		pll_register_string( 'namaha-website-text-404-page-text', get_theme_mod( 'namaha-website-text-404-page-text', customizer_library_get_default( 'namaha-website-text-404-page-text' ) ), 'namaha', true );
	}
 	add_action( 'admin_init', 'namaha_pll_register_string' );
}

/**
 * A fallback function that outputs a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return  void
 */
if ( !function_exists( 'pll_e' ) ) {
	function pll_e( $str ) {
		echo $str;
	}
}

/**
 * A fallback function that returns a non-translated string if Polylang is not active
 *
 * @param $string
 *
 * @return string
 */
if ( !function_exists( 'pll__' ) ) {
	function pll__( $str ) {
		return $str;
	}
}
