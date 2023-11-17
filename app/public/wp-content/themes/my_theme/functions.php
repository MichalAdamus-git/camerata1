<?php 
function university_files() {
    wp_enqueue_script('main-univeristy-js', get_theme_file_uri('/build/index.js', array('jquery'), '1.0', true));
    wp_enqueue_style('university_icons','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('univeristy_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('univeristy_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts','university_files');

function university_features() {
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerLocationOne', 'Footer Location One');
    register_nav_menu('footerLoactionTwo', 'Footer Loaction Two');
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');
?>
<?php
function univeristy_postt() {
    register_post_type('event', array(
        'public' => true,
        //'menu_icon' => 
        'labels' => array(
            'name' => events
        )
    ));
}

add_action('init', 'university_postt');

?>



