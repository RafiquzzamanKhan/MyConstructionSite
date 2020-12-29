<?php

if (!function_exists('dashy_social_sharing')) :
    function dashy_social_sharing($post_id)
    {
        $dashy_url = get_the_permalink($post_id);
        $dashy_title = get_the_title($post_id);
        $dashy_image = get_the_post_thumbnail_url($post_id);
        
        //sharing url
        $dashy_twitter_sharing_url = esc_url('http://twitter.com/share?text=' . $dashy_title . '&url=' . $dashy_url);
        $dashy_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u=' . $dashy_url);
        $dashy_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url=' . $dashy_url . '&media=' . $dashy_image . '&description=' . $dashy_title);
        $dashy_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $dashy_title . '&url=' . $dashy_url);
        
        ?>

<ul class="post-share">
    <li><a target="_blank" href="<?php echo esc_url($dashy_facebook_sharing_url); ?>"><i class="fab fa-facebook-f"></i></a></li>
    <li><a target="_blank" href="<?php echo esc_url($dashy_twitter_sharing_url); ?>"><i class="fab fa-twitter"></i></a></li>
    <li><a target="_blank" href="<?php echo esc_url($dashy_pinterest_sharing_url); ?>"><i class="fab fa-pinterest"></i></a></li>
    <li> <a target="_blank" href="<?php echo esc_url($dashy_linkedin_sharing_url); ?>"><i class="fab fa-linkedin"></i></a></li>
</ul>
<?php
    }
endif;
add_action('dashy_social_sharing', 'dashy_social_sharing', 10);