<?php

// check if available
if ( ! is_active_sidebar( 'sidebar-right' ) && ! ashe_is_preview() ) {
	return;
}

if ( class_exists( 'WooCommerce' ) ) {

	if ( is_cart() || is_checkout() || is_account_page() ) {
		return;
	}
}

?>

<?php 
if ( is_front_page() || get_post_type()==="page" ) {
	?>
	<aside class="sidebar-right-wrap-fp">
		<?php
 
		if ( ashe_is_preview() ) {
			ashe_preview_right_sidebar();
		} else {
			dynamic_sidebar( 'sidebar-right' );
		}
			?>
	</aside>

<?php
} else {
	?>
		<aside class="sidebar-right-wrap-fp">
			<?php

			if ( ashe_is_preview() ) {
				ashe_preview_right_sidebar();
			} else {
				dynamic_sidebar( 'sidebar-right' );
			}

			?>
		</aside>
<?php
}
?>