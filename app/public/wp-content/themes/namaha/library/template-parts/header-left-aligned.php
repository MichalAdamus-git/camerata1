<?php
$logo = '';
$logo_link_content = '';

if ( get_theme_mod( 'namaha-logo-link-content', customizer_library_get_default( 'namaha-logo-link-content' ) ) == "" ) {
	$logo_link_content = home_url( '/' );
} else {
	$logo_link_content = get_permalink( get_theme_mod( 'namaha-logo-link-content' ) );
}

if ( function_exists( 'has_custom_logo' ) ) {
	if ( has_custom_logo() ) {
		$logo = get_custom_logo();
	}
} else if ( get_theme_mod( 'namaha-logo' ) ) {
	$logo = "<a href=\"". esc_url( $logo_link_content ) ."\" class=\"custom-logo-link\"><img src=\"". esc_url( get_theme_mod( 'namaha-logo' ) ) ."\" alt=\"". esc_attr( get_bloginfo( 'name' ) ) .' - '. esc_attr( get_bloginfo( 'description', 'display' ) ) ."\" class=\"custom-logo\" /></a>";
}

$branding_classes = array();
?>

<div class="site-logo-area">
	<div class="site-container">
	
	    <?php
		if ( get_theme_mod( 'namaha-site-branding-contained', customizer_library_get_default( 'namaha-site-branding-contained' ) ) ) {
			$branding_classes[] = 'contained';
		}
	    ?>
	    
	    <div class="branding <?php echo esc_attr( implode( ' ', $branding_classes ) ); ?>">
	        <?php
	        if ( $logo ) {
	       		echo $logo;
	        } else {
			?>
				<a href="<?php echo esc_url( $logo_link_content ); ?>" class="title <?php echo esc_attr( get_theme_mod( 'namaha-site-title-font-weight', customizer_library_get_default( 'namaha-site-title-font-weight' ) ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<div class="description"><?php bloginfo( 'description' ); ?></div>
	        <?php
	        }
	        ?>
		</div>
		
		<?php
		$top_right = '';
	        
		if ( namaha_is_woocommerce_activated() && get_theme_mod( 'namaha-header-shop-links', customizer_library_get_default( 'namaha-header-shop-links' ) ) ) {
			$top_right = 'shop-links';
		} else {
			$top_right = 'info-text-one';
		}
		?>		
	    
	    <div class="site-header-right <?php echo $top_right == '' ? 'top-empty' : ''; ?>">
	        
	        <div class="top <?php echo $top_right == '' ? 'empty' : $top_right; ?>">
		        <?php
		        switch ($top_right) {
		    		case 'shop-links':
		    			get_template_part( 'library/template-parts/shop-links' );
		    			break;
		    			
		    		case 'info-text-one':
		    			get_template_part( 'library/template-parts/info-text' );
		    			break;
		    	}
		    	?>
	        </div>
	        
	        <div class="bottom social-links">
		        <?php
    			get_template_part( 'library/template-parts/social-links' );
		    	?>
			</div>
			        
	    </div>
	    <div class="clearboth"></div>
	    
	</div>
</div>

<?php
global $show_slider, $show_header_image, $is_navigation_menu_translucent;

$is_navigation_menu_translucent = get_theme_mod( 'namaha-translucent-header', customizer_library_get_default( 'namaha-translucent-header' ) );

if ( $is_navigation_menu_translucent && !$show_slider && !$show_header_image ) {
	$is_navigation_menu_translucent = false;
}

get_template_part( 'library/template-parts/navigation-menu' );
