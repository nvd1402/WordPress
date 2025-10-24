<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content">

    <?php
    $archive_title    = '';
    $archive_subtitle = '';

    if ( is_search() ) {
        global $wp_query;

        $archive_title = sprintf(
            '%1$s %2$s',
            '<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
            '&ldquo;' . get_search_query() . '&rdquo;'
        );

        if ( $wp_query->found_posts ) {
            $archive_subtitle = sprintf(
                _n(
                    'We found %s result for your search.',
                    'We found %s results for your search.',
                    $wp_query->found_posts,
                    'twentytwenty'
                ),
                number_format_i18n( $wp_query->found_posts )
            );
        } else {
            $archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
        }
    } elseif ( is_archive() && ! have_posts() ) {
        $archive_title = __( 'Nothing Found', 'twentytwenty' );
    } elseif ( ! is_home() ) {
        $archive_title    = get_the_archive_title();
        $archive_subtitle = get_the_archive_description();
    }

    if ( $archive_title || $archive_subtitle ) : ?>
        <header class="archive-header has-text-align-center header-footer-group">
            <div class="archive-header-inner section-inner medium">
                <?php if ( $archive_title ) : ?>
                    <h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
                <?php endif; ?>

                <?php if ( $archive_subtitle ) : ?>
                    <div class="archive-subtitle section-inner thin max-percentage intro-text">
                        <?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>
    <?php endif; ?>


    <?php if ( is_search() ) : ?>
        <?php if ( is_search() ) : ?>
            <!-- ✅ Trang Search: bố cục 3 cột (3-6-3) -->

            <!-- 🔍 Form search nằm riêng phía trên -->
            <div class="search-bar container mb-5">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <label>
                        <input type="search" class="search-field" placeholder="Search topics or keywords"
                               value="<?php echo get_search_query(); ?>" name="s" />
                    </label>
                    <input type="submit" class="search-submit" value="Search" />
                </form>
            </div>

            <!-- 📄 Bố cục 3 cột -->
            <div class="page-layout container">
                <div class="row">
                    <!-- Cột trái -->
                    <div class="col-3 archive-column">
                        <?php get_sidebar('search'); ?>
                    </div>

                    <!-- Cột giữa -->
                    <div class="col-6 search-results-column">
                        <?php
                        if ( have_posts() ) {
                            while ( have_posts() ) {
                                the_post(); ?>
                                <div class="news-item-wrapper mb-4">
                                    <article <?php post_class('news-item'); ?> id="post-<?php the_ID(); ?>">
                                        <div class="news-card">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="news-thumb">
                                                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="news-date">
                                                <div class="day"><?php echo get_the_date('d'); ?></div>
                                                <div class="month">THÁNG <?php echo get_the_date('m'); ?></div>
                                            </div>
                                            <div class="news-content">
                                                <div class="news-text">
                                                    <h2 class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                    <div class="news-excerpt">
                                                        <?php echo wp_trim_words(get_the_excerpt(), 20, ' [...]'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <?php
                            }
                        } else {

                        }
                        ?>
                    </div>

                    <!-- Cột phải -->
                    <div class="col-3 comment-column">
                        <?php get_sidebar('search_comment'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    <?php else : ?>
        <!-- ✅ Nếu KHÔNG phải trang search: bố cục 3 cột -->
        <div class="page-layout container">
            <div class="row">
                <div class="col-3 archive-column">
                    <?php get_sidebar('archive'); ?>
                </div>

                <div class="col-6 content-column">
                    <?php
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post();
                            get_template_part( 'template-parts/content', get_post_type() );
                        }
                    }
                    ?>
                </div>

                <div class="col-3 comment-column">
                    <?php get_sidebar('comments'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php get_template_part( 'template-parts/pagination' ); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>
<?php get_footer(); ?>
