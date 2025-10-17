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

    <!-- ✅ Bắt đầu bố cục 3 cột -->
    <div class="page-layout container">
        <div class="row">

            <!-- Cột trái -->
            <div class="col-3 archive-column">
                <?php get_sidebar('archive'); ?>
            </div>

            <!-- Cột giữa -->
            <div class="col-6 content-column">
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content', get_post_type() );
                    }
                } elseif ( is_search() ) {
                    ?>
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <label>
                            <input type="search" class="search-field" placeholder="Search topics or keywords" value="<?php echo get_search_query(); ?>" name="s" />
                        </label>
                        <input type="submit" class="search-submit" value="Search" />
                    </form>
                    <?php
                }
                ?>
            </div>

            <!-- Cột phải -->
            <div class="col-3 comment-column">
                <?php get_sidebar('comments'); ?>
            </div>


        </div>
    </div>
    <!-- ✅ Kết thúc bố cục 3 cột -->

    <?php get_template_part( 'template-parts/pagination' ); ?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>
<?php get_footer(); ?>
