<?php

/* Template Name: Request to Book Test - Template */
delete_wishlist_tables();
wp_die();

// $email = send_user_email('test@yopmail.com', 'This is my message', 'This is subject');
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $user_email = 'test@yopmail.com';
    $subject = 'Test Subject';
    $message = 'Test Message';
    
    $mail_sent = wp_mail($user_email, $subject, $message, $headers);
    if($mail_sent) {
        echo 'Mail sent';
    } else{
        echo 'Error';
    }
print_r($mail_sent);

wp_die();
$property_id = check_property_id_and_redirect();

print_r($property_id);

wp_die();
//get_header(); 
// $booking = create_booking();
$post_id = 733;
$post_meta = get_post($post_id);
$post = check_booking_exists($post_id);
$url = get_post_permalink($post_id);
$ptid = get_field( "payment", $post_id );
echo '<pre>';
// print_r($post_meta);
if($post=== true) {
print_r('true');
}
print_r($post);
// print_r($url);
echo '<br>';
// print_r($ptid);
echo '</pre>';

wp_die();

?>


<!--<form action="" method="POST" id="payment_form_video">-->
            
<!--            <input type="hidden" name="package_id_video" value="1">-->
<!--            <div class="form-group">-->
               
<!--                <div id="card-element-video"></div>-->
<!--            </div>-->
<!--             <button id="card-button-video" data-secret="<?= $client_secret ?>" class="StyledBtn">Pay Now</button>-->
<!--            <div id="card-msg-video" role="alert"></div>-->
<!--</form>-->


<?php //get_footer(); ?>


<!--<script src="https://js.stripe.com/v3/"></script>-->



