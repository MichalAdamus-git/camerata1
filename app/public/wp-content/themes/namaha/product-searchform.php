<?php
/**
 * The template for displaying the product search form
 *
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( get_theme_mod( 'namaha-font-awesome-version', customizer_library_get_default( 'namaha-font-awesome-version' ) ) == '4.7.0' ) {
	$font_awesome_code = 'otb-fa';
	$font_awesome_icon_prefix = 'otb-';
} else {
	$font_awesome_code = 'fa';
	$font_awesome_icon_prefix = '';
}
?>
<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'namaha' ); ?></label>
	<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'namaha' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'namaha' ); ?>" />
	<div class="search-submit-container">
		<a class="search-submit">
			<i class="<?php echo esc_attr( $font_awesome_code ); ?> <?php echo esc_attr( $font_awesome_icon_prefix ); ?>fa-search"></i>
		</a>
	</div>
	<input type="hidden" name="post_type" value="product" />
</form>
