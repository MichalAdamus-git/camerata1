<?php
if ( ( ( is_front_page() && get_theme_mod( 'namaha-layout-display-homepage-page-title', customizer_library_get_default( 'namaha-layout-display-homepage-page-title' ) ) ) ) || !is_front_page() ) :
?>
    
    <header class="entry-header">
        
        <?php
        if ( is_home() ) :
			echo '<h1 class="entry-title">'. get_the_title( intval( get_option('page_for_posts', true) ) ) .'</h1>';
		elseif ( !is_home() ):
			the_title( '<h1 class="entry-title">', '</h1>' );
		endif;
        ?>
        
    </header><!-- .entry-header -->

<?php
endif;