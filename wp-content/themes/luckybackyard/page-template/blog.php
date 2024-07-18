<?php

/* Template Name: Blog Template */
get_header();

$page_id = get_the_ID();
$section_2 = get_field('section_2', $page_id);
$section_3 = get_field('section_3', $page_id);
$section_4 = get_field('section_4', $page_id);
$section_5 = get_field('section_5', $page_id);
?>


<section class="blog-sec-01 main-post-imgbox main-post-imgbox-white " style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/BG.png);">
    <div class="container ">
    <div class="post-singal-slider">
        <?php
        $latest_posts = get_posts( array(
            'posts_per_page' => 5,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        ) );
        foreach ( $latest_posts as $post ) {
        setup_postdata( $post );
        $id = get_the_ID();
        $article_subtitle = get_field('article_subtitle', $id);
        ?>
    <div class="row">
            <div class="col-lg-5 col-md-12">
            <div class="img-box" style="width: 100%; display: inline-block;">
                <?php
                $categories = get_the_category();
                if ($categories) {
                        echo '<ul>';
                        foreach ($categories as $count => $category) {
                            if($count <= 2){
                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                            }
                        }
                        echo '</ul>';
                    }
                ?>
                  
                    <div class="text">
                        <?php
                        echo '<h5> <a href="'.get_the_permalink($id).'" tabindex="0">'.get_the_title($id).'</a> </h5>';
                        if($article_subtitle){
                            echo '<p>'.$article_subtitle.'</p>';
                        }
                        ?>
                        
                        <div class="icon">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo do_shortcode('[reading_time post-id="'.$id.'"]'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="img-box">
                <a href="<?php echo get_the_permalink($id); ?>" tabindex="0"> <img src="<?php echo get_the_post_thumbnail_url($id); ?>" alt=""></a>
                </div>
            </div>
        </div>
        <?php
        }

        wp_reset_postdata();
        ?>
       
    </div>
    </div>
</section>

<section  class="blog-sec-02 main-post-imgbox" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="text">
                    <h3>Latest</h3>
                </div>
                <div class="row">
                    <?php
                        $latest_posts = get_posts( array(
                            'posts_per_page' => 4,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC'
                        ) );
                        foreach ( $latest_posts as $post ) {
                        setup_postdata( $post );
                        $id = get_the_ID();
                        $article_subtitle = get_field('article_subtitle', $id);
                    ?>
                    <div class="col-lg-6 col-md-12">
                    <div class="img-box">
                        <a href="<?php echo get_the_permalink($id); ?>" tabindex="0"> <img src="<?php echo get_the_post_thumbnail_url($id); ?>" alt=""></a>
                    <?php
                $categories = get_the_category();
                if ($categories) {
                        echo '<ul>';
                        foreach ($categories as $count => $category) {
                            if($count <= 2){
                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                            }
                        }
                        echo '</ul>';
                    }
                ?>
                    <div class="text">
                        <?php
                        echo '<h5> <a href="'.get_the_permalink($id).'" tabindex="0">'.get_the_title($id).'</a> </h5>';
                        if($article_subtitle){
                            echo '<p>'.$article_subtitle.'</p>';
                        }
                        ?>
                        <div class="icon">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo do_shortcode('[reading_time post-id="'.$id.'"]'); ?></p>
                        </div>
                    </div>
                </div>
                    </div>
                    
                     <?php
                        }
                        wp_reset_postdata();
                        ?>
                    
                    <!--<div class="col-md-12">
                        <div class="read-all-btn-with-arrow">
                            <a href="#">Read All <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <?php
                $trending_args = array(
                    'posts_per_page' => 5,
                    'orderby' => 'meta_value_num',
                    'meta_key' => 'post_views_count',
                    'order' => 'DESC'
                );
                $trending_posts = get_posts( $trending_args );
                if($trending_posts){
                ?>
            <div class="text see-all-btn align-items-center">
                <h3 class="text-dark">Trending</h3>
                <a href="#">See all <i class="fa fa-long-arrow-right" aria-hidden="true"></i> </a>
            </div>
            <div class="post-title-heading img-box">
                <?php
                
                foreach ( $trending_posts as $post ) {
                    setup_postdata( $post );
                    $trending_id = get_the_ID();
                ?>
                <div class="img-box">
                    <div class="text">
                        <?php
                        echo '<h5> <a href="'.get_the_permalink($trending_id).'" tabindex="0">'.get_the_title($trending_id).'</a> </h5>';
                        ?>
                        <div class="icon">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo do_shortcode('[reading_time post-id="'.$trending_id.'"]'); ?></p>
                        </div>
                    </div>
                </div>
                <?php 
                }
                
                wp_reset_postdata();
                ?>
                <!--
                <div class="img-box">
                    <div class="text">
                        <h5><a href="#">The Rise of Unique Apartment Booking Experiences</a> </h5>
                        <div class="icon">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 4 min</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <div class="text">
                        <h5><a href="#">Booking Eco-Friendly Apartments</a> </h5>
                        <div class="icon">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 4 min</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <div class="text">
                        <h5><a href="#">Enjoy your own private pool, by the hour</a> </h5>
                        <div class="icon">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 4 min</p>
                        </div>
                    </div>
                </div>
                <div class="img-box">
                    <div class="text">
                        <h5><a href="#">Booking Outdoor Spaces for Memorable Gatherings</a> </h5>
                        <div class="icon">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> 4 min</p>
                        </div>
                    </div>
                </div>
                -->
            </div>
            <?php 
                }
                ?>
                
                <?php
                if ( is_active_sidebar( 'sidebar' ) ) : //check the sidebar if used.
                    dynamic_sidebar( 'sidebar' );  // show the sidebar.
                    endif;
                ?>
                <!--
                <div class="text categories-sec main-post-imgbox">
                <h3>Categories</h3>
                <div class="img-box">
                <ul>
                        <li><a href="javascript:void(0)"> Pool </a></li>
                        <li><a href="javascript:void(0)"> Hunting </a></li>
                        <li><a href="javascript:void(0)"> Fishing </a></li>
                        <li><a href="javascript:void(0)">Trampolines </a></li>
                        <li><a href="javascript:void(0)">Skateboarding </a></li>
                        <li><a href="javascript:void(0)"> Tree Houses</a></li>
                        <li><a href="javascript:void(0)"> Zip Lines</a></li>
                        <li><a href="javascript:void(0)"> Pickleball</a></li>
                        <li><a href="javascript:void(0)"> Horses</a></li>
                        <li><a href="javascript:void(0)"> Grilling</a></li>
                        <li><a href="javascript:void(0)"> Bowls</a></li>
                        <li><a href="javascript:void(0)">Guest </a></li>
                        <li><a href="javascript:void(0)"> Host</a></li>
                        <li><a href="javascript:void(0)"> Learning</a></li>
                        <li><a href="javascript:void(0)"> Back Yard</a></li>
                    </ul>
                </div>
                </div>
                <div class="search-box">
                    <input type="text" placeholder="Search" required>
                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                -->
            </div>
        </div>
    </div>

</section>

<section class="blog-sec-03 main-post-imgbox">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="text">
                    <?php 
                    echo '<h3>'.$section_2['title'].'</h3>'; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                
                <?php
                $args = array(
                    'category__in' => $section_2['select_categories'],
                    'posts_per_page' => 1,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $cat_posts = get_posts( $args );
                foreach ( $cat_posts as $post ) {
                    setup_postdata( $post );
                    $sec_id_1 = get_the_ID();
                    $article_subtitle = get_field('article_subtitle', $sec_id_1);
                ?>

            <div class="img-box">
                    <a href="<?php echo get_the_permalink($id); ?>" tabindex="0"> <img src="<?php echo get_the_post_thumbnail_url($id); ?>" alt=""></a>
                    <?php
                    $categories = get_the_category($sec_id_1);
                    if ($categories) {
                        echo '<ul>';
                        foreach ($categories as $count => $category) {
                            if($count <= 2){
                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                            }
                        }
                        echo '</ul>';
                    }
                    ?>
                    <div class="text">
                         <?php
                        echo '<h5> <a href="'.get_the_permalink($sec_id_1).'" tabindex="0">'.get_the_title($sec_id_1).'</a> </h5>';
                        if($article_subtitle){
                            echo '<p>'.$article_subtitle.'</p>';
                        }
                        ?>
                        <div class="icon">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo do_shortcode('[reading_time post-id="'.$sec_id_1.'"]'); ?></p>
                        </div>
                    </div>
                </div>
                <?php 
                }
                
                wp_reset_postdata();
                ?>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <?php
                        $args = array(
                            'category__in' => $section_2['select_categories'],
                            'posts_per_page' => 4,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'offset' => 1
                        );
                        $cat_posts = get_posts( $args );
                        foreach ( $cat_posts as $post ) {
                            setup_postdata( $post );
                            $sec_id_1 = get_the_ID();
                        ?>
                    
                    <div class="col-lg-6 col-md-12">
                    <div class="img-box small-img-box">
                        <a href="<?php echo get_the_permalink($id); ?>" tabindex="0"> <img src="<?php echo get_the_post_thumbnail_url($id); ?>" alt=""></a>
                        <div class="text">
                             <?php
                                echo '<h5> <a href="'.get_the_permalink($sec_id_1).'" tabindex="0">'.get_the_title($sec_id_1).'</a> </h5>';
                                ?>
                            <div class="icon">
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo do_shortcode('[reading_time post-id="'.$sec_id_1.'"]'); ?></p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php 
                    }
                    
                    wp_reset_postdata();
                    ?>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="read-all-btn-with-arrow">
                <a href="<?php echo $section_2['read_all_link'] ?>">Read All <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
            </div>
        </div>
    </div>

</section>


<section class="blog-sec-03 blog-sec-04 main-post-imgbox">
   <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="text">
                    <?php 
                    echo '<h3>'.$section_3['title'].'</h3>'; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <?php
                        $args = array(
                            'category__in' => $section_3['select_categories'],
                            'posts_per_page' => 4,
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                        );
                        $cat_posts = get_posts( $args );
                        foreach ( $cat_posts as $post ) {
                            setup_postdata( $post );
                            $sec_id_3 = get_the_ID();
                        ?>
                    
                    <div class="col-lg-6 col-md-12">
                    <div class="img-box small-img-box">
                        <a href="<?php echo get_the_permalink($sec_id_3); ?>" tabindex="0"> <img src="<?php echo get_the_post_thumbnail_url($sec_id_3); ?>" alt=""></a>
                        <div class="text">
                             <?php
                                echo '<h5> <a href="'.get_the_permalink($sec_id_3).'" tabindex="0">'.get_the_title($sec_id_3).'</a> </h5>';
                                ?>
                            <div class="icon">
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo do_shortcode('[reading_time post-id="'.$sec_id_3.'"]'); ?></p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php 
                    }
                    
                    wp_reset_postdata();
                    ?>
                    
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                
                <?php
                $args = array(
                    'category__in' => $section_3['select_categories'],
                    'posts_per_page' => 1,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'offset' => 4
                );
                $cat_posts = get_posts( $args );
                foreach ( $cat_posts as $post ) {
                    setup_postdata( $post );
                    $sec_id_3 = get_the_ID();
                    $article_subtitle = get_field('article_subtitle', $sec_id_3);
                ?>

            <div class="img-box">
                    <a href="<?php echo get_the_permalink($sec_id_3); ?>" tabindex="0"> <img src="<?php echo get_the_post_thumbnail_url($sec_id_3); ?>" alt=""></a>
                    <?php
                    $categories = get_the_category($sec_id_3);
                    if ($categories) {
                        echo '<ul>';
                        foreach ($categories as $count => $category) {
                            if($count <= 2){
                            echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                            }
                        }
                        echo '</ul>';
                    }
                    ?>
                    <div class="text">
                         <?php
                        echo '<h5> <a href="'.get_the_permalink($sec_id_3).'" tabindex="0">'.get_the_title($sec_id_3).'</a> </h5>';
                        if($article_subtitle){
                            echo '<p>'.$article_subtitle.'</p>';
                        }
                        ?>
                        <div class="icon">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo do_shortcode('[reading_time post-id="'.$sec_id_3.'"]'); ?></p>
                        </div>
                    </div>
                </div>
                <?php 
                }
                
                wp_reset_postdata();
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="read-all-btn-with-arrow">
                <a href="<?php echo $section_3['read_all_link'] ?>">Read All <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-sec-05 main-post-imgbox">
    <div class="container">
        <div class="row">
            <div class="text">
                <?php 
                    echo '<h3>'.$section_4['title'].'</h3>';
                ?>
            </div>
        </div>
        <div class="row">
            <?php
                $args = array(
                    'category__in' => $section_4['select_categories'],
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $cat_posts = get_posts( $args );
                foreach ( $cat_posts as $post ) {
                    setup_postdata( $post );
                    $sec_id_4 = get_the_ID();
                    $article_subtitle = get_field('article_subtitle', $sec_id_4);
                ?>
            <div class="col-lg-4 col-md-4">
            <div class="img-box">
        <a href="<?php echo get_the_permalink($sec_id_4); ?>" tabindex="0"> <img src="<?php echo get_the_post_thumbnail_url($sec_id_4); ?>" alt=""></a>
        <?php
        $categories = get_the_category($sec_id_4);
        if ($categories) {
            echo '<ul>';
            foreach ($categories as $count => $category) {
                if($count <= 2){
                echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                }
            }
            echo '</ul>';
        }
        ?>
        <div class="text">
            <?php
            echo '<h5> <a href="'.get_the_permalink($sec_id_3).'" tabindex="0">'.get_the_title($sec_id_3).'</a> </h5>';
            if($article_subtitle){
                echo '<p>'.$article_subtitle.'</p>';
            }
            ?>
            <div class="icon">
                <p><i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo do_shortcode('[reading_time post-id="'.$sec_id_3.'"]'); ?></p>
            </div>
        </div>
    </div>
            </div>
            <?php 
                }
                
                wp_reset_postdata();
                ?>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="read-all-btn-with-arrow">
                            <a href="<?php echo $section_4['read_all_link'] ?>">Read All <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
            </div>
        </div>
    </div>

</section>

<section class="blog-sec-06 blog-sec-05 main-post-imgbox">
    <div class="container">
        <div class="row">
            <div class="text">
                <?php 
                    echo '<h3>'.$section_5['title'].'</h3>';
                ?>
            </div>
        </div>
        <div class="row">
            <?php
                $args = array(
                    'category__in' => $section_5['select_categories'],
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $cat_posts = get_posts( $args );
                foreach ( $cat_posts as $post ) {
                    setup_postdata( $post );
                    $sec_id_5 = get_the_ID();
                    $article_subtitle = get_field('article_subtitle', $sec_id_5);
                ?>
            <div class="col-lg-4 col-md-4">
            <div class="img-box">
        <a href="<?php echo get_the_permalink($sec_id_5); ?>" tabindex="0"> <img src="<?php echo get_the_post_thumbnail_url($sec_id_5); ?>" alt=""></a>
        <?php
        $categories = get_the_category($sec_id_5);
        if ($categories) {
            echo '<ul>';
            foreach ($categories as $count => $category) {
                if($count <= 2){
                echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                }
            }
            echo '</ul>';
        }
        ?>
        <div class="text">
            <?php
            echo '<h5> <a href="'.get_the_permalink($sec_id_5).'" tabindex="0">'.get_the_title($sec_id_5).'</a> </h5>';
            if($article_subtitle){
                echo '<p>'.$article_subtitle.'</p>';
            }
            ?>
            <div class="icon">
                <p><i class="fa fa-clock-o" aria-hidden="true"></i>  <?php echo do_shortcode('[reading_time post-id="'.$sec_id_5.'"]'); ?></p>
            </div>
        </div>
    </div>
            </div>
            <?php 
                }
                
                wp_reset_postdata();
                ?>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="read-all-btn-with-arrow">
                            <a href="<?php echo $section_5['read_all_link'] ?>">Read All <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
            </div>
        </div>
    </div>
</section>


<?php
$newsletter = get_field('newsletter', 'option');

if($newsletter['title'] || $newsletter['content'] || $newsletter['form_shortcode']){
?>
<section class="blog-sec-07">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-box">
                <div class="text">
                    <?php
                    echo $newsletter['title'] ? '<h3>'.$newsletter['title'].'</h3>' : '';
                    echo $newsletter['content'] ? '<p>'.$newsletter['content'].'</p>' : '';
                    ?>
                    
                    
                </div>
                <div class="input-box">
                <?php
                echo $newsletter['form_shortcode'] ? do_shortcode($newsletter['form_shortcode']) : '';
                ?>
                </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php
}
get_footer();
?>