<?php

// Home page amenity

add_action('wp_ajax_nopriv_get_properties_by_amenity', 'get_properties_by_amenity');
add_action('wp_ajax_get_properties_by_amenity', 'get_properties_by_amenity');

function get_properties_by_amenity() {
    $amenity_slug = $_POST['amenity_slug'];
    $amenity_count = $_POST['amenity_count'];

    // Query to retrieve properties by amenity
    $args = array(
        'post_type' => 'property',
        'posts_per_page' => 5,
        'paged' => $amenity_count,
        // 'tax_query' => array(
        //     array(
        //         'taxonomy' => 'amenity',
        //         'field'    => 'slug',
        //         'terms'    => $amenity_slug,
        //     ),
        // ),
    );
    
    // $total_args = array(
    //     'post_type' => 'property',
        // 'tax_query' => array(
        //     array(
        //         'taxonomy' => 'amenity',
        //         'field'    => 'slug',
        //         'terms'    => $amenity_slug,
        //     ),
        // ),
    // );
    
    if ($amenity_slug !== 'all') {
        $tax_query = array(
            array(
                'taxonomy' => 'amenity',
                'field'    => 'slug',
                'terms'    => $amenity_slug,
            ),
        );
        $args['tax_query'] = $tax_query;
        // $total_args['tax_query'] = $tax_query;
    }


    $properties = get_posts($args);
    $total_properties = get_posts($total_args);
    $total_count = count($total_properties);
    
    // if($amenity_count < $total_count){
    //     $amenity_count = $amenity_count + 5;
    // }
    // else{
    //     $amenity_count = 'hide';
    // }

    // Prepare response data
    $response = array();
    if (!empty($properties)) {
    foreach ($properties as $property) {
        
        $pro_id = $property->ID;
        
        $pro_gallery = get_field( "property_gallery" , $pro_id);
        $pro_gallery_img = $pro_gallery[0]['url'];
        
        $pro_title = get_the_title($pro_id);
        $pro_content = get_the_content($pro_id);
        $pro_permalink = get_the_permalink($pro_id);
        
        $bathrooms = get_field("bathrooms", $pro_id);
        $bedrooms = get_field("bedrooms", $pro_id);
        $hourly_price = get_field("price", $pro_id);
        $charge_type = get_field("charge_type", $pro_id);
        $site_url = site_url();
        
        $response[] = array(
            'id' => $pro_id,
            'title' => $pro_title,
            'content' => $pro_content,
            'image' => $pro_gallery_img,
            'bathrooms' => $bathrooms,
            'bedrooms' => $bedrooms,
            'hourly_price' => '$'.$hourly_price,
            'charge_type' => $charge_type,
            'permalink' => $pro_permalink,
            'site_url' => $site_url,
            // 'current_amenity' => $amenity_slug,
            // 'current_amenity_count' => $amenity_count
        );
    }
    // $response['current_amenity'] = $amenity_slug;
    // $response['current_amenity_count'] = $amenity_count;
    }
    else {
        $response['no_data'] = 'no_data';
    }

    // Return JSON response
    wp_send_json($response);

    // Always exit to avoid further execution
    wp_die();
}



// get property count
add_action('wp_ajax_property_filter', 'property_filter_ajax_handler');
add_action('wp_ajax_nopriv_property_filter', 'property_filter_ajax_handler');

function property_filter_ajax_handler() {
    // Retrieve form data
    $data = array();
    parse_str($_POST['formData'], $data);
    
    $property_type = isset($data['property_type']) ? sanitize_text_field($data['property_type']) : '';
    $start_price = (int) ($data['start_price'] ?? 0);
    $ending_price = (int) ($data['ending_price'] ?? 1000);
    $must_have = (array) ($data['must_have'] ?? []);
    $no_preferences_cancelation = sanitize_text_field($data['no_preferences_cancelation'] ?? '');
    $no_preferences_privacy = sanitize_text_field($data['no_preferences_privacy'] ?? '');
    $amenities = (array) ($data['amenities'] ?? []);

    
    /*
    $property_type = isset($_POST['property_type']) ? sanitize_text_field($_POST['property_type']) : '';
    $start_price = isset($_POST['start_price']) ? intval($_POST['start_price']) : 0;
    $ending_price = isset($_POST['ending_price']) ? intval($_POST['ending_price']) : 1000;
    $must_have = isset($_POST['must_have']) ? $_POST['must_have'] : array();
    $no_preferences_cancelation = isset($_POST['no_preferences_cancelation']) ? sanitize_text_field($_POST['no_preferences_cancelation']) : '';
    $no_preferences_privacy = isset($_POST['no_preferences_privacy']) ? sanitize_text_field($_POST['no_preferences_privacy']) : '';
    $amenities = isset($_POST['amenities']) ? $_POST['amenities'] : array();
    

    // Construct WP_Query arguments
    $args = array(
        'post_type' => 'property',
        'posts_per_page' => -1,
        
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'price',
                'value' => array($start_price, $ending_price),
                'type' => 'NUMERIC',
                'compare' => 'BETWEEN',
            ),
            array(
                'key' => 'cancellation_policy',
                'value' => $no_preferences_cancelation,
                'compare' => '=',
            ),
            array(
                'key' => 'privacy',
                'value' => $no_preferences_privacy,
                'compare' => '=',
            ),
        ),
        
    );
    
    */
    
    $args = array(
      'post_type' => 'property',
      'posts_per_page' => -1,
      'meta_query' => array(
        'relation' => 'AND',
      ),
    );
    
    // Add filter clauses conditionally
    if (!empty($start_price) && !empty($ending_price)) {
      $args['meta_query'][] = array(
        'key' => 'price',
        'value' => array($start_price, $ending_price),
        'type' => 'NUMERIC',
        'compare' => 'BETWEEN',
      );
    }
    
    if (!empty($no_preferences_cancelation)) {
      $args['meta_query'][] = array(
        'key' => 'cancellation_policy',
        'value' => $no_preferences_cancelation,
        'compare' => '=',
      );
    }
    
    if (!empty($no_preferences_privacy)) {
      $args['meta_query'][] = array(
        'key' => 'privacy',
        'value' => $no_preferences_privacy,
        'compare' => '=',
      );
    }

    // If property type is specified, add it to the query
    if (!empty($property_type)) {
        $args['tax_query'][] = array(
                'taxonomy' => 'property-type',
                'field' => 'slug',
                'terms' => $property_type,
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
    // Perform the query
    $property_query = new WP_Query($args);

    // Get count of found posts
    $place_count = $property_query->found_posts;

    // Return the count
    wp_send_json($place_count);

    // Don't forget to exit
    exit();
}


