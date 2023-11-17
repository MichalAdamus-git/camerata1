<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Demo
 */

function namaha_customizer_library_options() {
	global $widget_title_content_font_color, $widget_title_sidebar_font_color, $widget_title_underline_color;
	
	// Theme defaults
	$page_content_background_color = '#FFFFFF';
	
	// Site Logo Area
	$header_color = '#FFFFFF';
	$site_branding_container_color = '#FFFFFF';
	$site_title_font_color = '#4D5351';
	
	$header_solid_tagline_font_color = '#8D9C71';
	
	$header_solid_font_color = '#8D9C71';
	$header_translucent_font_color = '#8D9C71';
	
	// Navigation Menu
	$navigation_menu_color = '#F1F1F0';
	$navigation_menu_solid_font_color = '#4D5351';
	$navigation_menu_translucent_font_color = '#4D5351';
	
	$background_color = '#FFFFFF';
	$primary_color = '#8D9C71';
	$secondary_color = '#6C7B5A';
	$link_color = '#939C99';
	$link_rollover_color = '#8D9C71';
	
	// Site Intro
	$site_intro_page_background_color = '#FFFFFF';
	
	$footer_color = '#F5F5F5';

	// Fonts
    $body_font_color = '#4C5250';
    $heading_font_color = '#8D9C71';
	$form_input_font_color = '#4C5250';
    $widget_title_content_font_color = '#8D9C71';
    $widget_title_sidebar_font_color = '#4C5250';
    $widget_title_underline_color = '#8D9C71';
    
    $slider_shortcode = null;

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();
	
	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	$dividerCount = 0;
	
	// Site Identity
	$section = 'title_tagline';
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Site Identity', 'namaha' ),
		'priority' => '25'
	);
	
	if ( ! function_exists( 'has_custom_logo' ) ) {
		$options['namaha-logo'] = array(
			'id' => 'namaha-logo',
			'label'   => __( 'Logo', 'namaha' ),
			'section' => $section,
			'type'    => 'image'
		);
	}
	
    $options['namaha-site-branding-contained'] = array(
    	'id' => 'namaha-site-branding-contained',
    	'label'   => __( 'Contained', 'namaha' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    	'priority' => 10
	);
    
    $options['namaha-site-branding-constrained-width'] = array(
    	'id' => 'namaha-site-branding-constrained-width',
    	'label'   => __( 'Constrained width', 'namaha' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    	'priority' => 10
    );
    
    $options['namaha-site-branding-width'] = array(
    	'id' => 'namaha-site-branding-width',
    	'label'   => __( 'Width', 'namaha' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 238,
    	'priority' => 10
    );
    
    // Colors Settings
    $panel = 'namaha-colors';
    
    $panels[] = array(
    	'id' => $panel,
    	'title' => __( 'Colors', 'namaha' ),
    	'priority' => '30'
    );
    
    	// General Settings - Sub-section
	    $section = 'namaha-general-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'General', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
		
		$options['namaha-background-color'] = array(
			'id' => 'namaha-background-color',
			'label'   => __( 'Background Color', 'namaha' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $background_color
		);
		
		$options['namaha-primary-color'] = array(
			'id' => 'namaha-primary-color',
			'label'   => __( 'Primary Color', 'namaha' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $primary_color
		);	    

		$options['namaha-secondary-color'] = array(
			'id' => 'namaha-secondary-color',
			'label'   => __( 'Secondary Color', 'namaha' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $secondary_color
		);
		
    	// Site Logo Area - Sub-section
	    $section = 'namaha-site-logo-area-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Site Logo Area', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
		
		$options['namaha-header-color'] = array(
			'id' => 'namaha-header-color',
			'label'   => __( 'Color', 'namaha' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $header_color
		);

		$options['namaha-site-branding-container-color'] = array(
			'id' => 'namaha-site-branding-container-color',
			'label'   => __( 'Site Identity Container Color', 'namaha' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $site_branding_container_color
		);
		
	    $options['namaha-site-title-font-color'] = array(
	    	'id' => 'namaha-site-title-font-color',
	    	'label'   => __( 'Site Title Color', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $site_title_font_color,
	    );

	    $options['namaha-tagline-font-color'] = array(
	    	'id' => 'namaha-tagline-font-color',
	    	'label'   => __( 'Tagline Color', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $header_solid_tagline_font_color,
	    );
	    
	    $options['namaha-header-solid-font-color'] = array(
	    	'id' => 'namaha-header-solid-font-color',
	    	'label'   => __( 'Solid - Font Color', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $header_solid_font_color,
	    	'description' => __( 'This is the color that the text will be when the site logo area is solid', 'namaha' )
	    );
	    
	    $options['namaha-header-translucent-font-color'] = array(
	    	'id' => 'namaha-header-translucent-font-color',
	    	'label'   => __( 'Translucent - Font Color', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $header_translucent_font_color,
	    	'description' => __( 'This is the color that the text will be when the site logo area is translucent', 'namaha' )
	    );
	    
    	// Navigation Menu - Sub-section
	    $section = 'namaha-navigation-menu-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Navigation Menu', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
		
		$options['namaha-navigation-menu-color'] = array(
			'id' => 'namaha-navigation-menu-color',
			'label'   => __( 'Color', 'namaha' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $navigation_menu_color
		);
	    
	    $options['namaha-navigation-menu-solid-font-color'] = array(
	    	'id' => 'namaha-navigation-menu-solid-font-color',
	    	'label'   => __( 'Solid - Font Color', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $navigation_menu_solid_font_color,
	    	'description' => __( 'This is the color that the text will be when the navigation menu is solid', 'namaha' )
	    );
	    
	    $options['namaha-navigation-menu-translucent-font-color'] = array(
	    	'id' => 'namaha-navigation-menu-translucent-font-color',
	    	'label'   => __( 'Translucent - Font Color', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $navigation_menu_translucent_font_color,
	    	'description' => __( 'This is the color that the text will be when the navigation menu is translucent', 'namaha' )
	    );
	    
    	// Site Intro - Sub-section
	    $section = 'namaha-site-intro-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Site Intro', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['namaha-site-intro-page-background-color'] = array(
	    	'id' => 'namaha-site-intro-page-background-color',
	    	'label'   => __( 'Page Background Color', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $site_intro_page_background_color 
	    );
	    
    	// Page Content - Sub-section
	    $section = 'namaha-page-content-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Page Content', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['namaha-heading-font-color'] = array(
	    	'id' => 'namaha-heading-font-color',
	    	'label'   => __( 'Heading Color', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $heading_font_color
	    );
	    
	    $options['namaha-body-font-color'] = array(
	    	'id' => 'namaha-body-font-color',
	    	'label'   => __( 'Body Text Color', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $body_font_color
	    );
	    
		$options['namaha-link-color'] = array(
			'id' => 'namaha-link-color',
			'label'   => __( 'Link Color', 'namaha' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $link_color
		);
		
		$options['namaha-link-rollover-color'] = array(
			'id' => 'namaha-link-rollover-color',
			'label'   => __( 'Link Rollover Color', 'namaha' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $link_rollover_color
		);
		
	    $options['namaha-form-input-font-color'] = array(
	    	'id' => 'namaha-form-input-font-color',
	    	'label'   => __( 'Form Input Text Color', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'color',
	    	'default' => $form_input_font_color
	    );
	    
    	// Footer - Sub-section
	    $section = 'namaha-footer-colors';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Footer', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
		$options['namaha-footer-color'] = array(
			'id' => 'namaha-footer-color',
			'label'   => __( 'Color', 'namaha' ),
			'section' => $section,
			'type'    => 'color',
			'default' => $footer_color
		);
		
    // Fonts Settings
    $section = 'namaha-fonts';
    $font_choices = customizer_library_get_font_choices();
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Fonts', 'namaha' ),
    	'priority' => '30'
    );

    $options['namaha-site-title-font'] = array(
    	'id' => 'namaha-site-title-font',
    	'label'   => __( 'Site Title', 'namaha' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $font_choices,
    	'default' => 'Philosopher',
    );
    
	$options['namaha-site-title-font-size'] = array(
		'id' => 'namaha-site-title-font-size',
		'label'   => __( 'Size', 'namaha' ),
		'section' => $section,
		'type'    => 'pixels',
		'default' => 30
	);	    

    $choices = array(
    	'normal' => 'Normal',
    	'bold' 	 => 'Bold'
    );
    $options['namaha-site-title-font-weight'] = array(
    	'id' => 'namaha-site-title-font-weight',
    	'label'   => __( 'Weight', 'namaha' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => 'bold'
    );
	
    $choices = array(
    	'0' => '0',
    	'2' => '2'
    );
    $options['namaha-site-title-font-letter-spacing'] = array(
    	'id' => 'namaha-site-title-font-letter-spacing',
    	'label'   => __( 'Letter Spacing', 'namaha' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => '2'
    );

    $options['namaha-navigation-menu-font'] = array(
    	'id' => 'namaha-navigation-menu-font',
    	'label'   => __( 'Navigation Menu', 'namaha' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $font_choices,
    	'default' => 'Lato',
    );
    
    $options['namaha-heading-font'] = array(
    	'id' => 'namaha-heading-font',
    	'label'   => __( 'Heading', 'namaha' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $font_choices,
    	'default' => 'Lato',
    );
    
    $choices = array(
    	'300' => 'Light',
    	'400' => 'Normal'
    );
    $options['namaha-heading-font-weight'] = array(
    	'id' => 'namaha-heading-font-weight',
    	'label'   => __( 'Weight', 'namaha' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => '300'
    );
    
    $options['namaha-body-font'] = array(
    	'id' => 'namaha-body-font',
    	'label'   => __( 'Body Text', 'namaha' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $font_choices,
    	'default' => 'Lato',
    );
    
    $options['namaha-button-font'] = array(
    	'id' => 'namaha-button-font',
    	'label'   => __( 'Button', 'namaha' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $font_choices,
    	'default' => 'Philosopher',
    );

    $options['namaha-fonts-info'] = array(
    	'id' => 'namaha-fonts-info',
    	'label'   => '',
    	'section' => $section,
    	'type'    => 'info',
    	'description' => __( '<a href="https://www.outtheboxthemes.com/documentation/namaha/fonts/preview-page/" rel="nofollow" target="_blank">Struggling to find the right font? Read more about our theme fonts preview tool</a>', 'namaha' )
    );
    
    // Styling Settings
    $panel = 'namaha-styling';
    
    $panels[] = array(
    	'id' => $panel,
    	'title' => __( 'Styling', 'namaha' ),
    	'priority' => '30'
    );
    
    	// Paragraph - Sub-section
	    $section = 'namaha-styling-paragraph';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Paragraph', 'namaha' ),
	    	'panel' => $panel
	    );
	    
	    $choices = array(
	    	'cozy-paragraph-line-height' => 'Cozy',
	    	'comfortable-paragraph-line-height' => 'Comfortable',
	    );
	    $options['namaha-paragraph-line-height'] = array(
	    	'id' => 'namaha-paragraph-line-height',
	    	'label'   => __( 'Line Height', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $choices,
	    	'default' => 'comfortable-paragraph-line-height'
	    );
	    
    	// Links - Sub-section
	    $section = 'namaha-styling-links';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Links', 'namaha' ),
	    	'panel' => $panel
	    );
	    
	    $options['namaha-content-links-have-underlines'] = array(
	    	'id' => 'namaha-content-links-have-underlines',
	    	'label'   => __( 'Underline', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 0
	    );
	    
    	// Page Builders - Sub-section
	    $section = 'namaha-styling-page-builders';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Page Builders', 'namaha' ),
	    	'panel' => $panel
	    );
	    
	    $options['namaha-page-builders-use-theme-styles'] = array(
	    	'id' => 'namaha-page-builders-use-theme-styles',
	    	'label'   => __( 'Use theme styles', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1,
	    	'description' => ''
	    );
    
    // Styling Settings
    
    // Header Settings
    $panel = 'namaha-header';
    
    $panels[] = array(
    	'id' => $panel,
    	'title' => __( 'Header', 'namaha' ),
    	'priority' => '35'
    );
	    
		// Site Logo Area - Sub-section
	    $section = 'namaha-header-site-logo-area';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Site Logo Area', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );

	    $options['namaha-header-shop-links'] = array(
	    	'id' => 'namaha-header-shop-links',
	    	'label'   => __( 'Shop Links', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1,
			'description' => __( 'Display the My Account and Checkout links when WooCommerce is active.', 'namaha' )
	    );
	    
	    // Navigation Menu - Sub-section
	    $section = 'namaha-header-navigation-menu';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Navigation Menu', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $choices = array(
	    	'left-aligned' => 'Left aligned',
	    	'inline' => 'Inline'
	    );
	    $options['namaha-navigation-menu-alignment'] = array(
	    	'id' => 'namaha-navigation-menu-alignment',
	    	'label'   => __( 'Alignment', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $choices,
	    	'default' => 'inline'
	    );

	    $choices = array(
	    	'rollover-font-color' => 'Font Color',
	    	'rollover-underline' => 'Underline',
	    	'rollover-background-color' => 'Background Color'
	    );
	    $options['namaha-navigation-menu-rollover-style'] = array(
	    	'id' => 'namaha-navigation-menu-rollover-style',
	    	'label'   => __( 'Rollover Style', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'select',
	    	'choices' => $choices,
	    	'default' => 'rollover-underline'
	    );
	    
	    $options['namaha-navigation-menu-rollover-underline-align-bottom'] = array(
	    	'id' => 'namaha-navigation-menu-rollover-underline-align-bottom',
	    	'label'   => __( 'Align the underline to the bottom of the header', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1
		);
		
		// Header Text - Sub-section
	    $section = 'namaha-header-text';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Header Text', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );

	    $options['namaha-header-info-text'] = array(
	    	'id' => 'namaha-header-info-text',
	    	'label'   => __( 'Info Text One', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'text',
	    	'default' => __( 'Call Us: 555-NAMAHA', 'namaha' ),
	    	'sanitize_callback' => 'wp_kses_post'
	    );
	    
		// Opacity - Sub-section
	    $section = 'namaha-header-opacity';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Opacity', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['namaha-translucent-header'] = array(
	    	'id' => 'namaha-translucent-header',
	    	'label'   => __( 'Translucent', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1
	    );

		// Site Intro - Sub-section
	    $section = 'namaha-header-site-intro';
	    
	    $sections[] = array(
	    	'id' => $section,
	    	'title' => __( 'Site Intro', 'namaha' ),
	    	'priority' => '35',
	    	'panel' => $panel
	    );
	    
	    $options['namaha-header-show-site-intro'] = array(
	    	'id' => 'namaha-header-show-site-intro',
	    	'label'   => __( 'Show site intro', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'checkbox',
	    	'default' => 1
	    );

	    $options['namaha-header-site-intro-text'] = array(
	    	'id' => 'namaha-header-site-intro-text',
	    	'label'   => __( 'Text', 'namaha' ),
	    	'section' => $section,
	    	'type'    => 'textarea',
	    	'default' => __( '<h1>Focus  your thoughts on our beautifully designed & easy-to-use theme</h1>', 'namaha' ),
	    	'description' => esc_html( __( 'Use <h1></h1> or <h2></h2> tags around heading text and <p></p> tags around body text.', 'namaha' ) ),
	    	'sanitize_callback' => 'wp_kses_post'
	    );
	    
    // Social Settings
    $section = 'namaha-social';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Social Media Links', 'namaha' ),
    	'priority' => '35'
    );

    $options['namaha-social-right-aligned-buttons'] = array(
    	'id' => 'namaha-social-right-aligned-buttons',
    	'label'   => __( 'Show right aligned social media buttons', 'namaha' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
    
    $options['namaha-social-email'] = array(
    	'id' => 'namaha-social-email',
    	'label'   => __( 'Email Address', 'namaha' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['namaha-social-skype'] = array(
    	'id' => 'namaha-social-skype',
    	'label'   => __( 'Skype Name', 'namaha' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['namaha-social-tumblr'] = array(
    	'id' => 'namaha-social-tumblr',
    	'label'   => __( 'Tumblr', 'namaha' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    $options['namaha-social-flickr'] = array(
    	'id' => 'namaha-social-flickr',
    	'label'   => __( 'Flickr', 'namaha' ),
    	'section' => $section,
    	'type'    => 'text'
    );
    
    // Search Settings
    $section = 'namaha-search';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Search', 'namaha' ),
    	'priority' => '35'
    );
    
    $options['namaha-navigation-menu-search-button'] = array(
    	'id' => 'namaha-navigation-menu-search-button',
    	'label'   => __( 'Show Search in the Navigation Menu', 'namaha' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 1,
    	'description' => __( '<strong>Please note:</strong> You need to assign a Primary Menu for this to work.', 'namaha' )
    );
    
    $choices = array(
    	'default' => 'Default Search',
    	'plugin' => 'Search Plugin'
    );
    $options['namaha-navigation-menu-search-type'] = array(
    	'id' => 'namaha-navigation-menu-search-type',
    	'label'   => __( 'Navigation Menu Search type', 'namaha' ),
    	'section' => $section,
    	'type'    => 'select',
    	'choices' => $choices,
    	'default' => 'default'
    );
    
    $options['namaha-navigation-menu-search-plugin-shortcode'] = array(
    	'id' => 'namaha-navigation-menu-search-plugin-shortcode',
    	'label'   => __( 'Shortcode', 'namaha' ),
    	'section' => $section,
    	'type'    => 'text',
    	'description' => __( 'Enter the shortcode given by the search plugin you\'re using.', 'namaha' )
    );
    
    //'We recommend WooCommerce Product Search for a better product search for your store'
    //https://www.outtheboxthemes.com/go/woocommerce-product-search/
    
    $options['namaha-search-placeholder-text'] = array(
    	'id' => 'namaha-search-placeholder-text',
    	'label'   => __( 'Default Search Field Text', 'namaha' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( 'Search...', 'namaha' )
    );
    
    $options['namaha-website-text-no-search-results-heading'] = array(
    	'id' => 'namaha-website-text-no-search-results-heading',
    	'label'   => __( 'No Search Results Heading', 'namaha' ),
    	'section' => $section,
    	'type'    => 'text',
		'default' => __( 'Nothing Found!', 'namaha' )
    );
    $options['namaha-website-text-no-search-results-text'] = array(
        'id' => 'namaha-website-text-no-search-results-text',
        'label'   => __( 'No Search Results Message', 'namaha' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'namaha' )
    );
    
    // Slider Settings
    
    $section = 'namaha-slider';
	
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Slider', 'namaha' ),
        'priority' => '35'
    );
    
    $choices = array(
        'namaha-slider-default' => 'Default Slider',
        'namaha-slider-plugin' => 'Slider Plugin',
        'namaha-no-slider' => 'None'
    );
    $options['namaha-slider-type'] = array(
        'id' => 'namaha-slider-type',
        'label'   => __( 'Slider', 'namaha' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices
    );

	// Check for the otb_namaha_dot_org setting to honour the free version of the theme 
    if ( get_theme_mod( 'otb_namaha_dot_org' ) ) {
    	$options['namaha-slider-type']['default'] = 'namaha-no-slider';
    } else {
    	$options['namaha-slider-type']['default'] = 'namaha-no-slider';
    }
    
    $options['namaha-default-slider-info'] = array(
    	'id' => 'namaha-default-slider-info',
    	'label'   => '',
    	'section' => $section,
    	'type'    => 'info',
    	'description' => __( '<a href="https://www.outtheboxthemes.com/documentation/namaha/homepage-slider/default-slider/" rel="nofollow" target="_blank">Read a guide on how to set up the Default Slider</a>', 'namaha' ),
    );

    $options['namaha-slider-plugin-info'] = array(
    	'id' => 'namaha-slider-plugin-info',
    	'label'   => '',
    	'section' => $section,
    	'type'    => 'info',
    	'description' => __( '<a href="https://www.outtheboxthemes.com/documentation/namaha/homepage-slider/slider-plugin/" rel="nofollow" target="_blank">Read a guide on using a slider plugin</a>', 'namaha' ),
    );
    
    $options['namaha-slider-categories'] = array(
    	'id' => 'namaha-slider-categories',
    	'label'   => __( 'Post Categories', 'namaha' ),
    	'section' => $section,
    	'type'    => 'dropdown-categories',
    	'description' => __( 'Select the categories of the posts you want to display in the slider. The featured image will be the slide image and the post content will display over it. Hold down the Ctrl (windows) / Command (Mac) button to select multiple categories.', 'namaha' )
    );
    
    $options['namaha-slider-overlay-opacity'] = array(
    	'id' => 'namaha-slider-overlay-opacity',
    	'label'   => __( 'Overlay Opacity', 'namaha' ),
    	'section' => $section,
    	'type'    => 'range',
    	'default' => 0,
    	'input_attrs' => array(
    		'min'   => 0,
    		'max'   => 1,
    		'step'  => 0.1,
    		'style' => 'color: #000000'
   		)
    );
    
	$options['namaha-slider-text-overlay-text-shadow'] = array(
		'id' => 'namaha-slider-text-overlay-text-shadow',
		'label'   => __( 'Display a drop shadow on the text overlay text', 'namaha' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0
	);

    $options['namaha-slider-has-min-width'] = array(
    	'id' => 'namaha-slider-has-min-width',
    	'label'   => __( 'Slider image has a minimum width', 'namaha' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
    
    $options['namaha-slider-min-width'] = array(
    	'id' => 'namaha-slider-min-width',
    	'label'   => __( 'Minimum Width', 'namaha' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 600
    );
    
    $options['namaha-slider-transition-speed'] = array(
    	'id' => 'namaha-slider-transition-speed',
    	'label'   => __( 'Transition Speed', 'namaha' ),
    	'section' => $section,
    	'type'    => 'milliseconds',
    	'default' => 450,
    	'description' => __( 'The speed it takes to transition between slides in milliseconds. 1000 milliseconds equals 1 second.', 'namaha' )
    );
    
    $options['namaha-slider-plugin-shortcode'] = array(
    	'id' => 'namaha-slider-plugin-shortcode',
    	'label'   => __( 'Slider Shortcode', 'namaha' ),
    	'section' => $section,
    	'type'    => 'text',
    	'description' => __( 'Enter the shortcode given by the slider plugin you\'re using.', 'namaha' )
    );
    
    // Header Image
    $section = 'header_image';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Header Image', 'namaha' ),
    	'priority' => '35'
    );
    
    $options['namaha-slider-enabled-warning'] = array(
    	'id' => 'namaha-slider-enabled-warning',
    	'label'   => __( 'Please note: The header image will not display on your site as the slider is currently enabled. To make the header image visible you will first need to disable the <a href="#namaha-slider" rel="tc-section">slider</a>.', 'namaha' ),
    	'section' => $section,
    	'type'    => 'warning',
    	'priority' => 0
    );
    
    $options['namaha-header-image-overlay-opacity'] = array(
    	'id' => 'namaha-header-image-overlay-opacity',
    	'label'   => __( 'Overlay Opacity', 'namaha' ),
    	'section' => $section,
    	'type'    => 'range',
    	'default' => 0,
    	'input_attrs' => array(
    		'min'   => 0,
    		'max'   => 1,
    		'step'  => 0.1,
    		'style' => 'color: #000000'
   		)
    );
    
    $options['namaha-header-image-text'] = array(
    	'id' => 'namaha-header-image-text',
    	'label'   => __( 'Text', 'namaha' ),
    	'section' => $section,
    	'type'    => 'textarea',
    	'description' => esc_html( __( 'Use <h1></h1> or <h2></h2> tags around heading text and <p></p> tags around body text.', 'namaha' ) ),
    	'sanitize_callback' => 'wp_kses_post'
    );
    
	$options['namaha-header-image-text-overlay-text-shadow'] = array(
		'id' => 'namaha-header-image-text-overlay-text-shadow',
		'label'   => __( 'Display a drop shadow on the text overlay text', 'namaha' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0
	);
	
    $options['namaha-header-image-has-min-width'] = array(
    	'id' => 'namaha-header-image-has-min-width',
    	'label'   => __( 'Header image has a minimum width', 'namaha' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
    
    $options['namaha-header-image-min-width'] = array(
    	'id' => 'namaha-header-image-min-width',
    	'label'   => __( 'Minimum Width', 'namaha' ),
    	'section' => $section,
    	'type'    => 'pixels',
    	'default' => 600
    );

	
	// WooCommerce
	if ( namaha_is_woocommerce_activated() ) {

	    // WooCommerce
	    $panel = 'woocommerce';
	    
	    $panels[] = array(
	    	'id' => $panel,
	    	'title' => __( 'WooCommerce', 'namaha' ),
	    	'priority' => '30'
	    );    

	    	// Header
		    $section = 'woocommerce-header';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Header', 'namaha' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
		    
			$options['namaha-woocommerce-header-cart-auto-update'] = array(
		    	'id' => 'namaha-woocommerce-header-cart-auto-update',
		    	'label'   => __( 'Auto Update Header Cart', 'namaha' ),
		    	'description' => __( 'This will auto-update the header cart as products are added or removed. <strong>Please note:</strong> If you are running a multilingual site then you should disable this setting for the header cart translations to function correctly', 'namaha' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 1
		    );

	    	// Layout
		    $section = 'woocommerce-layout';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Layout', 'namaha' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
	    
		    $options['namaha-woocommerce-breadcrumbs'] = array(
		    	'id' => 'namaha-woocommerce-breadcrumbs',
		    	'label'   => __( 'Display breadcrumbs', 'namaha' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 0
		    );
		    
	    	// Product Catalog
		    $section = 'woocommerce_product_catalog';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product Catalog', 'namaha' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );

		    $options['namaha-layout-woocommerce-shop-full-width'] = array(
		    	'id' => 'namaha-layout-woocommerce-shop-full-width',
		    	'label'   => __( 'Full width', 'namaha' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => 0,
		    	'default' => 0
		    );

		    $options['namaha-woocommerce-shop-display-thumbnail-loader-animation'] = array(
		    	'id' => 'namaha-woocommerce-shop-display-thumbnail-loader-animation',
		    	'label'   => __( 'Display a loader animation on thumbnails', 'namaha' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => 0,
		    	'default' => 0
		    );
		    
		    $options['namaha-woocommerce-products-per-page'] = array(
		    	'id' => 'namaha-woocommerce-products-per-page',
		    	'label'   => __( 'Products per page', 'namaha' ),
		    	'section' => $section,
		    	'type'    => 'text',
		    	'default' => get_option('posts_per_page'),
		    	'description' => __( 'How many products should be shown per page?', 'namaha' )
		    );
		    
	    	// Product
		    $section = 'woocommerce-product';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product', 'namaha' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
		    
		    $options['namaha-layout-woocommerce-product-full-width'] = array(
		    	'id' => 'namaha-layout-woocommerce-product-full-width',
		    	'label'   => __( 'Full width', 'namaha' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => get_theme_mod( 'namaha-layout-woocommerce-shop-full-width', 0 )
		    );
		    
		    $options['namaha-woocommerce-product-image-zoom'] = array(
		    	'id' => 'namaha-woocommerce-product-image-zoom',
		    	'label'   => __( 'Enable zoom on product image', 'namaha' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'default' => 1
		    );
		    
	    	// Product category / tag page
		    $section = 'woocommerce-category-tag-page';
		    
		    $sections[] = array(
		    	'id' => $section,
		    	'title' => __( 'Product Category and Tag Page', 'namaha' ),
		    	'priority' => '10',
		    	'panel' => $panel
		    );
	    
		    $options['namaha-layout-woocommerce-category-tag-page-full-width'] = array(
		    	'id' => 'namaha-layout-woocommerce-category-tag-page-full-width',
		    	'label'   => __( 'Full width', 'namaha' ),
		    	'section' => $section,
		    	'type'    => 'checkbox',
		    	'priority' => '0',
		    	'default' => get_theme_mod( 'namaha-layout-woocommerce-shop-full-width', 0 )
		    );
		
	}
	
	// Font Awesome Settings
	$section = 'namaha-font-awesome';
	$font_choices = customizer_library_get_font_choices();
	
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Font Awesome', 'namaha' ),
		'priority' => '30'
	);
	 
	$choices = array(
		'4.7.0' => '4.7.0',
		'latest' => 'Latest (6.1.1)'
	);
	$options['namaha-font-awesome-version'] = array(
		'id' => 'namaha-font-awesome-version',
		'label'   => __( 'Version', 'namaha' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $choices,
		'default' => '4.7.0',
		'description' => __( 'Select the version of Font Awesome that you would like to use. <strong>Icon variation will occur between the versions.</strong>', 'namaha' )
	);
    
    // Blog Settings
    $section = 'namaha-blog';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Blog', 'namaha' ),
    	'priority' => '50'
    );    

	$options['namaha-blog-featured-image-size'] = array(
		'id' => 'namaha-blog-featured-image-size',
		'label'   => __( 'Featured Image Size', 'namaha' ),
		'section' => $section,
		'type'    => 'dropdown-image-sizes',
		'default' => 'large'
    );	
    
    $choices = array(
		'namaha-blog-archive-layout-full' => 'Full post',
		'namaha-blog-archive-layout-excerpt' => 'Excerpt'
    );
    $options['namaha-blog-archive-layout'] = array(
        'id' => 'namaha-blog-archive-layout',
        'label'   => __( 'Text Length', 'namaha' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'namaha-blog-archive-layout-full'
    );
    
    $options['namaha-blog-excerpt-length'] = array(
    	'id' => 'namaha-blog-excerpt-length',
    	'label'   => __( 'Excerpt Length', 'namaha' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => 55
    );
    
    $options['namaha-blog-read-more-text'] = array(
    	'id' => 'namaha-blog-read-more-text',
    	'label'   => __( 'Read More Text', 'namaha' ),
    	'section' => $section,
    	'type'    => 'text',
    	'default' => __( 'READ MORE', 'namaha' )
    );
    
    // 404 Settings
    $section = 'namaha-404-page';

    $sections[] = array(
        'id' => $section,
        'title' => __( '404 Page', 'namaha' ),
        'priority' => '50'
    );
    $options['namaha-website-text-404-page-heading'] = array(
        'id' => 'namaha-website-text-404-page-heading',
        'label'   => __( 'Heading', 'namaha' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( '404!', 'namaha' )
    );
    $options['namaha-website-text-404-page-text'] = array(
        'id' => 'namaha-website-text-404-page-text',
        'label'   => __( 'Message', 'namaha' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'The page you were looking for cannot be found!', 'namaha' )
    );
    
    // Gutenberg Settings
    $section = 'namaha-gutenberg';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Gutenberg', 'namaha' ),
    	'priority' => '50'
    );
    
    $options['namaha-gutenberg-enable-block-based-widgets'] = array(
    	'id' => 'namaha-gutenberg-enable-block-based-widgets',
    	'label'   => __( 'Enable block-based widgets editor', 'namaha' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0
    );
    
    // Media Settings
    $section = 'namaha-media';
    
    $sections[] = array(
    	'id' => $section,
    	'title' => __( 'Media', 'namaha' ),
    	'priority' => '50'
    );
    
    $options['namaha-media-crisp-images'] = array(
    	'id' => 'namaha-media-crisp-images',
    	'label'   => __( 'Crisp images', 'namaha' ),
    	'section' => $section,
    	'type'    => 'checkbox',
    	'default' => 0,
    	'description' => __( '<p>This will remove the default anti-aliasing done to scaled images by browsers creating a more crisp image.</p>', 'namaha' )
    );    
	    
	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;
	
	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'namaha_customizer_library_options' );
