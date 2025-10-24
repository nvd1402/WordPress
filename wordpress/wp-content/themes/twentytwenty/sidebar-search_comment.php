<aside class="sidebar-search-comment">
    <h2 class="sidebar-title">Bình luận mới nhất</h2>

    <?php
    // Lấy 5 bình luận gần nhất
    $recent_comments = get_comments(array(
        'number'      => 5,
        'status'      => 'approve',
        'post_status' => 'publish',
    ));

    if ( $recent_comments ) :
        foreach ( $recent_comments as $comment ) :
            $author  = get_comment_author( $comment );
            $content = wp_trim_words( $comment->comment_content, 30, '...' );
            $link    = get_comment_link( $comment );
            ?>

            <div class="comment-item">
                <div class="comment-avatar">
                    <?php echo get_avatar( $comment, 48 ); ?>
                </div>

                <div class="comment-body">
                    <h4 class="comment-author"><?php echo esc_html( $author ); ?></h4>
                    <p class="comment-text"><?php echo esc_html( $content ); ?></p>
                    <a href="<?php echo esc_url( $link ); ?>" class="comment-link">Xem chi tiết</a>
                </div>
            </div>

        <?php endforeach;
    else : ?>
        <p>Chưa có bình luận nào.</p>
    <?php endif; ?>
</aside>
