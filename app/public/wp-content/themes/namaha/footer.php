<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Namaha
 */
?>

	</div><!-- #content -->
</div><!-- .content-container -->

<footer id="colophon" class="site-footer" role="contentinfo">

	<div class="site-footer-widgets">
		<div class="site-container">
        
            <?php if ( is_active_sidebar( 'footer' ) ) : ?>
            <div class="widgets-container">
                <?php dynamic_sidebar( 'footer' ); ?>
            </div>
    		<?php endif; ?>
    		
            <div class="clearboth"></div>
        </div>
    </div>
    
	<div class="site-footer-bottom-bar">
	
		<div class="site-container">
			
			<div class="site-footer-bottom-bar-left">

				<?php printf( __( 'Theme by %1$s', 'namaha' ), '<a href="https://www.outtheboxthemes.com" rel="nofollow">Out the Box</a>' ); ?>
                
			</div>
			
	        <div class="site-footer-bottom-bar-right">

	        	<?php
				if ( is_active_sidebar( 'footer-bottom-bar-right' ) ) {
					dynamic_sidebar( 'footer-bottom-bar-right' );
 				}
				?>

	        </div>
	        
	    </div>
		
        <div class="clearboth"></div>
	</div>
	
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>