<div class="shop-links">
	<div class="account-link">
	<?php
	if ( is_user_logged_in() ) {
	?>
		<a href="<?php echo esc_url( get_permalink( intval( get_option('woocommerce_myaccount_page_id') ) ) ); ?>" class="my-account">
			<?php esc_attr_e('My Account','namaha'); ?>
		</a>
	<?php
	} else {
	?>
		<a href="<?php echo esc_url( get_permalink( intval( get_option('woocommerce_myaccount_page_id') ) ) ); ?>" class="my-account">
			<?php esc_attr_e('Sign In&nbsp;&nbsp;|&nbsp;&nbsp;Register','namaha'); ?>
		</a>
	<?php
	}
	?>
	</div>

	<div class="header-cart">
	<?php
	get_template_part( 'library/template-parts/header-cart-contents' );
	?>
	</div>
</div>