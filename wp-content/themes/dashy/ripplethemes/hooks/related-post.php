<?php 
if ( ! function_exists( 'dashy_related_post_action' ) ) :
function dashy_related_post_action() {
	global $post;

	$categories        = get_the_category($post->ID);

	$related_post_title = dashy_get_option( 'you_may_like_title' );

	$post_id = get_the_ID();
	$cat_ids = array();
	
	if(!empty($categories) && is_wp_error($categories)):
		foreach ($categories as $category):
			array_push($cat_ids, $category->term_id);
		endforeach;
	endif;
	
	$current_post_type = get_post_type($post_id);
	$query_args = array( 
	

		'category__in'       => $cat_ids,
		'post_type'      => $current_post_type,
		'post__not_in'       => array($post->ID),
		'posts_per_page'     => 3, // Number of related posts that will be shown.
		'ignore_sticky_posts'=> 1,
		'orderby'            => 'rand'
	
	
	 );
	
	$related_cats_post = new WP_Query( $query_args );
	
	if($related_cats_post->have_posts()):?>
	<aside class="related-posts">
		<h2 class="section-heading"><?php echo esc_html($related_post_title); ?></h2>
		<div class="row">
		<?php
		 while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
			<div class="rpl-xl-4 rpl lg-6">
                    <article class="related-post hentry post">
					<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : ?>
	                        <figure class="entry-thumb">
	                        	<?php the_post_thumbnail( 'random-thumb', array( 'class' => 'img-responsive' ) );
	                        	?>
                        </figure>
                        <?php endif; ?>
						
					 <div class="post-wrapper">
					 <div class="main-entry-content">
                    
                        <header class="entry-header">
                            <h4><a href="<?php echo esc_url( get_permalink() ) ?>"><?php the_title(); ?></a></h4>
                        </header> 

						</div>
						</div>  
                        
                    </article>
                </div>
		<?php endwhile ?>
		</div>
		</aside>
	 <?php endif; wp_reset_postdata();
	}
endif;
add_action('dashy_related_post', 'dashy_related_post_action');



