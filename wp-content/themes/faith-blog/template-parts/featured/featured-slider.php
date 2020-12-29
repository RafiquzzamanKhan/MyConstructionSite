<?php 
/**
 * The template for displaying featured slider. 
 *  @package faith based blog
 */
$get_featured_categories = get_theme_mod('featured_categories');
$categories = '';
if (is_array($get_featured_categories)) {
	$categories = implode(',', $get_featured_categories);
}
$args = array(
	'posts_per_page' => 5,
	'post_type'	=>	array('post'),
	'category_name'	=>	$categories,
	'ignore_sticky_posts' => 1,
);
$featured_post = new WP_Query($args);
if ($featured_post->have_posts()):

?>
<section class="featured-slider-area">
	<div class="featured-slider__active owl-carousel">
		<?php while ($featured_post->have_posts()) :
			$featured_post->the_post();
			$has_post_thumbnail = ' no-post-thumbnail';
			if (has_post_thumbnail()) {
				$has_post_thumbnail = ' has-post-thumbnail';
			}
			?>
		<div class="featured-slider__single-item">

			<div class="featured-slider__thumbnail<?php echo esc_attr($has_post_thumbnail);?>">
				<?php the_post_thumbnail('faith-blog-thumbnail-featured'); ?>
			</div>
			<div class="featured-slider__content">
				<div class="container">
					<div class="featured-slider__category">
						<?php faith_blog_categories(); ?>
					</div>
					<div class="featured-slider__title">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</div>
					<div class="featured-slider__post-meta">
						<?php
						faith_blog_posted_by(true);
						faith_blog_posted_on();
						?>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; wp_reset_postdata(); ?>