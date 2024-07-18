<?php

/* Template Name: Wish List Template */
get_header();

$categories = get_wishlist_categories_with_images();
?>

<section class="home-sec-04 img-over-lay-style wish-list-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>Wish List</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php if ($categories === 'logged_off'): ?>
                <div class="col-md-12">
                    <p>Please login to view wishlist.</p>
                    <a href="<?php echo wp_login_url(); ?>" class="btn btn-primary">Login</a>
                </div>
            <?php elseif ($categories && !empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <?php print_r($category->id); ?>
                    <div class="col-lg-4 col-md-4">
                        <a href="<?php echo get_site_url() . "/favourites/?category_id=".$category->id; ?>">
                            <div class="img-box">
                                <img src="<?php echo esc_url($category->image_url); ?>" alt="<?php echo esc_attr($category->name); ?>">
                                <div class="content-box">
                                    <div class="text">
                                        <h6><?php echo esc_html($category->name); ?></h6>
                                    </div>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-md-12">
                    <p>Wishlist categories not found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
get_footer();
?>
