<?php get_header(); ?>

<div class="container my-5">
    <h1 class="text-center mb-5">Tin tức mới nhất</h1>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="row mb-5 align-items-center">
                <!-- Ảnh đại diện bên trái -->
                <div class="col-md-5 mb-3 mb-md-0">
                    <a href="<?php the_permalink(); ?>">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail('large', array('class' => 'img-fluid rounded shadow')); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/tdc.png"
                                 class="img-fluid rounded shadow"
                                 alt="<?php the_title(); ?>">

                        <?php endif; ?>
                    </a>
                </div>

                <!-- Nội dung bên phải -->
                <div class="col-md-7">
                    <!-- Danh mục -->
                    <div class="mb-2">
                        <?php
                        $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            foreach ( $categories as $cat ) {
                                echo '<span class="badge bg-success me-1">' . esc_html( $cat->name ) . '</span>';
                            }
                        }
                        ?>
                    </div>

                    <h2 class="h4">
                        <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <p class="text-muted small mb-2">
                        <i class="fa fa-user"></i> <?php the_author(); ?> |
                        <i class="fa fa-calendar"></i> <?php echo get_the_date(); ?>
                    </p>

                    <p><?php echo wp_trim_words(get_the_excerpt(), 35); ?></p>

                    <a href="<?php the_permalink(); ?>" class="btn btn-outline-success btn-sm">
                        Đọc tiếp »
                    </a>
                </div>
            </div>
            <hr>
        <?php endwhile; ?>

        <!-- Phân trang -->
        <div class="pagination justify-content-center mt-5">
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('« Trước'),
                'next_text' => __('Tiếp »'),
            ));
            ?>
        </div>

    <?php else : ?>
        <div class="alert alert-warning">Chưa có bài viết nào.</div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
