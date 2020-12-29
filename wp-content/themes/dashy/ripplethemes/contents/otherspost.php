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
                            <?php $cmt_link = get_comments_link(); 
                                                $num_comments = get_comments_number();
                                                if ( $num_comments == 0 ) {
                                                    $dashy_comment = __( 'No Comments', 'dashy' );
                                                } elseif ( $num_comments > 1 ) {
                                                    $dashy_comment = $num_comments . __( ' Comments', 'dashy' );
                                                } else {
                                                    $dashy_comment = __('1 Comment', 'dashy' );
                                                }
                                            ?>
                        <a href="<?php echo esc_url( $cmt_link ); ?>"><?php echo esc_html( $dashy_comment );?></a>
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