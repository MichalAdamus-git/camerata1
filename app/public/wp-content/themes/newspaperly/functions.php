<?php
/**
 * newspaperly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package newspaperly
 */


if ( ! function_exists( 'newspaperly_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

	function newspaperly_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on newspaperly, use a find and replace
		 * to change 'newspaperly' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'newspaperly', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );



        /*
         * Add support for starter content
        */
        // Starter Content Begin
        $nav_items = array(
        	'home'                 => array(
        		'title'      => 'Home',
        		'url'    => '#',
        	),
        	'custom_blog'           => array(
        		'title'      => 'Blog',
        		'url'    => '#',
        	),
        	'custom_news'      => array(
        		'title'      => 'News',
        		'url'    => '#',
        	),
        	'custom_categories' => array(
        		'title'      => 'Categories',
        		'url'    => '#',
        	),
        	'custom_about'            => array(
        		'title'      => 'About',
        		'url'    => '#',
        	),
        	'custom_contact'            => array(
        		'title'      => 'Contact',
        		'url'    => '#',
        	),
        );

        $header_widgets = array('custom' => array(
        	'custom_html',
        	array(
        		'title' => '',
        		'content' => '<a href="%"><img src="'.get_template_directory_uri().'/inc/starter_content/img/1.png"/></a>'
        	)
        ));
        $header_widgets_two = array('custom' => array(
        	'custom_html',
        	array(
        		'title' => '',
        		'content' => '<a href="%"><img src="'.get_template_directory_uri().'/inc/starter_content/img/2.png"/></a>'
        	)
        ));
        $header_widgets_three = array('custom' => array(
        	'custom_html',
        	array(
        		'title' => '',
        		'content' => '<a href="%"><img src="'.get_template_directory_uri().'/inc/starter_content/img/3.png"/></a>'
        	)
        ));
        
        $footer_widgets = array('custom' => array(
        	'custom_html',
        	array(
        		'title' => 'LOREM IPSUM',
        		'content' => '<p>Sed ut perspiciatis unde omnis iste natus voluptatem fringilla tempor dignissim at, pretium et arcu. Sed ut perspiciatis unde omnis iste tempor dignissim at, pretium et arcu natus voluptatem fringilla.</p>'
        	)
        ));
        $top_widgets = array('custom' => array(
        	'custom_html',
        	array(
        		'title' => '',
        		'content' => '<a href="%"><img src="'.get_template_directory_uri().'/inc/starter_content/img/top-banner.png"/></a>'
        	)
        ));

        $starter_content = array(
        	'attachments' => array(
        		'featured-image-nothing-breaks-new-york' => array(
        			'post_title'   => 'Featured Image 1',
        			'post_content' => 'Attachment Description',
        			'post_excerpt' => 'Attachment Caption',
        			'file'         => 'inc/starter_content/img/nothing-breaks-new-york.png',
        		),
        		'featured-image-getting-what-you-want' => array(
        			'post_title'   => 'Featured Image 2',
        			'post_content' => 'Attachment Description',
        			'post_excerpt' => 'Attachment Caption',
        			'file'         => 'inc/starter_content/img/getting-what-you-want.png',
        		),
        		'featured-image-are-you-sabotaging-your-creativity' => array(
        			'post_title'   => 'Featured Image 3',
        			'post_content' => 'Attachment Description',
        			'post_excerpt' => 'Attachment Caption',
        			'file'         => 'inc/starter_content/img/are-you-sabotaging-your-creativity.png',
        		),
        		'featured-image-what-ive-learned-from-road-trips' => array(
        			'post_title'   => 'Featured Image 4',
        			'post_content' => 'Attachment Description',
        			'post_excerpt' => 'Attachment Caption',
        			'file'         => 'inc/starter_content/img/what-ive-learned-from-road-trips.png',
        		),
        		'featured-image-how-to-write-10000-words-a-week' => array(
        			'post_title'   => 'Featured Image 5',
        			'post_content' => 'Attachment Description',
        			'post_excerpt' => 'Attachment Caption',
        			'file'         => 'inc/starter_content/img/how-to-write-10000-words-a-week.png',
        		),
        	),
        	'posts' => array(
        		'custom_post_1' => require dirname(__FILE__) . "/inc/starter_content/posts/nothing_beats_new_york.php",
        		'custom_post_2' => require dirname(__FILE__) . "/inc/starter_content/posts/getting_what_you_want.php",
        		'custom_post_3' => require dirname(__FILE__). "/inc/starter_content/posts/are_you_sabotaging_your_creativity.php",
        		'custom_post_4' => require dirname(__FILE__). "/inc/starter_content/posts/how-to-write-10000-words-a-week.php",
        		'custom_post_5' => require dirname(__FILE__). "/inc/starter_content/posts/what_ive_learned_from_road_trips.php",
        	),
        	'nav_menus' => array(
        		'menu-1' => array(
        			'name' => 'Primary',
        			'items' => $nav_items,
        		),
        	),
        	'widgets' => array(
        		'headerwidget-1' => $header_widgets,
        		'headerwidget-2' => $header_widgets_two,
        		'headerwidget-3' => $header_widgets_three,
        		'footerwidget-1' => $footer_widgets,
        		'footerwidget-2' => $footer_widgets,
        		'footerwidget-3' => $footer_widgets,
        		'banner-widget' => $top_widgets,
        		'sidebar-1' => array(
        			'custom_portrait' => array(
        				'recent-posts',
        				array(
        					'title' => ''
        				)
        			),
        			'custom_banner' => array(
        				'custom_html',
        				array(
        					'content' => '<img src="'.get_template_directory_uri().'/inc/starter_content/img/banner.png"/>'
        				)
        			),
        		),
        	)
        );
        
        add_theme_support('starter-content', $starter_content);
        // Starter Content End

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300 );

		add_image_size( 'newspaperly-grid', 350 , 230, true );
		add_image_size( 'newspaperly-slider', 850 );
		add_image_size( 'newspaperly-small', 300 , 180, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'	=> esc_html__( 'Primary', 'newspaperly' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'newspaperly_custom_background_args', array(
			'default-color' => '#f1f1f1',
			'default-image' => '',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'newspaperly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newspaperly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newspaperly_content_width', 640 );
}
add_action( 'after_setup_theme', 'newspaperly_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newspaperly_widgets_init() {
/**
 * Widgets shown in the header, beside the logo.
 */
register_sidebar( array(
	'name'          => esc_html__( 'Header Widget', 'newspaperly' ),
	'id'            => 'banner-widget',
	'description'   => esc_html__( 'Add widgets to the header banner here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="banner-widget widget swidgets-wrap %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><h3 class="widget-title">',
	'after_title'   => '</h3></div>',
) );

/**
 * Widgets shown in the sidebar.
 */
register_sidebar( array(
	'name'          => esc_html__( 'Sidebar', 'newspaperly' ),
	'id'            => 'sidebar-1',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="fbox swidgets-wrap widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
	'after_title'   => '</h3></div></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Widget (1)', 'newspaperly' ),
	'id'            => 'footerwidget-1',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><h3 class="widget-title">',
	'after_title'   => '</h3></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Widget (2)', 'newspaperly' ),
	'id'            => 'footerwidget-2',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><h3 class="widget-title">',
	'after_title'   => '</h3></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Footer Widget (3)', 'newspaperly' ),
	'id'            => 'footerwidget-3',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="fbox widget %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><h3 class="widget-title">',
	'after_title'   => '</h3></div>',
) );

/**
 * Widgets shown under the navigation.
 */
register_sidebar( array(
	'name'          => esc_html__( 'Top Widget (1)', 'newspaperly' ),
	'id'            => 'headerwidget-1',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
	'after_title'   => '</h3></div></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Top Widget (2)', 'newspaperly' ),
	'id'            => 'headerwidget-2',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
	'after_title'   => '</h3></div></div>',
) );

register_sidebar( array(
	'name'          => esc_html__( 'Top Widget (3)', 'newspaperly' ),
	'id'            => 'headerwidget-3',
	'description'   => esc_html__( 'Add widgets here.', 'newspaperly' ),
	'before_widget' => '<section id="%1$s" class="header-widget widget swidgets-wrap %2$s">',
	'after_widget'  => '</section>',
	'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
	'after_title'   => '</h3></div></div>',
) );
}
add_action( 'widgets_init', 'newspaperly_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function newspaperly_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'newspaperly-style', get_stylesheet_uri() );
	wp_enqueue_script( 'newspaperly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170823', true );
	wp_enqueue_script( 'newspaperly-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170823', true );	
	wp_enqueue_script( 'newspaperly-flexslider-jquery', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '20150423', true );
	wp_enqueue_script( 'newspaperly-script', get_template_directory_uri() . '/js/script.js', array(), '20160720', true );
	wp_enqueue_script( 'newspaperly-accessibility', get_template_directory_uri() . '/js/accessibility.js', array(), '20160720', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'newspaperly_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Enqueue Google fonts, credits can be found in readme.
 */
function newspaperly_google_fonts() {

	wp_enqueue_style( 'newspaperly-google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700,900|Merriweather:400,700', false ); 
}

add_action( 'wp_enqueue_scripts', 'newspaperly_google_fonts' );


/**
 * excerpt Changes
 */

function newspaperly_new_excerpt_more( $more ) {
	if ( ! is_admin() )
		/* If you want to change replace the dots after excerpt with something else, do it on the line below */
	return '...';
}
add_filter('excerpt_more', 'newspaperly_new_excerpt_more');

function newspaperly_custom_excerpt_length( $length ) {
	if ( ! is_admin() )
		/* If you want to change the excerpt length, change this number */
	return 32;
}
add_filter( 'excerpt_length', 'newspaperly_custom_excerpt_length', 1 );

/**
 * Blog Pagination 
 */
if ( !function_exists( 'newspaperly_numeric_posts_nav' ) ) {
	
	function newspaperly_numeric_posts_nav() {
		
		$prev_arrow = is_rtl() ? 'Previous' : 'Next';
		$next_arrow = is_rtl() ? 'Next' : 'Previous';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo wp_kses_post(the_posts_pagination(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> 'Previous',
				'next_text'		=> 'Next',
			) ));
		}
	}
}





/**
 * * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );








// Theme page start

add_action('admin_menu', 'newspaperly_themepage');
function newspaperly_themepage()
{
	$option = get_option('newspaperly_themepage_seen');
	$awaiting = !$option ? ' <span class="awaiting-mod">1</span>' : '';
	$theme_info = add_theme_page(__('Theme Settings', 'newspaperly'), __('Theme Settings', 'newspaperly').$awaiting, 'manage_options', 'newspaperly-info.php', 'newspaperly_info_page', 1);
}
function newspaperly_info_page()
{
	$user = wp_get_current_user();
	$theme = wp_get_theme();
	$parent_name = is_child_theme() ? wp_get_theme($theme->Template) : '';
	$theme_name = is_child_theme() ? $theme." ".__("and", "newspaperly")." ".$parent_name : $theme;
	$demo_text = is_child_theme() ? sprintf(__("Need inspiration? Take a moment to view our theme demo for the %s parent theme %s!", "newspaperly"), $theme, $parent_name) : __("Need inspiration? Take a moment to view our theme demo!", "newspaperly");
	$premium_text = is_child_theme() ? sprintf(__("Unlock all features by upgrading to the premium edition of %s and its parent theme %s.", "newspaperly"), $theme, $parent_name) : sprintf(__("Unlock all features by upgrading to the premium edition of %s.", "newspaperly"),$theme);
	$option_name = 'newspaperly_themepage_seen';
	$option = get_option($option_name, null);
	if (is_null($option)) {
		add_option($option_name, true);
	} elseif (!$option) {
		update_option($option_name, true);
	} ?>
	<div class="wrap">

		<div class="spt-theme-settings-wrapper">
			<div class="spt-theme-settings-wrapper-main-content">
				<div class="spt-theme-settings-tabs">

					<div class="spt-theme-settings-tab">
						<input type="radio" id="tab-1" name="tab-group-1">



						<label class="spt-theme-settings-label" for="tab-1"><?php esc_html_e("Get started with", "newspaperly"); ?> <?php echo esc_html($theme_name); ?></label>

						<div class="spt-theme-settings-content">

							<div class="spt-theme-settings-content-getting-started-wrapper">
								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Add Menus", "newspaperly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('nav-menus.php'))  ?>"><?php esc_html_e("Go to Menus", "newspaperly"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Add Widgets", "newspaperly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('widgets.php'))  ?>"><?php esc_html_e("Go to Widgets", "newspaperly"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Change Header Image", "newspaperly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "newspaperly"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Upload Logo", "newspaperly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "newspaperly"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Change Background Color / Image", "newspaperly"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "newspaperly"); ?></a>
									</div>
								</div>


								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Customize All Fonts", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "newspaperly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Customize All Colors", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "newspaperly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Import Demo Content", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Demo Import", "newspaperly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Contact Premium Support", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "newspaperly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Unlock Full SEO Optimization", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "newspaperly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Only Show Upper Widgets On Front Page", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "newspaperly"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Unlock Elementor Compatibility", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Install Elementor", "newspaperly"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Access All Child Themes", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("View Child Themes", "newspaperly"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Only Show Widgets On Front Page", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "newspaperly"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Custom Copyright Text", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "newspaperly"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Tag' from tag page title", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "newspaperly"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Author' from author page title", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "newspaperly"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/newspaperly/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Category' from author page title", "newspaperly"); ?></span> <span><?php esc_html_e("Premium", "newspaperly"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "newspaperly"); ?></span>
									</div>
								</a>

							</div>
						</div> 
					</div>


				</div>      
			</div>

			<div class="spt-theme-settings-wrapper-sidebar">

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Additional Resources", "newspaperly"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<ul>
							<li>
								<a target="_blank" href="https://wordpress.org/support/forums/"><span class="dashicons dashicons-wordpress"></span><?php esc_html_e("WordPress.org Support Forum", "newspaperly"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://www.facebook.com/superbthemescom/"><span class="dashicons dashicons-facebook-alt"></span><?php esc_html_e("Find us on Facebook", "newspaperly"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://twitter.com/superbthemescom"><span class="dashicons dashicons-twitter"></span><?php esc_html_e("Find us on Twitter", "newspaperly"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://www.instagram.com/superbthemes/"><span class="dashicons dashicons-instagram"></span><?php esc_html_e("Find us on Instagram", "newspaperly"); ?></a>
							</li>

						</ul>
					</div>
				</div>


				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("View Demo", "newspaperly"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php echo esc_html($demo_text); ?></p>
						<a href="https://superbthemes.com/demo/newspaperly/" target="_blank" class="button button-primary"><?php esc_html_e("View Demo", "newspaperly"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Upgrade to Premium", "newspaperly"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php echo esc_html($premium_text); ?></p>
						<a href="https://superbthemes.com/newspaperly/" target="_blank" class="button button-primary"><?php esc_html_e("View Premium Version", "newspaperly"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Helpdesk", "newspaperly"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php esc_html_e("If you have issues with", "newspaperly"); ?> <?php echo esc_html($theme); ?> <?php esc_html_e("then send us an email through our website!", "newspaperly"); ?></p>
						<a href="https://superbthemes.com/customer-support/" target="_blank" class="button"><?php esc_html_e("Contact Support", "newspaperly"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Review the Theme", "newspaperly"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php esc_html_e("Do you enjoy using", "newspaperly"); ?> <?php echo esc_html($theme); ?><?php esc_html_e("? Support us by reviewing us on WordPress.org!", "newspaperly"); ?></p>
						<a href="https://wordpress.org/support/theme/<?php echo esc_attr(get_stylesheet()); ?>/reviews/#new-post" target="_blank" class="button"><?php esc_html_e("Leave a Review", "newspaperly"); ?></a>
					</div>
				</div>



			</div>

		</div>
	</div>


	<?php
}

function newspaperly_comparepage_css($hook) {
	if ('appearance_page_newspaperly-info' != $hook) {
		return;
	}
	wp_enqueue_style('newspaperly-custom-style', get_template_directory_uri() . '/css/compare.css');
}
add_action('admin_enqueue_scripts', 'newspaperly_comparepage_css');

// Theme page end







/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Newspaperly for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'newspaperly_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function newspaperly_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Superb Addons - WordPress Editor And Elementor Blocks, Sections & Patterns',
			'slug'      => 'superb-blocks',
			'required'  => false,
		),

		

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'newspaperly',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}


add_action('admin_init', 'newspaperly_spbThemesNotification', 8);

function newspaperly_spbThemesNotification(){
	$notifications = include('inc/admin_notification/Autoload.php');
	$notifications->Add("newspaperly_notification", "Unlock All Features with NewsPaperly Premium – Limited Time Offer", "
		
		Take advantage of the up to <span style='font-weight:bold;'>40% discount</span> and unlock all features with NewsPaperly Premium. 
		The discount is only available for a limited time.

		<div>
		<a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='https://superbthemes.com/newspaperly/'>Read More</a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='https://superbthemes.com/newspaperly/'>Upgrade Now</a>
		</div>

		", "info");



	$options_notification_start = array("delay"=> "-1 seconds", "wpautop" => false);
	$notifications->Add("newspaperly_notification_start", "Let's get you started with Newspaperly!", '
		<span class="st-notification-wrapper">
		<span class="st-notification-column-wrapper">
		<span class="st-notification-column">
		<img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/preview.png' ).'" width="150" height="177" />
		</span>

		<span class="st-notification-column">
		<h2>Why Newspaperly</h2>
		<ul class="st-notification-column-list">
		<li>Easy to Use & Customize</li>
		<li>Search Engine Optimized</li>
		<li>Lightweight and Fast</li>
		<li>Top-notch Customer Support</li>
		</ul>
		<a href="https://superbthemes.com/demo/newspaperly/" target="_blank" class="button">View Newspaperly Demo <span aria-hidden="true" class="dashicons dashicons-external"></span></a> 

		</span>
		<span class="st-notification-column">
		<h2>Customize Newspaperly</h2>
		<ul>
		<li><a href="'. esc_url( admin_url( 'customize.php' ) ) .'" class="button button-primary">Customize The Design</a></li>
		<li><a href="'. esc_url( admin_url( 'widgets.php' ) ) .'" class="button button-primary">Add/Edit Widgets</a></li>
		<li><a href="https://superbthemes.com/customer-support/" target="_blank" class="button">Contact Support <span aria-hidden="true" class="dashicons dashicons-external"></span></a> </li>
		</ul>
		</span>
		</span>
		<span class="st-notification-footer">
		Newspaperly is created by SuperbThemes. We have 100.000+ users and are rated <strong>Excellent</strong> on Trustpilot <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/stars.svg' ).'" width="87" height="16" />
		</span>
		</span>

		<style>.st-notification-column-wrapper{width:100%;display:-webkit-box;display:-ms-flexbox;display:flex;border-top:1px solid #eee;padding-top:20px;margin-top:3px}.st-notification-column-wrapper h2{margin:0}.st-notification-footer img{margin-bottom:-3px;margin-left:10px}.st-notification-column-wrapper .button{min-width:180px;text-align:center;margin-top:10px}.st-notification-column{margin-right:10px;padding:0 10px;max-width:250px;width:100%}.st-notification-column img{border:1px solid #eee}.st-notification-footer{display:inline-block;width:100%;padding:15px 0;border-top:1px solid #eee;margin-top:10px}.st-notification-column:first-of-type{padding-left:0;max-width:160px}.st-notification-column-list li{list-style-type:circle;margin-left:15px;font-size:14px}@media only screen and (max-width:1000px){.st-notification-column{max-width:33%}}@media only screen and (max-width:800px){.st-notification-column{max-width:50%}.st-notification-column:first-of-type{display:none}}@media only screen and (max-width:600px){.st-notification-column-wrapper{display:block}.st-notification-column{width:100%;max-width:100%;display:inline-block;padding:0;margin:0}span.st-notification-column:last-of-type{margin-top:30px}}</style>

		', "info", $options_notification_start);
	$notifications->Boot();
}
