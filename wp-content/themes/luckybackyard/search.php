<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Shape
 * @since Shape 1.0
 */

get_header(); 
?>

<?php
// Retrieve parameters from the URL

$property_type = isset($_GET['property_type']) ? sanitize_text_field($_GET['property_type']) : '';
$start_price = isset($_GET['start_price']) ? intval($_GET['start_price']) : 0;
$ending_price = isset($_GET['ending_price']) ? intval($_GET['ending_price']) : 1000;
$must_have = isset($_GET['must_have']) ? $_GET['must_have'] : array();
$no_preferences_cancelation = isset($_GET['no_preferences_cancelation']) ? sanitize_text_field($_GET['no_preferences_cancelation']) : '';
$no_preferences_privacy = isset($_GET['no_preferences_privacy']) ? sanitize_text_field($_GET['no_preferences_privacy']) : '';
$amenities = isset($_GET['amenities']) ? $_GET['amenities'] : array();
$charge_type = isset($_GET['charge_type']) ? $_GET['charge_type'] : '';
$region = isset($_GET['region']) ? $_GET['region'] : '';
$adults = isset($_GET['adults']) ? $_GET['adults'] : '';
$children = isset($_GET['childrens']) ? $_GET['childrens'] : '';
$infants = isset($_GET['infants']) ? $_GET['infants'] : '';
$pets = isset($_GET['pets']) ? $_GET['pets'] : '';
$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

$date = isset($_GET['date']) ? $_GET['date'] : '';
$start_time_mins = isset($_GET['start_time']) ? $_GET['start_time'] : '';
$end_time_mins = isset($_GET['end_time']) ? $_GET['end_time'] : '';

// print_r($date);
// echo '<br>';
// print_r($start_time_mins);
// echo '<br>';
// print_r($end_time_mins);
// print_r($property_type);
// echo '<br>';
// print_r($start_price);
// echo '<br>';
// print_r($ending_price);
// echo '<br>';
// print_r($must_have);
// echo '<br>';
// print_r($no_preferences_cancelation);
// echo '<br>';
// print_r($amenities);

// Set up the arguments for the custom query
// $args = array(
//     'post_type' => 'property', // Specify the post type
//     'posts_per_page' => -1, // Retrieve all matching posts
//     'meta_query' => array(
//         'relation' => 'AND', // Match all conditions
//         // array(
//         //     'key' => 'price', // Meta key for start price
//         //     'value' => array($start_price, $ending_price),
//         //     'type' => 'NUMERIC',
//         //     'compare' => 'BETWEEN',
//         // ),
//         // array(
//         //     'key' => 'cancellation_policy', // Meta key for cancellation policy
//         //     'value' => $no_preferences_cancelation,
//         //     'compare' => '=',
//         // ),
//         // array(
//         //     'key' => 'privacy', // Meta key for privacy policy
//         //     'value' => $no_preferences_privacy,
//         //     'compare' => '=',
//         // ),
//     ),
// );

$args = array(
    'post_type' => 'property', // Specify the post type
    'posts_per_page' => -1, // Retrieve all matching posts
    'meta_query' => array(
        'relation' => 'AND', // Ensure you have a relation defined if you plan to add multiple conditions
    ),
);

if(!empty($start_date) && !empty($end_date)) {
    // Add custom SQL filter to exclude properties with overlapping booked dates
    add_filter('posts_where', function ($where, $wp_query) use ($start_date, $end_date) {
        global $wpdb;

        // Ensure dates are properly formatted
        $start_date = esc_sql($start_date);
        $end_date = esc_sql($end_date);

        // Add the custom SQL to filter out properties with overlapping booked dates
        $where .= " AND {$wpdb->posts}.ID NOT IN (
            SELECT post_id FROM {$wpdb->postmeta} 
            WHERE meta_key = 'booked_dates' 
            AND (
                meta_value LIKE '%$start_date%' 
                OR meta_value LIKE '%$end_date%'
                OR (
                    meta_value >= '$start_date' 
                    AND meta_value <= '$end_date'
                )
            )
        )";

        return $where;
    }, 10, 2);
}
add_action('pre_get_posts', 'filter_properties_by_date_range');


if(!empty($date) && !empty($start_time_mins) && !empty($end_time_mins)) {
    $start_time = convert_minutes_to_time($start_time_mins);
    $end_time = convert_minutes_to_time($end_time_mins);

    
     add_filter('posts_where', function ($where, $wp_query) use ($date, $start_time, $end_time) {
                global $wpdb;

                // Ensure inputs are properly formatted and escaped
                $date = esc_sql($date);
                $start_time = esc_sql($start_time);
                $end_time = esc_sql($end_time);

                // Custom SQL to filter out properties with overlapping booked dates and times
                $where .= " AND {$wpdb->posts}.ID NOT IN (
                    SELECT post_id FROM {$wpdb->postmeta} 
                    WHERE meta_key = 'booked_times' 
                    AND (
                        meta_value LIKE '%\"$date\"%'
                        AND (
                            meta_value LIKE '%\"start_time\":\"$start_time\"%'
                            OR meta_value LIKE '%\"end_time\":\"$end_time\"%'
                            OR (
                                meta_value LIKE '%\"start_time\":\"%\"%'
                                AND (
                                    SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value, '\"start_time\":\"', -1), '\"', 1) <= '$start_time'
                                    AND 
                                    SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value, '\"end_time\":\"', -1), '\"', 1) >= '$end_time'
                                )
                            )
                        )
                    )
                )";

                return $where;
            }, 10, 2);
}

add_action('pre_get_posts', 'filter_properties_by_date_and_time');


// If property type is specified, add it to the query

if (!empty($charge_type)) {
    $args['meta_query'][] = array(
            'key' => 'charge_type',
            'value' => $charge_type,
            'compare' => '='
    );
}

if (!empty($region)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'region',
        'field' => 'slug',
        'terms' => $region,
        'operator' => 'IN',
    );
}


if (!empty($property_type)) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'property-type',
            'field' => 'slug',
            'terms' => $property_type,
        ),
    );
}

// Add adults condition with <= comparison
if (!empty($adults) && is_numeric($adults)) {
    $args['meta_query'][] = array(
        'key' => 'adults',
        'value' => $adults,
        'type' => 'NUMERIC',
        'compare' => '<='
    );
}

if (!empty($children) && is_numeric($children)) {
    $args['meta_query'][] = array(
        'key' => 'children',
        'value' => $children,
        'type' => 'NUMERIC',
        'compare' => '<='
    );
}

if (!empty($infants) && is_numeric($infants)) {
    $args['meta_query'][] = array(
        'key' => 'infants',
        'value' => $infants,
        'type' => 'NUMERIC',
        'compare' => '<='
    );
}

if (!empty($pets) && is_numeric($pets)) {
    $args['meta_query'][] = array(
        'key' => 'pets',
        'value' => $pets,
        'type' => 'NUMERIC',
        'compare' => '<='
    );
}

// If must haves are specified, add them to the query
if (!empty($must_have)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'must_have',
        'field' => 'slug',
        'terms' => $must_have,
        'operator' => 'IN',
    );
}

// If amenities are specified, add them to the query
if (!empty($amenities)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'amenity',
        'field' => 'slug',
        'terms' => $amenities,
        'operator' => 'IN',
    );
}

// echo '<pre>';
// print_r($args);
// echo '</pre>';
// Perform the custom query
$property_query = new WP_Query($args);

// echo '<pre>';
// print_r($property_query);
// echo '</pre>';


// Check if there are any matching posts
if ($property_query->have_posts()) :
?>


<section class="home-sec-02 search-page-def">
    
 <div class="row justify-content-center">
<?php while ($property_query->have_posts()) : $property_query->the_post();
$hourly_price = get_field("price");
 $charge_typ = get_field("charge_type");
$bathrooms = get_field("bathrooms");
$bedrooms = get_field("bedrooms");
?>
<div class="main-icon-img-box search-page">
            <div class="img-box">
                <div class="img-box-content">
                    <h6>Guest Favorite</h6>
                    <a href="javascript:void(0)"><img src="<?php echo site_url();?>/wp-content/themes/luckybackyard/assets/images/like.png" class="img-fluid" alt=""></a>
                </div>
                <a href="<?php echo the_permalink();?>">
                        <div class="img-box">
                    <?php
                    $property_gallery = get_field('property_gallery');
                    if ($property_gallery) {
                        $first_image = $property_gallery[0];
                        echo '<img class="img-fluid w-100 hm_ani_img" src="' . esc_url($first_image['url']) . '" alt="' . esc_attr(get_the_title()) . '">';
                    } else {
                        // If there's no gallery image, show a placeholder
                        echo '<img class="img-fluid w-100 hm_ani_img" src="' . esc_url(get_template_directory_uri() . '/images/placeholder.jpg') . '" alt="Placeholder">';
                    }
                    ?>
                   
                </div>                       
                    
                </a>
            </div>
            <div class="content-box">
                <div class="title-content">
                    <h5><a href="<?php echo the_permalink();?>"><?php echo the_title();?></a></h5>
                    
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
                        $display_charge_type = ($charge_typ === 'nightly') ? 'night' : $charge_typ;
                        echo '<h4>$' . esc_html($hourly_price) . '</h4><p>/ ' . esc_html($display_charge_type) . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
<?php endwhile; ?>
</div>
    
</section>
<?php
    wp_reset_postdata();
else :
    // If no posts match the search criteria, display a message
    echo '<p>No properties found.</p>';
endif;

// Restore original post data
wp_reset_postdata();
?>
     

                   
                          
        
         
<?php get_footer(); ?>