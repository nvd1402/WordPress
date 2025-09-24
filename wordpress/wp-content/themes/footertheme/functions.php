<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function mytheme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'mytheme_setup');

function mytheme_enqueue_assets() {
    // Bootstrap CSS (CDN) - bạn có thể thay bằng file local trong assets/css nếu muốn
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css', array(), '5.3.2');
    // Main theme stylesheet
    wp_enqueue_style('mytheme-main', get_stylesheet_uri(), array('bootstrap-css'), filemtime(get_template_directory() . '/style.css'));
    // Optional custom css from assets
    wp_enqueue_style('mytheme-custom', get_template_directory_uri() . '/assets/css/main.css', array('mytheme-main'), filemtime(get_template_directory() . '/assets/css/main.css'));

    // Bootstrap JS bundle (Popper included)
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array(), '5.3.2', true);
    // Main js
    wp_enqueue_script('mytheme-main-js', get_template_directory_uri() . '/assets/js/main.js', array('bootstrap-js'), filemtime(get_template_directory() . '/assets/js/main.js'), true);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');
