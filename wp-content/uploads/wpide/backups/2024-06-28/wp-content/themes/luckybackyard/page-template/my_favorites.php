<?php

/* Template Name: My Favorites Template */

// Get the category ID from the URL
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// Redirect to wishlist page if category ID is not present
if ($category_id == 0) {
    wp_redirect(home_url('/wish-list'));
    exit;
}

get_header();
?>

<?php


// Check if the user is logged in
if (!is_user_logged_in()) {
    echo '<p>Please login to view your favorites.</p>';
    echo '<a href="' . wp_login_url() . '" class="btn btn-primary">Login</a>';
    get_footer();
    exit;
}

$user_id = get_current_user_id();
global $wpdb;
$wishlist_table = $wpdb->prefix . 'wishlist';
$wishlist_property_ids = $wpdb->get_col($wpdb->prepare(
    "SELECT property_id FROM $wishlist_table WHERE user_id = %d AND category_id = %d",
    $user_id,
    $category_id
));

if (empty($wishlist_property_ids)) {
    echo '<p>No properties found in this category.</p>';
    get_footer();
    exit;
}

$args = array(
    'post_type' => 'property',
    'posts_per_page' => 10,
    'post__in' => $wishlist_property_ids,
);

$listing_querys = new WP_Query($args);
?>

<section class="home-sec-02 my-favorites">
    <div class="container">
        <div class="my-favorites-content">
            <h4>
       <?php

            // Get the category name from the wishlist_categories table
            global $wpdb;
            $table_name = $wpdb->prefix . 'wishlist_categories';
            $category_name = $wpdb->get_var($wpdb->prepare(
                "SELECT name FROM $table_name WHERE id = %d",
                $category_id
            ));

            // Display the category name
            if ($category_name) {
                echo esc_html($category_name);
            } else {
                echo 'Favourites';
            }
            ?>
            </h4>
            <div class="share-and-other-link">
                <ul>
                    <!--<li><button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop5"><span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                    <!--                <path d="M14 12.6667C14 13.0333 13.8694 13.3472 13.6083 13.6083C13.3472 13.8694 13.0333 14 12.6667 14L3.33333 14C2.96667 14 2.65278 13.8694 2.39167 13.6083C2.13056 13.3472 2 13.0333 2 12.6667L2 8L3.33333 8L3.33333 12.6667L12.6667 12.6667L12.6667 8L14 8L14 12.6667ZM11.3333 5.33333L10.3667 6.25L8.66667 4.55L8.66667 10L7.33333 10L7.33333 4.55L5.63333 6.25L4.66667 5.33333L8 2L11.3333 5.33333Z" fill="#484848" />-->
                    <!--            </svg>-->
                    <!--        </span></button>-->
                    <!--</li>-->
                    <li><button type="button" class="share"><span><svg width="12" height="4" viewBox="0 0 12 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="1.33333" cy="1.99935" r="1.33333" fill="#484848" />
                                    <circle cx="6.00033" cy="1.99935" r="1.33333" fill="#484848" />
                                    <ellipse cx="10.6663" cy="1.99935" rx="1.33333" ry="1.33333" fill="#484848" />
                                </svg></span>

                            </button>
                            <div class="rename-and-delet-box">
                                <ul>
                                    <li><button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop10"><span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.33299 12.6673H4.17401L10.9984 5.84292L10.1574 5.0019L3.33299 11.8263V12.6673ZM2.33301 13.6673V11.4109L11.1266 2.62117C11.2274 2.5296 11.3387 2.45885 11.4605 2.4089C11.5824 2.35896 11.7101 2.33398 11.8438 2.33398C11.9774 2.33398 12.1069 2.35771 12.2322 2.40515C12.3575 2.45258 12.4684 2.52801 12.565 2.63142L13.3791 3.45577C13.4825 3.55235 13.5563 3.66348 13.6003 3.78917C13.6443 3.91485 13.6663 4.04052 13.6663 4.1662C13.6663 4.30026 13.6434 4.42819 13.5976 4.55C13.5518 4.67182 13.479 4.78314 13.3791 4.88395L4.58939 13.6673H2.33301ZM10.5705 5.42979L10.1574 5.0019L10.9984 5.84292L10.5705 5.42979Z" fill="#484848"/>
</svg>
</span>Rename</button></li>
<li><button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop11"><span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4.8718 13.6665C4.53932 13.6665 4.25535 13.5488 4.01988 13.3133C3.78441 13.0778 3.66667 12.7939 3.66667 12.4614V3.99987H3V2.99989H5.99998V2.41016H9.99998V2.99989H13V3.99987H12.3333V12.4614C12.3333 12.7981 12.2166 13.0832 11.9833 13.3165C11.75 13.5499 11.4649 13.6665 11.1282 13.6665H4.8718ZM11.3333 3.99987H4.66665V12.4614C4.66665 12.5212 4.68588 12.5704 4.72435 12.6088C4.76282 12.6473 4.81197 12.6665 4.8718 12.6665H11.1282C11.1795 12.6665 11.2265 12.6452 11.2692 12.6024C11.312 12.5597 11.3333 12.5127 11.3333 12.4614V3.99987ZM6.26923 11.3332H7.26922V5.33321H6.26923V11.3332ZM8.73075 11.3332H9.73073V5.33321H8.73075V11.3332Z" fill="#484848"/>
</svg>

</span>Delete</button></li>
                                </ul>
                            </div>
                        </li>

                </ul>
            </div>
        </div>

        <div class="container-fluid px-0">
            <div class="row -justify-content-between" id="amenity_response">
                <!-- Listing Properties -->
                <?php
                if ($listing_querys->have_posts()) {
                    while ($listing_querys->have_posts()) {
                        $listing_querys->the_post();
                        $pro_id = get_the_ID();
                        $pro_gallery = get_field("property_gallery", $pro_id);
                        $bathrooms = get_field("bathrooms", $pro_id);
                        $bedrooms = get_field("bedrooms", $pro_id);
                        $hourly_price = get_field("price", $pro_id);
                        $charge_type = get_field("charge_type", $pro_id);
                        
                        // Check if the property is in the user's wishlist
                        $is_favorite = in_array($pro_id, $wishlist_property_ids);
                        ?>
                        <div class="main-icon-img-box">
                            <div class="img-box">
                                <div class="img-box-content">
                                    <h6>Guest Favorite</h6>
                                    <div id="add-to-wishlist" data-id="<?php echo $pro_id; ?>" class="<?php echo $is_favorite ? 'favourite' : ''; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="heart">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                        </svg>
                                    </div>
                                    
                                    <div id="btn-share-property" data-id="<?php echo $pro_id; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186m0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185"/></svg>
                                    </div>
                                </div>
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if ($pro_gallery[0]['url']) {
                                        echo '<img src="' . esc_url($pro_gallery[0]['url']) . '" class="w-100 hm_ani_img" alt="">';
                                    } else {
                                        echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/main-icon-img-01.png" class="w-100 hm_ani_img" alt="">';
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="title-content">
                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <p>
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.295 12.5L3.27 8.06316L0 5.07895L4.32 4.68421L6 0.5L7.68 4.68421L12 5.07895L8.73 8.06316L9.705 12.5L6 10.1474L2.295 12.5Z" fill="#484848"/>
                                        </svg>
                                        4,5
                                    </p>
                                </div>
                                <ul class="main-listing-cat">
                                    <?php if (!empty($bedrooms)): ?>
                                        <li>
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bed.png" alt="">
                                            <?php echo $bedrooms . ' ' . ($bedrooms == 1 ? 'Bedroom' : 'Bedrooms'); ?>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($bathrooms)): ?>
                                        <li>
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bathroom.png" alt="">
                                            <?php echo $bathrooms . ' ' . ($bathrooms == 1 ? 'Bathroom' : 'Bathrooms'); ?>
                                        </li>
                                    <?php endif; ?>
                                    <li>
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wifi.png" alt=""> Wifi
                                    </li>
                                </ul>
                                <div class="price-box">
                                    <?php 
                                    if ($hourly_price) {
                                        // Convert $charge_type to lowercase for a case-insensitive comparison
                                        $display_charge_type = ($charge_type === 'nightly') ? 'night' : $charge_type;
                                        echo '<h4>$' . esc_html($hourly_price) . '</h4><p>/ ' . esc_html($display_charge_type) . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo '<p>No listings found.</p>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>

<script>
    jQuery(document).ready(function($) {
    $('#btn-rename-wishlist').on('click', function(e) {
        e.preventDefault();
        
        // Get the new category name from the input field
        var new_name = $('input[name="field-rename-wishlist"]').val();

        // Check if the field is empty
        if (new_name.trim() === '') {
            // Append the warning message
            $('.rename-wishlist-modal-input form').append('<div class="mt-2 text text-danger">Please enter category name</div>');

            // Remove the warning message after 5 seconds
            setTimeout(function() {
                $('.rename-wishlist-modal-input .text-danger').fadeOut('slow', function() {
                    $(this).remove();
                });
            }, 5000);

            return; // Exit function if field is empty
        }

        // AJAX request
        $.ajax({
            type: 'POST',
            url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
            data: {
                action: 'rename_wishlist_category',
                category_id: <?php echo $category_id ?>, // Assuming you have a way to get category_id dynamically
                new_name: new_name
            },
            success: function(response) {
                if (response === 'success') {
                    // Update the <h4> with the new name
                    $('.my-favorites-content h4').text(new_name);
                    $('#staticBackdrop10').modal('hide');
                } else {
                    alert('Failed to update category name.');
                }
            },
            error: function() {
                alert('Request failed.');
            }
        });
    });
    
    $('#btn-delete-wishlist').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
            data: {
                action: 'delete_wishlist_category',
                category_id: '<?php echo $category_id; ?>'
            },
            success: function(response) {
                if (response.success) {
                    alert(response.data);
                    window.location.href = "<?php echo site_url('wish-list'); ?>"; // Redirect to wishlist page
                } else {
                    alert(response.data);
                }
            },
            error: function() {
                alert('AJAX request failed.');
            }
        });
    });
    
      $('.main-icon-img-box #btn-share-property').on('click', function() {
        // Get the property ID
        var propertyId = $(this).data('id');
        // Fetch the property details using AJAX (replace with your actual AJAX call)
        $.ajax({
            type: 'POST',
            url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
            data: {
                action: 'get_property_details',
                property_id: propertyId
            },
            success: function(response) {
                if (response.success) {
                // Extract the property details from the response
                var propertyName = response.data.title;
                var propertyUrl = response.data.url;
                var propertyImage = response.data.first_image_url;
                
                // Populate the modal with the property details
                $('#shareProperty .modal-title').text('Share ' + propertyName);
                $('#shareProperty .img-box p').text(propertyName);
                $('#shareProperty .img-box img').attr('src', propertyImage);
                $('#shareProperty #copy-link').attr('href', propertyUrl);
                
                // Show the modal
                $('#shareProperty').modal('show');
                } else {
                console.error('Error fetching property details:', response.data.message);
                }
  
            }
        });
    });
    
    $('#copy-link').click(function(event) {
        event.preventDefault();
        var propertyUrl = $('#shareProperty #copy-link').attr('href');
        // Use the Clipboard API to copy the property URL to the clipboard
        navigator.clipboard.writeText(propertyUrl).then(function() {
        // Optionally, show a message that the link was copied
        alert('Property link copied to clipboard: ' + propertyUrl);
        }).catch(function(error) {
        console.error('Error copying text to clipboard:', error);
        });
    });
    
    $('#shareProperty #email').click(function(event) {
    event.preventDefault();

    // Get the property name and URL
    var propertyName = $('#shareProperty .img-box p').text();
    var propertyUrl = $('#shareProperty #copy-link').attr('href');

    // Construct the email body
    var emailBody = propertyName + '\n\n' +
                    'View this property: ' + propertyUrl;

    // Open the default email client with pre-filled data
    var subject = encodeURIComponent('Lucky Backyards.+'propertyName'+.');
    var body = encodeURIComponent(emailBody);
    window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
    });

    
});

</script>