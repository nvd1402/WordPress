<?php
function footertheme_enqueue_scripts() {
    // Bootstrap 4 CSS
    wp_enqueue_style('bootstrap4', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

    // Font Awesome
    wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    // Style theme
    wp_enqueue_style('footertheme-style', get_stylesheet_uri());

    // jQuery có sẵn trong WP
    wp_enqueue_script('jquery');

    // Bootstrap JS
    wp_enqueue_script('bootstrap4', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'footertheme_enqueue_scripts');
// Đăng ký nhiều vị trí menu cho footer
function footertheme_register_menus() {
    register_nav_menus(array(
        'footer1' => __('Footer Cột 1', 'footertheme'),
        'footer2' => __('Footer Cột 2', 'footertheme'),
        'footer3' => __('Footer Cột 3', 'footertheme'),
    ));
}
add_action('after_setup_theme', 'footertheme_register_menus');
// Thêm icon vào menu item dựa vào tên menu
function add_icon_to_footer_menu($title, $item, $args, $depth) {
    // Kiểm tra menu nào
    if (in_array($args->theme_location, array('footer1','footer2','footer3'))) {
        // Lấy class icon tùy theo menu title
        if (stripos($title, 'Home') !== false) {
            $icon = '<i class="fa fa-home mr-1"></i>';
        } elseif (stripos($title, 'About') !== false) {
            $icon = '<i class="fa fa-info-circle mr-1"></i>';
        } elseif (stripos($title, 'FAQ') !== false) {
            $icon = '<i class="fa fa-question-circle mr-1"></i>';
        } elseif (stripos($title, 'Videos') !== false) {
            $icon = '<i class="fa fa-video-camera mr-1"></i>';
        } else {
            $icon = '<i class="fa fa-angle-double-right mr-1"></i>'; // icon mặc định
        }
        $title = $icon . $title;
    }
    return $title;
}
add_filter('nav_menu_item_title', 'add_icon_to_footer_menu', 10, 4);
