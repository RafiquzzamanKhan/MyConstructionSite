<?php

if (! function_exists('dashy_Socialicons')) :
function dashy_Socialicons(){
?>


<?php

// facebook
if(dashy_get_option('facebook_social')!=''):
    ?>
<li>
    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url(dashy_get_option('facebook_social'))  ?>"
        class="social-icon">
        <i class="fab fa-facebook-f"></i>

    </a>
</li>
<?php
endif;

// twitter
if(dashy_get_option('twitter_social')!=''):
    ?>
<li>
    <a target="_blank" rel="noopener noreferrer" href="<?php echo  esc_url(dashy_get_option('twitter_social')) ?>"
        class="social-icon">
        <i class="fab fa-twitter"></i>

    </a>
</li>
<?php
endif;
?>

<?php

// instagram
if(dashy_get_option('instagram_social')!=''):
    ?>
<li>
    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( dashy_get_option('instagram_social')) ?>"
        class="social-icon">
        <i class="fab fa-instagram"></i>

    </a>
</li>
<?php
endif;
?>

<?php

// google
if(dashy_get_option('google_social')!=''):
    ?>
<li>
    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url( dashy_get_option('google_social')) ?>"
        class="social-icon">
        <i class="fab fa-google-plus-g"></i>

    </a>
</li>
<?php
endif;
?>

<?php
}
endif;

add_action('dashy_social_action', 'dashy_Socialicons');