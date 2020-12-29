<?php
    /* Theme Options Panel */
    $wp_customize->add_panel('dashy_options_panal', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'title' => __('Dashy Theme Options', 'dashy'),
    ));

    
    

require get_template_directory().'/ripplethemes/customizer-settings/sanitize-functions.php';

// social links
require get_template_directory().'/ripplethemes/customizer-settings/social.php';

// post settings
require get_template_directory().'/ripplethemes/customizer-settings/postsetting.php';

// Breadcrumbs setting
require get_template_directory().'/ripplethemes/customizer-settings/breadcrumbs.php';


// Footer
require get_template_directory().'/ripplethemes/customizer-settings/footersettings.php';

// related Posts
require get_template_directory().'/ripplethemes/customizer-settings/single-page-settings.php';

// pro button
require get_stylesheet_directory() .'/ripplethemes/customizer-settings/pro-button.php';

// category
require get_template_directory().'/ripplethemes/customizer-settings/categorysec-opt.php';

// canvas slider
require get_template_directory().'/ripplethemes/customizer-settings/canvas-slider.php';
