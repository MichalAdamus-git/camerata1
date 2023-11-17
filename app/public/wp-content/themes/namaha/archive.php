<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Namaha
 */

get_header(); ?>
    
    <?php if ( function_exists( 'bcn_display' ) ) : ?>
        <div class="breadcrumbs">
            <?php bcn_display(); ?>
        </div>
    <?php endif; ?>

	<div id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
			<div class="archive-container">

				<?php
				if ( have_posts() ) {

					while ( have_posts() ) : the_post();
		
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'library/template-parts/content', get_post_format() );
		
					endwhile;
	
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
