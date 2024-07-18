<?php

/* Template Name: Account Template */


if (!is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}
get_header();

// password update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_new_password'])) {
    
    if (isset($_POST["current_password"], $_POST["new_password"], $_POST["confirm_password"])) {
        $current_password = sanitize_text_field($_POST["current_password"]);
        $new_password = sanitize_text_field($_POST["new_password"]);
        $confirm_password = sanitize_text_field($_POST["confirm_password"]);
        
        if ($new_password === $confirm_password) {
            $user = wp_get_current_user();
            $user_id = $user->ID;
            
            if (wp_check_password($current_password, wp_get_current_user()->user_pass, $user_id)) {
                wp_set_password($new_password, $user_id);
                wp_set_current_user($user_id);
                wp_set_auth_cookie($user_id);
                do_action( 'wp_login', $user->user_login, $user );
                $msg = '<div class="alert alert-success mt-3 text-center"  role="alert">Password updated successfully!</div>';
            } else {
                $msg = '<div class="alert alert-danger mt-3 text-center"  role="alert">Current password is incorrect!</div>';
            }
        } else {
            $msg = '<div class="alert alert-danger mt-3 text-center"  role="alert">New password and confirm password do not match!</div>';
        }
    } else {
        $msg = '<div class="alert alert-danger mt-3 text-center"  role="alert">All fields are required!</div>';
    }
}
// password update


// contact info
$user_id = get_current_user_id();
$user_data = get_userdata($user_id);
$user_meta = get_user_meta( $user_id );

$first_name = isset($user_meta['first_name'][0]) ? $user_meta['first_name'][0] : '';
$last_name = isset($user_meta['last_name'][0]) ? $user_meta['last_name'][0] : '';
$email = isset($user_data->data->user_email) ? $user_data->data->user_email : '';

$date_of_birth = get_field('date_of_birth', 'user_' . $user_id);
$mobile_phone = get_field('mobile_phone', 'user_' . $user_id);
$gender = get_field('gender', 'user_' . $user_id);
$street = get_field('street', 'user_' . $user_id);
$city = get_field('city', 'user_' . $user_id);
$country = get_field('country', 'user_' . $user_id);
$state = get_field('state', 'user_' . $user_id);
$zip_code = get_field('zip_code', 'user_' . $user_id);
$emergency_contact_name = get_field('emergency_contact_name', 'user_' . $user_id);
$emergency_contact_relationship = get_field('emergency_contact_relationship', 'user_' . $user_id);
$emergency_contact_phone = get_field('emergency_contact_phone', 'user_' . $user_id);


if (isset($_POST['save_contact_info'])) {

    update_user_meta($user_id, 'first_name', $_POST['first_name']);
    update_user_meta($user_id, 'last_name', $_POST['last_name']);
    update_user_meta($user_id, 'email', $_POST['email']);

    update_field('date_of_birth', $_POST['date_of_birth'], 'user_' . $user_id);
    update_field('mobile_phone', $_POST['mobile_phone'], 'user_' . $user_id);
    update_field('gender', $_POST['gender'], 'user_' . $user_id);
    update_field('street', $_POST['street'], 'user_' . $user_id);
    update_field('city', $_POST['city'], 'user_' . $user_id);
    update_field('country', $_POST['country'], 'user_' . $user_id);
    update_field('state', $_POST['state'], 'user_' . $user_id);
    update_field('zip_code', $_POST['zip_code'], 'user_' . $user_id);
    update_field('emergency_contact_name', $_POST['emergency_contact_name'], 'user_' . $user_id);
    update_field('emergency_contact_relationship', $_POST['emergency_contact_relationship'], 'user_' . $user_id);
    update_field('emergency_contact_phone', $_POST['emergency_contact_phone'], 'user_' . $user_id);
    update_field('profile_complete', $_POST['profile_complete'], 'user_' . $user_id);
    
    $update_data = '<div class="alert alert-success mt-3 text-center"  role="alert">Contact info updated successfully!</div>';
    // wp_redirect(home_url('/my-account') . $update_data_msg);
    // exit;
}
// contact info

?>

<style>
    footer {
        display: none;
    }
</style>

<section class="account-sec-01">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="text">
                    <h3>Account</h3>
                </div>
            </div>
            <div class="col-md-5">
                <?php
                if(isset($update_data)){
                    echo $update_data;
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Login & Security</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Contact Info</button>
                        <button class="nav-link" id="nav-contact-tab1" data-bs-toggle="tab" data-bs-target="#nav-contact1" type="button" role="tab" aria-controls="nav-contact1" aria-selected="false">Payment</button>
                        <button class="nav-link" id="nav-contact-tab2" data-bs-toggle="tab" data-bs-target="#nav-contact2" type="button" role="tab" aria-controls="nav-contact2" aria-selected="false">Taxes</button>
                        <button class="nav-link" id="nav-contact-tab3" data-bs-toggle="tab" data-bs-target="#nav-contact3" type="button" role="tab" aria-controls="nav-contact3" aria-selected="false">Notifications</button>
                        <button class="nav-link" id="nav-contact-tab4" data-bs-toggle="tab" data-bs-target="#nav-contact4" type="button" role="tab" aria-controls="nav-contact4" aria-selected="false">Privacy</button>
                        <button class="nav-link" id="nav-contact-tab5" data-bs-toggle="tab" data-bs-target="#nav-contact5" type="button" role="tab" aria-controls="nav-contact5" aria-selected="false">Global Preferences</button>
                        <button class="nav-link" id="nav-contact-tab6" data-bs-toggle="tab" data-bs-target="#nav-contact6" type="button" role="tab" aria-controls="nav-contact6" aria-selected="false">Travel for Work</button>
                        <button class="nav-link" id="nav-contact-tab7" data-bs-toggle="tab" data-bs-target="#nav-contact7" type="button" role="tab" aria-controls="nav-contact7" aria-selected="false">Professional Hosting Tools</button>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="main-heading">
                            <h2>Login & Security</h2>
                        </div>
                        <div class="parent-box ">
                            <h6>Password</h6>
                            <form method="post">
                                <label for="current_password">Current Password</label>
                                <input type="password" id="current_password" name="current_password" required>
                                
                                <label for="new_password">New Password</label>
                                <input type="password" id="new_password" name="new_password" required>
                                
                                <label for="confirm_password">Confirm New Password</label>
                                <input type="password" id="confirm_password" name="confirm_password" required>
                                
                                <button type="submit" name="save_new_password">Save New Password</button>
                            </form>
                            <?php
                            if(isset($msg)){
                                echo $msg;
                            }
                            ?>
                            <!--
                            <form>
                                <label>Password</label>
                                <input type="text" required>
                                <span>Need a new password?</span>
                                <label>Current Password</label>
                                <input type="text" required>
                                <label>New Password</label>
                                <input type="text" required>
                                <label>Confirm New Password</label>
                                <input type="text" required>
                                <button>Save New Password</button>
                            </form>-->
                        </div>
                        <div class="parent-box">
                            <h6>Social Accounts</h6>
                            <div class="facebook-and-google-img">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/facebook-and-google-img.png" alt="">
                            </div>
                        </div>
                        <div class="parent-box">
                            <h6>Device History</h6>
                            <div class="device-box">
                                <div class="img-box">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="40" height="40" rx="20" fill="#484848" fill-opacity="0.05" />
                                        <path d="M12.9231 25.4863V24.4863H27.0769V25.4863H12.9231ZM14.8718 23.8196C14.5351 23.8196 14.25 23.7029 14.0167 23.4696C13.7833 23.2363 13.6667 22.9512 13.6667 22.6145L13.6667 15.6914C13.6667 15.3547 13.7833 15.0697 14.0167 14.8363C14.25 14.603 14.5351 14.4863 14.8718 14.4863L25.1282 14.4863C25.4649 14.4863 25.75 14.603 25.9833 14.8363C26.2166 15.0697 26.3333 15.3547 26.3333 15.6914V22.6145C26.3333 22.9512 26.2166 23.2363 25.9833 23.4696C25.75 23.7029 25.4649 23.8196 25.1282 23.8196H14.8718ZM14.8718 22.8196H25.1282C25.1795 22.8196 25.2265 22.7983 25.2692 22.7555C25.312 22.7128 25.3333 22.6658 25.3333 22.6145V15.6914C25.3333 15.6402 25.312 15.5931 25.2692 15.5504C25.2265 15.5077 25.1795 15.4863 25.1282 15.4863L14.8718 15.4863C14.8205 15.4863 14.7735 15.5077 14.7308 15.5504C14.688 15.5931 14.6667 15.6402 14.6667 15.6914L14.6667 22.6145C14.6667 22.6658 14.688 22.7128 14.7308 22.7555C14.7735 22.7983 14.8205 22.8196 14.8718 22.8196Z" fill="#484848" />
                                    </svg>
                                    <div class="content">
                                        <h6>Windows</h6>
                                        <p>Queensland, Australia - 10 min ago</p>
                                    </div>
                                </div>
                                <div class="current-device">
                                    <h5>Current Device</h5>
                                </div>
                                <div class="log-out-device">
                                    <a href="#"><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.53912 12.1673C1.20236 12.1673 0.917318 12.0506 0.683984 11.8173C0.450651 11.584 0.333984 11.2989 0.333984 10.9622V2.03912C0.333984 1.70236 0.450651 1.41732 0.683984 1.18398C0.917318 0.950651 1.20236 0.833984 1.53912 0.833984H6.00705V1.83397H1.53912C1.48783 1.83397 1.44081 1.85533 1.39807 1.89807C1.35533 1.94081 1.33397 1.98783 1.33397 2.03912V10.9622C1.33397 11.0134 1.35533 11.0605 1.39807 11.1032C1.44081 11.1459 1.48783 11.1673 1.53912 11.1673H6.00705V12.1673H1.53912ZM8.82115 9.34675L8.12887 8.6237L9.75194 7.00062H4.06473V6.00065H9.75194L8.12887 4.37757L8.82115 3.65452L11.6673 6.50064L8.82115 9.34675Z" fill="#484848" />
                                        </svg>
                                        Log Out Device
                                    </a>
                                </div>
                            </div>
                            <div class="device-box">
                                <div class="img-box">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="40" height="40" rx="20" fill="#484848" fill-opacity="0.05" />
                                        <path d="M12.9231 25.4863V24.4863H27.0769V25.4863H12.9231ZM14.8718 23.8196C14.5351 23.8196 14.25 23.7029 14.0167 23.4696C13.7833 23.2363 13.6667 22.9512 13.6667 22.6145L13.6667 15.6914C13.6667 15.3547 13.7833 15.0697 14.0167 14.8363C14.25 14.603 14.5351 14.4863 14.8718 14.4863L25.1282 14.4863C25.4649 14.4863 25.75 14.603 25.9833 14.8363C26.2166 15.0697 26.3333 15.3547 26.3333 15.6914V22.6145C26.3333 22.9512 26.2166 23.2363 25.9833 23.4696C25.75 23.7029 25.4649 23.8196 25.1282 23.8196H14.8718ZM14.8718 22.8196H25.1282C25.1795 22.8196 25.2265 22.7983 25.2692 22.7555C25.312 22.7128 25.3333 22.6658 25.3333 22.6145V15.6914C25.3333 15.6402 25.312 15.5931 25.2692 15.5504C25.2265 15.5077 25.1795 15.4863 25.1282 15.4863L14.8718 15.4863C14.8205 15.4863 14.7735 15.5077 14.7308 15.5504C14.688 15.5931 14.6667 15.6402 14.6667 15.6914L14.6667 22.6145C14.6667 22.6658 14.688 22.7128 14.7308 22.7555C14.7735 22.7983 14.8205 22.8196 14.8718 22.8196Z" fill="#484848" />
                                    </svg>
                                    <div class="content">
                                        <h6>Windows</h6>
                                        <p>Queensland, Australia - 18 January 2024 at 13:40</p>
                                    </div>
                                </div>
                                <div class="current-device">
                                    <h5>Current Device</h5>
                                </div>
                                <div class="log-out-device">
                                    <a href="#"><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.53912 12.1673C1.20236 12.1673 0.917318 12.0506 0.683984 11.8173C0.450651 11.584 0.333984 11.2989 0.333984 10.9622V2.03912C0.333984 1.70236 0.450651 1.41732 0.683984 1.18398C0.917318 0.950651 1.20236 0.833984 1.53912 0.833984H6.00705V1.83397H1.53912C1.48783 1.83397 1.44081 1.85533 1.39807 1.89807C1.35533 1.94081 1.33397 1.98783 1.33397 2.03912V10.9622C1.33397 11.0134 1.35533 11.0605 1.39807 11.1032C1.44081 11.1459 1.48783 11.1673 1.53912 11.1673H6.00705V12.1673H1.53912ZM8.82115 9.34675L8.12887 8.6237L9.75194 7.00062H4.06473V6.00065H9.75194L8.12887 4.37757L8.82115 3.65452L11.6673 6.50064L8.82115 9.34675Z" fill="#484848" />
                                        </svg>
                                        Log Out Device
                                    </a>
                                </div>
                            </div>
                            <div class="device-box">
                                <div class="img-box">
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="40" height="40" rx="20" fill="#484848" fill-opacity="0.05" />
                                        <path d="M16.8718 27C16.535 27 16.25 26.8833 16.0166 26.65C15.7833 26.4166 15.6666 26.1316 15.6666 25.7948L15.6666 14.2051C15.6666 13.8684 15.7833 13.5833 16.0166 13.35C16.25 13.1167 16.535 13 16.8718 13L23.1281 13C23.4649 13 23.7499 13.1167 23.9833 13.35C24.2166 13.5833 24.3333 13.8684 24.3333 14.2051V25.7948C24.3333 26.1316 24.2166 26.4166 23.9833 26.65C23.7499 26.8833 23.4649 27 23.1281 27H16.8718V27ZM16.6666 23.8462L16.6666 25.7949C16.6666 25.8461 16.688 25.8932 16.7307 25.9359C16.7735 25.9786 16.8205 26 16.8718 26H23.1281C23.1794 26 23.2264 25.9786 23.2692 25.9359C23.3119 25.8932 23.3333 25.8461 23.3333 25.7949V23.8462H16.6666ZM19.9999 25.5128C20.1632 25.5128 20.3023 25.4553 20.4172 25.3404C20.5322 25.2254 20.5897 25.0863 20.5897 24.9231C20.5897 24.7598 20.5322 24.6207 20.4172 24.5058C20.3023 24.3908 20.1632 24.3333 19.9999 24.3333C19.8367 24.3333 19.6976 24.3908 19.5826 24.5058C19.4677 24.6207 19.4102 24.7598 19.4102 24.9231C19.4102 25.0863 19.4677 25.2254 19.5826 25.3404C19.6976 25.4553 19.8367 25.5128 19.9999 25.5128V25.5128ZM16.6666 22.8462H23.3333V15.8333L16.6666 15.8333V22.8462ZM16.6666 14.8333L23.3333 14.8333V14.2051C23.3333 14.1538 23.3119 14.1068 23.2692 14.0641C23.2264 14.0214 23.1794 14 23.1281 14L16.8718 14C16.8205 14 16.7735 14.0214 16.7307 14.0641C16.688 14.1068 16.6666 14.1538 16.6666 14.2051V14.8333Z" fill="#484848" />
                                    </svg>

                                    <div class="content">
                                        <h6>Iphone 11</h6>
                                        <p>Queensland, Australia - 10 January 2024 at 13:40</p>
                                    </div>
                                </div>
                                <div class="current-device">
                                    <h5>Current Device</h5>
                                </div>
                                <div class="log-out-device">
                                    <a href="#"><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.53912 12.1673C1.20236 12.1673 0.917318 12.0506 0.683984 11.8173C0.450651 11.584 0.333984 11.2989 0.333984 10.9622V2.03912C0.333984 1.70236 0.450651 1.41732 0.683984 1.18398C0.917318 0.950651 1.20236 0.833984 1.53912 0.833984H6.00705V1.83397H1.53912C1.48783 1.83397 1.44081 1.85533 1.39807 1.89807C1.35533 1.94081 1.33397 1.98783 1.33397 2.03912V10.9622C1.33397 11.0134 1.35533 11.0605 1.39807 11.1032C1.44081 11.1459 1.48783 11.1673 1.53912 11.1673H6.00705V12.1673H1.53912ZM8.82115 9.34675L8.12887 8.6237L9.75194 7.00062H4.06473V6.00065H9.75194L8.12887 4.37757L8.82115 3.65452L11.6673 6.50064L8.82115 9.34675Z" fill="#484848" />
                                        </svg>
                                        Log Out Device
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="parent-box">
                            <h6>Account</h6>
                            <div class="device-box">
                                <div class="img-box">
                                    <div class="content">
                                        <h6>Windows</h6>
                                        <p>Queensland, Australia - 10 min ago</p>
                                    </div>
                                </div>
                                <div class="log-out-device deactivate">
                                    <a href="https://luckybackyards.com/staging-custom/deactivate-form.php">
                                        Deactivate
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="main-heading">
                            <h2>Contact Info</h2>
                        </div>
                        <div class="parent-box ">
                            <h6>Personal Info</h6>
                            <form method="post">
                                <label for="first_name">First Name*</label>
                                <input type="text" name="first_name" id="first_name" value="<?php echo esc_attr($first_name); ?>" required>
                                <label for="last_name">Last Name*</label>
                                <input type="text" name="last_name" id="last_name" value="<?php echo esc_attr($last_name); ?>" required>
                                <label for="email">Email*</label>
                                <input type="email" name="email" id="email" value="<?php echo esc_attr($email); ?>" required readonly>
                                <label for="date_of_birth">DATE OF BIRTH*</label>
                                <input type="date" name="date_of_birth" id="date_of_birth" value="<?php echo esc_attr($date_of_birth); ?>" placeholder="dd/mm/yyyy" required>
                                <label for="mobile_phone">Mobile Phone*</label>
                                <input type="number" name="mobile_phone" id="mobile_phone" value="<?php echo esc_attr($mobile_phone); ?>" required>
                               
                                  <label>Gender*</label>
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php echo ($gender == 'male') ? 'checked' : '' ?>>
                                      <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                      <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php echo ($gender == 'female') ? 'checked' : '' ?>>
                                      <label class="form-check-label" for="female">Female</label>
                                </div>
                            
                                <h6>Local Home</h6>
                                <label for="street">Street*</label>
                                <input type="text" name="street" id="street" value="<?php echo esc_attr($street); ?>" required>
                                <label for="city">City*</label>
                                <input type="text" name="city" id="city" value="<?php echo esc_attr($city); ?>" required>
                                <label for="personal_country">Country*</label>
                                <select name="country" id="personal_country" class="js-example-basic-single">
                                    <option value="" disabled selected>Select Country</option>
                                    
                                    <?php
                                        $countries =
                                            array(
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
                                    
                                        foreach ($countries as $countryCode => $countryName) {
                                            $selected = ($country == $countryCode) ? 'selected' : '';
                                            echo "<option value=\"$countryCode\" $selected>$countryName</option>";
                                        }
                                        ?>
                                </select>
                                <label for="state">State*</label>
                                <input type="text" name="state" id="state" value="<?php echo esc_attr($state); ?>" required>
                                <label for="zip_code">Zip Code*</label>
                                <input type="text" name="zip_code" id="zip_code" value="<?php echo esc_attr($zip_code); ?>" required>
                            
                                <h6>Emergency</h6>
                                <label for="emergency_contact_name">Emergency Contact Name</label>
                                <input type="text" name="emergency_contact_name" id="emergency_contact_name" value="<?php echo esc_attr($emergency_contact_name); ?>" required>
                                <label for="emergency_contact_relationship">Emergency Contact Relationship</label>
                                <input type="text" name="emergency_contact_relationship" id="emergency_contact_relationship" value="<?php echo esc_attr($emergency_contact_relationship); ?>" required>
                                <label for="emergency_contact_phone">Emergency Contact Phone</label>
                                <input type="number" name="emergency_contact_phone" id="emergency_contact_phone" value="<?php echo esc_attr($emergency_contact_phone); ?>" required>
                                <input type="hidden" name="profile_complete" value="true">
                            
                                <button type="submit" name="save_contact_info">Save Changes</button>
                            </form>
                            
                            

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact-tab1">
                        <div class="large-payment-box">
                        <div class="main-box-payment-01">
                        <div class="main-heading">
                            <h2>Payment</h2>
                        </div>
                        <div class="parent-box parent-box-with-two-content manage-payment-box ">
                            <div class="content">
                                <h6>Your Payments</h6>
                                <p>Keep track of all your payments and refunds</p>
                            </div>
                            <div class="link-box">
                                <a href="#" id="manage-payments">Manage Payments</a>
                            </div>

                        </div>
                        <div class="parent-box parent-box-with-two-content  ">
                            <div class="content">
                                <h6>Payment Methods</h6>
                                <p>When you receive a payment for a reservation, we call that payment to you a "payout." Our secure<br> payment system supports several payout methods, which can be set up below. <a href="#">Go to FAQ</a> </p>
                            </div>

                            <div class="payemnt-table">
                                <table>
                                    <tr>
                                        <th>Method</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                    </tr>
                                    <tr  class="added-successfully" >
                                        <td colspan="3">
                                        <p><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.66208 13.2396L3.66113 9.23862L4.46305 8.43672L7.66208 11.6358L14.5361 4.76172L15.338 5.56362L7.66208 13.2396Z" fill="#4CAF50"/>
</svg>
Added successfully!</p>
                                        </td>


                                    </tr>
                                    <tr  class="an-internal-error" >
                                        <td colspan="3">
                                        <p><svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.29965 13.9886L4.50928 13.1982L8.70928 8.99818L4.50928 4.79818L5.29965 4.00781L9.49965 8.20781L13.6996 4.00781L14.49 4.79818L10.29 8.99818L14.49 13.1982L13.6996 13.9886L9.49965 9.78855L5.29965 13.9886Z" fill="#D43228"/>
</svg>

An internal error occurred during your request!</p>
                                        </td>


                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main-box">
                                                <div class="img-box">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/paypal-img.png" alt="">
                                                    <p>PayPal</p>
                                                </div>
                                                <p class="default">Default</p>
                                            </div>
                                        </td>
                                        <td>Account **** 3434 (GBP)</td>
                                        <td>
                                            <div class="pending-options-box">
                                                <p class="pending-verification">Pending Verification</p>
                                                <div class="dropdown">
                                                    <button onclick="myFunction()" class="dropbtn">
                                                        Options
                                                        <i id="arrow-icon" class="fa fa-angle-down"></i>
                                                    </button>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="#"> <span><svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M7.05416 11.3372L11.5362 6.85514L10.8336 6.15259L7.05416 9.93207L5.15416 8.03207L4.45161 8.73462L7.05416 11.3372ZM8.00143 14.8346C7.12547 14.8346 6.30211 14.6684 5.53136 14.3359C4.76059 14.0035 4.09014 13.5523 3.51999 12.9824C2.94984 12.4125 2.49846 11.7424 2.16588 10.972C1.83329 10.2015 1.66699 9.37836 1.66699 8.5024C1.66699 7.62645 1.83321 6.80309 2.16566 6.03234C2.4981 5.26157 2.94927 4.59111 3.51916 4.02097C4.08906 3.45081 4.75922 2.99944 5.52964 2.66685C6.30005 2.33426 7.12324 2.16797 7.99919 2.16797C8.87515 2.16797 9.6985 2.33419 10.4693 2.66664C11.24 2.99908 11.9105 3.45025 12.4806 4.02014C13.0508 4.59004 13.5022 5.2602 13.8347 6.03062C14.1673 6.80103 14.3336 7.62421 14.3336 8.50017C14.3336 9.37613 14.1674 10.1995 13.835 10.9702C13.5025 11.741 13.0513 12.4115 12.4815 12.9816C11.9116 13.5518 11.2414 14.0031 10.471 14.3357C9.70057 14.6683 8.87738 14.8346 8.00143 14.8346ZM8.00031 13.8346C9.4892 13.8346 10.7503 13.318 11.7836 12.2846C12.817 11.2513 13.3336 9.99018 13.3336 8.50129C13.3336 7.0124 12.817 5.75129 11.7836 4.71795C10.7503 3.68462 9.4892 3.16795 8.00031 3.16795C6.51142 3.16795 5.25031 3.68462 4.21698 4.71795C3.18364 5.75129 2.66698 7.0124 2.66698 8.50129C2.66698 9.99018 3.18364 11.2513 4.21698 12.2846C5.25031 13.318 6.51142 13.8346 8.00031 13.8346Z" fill="#484848" />
                                                                </svg>
                                                            </span>Make Default </a>
                                                        <a href="#"> <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M3.33299 12.6653H4.17401L10.9984 5.84096L10.1574 4.99995L3.33299 11.8243V12.6653ZM2.33301 13.6653V11.4089L11.1266 2.61921C11.2274 2.52765 11.3387 2.45689 11.4605 2.40695C11.5824 2.357 11.7101 2.33203 11.8438 2.33203C11.9774 2.33203 12.1069 2.35575 12.2322 2.4032C12.3575 2.45063 12.4684 2.52605 12.565 2.62946L13.3791 3.45381C13.4825 3.55039 13.5563 3.66153 13.6003 3.78722C13.6443 3.91289 13.6663 4.03857 13.6663 4.16425C13.6663 4.2983 13.6434 4.42624 13.5976 4.54805C13.5518 4.66987 13.479 4.78119 13.3791 4.882L4.58939 13.6653H2.33301ZM10.5705 5.42783L10.1574 4.99995L10.9984 5.84096L10.5705 5.42783Z" fill="#484848" />
                                                                </svg>
                                                            </span> Edit</a>
                                                        <a href="#"> <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.8718 13.6665C4.53932 13.6665 4.25535 13.5488 4.01988 13.3133C3.78441 13.0778 3.66667 12.7939 3.66667 12.4614V3.99987H3V2.99989H5.99998V2.41016H9.99998V2.99989H13V3.99987H12.3333V12.4614C12.3333 12.7981 12.2166 13.0832 11.9833 13.3165C11.75 13.5499 11.4649 13.6665 11.1282 13.6665H4.8718ZM11.3333 3.99987H4.66665V12.4614C4.66665 12.5212 4.68588 12.5704 4.72435 12.6088C4.76282 12.6473 4.81197 12.6665 4.8718 12.6665H11.1282C11.1795 12.6665 11.2265 12.6452 11.2692 12.6024C11.3119 12.5597 11.3333 12.5127 11.3333 12.4614V3.99987ZM6.26923 11.3332H7.26922V5.33321H6.26923V11.3332ZM8.73075 11.3332H9.73073V5.33321H8.73075V11.3332Z" fill="#484848" />
                                                                </svg>
                                                            </span> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main-box">
                                                <div class="img-box">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/paypal-img.png" alt="">
                                                    <p>PayPal</p>
                                                </div>
                                               
                                            </div>
                                        </td>
                                        <td>Account **** 3434 (GBP)</td>
                                        <td>
                                            <div class="pending-options-box">
                                                <p class="ready">Ready</p>
                                                <div class="dropdown">
                                                    <button onclick="myFunction()" class="dropbtn">
                                                        Options
                                                        <i id="arrow-icon" class="fa fa-angle-down"></i>
                                                    </button>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="#"> <span><svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M7.05416 11.3372L11.5362 6.85514L10.8336 6.15259L7.05416 9.93207L5.15416 8.03207L4.45161 8.73462L7.05416 11.3372ZM8.00143 14.8346C7.12547 14.8346 6.30211 14.6684 5.53136 14.3359C4.76059 14.0035 4.09014 13.5523 3.51999 12.9824C2.94984 12.4125 2.49846 11.7424 2.16588 10.972C1.83329 10.2015 1.66699 9.37836 1.66699 8.5024C1.66699 7.62645 1.83321 6.80309 2.16566 6.03234C2.4981 5.26157 2.94927 4.59111 3.51916 4.02097C4.08906 3.45081 4.75922 2.99944 5.52964 2.66685C6.30005 2.33426 7.12324 2.16797 7.99919 2.16797C8.87515 2.16797 9.6985 2.33419 10.4693 2.66664C11.24 2.99908 11.9105 3.45025 12.4806 4.02014C13.0508 4.59004 13.5022 5.2602 13.8347 6.03062C14.1673 6.80103 14.3336 7.62421 14.3336 8.50017C14.3336 9.37613 14.1674 10.1995 13.835 10.9702C13.5025 11.741 13.0513 12.4115 12.4815 12.9816C11.9116 13.5518 11.2414 14.0031 10.471 14.3357C9.70057 14.6683 8.87738 14.8346 8.00143 14.8346ZM8.00031 13.8346C9.4892 13.8346 10.7503 13.318 11.7836 12.2846C12.817 11.2513 13.3336 9.99018 13.3336 8.50129C13.3336 7.0124 12.817 5.75129 11.7836 4.71795C10.7503 3.68462 9.4892 3.16795 8.00031 3.16795C6.51142 3.16795 5.25031 3.68462 4.21698 4.71795C3.18364 5.75129 2.66698 7.0124 2.66698 8.50129C2.66698 9.99018 3.18364 11.2513 4.21698 12.2846C5.25031 13.318 6.51142 13.8346 8.00031 13.8346Z" fill="#484848" />
                                                                </svg>
                                                            </span>Make Default </a>
                                                        <a href="#"> <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M3.33299 12.6653H4.17401L10.9984 5.84096L10.1574 4.99995L3.33299 11.8243V12.6653ZM2.33301 13.6653V11.4089L11.1266 2.61921C11.2274 2.52765 11.3387 2.45689 11.4605 2.40695C11.5824 2.357 11.7101 2.33203 11.8438 2.33203C11.9774 2.33203 12.1069 2.35575 12.2322 2.4032C12.3575 2.45063 12.4684 2.52605 12.565 2.62946L13.3791 3.45381C13.4825 3.55039 13.5563 3.66153 13.6003 3.78722C13.6443 3.91289 13.6663 4.03857 13.6663 4.16425C13.6663 4.2983 13.6434 4.42624 13.5976 4.54805C13.5518 4.66987 13.479 4.78119 13.3791 4.882L4.58939 13.6653H2.33301ZM10.5705 5.42783L10.1574 4.99995L10.9984 5.84096L10.5705 5.42783Z" fill="#484848" />
                                                                </svg>
                                                            </span> Edit</a>
                                                        <a href="#"> <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.8718 13.6665C4.53932 13.6665 4.25535 13.5488 4.01988 13.3133C3.78441 13.0778 3.66667 12.7939 3.66667 12.4614V3.99987H3V2.99989H5.99998V2.41016H9.99998V2.99989H13V3.99987H12.3333V12.4614C12.3333 12.7981 12.2166 13.0832 11.9833 13.3165C11.75 13.5499 11.4649 13.6665 11.1282 13.6665H4.8718ZM11.3333 3.99987H4.66665V12.4614C4.66665 12.5212 4.68588 12.5704 4.72435 12.6088C4.76282 12.6473 4.81197 12.6665 4.8718 12.6665H11.1282C11.1795 12.6665 11.2265 12.6452 11.2692 12.6024C11.3119 12.5597 11.3333 12.5127 11.3333 12.4614V3.99987ZM6.26923 11.3332H7.26922V5.33321H6.26923V11.3332ZM8.73075 11.3332H9.73073V5.33321H8.73075V11.3332Z" fill="#484848" />
                                                                </svg>
                                                            </span> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="main-box">
                                                <div class="img-box">
                                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/paypal-img.png" alt="">
                                                    <p>PayPal</p>
                                                </div>
                                                
                                            </div>
                                        </td>
                                        <td>Account **** 3434 (GBP)</td>
                                        <td>
                                            <div class="pending-options-box">
                                                <p class="new">New</p>
                                                <div class="dropdown">
                                                    <button onclick="myFunction()" class="dropbtn">
                                                        Options
                                                        <i id="arrow-icon" class="fa fa-angle-down"></i>
                                                    </button>
                                                    <div id="myDropdown" class="dropdown-content">
                                                        <a href="#"> <span><svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M7.05416 11.3372L11.5362 6.85514L10.8336 6.15259L7.05416 9.93207L5.15416 8.03207L4.45161 8.73462L7.05416 11.3372ZM8.00143 14.8346C7.12547 14.8346 6.30211 14.6684 5.53136 14.3359C4.76059 14.0035 4.09014 13.5523 3.51999 12.9824C2.94984 12.4125 2.49846 11.7424 2.16588 10.972C1.83329 10.2015 1.66699 9.37836 1.66699 8.5024C1.66699 7.62645 1.83321 6.80309 2.16566 6.03234C2.4981 5.26157 2.94927 4.59111 3.51916 4.02097C4.08906 3.45081 4.75922 2.99944 5.52964 2.66685C6.30005 2.33426 7.12324 2.16797 7.99919 2.16797C8.87515 2.16797 9.6985 2.33419 10.4693 2.66664C11.24 2.99908 11.9105 3.45025 12.4806 4.02014C13.0508 4.59004 13.5022 5.2602 13.8347 6.03062C14.1673 6.80103 14.3336 7.62421 14.3336 8.50017C14.3336 9.37613 14.1674 10.1995 13.835 10.9702C13.5025 11.741 13.0513 12.4115 12.4815 12.9816C11.9116 13.5518 11.2414 14.0031 10.471 14.3357C9.70057 14.6683 8.87738 14.8346 8.00143 14.8346ZM8.00031 13.8346C9.4892 13.8346 10.7503 13.318 11.7836 12.2846C12.817 11.2513 13.3336 9.99018 13.3336 8.50129C13.3336 7.0124 12.817 5.75129 11.7836 4.71795C10.7503 3.68462 9.4892 3.16795 8.00031 3.16795C6.51142 3.16795 5.25031 3.68462 4.21698 4.71795C3.18364 5.75129 2.66698 7.0124 2.66698 8.50129C2.66698 9.99018 3.18364 11.2513 4.21698 12.2846C5.25031 13.318 6.51142 13.8346 8.00031 13.8346Z" fill="#484848" />
                                                                </svg>
                                                            </span>Make Default </a>
                                                        <a href="#"> <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M3.33299 12.6653H4.17401L10.9984 5.84096L10.1574 4.99995L3.33299 11.8243V12.6653ZM2.33301 13.6653V11.4089L11.1266 2.61921C11.2274 2.52765 11.3387 2.45689 11.4605 2.40695C11.5824 2.357 11.7101 2.33203 11.8438 2.33203C11.9774 2.33203 12.1069 2.35575 12.2322 2.4032C12.3575 2.45063 12.4684 2.52605 12.565 2.62946L13.3791 3.45381C13.4825 3.55039 13.5563 3.66153 13.6003 3.78722C13.6443 3.91289 13.6663 4.03857 13.6663 4.16425C13.6663 4.2983 13.6434 4.42624 13.5976 4.54805C13.5518 4.66987 13.479 4.78119 13.3791 4.882L4.58939 13.6653H2.33301ZM10.5705 5.42783L10.1574 4.99995L10.9984 5.84096L10.5705 5.42783Z" fill="#484848" />
                                                                </svg>
                                                            </span> Edit</a>
                                                        <a href="#"> <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M4.8718 13.6665C4.53932 13.6665 4.25535 13.5488 4.01988 13.3133C3.78441 13.0778 3.66667 12.7939 3.66667 12.4614V3.99987H3V2.99989H5.99998V2.41016H9.99998V2.99989H13V3.99987H12.3333V12.4614C12.3333 12.7981 12.2166 13.0832 11.9833 13.3165C11.75 13.5499 11.4649 13.6665 11.1282 13.6665H4.8718ZM11.3333 3.99987H4.66665V12.4614C4.66665 12.5212 4.68588 12.5704 4.72435 12.6088C4.76282 12.6473 4.81197 12.6665 4.8718 12.6665H11.1282C11.1795 12.6665 11.2265 12.6452 11.2692 12.6024C11.3119 12.5597 11.3333 12.5127 11.3333 12.4614V3.99987ZM6.26923 11.3332H7.26922V5.33321H6.26923V11.3332ZM8.73075 11.3332H9.73073V5.33321H8.73075V11.3332Z" fill="#484848" />
                                                                </svg>
                                                            </span> Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>


                            <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop13">Add Payment Methods</button>

                        </div>
                        </div>
                        <div class="main-box-payment-02">
                        <div class="manage-payemnt-method-box">
                            <div class="top-links">
                                <ul>
                                    <li><a href="#"  id="page-ayment" >Payment</a> <span>></span></li>
                                    <li><a href="#"  class="active" >Manage Payments</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="two-content-box">
                            <h5>Manage Payments</h5>
                            <p>Once you have a reservation, this is where you can come to track your payments and refunds</p>
                        </div>
                        <div class="multi-boxes-flex">
                            <div class="select-box box">
                                <div class="input-box">
                                <label id="select-drop-down-icon">Select Payment Method</label>
                                <select name="Select Payment Method" class="js-example-basic-single" id="select-payment-method">
                                    <option value="All Payment Method">All Payment Method</option>
                                    <option value="All Payment Method-02">All Payment Method-02</option>
                                    <option value="All Payment Method-03">All Payment Method-03</option>
                                    <option value="All Payment Method-04">All Payment Method-04</option>
                                </select>
                                </div>
                                <div class="input-box">
                                <label id="select-drop-down-icon">Type of payment</label>
                                <select name="Type of payment" class="js-example-basic-single" id="type-of-payment">
                                    <option value="All Status">All Status</option>
                                    <option value="All Status-02">All Status-02</option>
                                    <option value="All Status-03">All Status-03</option>
                                    <option value="All Status-04">All Status-04</option>
                                </select>
                                </div>
                                <div class="input-box">
                                <label id="select-drop-down-icon">Select Year</label>
                                <select name="Select Year" class="js-example-basic-single" id="select-year">
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                                </div>
                                <div class="input-box">
                                <label id="select-drop-down-icon">From</label>
                                <select name="From" class="js-example-basic-single" id="from-01">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                </select>
                                </div>
                                <div class="input-box">
                                <label id="select-drop-down-icon">To</label>
                                <select name="To" class="js-example-basic-single" id="to-01">
                                    <option value="December">December</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                </select>
                                </div>
                            </div>
                            <div class="box three-dots-link">
                                <a href="#"><span><svg width="12" height="4" viewBox="0 0 12 4" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="1.33333" cy="1.99935" r="1.33333" fill="#484848"/>
<circle cx="6.00033" cy="1.99935" r="1.33333" fill="#484848"/>
<ellipse cx="10.6663" cy="1.99935" rx="1.33333" ry="1.33333" fill="#484848"/>
</svg>
</span></a>
                                
                            </div>
                        </div>
                        <div class="main-table-box">
                            <table>
                                <tr>
                                    <th>Reservation</th>
                                    <th>Property</th>
                                    <th>Date</th>
                                    <th>nights</th>
                                    <th>Clock</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                    <th>Amount</th>
                                </tr>
                                <tr>
                                    <td  class="bold-text" >#HMFHI92DFG</td>
                                    <td>
                                        <div class="two-texts">
                                            <h6>Cottage with Pool</h6>
                                            <p>Villa in Kuta Uta...</p>
                                        </div>
                                    </td>
                                    <td>13/06/2021</td>
                                    <td>7 Nights</td>
                                    <td>40 Hour</td>
                                    <td>Payout</td>
                                    <td>Transfer to Account<br> **** 3434</td>
                                    <td  class="main-amount" >$140.00</td>
                                </tr>
                                <tr>
                                    <td  class="bold-text" >#HMFHI92DFG</td>
                                    <td>
                                        <div class="two-texts">
                                            <h6>Cottage with Pool</h6>
                                            <p>Villa in Kuta Uta...</p>
                                        </div>
                                    </td>
                                    <td>13/06/2021</td>
                                    <td>7 Nights</td>
                                    <td>40 Hour</td>
                                    <td>Payout</td>
                                    <td>Transfer to Account<br> **** 3434</td>
                                    <td  class="main-amount" >$140.00</td>
                                </tr>
                                <tr>
                                    <td  class="bold-text" >#HMFHI92DFG</td>
                                    <td>
                                        <div class="two-texts">
                                            <h6>Cottage with Pool</h6>
                                            <p>Villa in Kuta Uta...</p>
                                        </div>
                                    </td>
                                    <td>13/06/2021</td>
                                    <td>7 Nights</td>
                                    <td>40 Hour</td>
                                    <td>Payout</td>
                                    <td>Transfer to Account<br> **** 3434</td>
                                    <td  class="main-amount" >$140.00</td>
                                </tr>
                                <tr>
                                    <td  class="bold-text" >#HMFHI92DFG</td>
                                    <td>
                                        <div class="two-texts">
                                            <h6>Cottage with Pool</h6>
                                            <p>Villa in Kuta Uta...</p>
                                        </div>
                                    </td>
                                    <td>13/06/2021</td>
                                    <td>7 Nights</td>
                                    <td>40 Hour</td>
                                    <td>Payout</td>
                                    <td>Transfer to Account<br> **** 3434</td>
                                    <td  class="main-amount" >$140.00</td>
                                </tr>
                                <tr>
                                    <td  class="bold-text" >#HMFHI92DFG</td>
                                    <td>
                                        <div class="two-texts">
                                            <h6>Cottage with Pool</h6>
                                            <p>Villa in Kuta Uta...</p>
                                        </div>
                                    </td>
                                    <td>13/06/2021</td>
                                    <td>7 Nights</td>
                                    <td>40 Hour</td>
                                    <td>Payout</td>
                                    <td>Transfer to Account<br> **** 3434</td>
                                    <td  class="main-amount" >$140.00</td>
                                </tr>
                            </table>
                        </div>
                        </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-contact2" role="tabpanel" aria-labelledby="nav-contact-tab2">
                        <p>The client hasn't provided the design in the Figma file, so this section hasn't been developed yet. </p>
                    </div>
                    <div class="tab-pane fade" id="nav-contact3" role="tabpanel" aria-labelledby="nav-contact-tab3">
                        <div class="main-heading">
                            <h2>Notifications</h2>
                        </div>
                        <div class="turn-on-notifications-box">
                            <div class="img-box">
                                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="60" height="60" rx="30" fill="#EACD37" fill-opacity="0.1" />
                                    <path d="M13.9536 43.4582L30 15.75L46.0464 43.4582H13.9536ZM18.0458 41.0832H41.9542L30 20.4999L18.0458 41.0832ZM30 39.1954C30.3623 39.1954 30.6661 39.0728 30.9112 38.8277C31.1563 38.5826 31.2788 38.2789 31.2788 37.9165C31.2788 37.5542 31.1563 37.2505 30.9112 37.0054C30.6661 36.7603 30.3623 36.6377 30 36.6377C29.6376 36.6377 29.3339 36.7603 29.0888 37.0054C28.8437 37.2505 28.7212 37.5542 28.7212 37.9165C28.7212 38.2789 28.8437 38.5826 29.0888 38.8277C29.3339 39.0728 29.6376 39.1954 30 39.1954ZM28.8125 35.0544H31.1874V27.1377L28.8125 27.1377L28.8125 35.0544Z" fill="#EACD37" />
                                </svg>
                                <div class="content">
                                    <h6>Web push notifications are off.</h6>
                                    <p>Turn on notifications to get notified of new responses on your device</p>
                                </div>
                            </div>
                            <div class="btn-box">
                                <a href="#">Turn on Notifications</a>
                            </div>
                        </div>
                        <div class="parent-box parent-box-with-two-content ">
                            <h6>Account Activity and Policies</h6>
                            <p>Confirm your booking and account activity, and learn about important Lucky Backyards policies</p>
                            <div class="sms-and-email-check-box">
                                <div class="text">
                                    <h5>Account Activity</h5>
                                </div>
                                <div class="two-check-boxes">
                                    <div class="check-box">
                                        <label for="sms">
                                            <input type="checkbox" id="sms" checked>
                                            SMS
                                        </label>
                                    </div>
                                    <div class="check-box">
                                        <label for="email">
                                            <input type="checkbox" id="email">
                                            Email
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="sms-and-email-check-box">
                                <div class="text">
                                    <h5>Listing Activity</h5>
                                </div>
                                <div class="two-check-boxes">
                                    <div class="check-box">
                                        <label for="sms-01">
                                            <input type="checkbox" id="sms-01" checked>
                                            SMS
                                        </label>
                                    </div>
                                    <div class="check-box">
                                        <label for="email-01">
                                            <input type="checkbox" id="email-01">
                                            Email
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="sms-and-email-check-box">
                                <div class="text">
                                    <h5>Guest Policies</h5>
                                </div>
                                <div class="two-check-boxes">
                                    <div class="check-box">
                                        <label for="sms-02">
                                            <input type="checkbox" id="sms-02" checked>
                                            SMS
                                        </label>
                                    </div>
                                    <div class="check-box">
                                        <label for="email-02">
                                            <input type="checkbox" id="email-02">
                                            Email
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="sms-and-email-check-box">
                                <div class="text">
                                    <h5>Host Policies</h5>
                                </div>
                                <div class="two-check-boxes">
                                    <div class="check-box">
                                        <label for="sms-03">
                                            <input type="checkbox" id="sms-03" checked>
                                            SMS
                                        </label>
                                    </div>
                                    <div class="check-box">
                                        <label for="email-03">
                                            <input type="checkbox" id="email-03">
                                            Email
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="parent-box parent-box-with-two-content ">
                            <h6>Reminders</h6>
                            <p>Get important reminders about your reservations, listings, and account activity</p>
                            <div class="sms-and-email-check-box">
                                <div class="text">
                                    <h5>Reminders</h5>
                                </div>
                                <div class="two-check-boxes">
                                    <div class="check-box">
                                        <label for="sms-04">
                                            <input type="checkbox" id="sms-04" checked>
                                            SMS
                                        </label>
                                    </div>
                                    <div class="check-box">
                                        <label for="email-04">
                                            <input type="checkbox" id="email-04">
                                            Email
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="parent-box parent-box-with-two-content ">
                            <h6>Guest and Host Messages</h6>
                            <p>Keep in touch with your Host or guests before and during your trip</p>
                            <div class="sms-and-email-check-box">
                                <div class="text">
                                    <h5>Messages</h5>
                                </div>
                                <div class="two-check-boxes">
                                    <div class="check-box">
                                        <label for="sms-05">
                                            <input type="checkbox" id="sms-05" checked>
                                            SMS
                                        </label>
                                    </div>
                                    <div class="check-box">
                                        <label for="email-05">
                                            <input type="checkbox" id="email-05">
                                            Email
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="verification-code-detail-box">
                            <div class="svg-img">
                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.99173 13.7115C9.20588 13.7115 9.38676 13.6376 9.53436 13.4897C9.68194 13.3418 9.75574 13.1608 9.75574 12.9467C9.75574 12.7325 9.68181 12.5517 9.53394 12.4041C9.38608 12.2565 9.20508 12.1827 8.99093 12.1827C8.77678 12.1827 8.59591 12.2566 8.44832 12.4045C8.30072 12.5523 8.22692 12.7333 8.22692 12.9475C8.22692 13.1616 8.30085 13.3425 8.44871 13.4901C8.59658 13.6377 8.77758 13.7115 8.99173 13.7115ZM8.46056 11.0259H9.51632C9.52593 10.6567 9.58002 10.3618 9.67858 10.1411C9.77713 9.92042 10.0163 9.62788 10.3961 9.26345C10.7259 8.93364 10.9786 8.62907 11.1541 8.34974C11.3295 8.07042 11.4173 7.74055 11.4173 7.36014C11.4173 6.7146 11.1853 6.21034 10.7214 5.84735C10.2574 5.48438 9.70864 5.30289 9.07498 5.30289C8.44903 5.30289 7.93101 5.46996 7.52091 5.80409C7.11082 6.13822 6.81827 6.53172 6.64327 6.98459L7.60671 7.37113C7.69806 7.12209 7.85431 6.87954 8.07546 6.64349C8.29662 6.40743 8.62499 6.2894 9.06056 6.2894C9.50384 6.2894 9.83148 6.4108 10.0435 6.6536C10.2555 6.89639 10.3615 7.16346 10.3615 7.45481C10.3615 7.70961 10.2889 7.94278 10.1437 8.15431C9.99854 8.36585 9.81345 8.57018 9.58845 8.76731C9.09615 9.21153 8.78509 9.56586 8.65528 9.83028C8.52547 10.0947 8.46056 10.4933 8.46056 11.0259ZM9.00124 16.625C8.01579 16.625 7.08951 16.438 6.22241 16.064C5.3553 15.69 4.60104 15.1824 3.95963 14.5413C3.3182 13.9001 2.81041 13.1462 2.43624 12.2795C2.06208 11.4128 1.875 10.4867 1.875 9.50124C1.875 8.51579 2.062 7.58951 2.436 6.72241C2.81 5.8553 3.31756 5.10104 3.95869 4.45963C4.59983 3.8182 5.35376 3.31041 6.22048 2.93624C7.08719 2.56208 8.01328 2.375 8.99873 2.375C9.98418 2.375 10.9105 2.562 11.7776 2.936C12.6447 3.31 13.3989 3.81756 14.0403 4.45869C14.6818 5.09983 15.1896 5.85376 15.5637 6.72048C15.9379 7.5872 16.125 8.51328 16.125 9.49873C16.125 10.4842 15.938 11.4105 15.564 12.2776C15.19 13.1447 14.6824 13.8989 14.0413 14.5403C13.4001 15.1818 12.6462 15.6896 11.7795 16.0637C10.9128 16.4379 9.98669 16.625 9.00124 16.625ZM8.99998 15.5C10.675 15.5 12.0937 14.9187 13.2562 13.7562C14.4187 12.5937 15 11.175 15 9.49998C15 7.82498 14.4187 6.40623 13.2562 5.24373C12.0937 4.08123 10.675 3.49998 8.99998 3.49998C7.32498 3.49998 5.90623 4.08123 4.74373 5.24373C3.58123 6.40623 2.99998 7.82498 2.99998 9.49998C2.99998 11.175 3.58123 12.5937 4.74373 13.7562C5.90623 14.9187 7.32498 15.5 8.99998 15.5Z" fill="#9B9B9B" />
                                </svg>
                            </div>
                            <div class="content">
                                <p>Haven't received a verification code in your email? By opting in to text messages, you agree to receive automated marketing messages from lucky backyards at +1 ** *** 1221. To receive messages at a different number, <a href="#">update your phone number settings</a> on your personal info page</p>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="nav-contact4" role="tabpanel" aria-labelledby="nav-contact-tab4">
                        <div class="main-heading">
                            <h2>Privacy</h2>
                        </div>
                        <div class="parent-box parent-box-with-two-content ">
                            <form>
                                <h6>Request Your Personal Data</h6>
                                <p>Before we get you a copy of your data, we’ll just need you to answer a few questions</p>
                                <label id="select-drop-down-icon">Where do you reside?</label>
                                <select name="country-region-dd" id="country-region-dd" class="js-example-basic-single dd">
                                    <option value="" disabled selected>Select Country</option>
                                    
                                    <?php
                                        foreach ($countries as $countryCode => $countryName) {
                                            $selected = ($country == $countryCode) ? 'selected' : '';
                                            echo "<option value=\"$countryCode\" $selected>$countryName</option>";
                                        }
                                        ?>
                                </select>
                                <!--<select name="country-region-dd" class="js-example-basic-single dd"  id="country-region-dd" >
                                    <option value="Country/Region">Country/Region</option>
                                    <option value="Country/Region-02">Country/Region-02</option>
                                    <option value="Country/Region-03">Country/Region-03</option>
                                    <option value="Country/Region-04">Country/Region-04</option>
                                </select>-->
                                <label id="select-drop-down-icon">In what format do you want your data?</label>
                                <select name="country-region"  class="js-example-basic-single" id="country-region">
                                    <option value="Select Format">Select Format</option>
                                    <option value="HTML">HTML</option>
                                    <option value="JSON">JSON</option>
                                    <option value="Excel worksheet">Excel worksheet</option>
                                </select>

                                <label id="select-drop-down-icon">Why are you requesting a copy of your data?</label>
                                <select name="select-reason"  class="js-example-basic-single" id="select-reason">
                                    <option value="Select Reason">Select Reason</option>
                                    <option value="Select Reason-02">Select Reason-02</option>
                                    <option value="Select Reason-03">Select Reason-03</option>
                                    <option value="Select Reason-04">Select Reason-04</option>
                                </select>
                                <button>Request Data</button>
                            </form>
                        </div>
                        <div class="parent-box parent-box-with-two-content ">
                            <form method="POST" id="deleteYourAccount" onsubmit="return validateForm()">
                                <h6>Delete Your Account</h6>
                                <p>Submit a request to delete your personal data. To confirm you're the true owner of this account,<br> we may contact you at helena1966b@gmail.com. We will only be able to proceed with your request<br> once you follow the steps set out in the email.</p>

                                <div class="about-accountdeletion">
                                    <div class="text">
                                        <h5>About account deletion requests:</h5>
                                        <ul>
                                            <li>If you have a checkout (as a guest or a host) within the past 60 days, your deletion request can’t be processed until the 60-day claim period has elapsed.</li>
                                            <li>Once your request is processed, your personal data will be deleted (except for certain information that we are legally required or permitted to retain, as outlined in our <a href="#">Privacy Policy</a> ).</li>
                                            <li>If you want to use lucky backyards in the future, you’ll need to set up a new account.</li>
                                            <li>If you have any future reservations as a host or guest, they must first be cancelled in accordance with the applicable host cancellation policy before submitting your deletion request. Cancellation fees may apply. More information about cancellations can be found on our <a href="#">Help Center.</a> </li>
                                        </ul>
                                    </div>
                                </div>

                                <label id="select-drop-down-icon">Where do you reside?</label>
                                <select name="country"  class="js-example-basic-single" id="country">
                                    <option value="" disabled selected>Select Country</option>
                                    
                                    <?php
                                        foreach ($countries as $countryCode => $countryName) {
                                            $selected = ($country == $countryCode) ? 'selected' : '';
                                            echo "<option value=\"$countryCode\" $selected>$countryName</option>";
                                        }
                                        ?>
                                </select>
                                <div class="for_unired_states d-none">
                                    <label id="select-drop-down-icon" style="color: #4caf5000;">..</label>
                                    <select class="state-select-bg js-example-basic-single state" name="state" id="select-drop-down-icon">
                                        <option value="State">State</option>
                                        <option value="State-02">State-02</option>
                                        <option value="State-03">State-03</option>
                                        <option value="State-04">State-04</option>
                                    </select>
                                
                                <span class="united-states-residents-only"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.4375 11.5625H8.56246V7.24998H7.4375V11.5625ZM7.99998 5.96634C8.17162 5.96634 8.31549 5.90829 8.43159 5.79219C8.54769 5.67609 8.60574 5.53222 8.60574 5.36058C8.60574 5.18896 8.54769 5.04509 8.43159 4.92898C8.31549 4.81288 8.17162 4.75483 7.99998 4.75483C7.82834 4.75483 7.68447 4.81288 7.56838 4.92898C7.45227 5.04509 7.39423 5.18896 7.39423 5.36058C7.39423 5.53222 7.45227 5.67609 7.56838 5.79219C7.68447 5.90829 7.82834 5.96634 7.99998 5.96634ZM8.00124 15.125C7.01579 15.125 6.08951 14.938 5.22241 14.564C4.3553 14.19 3.60104 13.6824 2.95963 13.0413C2.3182 12.4001 1.81041 11.6462 1.43624 10.7795C1.06208 9.91277 0.875 8.98669 0.875 8.00124C0.875 7.01579 1.062 6.08951 1.436 5.22241C1.81 4.3553 2.31756 3.60104 2.95869 2.95963C3.59983 2.3182 4.35376 1.81041 5.22048 1.43624C6.08719 1.06208 7.01328 0.875 7.99873 0.875C8.98418 0.875 9.91045 1.062 10.7776 1.436C11.6447 1.81 12.3989 2.31756 13.0403 2.95869C13.6818 3.59983 14.1896 4.35376 14.5637 5.22048C14.9379 6.08719 15.125 7.01328 15.125 7.99873C15.125 8.98418 14.938 9.91045 14.564 10.7776C14.19 11.6447 13.6824 12.3989 13.0413 13.0403C12.4001 13.6818 11.6462 14.1896 10.7795 14.5637C9.91277 14.9379 8.98669 15.125 8.00124 15.125ZM7.99998 14C9.67498 14 11.0937 13.4187 12.2562 12.2562C13.4187 11.0937 14 9.67498 14 7.99998C14 6.32498 13.4187 4.90623 12.2562 3.74373C11.0937 2.58123 9.67498 1.99998 7.99998 1.99998C6.32498 1.99998 4.90623 2.58123 3.74373 3.74373C2.58123 4.90623 1.99998 6.32498 1.99998 7.99998C1.99998 9.67498 2.58123 11.0937 3.74373 12.2562C4.90623 13.4187 6.32498 14 7.99998 14Z" fill="#9B9B9B" />
                                    </svg>
                                    Required for United States residents only</span>
                                    
                                </div>

                                <label id="select-drop-down-format">Why are you deleting your account?</label>
                                <select name="sl-format"  class="js-example-basic-single" id="sl_format">
                                    <option value="">Select Format</option>
                                    <option value="format-02">Country-02</option>
                                    <option value="format-03">Country-03</option>
                                    <option value="format-04">Country-04</option>
                                </select>
                                <label id="select-drop-down-icon">Why are you deleting your account?</label>
                                <select class="why-are js-example-basic-single"  name="why-are" >
                                    <option value="Select Reason (optional)">Select Reason (optional)</option>
                                    <option value="I'm not satisfied with my experience on Luckybackyards">I'm not satisfied with my experience on Luckybackyards</option>
                                    <option value="I'm not confident about how Luckybackyards treats my private data">I'm not confident about how Luckybackyards treats my private data</option>
                                    <option value="I want to delete a duplicate account">I want to delete a duplicate account</option>
                                    <option value="I don't use Luckybackyards enough">I don't use Luckybackyards enough</option>
                                    <option value="Other">Other</option>
                                </select>
                                <!--<button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop8">Next</button>-->
                                <button type="submit" class="share">Next</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact5" role="tabpanel" aria-labelledby="nav-contact-tab5">
                        <div class="main-heading">
                            <h2>Global Preferences</h2>
                        </div>
                        <div class="parent-box parent-box-with-two-content ">
                            <form>
                                <label id="select-drop-down-icon">Where do you reside?</label>
                                <select name="english" class="js-example-basic-single" id="english">
                                    <option value="Preferred language">Preferred language</option>
                                    <option value="English-02">English-02</option>
                                    <option value="English-03">English-03</option>
                                    <option value="English-04">English-04</option>
                                </select>
                                <label id="select-drop-down-icon">Preferred currency</label>
                                <select name="Preferred currency" class="js-example-basic-single" id="preferred-currency">
                                    <option value="United States Dollar">United States Dollar</option>
                                    <option value="United States Dollar-02">United States Dollar-02</option>
                                    <option value="United States Dollar-03">United States Dollar-03</option>
                                    <option value="United States Dollar-04">United States Dollar-04</option>
                                </select>
                                <label id="select-drop-down-icon">Time zone</label>
                                <select class="state-select-bg js-example-basic-single"  name="hawaii" id="hawaii">
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Hawaii-02">Hawaii-02</option>
                                    <option value="Hawaii-03">Hawaii-03</option>
                                    <option value="Hawaii-04">Hawaii-04</option>
                                </select>
                                <button>Save</button>
                                <!-- <button></button> -->
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact6" role="tabpanel" aria-labelledby="nav-contact-tab6">
                        <p>The client hasn't provided the design in the Figma file, so this section hasn't been developed yet, <b>Also</b><br>
                        In the case of taxes, the client left the frame empty, and they haven't provided information for it either.
                    </p>
                    </div>
                    <div class="tab-pane fade" id="nav-contact7" role="tabpanel" aria-labelledby="nav-contact-tab7">
                    <p>The client hasn't provided the design in the Figma file, so this section hasn't been developed yet, <b>Also</b><br>
                        In the case of taxes, the client left the frame empty, and they haven't provided information for it either.
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</section>





<?php
get_footer();
?>