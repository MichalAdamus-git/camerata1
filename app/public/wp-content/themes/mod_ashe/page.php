<?php

get_header();

if ( is_front_page() ) {

	// Featured Slider, Carousel
	if ( ashe_options( 'featured_slider_label' ) === true && ashe_options( 'featured_slider_location' ) !== 'blog' ) {
		if ( ashe_options( 'featured_slider_source' ) === 'posts' ) {
			get_template_part( 'templates/header/featured', 'slider' );
		} else {
			get_template_part( 'templates/header/featured', 'slider-custom' );
		}
	}

	// Featured Links, Banners
	if ( ashe_options( 'featured_links_label' ) === true && ashe_options( 'featured_links_location' ) !== 'blog' ) {
		get_template_part( 'templates/header/featured', 'links' ); 
	}
}
?>

<div class="main-content clear-fix<?php echo esc_attr(ashe_options( 'general_content_width' )) === 'boxed' ? ' boxed-wrapper': ''; ?>" data-sidebar-sticky="<?php echo esc_attr( ashe_options( 'general_sidebar_sticky' )  ); ?>">
	
	<?php
	
	// Sidebar Left
	get_template_part( 'templates/sidebars/sidebar', 'left' ); 

	?>
	<?php 
		the_post();
		$pgt = get_the_title();
		if ( $pgt !== "Nuty" && $pgt !== "Wydarzenia" && $pgt !== "Archiwalna strona") {
		?>
		<div class="dmpage">
			<h2 class="mpage-title"><?php the_title() ?></h2>
			<p class="mpgae"><?php the_content() ?></p>
		</div>
		<?php
		} elseif ( $pgt == "Archiwalna strona") {
			?>
			<div class="dmpage">
			<h2 class="mpage-title"><?php the_title() ?></h2>
			<p class="mpgae"><?php the_content() ?></p>
			<h2 class="archiwum"><a href="<?php echo content_url('/camerata_archiwum/Camerata_archiwum/cameratawieliczka.pl/index.html') ?>">Zapraszamy do odwiedzenia archiwlanej strony chóru.</a></h2>
			</div>
			<?php
	
		} elseif ( $pgt == "Nuty") {
			if ( is_user_logged_in() ) {
		?>

		<div class="dmpage">
			<span class="notes">
				<p><a href="http://www.nut.cameratawieliczka.pl/">Nuty dla członków chóru</a></p>
		</span>
		</div>
		<?php 
		} else {
			?>
			<div class="dmpage">
			<span class="notes">
				<p><a href="<?php echo esc_url(site_url('/wp-login.php')) ?>">Zaloguj się aby zobaczyć pliki dla członków chóru</a></p>
		</span>
		</div>
			<?php
		}
	}

	if ($pgt == "Wydarzenia") {
		?>
		<div class="dmpage">
		<?php 
		$query_k = new WP_Query(array(
			'post_type' => 'event'
			)
		 );
		while ($query_k->have_posts()) {
			$query_k->the_post();
			?>
			<div class="post-item_2">
			<span>
				<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
			   </span>

			<div class="metabox_2">
			 <p><?php echo(get_the_date()) ?> </p>
			</div>
			<div class="generic-content_2">
			 <?php the_excerpt(); ?>
				</div>
			</div>
			<?php
			}

			?>
		</div>
		<?php
	}
	
	?>

	<?php	
	// Sidebar Right
	get_template_part( 'templates/sidebars/sidebar', 'right' ); 

	?>

</div><!-- .page-content -->

<?php get_footer(); ?>