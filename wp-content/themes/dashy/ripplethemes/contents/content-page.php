<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php if ( has_post_thumbnail() ) : ?>
        <figure class="entry-thumb">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        </figure>
    <?php endif; ?>


    

	<div class="entry-content">
        <?php
                the_content();
    
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'dashy' ),
                    'after'  => '</div>',
                ) );
            ?>
    </div>
    <!-- .entry-content -->

	
</article>