<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package faith based blog
 */
$get_blog_layout = get_theme_mod('blog_layout', 'grid');
$grid_column = get_theme_mod( 'grid_column', 'col-sm-4' );
if ($grid_column === 'col-sm-6') {
    $grid_column = 'col-lg-6 col-md-12';
}elseif ($grid_column === 'col-sm-4') {
    $grid_column = 'col-sm-12 col-md-6 col-lg-4';
}elseif ($grid_column === 'col-sm-3') {
    $grid_column = 'col-sm-12 col-md-6 col-lg-3';
}
$post_classes = 'faith-blog-standard-post';
if (!has_post_thumbnail()) {
	$post_classes = 'faith-blog-standard-post no-post-thumbnail ';
}
?>
<div class="<?php echo esc_attr($grid_column);?> blog-grid-layout">
	<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
		<div class="faith-blog-standard-post__entry-content text-left">
			<?php if (has_post_thumbnail()): ?>
				<div class="faith-blog-standard-post__thumbnail post-header">
					<?php faith_blog_post_thumbnail();?> 
					<div class="post_categories_on_thumbnail">
						<?php faith_blog_categories();?>
					</div>
				</div>
			<?php else: ?>
			<div class="faith-blog-standard-post__blog-meta mt-0">
				<?php faith_blog_categories();?>
			</div>
			<?php endif;?>
			<div class="faith-blog-standard-post__post-title">
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
			</div>
			<div class="faith-blog-standard-post__blog-meta">
				<?php
				faith_blog_posted_by(true);
				faith_blog_posted_on();
				?>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>