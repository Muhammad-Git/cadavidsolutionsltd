<?php

function custom_single_post_template($template) {
    if (is_single() && get_post_type() === 'post') {
        if (function_exists('get_field')) {
            $selected_template = get_field('select_article_template', get_the_ID());
            if ($selected_template === 'article-alternative') {
                $template = locate_template('single-post-alternative.php');
        }
    }
    return $template;
}
}

add_filter('single_template', 'custom_single_post_template');

function calculate_reading_time($atts) {
    
    $atts = shortcode_atts(array(
        'post-id' => get_the_ID(),
    ), $atts, 'reading_time');
    
    $articles = get_field('article_repeater', $atts['post-id']);
    $post_content = get_the_content($atts['post-id']);
    
    $words_per_minute = 200;
    
    if($post_content){
        $word_count_content = str_word_count(strip_tags($post_content));
        $total_reading_time = ceil($word_count_content / $words_per_minute);
    }
    else{
     $total_reading_time = 0;   
    }

    foreach ($articles as $article) {
        $word_count = str_word_count(strip_tags($article['content']));
        $article_reading_time = ceil($word_count / $words_per_minute);
        $total_reading_time += $article_reading_time;
    }

    return $total_reading_time . ' mins';
}

add_shortcode('reading_time', 'calculate_reading_time');


// Estimate Reading Time

/*
 * Set post views count using post meta
 */
function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}


// Share Post
function custom_share_post_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'id' => get_the_ID(),
        ),
        $atts,
        'share_post'
    );

    $post_permalink = get_permalink($atts['id']);


    $output = '<div class="dis-share">';
    $output .= '<p>Like what you see? Share with a friend.</p>';
    $output .= '<ul>';
    $output .= '<li><a href="javascript:;" class="copy-link-btn" data-link="' . esc_url($post_permalink) . '"><img src="https://luckybackyards.com/customwp/wp-content/uploads/2024/03/link.png"></a></li>';
    $output .= '<li><a href="https://twitter.com/intent/tweet?url=' . esc_url($post_permalink) . '" target="_blank"><img src="https://luckybackyards.com/customwp/wp-content/uploads/2024/03/xx.png"></a></li>';
    $output .= '<li><a href="https://www.facebook.com/sharer/sharer.php?u=' . esc_url($post_permalink) . '" target="_blank"><img src="https://luckybackyards.com/customwp/wp-content/uploads/2024/03/fb.png"></a></li>';
    $output .= '<li><a href="https://www.linkedin.com/shareArticle?url=' . esc_url($post_permalink) . '" target="_blank"><img src="https://luckybackyards.com/customwp/wp-content/uploads/2024/03/linkedin.png"></a></li>';
    $output .= '</ul>';
    $output .= '</div>';

    return $output;
}
add_shortcode('share_post', 'custom_share_post_shortcode');

// Share Post
