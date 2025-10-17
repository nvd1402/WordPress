<aside class="custom-comments-box">
    <div class="custom-comments-widget">
        <h3 class="comment-title">Comments</h3>

        <ul class="latest-comments-list">
            <?php
            // Lấy 3 bình luận mới nhất
            $recent_comments = get_comments(array(
                'number'      => 3,
                'status'      => 'approve',
                'post_status' => 'publish',
            ));

            foreach ($recent_comments as $comment) :
                ?>
                <li>
                    <a href="<?php echo esc_url(get_comment_link($comment)); ?>">
                        <?php echo esc_html(wp_trim_words($comment->comment_content, 8, '...')); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</aside>
