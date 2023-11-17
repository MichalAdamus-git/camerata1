<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Namaha
 */

if (!defined('ABSPATH')) exit;

get_header(); ?>
    
    <?php
    if ( ! is_front_page() ) :

        if ( function_exists( 'bcn_display' ) ) :
	?>
        <div class="breadcrumbs">
            <?php bcn_display(); ?>
        </div>
	<?php
		endif;

    endif;
    ?>

	<div id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">
        
        	<?php get_template_part( 'library/template-parts/page-title' ); ?>
        
	        <div id="archive-container" class="archive-container">
	
				<?php
				if ( have_posts() ) {
	        
					$namaha_blog_layout 			 	= get_theme_mod( 'namaha-blog-layout', customizer_library_get_default( 'namaha-blog-layout' ) );
					$namaha_blog_masonry_grid_border = get_theme_mod( 'namaha-blog-masonry-grid-border', customizer_library_get_default( 'namaha-blog-masonry-grid-border' ) );
					
					if ( $namaha_blog_layout == 'blog-post-masonry-grid-layout' ) {
					?>
					<div id="masonry-grid-container" class="masonry-grid-container loading <?php echo $namaha_blog_masonry_grid_border ? 'bordered' : ''; ?>">
					<?php
					}

					while ( have_posts() ) : the_post();
		
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'library/template-parts/content', get_post_format() );
		
					endwhile;
						
					if ( $namaha_blog_layout == 'blog-post-masonry-grid-layout' ) {
					?>
					</div>
					<?php
					}

					if ( !class_exists( 'Jetpack' ) || class_exists( 'Jetpack' ) && !Jetpack::is_module_active( 'infinite-scroll' ) ) {
						namaha_paging_nav();
					}
					
				} else {
		
					get_template_part( 'library/template-parts/content', 'none' );
		
				}
				?>
				
			</div><!-- .archive-container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
