<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header" class="header-footer-group color-header">

    <div class="header-inner section-inner">

        <!-- ✅ Logo + Home + Search -->
        <div class="header-titles-wrapper">
            <div class="header-titles">
                <?php
                // Logo + tên website
                twentytwenty_site_logo();
                twentytwenty_site_description();
                ?>

                <!-- Ô Search -->
                <form role="search" method="get" class="header-search-form custom-header-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="search" class="search-field custom-search-field"
                           placeholder="Search …"
                           value="<?php echo get_search_query(); ?>"
                           name="s" />
                    <button type="submit" class="search-submit custom-search-submit">Submit</button>
                </form>
            </div>
        </div><!-- .header-titles-wrapper -->

        <!-- ✅ Menu -->
        <div class="header-navigation-wrapper">
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Horizontal', 'menu', 'twentytwenty' ); ?>">
                    <ul class="primary-menu reset-list-style">
                        <?php
                        wp_nav_menu(
                            array(
                                'container'  => '',
                                'items_wrap' => '%3$s',
                                'theme_location' => 'primary',
                            )
                        );
                        ?>
                    </ul>
                </nav>
            <?php endif; ?>

            <!-- ✅ Account + Toggle Icons -->
            <div class="header-toggles hide-no-js">

                <!-- Menu Toggle -->
                <div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">
                    <button class="toggle nav-toggle desktop-nav-toggle"
                            data-toggle-target=".menu-modal"
                            data-toggle-body-class="showing-menu-modal"
                            aria-expanded="false"
                            data-set-focus=".close-nav-toggle">
                        <span class="toggle-inner">
                            <span class="toggle-text"><?php _e( 'Menu', 'twentytwenty' ); ?></span>
                            <span class="toggle-icon"><?php twentytwenty_the_theme_svg( 'ellipsis' ); ?></span>
                        </span>
                    </button>
                </div>
                <div class="toggle-wrapper search-toggle-wrapper">
                    <button class="toggle search-toggle desktop-search-toggle"
                            data-toggle-target=".search-modal"
                            data-toggle-body-class="showing-search-modal"
                            data-set-focus=".search-modal .search-field"
                            aria-expanded="false">
                        <span class="toggle-inner">
                            <?php twentytwenty_the_theme_svg( 'search' ); ?>
                            <span class="toggle-text"><?php _ex( 'Search', 'toggle text', 'twentytwenty' ); ?></span>
                        </span>
                    </button>
                </div>

                <!-- Account Icon với Dropdown -->
                <div class="account-icon dropdown">
                    <a href="#" class="dropdown-toggle">
                    <span class="account-svg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="account-icon-svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                            <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5
                                     2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10
                                     5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                        </svg>
                    </span>
                        <span class="account-label">Account</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php if ( is_user_logged_in() ) : ?>
                                        <li><a href="<?php echo esc_url( get_edit_user_link() ); ?>">Account</a></li>
                                        <li><a href="<?php echo esc_url( wp_logout_url() ); ?>">Logout</a></li>
                                    <?php else : ?>
                                        <li><a href="<?php echo esc_url( wp_login_url() ); ?>">Login</a></li>
                                    <?php endif; ?>
                                </ul>

                </div>


            </div><!-- .header-toggles -->
        </div><!-- .header-navigation-wrapper -->

    </div><!-- .header-inner -->

    <?php
    if ( true === get_theme_mod( 'enable_header_search', true ) ) {
        get_template_part( 'template-parts/modal-search' );
    }
    ?>
</header>

<?php
get_template_part( 'template-parts/modal-menu' );
