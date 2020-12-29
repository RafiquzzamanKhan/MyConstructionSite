<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package faith based blog
 */

get_header();
$show_featured_section = get_theme_mod( 'featured_section_on_off', false );
if (true === $show_featured_section) :
    get_template_part('template-parts/featured/featured', 'slider');
endif;
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php
    do_action( 'faith_blog_before_default_page');
        if ( have_posts() ) :
            echo '<div class="row">';
            /* Start the Loop */
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content/content', get_post_type());
            endwhile;
            
            echo '</div>';
                faith_blog_navigation();
        else :
            get_template_part('template-parts/content/content', 'none');
        endif;
    do_action('faith_blog_after_default_page');?>
    </main><!-- #main -->
</div>
<?php
get_footer();
