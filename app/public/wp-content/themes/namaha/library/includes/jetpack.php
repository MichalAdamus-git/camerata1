<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Namaha
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function namaha_jetpack_setup() {
	if ( get_theme_mod( 'namaha-blog-layout' ) == 'blog-post-masonry-grid-layout' ) {
		$container = 'masonry-grid-container';
		$wrapper   = true; 
	} else {
		$container = 'archive-container';
		$wrapper   = false;
	}
	
	add_theme_support( 'infinite-scroll', array(
		'container' => $container,
		'render'    => 'namaha_infinite_scroll_render',
		'footer'    => false,
		'wrapper'	=> $wrapper
	) );
}
add_action( 'after_setup_theme', 'namaha_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function namaha_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'library/template-parts/content', get_post_format() );
	}
}

/**
 * Remove default Related Posts | Custom added to single.php.
 */
function namaha_remove_default_related_posts() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp     = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
 
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_action( 'wp', 'namaha_remove_default_related_posts', 20 );
