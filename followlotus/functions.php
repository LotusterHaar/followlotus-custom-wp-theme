<?php

//Adds dynamic title tag support
function followlotus_theme_support() {

    // Adds <title> tag support
    add_theme_support( 'title-tag' );
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

}
add_action( 'after_setup_theme', 'followlotus_theme_support');

function followlotus_register_styles(){

    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('custom-followlotus', get_template_directory_uri() . "/assets/css/style.css", array('bootstrap-cdn-min'), $version, 'all');
    wp_enqueue_style('fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
    wp_enqueue_style('bootstrap-cdn-min', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" , array(), '4.4.1', 'all');

}

function followlotus_register_scripts(){
   wp_enqueue_script('followlotus-custom-js', get_template_directory_uri() . "/assets/js/main.js", array(), '1.0', true);
   wp_enqueue_script('slim-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
   wp_enqueue_script('popper-min-js', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
   wp_enqueue_script('bootstrap-min-js', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(),'4.4.1', true);
}

add_action('wp_enqueue_scripts', 'followlotus_register_styles');
add_action('wp_enqueue_scripts', 'followlotus_register_scripts');

function followlotus_register_menus(){
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer'=> "Footer Menu Items",
    );
    register_nav_menus($locations);
}

add_action('init', 'followlotus_register_menus');

function followlotus_widget_areas(){
   register_sidebar(
    array(
        'before_title' => '',
        'after_title' => '</h2>',
        'before_widget' => '<ul>',
        'after_widget' => '</ul>',

    ),
    array(
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area',

        )
   );
}

add_action('widgets_init', 'followlotus_widget_areas')
?>


