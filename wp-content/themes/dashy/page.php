<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dashy
 */

get_header();
?>

<?php if(!is_front_page()):?>
        <div class="custom-breadcrumb">
            
                <div class="container">

                <div class="breadcrumb-title is-start">
                    <?php
                        the_title( '<h1 class="entry-title">', '</h1>' );

                            ?>
                </div>
                    

                    <?php 
                    if(dashy_get_option('dashy_show_breadcrumbs')){
                        do_action( 'dashy_breadcrumb_options' ) ;
                    }
                
                ?>
                </div>


        </div>

    <?php endif; ?>

<div id="content" class="site-content default-page">
<div class="container">
<div class="row">
<div id="primary" class="content-area rpl-lg-8 primary <?php echo esc_html(dashy_get_option('dashy_archive_sidebar')) ?>">
<main id="main" class="site-main">



        <?php
    while ( have_posts() ) :
        the_post();

        get_template_part( 'ripplethemes/contents/content-page' );
    

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile;
    
    ?>
    </div>
    

    
    <div class="rpl-lg-4 secondary <?php echo esc_html(dashy_get_option('dashy_archive_sidebar')) ?>" id="sidebar-secondary">

    <?php get_sidebar() ?>

</div>
</div>

</div>
</div>

<?php

get_footer();