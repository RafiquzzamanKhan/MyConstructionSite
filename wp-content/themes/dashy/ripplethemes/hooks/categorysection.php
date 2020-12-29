<?php

if (! function_exists('dashy_category_action')) :
    function dashy_category_action()
    {
        $count=0;
        if (dashy_get_option('dashy-category1')!='0') {
            $count++;
        }
        if (dashy_get_option('dashy-category2')!='0') {
            $count++;
        }
        if (dashy_get_option('dashy-category3')!='0') {
            $count++;
        }

        if ($count==1) {
            $classcat="rpl-lg-12 rpl-sm-12";
        }
        if ($count==2) {
            $classcat="rpl-lg-6 rpl-sm-12";
        }
        if ($count==3) {
            $classcat="rpl-lg-4 rpl-sm-12";
        } ?>


<section class="category-post section">
    <div class="container">
        <div class="row">

            <?php
                if (dashy_get_option('dashy-category1')!='0'):?>
            <div class="<?php echo esc_html($classcat)?>">
                <div class="category-post-item">
                    <figure class="entry-thumb">
                <?php if (dashy_get_option('cat1_img')!='') {?> <img src="<?php echo esc_url(dashy_get_option('cat1_img')) ?>" alt=<?php esc_attr_e( "category post", 'dashy' ) ?>><?php } ?>
                        <span class="cat-links">
                            <a href="<?php echo esc_url(get_category_link(dashy_get_option('dashy-category1'))) ?>"
                                class="common-button is-border"><?php echo esc_html(get_cat_name(dashy_get_option('dashy-category1'))) ?></a>
                        </span>
                    </figure>
                </div>
            </div>

            <?php
                endif; ?>

            <?php
                if (dashy_get_option('dashy-category2')!='0'):?>
            <div class="<?php echo  esc_html($classcat)?>" >
                <div class="category-post-item">
                    <figure class="entry-thumb">
                    <?php if (dashy_get_option('cat2_img')!='') {?> <img src="<?php echo esc_url(dashy_get_option('cat2_img')) ?>" alt=<?php esc_attr_e( "category post", 'dashy' ) ?>><?php } ?>

                        <span class="cat-links">
                            <a href="<?php echo esc_url(get_category_link(dashy_get_option('dashy-category2'))) ?>"
                                class="common-button is-border"><?php echo esc_html(get_cat_name(dashy_get_option('dashy-category2'))) ?></a>
                        </span>
                    </figure>
                </div>
            </div>

            <?php
                endif; ?>

            <?php
                if (dashy_get_option('dashy-category3')!='0'):?>
            <div class="<?php echo  esc_html($classcat)?>">
                <div class="category-post-item">
                    <figure class="entry-thumb">
                    <?php if (dashy_get_option('cat3_img')!='') {?> <img src="<?php echo esc_url(dashy_get_option('cat3_img')) ?>" alt=<?php esc_attr_e( "category post", 'dashy' ) ?>><?php } ?>

                        <span class="cat-links">
                            <a href="<?php echo esc_url(get_category_link(dashy_get_option('dashy-category3'))) ?>"
                                class="common-button is-border"><?php echo esc_html(get_cat_name(dashy_get_option('dashy-category3'))) ?></a>
                        </span>
                    </figure>
                </div>
            </div>

            <?php
                endif; ?>

        </div>
    </div>
</section>

<?php
    }
    endif;
    add_action('dashy_category_action', 'dashy_category_action');

    ?>