<?php

/* Template Name: Request to Book Template */
$property_id = check_property_id_and_redirect();

get_header();
?>

<style>
    footer {
        display: none;
    }
</style>


<?php
// Retrieve parameters from the URL
$charge_type = get_field('charge_type', $property_id);
$price = get_field('price', $property_id);

if($charge_type==='hourly') {
    $date = isset($_GET['date']) ? sanitize_text_field($_GET['date']) : null;
    $start_time = isset($_GET['start_time']) ? sanitize_text_field($_GET['start_time']) : null;
    $end_time = isset($_GET['end_time']) ? sanitize_text_field($_GET['end_time']) : null;
    
    if ($start_time !== null && $end_time !== null) {
    $start_time = (int)$start_time;
    $end_time = (int)$end_time;
    
    $formatted_start_time = convert_minutes_to_time($start_time);
    $formatted_end_time = convert_minutes_to_time($end_time);

    // Calculate the difference in minutes
    $difference_in_minutes = $end_time - $start_time;

    // Convert minutes to hours
    $hours = $difference_in_minutes / 60;

    // echo "The difference in hours is: " . $hours . " hours";
    }
    
    $total_hourly_price = $price * $hours;
}

// echo '<pre>';
// echo $date;
// echo '<br>';
// echo $start_time;
// echo '<br>';
// echo $end_time;
// echo '</pre>';

if($charge_type==='nightly') {
    $start_date = isset($_GET['start_date']) ? sanitize_text_field($_GET['start_date']) : '';
    $end_date = isset($_GET['end_date']) ? sanitize_text_field($_GET['end_date']) : '';
}
$adults = isset($_GET['adults']) ? intval($_GET['adults']) : 0;
$childrens = isset($_GET['childrens']) ? intval($_GET['childrens']) : 0;
$infants = isset($_GET['infants']) ? intval($_GET['infants']) : 0;
$pets = isset($_GET['pets']) ? intval($_GET['pets']) : 0;
// $property_id = isset($_GET['property_id']) ? intval($_GET['property_id']) : 0;


$propertytitle = get_the_title($property_id);
$property_content = get_post_field('post_content', $property_id);
$host_name = get_post_field('host_name', $property_id);
$property_permalink = get_permalink($property_id);
$trimmed_content = wp_trim_words($property_content, 10, ''); // Trim content to 15 words

// Calculate the number of days between start date and end date
if($charge_type==='nightly') {
$start_datetime = new DateTime($start_date);
$end_datetime = new DateTime($end_date);
$interval = $start_datetime->diff($end_datetime);
$number_of_days = $interval->days;

// Calculate the total price
$total_price = $price * $number_of_days;
}


// Retrieve the 'property_gallery' ACF field for the property
$property_gallery = get_field('property_gallery', $property_id);

// Check if the property_gallery field is an array and not empty
if (is_array($property_gallery) && !empty($property_gallery)) {
    // Retrieve the first image from the property_gallery array
    $first_image = $property_gallery[0];
    // Output the URL of the first image

} else {
    echo 'No images found for this property.';
}


$guests = $adults + $childrens;



?>






<section class="top-pages-links">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="links">
                    <ul>
                        <li><a href="<?php echo site_url();?>">Home</a> <span>></span></li>
                        <li><a href="<?php echo $property_permalink;?>"><?php echo $propertytitle; ?></a> <span>></span></li>
                        <li><a href="javascript:void(0);" class="active">Request to Book</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="request-to-book-sec-01">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="main-heading">
                    <h2>Request to Book</h2>
                </div>
                <div class="main-border-box">
                    <div class="two-contents">
                        <h3>Your Reservation</h3>
                    </div>
                    <div class="three-reservation-boxes">


                        <div class="box">
                            <div class="tow-content">
                                <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.53814 14.3334C3.20139 14.3334 2.91634 14.2167 2.68301 13.9834C2.44967 13.7501 2.33301 13.465 2.33301 13.1283L2.33301 4.20523C2.33301 3.86847 2.44967 3.58343 2.68301 3.35009C2.91634 3.11676 3.20139 3.00009 3.53814 3.00009L4.46122 3.00009V1.58984H5.48684V3.00009L10.5381 3.00009V1.58984L11.5381 1.58984V3.00009H12.4612C12.7979 3.00009 13.083 3.11676 13.3163 3.35009C13.5496 3.58343 13.6663 3.86847 13.6663 4.20523L13.6663 13.1283C13.6663 13.465 13.5496 13.7501 13.3163 13.9834C13.083 14.2167 12.7979 14.3334 12.4612 14.3334L3.53814 14.3334ZM3.53814 13.3334L12.4612 13.3334C12.5125 13.3334 12.5595 13.312 12.6022 13.2693C12.645 13.2266 12.6663 13.1795 12.6663 13.1283L12.6663 6.87189L3.33299 6.87189L3.33299 13.1283C3.33299 13.1795 3.35436 13.2266 3.39709 13.2693C3.43984 13.312 3.48685 13.3334 3.53814 13.3334ZM3.33299 5.87191L12.6663 5.87191V4.20523C12.6663 4.15394 12.645 4.10692 12.6022 4.06418C12.5595 4.02144 12.5125 4.00008 12.4612 4.00008L3.53814 4.00008C3.48685 4.00008 3.43984 4.02144 3.39709 4.06418C3.35436 4.10692 3.33299 4.15394 3.33299 4.20523L3.33299 5.87191ZM7.99966 9.38469C7.83641 9.38469 7.69731 9.32722 7.58236 9.21226C7.4674 9.0973 7.40992 8.9582 7.40992 8.79496C7.40992 8.63172 7.4674 8.49262 7.58236 8.37766C7.69731 8.2627 7.83641 8.20523 7.99966 8.20523C8.1629 8.20523 8.302 8.2627 8.41696 8.37766C8.53191 8.49262 8.58939 8.63172 8.58939 8.79496C8.58939 8.9582 8.53191 9.0973 8.41696 9.21226C8.302 9.32722 8.1629 9.38469 7.99966 9.38469ZM5.33299 9.38469C5.16975 9.38469 5.03065 9.32722 4.91569 9.21226C4.80074 9.0973 4.74326 8.9582 4.74326 8.79496C4.74326 8.63172 4.80074 8.49262 4.91569 8.37766C5.03065 8.2627 5.16975 8.20523 5.33299 8.20523C5.49624 8.20523 5.63534 8.2627 5.75029 8.37766C5.86525 8.49262 5.92272 8.63172 5.92272 8.79496C5.92272 8.9582 5.86525 9.0973 5.75029 9.21226C5.63534 9.32722 5.49624 9.38469 5.33299 9.38469ZM10.6663 9.38469C10.5031 9.38469 10.364 9.32722 10.249 9.21226C10.1341 9.0973 10.0766 8.9582 10.0766 8.79496C10.0766 8.63172 10.1341 8.49262 10.249 8.37766C10.364 8.2627 10.5031 8.20523 10.6663 8.20523C10.8296 8.20523 10.9687 8.2627 11.0836 8.37766C11.1986 8.49262 11.2561 8.63172 11.2561 8.79496C11.2561 8.9582 11.1986 9.0973 11.0836 9.21226C10.9687 9.32722 10.8296 9.38469 10.6663 9.38469ZM7.99966 12.0001C7.83641 12.0001 7.69731 11.9426 7.58236 11.8276C7.4674 11.7127 7.40992 11.5736 7.40992 11.4103C7.40992 11.2471 7.4674 11.108 7.58236 10.993C7.69731 10.8781 7.83641 10.8206 7.99966 10.8206C8.1629 10.8206 8.302 10.8781 8.41696 10.993C8.53191 11.108 8.58939 11.2471 8.58939 11.4103C8.58939 11.5736 8.53191 11.7127 8.41696 11.8276C8.302 11.9426 8.1629 12.0001 7.99966 12.0001ZM5.33299 12.0001C5.16975 12.0001 5.03065 11.9426 4.91569 11.8276C4.80074 11.7127 4.74326 11.5736 4.74326 11.4103C4.74326 11.2471 4.80074 11.108 4.91569 10.993C5.03065 10.8781 5.16975 10.8206 5.33299 10.8206C5.49624 10.8206 5.63534 10.8781 5.75029 10.993C5.86525 11.108 5.92272 11.2471 5.92272 11.4103C5.92272 11.5736 5.86525 11.7127 5.75029 11.8276C5.63534 11.9426 5.49624 12.0001 5.33299 12.0001ZM10.6663 12.0001C10.5031 12.0001 10.364 11.9426 10.249 11.8276C10.1341 11.7127 10.0766 11.5736 10.0766 11.4103C10.0766 11.2471 10.1341 11.108 10.249 10.993C10.364 10.8781 10.5031 10.8206 10.6663 10.8206C10.8296 10.8206 10.9687 10.8781 11.0836 10.993C11.1986 11.108 11.2561 11.2471 11.2561 11.4103C11.2561 11.5736 11.1986 11.7127 11.0836 11.8276C10.9687 11.9426 10.8296 12.0001 10.6663 12.0001Z" fill="#484848" />
                                    </svg>
                                </span>
                                <?php if($charge_type==='nightly'): ?>
                                <p> <b>Date:</b> <?php echo $start_date; ?> - <?php echo $end_date; ?></p>
                                <?php else: ?>
                                <p> <b>Date:</b> <?php echo $date; ?> <b>Time:</b> <?php echo $formatted_start_time ?> - <?php echo $formatted_end_time; ?></p>
                                <?php endif; ?>
                            </div>

                            <button type="button" class="share edit-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop15" <?php if($charge_type==='nightly'): ?>data-start_date="<?php echo $start_date; ?>" data-end_date="<?php echo $end_date; ?>"<?php else: ?>data-date="<?php echo $date; ?>" data-start-time="<?php echo $start_time; ?>" data-end-time="<?php echo $end_time; ?>"<?php endif; ?>>
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.33299 12.6653H4.17401L10.9984 5.84096L10.1574 4.99995L3.33299 11.8243V12.6653ZM2.33301 13.6653V11.4089L11.1266 2.61921C11.2274 2.52765 11.3387 2.45689 11.4605 2.40695C11.5824 2.357 11.7101 2.33203 11.8438 2.33203C11.9774 2.33203 12.1069 2.35575 12.2322 2.4032C12.3575 2.45063 12.4684 2.52605 12.565 2.62946L13.3791 3.45381C13.4825 3.55039 13.5563 3.66153 13.6003 3.78722C13.6443 3.91289 13.6663 4.03857 13.6663 4.16425C13.6663 4.2983 13.6434 4.42624 13.5976 4.54805C13.5518 4.66987 13.479 4.78119 13.3791 4.882L4.58939 13.6653H2.33301ZM10.5705 5.42783L10.1574 4.99995L10.9984 5.84096L10.5705 5.42783Z" fill="#484848" />
                                </svg>
                                Edit</button>

                        </div>







                        <!--                    <div class="box">-->
                        <!--                        <div class="tow-content">-->
                        <!--                            <span><svg width="16" height="16" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                        <!--<path d="M12.9731 14.5269L14.0269 13.4731L10.25 9.6959V4.99998H8.75V10.3038L12.9731 14.5269ZM9.50165 19.5C8.18772 19.5 6.95268 19.2506 5.79655 18.752C4.6404 18.2533 3.63472 17.5765 2.7795 16.7217C1.92427 15.8669 1.24721 14.8616 0.748325 13.706C0.249442 12.5504 0 11.3156 0 10.0017C0 8.68772 0.249333 7.45268 0.748 6.29655C1.24667 5.1404 1.92342 4.13472 2.77825 3.2795C3.6331 2.42427 4.63834 1.74721 5.79398 1.24833C6.94959 0.749443 8.18437 0.5 9.4983 0.5C10.8122 0.5 12.0473 0.749334 13.2034 1.248C14.3596 1.74667 15.3652 2.42342 16.2205 3.27825C17.0757 4.1331 17.7527 5.13834 18.2516 6.29398C18.7505 7.44959 19 8.68437 19 9.9983C19 11.3122 18.7506 12.5473 18.252 13.7034C17.7533 14.8596 17.0765 15.8652 16.2217 16.7205C15.3669 17.5757 14.3616 18.2527 13.206 18.7516C12.0504 19.2505 10.8156 19.5 9.50165 19.5ZM9.49998 18C11.7166 18 13.6041 17.2208 15.1625 15.6625C16.7208 14.1041 17.5 12.2166 17.5 9.99998C17.5 7.78331 16.7208 5.89581 15.1625 4.33748C13.6041 2.77914 11.7166 1.99998 9.49998 1.99998C7.28331 1.99998 5.39581 2.77914 3.83748 4.33748C2.27914 5.89581 1.49998 7.78331 1.49998 9.99998C1.49998 12.2166 2.27914 14.1041 3.83748 15.6625C5.39581 17.2208 7.28331 18 9.49998 18Z" fill="#484848"/>-->
                        <!--</svg>-->

                        <!--                            </span>-->
                        <!--                            <p> <b>Time:</b> 12:00PM - 2:00PM</p>-->
                        <!--                        </div>-->

                        <!--                        <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop16"> <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">-->
                        <!--                                <path d="M3.33299 12.6653H4.17401L10.9984 5.84096L10.1574 4.99995L3.33299 11.8243V12.6653ZM2.33301 13.6653V11.4089L11.1266 2.61921C11.2274 2.52765 11.3387 2.45689 11.4605 2.40695C11.5824 2.357 11.7101 2.33203 11.8438 2.33203C11.9774 2.33203 12.1069 2.35575 12.2322 2.4032C12.3575 2.45063 12.4684 2.52605 12.565 2.62946L13.3791 3.45381C13.4825 3.55039 13.5563 3.66153 13.6003 3.78722C13.6443 3.91289 13.6663 4.03857 13.6663 4.16425C13.6663 4.2983 13.6434 4.42624 13.5976 4.54805C13.5518 4.66987 13.479 4.78119 13.3791 4.882L4.58939 13.6653H2.33301ZM10.5705 5.42783L10.1574 4.99995L10.9984 5.84096L10.5705 5.42783Z" fill="#484848" />-->
                        <!--                            </svg>-->
                        <!--                            Edit</button>-->

                        <!--                    </div>-->
                        <div class="box">
                            <div class="tow-content">
                                <span><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.666992 13.3346L0.666992 11.7122C0.666992 11.336 0.762607 11.0004 0.953838 10.7052C1.14506 10.41 1.40043 10.1803 1.71996 10.0162C2.40309 9.67691 3.09001 9.41536 3.78071 9.2315C4.47143 9.04765 5.23057 8.95572 6.05814 8.95572C6.88571 8.95572 7.64484 9.04765 8.33555 9.2315C9.02626 9.41536 9.71319 9.67691 10.3963 10.0162C10.7158 10.1803 10.9712 10.41 11.1624 10.7052C11.3537 11.0004 11.4493 11.336 11.4493 11.7122V13.3346H0.666992ZM12.8869 13.3346V11.6224C12.8869 11.1433 12.7714 10.6867 12.5403 10.2527C12.3093 9.81861 11.9815 9.44617 11.5571 9.13536C12.0391 9.20835 12.4966 9.32133 12.9298 9.47432C13.3629 9.6273 13.7762 9.80811 14.1697 10.0168C14.5411 10.2179 14.8279 10.455 15.0302 10.7281C15.2325 11.0011 15.3337 11.2992 15.3337 11.6224V13.3346H12.8869ZM6.05814 7.77672C5.36629 7.77672 4.77401 7.5266 4.28132 7.02638C3.78863 6.52614 3.54228 5.9248 3.54228 5.22235C3.54228 4.51989 3.78863 3.91855 4.28132 3.41832C4.77401 2.91809 5.36629 2.66797 6.05814 2.66797C6.74999 2.66797 7.34227 2.91809 7.83496 3.41832C8.32764 3.91855 8.57398 4.51989 8.57398 5.22235C8.57398 5.9248 8.32764 6.52614 7.83496 7.02638C7.34227 7.5266 6.74999 7.77672 6.05814 7.77672ZM12.2648 5.22235C12.2648 5.9248 12.0185 6.52614 11.5258 7.02638C11.0331 7.5266 10.4408 7.77672 9.74897 7.77672C9.66787 7.77672 9.56466 7.76736 9.43933 7.74865C9.31401 7.72995 9.2108 7.70936 9.1297 7.68691C9.41318 7.34089 9.63104 6.95701 9.78327 6.53529C9.93551 6.11358 10.0116 5.67564 10.0116 5.22148C10.0116 4.76733 9.93399 4.33113 9.77871 3.91287C9.62343 3.49463 9.4071 3.10961 9.1297 2.75779C9.23291 2.72036 9.33612 2.69604 9.43933 2.68481C9.54255 2.67358 9.64576 2.66797 9.74897 2.66797C10.4408 2.66797 11.0331 2.91809 11.5258 3.41832C12.0185 3.91855 12.2648 4.51989 12.2648 5.22235ZM1.74521 12.2399H10.3711V11.7122C10.3711 11.5597 10.3335 11.424 10.2584 11.3052C10.1833 11.1863 10.0642 11.0825 9.90107 10.9936C9.30942 10.6839 8.70027 10.4493 8.07361 10.2897C7.44694 10.1302 6.77512 10.0504 6.05814 10.0504C5.34116 10.0504 4.66934 10.1302 4.04267 10.2897C3.41601 10.4493 2.80686 10.6839 2.21521 10.9936C2.0521 11.0825 1.93298 11.1863 1.85786 11.3052C1.78276 11.424 1.74521 11.5597 1.74521 11.7122V12.2399ZM6.05814 6.68201C6.45349 6.68201 6.79194 6.53908 7.07348 6.25323C7.35501 5.96738 7.49578 5.62376 7.49578 5.22235C7.49578 4.82095 7.35501 4.47732 7.07348 4.19147C6.79194 3.90562 6.45349 3.76269 6.05814 3.76269C5.66279 3.76269 5.32434 3.90562 5.0428 4.19147C4.76126 4.47732 4.6205 4.82095 4.6205 5.22235C4.6205 5.62376 4.76126 5.96738 5.0428 6.25323C5.32434 6.53908 5.66279 6.68201 6.05814 6.68201Z" fill="#484848" />
                                    </svg>

                                </span>
                                <p> <?php
                                    if ($guests > 0 || $infants > 0 || $pets > 0) {
                                        echo '<p><b>Guests:</b> ';
                                        $hasValue = false; // Flag to track if any value has been printed
                                        if ($guests > 0) {
                                            echo $guests . ' Guests';
                                            $hasValue = true; // Set flag to true if a value is printed
                                        }
                                        if ($infants > 0) {
                                            // If a value has been printed before, add a comma before printing the next value
                                            echo ($hasValue ? ', ' : '') . $infants . ' Infants';
                                            $hasValue = true; // Set flag to true if a value is printed
                                        }
                                        if ($pets > 0) {
                                            // If a value has been printed before, add a comma before printing the next value
                                            echo ($hasValue ? ', ' : '') . $pets . ' Pets';
                                        }
                                        echo '</p>';
                                    } else {
                                        echo '<p><b>Guests:</b> No guests selected</p>';
                                    }
                                    ?>


                                </p>
                            </div>




                            <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop14" data-adults="<?php echo $adults; ?>" data-childrens="<?php echo $childrens; ?>" data-infants="<?php echo $infants; ?>" data-pets="<?php echo $pets; ?>"> <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.33299 12.6653H4.17401L10.9984 5.84096L10.1574 4.99995L3.33299 11.8243V12.6653ZM2.33301 13.6653V11.4089L11.1266 2.61921C11.2274 2.52765 11.3387 2.45689 11.4605 2.40695C11.5824 2.357 11.7101 2.33203 11.8438 2.33203C11.9774 2.33203 12.1069 2.35575 12.2322 2.4032C12.3575 2.45063 12.4684 2.52605 12.565 2.62946L13.3791 3.45381C13.4825 3.55039 13.5563 3.66153 13.6003 3.78722C13.6443 3.91289 13.6663 4.03857 13.6663 4.16425C13.6663 4.2983 13.6434 4.42624 13.5976 4.54805C13.5518 4.66987 13.479 4.78119 13.3791 4.882L4.58939 13.6653H2.33301ZM10.5705 5.42783L10.1574 4.99995L10.9984 5.84096L10.5705 5.42783Z" fill="#484848" />
                                </svg>
                                Edit</button>

                        </div>
                    </div>
                </div>
				
				<div class="main-border-box">
                    <div class="two-contents">
                        <h3>Message the Host</h3>
                        <p>Share why you're traveling, who's coming with you, and what<br> you love about the space.</p>
                        <div class="img-box">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hosted-person.png" alt="">
                            <div class="content-box">
                                <h6>Hosted by <?php echo $host_name;?>.</h6>
                                <p>Superhost · 7 years hosting</p>
                            </div>
                        </div>
                        <textarea id="host-message" placeholder="Your Message" required></textarea>
                        <p class="text-danger" id="host-error-message" style="display: none;">Message is required.</p>
                    </div>

                </div>
				<?php if (is_user_logged_in()) : ?>
                <div class="main-border-box">
                    <div class="add-card-details-box pay-with">
                        <div class="text">
                            <h3>Pay With</h3>
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2024/03/Payment-Methods.png" alt="">
                        </div>

                        <form id="payment-form">
                            <label for="select-card" class="select-card-payment" id="select-drop-down-icon">Select Payment Method</label>
                            <select name="select-card" id="select-card" required="">
                                <option value="">Select payment method</option>
                                <option value="paypal">Paypal</option>
                                <!--<option value="google_pay">Google Pay</option>-->
                                <option value="stripe">Stripe</option>
                            </select>

                            <div id="debit-button" style="display: none;">
                                <!--<div id="debit-button"></div>-->
                            </div>
                            

                            <div id="paypal-buttons" style="display: none;">
                                <div id="paypal-buttons" style="display: none;"></div>
                            </div>

                            <div id="google-pay-button" style="display: none;">
                                <!--<button id="google-pay-button">Google Button</button>-->
                            </div>
                            
                            
                            <div id="stripe-pay-button" style="display: none;">
                                  <!--<form id="stripe-payment-form">-->
                                  <div id="stripe-payment-element">
                                    <!--Stripe.js injects the Payment Element-->
                                  </div>
                                  <button class="stripe-submit" id="submit">
                                    <div class="spinner hidden" id="spinner"></div>
                                    <span id="button-text">Pay now</span>
                                  </button>
                                  <div id="payment-message" class="hidden"></div>
                                <!--</form>-->
                            </div>
                        </form>
                    </div>
                    <div class="your-reservation-box">
                        <div class="svg-box">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="60" height="60" rx="30" fill="#4CAF50" fill-opacity="0.1" />
                                <!-- SVG Path -->
                            </svg>
                        </div>
                        <p>Your reservation won’t be confirmed until the Host accepts<br> your request (within 24 hours). You won’t be charged until then.</p>
                    </div>
                </div>
                <?php else : ?>
                   <div class="alert alert-warning mt-4" role="alert">
                    <p class="text-center">Please <span class="login-link" onclick='showLoginModal(true);'>login</span>, to see available payment methods.</p>
                </div>
                <?php endif; ?>
                <!--DebitCard Integration-->
  <script>
        
        var payment_status = false;
        var booking_id = "";
        // jQuery( document ).ready(function($) {
        //     if (payment_status) {
        //         $('.request-booking').prop('disabled', false);
        //     } else {
        //         $('.request-booking').prop('disabled', true);
        //     }
                // });

        function updatePaymentStatus(newStatus) {
            payment_status = newStatus;
            if (payment_status) {
                jQuery('.request-booking').prop('disabled', false);
            } else {
                jQuery('.request-booking').prop('disabled', true);
            }
        }
        
  
        jQuery( document ).ready(function($) {
            updatePaymentStatus(false);
        });

        var selectedPaymentMethod = document.getElementById('select-card')?.value;
    document.getElementById('select-card')?.addEventListener('change', function() {
        selectedPaymentMethod = this.value;
        if (selectedPaymentMethod === 'credit_card') {
            document.getElementById('debit-button').style.display = 'block';
            document.getElementById('paypal-buttons').style.display = 'none';
            document.getElementById('google-pay-button').style.display = 'none';
            document.getElementById('stripe-pay-button').style.display = 'none';
            loadPayPalSDK('credit', 'debit-button');
        } else if (selectedPaymentMethod === 'paypal') {
            document.getElementById('debit-button').style.display = 'block';
            document.getElementById('paypal-buttons').style.display = 'none';
            document.getElementById('google-pay-button').style.display = 'none';
            document.getElementById('stripe-pay-button').style.display = 'none';
            loadPayPalSDK('credit', 'debit-button');
            // loadPayPalSDK('card', 'paypal-buttons');
        } else if (selectedPaymentMethod === 'google_pay') {
            document.getElementById('debit-button').style.display = 'none';
            document.getElementById('paypal-buttons').style.display = 'none';
            document.getElementById('google-pay-button').style.display = 'block';
            document.getElementById('stripe-pay-button').style.display = 'none';
        } else if (selectedPaymentMethod == 'stripe') {
            document.getElementById('debit-button').style.display = 'none';
            document.getElementById('paypal-buttons').style.display = 'none';
            document.getElementById('google-pay-button').style.display = 'none';
            document.getElementById('stripe-pay-button').style.display = 'block'; 
        }
        
        else {
            document.getElementById('debit-button').style.display = 'none';
            document.getElementById('paypal-buttons').style.display = 'none';
            document.getElementById('google-pay-button').style.display = 'none';
            document.getElementById('stripe-pay-button').style.display = 'none';
        }
    });

    function loadPayPalSDK(disabledFunding, targetElementId) {
        var script = document.createElement('script');
        script.src = "https://www.paypal.com/sdk/js?client-id=test&currency=USD&disable-funding=paylater,venmo," + disabledFunding;
        script.setAttribute('data-sdk-integration-source', 'button-factory');
        script.onload = function() {
            // Once the PayPal SDK is loaded, render the PayPal buttons
            renderPayPalButtons(targetElementId);
        };
        document.head.appendChild(script);
    }

    function renderPayPalButtons(targetElementId) {
        var totalAmount = <?php if($charge_type==='nightly') { echo $total_price; } else { echo $total_hourly_price; } ?>;
        // PayPal Integration
        paypal.Buttons({

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: totalAmount
                        }
                    }],
                    application_context: {
                        shipping_preference: 'NO_SHIPPING'
                    }
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    // Handle approval
                    // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    var transaction = orderData.purchase_units[0].payments.captures[0];
                    // console.log('Trans: ',transaction)
                    // console.log('ID: ', orderData.id);
                    updatePaymentStatus(true);
                    let paymentDetails = {
                        transaction_id: orderData.id,  
                        payment_status: 'succeeded',
                        amount: parseFloat(transaction.amount.value),
                        payment_method: 'paypal',
                        payment_method_type: orderData.intent,
                        payment_object :  orderData
                    };
                    // Send AJAX request
                    jQuery.ajax({
                    url: ajax_object.ajax_url, // WordPress AJAX handler URL
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'payment_booking_handler',
                        payment: paymentDetails
                    },
                    success: function(response) {
                    // Handle successful response
                    if(response.success) {
                        booking_id = response.data.booking_id;
                        let url = new URL(window.location.href);
                        // Add a new parameter
                        url.searchParams.set('booking_id', booking_id);
                        // Update the browser's URL without reloading the page
                        window.history.replaceState({}, '', url);
                        console.log("URL Paypal: ",url);
                    }
                    console.log('Paypal Booking Res: ',response);
                    },
                    error: function(xhr, status, error) {
                    // Handle error
                    console.error('Booking Handler: ', xhr.responseText, 'Status: ', status, 'Error: ', error);
                    }
                    });
                    console.log("PayPal Data", orderData);
                    let url = new URL(window.location.href);
                    // Add a new parameter
                    url.searchParams.set('status', orderData.status);
                    // Update the browser's URL without reloading the page
                    window.history.replaceState({}, '', url);
                    console.log("URL Paypal: ",url);
                    const modalMessage = document.querySelector("#staticBackdrop17 .message");
                    modalMessage.textContent = orderData.status;
                    // showModal(true);
                });
            }
        }).render('#' + targetElementId);
    }

    // Load PayPal SDK with default disabled funding option
    loadPayPalSDK('credit', 'debit-button');
</script>





                <!-- Google Pay Integration -->
                <!--<script async src="https://pay.google.com/gp/p/js/pay.js"></script>-->
                <!--<script>-->
                <!--    const baseRequest = {-->
                <!--        apiVersion: 2,-->
                <!--        apiVersionMinor: 0-->
                <!--    };-->

                <!--    const tokenizationSpecification = {-->
                <!--        type: 'PAYMENT_GATEWAY',-->
                <!--        parameters: {-->
                <!--            'gateway': 'Worldpay',-->
                <!--            'gatewayMerchantId': 'worldpay'-->
                <!--        }-->
                <!--    };-->

                <!--    const allowedCardNetworks = ["AMEX", "DISCOVER", "INTERAC", "JCB", "MASTERCARD", "VISA"];-->
                <!--    const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];-->

                <!--    const baseCardPaymentMethod = {-->
                <!--        type: 'CARD',-->
                <!--        parameters: {-->
                <!--            allowedAuthMethods: allowedCardAuthMethods,-->
                <!--            allowedCardNetworks: allowedCardNetworks-->
                <!--        }-->
                <!--    };-->

                <!--    const cardPaymentMethod = Object.assign({-->
                <!--            tokenizationSpecification: tokenizationSpecification-->
                <!--        },-->
                <!--        baseCardPaymentMethod-->
                <!--    );-->

                <!--    const paymentsClient =-->
                <!--        new google.payments.api.PaymentsClient({-->
                <!--            environment: 'TEST'-->
                <!--        });-->

                <!--    const isReadyToPayRequest = Object.assign({}, baseRequest);-->
                <!--    isReadyToPayRequest.allowedPaymentMethods = [baseCardPaymentMethod];-->

                <!--    paymentsClient.isReadyToPay(isReadyToPayRequest)-->
                <!--        .then(function(response) {-->
                <!--            if (response.result) {-->
                                <!--// show Google Pay button-->
                <!--                document.getElementById('google-pay-button').style.display = 'block';-->
                <!--            }-->
                <!--        })-->
                <!--        .catch(function(err) {-->
                            <!--// show error in developer console for debugging-->
                <!--            console.error(err);-->
                <!--        });-->

                <!--    const button =-->
                <!--        paymentsClient.createButton({-->
                <!--            onClick: () => console.log('TODO: click handler'),-->
                <!--            allowedPaymentMethods: []-->
                        <!--}); // same payment methods as for the loadPaymentData() API call-->
                <!--    document.getElementById('google-pay-button').appendChild(button);-->

                <!--    const paymentDataRequest = Object.assign({}, baseRequest);-->

                <!--    paymentDataRequest.transactionInfo = {-->
                <!--        totalPriceStatus: 'FINAL',-->
                <!--        totalPrice: '123.45',-->
                <!--        currencyCode: 'USD',-->
                <!--        countryCode: 'US'-->
                <!--    };-->

                <!--    paymentDataRequest.merchantInfo = {-->
                <!--        merchantName: 'Test',-->
                <!--        merchantId: '5356521336'-->
                <!--    };-->

                <!--    paymentsClient.loadPaymentData(paymentDataRequest).then(function(paymentData) {-->
                        <!--// if using gateway tokenization, pass this token without modification-->
                <!--        paymentToken = paymentData.paymentMethodData.tokenizationData.token;-->
                <!--    }).catch(function(err) {-->
                        <!--// show error in developer console for debugging-->
                <!--        console.error(err);-->
                <!--    });-->
                </script>
                




                <div class="main-border-box">
                    <div class="two-contents">
                        <h3>Cancellation Policy</h3>
                        <p> <b>Free cancellation before <?php echo date('F j, Y', strtotime($start_date)); ?>. </b> Cancel before check-in on<br> <?php echo date('F j, Y', strtotime($start_date)); ?> for a partial refund. <a href="#">Learn more</a> </p>
                    </div>
                </div>
                <div class="main-border-box">
                    <div class="two-contents">
                        <h3>Ground Rules</h3>
                        <ul>
                            <li><svg width="30" height="30" style="margin-top: -4px;" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="30" height="30" rx="15" fill="#F7F7F7" />
                                    <path d="M15.0014 21.3346C14.1255 21.3346 13.3021 21.1684 12.5314 20.8359C11.7606 20.5035 11.0901 20.0523 10.52 19.4824C9.94984 18.9125 9.49846 18.2424 9.16588 17.472C8.83329 16.7015 8.66699 15.8784 8.66699 15.0024C8.66699 14.1264 8.83321 13.3031 9.16566 12.5323C9.4981 11.7616 9.94927 11.0911 10.5192 10.521C11.0891 9.95081 11.7592 9.49944 12.5296 9.16685C13.3001 8.83426 14.1232 8.66797 14.9992 8.66797C15.8751 8.66797 16.6985 8.83419 17.4693 9.16664C18.24 9.49908 18.9105 9.95025 19.4806 10.5201C20.0508 11.09 20.5022 11.7602 20.8347 12.5306C21.1673 13.301 21.3336 14.1242 21.3336 15.0002C21.3336 15.8761 21.1674 16.6995 20.835 17.4702C20.5025 18.241 20.0513 18.9115 19.4815 19.4816C18.9116 20.0518 18.2414 20.5031 17.471 20.8357C16.7006 21.1683 15.8774 21.3346 15.0014 21.3346ZM15.0003 20.3346C15.6258 20.3346 16.2281 20.2288 16.8072 20.0173C17.3864 19.8058 17.9157 19.4996 18.3952 19.0987L10.9029 11.6064C10.5063 12.0859 10.2012 12.6152 9.98749 13.1944C9.77381 13.7735 9.66698 14.3758 9.66698 15.0013C9.66698 16.4902 10.1836 17.7513 11.217 18.7846C12.2503 19.818 13.5114 20.3346 15.0003 20.3346ZM19.0977 18.3962C19.4986 17.9167 19.8048 17.3874 20.0163 16.8082C20.2279 16.2291 20.3336 15.6268 20.3336 15.0013C20.3336 13.5124 19.817 12.2513 18.7836 11.218C17.7503 10.1846 16.4892 9.66795 15.0003 9.66795C14.3733 9.66795 13.7696 9.77265 13.189 9.98205C12.6085 10.1915 12.0806 10.4987 11.6054 10.9039L19.0977 18.3962Z" fill="#484848" />
                                </svg>
                                No Parties</li>
                            <li><svg width="30" height="30" style="margin-top: -4px;" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="30" height="30" rx="15" fill="#F7F7F7" />
                                    <path d="M15.0014 21.3346C14.1255 21.3346 13.3021 21.1684 12.5314 20.8359C11.7606 20.5035 11.0901 20.0523 10.52 19.4824C9.94984 18.9125 9.49846 18.2424 9.16588 17.472C8.83329 16.7015 8.66699 15.8784 8.66699 15.0024C8.66699 14.1264 8.83321 13.3031 9.16566 12.5323C9.4981 11.7616 9.94927 11.0911 10.5192 10.521C11.0891 9.95081 11.7592 9.49944 12.5296 9.16685C13.3001 8.83426 14.1232 8.66797 14.9992 8.66797C15.8751 8.66797 16.6985 8.83419 17.4693 9.16664C18.24 9.49908 18.9105 9.95025 19.4806 10.5201C20.0508 11.09 20.5022 11.7602 20.8347 12.5306C21.1673 13.301 21.3336 14.1242 21.3336 15.0002C21.3336 15.8761 21.1674 16.6995 20.835 17.4702C20.5025 18.241 20.0513 18.9115 19.4815 19.4816C18.9116 20.0518 18.2414 20.5031 17.471 20.8357C16.7006 21.1683 15.8774 21.3346 15.0014 21.3346ZM15.0003 20.3346C15.6258 20.3346 16.2281 20.2288 16.8072 20.0173C17.3864 19.8058 17.9157 19.4996 18.3952 19.0987L10.9029 11.6064C10.5063 12.0859 10.2012 12.6152 9.98749 13.1944C9.77381 13.7735 9.66698 14.3758 9.66698 15.0013C9.66698 16.4902 10.1836 17.7513 11.217 18.7846C12.2503 19.818 13.5114 20.3346 15.0003 20.3346ZM19.0977 18.3962C19.4986 17.9167 19.8048 17.3874 20.0163 16.8082C20.2279 16.2291 20.3336 15.6268 20.3336 15.0013C20.3336 13.5124 19.817 12.2513 18.7836 11.218C17.7503 10.1846 16.4892 9.66795 15.0003 9.66795C14.3733 9.66795 13.7696 9.77265 13.189 9.98205C12.6085 10.1915 12.0806 10.4987 11.6054 10.9039L19.0977 18.3962Z" fill="#484848" />
                                </svg>
                                No Smoking</li>
                            <li><svg width="30" height="30" style="margin-top: -4px;" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="30" height="30" rx="15" fill="#F7F7F7" />
                                    <path d="M15.0014 21.3346C14.1255 21.3346 13.3021 21.1684 12.5314 20.8359C11.7606 20.5035 11.0901 20.0523 10.52 19.4824C9.94984 18.9125 9.49846 18.2424 9.16588 17.472C8.83329 16.7015 8.66699 15.8784 8.66699 15.0024C8.66699 14.1264 8.83321 13.3031 9.16566 12.5323C9.4981 11.7616 9.94927 11.0911 10.5192 10.521C11.0891 9.95081 11.7592 9.49944 12.5296 9.16685C13.3001 8.83426 14.1232 8.66797 14.9992 8.66797C15.8751 8.66797 16.6985 8.83419 17.4693 9.16664C18.24 9.49908 18.9105 9.95025 19.4806 10.5201C20.0508 11.09 20.5022 11.7602 20.8347 12.5306C21.1673 13.301 21.3336 14.1242 21.3336 15.0002C21.3336 15.8761 21.1674 16.6995 20.835 17.4702C20.5025 18.241 20.0513 18.9115 19.4815 19.4816C18.9116 20.0518 18.2414 20.5031 17.471 20.8357C16.7006 21.1683 15.8774 21.3346 15.0014 21.3346ZM15.0003 20.3346C15.6258 20.3346 16.2281 20.2288 16.8072 20.0173C17.3864 19.8058 17.9157 19.4996 18.3952 19.0987L10.9029 11.6064C10.5063 12.0859 10.2012 12.6152 9.98749 13.1944C9.77381 13.7735 9.66698 14.3758 9.66698 15.0013C9.66698 16.4902 10.1836 17.7513 11.217 18.7846C12.2503 19.818 13.5114 20.3346 15.0003 20.3346ZM19.0977 18.3962C19.4986 17.9167 19.8048 17.3874 20.0163 16.8082C20.2279 16.2291 20.3336 15.6268 20.3336 15.0013C20.3336 13.5124 19.817 12.2513 18.7836 11.218C17.7503 10.1846 16.4892 9.66795 15.0003 9.66795C14.3733 9.66795 13.7696 9.77265 13.189 9.98205C12.6085 10.1915 12.0806 10.4987 11.6054 10.9039L19.0977 18.3962Z" fill="#484848" />
                                </svg>
                                No Loud Music</li>
                        </ul>
                    </div>
                </div>
                <div class="by-selecting-the-button">
                    <div class="svg-box">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.4375 11.5625H8.56246V7.24998H7.4375V11.5625ZM7.99998 5.96634C8.17162 5.96634 8.31549 5.90829 8.43159 5.79219C8.54769 5.67609 8.60574 5.53222 8.60574 5.36058C8.60574 5.18896 8.54769 5.04509 8.43159 4.92898C8.31549 4.81288 8.17162 4.75483 7.99998 4.75483C7.82834 4.75483 7.68447 4.81288 7.56838 4.92898C7.45227 5.04509 7.39423 5.18896 7.39423 5.36058C7.39423 5.53222 7.45227 5.67609 7.56838 5.79219C7.68447 5.90829 7.82834 5.96634 7.99998 5.96634ZM8.00124 15.125C7.01579 15.125 6.08951 14.938 5.22241 14.564C4.3553 14.19 3.60104 13.6824 2.95963 13.0413C2.3182 12.4001 1.81041 11.6462 1.43624 10.7795C1.06208 9.91277 0.875 8.98669 0.875 8.00124C0.875 7.01579 1.062 6.08951 1.436 5.22241C1.81 4.3553 2.31756 3.60104 2.95869 2.95963C3.59983 2.3182 4.35376 1.81041 5.22048 1.43624C6.08719 1.06208 7.01328 0.875 7.99873 0.875C8.98418 0.875 9.91045 1.062 10.7776 1.436C11.6447 1.81 12.3989 2.31756 13.0403 2.95869C13.6818 3.59983 14.1896 4.35376 14.5637 5.22048C14.9379 6.08719 15.125 7.01328 15.125 7.99873C15.125 8.98418 14.938 9.91045 14.564 10.7776C14.19 11.6447 13.6824 12.3989 13.0413 13.0403C12.4001 13.6818 11.6462 14.1896 10.7795 14.5637C9.91277 14.9379 8.98669 15.125 8.00124 15.125ZM7.99998 14C9.67498 14 11.0937 13.4187 12.2562 12.2562C13.4187 11.0937 14 9.67498 14 7.99998C14 6.32498 13.4187 4.90623 12.2562 3.74373C11.0937 2.58123 9.67498 1.99998 7.99998 1.99998C6.32498 1.99998 4.90623 2.58123 3.74373 3.74373C2.58123 4.90623 1.99998 6.32498 1.99998 7.99998C1.99998 9.67498 2.58123 11.0937 3.74373 12.2562C4.90623 13.4187 6.32498 14 7.99998 14Z" fill="#9B9B9B" />
                        </svg>
                    </div>
                    <p>By selecting the button below, I agree to the Host's <a href="#">House Rules,</a> <a href="#">Ground rules for guests,</a> <a href="#">Lucky Backyards Rebooking and Refund Policy,</a> and that Luckybackyards can <a href="">charge my payment method</a> if I’m responsible for damage. I agree to pay the total amount shown if the Host accepts my booking request.</p>
                </div>
                <?php if (is_user_logged_in()) : ?>
                <button class="share request-booking modal17" id="submit">
                    <div class="spinner hidden" id="spinner"></div>
                    <span id="button-text">Request Booking</span>
                </button>
                <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    <p class="text-center">You cannot proceed with booking if not logged in, Please <span class="login-link" onclick='showLoginModal(true);'>login</span>.</p>
                </div>
                <?php endif; ?>
                <!--<button type="button" class="share request-booking" data-bs-toggle="modal" data-bs-target="#staticBackdrop17">Request Booking</button>-->
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="your-reservation-output-box">
                    <div class="img-box">
                        <img src="<?php echo isset($first_image['url']) ? $first_image['url'] : ''; ?>" alt="First Image">
                        <div class="two-contents">
                            <div class="top-content-box">
                                <h6><?php echo $propertytitle; ?></h6>
                                <p><?php echo $trimmed_content; ?>...</p>
                            </div>
                            <div class="bottom-content-box">
                                <ul>
                                    <li><svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.295 12.5L3.27 8.06316L0 5.07895L4.32 4.68421L6 0.5L7.68 4.68421L12 5.07895L8.73 8.06316L9.705 12.5L6 10.1474L2.295 12.5Z" fill="#484848" />
                                        </svg>
                                        4,9</li>
                                    <li><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.19776 9.30897L8.00031 8.21539L9.80286 9.30897L9.32466 7.25897L10.9234 5.88079L8.81954 5.70385L8.00031 3.77054L7.18108 5.70385L5.07724 5.88079L6.67596 7.25897L6.19776 9.30897ZM1.66699 14.0269V2.8731C1.66699 2.53635 1.78366 2.2513 2.01699 2.01797C2.25033 1.78464 2.53537 1.66797 2.87213 1.66797H13.1285C13.4652 1.66797 13.7503 1.78464 13.9836 2.01797C14.217 2.2513 14.3336 2.53635 14.3336 2.8731V10.4628C14.3336 10.7996 14.217 11.0846 13.9836 11.3179C13.7503 11.5513 13.4652 11.6679 13.1285 11.6679H4.02596L1.66699 14.0269ZM3.60033 10.668H13.1285C13.1798 10.668 13.2268 10.6466 13.2695 10.6039C13.3123 10.5611 13.3336 10.5141 13.3336 10.4628V2.8731C13.3336 2.82181 13.3123 2.7748 13.2695 2.73205C13.2268 2.68932 13.1798 2.66795 13.1285 2.66795H2.87213C2.82084 2.66795 2.77382 2.68932 2.73108 2.73205C2.68834 2.7748 2.66698 2.82181 2.66698 2.8731V11.591L3.60033 10.668Z" fill="#484848" />
                                        </svg>

                                        <a href="#">42 Reviews</a>
                                    </li>
                                    <li><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.05416 10.8372L11.5362 6.35514L10.8336 5.65259L7.05416 9.43207L5.15416 7.53207L4.45161 8.23462L7.05416 10.8372ZM8.00143 14.3346C7.12547 14.3346 6.30211 14.1684 5.53136 13.8359C4.76059 13.5035 4.09014 13.0523 3.51999 12.4824C2.94984 11.9125 2.49846 11.2424 2.16588 10.472C1.83329 9.70154 1.66699 8.87836 1.66699 8.0024C1.66699 7.12645 1.83321 6.30309 2.16566 5.53234C2.4981 4.76157 2.94927 4.09111 3.51916 3.52097C4.08906 2.95081 4.75922 2.49944 5.52964 2.16685C6.30005 1.83426 7.12324 1.66797 7.99919 1.66797C8.87515 1.66797 9.6985 1.83419 10.4693 2.16664C11.24 2.49908 11.9105 2.95025 12.4806 3.52014C13.0508 4.09004 13.5022 4.7602 13.8347 5.53062C14.1673 6.30103 14.3336 7.12421 14.3336 8.00017C14.3336 8.87613 14.1674 9.69948 13.835 10.4702C13.5025 11.241 13.0513 11.9115 12.4815 12.4816C11.9116 13.0518 11.2414 13.5031 10.471 13.8357C9.70057 14.1683 8.87738 14.3346 8.00143 14.3346ZM8.00031 13.3346C9.4892 13.3346 10.7503 12.818 11.7836 11.7846C12.817 10.7513 13.3336 9.49018 13.3336 8.00129C13.3336 6.5124 12.817 5.25129 11.7836 4.21795C10.7503 3.18462 9.4892 2.66795 8.00031 2.66795C6.51142 2.66795 5.25031 3.18462 4.21698 4.21795C3.18364 5.25129 2.66698 6.5124 2.66698 8.00129C2.66698 9.49018 3.18364 10.7513 4.21698 11.7846C5.25031 12.818 6.51142 13.3346 8.00031 13.3346Z" fill="#484848" />
                                        </svg>
                                        Super Host</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="price-details">
                        <h3>Price Details</h3>

                    <?php if($charge_type==='nightly'): ?> 
                        <div class="price-tag">
                            <p class="details">$<?php echo $price ?> x <?php echo $number_of_days; ?> nights</p>
                            <p class="price">$<?php echo $total_price; ?></p>
                        </div>
                    <?php else: ?>
                        <div class="price-tag hourly">
                            <p class="details">$<?php echo $price ?> x <?php echo $hours; ?> hours</p>
                            <p class="price">$<?php echo $total_hourly_price; ?></p>
                        </div>
                    <?php endif; ?>    
                    
                        <!--        <div class="price-tag">-->
                        <!--            <p class="details" >Long Stay Discount </p>-->
                        <!--            <p class="price price-highlight" >-$260.45</p>-->
                        <!--        </div>-->
                        <!--        <div class="price-tag">-->
                        <!--            <p class="details" >Airbnb Service Fee</p>-->
                        <!--            <p class="price" >$102.95</p>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="price-tag total-price">-->
                        <!--    <p class="details" >Total (USD)</p>-->
                        <!--            <p class="price" >$710.64</p>-->


                        <!--</div>-->
                    </div>
                </div>
            </div>
</section>




<style>
    /* CSS to hide the PayPal Debit or Credit Card button */
    .paypal-button-row .paypal-button-number-0 {
        display: none !important;
    }
</style>
<?php
get_footer();
?>

                <!--START-Stripe Integration-->
                <script src="https://js.stripe.com/v3/"></script>
                <script>
                    // This is a public sample test API key.
                // Don’t submit any personally identifiable information in requests made with this key.
                // Sign in to see your own test API key embedded in code samples.
                const stripe = Stripe("pk_test_51PQXzJFmjboWZonH3sDJ3cj9qvRagEK0kRq94EDL2au1qtshJTHt00zutHkOebOUXmIl5a5IoQWYijEfdsW3Uqk9004WDvMAEm");
                
                // The items the customer wants to buy
                const items = [{ id: "xl-tshirt" }];
                const totalAmount = <?php if($charge_type==='nightly') { echo $total_price; } else { echo $total_hourly_price; } ?>;
                // console.log(totalAmount);
                let elements;
                
                initialize();
                checkStatus();
                
                document
                  .querySelector("#submit")
                  ?.addEventListener("click", handleSubmit);
                
                // Fetches a payment intent and captures the client secret
                // async function initialize() {
                //   const { clientSecret } = await fetch("https://luckybackyards.com/staging/wp-content/themes/luckybackyard/stripe/payment.php", {
                //     method: "POST",
                //     headers: { "Content-Type": "application/json" },
                //     body: JSON.stringify({ items }),
                //   }).then((r) => r.json());
                
                //   elements = stripe.elements({ clientSecret });
                
                //   const paymentElementOptions = {
                //     layout: "tabs",
                //   };
                
                //   const paymentElement = elements.create("payment", paymentElementOptions);
                //   paymentElement.mount("#payment-element");
                // }
                
                function initialize() {
                    jQuery.ajax({
                        url: ajax_object.ajax_url,
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'initialize_stripe_payment',
                            totalAmount : totalAmount
                        },
                        success: function(response) {
                            if (response.success) {
                                // Display success message
                                // console.log("Response: ", response);
                                // console.log("Secret: ", response.data.clientSecret)
                                var clientSecret = response.data.clientSecret;
                                elements = stripe.elements({ clientSecret });
                                
                                const paymentElementOptions = {
                                layout: 'tabs'
                                };
                                
                                const paymentElement = elements.create('payment', paymentElementOptions);
                                paymentElement.mount('#stripe-payment-element');
                            } else {
                                // Display error message
                                console.error("Error initializing payment: ", response.data.message);
                            }
                        }
                    });
                }
                
                async function handleSubmit(e) {
                  e.preventDefault();
                  setLoading(true);
                
                  const { paymentIntent, error } = await stripe.confirmPayment({
                    elements,
                    redirect: 'if_required',
                    // confirmParams: {
                    //   // Make sure to change this to your payment completion page
                    //   return_url: "<?php //echo get_site_url() ?>/payment-confirmation",
                    // },
                  });
                
                  // This point will only be reached if there is an immediate error when
                  // confirming the payment. Otherwise, your customer will be redirected to
                  // your `return_url`. For some payment methods like iDEAL, your customer will
                  // be redirected to an intermediate site first to authorize the payment, then
                  // redirected to the `return_url`.
                  if(error) {
                    console.log("error: ", error);
                  if (error.type === "card_error" || error.type === "validation_error") {
                    showMessage(error.message);
                  } else {
                    showMessage("An unexpected error occurred.");
                  }
                  }
                  else {
                      console.log("Payment Intent: ", paymentIntent);
                      
                    updatePaymentStatus(true);
                    let paymentDetails = {
                        transaction_id: paymentIntent.id,  
                        payment_status: 'succeeded',
                        amount: parseFloat(paymentIntent.amount),
                        payment_method: 'stripe',
                        payment_method_type: paymentIntent.confirmation_method,
                        payment_object :  paymentIntent
                    };
                    // Send AJAX request
                    jQuery.ajax({
                    url: ajax_object.ajax_url, // WordPress AJAX handler URL
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'payment_booking_handler',
                        payment: paymentDetails
                    },
                    success: function(response) {
                        // Handle successful response
                        if(response.success) {
                            booking_id = response.data.booking_id;
                            let url = new URL(window.location.href);
                            // Add a new parameter
                            url.searchParams.set('booking_id', booking_id);
                            url.searchParams.set('payment_intent_client_secret', paymentIntent.client_secret);
                            // Update the browser's URL without reloading the page
                            window.history.replaceState({}, '', url);
                            console.log("URL Paypal: ",url);
                            checkStatus();
                            showModal(true);
                        }
                    }
                    });
                      
                      
                      
        
                  }
                
                  setLoading(false);
                }
                
                // Fetches the payment intent status after payment submission
                async function checkStatus() {
                  const clientSecret = new URLSearchParams(window.location.search).get(
                    "payment_intent_client_secret"
                  );
                
                  if (!clientSecret) {
                    return;
                  }
                
                  const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);
                
                  switch (paymentIntent.status) {
                    case "succeeded":
                      showMessage("Payment succeeded!");
                      break;
                    case "processing":
                      showMessage("Your payment is processing.");
                      break;
                    case "requires_payment_method":
                      showMessage("Your payment was not successful, please try again.");
                      break;
                    default:
                      showMessage("Something went wrong.");
                      break;
                  }
                }
                
                // ------- UI helpers -------
                
                function showMessage(messageText) {
                  const messageContainer = document.querySelector("#payment-message");
                  const modalMessage = document.querySelector("#staticBackdrop17 .message");
                  messageContainer.classList.remove("hidden");
                  messageContainer.textContent = messageText;
                  modalMessage.textContent = messageText;
                  setTimeout(function () {
                    messageContainer.classList.add("hidden");
                    messageContainer.textContent = "";
                  }, 4000);
                }
                
                // Show a spinner on payment submission
                function setLoading(isLoading) {
                  if (isLoading) {
                    // Disable the button and show a spinner
                    document.querySelector("#submit").disabled = true;
                    document.querySelector("#spinner").classList.remove("hidden");
                    document.querySelector("#button-text").classList.add("hidden");
                  } else {
                    document.querySelector("#submit").disabled = false;
                    document.querySelector("#spinner").classList.add("hidden");
                    document.querySelector("#button-text").classList.remove("hidden");
                  }
                }
                

                function showModal(show) {
                    // Get the modal element
                    const modalElement = document.getElementById('staticBackdrop17');
                    
                    if (show) {
                        // Open the modal
                        const modal = new bootstrap.Modal(modalElement);
                        modal.show();
                    }
                }
                
                
                function showLoginModal(show) {
                    // Get the modal element
                    const modalElement = document.getElementById('staticBackdrop');
                    
                    if (show) {
                        // Open the modal
                        const modal = new bootstrap.Modal(modalElement);
                        modal.show();
                    }
                }
                
                </script>
                <!--END-Stripe Integration-->
                
                <!--START-Booking Action-->
                <script>
                jQuery(document).ready(function($) {
                    // AJAX request
                    $('.page-template-request_to_book .request-booking').on('click', function() {
                        const host_message = document.getElementById('host-message');
                        const host_error_message = document.getElementById('host-error-message');
                        const urlParams = new URLSearchParams(window.location.search);
                        const params = {};
                        for (const [key, value] of urlParams) {
                            params[key] = value;
                        }
                        // Check if the textarea is valid
                        if (!host_message.checkValidity()) {
                            // If invalid, trigger the validation message
                            host_message.reportValidity();
                            console.log(host_error_message);
                            host_error_message.style.display="block";
                        } else {
                            // If valid, you can proceed with your logic here
                            host_error_message.style.display="none";
                            params.message = host_message.value;
                        // console.log("Booking params: ",params);

                        //Send AJAX request
                        jQuery.ajax({
                        url: ajax_object.ajax_url, // WordPress AJAX handler URL
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'booking_handler',
                            booking: params
                        },
                        success: function(response) {
                        // Handle successful response
                        console.log(response);
                        if(response.success) {
                            showModal(true);
                        }
                        },
                        error: function(xhr, status, error) {
                        // Handle error
                        console.error('Booking Handler: ', xhr.responseText, 'Status: ', status, 'Error: ', error);
                        }
                        });
                        
                        }
                    });
                });
                </script>
                <!--END-Booking Action-->