<?php

if ( ! defined('ABSPATH') ) {
	exit;
}

/*
 * human readable dump
 *
 */
if( ! function_exists('dd') ) {
    function dd( $what = '' ) {
        print '<pre class="dump">';
        print_r( $what );
        print '</pre>';
    }
}


/**
 * Add "Print receipt" link to Order Received page and View Order page
 */
if( ! function_exists('isa_woo_thankyou') ) {
/**
 * Add "Print receipt" link to Order Received page and View Order page
 */
function isa_woo_thankyou() {
    echo '<a href="javascript:window.print()" id="wc-print-button">Print receipt</a>';
}
add_action( 'woocommerce_thankyou', 'isa_woo_thankyou', 1);
add_action( 'woocommerce_view_order', 'isa_woo_thankyou', 8 );

}
/* Print Button Code End */

/*
 * shim for wp_body_open,
 * ensuring backward compatibility with versions of WordPress older than 5.2.
 *
 */
if( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/*
 * define contstants
 *
 */
define( 'BK_VERSION', '1.7.0.4' );
define( 'BK_PATH', wp_normalize_path( get_template_directory() . DIRECTORY_SEPARATOR ) );
define( 'BK_URI', get_template_directory_uri() . '/' );



/*
* Show phone number field in edit account section if phone number enable 
*
*/
$enable_signup_phone = get_option('rz_enable_signup_phone');
if( $enable_signup_phone ): 
// Display the mobile phone field
// add_action( 'woocommerce_edit_account_form_start', 'add_billing_phone_to_edit_account_form' ); // At start
add_action( 'woocommerce_edit_account_form', 'add_billing_phone_to_edit_account_form' ); // After existing fields
function add_billing_phone_to_edit_account_form() {
   $user = wp_get_current_user();
   ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
       <label for="billing_phone"><?php _e( 'Mobile phone', 'woocommerce' ); ?> <span class="required">*</span></label>
       <input type="text" class="woocommerce-Input woocommerce-Input--phone input-text" name="billing_phone" id="billing_phone" value="<?php echo esc_attr( $user->billing_phone ); ?>" />
   </p>
   <?php
}

// Check and validate the mobile phone
add_action( 'woocommerce_save_account_details_errors','billing_phone_field_validation', 20, 1 );
function billing_phone_field_validation( $args ){
   if ( isset($_POST['billing_phone']) && empty($_POST['billing_phone']) )
       $args->add( 'error', __( 'Please fill in your Mobile phone', 'woocommerce' ),'');
}
// Save the mobile phone value to user data
add_action( 'woocommerce_save_account_details', 'my_account_saving_billing_phone', 20, 1 );
function my_account_saving_billing_phone( $user_id ) {
   if( isset($_POST['billing_phone']) && ! empty($_POST['billing_phone']) )
       update_user_meta( $user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']) );
}
endif;




/*
 * autoload
 *
 */
spl_autoload_register( function( $class_name ) {
    if ( strpos( $class_name, 'Brikk' ) === false ) { return; } // check namespace

    $file_parts = explode( '\\', $class_name ); // Split the class name into an array to read the namespace and class.

    $namespace = ''; // Do a reverse loop through $file_parts to build the path to the file.
    for( $i = count( $file_parts ) - 1; $i > 0; $i-- ) {

        $current = strtolower( $file_parts[ $i ] ); // Read the current component of the file part.
        $current = str_ireplace( '_', '-', $current );

        if( count( $file_parts ) - 1 === $i ) { // If we're at the first entry, then we're at the filename.
            $file_name = "{$current}.php";
        }else{
            $namespace = '/' . $current . $namespace;
        }
    }

    $filepath  = trailingslashit( dirname( dirname( __FILE__ ) ) . $namespace ); // Now build a path to the file using mapping to the file location.
    $filepath .= $file_name;

    if( file_exists( $filepath ) ) { // If the file exists in the specified path, then include it.
        include_once( $filepath );
    }else{
        wp_die( esc_html("The file attempting to be loaded at {$filepath} does not exist.") );
    }

});

include BK_PATH . 'includes/utils/utils.php';

/* Delete post with all files attached to it */
add_action( 'before_delete_post', 'rz_remove_attachment_with_post', 10 );
function rz_remove_attachment_with_post( $post_id ){

    /** @var WP_Post[] $images */
    $listing_img = get_attached_media( 'image', $post_id );

    foreach ( $listing_img as $image ) {
        wp_delete_attachment( $image->ID, true );
    }
}


function rz_custom_jquery() {
    wp_register_script( 'jquery_script', get_template_directory_uri() . '/assets/dist/js/jquery.ui.touch.js', array( 'jquery' ) );
    wp_enqueue_script( 'jquery_script' );
}
add_action( 'wp_footer', 'rz_custom_jquery' ); // end jQuery


add_filter( 'woocommerce_order_item_display_meta_value', 'change_order_item_meta_value', 20, 3 );

 

/**
* Changing a meta value
* @param  string        $value  The meta value
* @param  WC_Meta_Data  $meta   The meta object
* @param  WC_Order_Item $item   The order item object
* @return string        The title
*/
function change_order_item_meta_value( $value, $meta, $item ) {

    // By using $meta-key we are sure we have the correct one.
    if ( '_checkin' === $meta->key ) { $value = date_i18n( wc_date_format(), json_decode( $meta->value ) ); }
    if ( '_checkout' === $meta->key ) { $value = date_i18n( wc_date_format(), json_decode( $meta->value ) ); }

    return $value;
}


/*  Mendatory plugin  */


require_once get_template_directory() . '/includes/lib/tgm-plugin-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'your_theme_register_required_plugins' );
function your_theme_register_required_plugins() {
    $plugins = array(
        array(
            'name'      => 'Utillz Login',
            'slug'      => 'utillz-login',
            'source'    => get_template_directory() . '/includes/plugins/utillz-login.zip',
            'required'  => true,
            'version'   => '1.0',
            'force_activation' => false,
        )
    );

    $config = array(
        'id'           => 'utillz-login',
        'default_path' => '',
        'menu'         => 'utillz-login',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa( $plugins, $config );
}

/*  Hide utillz login  

add_action( 'admin_init', function () {

remove_menu_page( 'utillz-ul-general-options' );

});

*/

Brikk\Includes\Init::instance();
