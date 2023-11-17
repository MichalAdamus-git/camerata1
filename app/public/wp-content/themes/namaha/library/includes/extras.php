<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Namaha
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function namaha_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'namaha_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function namaha_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'namaha_body_classes' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function namaha_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'namaha_setup_author' );

function namaha_create_dropdown_list( $name, $id, $dataset, $selected_value, $classes = '' ) {
	$dataset = ( array ) $dataset;
	$classes = ( array ) $classes;
	
	$dropdown = '<select name="' .$name. '" id="' .$id. '" class="' .implode( ' ', $classes ). '">';
	
	foreach( $dataset as $data_item => $value ) {
		$dropdown .= '<option value="' .$value. '"' .( $selected_value == $value ? 'selected' : '' ). '>' .$data_item. '</option>';
	}
	
	$dropdown .= '</select>';
	
	return $dropdown;
}
