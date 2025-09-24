<?php get_header(); ?>

<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part('parts/content', 'card'); // loads parts/content-card.php
                endwhile;
            else :
                echo '<p>Không có bài viết.</p>';
            endif;
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-4">
            <?php
            the_posts_pagination(array(
                'prev_text' => '« Trước',
                'next_text' => 'Sau »',
            ));
            ?>
        </nav>
    </div>

    <aside class="col-lg-4">
        <?php get_search_form(); ?>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Danh mục</h5>
                <?php wp_list_categories(array('title_li' => '', 'show_count' => true)); ?>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bài mới</h5>
                <ul class="list-unstyled">
                    <?php
                    $recent = new WP_Query(array('posts_per_page' => 5));
                    if ($recent->have_posts()):
                        while ($recent->have_posts()): $recent->the_post(); ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </aside>
</div>

<?php get_footer(); ?>
