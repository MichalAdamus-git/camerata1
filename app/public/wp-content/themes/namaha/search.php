<?php
/**
 * The template for displaying search results pages.
 *
 * @package Namaha
 */

get_header(); ?>

	<section id="primary" class="content-area <?php echo !is_active_sidebar( 'sidebar-1' ) ? 'full-width' : ''; ?>">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) {
            
            if ( function_exists( 'bcn_display' ) ) : 
			?>
            <div class="breadcrumbs">
                <?php bcn_display(); ?>
            </div>
            <?php 
			endif;
			?>

			<header class="page-header">
				<?php
				if ( get_theme_mod( 'namaha-layout-display-page-titles', customizer_library_get_default( 'namaha-layout-display-page-titles' ) ) ) :
				?>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'namaha' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php
				endif
				?>
			</header><!-- .page-header -->
			
			<div id="archive-container" class="archive-container">

				<?php
				$namaha_blog_layout 			 = get_theme_mod( 'namaha-blog-layout', customizer_library_get_default( 'namaha-blog-layout' ) );
				$namaha_blog_masonry_grid_border = get_theme_mod( 'namaha-blog-masonry-grid-border', customizer_library_get_default( 'namaha-blog-masonry-grid-border' ) );
				
				if ( $namaha_blog_layout == 'blog-post-masonry-grid-layout' ) {
				?>
				<div id="masonry-grid-container" class="masonry-grid-container loading <?php echo $namaha_blog_masonry_grid_border ? 'bordered' : ''; ?>">
				<?php
				}
				
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'library/template-parts/content', 'search' );
	
				endwhile;
				
				if ( $namaha_blog_layout == 'blog-post-masonry-grid-layout' ) {
				?>
				</div>
				<?php
				}
	
				if ( !class_exists( 'Jetpack' ) || class_exists( 'Jetpack' ) && !Jetpack::is_module_active( 'infinite-scroll' ) ) {
					namaha_paging_nav();
				}
				?>
				
			</div><!-- .archive-container -->
		<?php
		} else {

			get_template_part( 'library/template-parts/content', 'none' );

		}
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
