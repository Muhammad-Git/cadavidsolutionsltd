<?php

/* Template Name: Reset Password Template */


$user = get_user_by( 'email', esc_attr( $_GET['user_email'] ) );
$user_id = $user->ID;
$meta_value = get_user_meta( $user_id, 'password_reset_key', true );

if(is_user_logged_in() || !$meta_value){ 
	
    //REDIRECT
    wp_redirect( esc_url( home_url() ) );
    exit;
}


get_header();

// update_user_meta('1', 'reset_password_key', 'YYJxpGHjBfjdqgxE32zK');




// $reset_key = 'YYJxpGHjBfjdqgxE32zK';
// $user_login = 'm.waqas.ansari09@gmail.com';
// $new_password = 'Dev@123!!';
// $user = check_password_reset_key($reset_key, $user_login);

// if ( is_wp_error($user) ) {
//     echo $user->get_error_message();
// } else {
//     wp_set_password($new_password, $user->ID);
//     wp_redirect('https://luckybackyards.com/customwp/');
//     exit;
// }

// echo do_shortcode('[TheChamp-Login]');
?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="p-4 shadow-lg position-relative">
                <h1 class="fs-2">Set Your Password</h1>
                <form id="reset-password-form">
                    <input type="hidden" name="user_email" value="<?php echo esc_attr( $_GET['user_email'] ); ?>">
                    <input type="hidden" name="key" value="<?php echo esc_attr( $_GET['key'] ); ?>">
                    <div class="mb-3">
                        <label for="password" class="mb-2">Password</label>
                        <input type="password" name="new_password" placeholder="New Password" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="mb-2">Confirm Password</label>
                        <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" required>
                    </div>
                    <button type="submit"  class="bg-site btn btn-primary justify-content-center login-submit-btn py-3 rounded-pill text-white">Reset Password</button>
                    
                    
                    <ul class="login-logout m-0 d-flex justify-content-center gap-3 my-3">
                        <li class="border-end border border-0 pe-3"> <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" class="text-dark">Don't have an account?</a> </li>
                        <li> <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-dark">Sign In!</a> </li>
                     </ul>
                </form>
                
                <div id="reset-password-message"></div>
                <div class="overlay_loader">
                    <div class="rz-preloader">
                        <i class="fas fa-sync"></i>
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