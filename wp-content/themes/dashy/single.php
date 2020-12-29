<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package dashy
 */
get_header();

?>
<div class="custom-breadcrumb">
    <div class="container">
   
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

        <?php
		while ( have_posts() ) :
            the_post();
            ?>


        <?php get_template_part('ripplethemes/contents/single-content'); ?>
        <?php
        
        if(dashy_get_option('dashy_post_next_post_link')){
            the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'dashy' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'dashy' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

        }

        
        if(dashy_get_option('dashy_show_related')) :
            do_action( 'dashy_related_post' );
         endif; 
      
			

            ?>


        </main>
        <?php
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; 
        ?>
    </div>
    <div class="rpl-lg-4 secondary" id="sidebar-secondary">
        <?php
           get_sidebar() ?>
    </div>


</div>







</div>
    </div>

<?php

    get_footer();
    ?>