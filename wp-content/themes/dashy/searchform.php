<?php
/**
 * Search Form 
 *
 * @package dashy
 */

?>

    
<div class="searchform" role="search">
        <form role="search" method="get" action=<?php echo esc_url(home_url( '/' )); ?>  >
        <label>
            <span class="screen-reader-text"> <?php  esc_html_e('Search for:', 'dashy') ?> </span>
            <input type="search" class="search-field" placeholder= "<?php  esc_attr_e('Search...','dashy')?>" value="<?php the_search_query(); ?>" name="s">
        </label>
        <input type="submit" class="search-submit" value="Search">
    </form>	
</div>
