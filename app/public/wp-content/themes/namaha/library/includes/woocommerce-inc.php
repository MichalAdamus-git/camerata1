<?php
// Ensure cart contents update when products are added to the cart via AJAX
function namaha_wc_header_add_to_cart_fragment( $fragments ) {
    ob_start();
	get_template_part( 'library/template-parts/header-cart-contents' );
	$fragments['a.header-cart-contents'] = ob_get_clean();
    return $fragments;
}

if ( get_theme_mod( 'namaha-woocommerce-header-cart-auto-update', true ) ) {
	add_filter('woocommerce_add_to_cart_fragments', 'namaha_wc_header_add_to_cart_fragment');
}
