<?php
if (!class_exists('Education_widgets_design1')) {
    class Education_widgets_design1 extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'category_id'   => 0,
                'title'         => esc_html__("Editor's Choice", 'dashy-blog')
         
            );
            return $defaults;
        }
        public function __construct()
        {
            parent::__construct(
                'Education_widgets_design1',
                esc_html__('Featured Widget', 'dashy-blog'),
                array('description' => esc_html__('Desc', 'dashy-blog') )
            );
        }

        public function widget($args, $instance)
        {
            $instance = wp_parse_args((array) $instance, $this->defaults());

            $category_id = absint($instance['category_id']);
            $title = esc_html($instance['title']); ?>
<section class="feature-section section">
    <div class="container">
        <div class="news-title is-between">
            <h3><?php echo esc_html($instance['title']) ?></h3>
        </div>
  
    <div class="row">

        <?php
                        $i=1;
            $two_category_section = array(
                                    'ignore_sticky_posts' => true,
                                    'post_type'           => 'post',
                                    'cat'                 => $category_id,
                                    'posts_per_page'      => 3,
                                    'order'               => 'DESC'
                                );
            $Newsdesignonequery = new WP_Query($two_category_section);

                

            $ID =array();
            while ($Newsdesignonequery->have_posts()):
                                $Newsdesignonequery->the_post();
                                
            $ID[] = get_the_ID();

            if (has_post_thumbnail()) {
                                    
                                    // $image_id = get_post_thumbnail_id();
                // $image_url = wp_get_attachment_image_src($image_id, 'full', true);
                                   
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
            } ?>
      <div class="rpl-lg-4 rpl-sm-12">
            <article class="feature-post">
                <figure class="entry-thumb aligncenter">
                <a href="<?php echo esc_url(get_permalink()) ?>">
                    <?php if (isset($image_url)): ?>
                        <img src="<?php echo esc_url($image_url) ?>" alt="post">
                        <?php
                        endif; ?>
                    </a>
                </figure>
          
                    <div class="entry-content">
                        <span class="cat-links is-start">
                            <a
                                href="<?php echo esc_url(get_category_link($category_id)) ?>"><?php echo esc_html(get_cat_name($category_id)) ?></a>
                        </span>
                        <div class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title() ?></a>
                            </h2>
                        </div>
                        <div class="entry-meta">
                            <!-- Date -->

                            <?php if (dashy_get_option('dashy_post_show_author')&& 'post' === get_post_type()) {
                            ?>
                            <span class="author vcard">
                                <div class="author-avatar">
                                    <?php
                              echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                </div>
                            </span>

                            <?php
                        } ?>



                            <div class="entry-meta-content">




                                <?php if (dashy_get_option('dashy_post_show_author')&& 'post' === get_post_type()) {
                            dashy_posted_by();
                        } ?>

                                <div class="date-read">




                                    <?php if (dashy_get_option('dashy_post_show_date')&& 'post' === get_post_type()):
                      
                      dashy_posted_on() ;

            endif; ?>

                                    <!-- Author -->




                                    <span class="comments-link">
                                    <?php
                                        $content = get_post_field('post_content', get_the_ID());
            $word_count = str_word_count(strip_tags($content));
            $readingtime = ceil($word_count / 200);
            if ($readingtime == 1) {
                $timer = " min";
            } else {
                $timer = " mins";
            }
            $totalreadingtime = $readingtime . $timer;
            echo $totalreadingtime; ?>
                                    </span>
                                </div>


                            </div>
                        </div>
                        
                    </div>
             
            </article>
        </div>

        <?php
            $i++;
            if ($i==4) {
                break;
            }
            endwhile; ?>

    </div>
    <div class="row no-image">
        <?php
      while ($Newsdesignonequery->have_posts()):
        $Newsdesignonequery->the_post(); ?>
        <div class="rpl-lg-6">
            <article class="hentry post list-post">
               
             
            <div class="post-wrapper">
                    <div class="main-entry-content">
                     
                        <div class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title() ?></a>
                            </h2>
                        </div>
                        <div class="entry-meta is-start">
                            <!-- Date -->

                            <?php if (dashy_get_option('dashy_post_show_author')&& 'post' === get_post_type()) {
            ?>
                            <span class="author vcard">
                                <div class="author-avatar">
                                    <?php
                              echo get_avatar(get_the_author_meta('ID'), 32); ?>
                                </div>
                            </span>

                            <?php
        } ?>



                            <div class="entry-meta-content">




                                <?php if (dashy_get_option('dashy_post_show_author')&& 'post' === get_post_type()) {
            dashy_posted_by();
        } ?>

                                <div class="date-read">




                                    <?php if (dashy_get_option('dashy_post_show_date')&& 'post' === get_post_type()):
                      
                      dashy_posted_on() ;

            endif; ?>

                                    <!-- Author -->




                                    <span class="comments-link">
                                    <?php
                                        $content = get_post_field('post_content', get_the_ID());
            $word_count = str_word_count(strip_tags($content));
            $readingtime = ceil($word_count / 200);
            if ($readingtime == 1) {
                $timer = " min";
            } else {
                $timer = " mins";
            }
            $totalreadingtime = $readingtime . $timer;
            echo $totalreadingtime; ?>
                                    </span>
                                </div>


                            </div>
                        </div>
                        <div class="entry-content">
                            <p><?php the_excerpt() ?></p>
                        </div>
                        <div class="entry-footer is-between">
                            <div class="readMore">
                                <a class="common-button is-border" href="<?php the_permalink() ?>">Read more</a>
                            </div>
                            <?php do_action('dashy_social_sharing', get_the_ID()); ?>

                        </div>
                    </div>
                </div>
            
            </article>
        </div>

        <?php
        
        $i++;
            if ($i==6) {
                break;
            }
            endwhile; ?>




    </div>

</section>



<?php
        }
        public function update($new_instance, $old_instance)
        {
            $instance  = $old_instance;
            $instance['category_id']    = (isset($new_instance['category_id'])) ? absint($new_instance['category_id']) : '';
            $instance['title']    = (isset($new_instance['title'])) ? esc_html($new_instance['title']) : '';
         
            return $instance;
        }

        public function form($instance)
        {
            $instance      = wp_parse_args((array )$instance, $this->defaults());
            // $instance['title']    = (isset( $new_instance['title'] ) ) ? esc_html($new_instance['title']) : 'title';
            $category_id = absint($instance['category_id']);
            $title=$instance['title']


           
    
            ?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('category_id')); ?>">
        <strong><?php esc_html_e('Select Category ', 'dashy-blog'); ?></strong>
    </label><br />
    <?php
                $news_one_category_col_1_dropown_cat = array(
                    'show_option_none' => esc_html__('Uncategorized', 'dashy-blog'),
                    'orderby'          => 'name',
                    'order'            => 'asc',
                    'show_count'       => 1,
                    'hide_empty'       => 1,
                    'echo'             => 1,
                    'selected'         => $category_id,
                    'hierarchical'     => 1,
                    'name'             => esc_attr($this->get_field_name('category_id')),
                    'id'               => esc_attr($this->get_field_name('category_id')),
                    'class'            => 'widefat',
                    'taxonomy'         => 'category',
                    'hide_if_empty'    => false,
                );
            wp_dropdown_categories($news_one_category_col_1_dropown_cat); ?>
</p>


<p>
    <label
        for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Title text:', 'dashy-blog'); ?></strong></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
        name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<?php
        }
    }
}
add_action('widgets_init', 'Education_widgets_design1');
function Education_widgets_design1()
{
    register_widget('Education_widgets_design1');
}
