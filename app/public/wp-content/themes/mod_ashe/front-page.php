<?php

get_header();

if ( is_front_page() ) {

	// Featured Slider, Carousel
	if ( ashe_options( 'featured_slider_label' ) === true && ashe_options( 'featured_slider_location' ) !== 'blog' ) {
		if ( ashe_options( 'featured_slider_source' ) === 'posts' ) {
			get_template_part( 'templates/header/featured', 'slider' );
		} else {
			get_template_part( 'templates/header/featured', 'slider-custom' );
		}
	}

	// Featured Links, Banners
	if ( ashe_options( 'featured_links_label' ) === true && ashe_options( 'featured_links_location' ) !== 'blog' ) {
		get_template_part( 'templates/header/featured', 'links' ); 
	}

}

?>
	
	<?php
	
	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' ); 

	?>


	
	<?php
	// Sidebar Right
	get_template_part( 'templates/sidebars/sidebar', 'right' );
	?>
	

<div class="main-content clear-fix<?php echo esc_attr(ashe_options( 'general_content_width' )) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' )  ); ?>">


<?php get_footer(); ?>
