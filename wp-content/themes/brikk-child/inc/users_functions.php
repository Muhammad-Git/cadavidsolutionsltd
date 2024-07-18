<?php

// user registration

// Add custom action for user registration
add_action( 'wp_ajax_custom_register_user', 'custom_register_user' );
add_action( 'wp_ajax_nopriv_custom_register_user', 'custom_register_user' );

function custom_register_user() {
    $first_name = sanitize_text_field( $_POST['first_name'] );
    $last_name = sanitize_text_field( $_POST['last_name'] );
    $email = sanitize_email( $_POST['email'] );
    $phone = sanitize_text_field( $_POST['phone'] );

    $password = wp_generate_password( 12, false );

    $user_id = wp_create_user( $email, $password, $email );

    wp_update_user( array( 'ID' => $user_id, 'first_name' => $first_name, 'last_name' => $last_name ) );

    update_field('mobile_phone', $phone, 'user_' . $user_id);

    $subject = 'Your account has been created';

    $message = '<html><body>';
    $message .= '<table width="100%" style="max-width: 600px; margin: 0 auto; padding: 20px; border-collapse: collapse; font-family: Arial, sans-serif;">';
    $message .= '<tr><td style="background-color: #f8f9fa; text-align: center; padding: 20px;"><h2 style="color: #333;">Welcome to ' . get_bloginfo( 'name' ) . '</h2></td></tr>';
    $message .= '<tr><td style="background-color: #ffffff; padding: 20px;">';
    $message .= '<p>Hello ' . $first_name . ',</p>';
    $message .= '<p>Your account on ' . get_bloginfo( 'name' ) . ' has been created.</p>';
    $message .= '<p>Your password: <strong>' . $password . '</strong></p>';
    $message .= '<p>You can log in <a href="' . wp_login_url() . '">here</a>.</p>';
    $message .= '</td></tr>';
    $message .= '</table>';
    $message .= '</body></html>';
    
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    wp_mail( $email, $subject, $message, $headers );

    wp_send_json_success('Your account has been created successfully. Please check your email for further instructions.');
    wp_die();
    // Redirect the user after registration
    // wp_redirect( home_url() );
    // exit;
}

// user registration

// send link to email
add_action('wp_ajax_forgot_password', 'forgot_password_ajax_handler');
add_action('wp_ajax_nopriv_forgot_password', 'forgot_password_ajax_handler');

function forgot_password_ajax_handler() {
    if (isset($_POST['user_email'])) {
        $user_email = sanitize_email($_POST['user_email']);

        $user = get_user_by('email', $user_email);

        if ($user) {
            $key = wp_generate_password(20, false);

            update_user_meta($user->ID, 'password_reset_key', $key);

            $reset_password_page_url = home_url('/reset-password');
            
            $reset_link = esc_url_raw(add_query_arg(
                array(
                    'user_email' => $user_email,
                    'key' => $key
                ),
                $reset_password_page_url
            ));


            $subject = 'Password Reset';
            $message = 'Click the following link to reset your password: ' . $reset_link;
            $sent = wp_mail($user_email, $subject, $message);

            if ($sent) {
                echo 'Reset link sent to your email.';
            } else {
                echo 'Failed to send reset link.';
            }
        } else {
            echo 'Email address not found.';
        }
    }

    wp_die();
}


// send link to email
// reset password

add_action('wp_ajax_reset_password', 'reset_password_ajax_handler');
add_action('wp_ajax_nopriv_reset_password', 'reset_password_ajax_handler');

function reset_password_ajax_handler() {
    if (isset($_POST['user_email'], $_POST['key'], $_POST['new_password'], $_POST['confirm_password'])) {
        if ($_POST['new_password'] === $_POST['confirm_password']) {
            $user_email = $_POST['user_email'];
            $key = $_POST['key'];

            $user = get_user_by('email', $user_email);
            $user_id = $user->ID;
            $meta_value = get_user_meta( $user_id, 'password_reset_key', true );
            
            if($meta_value == $key){

                reset_password($user, $_POST['new_password']);
                delete_user_meta($user_id,'password_reset_key');

                 echo json_encode(array('status' => 'success', 'msg' => 'Password reset successfully.'));
            } else {
                 echo json_encode(array('status' => 'error', 'msg' => 'Invalid reset key or email.'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'msg' => 'New password and confirm password do not match.'));
        }
    }

    wp_die();
}

// reset password


add_action('after_setup_theme', 'hide_admin_bar_for_non_admin');

function hide_admin_bar_for_non_admin() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

add_action('admin_init', 'restrict_dashboard_access');

function restrict_dashboard_access() {
    if (!current_user_can('administrator') && !defined('DOING_AJAX')) {
        wp_redirect(home_url());
        exit();
    }
}


add_filter('acf/load_field/name=country', 'my_country_select');
function my_country_select($field) {
  $field['choices'] = array(
        "AF" => "Afghanistan",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Australia",
        "AT" => "Austria",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Belgium",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Bouvet Island",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory",
        "BN" => "Brunei Darussalam",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Cambodia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Cayman Islands",
        "CF" => "Central African Republic",
        "TD" => "Chad",
        "CL" => "Chile",
        "CN" => "China",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Congo",
        "CD" => "Congo, the Democratic Republic of the",
        "CK" => "Cook Islands",
        "CR" => "Costa Rica",
        "CI" => "Cote D'Ivoire",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CY" => "Cyprus",
        "CZ" => "Czech Republic",
        "DK" => "Denmark",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Dominican Republic",
        "EC" => "Ecuador",
        "EG" => "Egypt",
        "SV" => "El Salvador",
        "GQ" => "Equatorial Guinea",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Falkland Islands (Malvinas)",
        "FO" => "Faroe Islands",
        "FJ" => "Fiji",
        "FI" => "Finland",
        "FR" => "France",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Germany",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Greece",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GN" => "Guinea",
        "GW" => "Guinea-Bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and Mcdonald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hong Kong",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "India",
        "ID" => "Indonesia",
        "IR" => "Iran, Islamic Republic of",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Japan",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Korea, Democratic People's Republic of",
        "KR" => "Korea, Republic of",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Lao People's Democratic Republic",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macao",
        "MK" => "Macedonia, the Former Yugoslav Republic of",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia, Federated States of",
        "MD" => "Moldova, Republic of",
        "MC" => "Monaco",
        "MN" => "Mongolia",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Norway",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territory, Occupied",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Poland",
        "PT" => "Portugal",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Russian Federation",
        "RW" => "Rwanda",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and the Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "CS" => "Serbia and Montenegro",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and the South Sandwich Islands",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Sweden",
        "CH" => "Switzerland",
        "SY" => "Syrian Arab Republic",
        "TW" => "Taiwan, Province of China",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania, United Republic of",
        "TH" => "Thailand",
        "TL" => "Timor-Leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Turkey",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "United Kingdom",
        "US" => "United States",
        "UM" => "United States Minor Outlying Islands",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Viet Nam",
        "VG" => "Virgin Islands, British",
        "VI" => "Virgin Islands, U.s.",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe"
        );
  return $field;
}


function handle_delete_account_ajax() {
    check_ajax_referer('delete_account_nonce', 'nonce');

    $user_id = get_current_user_id();
    // update_user_meta($user_id, 'deleted_account', true);
    update_field('deleted_account', true, 'user_' . $user_id);
    
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $format = isset($_POST['sl-format']) ? $_POST['sl-format'] : '';
    $reason = isset($_POST['why-are']) ? $_POST['why-are'] : '';

    // Send email notification to admin
    $user_data = get_userdata($user_id);
    // $admin_email = get_option('admin_email');
    $admin_email = 'm.waqas.ansari09@gmail.com';
    $subject = 'Account Deletion Request';
    $message = 'An account deletion request has been submitted by: ' . $user_data->user_email;
    $message .= "\n\nRequested form fields:";
    $message .= "\nCountry: " . $country;
    $message .= "\nState: " . $state;
    $message .= "\nFormat: " . $format;
    $message .= "\nReason: " . $reason;
    wp_mail($admin_email, $subject, $message);

    // Send a response
    // echo json_encode(array('status' => 'success', 'msg' => 'Password reset successfully.'));
    wp_send_json_success('Account deletion request submitted successfully.');
}
add_action('wp_ajax_handle_delete_account_ajax', 'handle_delete_account_ajax');

