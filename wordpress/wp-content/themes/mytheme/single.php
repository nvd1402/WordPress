<?php get_header(); ?>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        the_title('<h1>','</h1>');
        the_content();
    endwhile;
endif;

// Bài viết cùng danh mục
$categories = wp_get_post_categories(get_the_ID());
$related = new WP_Query(array(
    'category__in' => $categories,
    'post__not_in' => array(get_the_ID()),
    'posts_per_page' => 3
));
if($related->have_posts()):
    echo '<h3>Bài viết cùng danh mục</h3>';
    while($related->have_posts()): $related->the_post();
        the_title('<h4>','</h4>');
    endwhile;
    wp_reset_postdata();
endif;
?>
<?php get_footer(); ?>
