<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package faith based blog
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'faith-blog-standard-post' ); ?>>
	<div class="faith-blog-standard-post__entry-content text-left">
		<div class="faith-blog-standard-post__thumbnail post-header">
			<?php faith_blog_post_thumbnail();?> 
		</div>
		<div class="faith-blog-standard-post__blog-meta">
			<?php faith_blog_categories(); ?>
			<?php faith_blog_posted_by(true);?>
			<?php faith_blog_posted_on();?>
		</div>

		<div class="faith-blog-standard-post__post-title">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="faith-blog-standard-post__full-summery text-left">
			<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'faith-blog' ),
						'after'  => '</div>',
					)
				); 
			?>
		</div>
		<?php if (has_tag()): ?>
		<div class="d-flex justify-content-between faith based blog-standard-post__share-wrapper">
			<div class="faith-blog-standard-post__tags align-self-center">
				<?php faith_blog_post_tag(); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="post-author d-flex mb-5">
		<div class="author-image">
			<?php
			echo get_avatar( get_the_author_meta( 'ID' ), 200, '', '', null );
			?>
		</div>
		<div class="author-about">
			<h4><?php echo esc_html(get_the_author_meta( 'nickname' )); ?></h4>
			<p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
			<p class="author-social"><?php //minimalblogpro_author_social_link(); ?></p>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
