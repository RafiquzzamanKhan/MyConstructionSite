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
 * @package dashy
 */

get_header();
$GLOBALS['firstPosts']=array();
?>
<div id="content" class="site-content">
    <?php
    if(!dashy_get_option('dashy_hide_category_section')){
        do_action('dashy_category_action');

    }
   
    do_action('dashy_otherspost_action');
    
    ?>

    <div class="rpl-lg-4 secondary" id="sidebar-secondary">

        <?php get_sidebar() ?>

    </div>
</div>

</div>
</div>

<?php get_footer();?>