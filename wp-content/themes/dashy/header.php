<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dashy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'dashy'); ?></a>
        <?php $header_image = esc_url(get_header_image());
        $header_class = ($header_image == "") ? '' : 'header-image';
        ?>


        <!-- header start -->
        <header class="site-header  <?php echo esc_attr($header_class); ?>"
            style="background-image:url(<?php echo esc_url($header_image) ?>); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="top-header">
                <div class="container">
                    <div class="top-header-in">
                        <ul class="social-list">
                            <?php
                        do_action('dashy_social_action')
                        ?>

                        </ul>

                        <div class="site-branding">
                            <?php
                                    the_custom_logo();
                                    if (is_front_page() && is_home()) :
                                        ?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                    rel="home"><?php bloginfo('name'); ?></a></h1>
                            <?php
                                    else :
                                        ?>
                            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                    rel="home"><?php bloginfo('name'); ?></a></p>
                            <?php
                                    endif;
                                    $dashy_description = get_bloginfo('description', 'display');
                                    if ($dashy_description || is_customize_preview()) :
                                ?>
                            <p class="site-description">
                                <?php echo esc_html($dashy_description); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped?>
                            </p>
                            <?php endif; ?>
                        </div><!-- .site-branding -->
                        <div class="top-header-right">

                            <div class="search-toggle">


                                <a href="#">
                                    <i class="fas fa-search"></i>
                                </a>

                                <?php get_search_form() ?>


                            </div>
                            <div class="canvas-button">
                                <a href="#" class="canvas-open">
                                    <span></span>
                                </a>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="canvas-menu">
                    <div class="canvas-overlay"></div>
                    <div class="canvas-sidebar">
                    <a href="#" class="close-sidebar">
                            <i class="fas fa fa-times"></i>
                        </a>
                        <div class=" widget about-widget">
                            <div class="sidebar-title is-center">
                                <h3 class="widget-title"><?php
                                echo esc_html(dashy_get_option('dashy_canvas_aboutme_title'))
                                ?></h3>
                            </div>

                            <?php
                                if (esc_url(get_theme_mod('profile_image'))!=''):
                                ?>
                            <figure>
                                <img src="<?php echo esc_url(get_theme_mod('profile_image')); ?>"
                                    alt=<?php esc_attr_e( "Profile", 'dashy' ) ?>>
                            </figure>
                            <?php endif;?>

                            <div class="about-body text-center">
                                <h5 class="author-name">
                                    <?php
                            echo  esc_html(dashy_get_option('dashy_canvas_Author_Name'))
                            
                            ?>
                                </h5>
                                <p class="author-description">
                                    <?php
                            echo esc_html(dashy_get_option('dashy_canvas_Author_Desc'))
                            
                            ?>
                                </p>
                                <div class="social-icons">
                                    <ul>
                                        <?php if(dashy_get_option('dashy_canvas_Author_facebook')!=''):?>
                                        <li><a
                                                href="<?php echo  esc_url(dashy_get_option('dashy_canvas_Author_facebook')) ?>"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <?php endif; ?>
                                        <?php if(dashy_get_option('dashy_canvas_Author_instagram')!=''):?>

                                        <li><a
                                                href="<?php echo  esc_url(dashy_get_option('dashy_canvas_Author_instagram')) ?>"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <?php endif; ?>

                                        <?php if(dashy_get_option('dashy_canvas_Author_twitter')!=''):?>

                                        <li><a
                                                href="<?php echo  esc_url(dashy_get_option('dashy_canvas_Author_twitter')) ?>"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <?php endif; ?>

                                        <?php if(dashy_get_option('dashy_canvas_Author_linkedin')!=''):?>

                                        <li><a
                                                href="<?php echo  esc_url(dashy_get_option('dashy_canvas_Author_linkedin')) ?>"><i
                                                    class="fab fa-linkedin"></i></a></li>
                                        <?php endif; ?>

                                        <?php if(dashy_get_option('dashy_canvas_Author_youtube')!=''):?>

                                        <li><a
                                                href="<?php echo  esc_url(dashy_get_option('dashy_canvas_Author_youtube')) ?>"><i
                                                    class="fab fa-youtube"></i></a></li>
                                        <?php endif; ?>

                                    </ul>
                                </div>
                            </div>



                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="bottom-header">
                <div class="container">
                    <div class="bottom-header-in">
                        <a href="#" class="toggle-button open-button">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <div class="main-navigation-wrap">
                            <nav class="main-navigation">
                                <div class="mobile-menu-toggle"></div>
                                <?php
                                    wp_nav_menu(
                                array(
                                            'theme_location' => 'menu-1',
                                            'menu_id'        => 'primary-menu',
                                        )
                            );
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>


        </header>