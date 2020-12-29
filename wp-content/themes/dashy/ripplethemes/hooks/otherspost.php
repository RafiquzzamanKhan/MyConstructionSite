<?php

if (! function_exists('dashy_otherspost_action')) :
    function dashy_otherspost_action()
    {
        wp_reset_query();
        $exclude=$GLOBALS['firstPosts'];
        $check=[];
        $args2 = array('post__not_in' => $exclude , 'order' => 'rand','paged' => get_query_var( 'paged' ), );
        $q2 = new WP_query($args2);
     
       

        ?>

<div class="container">
    <div class="row">
        <div id="primary" class="content-area primary rpl-lg-8">
            <main id="main" class="site-main">
                <section class="grid-view">
                    <div class="row">
                        <?php

                    $count=1;
                
                    if ($q2->have_posts()):
                        while ($q2->have_posts()):
                            $q2->the_post();

                    ?>


                        <?php get_template_part('ripplethemes/contents/otherspost'); ?>

                        <?php               
                    
                        endwhile;
                        endif; ?>

                    </div>
                    </section>
                    <nav class="navigation pagination">
                        <div class="nav-links is-center">

                            <?php
                                        
                                    the_posts_pagination( ); ?>
                        </div>
                    </nav>


                </main>
            </div>

        <?php
                    }
endif;


add_action('dashy_otherspost_action', 'dashy_otherspost_action');