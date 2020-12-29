<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package faith based blog
 */
?>

</div><!-- #content -->

<?php

$getfooter_column = get_theme_mod( 'footer_column', 'four' );
$footerlayout = 'four';
if ('four' === $getfooter_column) {
	$footerlayout = 'four';
}elseif ('two' === $getfooter_column) {
	$footerlayout = 'two';
}
$footer_default_class = 'footer-area section-padding yellowbg';
$transparent_footer_bg = get_theme_mod( 'transparent_footer_bg', false );
if (true === $transparent_footer_bg) {
	$footer_default_class = 'footer-area section-padding';
}
?>

    <div class="<?php echo esc_attr($footer_default_class);?>">
        <div class="container">
            <div class="row justify-content-center">
            	<?php get_template_part( 'template-parts/footer/footer', $footerlayout ); ?>
           	</div>
        </div>
    </div>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 align-self-center">
					<div class="site-info text-center">
						<?php
						echo wp_kses_post( get_theme_mod('copyright_text') );
						esc_html_e('Powered by', 'faith-blog'); ?> <a href="<?php echo esc_url('https://adazing.com');?>"><?php esc_html_e( 'Adazing', 'faith-blog' );?></a>
					</div><!-- .site-info -->
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
	<div class="scrooltotop">
		<a href="#" class="fa fa-angle-up"></a>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
