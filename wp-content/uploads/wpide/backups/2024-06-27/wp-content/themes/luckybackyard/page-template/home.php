<?php

/* Template Name: Home Template */
get_header();
$why_choose = get_field('why_choose_us');
$why_choose_repeater = $why_choose['why_choose_us_repeater'];
?>


<section class="home-sec-01" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/main-title-bg.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-form-tabbing">
                <?php
// Default charge type
$default_charge_type = 'nightly';

// Get the 'charge_type' field value using ACF
$charge_type = get_field('charge_type', $post->ID);

// If charge type is hourly, set the default charge type to hourly
if ($charge_type === 'hourly') {
    $default_charge_type = 'hourly';
}
?>

<ul class="nav nav-tabs m-0" id="myTabs">
    <li class="nav-item">
        <a class="nav-link <?php echo ($default_charge_type === 'nightly') ? 'active' : ''; ?>" id="tabs-1-tab" data-bs-toggle="tab" href="#tabs-1">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.3077 21.5001C4.80257 21.5001 4.375 21.3251 4.025 20.9751C3.675 20.6251 3.5 20.1975 3.5 19.6924V6.30784C3.5 5.80271 3.675 5.37514 4.025 5.02514C4.375 4.67514 4.80257 4.50014 5.3077 4.50014H6.69233V2.38477H8.23075V4.50014H15.8077V2.38477H17.3076V4.50014H18.6922C19.1974 4.50014 19.625 4.67514 19.975 5.02514C20.325 5.37514 20.5 5.80271 20.5 6.30784V19.6924C20.5 20.1975 20.325 20.6251 19.975 20.9751C19.625 21.3251 19.1974 21.5001 18.6922 21.5001H5.3077ZM5.3077 20.0001H18.6922C18.7692 20.0001 18.8397 19.9681 18.9038 19.904C18.9679 19.8398 19 19.7693 19 19.6924V10.3078H4.99997V19.6924C4.99997 19.7693 5.03202 19.8398 5.09612 19.904C5.16024 19.9681 5.23077 20.0001 5.3077 20.0001ZM4.99997 8.80787H19V6.30784C19 6.23091 18.9679 6.16038 18.9038 6.09627C18.8397 6.03217 18.7692 6.00012 18.6922 6.00012H5.3077C5.23077 6.00012 5.16024 6.03217 5.09612 6.09627C5.03202 6.16038 4.99997 6.23091 4.99997 6.30784V8.80787ZM12 14.077C11.7551 14.077 11.5465 13.9908 11.374 13.8184C11.2016 13.646 11.1154 13.4373 11.1154 13.1924C11.1154 12.9476 11.2016 12.7389 11.374 12.5665C11.5465 12.3941 11.7551 12.3078 12 12.3078C12.2448 12.3078 12.4535 12.3941 12.6259 12.5665C12.7984 12.7389 12.8846 12.9476 12.8846 13.1924C12.8846 13.4373 12.7984 13.646 12.6259 13.8184C12.4535 13.9908 12.2448 14.077 12 14.077ZM7.99998 14.077C7.75511 14.077 7.54646 13.9908 7.37403 13.8184C7.20159 13.646 7.11538 13.4373 7.11538 13.1924C7.11538 12.9476 7.20159 12.7389 7.37403 12.5665C7.54646 12.3941 7.75511 12.3078 7.99998 12.3078C8.24484 12.3078 8.45349 12.3941 8.62593 12.5665C8.79836 12.7389 8.88458 12.9476 8.88458 13.1924C8.88458 13.4373 8.79836 13.646 8.62593 13.8184C8.45349 13.9908 8.24484 14.077 7.99998 14.077ZM16 14.077C15.7551 14.077 15.5465 13.9908 15.374 13.8184C15.2016 13.646 15.1154 13.4373 15.1154 13.1924C15.1154 12.9476 15.2016 12.7389 15.374 12.5665C15.5465 12.3941 15.7551 12.3078 16 12.3078C16.2448 12.3078 16.4535 12.3941 16.6259 12.5665C16.7984 12.7389 16.8846 12.9476 16.8846 13.1924C16.8846 13.4373 16.7984 13.646 16.6259 13.8184C16.4535 13.9908 16.2448 14.077 16 14.077ZM12 18.0001C11.7551 18.0001 11.5465 17.9139 11.374 17.7415C11.2016 17.569 11.1154 17.3604 11.1154 17.1155C11.1154 16.8706 11.2016 16.662 11.374 16.4896C11.5465 16.3171 11.7551 16.2309 12 16.2309C12.2448 16.2309 12.4535 16.3171 12.6259 16.4896C12.7984 16.662 12.8846 16.8706 12.8846 17.1155C12.8846 17.3604 12.7984 17.569 12.6259 17.7415C12.4535 17.9139 12.2448 18.0001 12 18.0001ZM7.99998 18.0001C7.75511 18.0001 7.54646 17.9139 7.37403 17.7415C7.20159 17.569 7.11538 17.3604 7.11538 17.1155C7.11538 16.8706 7.20159 16.662 7.37403 16.4896C7.54646 16.3171 7.75511 16.2309 7.99998 16.2309C8.24484 16.2309 8.45349 16.3171 8.62593 16.4896C8.79836 16.662 8.88458 16.8706 8.88458 17.1155C8.88458 17.3604 8.79836 17.569 8.62593 17.7415C8.45349 17.9139 8.24484 18.0001 7.99998 18.0001ZM16 18.0001C15.7551 18.0001 15.5465 17.9139 15.374 17.7415C15.2016 17.569 15.1154 17.3604 15.1154 17.1155C15.1154 16.8706 15.2016 16.662 15.374 16.4896C15.5465 16.3171 15.7551 16.2309 16 16.2309C16.2448 16.2309 16.4535 16.3171 16.6259 16.4896C16.7984 16.662 16.8846 16.8706 16.8846 17.1155C16.8846 17.3604 16.7984 17.569 16.6259 17.7415C16.4535 17.9139 16.2448 18.0001 16 18.0001Z" fill="#484848"></path>
                                </svg>
            By Day
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo ($default_charge_type === 'hourly') ? 'active' : ''; ?>" id="tabs-2-tab" data-bs-toggle="tab" href="#tabs-2">
            <svg width="19" height="20" viewBox="0 0 19 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.9731 14.5269L14.0269 13.4731L10.25 9.6959V4.99998H8.75V10.3038L12.9731 14.5269ZM9.50165 19.5C8.18772 19.5 6.95268 19.2506 5.79655 18.752C4.6404 18.2533 3.63472 17.5765 2.7795 16.7217C1.92427 15.8669 1.24721 14.8616 0.748325 13.706C0.249442 12.5504 0 11.3156 0 10.0017C0 8.68772 0.249333 7.45268 0.748 6.29655C1.24667 5.1404 1.92342 4.13472 2.77825 3.2795C3.6331 2.42427 4.63834 1.74721 5.79398 1.24833C6.94959 0.749443 8.18437 0.5 9.4983 0.5C10.8122 0.5 12.0473 0.749334 13.2034 1.248C14.3596 1.74667 15.3652 2.42342 16.2205 3.27825C17.0757 4.1331 17.7527 5.13834 18.2516 6.29398C18.7505 7.44959 19 8.68437 19 9.9983C19 11.3122 18.7506 12.5473 18.252 13.7034C17.7533 14.8596 17.0765 15.8652 16.2217 16.7205C15.3669 17.5757 14.3616 18.2527 13.206 18.7516C12.0504 19.2505 10.8156 19.5 9.50165 19.5ZM9.49998 18C11.7166 18 13.6041 17.2208 15.1625 15.6625C16.7208 14.1041 17.5 12.2166 17.5 9.99998C17.5 7.78331 16.7208 5.89581 15.1625 4.33748C13.6041 2.77914 11.7166 1.99998 9.49998 1.99998C7.28331 1.99998 5.39581 2.77914 3.83748 4.33748C2.27914 5.89581 1.49998 7.78331 1.49998 9.99998C1.49998 12.2166 2.27914 14.1041 3.83748 15.6625C5.39581 17.2208 7.28331 18 9.49998 18Z" fill="#484848"></path>
                                </svg>
            Hourly
        </a>
    </li>
</ul>







                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-1">
                            <div class="main-form">
                             <div class="icon-box">
                                <?php
                                $terms = get_terms( array(
                                    'taxonomy' => 'property-type',
                                    'hide_empty' => false,
                                ) );
                            
                                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                    foreach ( $terms as $term ) {
                                        echo '<label><input name="Select_Area" type="radio" value="' . esc_attr( $term->name ) . '" />' . esc_html( $term->name ) . '</label>';
                                    }
                                }
                                ?>
                            </div>
                            
                                <div class="form-box">
                                    <form id="filter-nightly-form">
                                        <!-- Hidden input field to store the selected value -->
                                        <input type="hidden" name="property_type" id="selected_area" value="">
                                        <!-- Hidden input field to store the selected tab -->
                                        <input type="hidden" name="charge_type" id="selected_tab" value="<?php echo $default_charge_type; ?>">
                                        <div class="inputs-box">
                                            <div class="where-dest">
                                                <div class="top-content">
                                                    <h6>Where</h6>
                                                    <p id="search-destination">Search destination</p>
                                                    <p id="selected-region" style="display: none;">Selected Region</p>
                                                </div>
                                                    <div class="down-content">
                                                        <h5>Search by Region</h5>
                                                        <ul>
                                                            <?php
                                                            $regions = get_terms(array(
                                                                'taxonomy' => 'region',
                                                                'hide_empty' => false,
                                                            ));
                                                    
                                                            foreach ($regions as $region) {
                                                                // Get the category name
                                                                $category_name = $region->name;
                                                                
                                                                // Get the ACF field 'image' for this category
                                                                $image_array = get_field('image', $region);
                                                                $image_url = $image_array['url']; // Assuming the URL is stored in the 'url' key
                                                    
                                                                // Output the HTML
                                                                ?>
                                                                <li>
                                                                    <input type="radio" id="where-selected-category-hourly" name="region" value="<?php echo esc_attr($category_name); ?>" data-category="<?php echo esc_attr($category_name); ?>" >
                                                                    <label for="<?php echo sanitize_title($category_name); ?>">
                                                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category_name); ?>">
                                                                        <?php echo esc_html($category_name); ?>
                                                                    </label>
                                                                </li>
                                                                <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                        <!-- Hidden input field to store selected category name -->
                                                        <!--<input type="hidden" id="where-selected-category" name="where-selected-category" value="">-->
                                                    </div>





                                            </div>
                                            
                                           <div class="my-3 d-flex  rounded-4 p-3 gap-2 easepick-dp">
                                                   <i class="calendar icon opacity-50"></i><input class="w-100 border-0" id="filter-datepicker" placeholder="Check In/Check Out"/>
                                                   <input type="hidden" name="start_date" id="start_date" />
                                                   <input type="hidden" name="end_date" id="end_date" />
                                            </div>
                                           
                                            <div class="where-dest add-number-fields">
                                                <div class="top-content">
                                                    <h6>Who</h6>
                                                    <p id="summary"></p>
                                                </div>
                                                 <div class="down-content">
  

                                                  <div class="custom-number">
                                                    <div class="two-main-content">
                                                      <div class="content">
                                                        <h6>Adults</h6>
                                                        <p>Ages 13 or above</p>
                                                      </div>
                                                      <div class="number">
                                                        <span onclick="updateAdults(event, -1)">-</span>
                                                        <input type="text" name="adults" value="0" oninput="this.value = Math.max(0, Math.min(this.value, 10))">
                                                        <span onclick="updateAdults(event, 1)">+</span>
                                                      </div>
                                                    </div>
                                                
                                                    <div class="two-main-content">
                                                      <div class="content">
                                                        <h6>Children</h6>
                                                        <p>Ages 13 or below</p>
                                                      </div>
                                                      <div class="number">
                                                        <span onclick="updateAdults(event, -1)">-</span>
                                                        <input type="text" name="childrens" value="0" oninput="this.value = Math.max(0, Math.min(this.value, 10))">
                                                        <span onclick="updateAdults(event, 1)">+</span>
                                                      </div>
                                                    </div>
                                                
                                                    <div class="two-main-content">
                                                      <div class="content">
                                                        <h6>Infants</h6>
                                                        <p>Ages 13 or above</p>
                                                      </div>
                                                      <div class="number">
                                                        <span onclick="updateAdults(event, -1)">-</span>
                                                        <input type="text" name="infants" value="0" oninput="this.value = Math.max(0, Math.min(this.value, 10))">
                                                        <span onclick="updateAdults(event, 1)">+</span>
                                                      </div>
                                                    </div>
                                                
                                                    <div class="two-main-content">
                                                      <div class="content">
                                                        <h6>Pets</h6>
                                                        <p>Bringing a service animal?</p>
                                                      </div>
                                                      <div class="number">
                                                        <span onclick="updateAdults(event, -1)">-</span>
                                                        <input type="text" name="pets" value="0" oninput="this.value = Math.max(0, Math.min(this.value, 10))">
                                                        <span onclick="updateAdults(event, 1)">+</span>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                             
                                            </div>
                                        </div>
                                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tabs-2">
                            <div class="main-form">
                               <div class="icon-box">
                                <?php
                                $terms = get_terms( array(
                                    'taxonomy' => 'property-type',
                                    'hide_empty' => false,
                                ) );
                            
                                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                                    foreach ( $terms as $term ) {
                                        echo '<label><input name="Select_Area" type="radio" value="' . esc_attr( $term->name ) . '" />' . esc_html( $term->name ) . '</label>';
                                    }
                                }
                                ?>
                            </div>
                            
                

                                <div class="form-box">
                                    <form id="filter-hourly-form">
                                        <!-- Hidden input field to store the selected value -->
                                        <input type="hidden" name="property_type" id="selected_area_hourly" value="">
                                        <!-- Hidden input field to store the selected tab -->
                                        <input type="hidden" name="charge_type" id="charge_type" value="hourly">
                                        <div class="inputs-box">
                                            <div class="where-dest">
                                                <div class="top-content">
                                                    <h6>Where</h6>
                                                    <p id="search-destination-hourly">Search destination</p>
                                                    <p id="selected-region-hourly" style="display: none;">Selected Region</p>
                                                </div>
                                                <div class="down-content">
                                                    <h5>Search by Region</h5>
                                                    <ul>
                                                        <?php
                                                        $regions = get_terms(array(
                                                            'taxonomy' => 'region',
                                                            'hide_empty' => false,
                                                        ));
                                                
                                                        foreach ($regions as $region) {
                                                            // Get the category name
                                                            $category_name = $region->name;
                                                            
                                                            // Get the ACF field 'image' for this category
                                                            $image_array = get_field('image', $region);
                                                            $image_url = $image_array['url']; // Assuming the URL is stored in the 'url' key
                                                
                                                            // Output the HTML
                                                            ?>
                                                            <li>
                                                                <input type="radio" id="<?php echo sanitize_title($category_name); ?>" name="region" value="<?php echo esc_attr($category_name); ?>" data-category="<?php echo esc_attr($category_name); ?>" >
                                                                <label for="<?php echo sanitize_title($category_name); ?>">
                                                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category_name); ?>">
                                                                    <?php echo esc_html($category_name); ?>
                                                                </label>
                                                            </li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                    <!-- Hidden input field to store selected category name -->
                                                    <!--<input type="hidden" id="where-selected-category-hourly" name="region" value="">-->
                                                </div>
                                            </div>
                                            

                                            <div class="where-dest multipal-dates-etc">
                                                <div class="top-content">
                                                    <h6>Check In </h6>
                                                    <p>Select your Date and Time</p>
                                                </div>
                                                <div class="down-content">
                                                        <div id="close-filter"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>
</div>
                                                        <div class="input-box">
                                                            
                                                                <p>Select Date</p>
                                                                <div class="my-3 d-flex border rounded-4 p-3 gap-2 easepick-dp">
                                                                    <input type="hidden" name="date"/>
                                                                       <i class="calendar icon opacity-50"></i><input class="w-100 border-0" id="hourlydate_time_picker" placeholder="Select Date"/>
                                                                </div>
   
                                                            </div>
                                                        
                                                        <div class="input-box two-aline-boxes">
                                                             <!--<div class="timepicker-container">-->
                                                                    <label for="filter-start-time">Start Time:</label>
                                                                    <select name="start_time" class="border rounded-4 p-3" id="filter-start-time">
                                                                        <!-- Options will be populated by JavaScript -->
                                                                    </select>
                                                                    
                                                                    
                                                                <!--</div>-->
                                                        </div>

                                                        <div class="input-box two-aline-boxes mt-4">
                                                            <label for="filter-end-time">End Time:</label>
                                                            <select name="end_time" class="border rounded-4 p-3" id="filter-end-time">
                                                                <!-- Options will be populated by JavaScript -->
                                                            </select>
                                                        </div>


                                                   
                                                </div>
                                            </div>
                                              <div class="where-dest add-number-fields">
                                                    <div class="top-content">
                                                        <h6>Who</h6>
                                                        <p id="summary1"></p>
                                                    </div>
                                                    <div class="down-content">
                                                        <div class="custom-number">
                                                            <div class="two-main-content">
                                                                <div class="content">
                                                                    <h6>Adults</h6>
                                                                    <p>Ages 13 or above</p>
                                                                </div>
                                                                <div class="number">
                                                                    <span onclick="updateAdults(event, -1, 'adults_hourly')">-</span>
                                                                    <input type="text" name="adults" id="adults_hourly" value="0" oninput="this.value = Math.max(0, Math.min(this.value, 10))">
                                                                    <span onclick="updateAdults(event, 1, 'adults_hourly')">+</span>
                                                                </div>
                                                            </div>
                                                            <div class="two-main-content">
                                                                <div class="content">
                                                                    <h6>Children</h6>
                                                                    <p>Ages 13 or below</p>
                                                                </div>
                                                                <div class="number">
                                                                    <span onclick="updateAdults(event, -1, 'children_hourly')">-</span>
                                                                    <input type="text" name="childrens" id="children_hourly" value="0" oninput="this.value = Math.max(0, Math.min(this.value, 10))">
                                                                    <span onclick="updateAdults(event, 1, 'children_hourly')">+</span>
                                                                </div>
                                                            </div>
                                                            <div class="two-main-content">
                                                                <div class="content">
                                                                    <h6>Infants</h6>
                                                                    <p>Ages 13 or above</p>
                                                                </div>
                                                                <div class="number">
                                                                    <span onclick="updateAdults(event, -1, 'infants_hourly')">-</span>
                                                                    <input type="text" name="infants" id="infants_hourly" value="0" oninput="this.value = Math.max(0, Math.min(this.value, 10))">
                                                                    <span onclick="updateAdults(event, 1, 'infants_hourly')">+</span>
                                                                </div>
                                                            </div>
                                                            <div class="two-main-content">
                                                                <div class="content">
                                                                    <h6>Pets</h6>
                                                                    <p>Bringing a service animal?</p>
                                                                </div>
                                                                <div class="number">
                                                                    <span onclick="updateAdults(event, -1, 'pets_hourly')">-</span>
                                                                    <input type="text" name="pets" id="pets_hourly" value="0" oninput="this.value = Math.max(0, Math.min(this.value, 10))">
                                                                    <span onclick="updateAdults(event, 1, 'pets_hourly')">+</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                       
                                    </form>
       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="home-sec-02">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-icon-list-tabbing">
                    <div class="position-relative overflow-hidden">
                    <div class="scrollable-container px-3">
                    <ul class="nav m-0 flex-nowrap gap-4" role="tablist">
                        <!--<li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#default-active" role="tab">
                                <div class="img-box">
                                    <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.0467 6.33355C16.4985 4.46076 17.9314 2.70344 18.8414 2.05887C20.7812 3.2332 23.093 8.6868 23.4697 11.7994C23.8463 14.912 20.3402 16.4538 17.618 16.443C14.8958 16.4323 14.5115 15.2641 12.9636 13.3136C11.7253 11.7531 13.5021 8.26009 14.5452 6.70863L14.536 9.04195C14.5284 10.9864 16.0839 10.9925 17.6395 10.9986C19.195 11.0048 19.982 8.67453 18.0467 6.33355Z" fill="#B7DFB9" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.17555 16.0051C5.17622 15.836 5.3138 15.6995 5.48285 15.7002L29.8911 15.7964C30.1647 15.7975 30.3867 16.0184 30.3891 16.292L30.3915 16.5662L29.6138 16.5731C30.3915 16.5662 30.3916 16.5671 30.3916 16.5671L30.3916 16.5682L30.3916 16.5713L30.3916 16.5809L30.3915 16.6128C30.3913 16.6397 30.3909 16.6778 30.3897 16.7264C30.3875 16.8234 30.3826 16.9622 30.3722 17.1369C30.3513 17.4861 30.3082 17.9799 30.2188 18.5703C30.0407 19.7472 29.6759 21.3288 28.9243 22.9177C28.1715 24.5092 27.0212 26.127 25.2655 27.3399C23.5035 28.5572 21.1807 29.3323 18.1459 29.3094C14.7923 29.2839 12.265 28.487 10.3727 27.2595C8.48187 26.0329 7.27448 24.4082 6.50809 22.8041C5.74414 21.2051 5.4144 19.6195 5.27383 18.4412C5.20331 17.8501 5.17975 17.356 5.17398 17.0065C5.17109 16.8316 5.17265 16.6924 5.17505 16.5949C5.17625 16.5462 5.17767 16.5078 5.17884 16.4805L5.18038 16.448L5.18091 16.4382L5.1811 16.4349L5.18117 16.4337L5.17402 16.394L5.17555 16.0051V16.0051ZM6.73754 17.2607C6.7489 17.5335 6.77243 17.8713 6.81843 18.2569C6.9456 19.323 7.24201 20.7319 7.91168 22.1335C8.5789 23.5301 9.6126 24.9122 11.2193 25.9545C12.8247 26.9959 15.0515 27.7302 18.1576 27.7539C20.9074 27.7747 22.9097 27.0768 24.3814 26.0601C25.8595 25.0389 26.8516 23.6617 27.5181 22.2526C28.1859 20.841 28.5174 19.4165 28.6807 18.3375C28.7384 17.9563 28.7747 17.6209 28.7976 17.3477L6.73754 17.2607Z" fill="#484848" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.934 23.2916C18.3636 23.2933 18.7104 23.6429 18.7087 24.0725L18.6698 33.9466C18.6681 34.3761 18.3185 34.723 17.8889 34.7213C17.4594 34.7196 17.1125 34.37 17.1142 33.9405L17.1532 24.0663C17.1549 23.6368 17.5045 23.2899 17.934 23.2916Z" fill="#484848" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.871 27.3007C22.1855 27.0081 22.6776 27.0259 22.9702 27.3405L28.1293 32.8868C28.4219 33.2013 28.4041 33.6935 28.0896 33.986C27.775 34.2786 27.2829 34.2608 26.9903 33.9463L21.8312 28.3999C21.5386 28.0854 21.5564 27.5933 21.871 27.3007Z" fill="#484848" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.8107 27.2686C14.1231 27.5635 14.1373 28.0557 13.8424 28.3681L8.64567 33.8736C8.35081 34.186 7.85855 34.2002 7.54618 33.9053C7.23381 33.6105 7.2196 33.1182 7.51446 32.8058L12.7112 27.3003C13.0061 26.988 13.4983 26.9738 13.8107 27.2686Z" fill="#484848" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7982 2.96698C18.5312 3.09342 18.2327 3.28552 18.0525 3.55108C17.9336 3.7262 17.8557 3.94751 17.8901 4.26143C17.9266 4.59377 18.0952 5.07809 18.5729 5.7392L18.5807 5.74999L18.5881 5.76104C19.4749 7.08128 19.8049 8.42182 19.5881 9.55102C19.366 10.7081 18.5663 11.5897 17.3921 11.8155L17.3671 11.8204L17.3418 11.8235C16.3561 11.9469 15.541 11.7875 14.9143 11.3506C14.2927 10.9173 13.9655 10.2865 13.7999 9.68122C13.7893 9.64233 13.7792 9.60327 13.7698 9.5641C13.5441 10.3054 13.4253 11.1999 13.5672 12.2242L13.5684 12.2332C13.7053 13.3137 14.1052 13.9959 14.582 14.4436C15.0699 14.9019 15.6948 15.1666 16.3532 15.3055C17.0117 15.4444 17.6665 15.4492 18.166 15.4158C18.4133 15.3992 18.6167 15.3738 18.7558 15.3529C18.8253 15.3425 18.8783 15.3333 18.9124 15.327C18.9294 15.3239 18.9416 15.3215 18.9488 15.3201L18.9546 15.3189L18.9556 15.3187L18.99 15.3114L19.0233 15.3074L19.0247 15.3073L19.0266 15.307C19.0308 15.3064 19.0388 15.3054 19.0503 15.3036C19.0734 15.3002 19.1107 15.2942 19.1601 15.2851C19.2592 15.2667 19.4059 15.2357 19.5844 15.1867C19.9442 15.0878 20.4185 14.9197 20.8902 14.6445C21.8134 14.1058 22.7149 13.1743 22.7714 11.4673C22.7899 10.9077 22.6112 10.1372 22.2657 9.22595C21.9265 8.33125 21.4539 7.37029 20.9501 6.45381C20.1364 4.97369 19.2635 3.64872 18.7982 2.96698ZM19.2449 16.8472C19.2314 16.8498 19.2142 16.8532 19.1934 16.857C19.1438 16.8661 19.074 16.8781 18.9865 16.8912C18.812 16.9174 18.5658 16.9481 18.2697 16.9679C17.6824 17.0071 16.875 17.0054 16.0321 16.8276C15.189 16.6497 14.2732 16.2876 13.5171 15.5776C12.7507 14.8579 12.2038 13.8322 12.0257 12.4332C11.5717 9.14308 13.2709 6.92385 13.8692 6.25676M19.2449 16.8472C19.2549 16.8458 19.2667 16.8441 19.2802 16.8421C19.3201 16.8362 19.3752 16.8272 19.4436 16.8146C19.58 16.7893 19.7701 16.7488 19.9965 16.6867C20.4465 16.563 21.0548 16.3495 21.6742 15.9881C22.9331 15.2535 24.2475 13.8917 24.3261 11.5187C24.3549 10.648 24.0884 9.64556 23.7203 8.6745C23.3458 7.68689 22.8364 6.65611 22.3132 5.70448C21.2684 3.80376 20.1359 2.15892 19.8157 1.70366C19.5661 1.34468 19.1189 1.1949 18.7031 1.33169L18.1706 1.50687L18.1705 1.54308C17.7255 1.74872 17.1556 2.1025 16.7653 2.67761C16.4503 3.1417 16.267 3.72983 16.3439 4.43091C16.4183 5.11034 16.7307 5.84286 17.3039 6.63887C18.0255 7.71769 18.1788 8.64139 18.0605 9.25769C17.9489 9.83874 17.6022 10.1823 17.1216 10.2833C16.4193 10.3666 16.0285 10.2311 15.804 10.0746C15.5716 9.91257 15.4038 9.64873 15.3003 9.27074C15.0846 8.48195 15.2276 7.48481 15.3269 7.00282C15.4213 6.58307 15.1891 6.21476 14.8752 6.06073C14.5696 5.91082 14.1493 5.94453 13.8692 6.25676M15.0275 7.29515C15.0275 7.29505 15.0274 7.29524 15.0275 7.29515Z" fill="#484848" />
                                    </svg>

                                    <p>Fire Pits</p>
                                </div>
                            </a>
                        </li> -->
                        
                        <?php
                        $amenities = get_terms(array(
                            'taxonomy' => 'amenity',
                            'hide_empty' => false,
                        ));
                        
                        $amenity_html = '';
                        
                        if (!empty($amenities)) {
                            foreach ($amenities as $amenity) {
                                
                                $icon = get_field('select_icon', $amenity);
                                
                                if($icon['url']){
                                    $img_url = $icon['url'];
                                }
                                else{
                                    $img_url = get_stylesheet_directory_uri().'/assets/images/favicon.png';
                                }
                                if($amenity->slug == 'others'){
                                    $others = '<li class="nav-item px-2 '.$amenity->slug.'">
                                    <a class="nav-link amenity_link" data-bs-toggle="tab" href="javascript:;" role="tab" data-slug="'.$amenity->slug.'">
                                        <div class="img-box mx-auto mb-3 border rounded-circle ">
                                           <img src="'.$img_url.'" width="55" height="55" >
                                        </div>
                                        <p class="text-center">'.$amenity->name.'</p>
                                    </a>
                                </li>';
                                }
                                else{
                                    $amenity_html .= '<li class="nav-item px-2 '.$amenity->slug.'">
                                    <a class="nav-link amenity_link" data-bs-toggle="tab" href="javascript:;" role="tab" data-slug="'.$amenity->slug.'">
                                        <div class="img-box mx-auto mb-3 border rounded-circle ">
                                           <img src="'.$img_url.'" width="55" height="55" >
                                        </div>
                                        <p class="text-center">'.$amenity->name.'</p>
                                    </a>
                                </li>';
                                }
                                
                                
                                
                                
                            }
                            echo $amenity_html.$others;
                        } else {
                            echo 'No amenities found.';
                        }
                        ?>

                        
                        
                        
                    </ul><!-- Tab panes -->
                    </div>
                    <button class="position-absolute start-0 scrollBtn scroll-btn" id="scrollLeftBtn"><em class="fa fa-angle-left"></em></button>
                    <button class="position-absolute end-0 scrollBtn" id="scrollRightBtn"><em class="fa fa-angle-right"></em></button>
                    </div>
                    <div class="filter">
                        <button type="button" class="filter-t-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop4"><span><svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.1538 15.6538C14.2169 15.6538 13.425 15.3303 12.7781 14.6834C12.1312 14.0365 11.8077 13.2446 11.8077 12.3077C11.8077 11.3707 12.1312 10.5788 12.7781 9.93192C13.425 9.285 14.2169 8.96154 15.1538 8.96154C16.0907 8.96154 16.8826 9.285 17.5296 9.93192C18.1765 10.5788 18.5 11.3707 18.5 12.3077C18.5 13.2446 18.1765 14.0365 17.5296 14.6834C16.8826 15.3303 16.0907 15.6538 15.1538 15.6538ZM15.1529 14.1538C15.6625 14.1538 16.0977 13.9737 16.4586 13.6134C16.8195 13.2532 17 12.8183 17 12.3086C17 11.799 16.8199 11.3638 16.4596 11.0029C16.0994 10.642 15.6644 10.4615 15.1548 10.4615C14.6452 10.4615 14.2099 10.6416 13.849 11.0019C13.4881 11.3621 13.3077 11.7971 13.3077 12.3067C13.3077 12.8163 13.4878 13.2516 13.848 13.6125C14.2083 13.9734 14.6432 14.1538 15.1529 14.1538ZM2 13.0576V11.5577H9.61538V13.0576H2ZM3.84613 7.03844C2.90923 7.03844 2.11731 6.71498 1.47037 6.06807C0.823458 5.42115 0.5 4.62923 0.5 3.69232C0.5 2.7554 0.823458 1.96348 1.47037 1.31657C2.11731 0.66965 2.90923 0.346191 3.84613 0.346191C4.78304 0.346191 5.57496 0.66965 6.22188 1.31657C6.86879 1.96348 7.19225 2.7554 7.19225 3.69232C7.19225 4.62923 6.86879 5.42115 6.22188 6.06807C5.57496 6.71498 4.78304 7.03844 3.84613 7.03844ZM3.84518 5.53847C4.35479 5.53847 4.79005 5.35834 5.15095 4.99809C5.51185 4.63784 5.6923 4.20291 5.6923 3.69329C5.6923 3.18366 5.51218 2.74839 5.15193 2.38749C4.79168 2.02659 4.35673 1.84614 3.8471 1.84614C3.33748 1.84614 2.90223 2.02627 2.54133 2.38654C2.18043 2.74679 1.99998 3.18172 1.99998 3.69134C1.99998 4.20096 2.1801 4.63622 2.54035 4.99712C2.9006 5.35802 3.33554 5.53847 3.84518 5.53847ZM9.38458 4.44229V2.94234H17V4.44229H9.38458Z" fill="#484848" />
                                </svg>
                            </span> Filters </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row" id="amenity_response">

        <!-- first -->
        <?php
   
// Extracting term IDs
$args = array(
    'post_type' => 'property',
    'posts_per_page' => 10,
    // 'tax_query' => array(
    //     array(
    //         'taxonomy' => 'amenity',
    //         'field'    => 'slug',
    //         'terms'    => array('fire-pits'),
    //     ),
    // ),
);

$listing_querys = get_posts($args);

// print_r($listing_querys);

if ($listing_querys) {
    
    foreach ($listing_querys as $listing_query) {
        setup_postdata($listing_query);
        
        $pro_id = $listing_query->ID;
        
        $pro_gallery = get_field( "property_gallery" , $pro_id);
        $bathrooms = get_field("bathrooms", $pro_id);
        $bedrooms = get_field("bedrooms", $pro_id);
        $hourly_price = get_field("price", $pro_id);
        $charge_type = get_field("charge_type", $pro_id);
        
        // Check if the property is in the user's wishlist
        if ( is_user_logged_in() ) {
            global $wpdb;
            $user_id = get_current_user_id();
            $wishlist_table = $wpdb->prefix . 'wishlist';
            $is_favorite = $wpdb->get_var($wpdb->prepare(
                "SELECT COUNT(*) FROM $wishlist_table WHERE user_id = %d AND property_id = %d",
                $user_id,
                $pro_id
            ));
        }
            
        
        ?>
        <div class="main-icon-img-box">
            <div class="img-box">
                <div class="img-box-content">
                    <h6>Guest Favorite</h6>
                    <!--<a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/like.png" alt=""></a>-->
                    <div id="add-to-wishlist" data-id="<?php echo $pro_id; ?>" class="<?php echo $is_favorite ? 'favourite' : ''; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="heart">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </div>
                </div>
                <a href="<?php the_permalink($pro_id); ?>">
                        <?php
                        if($pro_gallery[0]['url']){
                            echo '<img src="'.$pro_gallery[0]['url'].'" class="w-100 hm_ani_img" alt="">';
                        }
                        else{
                            echo '<img src="'. get_stylesheet_directory_uri().'/assets/images/main-icon-img-01.png" class="w-100 hm_ani_img" alt="">';
                        }
                        ?>
                        
                    
                </a>
            </div>
            <div class="content-box">
                <div class="title-content">
                    <h5><a href="<?php the_permalink($pro_id); ?>"><?php echo get_the_title($pro_id); ?></a></h5>
                    <p>
                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.295 12.5L3.27 8.06316L0 5.07895L4.32 4.68421L6 0.5L7.68 4.68421L12 5.07895L8.73 8.06316L9.705 12.5L6 10.1474L2.295 12.5Z" fill="#484848"/>
                        </svg>
                        4,5
                    </p>
                </div>
                <?php //echo '<p>'. substr(get_the_content($pro_id), 0, 40) . '...</p>'; ?>
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
        $display_charge_type = ($charge_type === 'nightly') ? 'night' : $charge_type;
        echo '<h4>$' . esc_html($hourly_price) . '</h4><p>/ ' . esc_html($display_charge_type) . '</p>';
    }
    ?>
</div>

            </div>
        </div>
        <?php
        
    }
    ?>
    <div class="btn-box">
        <a href="javascript:;" class="t-btn t-btn-b amenity_link" data-slug="all" data-count="3">Show More</a>
    </div>
    <?php
    wp_reset_postdata();
} else {
    echo 'No listings found.';
}
?>




        
                    
        
                    
        <!-- first -->
        </div>
       <!--<div class="btn-box">-->
       <!--             <a href="#" class="t-btn t-btn-b">Show More</a>-->
       <!--         </div>-->
    </div>

</section>

<section class="home-sec-03 img-over-lay-style slider-arrows-design">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>Suggestions for you</h2>
                </div>
                <div class="row suggestions-slider">
                    <div class="col-lg-2">
                        <a href="#">
                            <div class="img-box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/suggestions-slider-01.png" alt="">
                                <div class="content-box">
                                    <div class="text">
                                        <h6>Bali</h6>
                                        <p>Indonesia</p>
                                    </div>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <a href="#">
                            <div class="img-box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/suggestions-slider-02.png" alt="">
                                <div class="content-box">
                                    <div class="text">
                                        <h6>Gotemba</h6>
                                        <p>Japan</p>
                                    </div>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <a href="#">
                            <div class="img-box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/suggestions-slider-03.png" alt="">
                                <div class="content-box">
                                    <div class="text">
                                        <h6>Zurich</h6>
                                        <p>Switzerland</p>
                                    </div>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <a href="javascript:void(0)">
                            <div class="img-box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/suggestions-slider-04.png" alt="">
                                <div class="content-box">
                                    <div class="text">
                                        <h6>Chicago</h6>
                                        <p>United States</p>
                                    </div>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <a href="javascript:void(0)">
                            <div class="img-box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/suggestions-slider-01.png" alt="">
                                <div class="content-box">
                                    <div class="text">
                                        <h6>Bali</h6>
                                        <p>Indonesia</p>
                                    </div>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <a href="javascript:void(0)">
                            <div class="img-box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/suggestions-slider-02.png" alt="">
                                <div class="content-box">
                                    <div class="text">
                                        <h6>Gotemba</h6>
                                        <p>Japan</p>
                                    </div>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <a href="javascript:void(0)">
                            <div class="img-box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/suggestions-slider-03.png" alt="">
                                <div class="content-box">
                                    <div class="text">
                                        <h6>Zurich</h6>
                                        <p>Switzerland</p>
                                    </div>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <a href="javascript:void(0)">
                            <div class="img-box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/suggestions-slider-04.png" alt="">
                                <div class="content-box">
                                    <div class="text">
                                        <h6>Chicago</h6>
                                        <p>United States</p>
                                    </div>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

<section class="home-sec-04 img-over-lay-style">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>The properties you must book for your next vacation</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <a href="javascript:void(0)">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/properties-img-01.png" alt="">
                        <div class="content-box">
                            <div class="text">
                                <h6>Fire Pits</h6>
                                <p>10 Listing</p>
                            </div>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="javascript:void(0)">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/properties-img-02.png" alt="">
                        <div class="content-box">
                            <div class="text">
                                <h6>Horses</h6>
                                <p>5 Listing</p>
                            </div>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6">
                <a href="javascript:void(0)">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/properties-img-03.png" alt="">
                        <div class="content-box">
                            <div class="text">
                                <h6>Swimming Pools</h6>
                                <p>5 Listing</p>
                            </div>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="javascript:void(0)">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/properties-img-04.png" alt="">
                        <div class="content-box">
                            <div class="text">
                                <h6>Tree House</h6>
                                <p>6 Listing</p>
                            </div>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6">
                <a href="javascript:void(0)">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/properties-img-05.png" alt="">
                        <div class="content-box">
                            <div class="text">
                                <h6>On the Beach</h6>
                                <p>5 Listing</p>
                            </div>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="javascript:void(0)">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/properties-img-06.png" alt="">
                        <div class="content-box">
                            <div class="text">
                                <h6>Pets Welcome</h6>
                                <p>14 Listing</p>
                            </div>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</section>

<?php
	if($why_choose){
?>
<section class="home-sec-05">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
                    <?php if($why_choose['heading']){?>
                    <?php echo $why_choose['heading'];?>
                    <?php } ?>
                    
                    <?php if($why_choose['paragraph']){?>
                    <?php echo $why_choose['paragraph'];?>
                    <?php } ?>
                </div>
                
                <?php 
                if(is_array($why_choose_repeater)){ 
                    $counter = 0;
                    foreach($why_choose_repeater as $key => $why_choose_repeaters){
                        if($why_choose_repeaters){    
                            $counter++;
                ?>
                            <div class="img-box <?php echo ($counter % 2 == 0 && $counter <= 6) ? 'img-box-right' : ''; ?>">
                                <?php if($why_choose_repeaters['choose_us_img']){?>
                                <img src="<?php echo $why_choose_repeaters['choose_us_img'];?>" alt="">
                                <?php } ?>
                                
                                <div class="text">
                                    <?php if($why_choose_repeaters['choose_us_heading']){?>
                                    <h6><?php echo $why_choose_repeaters['choose_us_heading'];?></h6>
                                    <?php } ?>
                                    
                                    <?php if($why_choose_repeaters['choose_us_paragraph']){?>
                                    <p><?php echo $why_choose_repeaters['choose_us_paragraph'];?></p>
                                    <?php } ?>
                                </div>
                            </div>
                <?php } } } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<section class="home-sec-06 main-post-imgbox">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h2>Read from our blog and plan holiday adventures</h2>
                </div>
            </div>
        </div>
        <div class="main-blog-slider blog-slider slider-arrows-design">
            <div class="img-box">
                <a href="#"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/our-blog-img-01.png" alt=""></a>
                <ul>
                    <li><a href="javascript:void(0)"> Pool </a></li>
                    <li><a href="javascript:void(0)"> Fishing </a></li>
                    <li><a href="javascript:void(0)"> Grilling </a></li>
                </ul>
                <div class="text">
                    <h5> <a href="#">Activities in Cyprus</a> </h5>
                    <p>Located just 30 minutes from the Seychelles International Airport and 45...</p>
                    <div class="icon">
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> 4 min</p>
                    </div>
                </div>
            </div>
            <div class="img-box">
                <a href="#"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/our-blog-img-02.png" alt=""></a>
                <ul>
                    <li><a href="javascript:void(0)"> Pool </a></li>
                    <li><a href="javascript:void(0)"> Fishing </a></li>
                    <li><a href="javascript:void(0)"> Grilling </a></li>
                </ul>
                <div class="text">
                    <h5> <a href="#">Activities in Cyprus</a> </h5>
                    <p>Located just 30 minutes from the Seychelles International Airport and 45...</p>
                    <div class="icon">
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> 4 min</p>
                    </div>
                </div>
            </div>
            <div class="img-box">
                <a href="#"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/our-blog-img-03.png" alt=""></a>
                <ul>
                    <li><a href="javascript:void(0)"> Pool </a></li>
                    <li><a href="javascript:void(0)"> Fishing </a></li>
                    <li><a href="javascript:void(0)"> Grilling </a></li>
                </ul>
                <div class="text">
                    <h5> <a href="#">Activities in Cyprus</a> </h5>
                    <p>Located just 30 minutes from the Seychelles International Airport and 45...</p>
                    <div class="icon">
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> 4 min</p>
                    </div>
                </div>
            </div>
            <div class="img-box">
                <a href="#"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/our-blog-img-04.png" alt=""></a>
                <ul>
                    <li><a href="javascript:void(0)"> Pool </a></li>
                    <li><a href="javascript:void(0)"> Fishing </a></li>
                    <li><a href="javascript:void(0)"> Grilling </a></li>
                </ul>
                <div class="text">
                    <h5> <a href="#">Activities in Cyprus</a> </h5>
                    <p>Located just 30 minutes from the Seychelles International Airport and 45...</p>
                    <div class="icon">
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> 4 min</p>
                    </div>
                </div>
            </div>
            <div class="img-box">
                <a href="#"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/our-blog-img-05.png" alt=""></a>
                <ul>
                    <li><a href="javascript:void(0)"> Pool </a></li>
                    <li><a href="javascript:void(0)"> Fishing </a></li>
                    <li><a href="javascript:void(0)"> Grilling </a></li>
                </ul>
                <div class="text">
                    <h5> <a href="#">Activities in Cyprus</a> </h5>
                    <p>Located just 30 minutes from the Seychelles International Airport and 45...</p>
                    <div class="icon">
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> 4 min</p>
                    </div>
                </div>
            </div>
            <div class="img-box">
                <a href="#"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/our-blog-img-02.png" alt=""></a>
                <ul>
                    <li><a href="javascript:void(0)"> Pool </a></li>
                    <li><a href="javascript:void(0)"> Fishing </a></li>
                    <li><a href="javascript:void(0)"> Grilling </a></li>
                </ul>
                <div class="text">
                    <h5> <a href="#">Activities in Cyprus</a> </h5>
                    <p>Located just 30 minutes from the Seychelles International Airport and 45...</p>
                    <div class="icon">
                        <p><i class="fa fa-clock-o" aria-hidden="true"></i> 4 min</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="show-on-map">
   <a href="<?php echo site_url();?>/show-map-page/"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15 20.4621L8.99998 18.3621L4.69615 20.0274C4.40128 20.1415 4.12821 20.1088 3.87692 19.9294C3.62564 19.7499 3.5 19.5044 3.5 19.1928V6.07751C3.5 5.88008 3.55289 5.70284 3.65868 5.54579C3.76444 5.38874 3.91283 5.27496 4.10385 5.20444L8.99998 3.53906L15 5.63906L19.3038 3.97369C19.5987 3.85959 19.8717 3.88747 20.123 4.05734C20.3743 4.2272 20.5 4.4647 20.5 4.76984V17.9621C20.5 18.1659 20.4423 18.3448 20.3269 18.4986C20.2115 18.6525 20.0551 18.7646 19.8576 18.8352L15 20.4621ZM14.25 18.6275V6.92749L9.74995 5.35441V17.0544L14.25 18.6275ZM15.75 18.6275L19 17.5506V5.70056L15.75 6.92749V18.6275ZM4.99997 18.3006L8.25 17.0544V5.35441L4.99997 6.45056V18.3006Z" fill="white"/>
</svg>
Show Map</a>                                                 
</div>

<div class="show-on-map show-list">
   <a href="<?php echo site_url();?>/show-map-page/"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15 20.4621L8.99998 18.3621L4.69615 20.0274C4.40128 20.1415 4.12821 20.1088 3.87692 19.9294C3.62564 19.7499 3.5 19.5044 3.5 19.1928V6.07751C3.5 5.88008 3.55289 5.70284 3.65868 5.54579C3.76444 5.38874 3.91283 5.27496 4.10385 5.20444L8.99998 3.53906L15 5.63906L19.3038 3.97369C19.5987 3.85959 19.8717 3.88747 20.123 4.05734C20.3743 4.2272 20.5 4.4647 20.5 4.76984V17.9621C20.5 18.1659 20.4423 18.3448 20.3269 18.4986C20.2115 18.6525 20.0551 18.7646 19.8576 18.8352L15 20.4621ZM14.25 18.6275V6.92749L9.74995 5.35441V17.0544L14.25 18.6275ZM15.75 18.6275L19 17.5506V5.70056L15.75 6.92749V18.6275ZM4.99997 18.3006L8.25 17.0544V5.35441L4.99997 6.45056V18.3006Z" fill="white"/>
</svg>
Show List</a>                                                 
</div>


<script>
    function updateAdults(e, offset) {
        let input = e.target.parentNode.querySelector('input');
    let currentValue = parseInt(input.value);
    if (isNaN(currentValue)) {
        currentValue = 0; 
                                                    }
    input.value = Math.max(0, currentValue + offset);
    updateSummary();
                                                  }

    function updateSummary() {
        adults = parseInt(document.getElementsByName('adults')[0].value) || 0;
    children = parseInt(document.getElementsByName('childrens')[0].value) || 0;
    infants = parseInt(document.getElementsByName('infants')[0].value) || 0;
    pets = parseInt(document.getElementsByName('pets')[0].value) || 0;
    
        adults_hourly = parseInt(document.getElementById('adults_hourly').value) || 0;
    children_hourly = parseInt(document.getElementById('children_hourly').value) || 0;
    infants_hourly = parseInt(document.getElementById('infants_hourly').value) || 0;
    pets_hourly = parseInt(document.getElementById('pets_hourly').value) || 0;

    let summary = `<p>Adults ${adults}, Childrens ${children}, Infant ${infants}, Pets ${pets}</p>`;
    let summary1 = `<p>Adults ${adults_hourly}, Childrens ${children_hourly}, Infant ${infants_hourly}, Pets ${pets_hourly}</p>`;
    document.getElementById('summary').innerHTML = summary;
    document.getElementById('summary1').innerHTML = summary1;
                                                  }

    updateSummary();
</script>

<script>
    // Add event listener to update hidden input field when a radio button is selected
    var radioButtons = document.querySelectorAll('input[type="radio"]');
    // var hiddenInput = document.getElementById('where-selected-category');
    var selectedRegion = document.getElementById('selected-region');
    var searchDestination = document.getElementById('search-destination'); // Add this line

    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('change', function() {
            if (this.checked) {
                var categoryName = this.getAttribute('data-category');
                // hiddenInput.value = categoryName;
                selectedRegion.textContent = categoryName; // Display the selected category name
                selectedRegion.style.display = 'block'; // Show the selected-region div
                searchDestination.style.display = 'none'; // Hide the search-destination element
            }
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var radioButtons = document.querySelectorAll('input[name="Select_Area"]');
        var hiddenInput = document.getElementById('selected_area');
        var selected_area_hourly = document.getElementById('selected_area_hourly');
        radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('change', function() {
                var selectedValue = this.value;
                hiddenInput.value = selectedValue;
                selected_area_hourly.value = selectedValue;
            });
        });
    });
</script>

<script>
  // Add event listener to update hidden input field when a radio button is selected
    var radioButtonsHourly = document.querySelectorAll('input[type="radio"]');
    var hiddenInputHourly = document.getElementById('where-selected-category-hourly');
    var selectedRegionHourly = document.getElementById('selected-region-hourly');
    var searchDestinationHourly = document.getElementById('search-destination-hourly');

    radioButtonsHourly.forEach(function(radioButton) {
        radioButton.addEventListener('change', function () {
            if (this.checked) {
                var categoryName = this.getAttribute('data-category');
                hiddenInputHourly.value = categoryName;
                selectedRegionHourly.textContent = categoryName; // Display the selected category name
                selectedRegionHourly.style.display = 'block'; // Show the selected-region div
                searchDestinationHourly.style.display = 'none'; // Hide the search-destination element
            }
        });
                                                });
</script>
                                            
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all the tab links
        var tabLinks = document.querySelectorAll('.nav-link');

        // Get the hidden input field
        var hiddenInput = document.getElementById('selected_tab');

        // Set "tabs-1" as active by default
        tabLinks.forEach(function(tabLink) {
            if (tabLink.getAttribute('href') === '#tabs-1') {
                tabLink.classList.add('active');
            }
        });

        // Set the default value to "nightly"
        hiddenInput.value = 'nightly';

        // Loop through each tab link
        tabLinks.forEach(function(tabLink) {
            // Add click event listener to each tab link
            tabLink.addEventListener('click', function() {
                // Get the tab name
                var tabName = this.getAttribute('href').replace('#', '');
                
                // Update the value of the hidden input field based on the tab name
                if (tabName === 'tabs-1') {
                    hiddenInput.value = 'nightly';
                } else if (tabName === 'tabs-2') {
                    hiddenInput.value = 'hourly';
                }
            });
        });
    });
</script>

<?php get_footer(); ?>



<script>

function formatDate(date) {
    // Extract the year, month, and day from the date
    let year = date.getFullYear();
    let month = (date.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-based
    let day = date.getDate().toString().padStart(2, '0');
    
    // Combine the parts into the desired format
    return `${year}${month}${day}`;
}

// Filter Home Page Date Picker Calendar Start
  const filterPickerNightly = new easepick.create({
    element: document.getElementById('filter-datepicker'),
    autoApply: false,
    format: 'MMMM DD, YYYY',
    zIndex: 10,
    css: [
        'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css',
        'https://luckybackyards.com/staging/wp-content/themes/luckybackyard/assets/css/datepicker.css?ver=6.5.3',
    ],
    setup(picker) {
        picker.on('select', (e) => {
            const { start, end } = e.detail;
            const formatted_start_date = formatDate(start);
            const formatted_end_date = formatDate(end);
            document.getElementById('start_date').value=String(formatted_start_date);
            document.getElementById('end_date').value=String(formatted_end_date);
        });
    },
    plugins: ['RangePlugin', 'LockPlugin'],
    RangePlugin: {
        tooltipNumber(num) {
            return num - 1;
        },
        locale: {
            one: 'night',
            other: 'nights',
        },
    },
    LockPlugin: {
        minDate: new Date(),
        minDays: 2,
        inseparable: true,
        // filter(date, picked) {
        //     if (picked.length === 1) {
        //         const incl = date.isBefore(picked[0]) ? '[)' : '(]';
        //         return !picked[0].isSame(date, 'day') && date.inArray(bookedDates, incl);
        //     }
        //     return date.inArray(bookedDates, '[)');
        // },
    }
});

// Filter Home Page Date Picker Calendar End


// Filter Home Page Hourly Calendar Start

    function padZero(value) {
        return value.toString().padStart(2, '0');
    }


var filterPickerHourly = new easepick.create({
    element: document.getElementById('hourlydate_time_picker'),
    autoApply: false,
    format: 'MMMM DD, YYYY',
    zIndex: 10,
    css: [
        'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css',
        'https://luckybackyards.com/staging/wp-content/themes/luckybackyard/assets/css/datepicker.css?ver=6.5.3',
    ],
    setup(picker) {
        picker.on('select', (e) => {
            const { date } = e.detail;
            const formattedDate = `${date.getFullYear()}${padZero(date.getMonth() + 1)}${padZero(date.getDate())}`;
            document.querySelector('input[name="date"]').value = formattedDate;
            console.log('Date selected (Hourly): ', formattedDate);
        });
    },
    plugins: ['LockPlugin'],
    LockPlugin: {
        minDate: new Date(),
        inseparable: false,
        filter(date, picked) {
            if (picked.length === 1) {
                const incl = date.isBefore(picked[0]) ? '[)' : '(]';
                return !picked[0].isSame(date, 'day') && date.inArray(bookedDates, incl);
            }
            return date.inArray(bookedDates, '[)');
        },
    }
});

// Filter Home Page Hourly Calendar End  
</script>

<script>
jQuery(document).ready(function($) {
    $('#filter-nightly-form').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Gather form data
        var formData = $(this).serializeArray();
        var params = {};

        // Add default search parameter
        params['s'] = "";

        $.each(formData, function(index, field) {
            if (field.value !== null && field.value !== "" && field.value !== undefined && field.value != 0) {
                params[field.name] = field.value;
            }
        });
         // Convert params object to query string
        var queryString = $.param(params);

        // Redirect to search page with query parameters
        var searchPageUrl = '<?php echo get_site_url(); ?>?' + queryString;
        window.location.href = searchPageUrl;

        // Log the filtered form values to the console
        // console.log(queryString);
    });
    
        $('#filter-hourly-form').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Gather form data
        var formData = $(this).serializeArray();
        var params = {};
        
        params['s'] = "";

        $.each(formData, function(index, field) {
            if (field.value !== null && field.value !== "" && field.value !== undefined && field.value != 0) {
                params[field.name] = field.value;
            }
        });
        
        // Convert params object to query string
        var queryString = $.param(params);
        var searchPageUrl = '<?php echo get_site_url(); ?>?' + queryString;
        window.location.href = searchPageUrl;
        // Log the filtered form values to the console
        console.log(queryString);
    });
    
    $('.where-dest.multipal-dates-etc').on('mouseenter', function() {
        $(this).find('.down-content').addClass('active');
    });
    
    $( "#close-filter" ).on( "click", function() {
     $(".down-content").removeClass('active');
    });
    
});

document.addEventListener('DOMContentLoaded', function() {
  

    const startTimeSelect = document.getElementById('filter-start-time');
    const endTimeSelect = document.getElementById('filter-end-time');
    
    if (!startTimeSelect || !endTimeSelect) {
        return;
    }
    
    const timeIncrement = 60; // 60 minutes
    const minTime = 9 * 60; // 9:00 AM in minutes
    const maxTime = 21 * 60; // 9:00 PM in minutes
    const minEndTimeDiff = 2 * 60; // 2 hours in minutes

    // Example of booked times in minutes from 00:00
    // const bookedTimes = [600, 630, 720, 780]; // e.g., 10:00 AM, 10:30 AM, 12:00 PM, 1:00 PM

    function padZero(value) {
        return value.toString().padStart(2, '0');
    }

    function formatTime(minutes) {
        const hours = Math.floor(minutes / 60);
        const mins = minutes % 60;
        const period = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = hours % 12 === 0 ? 12 : hours % 12;
        return `${padZero(formattedHours)}:${padZero(mins)} ${period}`;
    }

    function populateTimeOptions(selectElement, start, end, increment) { //, bookedTimes
        selectElement.innerHTML = '';
        for (let i = start; i <= end; i += increment) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = formatTime(i);
            // if (bookedTimes.includes(i)) {
            //     option.disabled = true;
            // }
            selectElement.appendChild(option);
        }
    }
    
    function calculateHoursDifference() {
    const startTime = parseInt(startTimeSelect.value, 10);
    const endTime = parseInt(endTimeSelect.value, 10);
    const hoursDifference = (endTime - startTime) / 60; // Convert minutes to hours
    return hoursDifference;
    }
    
    
    function updateStartTimeOptions() {
        const hoursDifference = calculateHoursDifference();
        // Additional logic for updating start time options if needed
    }

    function updateEndTimeOptions() {
        const startTime = parseInt(startTimeSelect.value, 10);
        const endTime = parseInt(endTimeSelect.value, 10);
        const hoursDifference = (endTime - startTime) / 60; // Convert minutes to hours
        const newMinEndTime = startTime + minEndTimeDiff;
        populateTimeOptions(endTimeSelect, newMinEndTime, maxTime, timeIncrement); //, blockedTimes
    }



        // Adjust end time options when start time changes
    startTimeSelect.addEventListener('change', function() {
        updateEndTimeOptions();
        updateStartTimeOptions(); // Call the function to update start time options
             // Example usage of displayItemsHours function
    // const hours = calculateHoursDifference(); // Example: 2 hours
    // const pricePerHour = price;
    // const totalPrice = calculateTotalPrice(hours, pricePerHour);
    // displayItemsHours(hours, totalPrice, pricePerHour);
    });
    
    // Adjust start time options when end time changes
    endTimeSelect.addEventListener('change', function() {
    updateStartTimeOptions();
    // Example usage of displayItemsHours function
    // const hours = calculateHoursDifference(); // Example: 2 hours
    // const pricePerHour = price;
    // const totalPrice = calculateTotalPrice(hours, pricePerHour);
    // displayItemsHours(hours, totalPrice, pricePerHour);
    });
    
    populateTimeOptions(startTimeSelect, minTime, maxTime, timeIncrement);
});

// START-Wishlist
jQuery(document).ready(function($) {
    // $('.main-icon-img-box #add-to-wishlist').on('click', function(e) {
    //     e.preventDefault();

    //     var $element = $(this);
    //     var property_id = $element.data('id');
    //     var action = $element.hasClass('favourite') ? 'remove_from_wishlist' : 'add_to_wishlist';

    //     $.ajax({
    //         url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
    //         type: 'POST',
    //         data: {
    //             action: action,
    //             property_id: property_id
    //         },
    //         success: function(response) {
    //             if (response.success) {
    //                 if(response.data === 'added') {
    //                     $element.addClass('favourite heart-throb');
    //                 }
                    
    //                 if(response.data === 'removed') {
    //                     $element.removeClass('favourite');
    //                 }
    //                 console.log(response);
    //             } else {
                    
    //                 if(response.data === 'logged_off') {
    //                     $('#staticBackdrop').modal('show'); // Show login modal
    //                 }
    //                 console.error(response);
    //             }
    //         }
    //     });
    // });
    
    $('#btn-add-wishlist').on('click', function(e) {
        e.preventDefault();
        var $element = $("#addWishlist");
        var property_id = parseInt($element.attr('data-property-id'));
        var category_id = parseInt($('input[name="category"]:checked').val()) || '';
        
        $.ajax({
            url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
            type: 'POST',
            data: {
                action: 'add_to_wishlist',
                property_id: property_id,
                category_id: category_id
            },
            success: function(response) {
                if (response.success) {
                    if(response.data === 'added') {
                        $('#add-to-wishlist[data-id="' + property_id + '"]').addClass('favourite heart-throb');
                        $('#addWishlist').modal('hide');
                    }
                    
                    // if(response.data === 'removed') {
                    //     $element.removeClass('favourite');
                    // }
                    console.log(response);
                } else {
                    
                    if(response.data === 'category_invalid') {
                        alert('Please select a category');
                    }
                    
                    // if(response.data === 'logged_off') {
                    //     $('#staticBackdrop').modal('show'); // Show login modal
                    // }
                    console.error(response);
                }
            }
        });
    });
    
    $('.main-icon-img-box #add-to-wishlist').on('click', function(e) {
        e.preventDefault();
        var $element = $(this);
        var property_id = $element.data('id');
        if($element.hasClass('favourite')) {
            
        } else {
            $('#addWishlist').attr('data-property-id', property_id)
            populateWishlistCategories();
        }

        // $('#addWishlist').attr('data-property-id', property_id).modal('show');
    });
    
    // Remove data-property-id when modal is closed
    $('#addWishlist').on('hidden.bs.modal', function() {
        $(this).removeAttr('data-property-id');
    });
    
    $('#create-new-wishlist').on('hidden.bs.modal', function() {
        $(this).removeAttr('data-property-id');
    });
    

    $('#btn-create-new-wishlist').on('click', function(e) {
        e.preventDefault();
        var $element = $("#addWishlist");
        var property_id = parseInt($element.attr('data-property-id'));
        $('#create-new-wishlist').attr('data-property-id', property_id).modal('show');
    });
    
    $('#btn-create-category').on('click', function(e) {
        e.preventDefault();
        var $element = $("#create-new-wishlist");
        var $error = $("#form-create-category .error");
        var property_id = parseInt($element.attr('data-property-id'));
        var categoryName = $('#form-create-category input[name="category-name"]').val();
        // console.log('Category Name:', categoryName);
        // If you want to submit the form via AJAX, you can add the AJAX code here.
        $.ajax({
            url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
            type: 'POST',
            data: {
                action: 'add_wishlist_category',
                category_name: categoryName
            },
            success: function(response) {
                if(response.success === false && response.data === 'empty') {
                    $error.text("Please enter category name");
                    
                    setTimeout(function() { 
                        $error.text("");
                    }, 5000);
                }
                
                if(response.success === true && response.data === 'added') {
                    $('#create-new-wishlist').modal('hide');
                    populateWishlistCategories();
                }

                // console.log(response);
            },
            error: function(xhr, status, error) {
                // console.error(error);
            }
        });
    });
    
    
        // Function to populate categories in the modal
    function populateWishlistCategories() {
        
        $.ajax({
            url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
            type: 'POST',
            data: {
                action: 'get_user_wishlist_categories'
            },
            success: function(response) {
                if (response.success) {
                    if(response.data === 'logged_off') {
                        $('#staticBackdrop').modal('show'); // Show login modal
                    } 
                    else {
                        var categories = response.data;
                        var $wishBoxes = $('.wish-boxes');
    
                        // Clear existing categories
                        $wishBoxes.empty();
    
                        // Add each category to the modal
                        categories.forEach(function(category) {
                            var categoryHtml = `
                                <div class="box">
                                    <input type="radio" value="${category.id}" id="cat${category.id}" name="category"/>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="category-wrapper">
                                            <img src="https://luckybackyards.com/staging/wp-content/uploads/2024/03/ideas-for-family-travel-img-01.png" />
                                        </div>
                                        <div class="text-wrapper">${category.name}</div>
                                    </div>
                                </div>`;
                            $wishBoxes.append(categoryHtml);
                        });
                        
                        $('#addWishlist').modal('show');
                    }
      
                } else {
                    console.error('Failed to load categories.');
                }
                
                // console.log(response);
            },
            error: function(xhr, status, error) {
                // console.error('AJAX error:', error);
            }
        });
    }
    
    // Trigger the function when the modal is shown
    // $('#addWishlist').on('show.bs.modal', function(e) {
    //     populateWishlistCategories();
    // });

});
// END-Wishlist
</script>