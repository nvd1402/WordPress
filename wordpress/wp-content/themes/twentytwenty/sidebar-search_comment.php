<aside class="sidebar-search-comment">
    <h2 class="sidebar-title">Bình luận mới nhất</h2>

    <?php
    // Lấy 5 comment cha
    $parent_comments = get_comments(array(
        'number'      => 5,
        'status'      => 'approve',
        'post_status' => 'publish',
        'parent'      => 0,
    ));

    if ($parent_comments) :
        foreach ($parent_comments as $comment) :
            $author  = get_comment_author($comment);
            $content = wp_trim_words($comment->comment_content, 40, '...');
            $avatar  = get_avatar_url($comment, array('size' => 50));
            ?>

            <div class="media comment-box">
                <div class="media-left">
                    <a href="#">
                        <img class="img-responsive user-photo" src="<?php echo esc_url($avatar); ?>" alt="<?php echo esc_attr($author); ?>">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo esc_html($author); ?></h4>
                    <p><?php echo esc_html($content); ?></p>

                    <?php
                    // Lấy comment con
                    $child_comments = get_comments(array(
                        'status' => 'approve',
                        'parent' => $comment->comment_ID,
                    ));
                    if ($child_comments) :
                        foreach ($child_comments as $child) :
                            $child_author  = get_comment_author($child);
                            $child_content = wp_trim_words($child->comment_content, 40, '...');
                            $child_avatar  = get_avatar_url($child, array('size' => 50));
                            ?>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="img-responsive user-photo" src="<?php echo esc_url($child_avatar); ?>" alt="<?php echo esc_attr($child_author); ?>">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo esc_html($child_author); ?></h4>
                                    <p><?php echo esc_html($child_content); ?></p>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>

        <?php
        endforeach;
    else :
        echo '<p>Chưa có bình luận nào.</p>';
    endif;
    ?>
</aside>
