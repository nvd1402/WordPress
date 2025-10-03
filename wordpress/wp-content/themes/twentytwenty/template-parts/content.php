<?php
/**
 * Template hiển thị bài viết
 * Format giống hình mẫu (Ngày bên trái, nội dung bên phải)
 */

if ( is_single() ) { ?>
    <article <?php post_class('single-post'); ?> id="post-<?php the_ID(); ?>">

        <!-- Ảnh đại diện -->
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="single-thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <!-- Ngày đăng -->
        <div class="flex-custom">
            <div class="post-date">
                <div class="day"><?php echo get_the_date('d'); ?></div>
                <span class="month">Tháng <?php echo get_the_date('m'); ?></span>
                <span class="year"><?php echo get_the_date('Y'); ?></span>
            </div>
        </div>

        <!-- Nội dung -->
        <div class="post-content">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-meta">
                <span class="author"><?php the_author(); ?></span> |
                <span class="categories"><?php the_category(', '); ?></span>
            </div>
            <div class="entry-content">
                <?php the_content(__('Continue reading', 'twentytwenty')); ?>
            </div>
        </div>

    </article>
<?php } else { ?>
    <!-- Danh sách bài viết -->
    <article <?php post_class('post-item'); ?> id="post-<?php the_ID(); ?>">

        <div class="post-inner">
            <!-- Cột trái: Ngày tháng -->
            <div class="post-date">
                <div class="day"><?php echo get_the_date('d'); ?></div>
                <div class="month">THÁNG <?php echo get_the_date('m'); ?></div>
            </div>

            <!-- Cột phải: Nội dung -->
            <div class="post-content">
                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="post-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?>
                </div>
            </div>
        </div>

    </article>
<?php } ?>
