<?php 

if( !function_exists('travelers_blog_get_first_category') ){
	function travelers_blog_get_first_category() {
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
      		$travelers_blog_cat_id = $categories[0]->term_id ;
    		$travelers_blog_cat_name =  $categories[0]->cat_name ;

      		$travelers_blog_color = get_term_meta($travelers_blog_cat_id,'category_color',true);
      		$travelers_blog_default = !empty($travelers_blog_color) ? $travelers_blog_color : '#2fbeef';  ?>
      	<span>
        	<a href="<?php travelers_blog_get_category_link($travelers_blog_cat_name); ?>" class="tag content-styl content-tag tag-black" style="background:<?php echo esc_attr($travelers_blog_default); ?>">
          		<?php echo esc_html($travelers_blog_cat_name); ?>
        	</a>
      	</span>
		<?php }
	}
}


if( !function_exists('travelers_blog_get_all_categories') ){
	function travelers_blog_get_all_categories() {
            
  		foreach((get_the_category()) as $travelers_blog_category) :
    		$travelers_blog_cat_id = $travelers_blog_category->term_id; 
    		$travelers_blog_cat_name = $travelers_blog_category->cat_name; 
    		$travelers_blog_color = get_term_meta($travelers_blog_cat_id,'category_color',true); 
    		$travelers_blog_default = !empty($travelers_blog_color) ? $travelers_blog_color : '#3d9ddf';  ?>

    		<a href="<?php echo esc_url(travelers_blog_get_category_link($travelers_blog_cat_name)); ?>" class="tag post-tag tag-black" style="background:<?php echo esc_attr($travelers_blog_color); ?>">
      			<?php echo esc_html(get_cat_name($travelers_blog_cat_id)); ?>
    		</a> <?php
  
  		endforeach;
	}
}