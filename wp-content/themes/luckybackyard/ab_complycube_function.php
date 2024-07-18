<?php
function create_client($user_id)
{
    $current_user_details = get_current_user_details($user_id);
    if ($current_user_details['user_data_error'] == false) {
        $user_id = $current_user_details['user_id'];
        $user_data = $current_user_details['user_data'];
        $response = cretate_client_api_call($user_data);
        $request_error = false;
        if (strpos($response, 'cURL Error') === 0) {
            // Handle cURL error
            $request_error = true;
            return $response;
        }
        if (strpos($response, 'HTTP Error') === 0) {
            // Handle cURL error
            $request_error = true;
            return $response;
        }
        if ($request_error == false) {
            // Process the successful response
            $json_decoded_data = convert_json_resonse_to_array($response);
            update_user_meta($current_user_details['user_id'], 'complyc_client_id', $json_decoded_data['id']);

            $response = generate_web_sdk($user_id);

            $request_error = false;
            if (strpos($response, 'cURL Error') === 0) {
                // Handle cURL error
                $request_error = true;
                return $response;
            }
            if (strpos($response, 'HTTP Error') === 0) {
                // Handle cURL error
                $request_error = true;
                return $response;
            }
            if ($request_error == false) {
                // Process the successful response
                $jd_websdk_response =  convert_json_resonse_to_array($response);
                update_user_meta($current_user_details['user_id'], 'complyc_websdk_token', $jd_websdk_response['token']);
            }
        }
        $all_cc_to_sdk = array(
            'request_error' => $request_error,
            'api_response' => $response,
            'jd_websdk_response' => $jd_websdk_response
        );
        return $all_cc_to_sdk;
    } else {
        return 'Error while gettings user data';
    }
}
// create_client();
function cretate_client_api_call($user_data_ab)
{
    // echo 'abtest is testing';
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.complycube.com/v1/clients',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $user_data_ab,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: live_Nm1kQ2ZRRmczUFlSY0NBd2c6ZmE1MWI0ZjM3OWM1Mjk1OTRmODZkNDg4MGZlOGVkNDdiZjFiNzcwNTljZTFmNzg4MGIyYTRlMzk0YjQzYWM1MA=='
        ),
    ));

    $response = curl_exec($curl);
    // Check for errors
    if (curl_errno($curl)) {
        $errorMessage = curl_error($curl);
        curl_close($curl);
        return 'cURL Error: ' . $errorMessage;
    }

    // Get HTTP status code
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($httpCode >= 400) {
        return 'HTTP Error ' . $httpCode . ' : ' . $response;
    }
    // Close cURL session
    curl_close($curl);
    // Process the response
    return $response;
}

// $cc_response = cretate_client();
// $cc_response_array = convert_json_resonse_to_array($cc_response);

// update_option('cc_id_test', $cc_response_array['id']);

// echo '<pre>';
// print_r($ad__doc_api_response);
// echo '</pre>';

function convert_json_resonse_to_array($json_data)
{
    // Decode JSON response
    $data = json_decode($json_data, true); // The second parameter determines whether to convert JSON objects to associative arrays

    // Check if decoding was successful
    if ($data === null) {
    } else {
        return $data;
    }
}

function generate_web_sdk($user_id)
{
    // $current_user_details = get_current_user_details();
    // if ($current_user_details['user_data_error'] == false) {
    //     $user_id = $current_user_details['user_id'];
    // }
    if (!empty($user_id)) {
        $complyc_client_id = get_user_meta($user_id, 'complyc_client_id', true);
        $gws_postdield = array(
            'clientId' => $complyc_client_id,
            'referrer' => "*://*/*"
        );

        $je_gws_postdield = json_encode($gws_postdield);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.complycube.com/v1/tokens');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $je_gws_postdield);

        $headers = array();
        $headers[] = 'Authorization: live_Nm1kQ2ZRRmczUFlSY0NBd2c6ZmE1MWI0ZjM3OWM1Mjk1OTRmODZkNDg4MGZlOGVkNDdiZjFiNzcwNTljZTFmNzg4MGIyYTRlMzk0YjQzYWM1MA==';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        // Check for errors
        if (curl_errno($ch)) {
            $errorMessage = curl_error($ch);
            curl_close($ch);
            return 'cURL Error: ' . $errorMessage;
        }
        // Get HTTP status code
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpCode >= 400) {
            return 'HTTP Error ' . $httpCode . ' : ' . $response;
        }
        // Close cURL session
        curl_close($ch);
        // Process the response
        return $response;
    }
}

function get_current_user_details($user_id)
{
    $user_data_error = true;
    // $current_user = wp_get_current_user();
    $current_user = get_userdata($user_id);
    $current_userid = $user_id;
    // echo $username = $current_user->user_login;
    $first_name = $current_user->first_name;
    $last_name = $current_user->last_name;
    $user_email = $current_user->user_email;
    $phone_number = get_user_meta($current_userid, 'mobile_phone', true);
    if (!empty($first_name && $last_name && $user_email)) {
        $user_data_error = false;
        $user_details = array(
            'type' => "person",
            'email' => $user_email,
            'personDetails' => array(
                'firstName' => $first_name,
                'lastName' => $last_name
            )
        );
        $json_encode_data = json_encode($user_details);
        $user_data = $json_encode_data;
    } else {
        $user_data_error = true;
        $user_data = 'Error while getting user required data';
    }
    $current_user_details = array(
        'user_id' => $current_userid,
        'user_data' => $user_data,
        'user_data_error' => $user_data_error
    );
    return $current_user_details;
}
add_shortcode('ab_complycube_snippet', 'ab_complycube_snippet');

function ab_complycube_snippet()
{
    ob_start();
    if (isset($_GET['lb_user_id']) && !empty($_GET['lb_user_id'])) {
        $user_id = $_GET['lb_user_id'];
        $current_user_details = get_current_user_details($user_id);
        if ($current_user_details['user_data_error'] == false) {
            // $user_id_ab = $current_user_details['user_id'];
            $complyc_client_id = get_user_meta($user_id, 'complyc_client_id', true);
            if (empty($complyc_client_id)) {
                $all_cc_to_sdk = create_client($user_id);
                $request_error = $all_cc_to_sdk['request_error'];
                if ($request_error == true) {
                    return 'Something went wrong: ' . $all_cc_to_sdk['response'];
                } else {
                    $jd_websdk_response = $all_cc_to_sdk['jd_websdk_response'];

                    $websdk_token = $jd_websdk_response['token'];
                }
            } else {
                $response = generate_web_sdk($user_id);
                $request_error = false;
                if (strpos($response, 'cURL Error') === 0) {
                    // Handle cURL error
                    $request_error = true;
                    return $response;
                }
                if (strpos($response, 'HTTP Error') === 0) {
                    // Handle cURL error
                    $request_error = true;
                    return $response;
                }
                if ($request_error == false) {
                    // Process the successful response
                    $jd_websdk_response =  convert_json_resonse_to_array($response);
                    update_user_meta($current_user_details['user_id'], 'complyc_websdk_token', $jd_websdk_response['token']);
                    $websdk_token = $jd_websdk_response['token'];
                }
            }

            // echo '<pre>'; 
            // print_r($websdk_token);
            // echo '</pre>'; 
            // else {
            //     $websdk_token = $complyc_websdk_token;
            // }
            if (!empty($websdk_token)) {

?>
                <!-- Place this in your </head> tag -->
                <script src="https://assets.complycube.com/web-sdk/v1/complycube.min.js"></script>

                <link rel="stylesheet" href="https://assets.complycube.com/web-sdk/v1/style.css" />
                <!-- Place this in your </body> tag -->
                <div id="complycube-mount"></div>

                <button onClick="startVerification()" class="lb_verification-btn">
                    Start verification
                </button>
                <script>
                    var complycube = {};

                    function startVerification() {
                        complycube = ComplyCube.mount({
                            token: "<?php echo $websdk_token; ?>",
                            onComplete: function(data) {
                                // console.log("Capture complete", data)
                                // // console.log("Document ID", data.documentCapture.documentId);
                                // // console.log("FacecaptureID", data.faceCapture.livePhotoId);

                                var documentId = data.documentCapture.documentId;
                                var livePhotoId = data.faceCapture.livePhotoId;
                                // lb_run_check(documentId, livePhotoId);
                                var doc_id = "6642033e7edfbc000851e5f9";
                                var photo_id = "664203647edfbc000851e611";
                                var client_id = "664203376b0b0c000894c586";
                                data = {
                                    'documentId': documentId,
                                    'livePhotoId': livePhotoId,
                                    'lb_user_id': "<?php echo $user_id; ?>",
                                    'action': 'lucky_by_identity_check',
                                }
                                jQuery.ajax({
                                    url: "<?php echo admin_url('admin-ajax.php') ?>",
                                    data: data,
                                    async: true,
                                    type: 'POST',
                                    dataType: 'json',
                                    beforeSend: function() {

                                    },
                                    success: function(response) {
                                        console.log(response);
                                        if (response.user_identity_check == true) {
                                            window.location.href = "<?php echo home_url('/verification-page?lb_verified=true'); ?>";
                                        } else {
                                            window.location.href = "<?php echo home_url('/verification-page?lb_unverified=true'); ?>";
                                        }
                                    }
                                });
                            },
                            onModalClose: function() {
                                // Handle the modal closure attempt
                                complycube.updateSettings({
                                    isModalOpen: false
                                })
                            },
                            onError: function({
                                type,
                                message
                            }) {
                                if (type === 'token_expired') {
                                    // Request a new SDK token
                                } else {
                                    // Handle other errors
                                    console.err(message);
                                }
                            }
                        });

                    }
                </script>
<?php

            }
        } else {
            return 'Missing required user details';
        }
    }
    return ob_get_clean();
}

// Call check api call to request user identity check
function lb_run_check_php($doc_id, $live_photo_id, $client_id)
{

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.complycube.com/v1/checks',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "clientId": "' . $client_id . '",
        "documentId": "' . $doc_id . '",
        "livePhotoId": "' . $live_photo_id . '",
        "type": "identity_check"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: live_Nm1kQ2ZRRmczUFlSY0NBd2c6ZmE1MWI0ZjM3OWM1Mjk1OTRmODZkNDg4MGZlOGVkNDdiZjFiNzcwNTljZTFmNzg4MGIyYTRlMzk0YjQzYWM1MA=='
        ),
    ));

    $response = curl_exec($curl);
    // Check for errors
    if (curl_errno($curl)) {
        $errorMessage = curl_error($curl);
        curl_close($curl);
        return 'cURL Error: ' . $errorMessage;
    }

    // Get HTTP status code
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($httpCode >= 400) {
        return 'HTTP Error ' . $httpCode . ' : ' . $response;
    }
    // Close cURL session
    curl_close($curl);
    // Process the response
    return $response;
}


// lb_run_check_php ajax request
add_action('wp_ajax_lucky_by_identity_check', 'lucky_by_identity_check_ajax_handler');

add_action('wp_ajax_nopriv_lucky_by_identity_check', 'lucky_by_identity_check_ajax_handler');

function lucky_by_identity_check_ajax_handler()
{
    $user_identity_check = false;
    if (!empty($_POST['documentId'])) {
        $doc_id = $_POST['documentId'];
    }
    if (!empty($_POST['livePhotoId'])) {
        $live_photo_id = $_POST['livePhotoId'];
    }
    if (!empty($_POST['lb_user_id'])) {
        $user_id = $_POST['lb_user_id'];
    }
    $complyc_client_id = '';
    $current_user_details = get_current_user_details($user_id);
    if ($current_user_details['user_data_error'] == false) {
        $user_id = $current_user_details['user_id'];
        $complyc_client_id = get_user_meta($user_id, 'complyc_client_id', true);

        $lb_runcheck_response = lb_run_check_php($doc_id, $live_photo_id, $complyc_client_id);
        $request_error = false;
        if (strpos($lb_runcheck_response, 'cURL Error') === 0) {
            // Handle cURL error
            $request_error = true;
            return $lb_runcheck_response;
        }
        if (strpos($lb_runcheck_response, 'HTTP Error') === 0) {
            // Handle cURL error
            $request_error = true;
            return $lb_runcheck_response;
        }
        if ($request_error == false) {
            $lb_check_decoded = convert_json_resonse_to_array($lb_runcheck_response);
            update_user_meta($user_id, 'complyc_check_request_id', $lb_check_decoded['id']);
            update_user_meta($user_id, 'complyc_check_request_response', $lb_check_decoded);

            $lb_checkresult_response = get_check_result($lb_check_decoded['id']);

            $request_error = false;
            if (strpos($lb_runcheck_response, 'cURL Error') === 0) {
                // Handle cURL error
                $request_error = true;
                return $lb_runcheck_response;
            }
            if (strpos($lb_runcheck_response, 'HTTP Error') === 0) {
                // Handle cURL error
                $request_error = true;
                return $lb_runcheck_response;
            }
            if ($request_error == false) {
                $lb_checkresult_response_decoded = convert_json_resonse_to_array($lb_checkresult_response);
                update_user_meta($user_id, 'complyc_get_check_result', $lb_checkresult_response_decoded);

                if ($lb_checkresult_response_decoded['result']['outcome'] == 'clear') {
                    $user_identity_check = true;
                    // wp_logout();
                    // wp_redirect(home_url('/verification-page?lb_verified=true'));
                    // exit;
                }
            }
        }
    }
    $final_chcek = array(
        'user_identity_check' => $user_identity_check
    );
    wp_send_json($final_chcek);
}

// get comply cube check result based on check id receive via check request
function get_check_result($check_id)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.complycube.com/v1/checks/' . $check_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: live_Nm1kQ2ZRRmczUFlSY0NBd2c6ZmE1MWI0ZjM3OWM1Mjk1OTRmODZkNDg4MGZlOGVkNDdiZjFiNzcwNTljZTFmNzg4MGIyYTRlMzk0YjQzYWM1MA=='
        ),
    ));

    $response = curl_exec($curl);
    // Check for errors
    if (curl_errno($curl)) {
        $errorMessage = curl_error($curl);
        curl_close($curl);
        return 'cURL Error: ' . $errorMessage;
    }

    // Get HTTP status code
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    if ($httpCode >= 400) {
        return 'HTTP Error ' . $httpCode . ' : ' . $response;
    }
    // Close cURL session
    curl_close($curl);
    // Process the response
    return $response;
}
// Check if user is verified before allowing login
function custom_check_user_verification($user)
{

    $user_id_exclude = array('37', '18', '17', '12', '22', '6', '1');
    $user_info = get_userdata($user->ID);

    // Assuming 'user_verified' is a meta field that stores whether the user is verified or not
    $complyc_get_check_result = get_user_meta($user->ID, 'complyc_get_check_result', true);
    if (!in_array($user->ID, $user_id_exclude)) {
        if ($complyc_get_check_result['result']['outcome'] != 'clear') {
            wp_logout();
            wp_redirect(home_url('/verification-page?lb_unverified=true'));
            exit;
        }
    }
    return $user;
}
add_filter('wp_authenticate_user', 'custom_check_user_verification', 10, 1);

// Customize login error message for unverified users
function custom_login_error_message($error)
{
    if (isset($_GET['lb_unverified']) && $_GET['lb_unverified'] == 'true') {
        $error = 'Your account has not been verified. Please check your email for the verification link.';
    }
    return $error;
}
add_filter('login_errors', 'custom_login_error_message');
