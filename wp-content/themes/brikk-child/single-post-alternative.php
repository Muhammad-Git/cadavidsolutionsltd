<?php
get_header();
$id = get_the_ID();
$article = get_field('article_repeater', $id);
$article_subtitle = get_field('article_subtitle', $id);
setPostViews($id);
?>


<section class="blog-sec-01 main-post-imgbox main-post-imgbox-white alertnative-article-sec-01 " style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/alertnative-article-bg.jpg);">
    <div class="container ">
    <div class="row">
            <div class="col-lg-12 col-md-12">
            <div class="img-box" style="width: 100%; display: inline-block;">
                   <?php
$categories = get_the_category($id);

if ($categories) {
    echo '<ul>';
    foreach ($categories as $count => $category) {
        if($count <= 4){
        echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
        }
    }
    echo '</ul>';
}
?>
                    <div class="text">
                        <h5> <a href="#" tabindex="0"><?php echo get_the_title($id);?></a> </h5>
                        <?php
                        if($article_subtitle){
                            echo '<p>'.$article_subtitle.'</p>';
                        }
                        ?>
                        <div class="icon">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php print_r(do_shortcode('[reading_time post-id="'.$id.'"]')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="main-site-listing article-sec-01">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <ul>
                     <?php 
    				    if(is_array($article)){ 
    					foreach($article as $key => $articles){
    					if($articles){    
        			
                    echo '<li> <a href="#article-'.$key.'">'.$articles['heading'].'</a> </li>';
                    } } } ?>
                    	
                </ul>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="main-box">
                    <?php
                        echo '<div class="text-box">
                                <div class="text">'.get_the_content().'
                                </div>
                            </div>';
                   
    				    if(is_array($article)){ 
    					foreach($article as $key => $articles){
    					if($articles){    
        				?>
                    <div class="text-box" id="article-<?php echo $key; ?>">
                        <div class="text" >
                            <h3><?php echo $articles['heading'];?></h3>
                            <?php echo $articles['content'];?>
                            </div>
                        </div>
                   
                    <?php } } } ?>	
                     </div>
                    <div class="discuss-and-share-box">
                        <a href="#"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.34615 11.5576H13.6538V11.2C13.6538 10.5692 13.3144 10.0545 12.6355 9.65575C11.9567 9.25703 11.0782 9.05768 9.99998 9.05768C8.92178 9.05768 8.04326 9.25703 7.36443 9.65575C6.68558 10.0545 6.34615 10.5692 6.34615 11.2V11.5576ZM9.99998 7.74995C10.4859 7.74995 10.899 7.57976 11.2394 7.23938C11.5798 6.89901 11.75 6.48588 11.75 5.99998C11.75 5.51408 11.5798 5.10094 11.2394 4.76058C10.899 4.42019 10.4859 4.25 9.99998 4.25C9.51408 4.25 9.10094 4.42019 8.76058 4.76058C8.42019 5.10094 8.25 5.51408 8.25 5.99998C8.25 6.48588 8.42019 6.89901 8.76058 7.23938C9.10094 7.57976 9.51408 7.74995 9.99998 7.74995ZM0.5 19.0384V2.3077C0.5 1.80257 0.675 1.375 1.025 1.025C1.375 0.675 1.80257 0.5 2.3077 0.5H17.6923C18.1974 0.5 18.625 0.675 18.975 1.025C19.325 1.375 19.5 1.80257 19.5 2.3077V13.6923C19.5 14.1974 19.325 14.625 18.975 14.975C18.625 15.325 18.1974 15.5 17.6923 15.5H4.03845L0.5 19.0384ZM3.4 14H17.6923C17.7692 14 17.8397 13.9679 17.9038 13.9038C17.9679 13.8397 18 13.7692 18 13.6923V2.3077C18 2.23077 17.9679 2.16024 17.9038 2.09613C17.8397 2.03203 17.7692 1.99998 17.6923 1.99998H2.3077C2.23077 1.99998 2.16024 2.03203 2.09613 2.09613C2.03202 2.16024 1.99998 2.23077 1.99998 2.3077V15.3846L3.4 14Z" fill="#484848"/>
</svg>Discuss</a>
<a href="#"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.25 11.75L5.25 11.75L5.25 18.75L19.25 18.75L19.25 11.75L21.25 11.75L21.25 18.75C21.25 19.3 21.0542 19.7708 20.6625 20.1625C20.2708 20.5542 19.8 20.75 19.25 20.75L5.25 20.75C4.7 20.75 4.22917 20.5542 3.8375 20.1625C3.44583 19.7708 3.25 19.3 3.25 18.75L3.25 11.75Z" fill="#484848"/>
<path d="M15.8 9.625L17.25 8.25L12.25 3.25L7.25 8.25L8.7 9.625L11.25 7.075L11.25 15.25L13.25 15.25L13.25 7.075L15.8 9.625Z" fill="#484848"/>
</svg>Share</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$args = array(
    'category_name' => 'host',
    'posts_per_page' => 3
);

$posts = get_posts($args);

if ($posts) {
    

?>


<section class="article-sec-02 blog-sec-05 main-post-imgbox">
    <div class="container">
        <div class="row">
            <div class="text">
                <h3>Find out how easy to be a Host</h3>
            </div>
        </div>
        <div class="row">
            
            <?php
            foreach ($posts as $post) {
        setup_postdata($post);
        $hID = get_the_ID();
        
        $categories = get_the_category();
        

        
        
    
            ?>
            

            <div class="col-lg-4 col-md-4">
            <div class="img-box">
                
        <a href="<?php echo get_the_permalink(); ?>"> <img src="<?php echo get_the_post_thumbnail_url($hID); ?>" alt=""></a>
        <?php
        
        // if (has_post_thumbnail()) {
        //     the_post_thumbnail('thumbnail');
        // } else {
        //     echo 'No featured image available';
        // }
        
        if ($categories) {
            echo '<ul>';
            foreach ($categories as $count => $category) {
                if($count <= 1){
                echo '<li><a href="javascript:void(0)">' . $category->name . '</a></li>';
                }
            }
            
            echo '<li><a href="javascript:void(0)">Host</a></li></ul>';
        }
        ?>
        <div class="text">
            <h5> <a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a> </h5>
            <p><?php the_excerpt(); ?></p>
            <div class="icon">
                <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php print_r(do_shortcode('[reading_time post-id="'.$hID.'"]')); ?></p>
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
                <a href="<?php echo get_permalink( $blog->ID );?>">Read All <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
            </div>
        </div>
    </div>

</section>


<?php

} else {
    // No posts found
    echo 'No posts found';
}


get_footer();
?>