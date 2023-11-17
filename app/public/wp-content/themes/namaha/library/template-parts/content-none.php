<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Namaha
 */
?>

<section class="no-results not-found">
	<?php if ( is_search() ) : ?>
	<header class="page-header">
		<?php 
		if ( get_theme_mod( 'namaha-layout-display-page-titles', customizer_library_get_default( 'namaha-layout-display-page-titles' ) ) ) :
		?>
		<h1 class="page-title centered top-padded"><?php echo wp_kses_post( pll__( get_theme_mod( 'namaha-website-text-no-search-results-heading', customizer_library_get_default( 'namaha-website-text-no-search-results-heading' ) ) ) ); ?></h1>
		<?php
		endif;
		?>
	</header><!-- .page-header -->
	<?php endif ?>

	<div class="page-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p>
				<?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'namaha' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>
			</p>

		<?php elseif ( is_search() ) : ?>
        
            <p class="centered">
            	<?php echo wp_kses_post( pll__( get_theme_mod( 'namaha-website-text-no-search-results-text', customizer_library_get_default( 'namaha-website-text-no-search-results-text' ) ) ) ); ?>
            </p>
            
			<p class="centered">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button"><?php _e( 'Back to Homepage', 'namaha' ); ?></a>
			</p>

		<?php else : ?>

			<p>
				<?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'namaha' ); ?>
			</p>

		<?php endif; ?>
        
	</div><!-- .page-content -->
    <div class="clearboth"></div>
    
</section><!-- .no-results -->
