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
    <!-- Danh sách bài viết dạng 3 cột: Ảnh - Ngày - Nội dung -->
    <article <?php post_class('news-item'); ?> id="post-<?php the_ID(); ?>">

        <div class="news-card">
            <!-- Ảnh đại diện -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="news-thumb">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium_large'); ?>
                    </a>
                </div>
            <?php endif; ?>

            <!-- Cột ngày tháng -->
            <div class="news-date">
                <div class="day"><?php echo get_the_date('d'); ?></div>
                <div class="month">THÁNG <?php echo get_the_date('m'); ?></div>
            </div>

            <!-- Nội dung bài viết -->
            <div class="news-content">
                <div class="news-text">
                <h2 class="news-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="news-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 50, '[...]'); ?>
                </div>
            </div>
            </div>
        </div>

    </article>
<?php } ?>

