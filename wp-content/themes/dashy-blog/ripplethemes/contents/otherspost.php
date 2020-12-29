<?php
$readmore=  dashy_get_option('dashy_readmore_text');

?>



<div class="rpl-xl-12">
    <article id="post-<?php the_ID(); ?>" <?php post_class('list-post'); ?>>

        <?php if ( has_post_thumbnail() ) : ?>
        <figure class="entry-thumb">
            <a href="<?php echo esc_url(get_permalink()) ?>">
                <?php the_post_thumbnail( );?>
            </a>
        </figure>
        <?php endif ?>

        <div class="post-wrapper">
            <div class="main-entry-content">
                <span class="cat-links is-start">



                    <?php
                            $category = get_the_category();
                        if  (isset($category[0])) {
                            echo   '<a href="' . esc_url(get_category_link($category[0]->term_id)) . '">' . esc_html($category[0]->cat_name) . '</a>';
                        } ?>

                </span>
                <div class="entry-header">
                    <?php
                                if ( is_singular() ) :
                                    the_title( '<h1 class="entry-title">', '</h1>' );
                                else :
                                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                endif;
                             ?>
                </div>

                <div class="entry-meta is-start">
             
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
                        <p><?php  the_excerpt( );?> </p>
                    </div>                                                                      
                    <div class="entry-footer is-between">
                        <?php
                if(!empty($readmore)) {
                ?>
                        <div class="readMore"><a href="<?php the_permalink(); ?>"
                                class="common-button is-border"><?php echo esc_html($readmore); ?></a></div>
                        <?php  } ?>
                        <?php do_action( 'dashy_social_sharing' ,get_the_ID() );?>

                    </div>
                </div>
            </div>
    </article>
</div>