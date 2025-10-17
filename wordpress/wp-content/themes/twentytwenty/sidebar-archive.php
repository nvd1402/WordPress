<aside class="custom-archive-box">
    <div class="custom-archive-widget">
        <h3 class="custom-title">Bài viết mới nhất</h3>

        <table class="custom-latest-posts">
            <tbody>
            <?php
            $recent_posts = get_posts(array(
                'numberposts' => 8,
                'post_status' => 'publish'
            ));

            $i = 1;
            for ($row = 0; $row < count($recent_posts); $row += 2) :
                echo '<tr>';

                // Cột 1
                $post1 = $recent_posts[$row];
                setup_postdata($post1);
                echo '<td><span class="custom-post-number">' . $i . '</span> <a href="' . get_permalink($post1) . '">' . get_the_title($post1) . '</a></td>';
                $i++;

                // Cột 2 (nếu có)
                if (isset($recent_posts[$row + 1])) {
                    $post2 = $recent_posts[$row + 1];
                    setup_postdata($post2);
                    echo '<td><span class="custom-post-number">' . $i . '</span> <a href="' . get_permalink($post2) . '">' . get_the_title($post2) . '</a></td>';
                    $i++;
                } else {
                    echo '<td></td>';
                }

                echo '</tr>';
            endfor;

            wp_reset_postdata();
            ?>
            </tbody>
        </table>
    </div>
</aside>
