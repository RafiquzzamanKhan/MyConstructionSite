<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dashy
 */


get_header() ?>

<div class="custom-breadcrumb">
    <div class="container">
        <div class="breadcrumb-title is-start">
            <?php
                the_archive_title('<h1 class="title">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>

        </div>
        <?php 
            if(dashy_get_option('dashy_show_breadcrumbs')){
                do_action( 'dashy_breadcrumb_options' ) ;


            }
         
         ?>



    </div>

</div>
<div id="content" class="site-content">

    <div class="container">
        <div class="row">
            <div id="primary" class="content-area rpl-lg-8 primary">
                <main id="main" class="site-main">

                    <div class="grid-view">
                        <div class="row">
                            <?php
                        if (have_posts()):
                            while (have_posts()):
                                the_post();
                        ?>


                            <?php get_template_part('ripplethemes/contents/otherspost'); ?>


                            <?php
                        endwhile;
                        else :

                            get_template_part( 'template-parts/post/content', 'none' );
                        endif;
                        ?>


                        </div>
                        <nav class="navigation pagination">
                            <div class="nav-links is-center">
                                <?php
                           
                                the_posts_pagination();
                                ?>

                            </div>
                            <!-- .nav-links -->
                        </nav>
                    </div>

                </main>
            </div>

            <div class="rpl-lg-4 secondary" id="sidebar-secondary">

                <?php get_sidebar() ?>

            </div>


        </div>

    </div>
</div>

<?php get_footer() ?>