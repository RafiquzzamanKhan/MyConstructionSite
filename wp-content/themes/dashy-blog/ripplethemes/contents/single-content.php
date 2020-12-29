<div class="main-post">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if (has_post_thumbnail()) : ?>
        <figure class="entry-thumb">
            <a href="<?php echo esc_url(get_permalink()) ?>">
                <?php the_post_thumbnail();?>

            </a>
        </figure>
        <?php endif ?>
        <div class="post-wrapper">
       
            <div class="main-entry-content">
                <span class="cat-links is-start">
                <?php 
                    foreach((get_the_category()) as $categoryy) { 
                    $catlink=esc_url(get_category_link($categoryy->term_id));
                    $catname=esc_html($categoryy->cat_name);
                    ?>
                    <a href="<?php echo $catlink ?>">
                        <?php echo $catname; ?>
                    </a>

                    <?php
                             } 
                    ?>
                </span>
                <div class="entry-header">
                    <?php
                                        if (is_singular()) :
                                            the_title('<h1 class="entry-title">', '</h1>');
                                        else :
                                            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                                        endif;
                                    ?>
                </div>

                <div class="entry-meta">
                    <!-- Date -->

                    <?php if (dashy_get_option('dashy_post_show_author')&& 'post' === get_post_type()){ 
                        ?>
                              <span class="author vcard">
                              <div class="author-avatar">
                                  <?php
                              echo get_avatar( get_the_author_meta( 'ID' ), 32 );
                              ?>
                              </div>
                          </span>
                          
                          <?php
                        }
                        
                    ?>


              
                    <div class="entry-meta-content">




                        <?php if (dashy_get_option('dashy_post_show_author')&& 'post' === get_post_type()){ 
                        dashy_posted_by();
                        }
                        
                    ?>

                        <div class="date-read">




                            <?php if (dashy_get_option('dashy_post_show_date')&& 'post' === get_post_type()):
                      
                      dashy_posted_on() ;

                            endif;
                          ?>

                            <!-- Author -->


                      

                        
                                
                            <span class="comments-link">
                            <?php
                                $content = get_post_field( 'post_content', $post->ID );
                                $word_count = str_word_count( strip_tags( $content ) );
                                $readingtime = ceil($word_count / 200);
                                if ($readingtime == 1) {
                                $timer = " min";
                                } else {
                                $timer = " mins";
                                }
                                $totalreadingtime = $readingtime . $timer;
                                echo $totalreadingtime;
                                ?>

                            </span>
                        
                        </div>
                </div>

               
                
                

                </div>
                <div class="entry-content">
                    <?php the_content();
                     wp_link_pages( array(
                        'before' => '<div class="page-links">' . __( 'Pages:', 'dashy-blog' ),
                        'after'  => '</div>',
                    ) );
                            
                            
                            ?>
                </div>
                <div class="entry-footer is-start">
                <b><?php  esc_html_e('Share :', 'dashy-blog') ?></b>
                    <?php do_action('dashy_social_sharing', get_the_ID());?>

                </div>
            </div>
            
    </article>
</div>