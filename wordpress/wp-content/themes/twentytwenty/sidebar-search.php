<aside class="sidebar-search">
    <h2 class="sidebar-title">Trang mới nhất</h2>

    <?php
    $recent_pages = new WP_Query(array(
        'post_type'      => 'page',
        'posts_per_page' => 5,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));

    if ( $recent_pages->have_posts() ) :
        while ( $recent_pages->have_posts() ) :
            $recent_pages->the_post(); ?>

            <div class="sidebar-page-item">
                <h3 class="sidebar-page-title">
                    <?php the_title(); ?>
                </h3>
                <div class="title-underline"></div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="sidebar-page-thumb">
                        <?php the_post_thumbnail('medium_large'); ?>
                    </div>
                <?php endif; ?>

                <div class="sidebar-page-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 505, '...'); ?>
                </div>
            </div>

        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p>Chưa có trang nào.</p>
    <?php endif; ?>
</aside>
