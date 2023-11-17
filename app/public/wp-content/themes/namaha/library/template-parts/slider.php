<?php
global $slider_type, $demo_slides;

if ( $slider_type == 'plugin' ) :
?>
	<div class="slider-padder">
		<div class="slider-container">
			<?php
			if ( get_theme_mod( 'namaha-slider-plugin-shortcode', customizer_library_get_default( 'namaha-slider-plugin-shortcode' ) ) != '' ) {
				echo do_shortcode( sanitize_text_field( get_theme_mod( 'namaha-slider-plugin-shortcode' ) ) );
			}
			?>
	    </div>
    </div>
<?php
elseif ( $slider_type == 'default' ) :
	$opacity_classes = array();

	$translucent_header	= get_theme_mod( 'namaha-translucent-header', customizer_library_get_default( 'namaha-translucent-header' ) );
	
	if ( get_theme_mod( 'namaha-slider-text-overlay-text-shadow', customizer_library_get_default( 'namaha-slider-text-overlay-text-shadow' ) ) ) {
		$opacity_classes[] = 'text-shadow';
	}
	
	if ( get_theme_mod( 'namaha-font-awesome-version', customizer_library_get_default( 'namaha-font-awesome-version' ) ) == '4.7.0' ) {
		$font_awesome_code = 'otb-fa';
		$font_awesome_icon_prefix = 'otb-';
	} else {
		$font_awesome_code = 'fa';
		$font_awesome_icon_prefix = '';
	}

	$slider_categories = get_theme_mod( 'namaha-slider-categories' );
	
	if ( $slider_categories ) {
        
		$slider_query = new WP_Query( 'cat=' . implode(',', $slider_categories) . '&posts_per_page=-1&orderby=date&order=DESC&id=slider' );
	        
		if ( $slider_query->have_posts() ) :
?>	
			<div class="slider-padder">
				<div class="slider-container default loading">
				
					<div class="controls-container">
						<div class="controls">
							<div class="prev">
								<i class="<?php echo esc_attr( $font_awesome_code ); ?> <?php echo esc_attr( $font_awesome_icon_prefix ); ?>fa-angle-left"></i>
							</div>
							<div class="next">
								<i class="<?php echo esc_attr( $font_awesome_code ); ?> <?php echo esc_attr( $font_awesome_icon_prefix ); ?>fa-angle-right"></i>
							</div>
						</div>
					</div>
				
					<ul class="slider">
				                    
						<?php
						while ( $slider_query->have_posts() ) : $slider_query->the_post();
						?>
				                    
						<li class="slide">
							<?php
							if ( has_post_thumbnail() ) :
								the_post_thumbnail( 'full', array( 'class' => '' ) );
							endif;
							?>
	
							<div class="opacity"></div>
	
				            <?php 
				            $content = trim( get_the_content() );
				            
				            if ( !empty( $content ) ) {
				            ?>
				            <div class="overlay-container">
				            	
								<div class="overlay">
									<div class="opacity <?php echo implode( ' ', $opacity_classes ); ?>">
										<?php
										echo $content;
										?>
									</div>
								</div>
				            	
							</div>
							<?php 
							}
							?>
						</li>
				                    
						<?php
						endwhile;
						?>
				                    
					</ul>
					
					<div class="pagination"></div>
					
				</div>
			</div>
	
<?php
		elseif ( $translucent_header ) :
?>
			<div class="slider-placeholder"></div>
<?php
		endif;
		wp_reset_postdata();
	
	} else {
?>

		<div class="slider-padder">
			<div class="slider-container default loading">
			
				<div class="controls-container">
					<div class="controls">
						<div class="prev">
							<i class="<?php echo esc_attr( $font_awesome_code ); ?> <?php echo esc_attr( $font_awesome_icon_prefix ); ?>fa-angle-left"></i>
						</div>
						<div class="next">
							<i class="<?php echo esc_attr( $font_awesome_code ); ?> <?php echo esc_attr( $font_awesome_icon_prefix ); ?>fa-angle-right"></i>
						</div>
					</div>
				</div>
	                        
	            <ul class="slider">
					<?php
					foreach ( $demo_slides as $slide ) {
					?>
	            
					<li class="slide">
	                    <img src="<?php echo $slide['image']; ?>" alt="<?php esc_attr_e('Demo Slide', 'namaha'); ?>" />
	                    <div class="opacity"></div>
						<div class="overlay-container">
						
		                    <div class="overlay">
		                    	<div class="opacity <?php echo implode( ' ', $opacity_classes ); ?>">
		                    		<?php
		                    		echo ( trim( $slide['text'] ) );
		                    		?>
		                        </div>
		                	</div>
	                    </div>
	                </li>
	                
	                <?php
	                }
	                ?>
	                
	            </ul>
	            
				<div class="pagination"></div>
				
	        </div>
        </div>

<?php
	}
endif;
