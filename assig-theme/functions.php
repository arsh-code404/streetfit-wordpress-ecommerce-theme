<?php

function theme_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme','theme_setup');


function theme_styles(){
    wp_enqueue_style('main-style', get_stylesheet_uri(), [], time());
}
add_action('wp_enqueue_scripts','theme_styles');