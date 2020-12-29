<?php
/**
 *   The template for displaying archive pages
 *
 *   @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *   @package faith based blog
 */
get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        do_action( 'faith_blog_before_default_page');
            if ( have_posts() ) :
            ?>
            <header class="archive-page-header">
                <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="archive-description">', '</div>' );
                ?>
            </header><!-- .page-header -->
            <?php
            echo '<div class="row">';
                /* Start the Loop */
                while (have_posts()) :
                    the_post();
                   get_template_part('template-parts/content/content', get_post_type());
                endwhile;
            echo '</div>';
               faith_blog_navigation();
    		else :
    			get_template_part( 'template-parts/content/content', 'none' );
    		endif;
        do_action( 'faith_blog_after_default_page');
		?>
					
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
