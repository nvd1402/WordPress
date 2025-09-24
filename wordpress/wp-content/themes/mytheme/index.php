<?php
?><!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<h1><?php bloginfo('name'); ?></h1>
<h2><?php bloginfo('description'); ?></h2>

<?php
// Loop bài viết mới nhất
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_title('<h2>','</h2>');
        the_excerpt();
        echo '<a href="'.get_permalink().'">Đọc tiếp</a>';
    endwhile;
else :
    echo '<p>Không có bài viết</p>';
endif;
?>

<?php wp_footer(); ?>
</body>
</html>
