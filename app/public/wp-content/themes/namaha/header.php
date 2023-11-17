<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Namaha
 */
?><!DOCTYPE html><!-- Namaha -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="//gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'namaha' ); ?></a>

<?php
global $show_slider, $slider_type;
$show_slider = false;

// Check if a slider should display
// If it's the homepage and the default slider is active and the slider shortcode custom field is empty
if ( is_front_page() && get_theme_mod( 'namaha-slider-type', customizer_library_get_default( 'namaha-slider-type' ) ) == 'namaha-slider-default' && empty($slider_shortcode) ) {
	$show_slider = true;
	$slider_type = 'default';
	
// If it's the homepage and the plugin slider is active and there's a shortcode and the slider shortcode custom field is empty
} else if ( is_front_page() && get_theme_mod( 'namaha-slider-type', customizer_library_get_default( 'namaha-slider-type' ) ) == 'namaha-slider-plugin' && get_theme_mod( 'namaha-slider-plugin-shortcode', customizer_library_get_default( 'namaha-slider-plugin-shortcode' ) ) != '' && empty($slider_shortcode) ) {
	$show_slider = true;
	$slider_type = 'plugin';
}

global $show_header_image;
$show_header_image = false;

// Check if a header image should display
// If it's the homepage and a header image has been set and the slider is disabled
if ( is_front_page() && get_header_image() && get_theme_mod( 'namaha-slider-type', customizer_library_get_default( 'namaha-slider-type' ) ) == 'namaha-no-slider' ) {
	$show_header_image = true;
}

// Check if the Site Intro should display
global $show_site_intro, $site_intro_text;
$show_site_intro = false;

$site_intro_text = trim( pll__( get_theme_mod( 'namaha-header-site-intro-text', customizer_library_get_default( 'namaha-header-site-intro-text' ) ) ) );

if ( is_front_page() && ( $show_slider || $show_header_image ) && !empty( $site_intro_text ) && get_theme_mod( 'namaha-header-show-site-intro', customizer_library_get_default( 'namaha-header-show-site-intro' ) ) ) {
	$show_site_intro = true;
}

global $is_logo_container_translucent;

$is_logo_container_translucent = get_theme_mod( 'namaha-translucent-header', customizer_library_get_default( 'namaha-translucent-header' ) );

if ( $is_logo_container_translucent && !$show_slider && !$show_header_image ) {
	$is_logo_container_translucent = false;
}

$header_classes = array();
$navigation_menu_alignment = get_theme_mod( 'namaha-navigation-menu-alignment', customizer_library_get_default( 'namaha-navigation-menu-alignment' ) );

if ( $is_logo_container_translucent ) {
	$header_classes[] = 'translucent ';
}

if ( $navigation_menu_alignment == 'inline' ) {
	$header_classes[] = 'left-aligned';
	$header_classes[] = 'inline-navigation-menu';
} else {
	$header_classes[] = get_theme_mod( 'namaha-header-alignment', customizer_library_get_default( 'namaha-header-alignment' ) );
}

if ( $show_slider || $show_header_image ) {
	$header_classes[] = 'has-header-media';
}

if ( ( $show_slider && $slider_type == 'default' ) || $show_header_image ) {
	$header_classes[] = 'forced-solid';
}
?>

<header id="masthead" class="site-header left-aligned <?php echo implode( ' ', $header_classes ); ?>" role="banner">
    
    <?php
    // If the Navigation Menu alignment is set to inline then load the inline header include
    if ( get_theme_mod( 'namaha-navigation-menu-alignment', customizer_library_get_default( 'namaha-navigation-menu-alignment' ) ) == 'inline' ) {
		get_template_part( 'library/template-parts/header', 'inline' );
	} else {
		get_template_part( 'library/template-parts/header', 'left-aligned' );
	}
	?>
    
</header><!-- #masthead -->
    
<?php
if ( $show_slider ) :
	get_template_part( 'library/template-parts/slider' );
elseif ( $show_header_image ) :
	get_template_part( 'library/template-parts/header-image' );
endif;

$page_template = basename( get_page_template() );
$no_sidebar = false;

if ( ( $page_template == 'template-left-sidebar.php' && !is_active_sidebar( 'sidebar-1' ) ) ) {
	$no_sidebar = true;
}
?>

<?php
if ( get_theme_mod( 'namaha-social-right-aligned-buttons', customizer_library_get_default( 'namaha-social-right-aligned-buttons' ) ) ) {
?>
<div class="side-aligned-social-links">
<?php
get_template_part( 'library/template-parts/social-links' );
?>
</div>
<?php 
}

$content_container_classes = array();

if ( $show_slider || $show_header_image ) {
	$content_container_classes[] = 'has-header-media';
}

if ( $show_site_intro ) {
	$content_container_classes[] = 'has-site-intro';
	$content_container_classes[] = 'no-padding';
}

if ( ( $show_slider || $show_header_image ) && !$show_site_intro ) {
	$content_container_classes[] = 'extra-padded';
}
?>

<div class="content-container <?php echo implode( ' ', $content_container_classes ); ?>">
	<div id="content" class="site-content site-container <?php echo esc_attr( ( $no_sidebar ) ? 'no-sidebar' : '' ); ?>">
		<a name="site-content"></a>

		<?php
		if ( $show_site_intro ) {
			get_template_part( 'library/template-parts/site-intro' );
		}
