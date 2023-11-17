<?php
function events() {
	register_post_type('event', array(
		'has_archive' => true,
		'public' => true,
		'labels' => array(
			'name' => 'Wydarzenia',
			'add_new_item' => 'Dodaj Wydarzenie',
			'edit_item' => 'Dodaj wydarzenie',
			'singular_name' => 'Wydarzenie'
		)
	));
}




add_action('init','events');
?>