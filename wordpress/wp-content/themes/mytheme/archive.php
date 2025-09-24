<?php get_header(); ?>
<h1>Danh sách bài viết</h1>
<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        the_title('<h2>','</h2>');
        the_excerpt();
        echo '<a href="'.get_permalink().'">Đọc tiếp</a>';
    endwhile;
endif;
get_footer();
?>
