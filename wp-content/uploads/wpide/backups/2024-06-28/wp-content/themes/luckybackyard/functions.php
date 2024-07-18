<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

require_once(get_stylesheet_directory() . '/inc/enqueue_files.php');
require_once(get_stylesheet_directory() . '/inc/post_action.php');
require_once(get_stylesheet_directory() . '/inc/users_functions.php');
require_once(get_stylesheet_directory() . '/inc/property_action.php');
include_once('ab_complycube_function.php');


function register_footer_menu() {
  register_nav_menu('footer-menu',__( 'footer Menu' ));
  register_nav_menu('footer-bottom-menu',__( 'footer bottom Menu' ));
}
add_action( 'init', 'register_footer_menu' );

function add_class_on_a_tag($classes, $item, $args)
{	
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
return $classes;
}
add_filter('nav_menu_link_attributes', 'add_class_on_a_tag', 1, 3);

// SMTP Setting
add_action( 'phpmailer_init', 'my_smtp_phpemailer' );
function my_smtp_phpemailer( $phpmailer ) {
	$phpmailer->isSMTP();
	$phpmailer->Host       = SMTP_HOST;
	$phpmailer->SMTPAuth   = SMTP_AUTH;
	$phpmailer->Port       = SMTP_PORT;
	$phpmailer->Username   = SMTP_USER;
	$phpmailer->Password   = SMTP_PASS;
	$phpmailer->SMTPSecure = SMTP_SECURE;
	$phpmailer->From       = SMTP_FROM;
	$phpmailer->FromName   = SMTP_NAME;
}
// SMTP Setting

// error_reporting(E_ALL);
// ini_set('display_errors', 1);


require_once(get_stylesheet_directory() . '/vendor/autoload.php');
require_once(get_stylesheet_directory() . '/stripe/secrets.php');

function initialize_stripe_payment() {
    // Retrieve the totalAmount parameter from the $_POST superglobal
    $totalAmount = isset($_POST['totalAmount']) ? $_POST['totalAmount'] : 0;
    
    try {
        // Make sure $stripeSecretKey is defined and contains your actual Stripe secret key
        global $stripeSecretKey;
        // $stripeSecretKey = 'sk_test_4eC39HqLyjWDarjtT1zdp7dc';

        // Create a new instance of StripeClient using the secret key
        $stripe = new \Stripe\StripeClient($stripeSecretKey);

        // Create a PaymentIntent with amount and currency
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $totalAmount * 100,
            'currency' => 'usd',
            // 'automatic_payment_methods' parameter is optional in the latest version of the API
        ]);

        // Return client secret obtained from the Stripe API response
        wp_send_json_success(array('clientSecret' => $paymentIntent->client_secret));

        // Always terminate the script properly after sending the response
        wp_die();

    } catch (\Exception $e) {
        // Handle exceptions by sending a 500 error response along with the error message
        http_response_code(500);
        wp_send_json_error(
            array(
            'message' => 'An error occurred while initializing the payment.',
            'error' => $e->getMessage()
            ));
        }
}

add_action('wp_ajax_initialize_stripe_payment', 'initialize_stripe_payment');
add_action('wp_ajax_nopriv_initialize_stripe_payment', 'initialize_stripe_payment'); // If you want to allow non-logged in users to use this AJAX action

function check_booking_exists($booking_id) {
    $post = get_post($booking_id);
    
    if ($post && $post->post_type === 'booking') {
    return true;
    }
    return false;
}


function create_booking($payment) {
    $post_id = wp_insert_post(array(
        'post_type' => 'booking',
        'post_title' => 'Booking',
        'post_status' => 'publish'
    ));

    if ($post_id) {
        wp_update_post(array(
            'ID' => $post_id,
            'post_title' => $post_id,
            'post_name' => $post_id
        ));
        if (isset($payment)) {
        // Set ACF field values
        // update_field('booking_property', $booking['property_id'], $post_id);
        // update_field('booking_check_in', $booking['start_date'], $post_id);
        // update_field('booking_check_out', $booking['end_date'], $post_id);
        // update_field('booking_guest_children', $booking['childrens'], $post_id);
        // update_field('booking_guest_adults', $booking['adults'], $post_id);
        // update_field('booking_guest_infants', $booking['infants'], $post_id);
        // update_field('booking_guest_pets', $booking['pets'], $post_id);   
        update_field('booking_customer', get_current_user_id(), $post_id);  
        // update_field('booking_status', 'booked', $post_id);  

        // Set payment ACF field values
        update_field('payment_transaction_id', $payment['transaction_id'], $post_id);
        update_field('payment_payment_status', $payment['payment_status'], $post_id);
        update_field('payment_payment_method', $payment['payment_method'], $post_id);
        update_field('payment_payment_method_type', $payment['payment_method_type'], $post_id);
        update_field('payment_amount', $payment['amount'], $post_id);
        update_field('payment_payment_object', json_encode($payment['payment_object']), $post_id);
        }
        // Return the created post ID
        return $post_id;
    } else {
        // Post creation failed
        return false;
    }
}

function booking_handler() {
    try {
    // Handle AJAX request
    $booking = isset($_POST['booking']) ? $_POST['booking'] : false;

    if($booking) {
    $booking['property_id'] = intval($booking['property_id']);
    $booking['adults'] = intval($booking['adults']);
    $booking['childrens'] = intval($booking['childrens']);
    $booking['infants'] = intval($booking['infants']);
    $booking['pets'] = intval($booking['pets']);
    $booking['booking_id'] = intval($booking['booking_id']);
    $booking['message'] = sanitize_text_field($booking['message']);
    
    $charge_type = get_field('charge_type', $booking['property_id']);
    
    if($charge_type === 'hourly') {
    $booking['date'] = date('Ymd', strtotime($booking['date']));
    $booking['start_time'] = convert_minutes_to_time($booking['start_time']);
    $booking['start_time'] = date('g:i a', strtotime($booking['start_time']));
    $booking['end_time'] = convert_minutes_to_time($booking['end_time']);
    $booking['end_time'] = date('g:i a', strtotime($booking['end_time']));
    } else {
    $booking['start_date'] = date('Ymd', strtotime($booking['start_date']));
    $booking['end_date'] = date('Ymd', strtotime($booking['end_date']));
    }

        if(check_booking_exists($booking['booking_id']) === true) {
            // Set ACF field values
    
            if($charge_type=== 'hourly') {
            update_field('booking_date', $booking['date'], $booking['booking_id']);
            update_field('booking_start_time', $booking['start_time'], $booking['booking_id']);
            update_field('booking_end_time', $booking['end_time'], $booking['booking_id']);
            } else {
            update_field('booking_check_in', $booking['start_date'], $booking['booking_id']);
            update_field('booking_check_out', $booking['end_date'], $booking['booking_id']);  
            }
            
            update_field('booking_charge_type', $charge_type, $booking['booking_id']);
            update_field('booking_property', $booking['property_id'], $booking['booking_id']);
            update_field('booking_guest_children', $booking['childrens'], $booking['booking_id']);
            update_field('booking_guest_adults', $booking['adults'], $booking['booking_id']);
            update_field('booking_guest_infants', $booking['infants'], $booking['booking_id']);
            update_field('booking_guest_pets', $booking['pets'], $booking['booking_id']);   
            update_field('booking_status', 'pending', $booking['booking_id']);   
            update_field('booking_message', $booking['message'], $booking['booking_id']);
            
            if($charge_type === 'nightly') {
                // Generate array of dates between check-in and check-out
                $start_date = new DateTime($booking['start_date']);
                $end_date = new DateTime($booking['end_date']);
                // Generate array of dates between check-in and check-out
                $booked_dates = array();
                
                while ($start_date <= $end_date) {
                    $booked_dates[] = $start_date->format('Ymd');
                    $start_date->modify('+1 day');
                }
                
                $existing_dates_json = get_field('booked_dates', $booking['property_id']);
                $existing_dates = json_decode($existing_dates_json, true);
                
                if (!$existing_dates) {
                    $existing_dates = array();
                }
                // Merge new dates with existing dates and remove duplicates
                $merged_dates = array_unique(array_merge($existing_dates, $booked_dates));
                // Save the merged dates as JSON in ACF field
                $merged_dates_json = json_encode($merged_dates);
                update_field('booked_dates', $merged_dates_json, $booking['property_id']);
            } else {
                // Assume $booking contains 'date', 'hours', 'start_time', 'end_time'
                $booking_date = new DateTime($booking['date']);
                $booking_date = $booking_date->format('Ymd'); // Expected format: 'YYYYMMDD'
                $start_time = $booking['start_time'];
                $end_time = $booking['end_time'];
                $hours = calculate_hours($start_time, $end_time);
                
                // Create new hourly booking entry
                $new_hourly_booking = array(
                'start_time' => $start_time,
                'end_time' => $end_time,
                'hours' => $hours
                );
                
                // Get existing hourly bookings
                $existing_hourly_bookings_json = get_field('booked_times', $booking['property_id']);
                $existing_hourly_bookings = json_decode($existing_hourly_bookings_json, true);
                
                if (!$existing_hourly_bookings) {
                    $existing_hourly_bookings = array();
                }
                
                // Add the new hourly booking to the specific date
                if (!isset($existing_hourly_bookings[$booking_date])) {
                $existing_hourly_bookings[$booking_date] = array();
                }
                $existing_hourly_bookings[$booking_date][] = $new_hourly_booking;
                
                // Save the updated hourly bookings as JSON in ACF field
                $updated_hourly_bookings_json = json_encode($existing_hourly_bookings);
                update_field('booked_times', $updated_hourly_bookings_json, $booking['property_id']);
            }
        }
    }

      wp_send_json_success(array('booking' => $booking));
      wp_die();
    } catch(\Exception $e) {
            // Handle exceptions by sending a 500 error response along with the error message
        http_response_code(500);
        wp_send_json_error(
            array(
            'message' => 'An error occurred while creating the booking.',
            'error' => $e->getMessage()
        ));
    }
}

add_action('wp_ajax_booking_handler', 'booking_handler'); // For logged in users

function payment_booking_handler() {
    try {
    $payment = isset($_POST['payment']) ? $_POST['payment'] : false;
    
    if($payment) {
    $booking_id = create_booking($payment);
    }
    
      wp_send_json_success(array('payment' => $payment, 'booking_id' => $booking_id));
      wp_die();
    } catch(\Exception $e) {
        http_response_code(500);
            wp_send_json_error(
            array(
            'message' => 'An error occurred while creating the payment for booking.',
            'error' => $e->getMessage()
        ));
    }
}

add_action('wp_ajax_payment_booking_handler', 'payment_booking_handler'); // For logged in users

function check_property_id_and_redirect() {
    // Check if 'property_id' is set in the URL
    if (isset($_GET['property_id'])) {
        $property_id = intval($_GET['property_id']);

        // Check if a post with 'property_id' exists and is of type 'property'
        $post = get_post($property_id);
        if ($post && $post->post_type === 'property') {
            return $property_id; // Return the valid property ID
        }
    }

    // If 'property_id' is not set or invalid, redirect to home
    wp_redirect(home_url());
    exit;
}

function send_user_email($user_email, $user_message, $subject) {
    // Check nonce for security
    // check_ajax_referer('send_user_email_nonce', 'nonce');

    // Get the email and message from AJAX request
    // $user_email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    // $user_message = isset($_POST['message']) ? sanitize_text_field($_POST['message']) : '';

    if (!is_email($user_email)) {
        wp_send_json_error('Invalid email address');
    }

    $subject = 'Your Subject Here';
    $message = $user_message;

    // Send email using wp_mail
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $mail_sent = wp_mail($user_email, $subject, $message, $headers);

    if ($mail_sent) {
        wp_send_json_success('Email sent successfully');
    } else {
        wp_send_json_error(['message'=>'Failed to send email', 'email'=>$user_email, 'msg'=>$message,'sub'=>$subject]);
    }

    wp_die();
}

function convert_minutes_to_time($minutes) {
    // Calculate hours and minutes
    $hours = floor($minutes / 60);
    $minutes = $minutes % 60;

    // Determine AM or PM suffix
    $suffix = $hours >= 12 ? 'pm' : 'am';
    
    // Convert 24-hour format to 12-hour format
    $hours = $hours % 12;
    $hours = $hours ? $hours : 12; // if $hours is 0, set it to 12
    
    // Format hours and minutes with leading zeros if needed
    $formatted_time = sprintf("%d:%02d %s", $hours, $minutes, $suffix);

    return $formatted_time;
}

function calculate_hours($start_time, $end_time) {
    // Create DateTime objects from the start and end times
    $start = new DateTime($start_time);
    $end = new DateTime($end_time);

    // Calculate the difference between the start and end times
    $interval = $start->diff($end);

    // Get the difference in hours
    $hours = $interval->h;

    // Include minutes in the calculation (if needed, e.g., 1.5 hours for 1 hour 30 minutes)
    $hours += $interval->i / 60;

    return $hours;
}


function create_wishlist_tables() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $wishlist_table = $wpdb->prefix . 'wishlist';
    $category_table = $wpdb->prefix . 'wishlist_categories';

    // SQL to create the wishlist table
    $wishlist_sql = "CREATE TABLE IF NOT EXISTS $wishlist_table (
        id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id BIGINT(20) UNSIGNED NOT NULL,
        property_id BIGINT(20) UNSIGNED NOT NULL,
        category_id BIGINT(20) UNSIGNED NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES {$wpdb->users}(ID),
        FOREIGN KEY (property_id) REFERENCES {$wpdb->posts}(ID),
        FOREIGN KEY (category_id) REFERENCES $category_table(id)
    ) $charset_collate;";

    // SQL to create the categories table
    $category_sql = "CREATE TABLE IF NOT EXISTS $category_table (
        id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        user_id BIGINT(20) UNSIGNED NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES {$wpdb->users}(ID)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($wishlist_sql);
    dbDelta($category_sql);
}

add_action('after_setup_theme', 'create_wishlist_tables');

function add_to_wishlist() {
    if ( !is_user_logged_in() ) {
        wp_send_json_error('logged_off');
    }

    if ( !isset($_POST['property_id']) ) {
        wp_send_json_error('invalid');
    }
    
    if( !isset($_POST['category_id']) || empty($_POST['category_id'])) {
        wp_send_json_error('category_invalid');
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'wishlist';

    $user_id = get_current_user_id();
    $property_id = intval($_POST['property_id']);
    $category_id = intval($_POST['category_id']);

    $wpdb->insert(
        $table_name,
        array(
            'user_id' => $user_id,
            'property_id' => $property_id,
            'category_id' => $category_id
        ),
        array(
            '%d',
            '%d',
            '%d'
        )
    );

    wp_send_json_success('added');
}

add_action('wp_ajax_add_to_wishlist', 'add_to_wishlist');
add_action('wp_ajax_nopriv_add_to_wishlist', 'add_to_wishlist');

function remove_from_wishlist() {
    if ( !is_user_logged_in() ) {
        wp_send_json_error('logged_off');
    }

    if ( !isset($_POST['property_id']) ) {
        wp_send_json_error('invalid');
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'wishlist';

    $user_id = get_current_user_id();
    $property_id = intval($_POST['property_id']);

    $wpdb->delete(
        $table_name,
        array(
            'user_id' => $user_id,
            'property_id' => $property_id
        ),
        array(
            '%d',
            '%d'
        )
    );

    wp_send_json_success('removed');
}

add_action('wp_ajax_remove_from_wishlist', 'remove_from_wishlist');
add_action('wp_ajax_nopriv_remove_from_wishlist', 'remove_from_wishlist');

function delete_wishlist_tables() {
    global $wpdb;

    // Table names
    $wishlist_table = $wpdb->prefix . 'wishlist';
    $category_table = $wpdb->prefix . 'wishlist_categories';

    // SQL queries to drop the tables
    $wishlist_sql = "DROP TABLE IF EXISTS $wishlist_table;";
    $category_sql = "DROP TABLE IF EXISTS $category_table;";

    // Execute the queries
    $wpdb->query($wishlist_sql);
}

function add_wishlist_category() {
    if ( !is_user_logged_in() ) {
        wp_send_json_error('logged_off');
    }

    $category_name = sanitize_text_field($_POST['category_name']);
    $user_id = get_current_user_id();

    if (empty($category_name)) {
        wp_send_json_error('empty');
    }

    global $wpdb;
    $category_table = $wpdb->prefix . 'wishlist_categories';

    $wpdb->insert($category_table, [
        'name' => $category_name,
        'user_id' => $user_id,
    ]);

    if ($wpdb->insert_id) {
        wp_send_json_success('added');
    } else {
        wp_send_json_error('failed');
    }
}

add_action('wp_ajax_add_wishlist_category', 'add_wishlist_category');
add_action('wp_ajax_nopriv_add_wishlist_category', 'add_wishlist_category');

// Function to get categories for the logged-in user
function get_user_wishlist_categories() {
    if (!is_user_logged_in()) {
        return "logged_off";
    }

    $user_id = get_current_user_id();
    global $wpdb;
    $table_name = $wpdb->prefix . 'wishlist_categories';

    // Get categories for the user
    $categories = $wpdb->get_results($wpdb->prepare(
        "SELECT id, name FROM $table_name WHERE user_id = %d",
        $user_id
    ));

    return $categories;
}

// Function to handle AJAX request for getting categories
function ajax_get_user_wishlist_categories() {
    $categories = get_user_wishlist_categories();
    wp_send_json_success($categories);
}
add_action('wp_ajax_get_user_wishlist_categories', 'ajax_get_user_wishlist_categories');
add_action('wp_ajax_nopriv_get_user_wishlist_categories', 'ajax_get_user_wishlist_categories');


function get_wishlist_categories_with_images() {
    if (!is_user_logged_in()) {
        return 'logged_off';
    }

    $user_id = get_current_user_id();
    global $wpdb;
    $category_table = $wpdb->prefix . 'wishlist_categories';
    $wishlist_table = $wpdb->prefix . 'wishlist';

    // Get categories for the user
    $categories = $wpdb->get_results($wpdb->prepare(
        "SELECT id, name FROM $category_table WHERE user_id = %d",
        $user_id
    ));

    $default_image = get_stylesheet_directory_uri() . '/assets/images/default-image.png';

    // Fetch the latest property image for each category
    foreach ($categories as $category) {
        $property = $wpdb->get_row($wpdb->prepare(
            "SELECT property_id FROM $wishlist_table WHERE category_id = %d ORDER BY id DESC LIMIT 1",
            $category->id
        ));

        if ($property) {
            $gallery = get_field('property_gallery', $property->property_id);

            if ($gallery) {
                $found_image = false;
                foreach ($gallery as $image) {
                    if (!empty($image['url'])) {
                        $category->image_url = $image['url'];
                        $found_image = true;
                        break;
                    }
                }
                if (!$found_image) {
                    $category->image_url = $default_image;
                }
            } else {
                $category->image_url = $default_image;
            }
        } else {
            $category->image_url = $default_image;
        }
    }

    return $categories;
}

// AJAX handler function for renaming category name
function rename_wishlist_category() {
    // Get the category ID and new name from AJAX request
    $category_id = intval($_POST['category_id']);
    $new_name = sanitize_text_field($_POST['new_name']);

    // Update the category name in the database
    global $wpdb;
    $table_name = $wpdb->prefix . 'wishlist_categories';
    $result = $wpdb->update(
        $table_name,
        array('name' => $new_name),
        array('id' => $category_id),
        array('%s'),
        array('%d')
    );

    // Return success or failure message
    if ($result !== false) {
        echo 'success';
    } else {
        echo 'error';
    }
    wp_die(); // Always include this to terminate script properly
}

add_action('wp_ajax_rename_wishlist_category', 'rename_wishlist_category');

function delete_wishlist_category() {

    // Get the category ID from the AJAX request
    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

    if ($category_id > 0) {
        global $wpdb;

        // Delete properties associated with the category
        $wishlist_table = $wpdb->prefix . 'wishlist';
        $wpdb->delete($wishlist_table, array('category_id' => $category_id));

        // Delete the category itself
        $wishlist_categories_table = $wpdb->prefix . 'wishlist_categories';
        $wpdb->delete($wishlist_categories_table, array('id' => $category_id));

        wp_send_json_success('Category and associated properties deleted successfully.');
    } else {
        wp_send_json_error('Invalid category ID.');
    }
}

add_action('wp_ajax_delete_wishlist_category', 'delete_wishlist_category');

function get_property_details() {
    $property_id = isset($_POST['property_id']) ? intval($_POST['property_id']) : 0;

    if ($property_id) {
        // Fetch the property details
        $property = get_post($property_id);

        if ($property && $property->post_type === 'property') {
            $response = array(
                'title'       => get_the_title($property),
                'url'         => get_permalink($property),
            );

            // Fetch the property gallery
            $gallery = get_field('property_gallery', $property_id);
            if ($gallery && is_array($gallery)) {
                $response['gallery'] = $gallery;

                // Get the first image URL
                $first_image_url = $gallery[0]['url'];
                if ($first_image_url) {
                    $response['first_image_url'] = $first_image_url;
                } else {
                    $response['first_image_url'] = null;
                }
            } else {
                $response['gallery'] = [];
                $response['first_image_url'] = null;
            }

            wp_send_json_success($response);
        } else {
            wp_send_json_error(array('message' => 'Property not found'));
        }
    } else {
        wp_send_json_error(array('message' => 'Invalid property ID'));
    }
}

// Hook the function to WordPress AJAX actions
add_action('wp_ajax_get_property_details', 'get_property_details');
add_action('wp_ajax_nopriv_get_property_details', 'get_property_details');
