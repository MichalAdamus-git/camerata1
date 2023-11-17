<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Namaha
 */

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
            
            <?php
            get_template_part( 'library/template-parts/page-title' );

			while ( have_posts() ) : the_post();

				get_template_part( 'library/template-parts/content', 'page' );

				// If comments are open load up the comment template
				if ( comments_open() ) :
					comments_template();
				endif;

			endwhile;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
