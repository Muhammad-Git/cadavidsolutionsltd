<div class="modal-01 filter-modal">
    <div class="modal fade" id="staticBackdrop4" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Filters</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" id="property_filter_form">
                        <div class="two-contents">
                            <h6>Property Type</h6>
                            <p>Search rooms, entire homes or any type of place</p>
                        </div>
                         <div class="two-radio">
                            <?php
                            // Fetch property types dynamically
                            $property_types = get_terms(array(
                                'taxonomy' => 'property-type',
                                'hide_empty' => false,
                            ));
                    
                            // Loop through each property type and create radio buttons
                            foreach ($property_types as $property_type) :
                                 $property_icon = get_field('property_icon', $property_type);
                            ?>
                                <div class="box">
                                    <input name="property_type" type="radio" id="<?php echo esc_attr($property_type->slug); ?>" value="<?php echo esc_attr($property_type->slug); ?>" <?php echo ($property_type->slug === 'default-selected-slug') ? 'checked' : ''; ?>>
                                    <label for="<?php echo esc_attr($property_type->slug); ?>">
                                        <img src="<?php echo esc_attr($property_icon); ?>" width="20" height="20">
                                        <?php echo $property_type->name; ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="two-contents">
                            <h6>Price Range</h6>
                            <p>Total prices for 5 nights including fees and taxes</p>
                        </div>

                        <div class="double-range">
                            <input type="text"  class="js-range-slider"  value="" data-skin="round" data-type="double" data-min="0" data-max="1000" data-grid="false" />
                            <div class="number-box-inputs">
                                <input type="number" name="start_price" maxlength="4" value="0" class="from" />
                                <input type="number" name="ending_price" maxlength="4" value="1000" class="to" />
                            </div>
                        </div>
                        <div class="two-contents">
                            <h6>Must Haves</h6>
                            <p>Lorem ipsum dolor sit amet consectetur</p>
                        </div>
                        <div class="multipal-checkboxes">
                            <?php
                            // Fetch property types dynamically
                            $must_haves = get_terms(array(
                                'taxonomy' => 'must_have',
                                'hide_empty' => false,
                            ));
                        
                            // Loop through each property type and create checkboxes
                            foreach ($must_haves as $must_have) :
                                 $icon = get_field('select_icon', $must_have);
                               
                            ?>
                            
                                <div class="check-box-main">
                                    <input name="must_have[]" value="<?php echo esc_attr($must_have->slug); ?>" type="checkbox" id="<?php echo esc_attr($must_have->slug); ?>">
                                    <label for="<?php echo esc_attr($must_have->slug); ?>">
                                        <span><img src="<?php echo esc_attr($icon); ?>" width="20" height="20" ></span>
                                        <?php echo esc_html($must_have->name); ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="two-contents two-boxes-main">
                            <div class="content">
                                <h6>Cancellation Policy</h6>
                                <p>The amount of time before a booking you'll<br> have for free cancellation</p>
                            </div>
                           <select name="no_preferences_cancelation" id="no-Preferences-01">
                                <?php
                                $args = array(
                                    'post_type' => 'property', // Change 'excursions' to 'property'
                                    'posts_per_page' => -1, // Retrieve all posts
                                );
                                $posts = get_posts($args);
                                $added_values = array(); // Array to keep track of added values
                                if ($posts):
                                    echo '<option value="" selected>Select option</option>';
                                    foreach ($posts as $post):
                                        $cancellation_policy = get_field('cancellation_policy', $post->ID); // Retrieve 'cancellation_policy' field data for the current post
                                        if ($cancellation_policy && !in_array($cancellation_policy, $added_values)): ?>
                                            <option value="<?php echo esc_attr($cancellation_policy); ?>"><?php echo esc_html($cancellation_policy); ?></option>
                                            <?php
                                            $added_values[] = $cancellation_policy; // Add the value to the array of added values
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </select>


                        </div>
                        <div class="two-contents two-boxes-main">
                            <div class="content">
                                <h6>Privacy</h6>
                                <p>Household and neighbor may be able to see<br> into the space</p>
                            </div>
                           <select name="no_preferences_privacy" id="no-preferences-02">
                               <option value="" selected>Select option</option>
                                <?php
                                $args = array(
                                    'post_type' => 'property',
                                    'posts_per_page' => -1,
                                );
                                $posts = get_posts($args);
                                $unique_privacy_policies = array(); // Array to store unique privacy policies
                                if ($posts):
                                    foreach ($posts as $post):
                                        $privacy_policy = get_field('privacy', $post->ID);
                                        if (!empty($privacy_policy) && !in_array($privacy_policy, $unique_privacy_policies, true)):
                                            // Check if the privacy policy is not empty and not already added to the unique array
                                            $unique_privacy_policies[] = $privacy_policy; // Add the privacy policy to the unique array
                                            ?>
                                            <option value="<?php echo esc_attr($privacy_policy); ?>"><?php echo esc_html($privacy_policy); ?></option>
                                        <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </select>

                        </div>

                        <div class="two-contents">
                            <h6>Space Type</h6>
                            <p>Search rooms, entire homes or any type of place</p>
                        </div>

                        <div class="modal-tabbing">
                            <ul class="nav nav-tabs" role="tablist">
                                <?php
                                // Fetch amenities dynamically
                                $amenities = get_terms(array(
                                    'taxonomy' => 'amenity',
                                    'hide_empty' => false,
                                ));
                                // Loop through each amenity and create tabs
                                foreach ($amenities as $amenity) :
                                    $amenity_icon = get_field('select_icon', $amenity);
                                    // Check if $amenity_icon is an array
                                    if (is_array($amenity_icon) && !empty($amenity_icon['url'])) {
                                        $icon_url = $amenity_icon['url'];
                                    } else {
                                        $icon_url = ''; // Set default value if $amenity_icon is not an array or empty
                                    }
                                ?>
                                <li class="nav-item" role="presentation">
                                    <!--<a class="nav-link active" data-bs-toggle="tab" href="#icon-<?php echo esc_attr($amenity->term_id); ?>" role="tab" aria-selected="false" tabindex="-1">-->
                                        <div class="img-box">
                                            <input type="checkbox" name="amenities[]" value="<?php echo esc_html($amenity->slug); ?>">
                                            <img src="<?php echo esc_attr($icon_url); ?>" width="50" height="50">
                                            <p><?php echo esc_html($amenity->name); ?></p>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="tab-content">
                         
                                <div class="main-tabbing-innter-style">
                                 
                                    <div class="tow-btns-reset-submit">
                                        <input type="reset" placeholder="Clear All" id="resetButton">
                                        <button  type="submit" name="s" class="hm_fillter_btn">Show 1000+ Places</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-01 filter-modal share-the-link">
    <div class="modal fade" id="staticBackdrop5" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">How do you want to share?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="two-share-img-box">
                        <div class="box">
                            <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop7">
                                <span> <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14 12.6667C14 13.0333 13.8694 13.3472 13.6083 13.6083C13.3472 13.8694 13.0333 14 12.6667 14L3.33333 14C2.96667 14 2.65278 13.8694 2.39167 13.6083C2.13056 13.3472 2 13.0333 2 12.6667L2 8L3.33333 8L3.33333 12.6667L12.6667 12.6667L12.6667 8L14 8L14 12.6667ZM11.3333 5.33333L10.3667 6.25L8.66667 4.55L8.66667 10L7.33333 10L7.33333 4.55L5.63333 6.25L4.66667 5.33333L8 2L11.3333 5.33333Z" fill="#484848" />
                                    </svg>
                                </span>
                                <div class="content">
                                    <h6>Send a Link</h6>
                                    <p>Any with the link can view</p>
                                </div>
                            </button>
                            <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop6">
                                <span> <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.0833 9.16732L12.0833 7.16732H10.0833V6.16736H12.0833V4.16736H13.0833V6.16736H15.0833V7.16732L13.0833 7.16732L13.0833 9.16732H12.0833ZM5.99998 7.79552C5.35833 7.79552 4.80903 7.56706 4.35208 7.11012C3.89514 6.65318 3.66667 6.10388 3.66667 5.46222C3.66667 4.82056 3.89514 4.27126 4.35208 3.81432C4.80903 3.35738 5.35833 3.12891 5.99998 3.12891C6.64164 3.12891 7.19094 3.35738 7.64788 3.81432C8.10483 4.27126 8.3333 4.82056 8.3333 5.46222C8.3333 6.10388 8.10483 6.65318 7.64788 7.11012C7.19094 7.56706 6.64164 7.79552 5.99998 7.79552ZM1.00002 12.8724L1.00002 11.3904C1.00002 11.0639 1.08868 10.7616 1.26602 10.4834C1.44337 10.2052 1.68034 9.99128 1.97692 9.84171C2.63589 9.51863 3.30064 9.27632 3.97115 9.11479C4.64166 8.95326 5.31794 8.87249 5.99998 8.87249C6.68203 8.87249 7.35831 8.95326 8.02882 9.11479C8.69933 9.27632 9.36407 9.51863 10.0231 9.84171C10.3196 9.99128 10.5566 10.2052 10.7339 10.4834C10.9113 10.7616 11 11.0639 11 11.3904V12.8724L1.00002 12.8724ZM1.99998 11.8725L9.99998 11.8725V11.3904C9.99998 11.2554 9.96088 11.1304 9.88267 11.0154C9.80447 10.9005 9.69827 10.8066 9.56408 10.734C8.98973 10.4511 8.40407 10.2368 7.80712 10.091C7.21016 9.94532 6.60778 9.87246 5.99998 9.87246C5.39218 9.87246 4.78981 9.94532 4.19285 10.091C3.59589 10.2368 3.01024 10.4511 2.43588 10.734C2.30169 10.8066 2.1955 10.9005 2.1173 11.0154C2.03909 11.1304 1.99998 11.2554 1.99998 11.3904V11.8725ZM5.99998 6.79556C6.36665 6.79556 6.68054 6.665 6.94165 6.40389C7.20276 6.14278 7.33332 5.82889 7.33332 5.46222C7.33332 5.09556 7.20276 4.78167 6.94165 4.52056C6.68054 4.25945 6.36665 4.12889 5.99998 4.12889C5.63332 4.12889 5.31943 4.25945 5.05832 4.52056C4.79721 4.78167 4.66665 5.09556 4.66665 5.46222C4.66665 5.82889 4.79721 6.14278 5.05832 6.40389C5.31943 6.665 5.63332 6.79556 5.99998 6.79556Z" fill="#484848" />
                                    </svg>

                                </span>
                                <div class="content">
                                    <h6>Collaborate</h6>
                                    <p>Invite others to add to this wishlist</p>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="terms-and-other-pages-link">
                        <div class="img-box">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.4375 11.5625H8.56246V7.24998H7.4375V11.5625ZM7.99998 5.96634C8.17162 5.96634 8.31549 5.90829 8.43159 5.79219C8.54769 5.67609 8.60574 5.53222 8.60574 5.36058C8.60574 5.18896 8.54769 5.04509 8.43159 4.92898C8.31549 4.81288 8.17162 4.75483 7.99998 4.75483C7.82834 4.75483 7.68447 4.81288 7.56838 4.92898C7.45227 5.04509 7.39423 5.18896 7.39423 5.36058C7.39423 5.53222 7.45227 5.67609 7.56838 5.79219C7.68447 5.90829 7.82834 5.96634 7.99998 5.96634ZM8.00124 15.125C7.01579 15.125 6.08951 14.938 5.22241 14.564C4.3553 14.19 3.60104 13.6824 2.95963 13.0413C2.3182 12.4001 1.81041 11.6462 1.43624 10.7795C1.06208 9.91277 0.875 8.98669 0.875 8.00124C0.875 7.01579 1.062 6.08951 1.436 5.22241C1.81 4.3553 2.31756 3.60104 2.95869 2.95963C3.59983 2.3182 4.35376 1.81041 5.22048 1.43624C6.08719 1.06208 7.01328 0.875 7.99873 0.875C8.98418 0.875 9.91045 1.062 10.7776 1.436C11.6447 1.81 12.3989 2.31756 13.0403 2.95869C13.6818 3.59983 14.1896 4.35376 14.5637 5.22048C14.9379 6.08719 15.125 7.01328 15.125 7.99873C15.125 8.98418 14.938 9.91045 14.564 10.7776C14.19 11.6447 13.6824 12.3989 13.0413 13.0403C12.4001 13.6818 11.6462 14.1896 10.7795 14.5637C9.91277 14.9379 8.98669 15.125 8.00124 15.125ZM7.99998 14C9.67498 14 11.0937 13.4187 12.2562 12.2562C13.4187 11.0937 14 9.67498 14 7.99998C14 6.32498 13.4187 4.90623 12.2562 3.74373C11.0937 2.58123 9.67498 1.99998 7.99998 1.99998C6.32498 1.99998 4.90623 2.58123 3.74373 3.74373C2.58123 4.90623 1.99998 6.32498 1.99998 7.99998C1.99998 9.67498 2.58123 11.0937 3.74373 12.2562C4.90623 13.4187 6.32498 14 7.99998 14Z" fill="#9B9B9B" />
                            </svg>
                            <div class="content-box">
                                <p>While your wishlist can be viewed by anyone with the link, they won’t be able to read your notes. <a href="#">Learn more</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
            </div>
        </div>
    </div>
</div>
<div class="modal-01 filter-modal invite-others">
    <div class="modal fade" id="staticBackdrop6" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Invite others to join</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop5"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <div class="main-large-box">
                        <div class="img-box">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/main-icon-img-02.png" alt="">
                            <p> <b>Join my wishlist:</b> My Favorites <br> (6 saved)</p>
                        </div>
                    </div>
                    <div class="shares-to-other-li">
                        <div class="link-box">
                            <a href="#">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="40" height="40" rx="20" fill="#484848" fill-opacity="0.05" />
                                    <path d="M26 24.6667C26 25.0333 25.8694 25.3472 25.6083 25.6083C25.3472 25.8694 25.0333 26 24.6667 26L15.3333 26C14.9667 26 14.6528 25.8694 14.3917 25.6083C14.1306 25.3472 14 25.0333 14 24.6667L14 20L15.3333 20L15.3333 24.6667L24.6667 24.6667L24.6667 20L26 20L26 24.6667ZM23.3333 17.3333L22.3667 18.25L20.6667 16.55L20.6667 22L19.3333 22L19.3333 16.55L17.6333 18.25L16.6667 17.3333L20 14L23.3333 17.3333Z" fill="#484848" />
                                </svg>
                                Copy Link
                            </a>
                        </div>
                        <div class="link-box">
                            <a href="#">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="40" height="40" rx="20" fill="#484848" fill-opacity="0.05" />
                                    <path d="M14.8716 25C14.5349 25 14.2498 24.8833 14.0165 24.65C13.7832 24.4166 13.6665 24.1316 13.6665 23.7948L13.6665 16.2051C13.6665 15.8684 13.7832 15.5833 14.0165 15.35C14.2498 15.1167 14.5349 15 14.8716 15L25.128 15C25.4648 15 25.7498 15.1167 25.9831 15.35C26.2165 15.5833 26.3331 15.8684 26.3331 16.2051V23.7948C26.3331 24.1316 26.2165 24.4166 25.9831 24.65C25.7498 24.8833 25.4648 25 25.128 25H14.8716ZM19.9998 20.3718L14.6665 16.9615L14.6665 23.7948C14.6665 23.8547 14.6857 23.9038 14.7242 23.9423C14.7627 23.9808 14.8118 24 14.8716 24H25.128C25.1878 24 25.237 23.9808 25.2755 23.9423C25.3139 23.9038 25.3332 23.8547 25.3332 23.7948V16.9615L19.9998 20.3718ZM19.9998 19.3333L25.2306 16L14.7691 16L19.9998 19.3333ZM14.6665 16.9615V16L14.6665 23.7948C14.6665 23.8547 14.6857 23.9038 14.7242 23.9423C14.7627 23.9808 14.8118 24 14.8716 24H14.6665L14.6665 16.9615Z" fill="#484848" />
                                </svg>

                                Email
                            </a>
                        </div>
                        <div class="link-box">
                            <a href="#">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_686_18869)">
                                        <path d="M27.0273 0H6.97266C3.12793 0 0 3.12793 0 6.97266V27.0273C0 30.8721 3.12793 34 6.97266 34H27.0273C30.8721 34 34 30.8721 34 27.0273V6.97266C34 3.12793 30.8721 0 27.0273 0ZM17 25.6328C15.7628 25.6328 14.5723 25.4684 13.4584 25.1655L9.42969 27.2266L10.0257 23.6469C7.39832 21.9447 5.71094 19.3026 5.71094 16.3359C5.71094 11.2014 10.7652 7.03906 17 7.03906C23.2348 7.03906 28.2891 11.2014 28.2891 16.3359C28.2891 21.4705 23.2348 25.6328 17 25.6328Z" fill="url(#paint0_linear_686_18869)" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_686_18869" x1="17" y1="0" x2="17" y2="34" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#5BF675" />
                                            <stop stop-color="#0CBD2A" />
                                        </linearGradient>
                                        <clipPath id="clip0_686_18869">
                                            <rect width="34" height="34" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                Message
                            </a>
                        </div>
                        <div class="link-box">
                            <a href="#">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_686_18877)">
                                        <path d="M17 34C26.3888 34 34 26.3888 34 17C34 7.61116 26.3888 0 17 0C7.61116 0 0 7.61116 0 17C0 26.3888 7.61116 34 17 34Z" fill="#29A71A" />
                                        <path d="M24.4955 9.50368C22.7268 7.71732 20.378 6.62181 17.8727 6.41475C15.3674 6.20768 12.8706 6.90269 10.8326 8.37442C8.79458 9.84615 7.34959 11.9977 6.75824 14.441C6.1669 16.8843 6.46812 19.4585 7.60758 21.6992L6.48906 27.1296C6.47745 27.1836 6.47712 27.2395 6.48809 27.2937C6.49906 27.3479 6.52109 27.3992 6.55281 27.4445C6.59927 27.5132 6.66559 27.5661 6.74291 27.5961C6.82023 27.6262 6.90487 27.6319 6.98553 27.6125L12.3077 26.3511C14.5422 27.4617 17.0982 27.7435 19.5209 27.1465C21.9437 26.5494 24.0761 25.1122 25.5386 23.0905C27.0012 21.0688 27.699 18.5938 27.508 16.1058C27.317 13.6179 26.2495 11.2784 24.4955 9.50368ZM22.8361 22.7482C21.6123 23.9685 20.0365 24.7741 18.3306 25.0514C16.6248 25.3286 14.8749 25.0636 13.3277 24.2937L12.5859 23.9266L9.32303 24.6994L9.33269 24.6588L10.0088 21.3747L9.64565 20.658C8.85507 19.1053 8.57618 17.3423 8.84894 15.6214C9.12169 13.9006 9.9321 12.3102 11.1641 11.0781C12.712 9.53062 14.8113 8.66128 17.0001 8.66128C19.1889 8.66128 21.2881 9.53062 22.8361 11.0781C22.8493 11.0932 22.8635 11.1074 22.8786 11.1206C24.4074 12.6721 25.2608 14.765 25.2529 16.9432C25.2449 19.1213 24.3762 21.208 22.8361 22.7482Z" fill="white" />
                                        <path d="M22.5466 20.3399C22.1467 20.9697 21.515 21.7405 20.7211 21.9317C19.3302 22.2679 17.1955 21.9433 14.5392 19.4667L14.5064 19.4378C12.1708 17.2722 11.5642 15.4698 11.7111 14.0403C11.7922 13.2289 12.4683 12.4948 13.0382 12.0157C13.1283 11.9388 13.2352 11.8841 13.3502 11.8558C13.4652 11.8276 13.5853 11.8267 13.7007 11.8532C13.8162 11.8797 13.9239 11.9328 14.0151 12.0083C14.1064 12.0838 14.1787 12.1796 14.2263 12.2881L15.0859 14.2199C15.1418 14.3452 15.1625 14.4833 15.1458 14.6194C15.1292 14.7555 15.0757 14.8846 14.9913 14.9926L14.5566 15.5567C14.4634 15.6732 14.4071 15.8149 14.395 15.9637C14.383 16.1124 14.4157 16.2613 14.489 16.3913C14.7324 16.8182 15.3158 17.4461 15.963 18.0275C16.6894 18.6843 17.4949 19.2851 18.0049 19.4899C18.1414 19.5457 18.2914 19.5593 18.4357 19.529C18.58 19.4987 18.7119 19.4259 18.8144 19.3199L19.3186 18.8118C19.4159 18.7159 19.5368 18.6475 19.6692 18.6136C19.8015 18.5796 19.9405 18.5814 20.072 18.6187L22.1139 19.1982C22.2265 19.2328 22.3298 19.2926 22.4157 19.3732C22.5017 19.4538 22.5681 19.5529 22.6099 19.6631C22.6516 19.7733 22.6676 19.8915 22.6567 20.0088C22.6457 20.1261 22.6081 20.2394 22.5466 20.3399Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_686_18877">
                                            <rect width="34" height="34" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                Whats App
                            </a>
                        </div>
                        <div class="link-box">
                            <a href="#">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_686_18894)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17 0C7.42336 0 0 7.01489 0 16.49C0 21.4461 2.03117 25.7288 5.33893 28.6868C5.61664 28.9354 5.78425 29.2836 5.79561 29.6562L5.88818 32.6801C5.91773 33.6447 6.91409 34.2723 7.79676 33.8827L11.171 32.3931C11.457 32.2669 11.7775 32.2435 12.079 32.3264C13.6296 32.7528 15.2798 32.9799 16.9999 32.9799C26.5765 32.9799 33.9999 25.965 33.9999 16.4899C33.9999 7.01482 26.5766 0 17 0Z" fill="url(#paint0_radial_686_18894)" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.79141 21.3132L11.7852 13.3906C12.5795 12.1302 14.2805 11.8163 15.4724 12.7102L19.4441 15.6891C19.8086 15.9625 20.3099 15.9609 20.6728 15.6856L26.0369 11.6146C26.7529 11.0713 27.6875 11.9281 27.2083 12.6884L22.2146 20.6112C21.4202 21.8715 19.7192 22.1854 18.5274 21.2914L14.5555 18.3125C14.1911 18.0393 13.6897 18.0407 13.3268 18.3161L7.96275 22.3871C7.24676 22.9304 6.31215 22.0736 6.79141 21.3132Z" fill="white" />
                                    </g>
                                    <defs>
                                        <radialGradient id="paint0_radial_686_18894" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(6.54766 33.5872) scale(37.0281 37.0281)">
                                            <stop stop-color="#0099FF" />
                                            <stop offset="0.6098" stop-color="#A033FF" />
                                            <stop offset="0.9348" stop-color="#FF5280" />
                                            <stop offset="1" stop-color="#FF7061" />
                                        </radialGradient>
                                        <clipPath id="clip0_686_18894">
                                            <rect width="34" height="34" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                Messanger
                            </a>
                        </div>
                        <div class="link-box">
                            <a href="#">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_686_18904)">
                                        <path d="M34 17C34 25.4854 27.783 32.5185 19.6562 33.7935V21.9141H23.6174L24.3711 17H19.6562V13.8112C19.6562 12.4664 20.315 11.1562 22.4267 11.1562H24.5703V6.97266C24.5703 6.97266 22.6246 6.64062 20.7646 6.64062C16.8818 6.64062 14.3438 8.99406 14.3438 13.2547V17H10.0273V21.9141H14.3438V33.7935C6.21695 32.5185 0 25.4854 0 17C0 7.61148 7.61148 0 17 0C26.3885 0 34 7.61148 34 17Z" fill="#1877F2" />
                                        <path d="M23.6174 21.9141L24.3711 17H19.6562V13.8111C19.6562 12.4667 20.3149 11.1562 22.4267 11.1562H24.5703V6.97266C24.5703 6.97266 22.6249 6.64062 20.7649 6.64062C16.8817 6.64062 14.3438 8.99406 14.3438 13.2547V17H10.0273V21.9141H14.3438V33.7934C15.2093 33.9292 16.0963 34 17 34C17.9037 34 18.7907 33.9292 19.6562 33.7934V21.9141H23.6174Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_686_18904">
                                            <rect width="34" height="34" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>


                                Facebook
                            </a>
                        </div>
                    </div>
                    <div class="terms-and-other-pages-link">
                        <div class="img-box">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.4375 11.5625H8.56246V7.24998H7.4375V11.5625ZM7.99998 5.96634C8.17162 5.96634 8.31549 5.90829 8.43159 5.79219C8.54769 5.67609 8.60574 5.53222 8.60574 5.36058C8.60574 5.18896 8.54769 5.04509 8.43159 4.92898C8.31549 4.81288 8.17162 4.75483 7.99998 4.75483C7.82834 4.75483 7.68447 4.81288 7.56838 4.92898C7.45227 5.04509 7.39423 5.18896 7.39423 5.36058C7.39423 5.53222 7.45227 5.67609 7.56838 5.79219C7.68447 5.90829 7.82834 5.96634 7.99998 5.96634ZM8.00124 15.125C7.01579 15.125 6.08951 14.938 5.22241 14.564C4.3553 14.19 3.60104 13.6824 2.95963 13.0413C2.3182 12.4001 1.81041 11.6462 1.43624 10.7795C1.06208 9.91277 0.875 8.98669 0.875 8.00124C0.875 7.01579 1.062 6.08951 1.436 5.22241C1.81 4.3553 2.31756 3.60104 2.95869 2.95963C3.59983 2.3182 4.35376 1.81041 5.22048 1.43624C6.08719 1.06208 7.01328 0.875 7.99873 0.875C8.98418 0.875 9.91045 1.062 10.7776 1.436C11.6447 1.81 12.3989 2.31756 13.0403 2.95869C13.6818 3.59983 14.1896 4.35376 14.5637 5.22048C14.9379 6.08719 15.125 7.01328 15.125 7.99873C15.125 8.98418 14.938 9.91045 14.564 10.7776C14.19 11.6447 13.6824 12.3989 13.0413 13.0403C12.4001 13.6818 11.6462 14.1896 10.7795 14.5637C9.91277 14.9379 8.98669 15.125 8.00124 15.125ZM7.99998 14C9.67498 14 11.0937 13.4187 12.2562 12.2562C13.4187 11.0937 14 9.67498 14 7.99998C14 6.32498 13.4187 4.90623 12.2562 3.74373C11.0937 2.58123 9.67498 1.99998 7.99998 1.99998C6.32498 1.99998 4.90623 2.58123 3.74373 3.74373C2.58123 4.90623 1.99998 6.32498 1.99998 7.99998C1.99998 9.67498 2.58123 11.0937 3.74373 12.2562C4.90623 13.4187 6.32498 14 7.99998 14Z" fill="#9B9B9B" />
                            </svg>
                            <div class="content-box">
                                <p>Once you share this link, anyone can view your wishlist. <a href="">Learn more</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
            </div>
        </div>
    </div>
</div>
<div class="modal-01 filter-modal invite-others">
    <div class="modal fade" id="staticBackdrop7" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Send a link to your wishlist</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop5"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <div class="main-large-box">
                        <div class="img-box">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/main-icon-img-02.png" alt="">
                            <p> <b>Join my wishlist:</b> My Favorites <br> (6 saved)</p>
                        </div>
                    </div>
                    <div class="shares-to-other-li">
                        <div class="link-box">
                            <a href="#">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="40" height="40" rx="20" fill="#484848" fill-opacity="0.05" />
                                    <path d="M26 24.6667C26 25.0333 25.8694 25.3472 25.6083 25.6083C25.3472 25.8694 25.0333 26 24.6667 26L15.3333 26C14.9667 26 14.6528 25.8694 14.3917 25.6083C14.1306 25.3472 14 25.0333 14 24.6667L14 20L15.3333 20L15.3333 24.6667L24.6667 24.6667L24.6667 20L26 20L26 24.6667ZM23.3333 17.3333L22.3667 18.25L20.6667 16.55L20.6667 22L19.3333 22L19.3333 16.55L17.6333 18.25L16.6667 17.3333L20 14L23.3333 17.3333Z" fill="#484848" />
                                </svg>
                                Copy Link
                            </a>
                        </div>
                        <div class="link-box">
                            <a href="#">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="40" height="40" rx="20" fill="#484848" fill-opacity="0.05" />
                                    <path d="M14.8716 25C14.5349 25 14.2498 24.8833 14.0165 24.65C13.7832 24.4166 13.6665 24.1316 13.6665 23.7948L13.6665 16.2051C13.6665 15.8684 13.7832 15.5833 14.0165 15.35C14.2498 15.1167 14.5349 15 14.8716 15L25.128 15C25.4648 15 25.7498 15.1167 25.9831 15.35C26.2165 15.5833 26.3331 15.8684 26.3331 16.2051V23.7948C26.3331 24.1316 26.2165 24.4166 25.9831 24.65C25.7498 24.8833 25.4648 25 25.128 25H14.8716ZM19.9998 20.3718L14.6665 16.9615L14.6665 23.7948C14.6665 23.8547 14.6857 23.9038 14.7242 23.9423C14.7627 23.9808 14.8118 24 14.8716 24H25.128C25.1878 24 25.237 23.9808 25.2755 23.9423C25.3139 23.9038 25.3332 23.8547 25.3332 23.7948V16.9615L19.9998 20.3718ZM19.9998 19.3333L25.2306 16L14.7691 16L19.9998 19.3333ZM14.6665 16.9615V16L14.6665 23.7948C14.6665 23.8547 14.6857 23.9038 14.7242 23.9423C14.7627 23.9808 14.8118 24 14.8716 24H14.6665L14.6665 16.9615Z" fill="#484848" />
                                </svg>

                                Email
                            </a>
                        </div>
                        <div class="link-box">
                            <a href="#">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_686_188699)">
                                        <path d="M27.0273 0H6.97266C3.12793 0 0 3.12793 0 6.97266V27.0273C0 30.8721 3.12793 34 6.97266 34H27.0273C30.8721 34 34 30.8721 34 27.0273V6.97266C34 3.12793 30.8721 0 27.0273 0ZM17 25.6328C15.7628 25.6328 14.5723 25.4684 13.4584 25.1655L9.42969 27.2266L10.0257 23.6469C7.39832 21.9447 5.71094 19.3026 5.71094 16.3359C5.71094 11.2014 10.7652 7.03906 17 7.03906C23.2348 7.03906 28.2891 11.2014 28.2891 16.3359C28.2891 21.4705 23.2348 25.6328 17 25.6328Z" fill="url(#paint0_linear_686_188699)" />
                                    </g>
                                    <defs>
                                        <linearGradient id="paint0_linear_686_188699" x1="17" y1="0" x2="17" y2="34" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#5BF675" />
                                            <stop offset="1" stop-color="#0CBD2A" />
                                        </linearGradient>
                                        <clipPath id="clip0_686_188699">
                                            <rect width="34" height="34" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                Message
                            </a>
                        </div>
                        <div class="link-box">
                            <a href="#">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_686_18877)">
                                        <path d="M17 34C26.3888 34 34 26.3888 34 17C34 7.61116 26.3888 0 17 0C7.61116 0 0 7.61116 0 17C0 26.3888 7.61116 34 17 34Z" fill="#29A71A" />
                                        <path d="M24.4955 9.50368C22.7268 7.71732 20.378 6.62181 17.8727 6.41475C15.3674 6.20768 12.8706 6.90269 10.8326 8.37442C8.79458 9.84615 7.34959 11.9977 6.75824 14.441C6.1669 16.8843 6.46812 19.4585 7.60758 21.6992L6.48906 27.1296C6.47745 27.1836 6.47712 27.2395 6.48809 27.2937C6.49906 27.3479 6.52109 27.3992 6.55281 27.4445C6.59927 27.5132 6.66559 27.5661 6.74291 27.5961C6.82023 27.6262 6.90487 27.6319 6.98553 27.6125L12.3077 26.3511C14.5422 27.4617 17.0982 27.7435 19.5209 27.1465C21.9437 26.5494 24.0761 25.1122 25.5386 23.0905C27.0012 21.0688 27.699 18.5938 27.508 16.1058C27.317 13.6179 26.2495 11.2784 24.4955 9.50368ZM22.8361 22.7482C21.6123 23.9685 20.0365 24.7741 18.3306 25.0514C16.6248 25.3286 14.8749 25.0636 13.3277 24.2937L12.5859 23.9266L9.32303 24.6994L9.33269 24.6588L10.0088 21.3747L9.64565 20.658C8.85507 19.1053 8.57618 17.3423 8.84894 15.6214C9.12169 13.9006 9.9321 12.3102 11.1641 11.0781C12.712 9.53062 14.8113 8.66128 17.0001 8.66128C19.1889 8.66128 21.2881 9.53062 22.8361 11.0781C22.8493 11.0932 22.8635 11.1074 22.8786 11.1206C24.4074 12.6721 25.2608 14.765 25.2529 16.9432C25.2449 19.1213 24.3762 21.208 22.8361 22.7482Z" fill="white" />
                                        <path d="M22.5466 20.3399C22.1467 20.9697 21.515 21.7405 20.7211 21.9317C19.3302 22.2679 17.1955 21.9433 14.5392 19.4667L14.5064 19.4378C12.1708 17.2722 11.5642 15.4698 11.7111 14.0403C11.7922 13.2289 12.4683 12.4948 13.0382 12.0157C13.1283 11.9388 13.2352 11.8841 13.3502 11.8558C13.4652 11.8276 13.5853 11.8267 13.7007 11.8532C13.8162 11.8797 13.9239 11.9328 14.0151 12.0083C14.1064 12.0838 14.1787 12.1796 14.2263 12.2881L15.0859 14.2199C15.1418 14.3452 15.1625 14.4833 15.1458 14.6194C15.1292 14.7555 15.0757 14.8846 14.9913 14.9926L14.5566 15.5567C14.4634 15.6732 14.4071 15.8149 14.395 15.9637C14.383 16.1124 14.4157 16.2613 14.489 16.3913C14.7324 16.8182 15.3158 17.4461 15.963 18.0275C16.6894 18.6843 17.4949 19.2851 18.0049 19.4899C18.1414 19.5457 18.2914 19.5593 18.4357 19.529C18.58 19.4987 18.7119 19.4259 18.8144 19.3199L19.3186 18.8118C19.4159 18.7159 19.5368 18.6475 19.6692 18.6136C19.8015 18.5796 19.9405 18.5814 20.072 18.6187L22.1139 19.1982C22.2265 19.2328 22.3298 19.2926 22.4157 19.3732C22.5017 19.4538 22.5681 19.5529 22.6099 19.6631C22.6516 19.7733 22.6676 19.8915 22.6567 20.0088C22.6457 20.1261 22.6081 20.2394 22.5466 20.3399Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_686_18877">
                                            <rect width="34" height="34" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>

                                Whats App
                            </a>
                        </div>
                        <div class="link-box">
                            <a href="#">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_686_188944)">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17 0C7.42336 0 0 7.01489 0 16.49C0 21.4461 2.03117 25.7288 5.33893 28.6868C5.61664 28.9354 5.78425 29.2836 5.79561 29.6562L5.88818 32.6801C5.91773 33.6447 6.91409 34.2723 7.79676 33.8827L11.171 32.3931C11.457 32.2669 11.7775 32.2435 12.079 32.3264C13.6296 32.7528 15.2798 32.9799 16.9999 32.9799C26.5765 32.9799 33.9999 25.965 33.9999 16.4899C33.9999 7.01482 26.5766 0 17 0Z" fill="url(#paint0_radial_686_188944)" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.79141 21.3132L11.7852 13.3906C12.5795 12.1302 14.2805 11.8163 15.4724 12.7102L19.4441 15.6891C19.8086 15.9625 20.3099 15.9609 20.6728 15.6856L26.0369 11.6146C26.7529 11.0713 27.6875 11.9281 27.2083 12.6884L22.2146 20.6112C21.4202 21.8715 19.7192 22.1854 18.5274 21.2914L14.5555 18.3125C14.1911 18.0393 13.6897 18.0407 13.3268 18.3161L7.96275 22.3871C7.24676 22.9304 6.31215 22.0736 6.79141 21.3132Z" fill="white" />
                                    </g>
                                    <defs>
                                        <radialGradient id="paint0_radial_686_188944" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(6.54766 33.5872) scale(37.0281 37.0281)">
                                            <stop stop-color="#0099FF" />
                                            <stop offset="0.6098" stop-color="#A033FF" />
                                            <stop offset="0.9348" stop-color="#FF5280" />
                                            <stop offset="1" stop-color="#FF7061" />
                                        </radialGradient>
                                        <clipPath id="clip0_686_188944">
                                            <rect width="34" height="34" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>


                                Messanger
                            </a>
                        </div>
                        <div class="link-box">
                            <a href="#">
                                <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_686_18904)">
                                        <path d="M34 17C34 25.4854 27.783 32.5185 19.6562 33.7935V21.9141H23.6174L24.3711 17H19.6562V13.8112C19.6562 12.4664 20.315 11.1562 22.4267 11.1562H24.5703V6.97266C24.5703 6.97266 22.6246 6.64062 20.7646 6.64062C16.8818 6.64062 14.3438 8.99406 14.3438 13.2547V17H10.0273V21.9141H14.3438V33.7935C6.21695 32.5185 0 25.4854 0 17C0 7.61148 7.61148 0 17 0C26.3885 0 34 7.61148 34 17Z" fill="#1877F2" />
                                        <path d="M23.6174 21.9141L24.3711 17H19.6562V13.8111C19.6562 12.4667 20.3149 11.1562 22.4267 11.1562H24.5703V6.97266C24.5703 6.97266 22.6249 6.64062 20.7649 6.64062C16.8817 6.64062 14.3438 8.99406 14.3438 13.2547V17H10.0273V21.9141H14.3438V33.7934C15.2093 33.9292 16.0963 34 17 34C17.9037 34 18.7907 33.9292 19.6562 33.7934V21.9141H23.6174Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_686_18904">
                                            <rect width="34" height="34" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>


                                Facebook
                            </a>
                        </div>
                    </div>
                    <div class="terms-and-other-pages-link">
                        <div class="img-box">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.4375 11.5625H8.56246V7.24998H7.4375V11.5625ZM7.99998 5.96634C8.17162 5.96634 8.31549 5.90829 8.43159 5.79219C8.54769 5.67609 8.60574 5.53222 8.60574 5.36058C8.60574 5.18896 8.54769 5.04509 8.43159 4.92898C8.31549 4.81288 8.17162 4.75483 7.99998 4.75483C7.82834 4.75483 7.68447 4.81288 7.56838 4.92898C7.45227 5.04509 7.39423 5.18896 7.39423 5.36058C7.39423 5.53222 7.45227 5.67609 7.56838 5.79219C7.68447 5.90829 7.82834 5.96634 7.99998 5.96634ZM8.00124 15.125C7.01579 15.125 6.08951 14.938 5.22241 14.564C4.3553 14.19 3.60104 13.6824 2.95963 13.0413C2.3182 12.4001 1.81041 11.6462 1.43624 10.7795C1.06208 9.91277 0.875 8.98669 0.875 8.00124C0.875 7.01579 1.062 6.08951 1.436 5.22241C1.81 4.3553 2.31756 3.60104 2.95869 2.95963C3.59983 2.3182 4.35376 1.81041 5.22048 1.43624C6.08719 1.06208 7.01328 0.875 7.99873 0.875C8.98418 0.875 9.91045 1.062 10.7776 1.436C11.6447 1.81 12.3989 2.31756 13.0403 2.95869C13.6818 3.59983 14.1896 4.35376 14.5637 5.22048C14.9379 6.08719 15.125 7.01328 15.125 7.99873C15.125 8.98418 14.938 9.91045 14.564 10.7776C14.19 11.6447 13.6824 12.3989 13.0413 13.0403C12.4001 13.6818 11.6462 14.1896 10.7795 14.5637C9.91277 14.9379 8.98669 15.125 8.00124 15.125ZM7.99998 14C9.67498 14 11.0937 13.4187 12.2562 12.2562C13.4187 11.0937 14 9.67498 14 7.99998C14 6.32498 13.4187 4.90623 12.2562 3.74373C11.0937 2.58123 9.67498 1.99998 7.99998 1.99998C6.32498 1.99998 4.90623 2.58123 3.74373 3.74373C2.58123 4.90623 1.99998 6.32498 1.99998 7.99998C1.99998 9.67498 2.58123 11.0937 3.74373 12.2562C4.90623 13.4187 6.32498 14 7.99998 14Z" fill="#9B9B9B" />
                            </svg>
                            <div class="content-box">
                                <p>Once you share this link, anyone can view your wishlist. <a href="">Learn more</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal-01 filter-modal share-the-link delete-account-modal">
    <div class="modal fade" id="staticBackdrop8" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Account?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-img-center text-center">
                        <svg width="284" height="192" viewBox="0 0 284 192" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.6" d="M141.739 162.935C183.451 162.935 217.265 159.77 217.265 155.866C217.265 151.962 183.451 148.797 141.739 148.797C100.028 148.797 66.2135 151.962 66.2135 155.866C66.2135 159.77 100.028 162.935 141.739 162.935Z" fill="#FAE6E5" />
                            <path d="M110.09 83.5969L111.286 74.7969H174.309V83.5969H110.09Z" fill="#F8B4B4" />
                            <path d="M172.34 72.6094H160.461V67.0376C160.459 65.847 159.987 64.7055 159.148 63.8636C158.308 63.0217 157.17 62.5482 155.982 62.5469H128.815C127.628 62.5482 126.49 63.0218 125.65 63.8636C124.811 64.7055 124.338 65.847 124.337 67.0376V72.6094H112.458C111.271 72.6108 110.133 73.0845 109.293 73.9263C108.454 74.7682 107.982 75.9096 107.98 77.1001V84.1101C107.98 84.4913 108.131 84.8569 108.4 85.1265C108.669 85.3961 109.034 85.5475 109.414 85.5476H113.647L115.653 132.902C115.312 138.271 119.004 143.05 124.561 143.047H160.237C162.519 143.052 164.715 142.17 166.363 140.586C168.011 139.002 168.983 136.839 169.075 134.552L171.151 85.5475H175.384C175.764 85.5474 176.129 85.396 176.397 85.1264C176.666 84.8568 176.817 84.4912 176.817 84.11V77.1001C176.816 75.9096 176.344 74.7682 175.505 73.9263C174.665 73.0845 173.527 72.6108 172.34 72.6094ZM127.204 67.0376C127.205 66.6093 127.375 66.1986 127.677 65.8957C127.979 65.5928 128.388 65.4224 128.815 65.4219H155.982C156.41 65.4224 156.819 65.5929 157.121 65.8957C157.423 66.1986 157.593 66.6093 157.594 67.0376V72.6094H127.204V67.0376ZM166.211 134.43C166.148 135.976 165.491 137.438 164.377 138.508C163.264 139.579 161.779 140.175 160.237 140.172H124.561C123.018 140.175 121.534 139.579 120.42 138.508C119.306 137.438 118.649 135.976 118.587 134.43L116.516 85.5476H168.282L166.211 134.43ZM173.95 82.6726C169.207 82.6726 115.594 82.6726 110.847 82.6726V77.1001C110.848 76.6718 111.017 76.2612 111.319 75.9583C111.621 75.6554 112.031 75.485 112.458 75.4844C112.458 75.4844 163.474 75.4842 172.34 75.4844C172.767 75.485 173.176 75.6554 173.478 75.9583C173.78 76.2612 173.95 76.6718 173.95 77.1001V82.6726Z" fill="#484848" />
                            <path d="M129.63 133.206C129.824 133.206 130.016 133.167 130.194 133.09C130.373 133.014 130.534 132.902 130.668 132.761C130.802 132.62 130.906 132.454 130.974 132.272C131.042 132.09 131.072 131.895 131.063 131.701L129.298 93.8847C129.273 93.5084 129.103 93.1567 128.823 92.9053C128.542 92.6539 128.175 92.523 127.799 92.5406C127.424 92.5583 127.07 92.7232 126.815 92.9999C126.559 93.2765 126.422 93.6426 126.433 94.0195L128.199 131.836C128.217 132.205 128.375 132.553 128.641 132.808C128.908 133.063 129.262 133.206 129.63 133.206Z" fill="#484848" />
                            <path d="M155.099 133.205C155.479 133.222 155.85 133.088 156.131 132.832C156.412 132.575 156.58 132.217 156.598 131.836L158.364 94.0198C158.382 93.6389 158.248 93.2665 157.992 92.9846C157.736 92.7026 157.379 92.5342 156.999 92.5163C156.621 92.5046 156.253 92.6409 155.974 92.8963C155.694 93.1518 155.524 93.5063 155.5 93.885L153.734 131.702C153.725 131.89 153.754 132.079 153.818 132.256C153.881 132.434 153.979 132.597 154.106 132.737C154.233 132.876 154.386 132.99 154.556 133.07C154.727 133.15 154.911 133.196 155.099 133.205Z" fill="#484848" />
                            <path d="M142.399 133.207C142.779 133.207 143.144 133.056 143.413 132.786C143.681 132.516 143.832 132.151 143.832 131.77V93.9531C143.832 93.5719 143.681 93.2062 143.413 92.9367C143.144 92.6671 142.779 92.5156 142.399 92.5156C142.019 92.5156 141.654 92.6671 141.385 92.9367C141.116 93.2062 140.965 93.5719 140.965 93.9531V131.77C140.965 132.151 141.117 132.516 141.385 132.786C141.654 133.056 142.019 133.207 142.399 133.207Z" fill="#484848" />
                            <path d="M178.389 46.1301C179.924 50.3628 184.602 52.551 188.838 51.0174C193.074 49.4839 195.264 44.8096 193.729 40.5763C192.195 36.3436 187.517 34.1554 183.28 35.6889C179.044 37.2225 176.854 41.8967 178.389 46.1301ZM190.968 41.5757C191.95 44.2847 190.548 47.2768 187.837 48.258C185.126 49.2393 182.132 47.8389 181.15 45.1299C180.168 42.421 181.569 39.4289 184.28 38.4476C186.991 37.4664 189.986 38.8668 190.968 41.5757Z" fill="#FAE6E5" />
                            <path d="M79.4111 75.9522C80.0558 74.1736 79.1354 72.2095 77.3554 71.5652C75.5754 70.921 73.6098 71.8407 72.9651 73.6193C72.3204 75.398 73.2407 77.3621 75.0207 78.0063C76.8007 78.6505 78.7664 77.7309 79.4111 75.9522Z" fill="#D43228" />
                            <path d="M94.1877 121.784C96.5528 120.372 97.3226 117.3 95.9063 114.923C94.4896 112.546 91.424 111.764 89.059 113.175C86.6935 114.588 85.9241 117.659 87.3404 120.036C88.7571 122.413 91.8222 123.196 94.1877 121.784ZM89.9821 114.725C91.496 113.821 93.458 114.322 94.3643 115.843C95.2705 117.364 94.7785 119.33 93.2646 120.234C91.7507 121.137 89.7887 120.636 88.8824 119.115C87.9762 117.594 88.4683 115.628 89.9821 114.725Z" fill="#FAE6E5" />
                            <path d="M194.903 122.859C196.64 122.121 197.447 120.107 196.705 118.362C195.963 116.616 193.952 115.8 192.214 116.538C190.476 117.277 189.669 119.29 190.412 121.035C191.154 122.781 193.165 123.597 194.903 122.859Z" fill="#D43228" />
                            <path d="M107.76 47.203L111.326 42.3963L115.63 45.584L117.053 43.6649L112.748 40.4773L116.314 35.6705L114.596 34.3984L111.031 39.2051L106.727 36.0182L105.303 37.9365L109.608 41.1242L106.042 45.9309L107.76 47.203Z" fill="#484848" />
                            <path d="M204.288 89.6015L207.854 84.7947L212.158 87.9824L213.581 86.0634L209.277 82.8757L212.842 78.069L211.124 76.7969L207.559 81.6036L203.255 78.4166L201.832 80.335L206.136 83.5226L202.57 88.3293L204.288 89.6015Z" fill="#484848" />
                        </svg>

                    </div>
                    <div class="modal-content-delet text-center">
                        <p>Requesting deletion of your account means that you will no longer be able to use your Lucky Backyards account, and your account will be permanently closed.</p>
                        <p>If you'd prefer to close your account temporarily, deactivating your luckybackyards account is a better option.</p>
                    </div>

                    <div class="modal-footer">
                        <!--<button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop9">Delete Account</button>-->
                        <button type="button" class="share delete_account" onclick="submitModalForm()" >Delete Account</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>

                </div>
                <div class="overlay_loader">
                    <div class="rz-preloader">
                        <i class="fas fa-sync"></i>
                    </div>
                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal-01 filter-modal share-the-link delete-account-modal youre-all-set-modal">
    <div class="modal fade" id="staticBackdrop9" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">You're all Set</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-img-center text-center">
                        <svg width="284" height="192" viewBox="0 0 284 192" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.6" d="M141.739 162.939C183.451 162.939 217.265 159.774 217.265 155.87C217.265 151.966 183.451 148.801 141.739 148.801C100.027 148.801 66.2134 151.966 66.2134 155.87C66.2134 159.774 100.027 162.939 141.739 162.939Z" fill="#E9FBE8" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M147.901 71.1707L142.726 63.752C142.567 63.5243 142.231 63.5244 142.072 63.752L136.896 71.1707C135.453 73.2389 132.874 74.1804 130.443 73.5261L121.723 71.1792C121.455 71.1072 121.198 71.3239 121.222 71.6006L122.013 80.6198C122.233 83.1343 120.861 85.5182 118.579 86.5841L110.395 90.4071C110.144 90.5244 110.085 90.8563 110.281 91.0527L116.668 97.4522C118.449 99.2363 118.925 101.947 117.861 104.234L114.042 112.439C113.924 112.69 114.093 112.982 114.368 113.006L123.363 113.792C125.871 114.011 127.973 115.78 128.624 118.219L130.957 126.965C131.029 127.233 131.345 127.349 131.571 127.189L138.965 121.993C141.026 120.544 143.771 120.544 145.833 121.993L153.226 127.189C153.453 127.349 153.769 127.233 153.84 126.965L156.174 118.219C156.824 115.78 158.927 114.011 161.435 113.792L170.429 113.006C170.705 112.982 170.873 112.69 170.756 112.439L166.937 104.234C165.872 101.947 166.349 99.2363 168.13 97.4522L174.516 91.0527C174.712 90.8563 174.654 90.5244 174.403 90.4071L166.219 86.5841C163.937 85.5182 162.564 83.1343 162.785 80.6198L163.575 71.6006C163.6 71.3239 163.342 71.1072 163.075 71.1792L154.355 73.5261C151.924 74.1804 149.344 73.239 147.901 71.1707ZM145.013 62.1469C143.743 60.326 141.054 60.326 139.784 62.1469L134.609 69.5656C133.839 70.6687 132.463 71.1708 131.167 70.8218L122.447 68.4749C120.307 67.8989 118.247 69.6321 118.441 71.8458L119.231 80.865C119.349 82.206 118.617 83.4775 117.4 84.0459L109.216 87.869C107.207 88.8073 106.74 91.4627 108.308 93.0334L114.695 99.4329C115.644 100.384 115.898 101.83 115.331 103.05L111.512 111.254C110.574 113.268 111.919 115.603 114.126 115.796L123.121 116.581C124.458 116.698 125.58 117.642 125.927 118.942L128.26 127.689C128.832 129.835 131.359 130.758 133.174 129.482L140.567 124.286C141.667 123.513 143.131 123.513 144.23 124.286L151.624 129.482C153.438 130.758 155.965 129.835 156.538 127.689L158.871 118.942C159.218 117.642 160.339 116.698 161.677 116.581L170.671 115.796C172.879 115.603 174.223 113.268 173.286 111.254L169.467 103.05C168.899 101.83 169.153 100.384 170.103 99.4329L176.49 93.0334C178.057 91.4627 177.59 88.8073 175.582 87.869L167.398 84.0459C166.181 83.4775 165.449 82.206 165.566 80.865L166.357 71.8458C166.551 69.6321 164.491 67.8989 162.351 68.4749L153.631 70.8218C152.334 71.1708 150.959 70.6687 150.189 69.5656L145.013 62.1469Z" fill="#484848" />
                            <path d="M138.84 107.998C138.183 107.998 137.559 107.725 137.1 107.247L129.152 98.9863C128.2 97.9963 128.2 96.3578 129.152 95.3678C130.105 94.3778 131.681 94.3778 132.633 95.3678L138.84 101.82L152.962 87.1409C153.914 86.1509 155.49 86.1509 156.443 87.1409C157.395 88.1309 157.395 89.7695 156.443 90.7593L140.581 107.247C140.121 107.725 139.497 107.998 138.84 107.998Z" fill="#4CAF50" />
                            <path d="M70.6922 124.532C72.227 128.765 76.9048 130.953 81.1414 129.42C85.3774 127.886 87.5673 123.212 86.0325 118.979C84.4978 114.746 79.82 112.558 75.5833 114.091C71.3474 115.625 69.1575 120.299 70.6922 124.532ZM83.271 119.978C84.253 122.687 82.8515 125.679 80.1405 126.66C77.4295 127.642 74.4351 126.241 73.4531 123.532C72.4711 120.823 73.8725 117.831 76.5836 116.85C79.2946 115.869 82.2883 117.269 83.271 119.978Z" fill="#DBF9D8" />
                            <path d="M187.962 56.5325C189.497 60.7651 194.174 62.9533 198.411 61.4198C202.647 59.8862 204.837 55.212 203.302 50.9786C201.767 46.7459 197.089 44.5577 192.853 46.0913C188.617 47.6248 186.427 52.2991 187.962 56.5325ZM200.541 51.9781C201.523 54.687 200.121 57.6791 197.41 58.6604C194.699 59.6416 191.705 58.2412 190.723 55.5323C189.741 52.8233 191.142 49.8312 193.853 48.85C196.564 47.8687 199.559 49.2691 200.541 51.9781Z" fill="#DBF9D8" />
                            <path d="M93.7706 67.1553C94.4153 65.3767 93.4949 63.4126 91.7149 62.7684C89.9349 62.1242 87.9693 63.0438 87.3246 64.8224C86.6799 66.6011 87.6002 68.5652 89.3802 69.2094C91.1602 69.8536 93.1259 68.934 93.7706 67.1553Z" fill="#4CAF50" />
                            <path d="M217.042 137.788C219.407 136.376 220.176 133.304 218.76 130.927C217.343 128.55 214.278 127.768 211.913 129.179C209.547 130.592 208.778 133.663 210.194 136.04C211.611 138.417 214.676 139.2 217.042 137.788ZM212.836 130.728C214.35 129.825 216.312 130.326 217.218 131.847C218.124 133.368 217.632 135.334 216.118 136.238C214.605 137.141 212.643 136.64 211.736 135.119C210.83 133.598 211.322 131.632 212.836 130.728Z" fill="#DBF9D8" />
                            <path d="M118.918 40.1861C121.283 38.7744 122.053 35.7025 120.636 33.3257C119.22 30.9485 116.154 30.166 113.789 31.5777C111.424 32.9899 110.654 36.0613 112.07 38.4381C113.487 40.8154 116.552 41.5984 118.918 40.1861ZM114.712 33.1269C116.226 32.2235 118.188 32.724 119.094 34.2454C120.001 35.7668 119.509 37.7326 117.995 38.6359C116.481 39.5393 114.519 39.0388 113.613 37.5174C112.706 35.996 113.198 34.0303 114.712 33.1269Z" fill="#DBF9D8" />
                            <path d="M190.914 112.46C192.652 111.722 193.459 109.709 192.716 107.963C191.974 106.218 189.963 105.402 188.225 106.14C186.487 106.878 185.68 108.891 186.423 110.637C187.165 112.382 189.176 113.199 190.914 112.46Z" fill="#4CAF50" />
                        </svg>


                    </div>
                    <div class="modal-content-delet text-center">
                        <p>Your deletion request will be processed after we've<br> confirmed you're the owner of this account.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                    </div>

                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal-01 filter-modal share-the-link delete-account-modal rename-wishlist-modal ">
    <div class="modal fade" id="staticBackdrop10" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Rename Wishlist</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rename-wishlist-modal-input">
                        <form>
                            <label>Name</label>
                            <input type="text" required>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="share" data-bs-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-01 filter-modal share-the-link delete-account-modal delete-this-wishlist-modal">
    <div class="modal fade" id="staticBackdrop11" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete this Wishlist?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-img-center text-center">
                        <svg width="284" height="192" viewBox="0 0 284 192" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.6" d="M141.739 162.935C183.451 162.935 217.265 159.77 217.265 155.866C217.265 151.962 183.451 148.797 141.739 148.797C100.028 148.797 66.2135 151.962 66.2135 155.866C66.2135 159.77 100.028 162.935 141.739 162.935Z" fill="#FAE6E5" />
                            <path d="M110.09 83.5969L111.286 74.7969H174.309V83.5969H110.09Z" fill="#F8B4B4" />
                            <path d="M172.34 72.6094H160.461V67.0376C160.459 65.847 159.987 64.7055 159.148 63.8636C158.308 63.0217 157.17 62.5482 155.982 62.5469H128.815C127.628 62.5482 126.49 63.0218 125.65 63.8636C124.811 64.7055 124.338 65.847 124.337 67.0376V72.6094H112.458C111.271 72.6108 110.133 73.0845 109.293 73.9263C108.454 74.7682 107.982 75.9096 107.98 77.1001V84.1101C107.98 84.4913 108.131 84.8569 108.4 85.1265C108.669 85.3961 109.034 85.5475 109.414 85.5476H113.647L115.653 132.902C115.312 138.271 119.004 143.05 124.561 143.047H160.237C162.519 143.052 164.715 142.17 166.363 140.586C168.011 139.002 168.983 136.839 169.075 134.552L171.151 85.5475H175.384C175.764 85.5474 176.129 85.396 176.397 85.1264C176.666 84.8568 176.817 84.4912 176.817 84.11V77.1001C176.816 75.9096 176.344 74.7682 175.505 73.9263C174.665 73.0845 173.527 72.6108 172.34 72.6094ZM127.204 67.0376C127.205 66.6093 127.375 66.1986 127.677 65.8957C127.979 65.5928 128.388 65.4224 128.815 65.4219H155.982C156.41 65.4224 156.819 65.5929 157.121 65.8957C157.423 66.1986 157.593 66.6093 157.594 67.0376V72.6094H127.204V67.0376ZM166.211 134.43C166.148 135.976 165.491 137.438 164.377 138.508C163.264 139.579 161.779 140.175 160.237 140.172H124.561C123.018 140.175 121.534 139.579 120.42 138.508C119.306 137.438 118.649 135.976 118.587 134.43L116.516 85.5476H168.282L166.211 134.43ZM173.95 82.6726C169.207 82.6726 115.594 82.6726 110.847 82.6726V77.1001C110.848 76.6718 111.017 76.2612 111.319 75.9583C111.621 75.6554 112.031 75.485 112.458 75.4844C112.458 75.4844 163.474 75.4842 172.34 75.4844C172.767 75.485 173.176 75.6554 173.478 75.9583C173.78 76.2612 173.95 76.6718 173.95 77.1001V82.6726Z" fill="#484848" />
                            <path d="M129.63 133.206C129.824 133.206 130.016 133.167 130.194 133.09C130.373 133.014 130.534 132.902 130.668 132.761C130.802 132.62 130.906 132.454 130.974 132.272C131.042 132.09 131.072 131.895 131.063 131.701L129.298 93.8847C129.273 93.5084 129.103 93.1567 128.823 92.9053C128.542 92.6539 128.175 92.523 127.799 92.5406C127.424 92.5583 127.07 92.7232 126.815 92.9999C126.559 93.2765 126.422 93.6426 126.433 94.0195L128.199 131.836C128.217 132.205 128.375 132.553 128.641 132.808C128.908 133.063 129.262 133.206 129.63 133.206Z" fill="#484848" />
                            <path d="M155.099 133.205C155.479 133.222 155.85 133.088 156.131 132.832C156.412 132.575 156.58 132.217 156.598 131.836L158.364 94.0198C158.382 93.6389 158.248 93.2665 157.992 92.9846C157.736 92.7026 157.379 92.5342 156.999 92.5163C156.621 92.5046 156.253 92.6409 155.974 92.8963C155.694 93.1518 155.524 93.5063 155.5 93.885L153.734 131.702C153.725 131.89 153.754 132.079 153.818 132.256C153.881 132.434 153.979 132.597 154.106 132.737C154.233 132.876 154.386 132.99 154.556 133.07C154.727 133.15 154.911 133.196 155.099 133.205Z" fill="#484848" />
                            <path d="M142.399 133.207C142.779 133.207 143.144 133.056 143.413 132.786C143.681 132.516 143.832 132.151 143.832 131.77V93.9531C143.832 93.5719 143.681 93.2062 143.413 92.9367C143.144 92.6671 142.779 92.5156 142.399 92.5156C142.019 92.5156 141.654 92.6671 141.385 92.9367C141.116 93.2062 140.965 93.5719 140.965 93.9531V131.77C140.965 132.151 141.117 132.516 141.385 132.786C141.654 133.056 142.019 133.207 142.399 133.207Z" fill="#484848" />
                            <path d="M178.389 46.1301C179.924 50.3628 184.602 52.551 188.838 51.0174C193.074 49.4839 195.264 44.8096 193.729 40.5763C192.195 36.3436 187.517 34.1554 183.28 35.6889C179.044 37.2225 176.854 41.8967 178.389 46.1301ZM190.968 41.5757C191.95 44.2847 190.548 47.2768 187.837 48.258C185.126 49.2393 182.132 47.8389 181.15 45.1299C180.168 42.421 181.569 39.4289 184.28 38.4476C186.991 37.4664 189.986 38.8668 190.968 41.5757Z" fill="#FAE6E5" />
                            <path d="M79.4111 75.9522C80.0558 74.1736 79.1354 72.2095 77.3554 71.5652C75.5754 70.921 73.6098 71.8407 72.9651 73.6193C72.3204 75.398 73.2407 77.3621 75.0207 78.0063C76.8007 78.6505 78.7664 77.7309 79.4111 75.9522Z" fill="#D43228" />
                            <path d="M94.1877 121.784C96.5528 120.372 97.3226 117.3 95.9063 114.923C94.4896 112.546 91.424 111.764 89.059 113.175C86.6935 114.588 85.9241 117.659 87.3404 120.036C88.7571 122.413 91.8222 123.196 94.1877 121.784ZM89.9821 114.725C91.496 113.821 93.458 114.322 94.3643 115.843C95.2705 117.364 94.7785 119.33 93.2646 120.234C91.7507 121.137 89.7887 120.636 88.8824 119.115C87.9762 117.594 88.4683 115.628 89.9821 114.725Z" fill="#FAE6E5" />
                            <path d="M194.903 122.859C196.64 122.121 197.447 120.107 196.705 118.362C195.963 116.616 193.952 115.8 192.214 116.538C190.476 117.277 189.669 119.29 190.412 121.035C191.154 122.781 193.165 123.597 194.903 122.859Z" fill="#D43228" />
                            <path d="M107.76 47.203L111.326 42.3963L115.63 45.584L117.053 43.6649L112.748 40.4773L116.314 35.6705L114.596 34.3984L111.031 39.2051L106.727 36.0182L105.303 37.9365L109.608 41.1242L106.042 45.9309L107.76 47.203Z" fill="#484848" />
                            <path d="M204.288 89.6015L207.854 84.7947L212.158 87.9824L213.581 86.0634L209.277 82.8757L212.842 78.069L211.124 76.7969L207.559 81.6036L203.255 78.4166L201.832 80.335L206.136 83.5226L202.57 88.3293L204.288 89.6015Z" fill="#484848" />
                        </svg>

                    </div>
                    <div class="modal-content-delet text-center">
                        <p>“Swimming pools in Los Angeles” will also be permanently deleted for everyone you’ve shared it with.</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="share" data-bs-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal-01 filter-modal share-the-link language-and-currency">
    <div class="modal fade" id="staticBackdrop12" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Language & Currency</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="language-and-currency-tabs">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Language</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Currency</button>
                            </div>
                        </nav>
                        <div class="search-form">
                            <form>
                                <input type="search" placeholder="Search" required>
                                <button>Search</button>
                            </form>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="main-heading">
                                    <h3>Choose a Language and Region</h3>
                                </div>
                                <div class="many-langauge-radios">
                                    <form action="">
                                        <div class="radio-box">
                                            <input type="radio" id="english" value="english" name="fav_language">
                                            <label for="english">English <span>United States</span> </label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="ceština" value="ceština" name="fav_language">
                                            <label for="ceština">Čeština <span>Česká republika</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="deutsch" value="deutsch" name="fav_language">
                                            <label for="deutsch">Deutsch <span>Schweiz</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="guyana" value="guyana" name="fav_language">
                                            <label for="guyana">English <span>Guyana</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="united-arab-emirates" value="united-arab-emirates" name="fav_language">
                                            <label for="united-arab-emirates">English <span>United Arab Emirates</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="azərbaycan" value="azərbaycan" name="fav_language">
                                            <label for="azərbaycan">Azərbaycan <span>dili Azərbaycan</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="crnogorski" value="crnogorski" name="fav_language">
                                            <label for="crnogorski">Crnogorski <span>Crna Gora</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="luxemburg" value="luxemburg" name="fav_language">
                                            <label for="luxemburg">Deutsch <span>Luxemburg</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="india" value="india" name="fav_language">
                                            <label for="india">English <span>India</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="united-kingdom" value="united-kingdom" name="fav_language">
                                            <label for="united-kingdom">English <span>United Kingdom</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="bahasa" value="bahasa" name="fav_language">
                                            <label for="bahasa">Bahasa <span>Indonesia Indonesia</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="dansk" value="dansk" name="fav_language">
                                            <label for="dansk">Dansk <span>Danmark</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="eesti" value="eesti" name="fav_language">
                                            <label for="eesti">Eesti <span>Eesti</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="ireland" value="ireland" name="fav_language">
                                            <label for="ireland">English <span>Ireland</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="español" value="español" name="fav_language">
                                            <label for="español">Español <span>Argentina</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="bosanski" value="bosanski" name="fav_language">
                                            <label for="bosanski">Bosanski <span>New Zealand</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="deutschland" value="deutschland" name="fav_language">
                                            <label for="deutschland">Deutsch <span>Deutschland</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="australia" value="australia" name="fav_language">
                                            <label for="australia">English <span>Australia</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="español" value="español" name="fav_language">
                                            <label for="español">Español <span>Belice</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="new-zealand" value="new-zealand" name="fav_language">
                                            <label for="new-zealand">English <span>New Zealand</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="català" value="català" name="fav_language">
                                            <label for="català">Català <span>Espanya</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="deutsch_osterreich" vlaue="deutsch Österreich" name="fav_language">
                                            <label for="deutsch">Deutsch <span>Österreich</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="canada" value="canada" name="fav_language">
                                            <label for="canada">English <span>Canada</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="singapore" value="singapore" name="fav_language">
                                            <label for="singapore">English <span>Singapore</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="español" value="español" name="fav_language">
                                            <label for="español">Español <span>Bolivia</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="chile" value="chile" name="fav_language">
                                            <label for="chile">Español <span>Chile</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="costa-rica" value="costa-rica" name="fav_language">
                                            <label for="costa-rica">Español <span>Costa Rica</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="ecuador" value="ecuador" name="fav_language">
                                            <label for="ecuador">Español <span>Ecuador</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="españa" value="españa" name="fav_language">
                                            <label for="españa">Español <span>España</span></label>
                                        </div>
                                        <div class="radio-box">
                                            <input type="radio" id="estados-unidos" value="estados-unidos" name="fav_language">
                                            <label for="estados-unidos">Español <span>Estados Unidos</span></label>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal-01 filter-modal share-the-link delete-account-modal add-card-details-modal">
    <div class="modal fade" id="staticBackdrop13" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Card Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-card-details-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Add-Card-Details-img.png" alt="">
                        <form>
                            <label for="select-card" id="select-drop-down-icon">Select Card</label>
                            <select name="select-card" id="select-card">
                                <option value="Credit-01">Credit or debit card</option>
                                <option value="Credit-02">Credit or debit card</option>
                                <option value="Credit-03">Credit or debit card</option>
                                <option value="Credit-04">Credit or debit card</option>
                            </select>

                            <label id="card-number">Card Number</label>
                            <input type="number">

                            <div class="two-inputs-inline">
                                <div class="input-box">
                                    <label>Expiration</label>
                                    <input type="text">
                                </div>
                                <div class="input-box">
                                    <label>Cvv</label>
                                    <i id="icon1" class="fa fa-eye-slash" aria-hidden="true" style="right: 14px;"></i>
                                    <input id="password1" type="text" placeholder="Password" required="">
                                </div>
                            </div>

                            <label>Zip Code</label>
                            <input type="number">

                            <label>Country/region</label>
                            <input type="text">

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary share" data-bs-toggle="modal">Done</button>
                        <!-- <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop9">Delete Account</button> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal-01 filter-modal share-the-link delete-account-modal add-card-details-modal reservation-modal-01">
    <div class="modal fade" id="staticBackdrop14" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Guests</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content">
                        <p>This place has a maximum of 5 guests, not including infants. If you're bringing more than 2 pets, please let your host know.</p>
                        <p>The host indicated their place has features that aren't suitable for infants. If you're still interested, send the host a reservation request to get more details.</p>
                    </div>
                    <div class="where-dest add-number-fields">
                        <div class="down-content">
                            <div class="two-main-content">
                                <div class="content">
                                    <h6>Adults</h6>
                                    <p>Ages 13 or above</p>
                                </div>
                                <div class="number">
                                    <span class="minus" onclick="updateAdults(event, -1, <?php echo $adultsMax; ?>)">-</span>
                                    <input type="text" name="adults" value="0" />
                                    <span class="plus" onclick="updateAdults(event, 1, <?php echo $adultsMax; ?>)">+</span>
                                </div>
                            </div>
                            <div class="two-main-content">
                                <div class="content">
                                    <h6>Children</h6>
                                    <p>Ages 13 or above</p>
                                </div>
                                <div class="number">
                                    <span class="minus" onclick="updateAdults(event, -1, <?php echo $childrenMax; ?>)">-</span>
                                    <input type="text" name="childrens" value="0" />
                                    <span class="plus" onclick="updateAdults(event, 1, <?php echo $childrenMax; ?>)">+</span>
                                </div>
                            </div>
                            <div class="two-main-content">
                                <div class="content">
                                    <h6>Infants</h6>
                                    <p>Ages 13 or above</p>
                                </div>
                                <div class="number">
                                    <span class="minus" onclick="updateAdults(event, -1, <?php echo $infantsMax; ?>)">-</span>
                                    <input type="text" name="infants" value="0" />
                                    <span class="plus" onclick="updateAdults(event, 1, <?php echo $infantsMax; ?>)">+</span>
                                </div>
                            </div>
                            <div class="two-main-content">
                                <div class="content">
                                    <h6>Pets</h6>
                                    <p> <a href="#">Bringing a service animal?</a> </p>
                                </div>
                                <div class="number">
                                    <span class="minus" onclick="updateAdults(event, -1, <?php echo $petsMax; ?>)">-</span>
                                    <input type="text" name="pets" value="0" />
                                    <span class="plus" onclick="updateAdults(event, 1, <?php echo $petsMax; ?>)">+</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary share" id="guestmodal" data-bs-toggle="modal" onclick="updateSummary()">Save</button>
                        <!-- <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop9">Delete Account</button> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php 
$property_id = isset($_GET['property_id']) ? sanitize_text_field($_GET['property_id']) : null; 
$charge_type = get_field('charge_type', $property_id);
?>

<div class="modal-01 filter-modal share-the-link delete-account-modal add-card-details-modal reservation-modal-01 reservation-modal-02">
    <div class="modal fade" id="staticBackdrop15" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Select Dates</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <div class="content text-center">
                        <p>Add your travel dates for exact pricing</p>
                    </div>
                    <?php if($charge_type==='nightly'): ?>
                    <div class="my-3 d-flex border rounded-4 p-3 gap-2 easepick-dp">
                           <i class="calendar icon opacity-50"></i><input class="w-100 border-0 rtb-dp" id="booking-datepicker" placeholder="Check In/Check Out"/>
                    </div>
                    <?php else: ?>
                    <div class="my-3 d-flex border rounded-4 p-3 gap-2 easepick-dp">
                           <i class="calendar icon opacity-50"></i><input class="w-100 border-0" id="hourly-datepicker" placeholder="Select Date"/>
                    </div>
                    <div class="timepicker-container mt-2 mb-5">
                        <label for="start-time">Start Time:</label>
                        <select class="border rounded-4 p-3" id="start-time">
                        <!-- Options will be populated by JavaScript -->
                        </select>
                        
                        <label for="end-time" class="ms-4">End Time:</label>
                        <select class="border rounded-4 p-3" id="end-time">
                        <!-- Options will be populated by JavaScript -->
                        </select>
                    </div>
                    <?php endif; ?>
                    <!--<div class="two-inputs">-->
                    <!--    <div class="ui calendar rangestart"  id="rangestart" >-->
                    <!--        <label>Check In <input type="text" name="start_date" placeholder="Add dates" required></label>-->
                    <!--    </div>-->
                    <!--    <div class="ui calendar rangeend" id="rangeend" >-->
                    <!--        <label>Check Out <input type="text" name="end_date" placeholder="Add dates" required></label>-->
                    <!--    </div>-->
                    <!--</div>-->
                   <div class="modal-footer">
    <button type="button" class="btn btn-secondary share" id="saveButton" data-bs-dismiss="modal">Save</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-01 filter-modal share-the-link delete-account-modal add-card-details-modal reservation-modal-01 reservation-modal-02 reservation-modal-03">
    <div class="modal fade" id="staticBackdrop16" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Select Time</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="content text-center">
                        <p>Add your travel time for exact pricing</p>
                    </div>
                    <div class="input-box two-aline-boxes">
                        <div class="ui calendar" id="start_with">
                            <p>Start With</p>
                            <div class="ui input left icon">
                                <i class="time icon"></i>
                                <input type="text" placeholder="09:00">
                            </div>
                        </div>
                        <div class="button-boxes">
                            <div class="button">
                                <input type="radio" id="a25" name="check-substitution-2ff" checked />
                                <label class="btn btn-default" for="a25">AM</label>
                            </div>
                            <div class="button">
                                <input type="radio" id="a50" name="check-substitution-2ff" />
                                <label class="btn btn-default" for="a50">PM</label>
                            </div>
                        </div>
                    </div>

                    <div class="input-box two-aline-boxes">
                        <div class="ui calendar" id="end_with">
                            <p>End With</p>
                            <div class="ui input left icon">
                                <i class="time icon"></i>
                                <input type="text" placeholder="16:00" required>
                            </div>
                        </div>
                        <div class="button-boxes">
                            <div class="button">
                                <input type="radio" id="a25" name="check-substitution-2" />
                                <label class="btn btn-default" for="a25">AM</label>
                            </div>
                            <div class="button">
                                <input type="radio" id="a50" name="check-substitution-2" checked />
                                <label class="btn btn-default" for="a50">PM</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary share" data-bs-toggle="modal">Save</button>
                        <!-- <button type="button" class="share" data-bs-toggle="modal" data-bs-target="#staticBackdrop9">Delete Account</button> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-01 filter-modal share-the-link delete-account-modal add-card-details-modal reservation-modal-01 reservation-modal-02 reservation-modal-03 thank-you-modal">
    <div class="modal fade" id="staticBackdrop17" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Thank You!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="svg-box">
                        <svg width="284" height="192" viewBox="0 0 284 192" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.6" d="M140.105 163.201C181.817 163.201 215.631 160.036 215.631 156.132C215.631 152.227 181.817 149.062 140.105 149.062C98.3931 149.062 64.5791 152.227 64.5791 156.132C64.5791 160.036 98.3931 163.201 140.105 163.201Z" fill="#DBF9D8" />
                            <g clip-path="url(#clip0_1042_27092)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M140.405 123.602C156.486 123.602 169.523 110.529 169.523 94.4023C169.523 78.2756 156.486 65.2023 140.405 65.2023C124.323 65.2023 111.287 78.2756 111.287 94.4023C111.287 110.529 124.323 123.602 140.405 123.602ZM140.405 126.402C158.028 126.402 172.315 112.075 172.315 94.4023C172.315 76.7292 158.028 62.4023 140.405 62.4023C122.781 62.4023 108.495 76.7292 108.495 94.4023C108.495 112.075 122.781 126.402 140.405 126.402Z" fill="#484848" />
                                <path d="M152.298 100.08C151.619 99.8357 150.874 100.198 150.634 100.89C149.045 105.469 144.774 108.546 140.006 108.546C135.237 108.546 130.966 105.469 129.377 100.89C129.137 100.198 128.392 99.8357 127.713 100.08C127.034 100.325 126.678 101.084 126.918 101.776C128.874 107.415 134.134 111.204 140.006 111.204C145.878 111.204 151.137 107.415 153.094 101.776C153.334 101.084 152.978 100.325 152.298 100.08Z" fill="#484848" />
                                <path d="M122.854 87.2031C122.854 87.2031 124.848 89.6031 128.039 89.6031C131.23 89.6031 133.624 87.2031 133.624 87.2031" stroke="#484848" stroke-width="2.5" stroke-linecap="round" />
                                <path d="M146.787 87.2031C146.787 87.2031 148.781 89.6031 151.972 89.6031C155.163 89.6031 157.556 87.2031 157.556 87.2031" stroke="#484848" stroke-width="2.5" stroke-linecap="round" />
                            </g>
                            <path d="M68.2992 121.333C69.8339 125.566 74.5117 127.754 78.7484 126.221C82.9843 124.687 85.1742 120.013 83.6395 115.779C82.1047 111.547 77.4269 109.359 73.1903 110.892C68.9543 112.426 66.7645 117.1 68.2992 121.333ZM80.8779 116.779C81.8599 119.488 80.4585 122.48 77.7474 123.461C75.0364 124.442 72.042 123.042 71.06 120.333C70.078 117.624 71.4795 114.632 74.1905 113.651C76.9015 112.67 79.8952 114.07 80.8779 116.779Z" fill="#DBF9D8" />
                            <path d="M185.569 53.3332C187.103 57.5659 191.781 59.7541 196.018 58.2206C200.254 56.687 202.444 52.0128 200.909 47.7794C199.374 43.5467 194.696 41.3585 190.46 42.8921C186.224 44.4256 184.034 49.0999 185.569 53.3332ZM198.147 48.7789C199.129 51.4878 197.728 54.4799 195.017 55.4611C192.306 56.4424 189.312 55.042 188.33 52.3331C187.348 49.6241 188.749 46.632 191.46 45.6508C194.171 44.6695 197.165 46.0699 198.147 48.7789Z" fill="#DBF9D8" />
                            <path d="M91.3775 63.9561C92.0222 62.1775 91.1019 60.2134 89.3218 59.5692C87.5418 58.9249 85.5762 59.8446 84.9315 61.6232C84.2868 63.4019 85.2071 65.366 86.9872 66.0102C88.7672 66.6544 90.7328 65.7348 91.3775 63.9561Z" fill="#4CAF50" />
                            <path d="M214.648 134.588C217.013 133.177 217.783 130.105 216.367 127.728C214.95 125.351 211.885 124.568 209.52 125.98C207.154 127.392 206.385 130.464 207.801 132.84C209.218 135.218 212.283 136.001 214.648 134.588ZM210.443 127.529C211.957 126.626 213.919 127.126 214.825 128.648C215.731 130.169 215.239 132.135 213.725 133.038C212.211 133.942 210.249 133.441 209.343 131.92C208.437 130.398 208.929 128.433 210.443 127.529Z" fill="#DBF9D8" />
                            <path d="M116.525 36.9869C118.89 35.5752 119.66 32.5033 118.243 30.1265C116.827 27.7493 113.761 26.9667 111.396 28.3785C109.03 29.7907 108.261 32.8621 109.677 35.2389C111.094 37.6162 114.159 38.3992 116.525 36.9869ZM112.319 29.9277C113.833 29.0243 115.795 29.5248 116.701 31.0462C117.608 32.5676 117.115 34.5333 115.602 35.4367C114.088 36.3401 112.126 35.8396 111.219 34.3182C110.313 32.7968 110.805 30.8311 112.319 29.9277Z" fill="#DBF9D8" />
                            <path d="M188.521 102.062C190.259 101.324 191.066 99.3103 190.323 97.5649C189.581 95.8195 187.57 95.0031 185.832 95.7414C184.094 96.4796 183.287 98.493 184.03 100.238C184.772 101.984 186.783 102.8 188.521 102.062Z" fill="#4CAF50" />
                            <defs>
                                <clipPath id="clip0_1042_27092">
                                    <rect width="63.8202" height="64" fill="white" transform="translate(108.495 62.4023)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="message text-center fs-4">
                    </div>
                    <div class="content text-center">
                        <p>Booking request will be processed within 24<br> hours.</p>
                    </div>

                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary share" data-bs-toggle="modal">Save</button> -->
                        <button type="button" class="btn btn-secondary share" data-bs-toggle="modal" data-bs-target="#staticBackdrop18">Ok</button>
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
$property_id = isset($_GET['property_id']) ? intval($_GET['property_id']) : 0;
$booking_id = isset($_GET['booking_id']) ? esc_html($_GET['booking_id']) : esc_html(0);
//$propertytitle = get_the_title($property_id);
$host_name = get_field('host_name', $property_id);
$contact_number = get_field('contact_number', $property_id);
$email = get_field('email', $property_id);

?>

<div class="modal-01 filter-modal share-the-link delete-account-modal add-card-details-modal reservation-modal-01 reservation-modal-02 thank-you-modal thank-you-modal-02">
    <div class="modal fade" id="staticBackdrop18" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Thank You!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="svg-box">
                        <svg width="284" height="192" viewBox="0 0 284 192" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.6" d="M140.105 163.201C181.817 163.201 215.631 160.036 215.631 156.132C215.631 152.227 181.817 149.062 140.105 149.062C98.3931 149.062 64.5791 152.227 64.5791 156.132C64.5791 160.036 98.3931 163.201 140.105 163.201Z" fill="#DBF9D8" />
                            <g clip-path="url(#clip0_1042_27092)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M140.405 123.602C156.486 123.602 169.523 110.529 169.523 94.4023C169.523 78.2756 156.486 65.2023 140.405 65.2023C124.323 65.2023 111.287 78.2756 111.287 94.4023C111.287 110.529 124.323 123.602 140.405 123.602ZM140.405 126.402C158.028 126.402 172.315 112.075 172.315 94.4023C172.315 76.7292 158.028 62.4023 140.405 62.4023C122.781 62.4023 108.495 76.7292 108.495 94.4023C108.495 112.075 122.781 126.402 140.405 126.402Z" fill="#484848" />
                                <path d="M152.298 100.08C151.619 99.8357 150.874 100.198 150.634 100.89C149.045 105.469 144.774 108.546 140.006 108.546C135.237 108.546 130.966 105.469 129.377 100.89C129.137 100.198 128.392 99.8357 127.713 100.08C127.034 100.325 126.678 101.084 126.918 101.776C128.874 107.415 134.134 111.204 140.006 111.204C145.878 111.204 151.137 107.415 153.094 101.776C153.334 101.084 152.978 100.325 152.298 100.08Z" fill="#484848" />
                                <path d="M122.854 87.2031C122.854 87.2031 124.848 89.6031 128.039 89.6031C131.23 89.6031 133.624 87.2031 133.624 87.2031" stroke="#484848" stroke-width="2.5" stroke-linecap="round" />
                                <path d="M146.787 87.2031C146.787 87.2031 148.781 89.6031 151.972 89.6031C155.163 89.6031 157.556 87.2031 157.556 87.2031" stroke="#484848" stroke-width="2.5" stroke-linecap="round" />
                            </g>
                            <path d="M68.2992 121.333C69.8339 125.566 74.5117 127.754 78.7484 126.221C82.9843 124.687 85.1742 120.013 83.6395 115.779C82.1047 111.547 77.4269 109.359 73.1903 110.892C68.9543 112.426 66.7645 117.1 68.2992 121.333ZM80.8779 116.779C81.8599 119.488 80.4585 122.48 77.7474 123.461C75.0364 124.442 72.042 123.042 71.06 120.333C70.078 117.624 71.4795 114.632 74.1905 113.651C76.9015 112.67 79.8952 114.07 80.8779 116.779Z" fill="#DBF9D8" />
                            <path d="M185.569 53.3332C187.103 57.5659 191.781 59.7541 196.018 58.2206C200.254 56.687 202.444 52.0128 200.909 47.7794C199.374 43.5467 194.696 41.3585 190.46 42.8921C186.224 44.4256 184.034 49.0999 185.569 53.3332ZM198.147 48.7789C199.129 51.4878 197.728 54.4799 195.017 55.4611C192.306 56.4424 189.312 55.042 188.33 52.3331C187.348 49.6241 188.749 46.632 191.46 45.6508C194.171 44.6695 197.165 46.0699 198.147 48.7789Z" fill="#DBF9D8" />
                            <path d="M91.3775 63.9561C92.0222 62.1775 91.1019 60.2134 89.3218 59.5692C87.5418 58.9249 85.5762 59.8446 84.9315 61.6232C84.2868 63.4019 85.2071 65.366 86.9872 66.0102C88.7672 66.6544 90.7328 65.7348 91.3775 63.9561Z" fill="#4CAF50" />
                            <path d="M214.648 134.588C217.013 133.177 217.783 130.105 216.367 127.728C214.95 125.351 211.885 124.568 209.52 125.98C207.154 127.392 206.385 130.464 207.801 132.84C209.218 135.218 212.283 136.001 214.648 134.588ZM210.443 127.529C211.957 126.626 213.919 127.126 214.825 128.648C215.731 130.169 215.239 132.135 213.725 133.038C212.211 133.942 210.249 133.441 209.343 131.92C208.437 130.398 208.929 128.433 210.443 127.529Z" fill="#DBF9D8" />
                            <path d="M116.525 36.9869C118.89 35.5752 119.66 32.5033 118.243 30.1265C116.827 27.7493 113.761 26.9667 111.396 28.3785C109.03 29.7907 108.261 32.8621 109.677 35.2389C111.094 37.6162 114.159 38.3992 116.525 36.9869ZM112.319 29.9277C113.833 29.0243 115.795 29.5248 116.701 31.0462C117.608 32.5676 117.115 34.5333 115.602 35.4367C114.088 36.3401 112.126 35.8396 111.219 34.3182C110.313 32.7968 110.805 30.8311 112.319 29.9277Z" fill="#DBF9D8" />
                            <path d="M188.521 102.062C190.259 101.324 191.066 99.3103 190.323 97.5649C189.581 95.8195 187.57 95.0031 185.832 95.7414C184.094 96.4796 183.287 98.493 184.03 100.238C184.772 101.984 186.783 102.8 188.521 102.062Z" fill="#4CAF50" />
                            <defs>
                                <clipPath id="clip0_1042_27092">
                                    <rect width="63.8202" height="64" fill="white" transform="translate(108.495 62.4023)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="modal-details-content">
                        <h6>Reservation ID: <?php echo $booking_id;  ?></h6>
                        <p class="view-receipt">View Receipt</p>
                        <div class="host-details">
                            <h5>Your host, <?php echo $host_name; ?></h5>
                            <p>Have a question about your reservation? The best way<br> to get information is to ask your host directly.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary share" data-bs-toggle="modal">Save</button> -->
                        <a class="anchor-btn-primary" href="mailto:<?php echo $email; ?>">Message Host</a>
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                    </div>
                    <div class="mesg-the-host">
                        <a href="tel:<?php echo $contact_number; ?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.4403 20.5C17.5557 20.5 15.6625 20.0618 13.7606 19.1855C11.8586 18.3092 10.1112 17.073 8.51828 15.4769C6.92532 13.8807 5.69071 12.1333 4.81442 10.2346C3.93814 8.33588 3.5 6.44423 3.5 4.55963C3.5 4.25688 3.6 4.00458 3.8 3.80275C4 3.60092 4.25 3.5 4.55 3.5L7.8115 3.5C8.06407 3.5 8.28682 3.58238 8.47977 3.74713C8.67272 3.91188 8.79548 4.1154 8.84803 4.3577L9.4211 7.29998C9.46085 7.57306 9.45252 7.80768 9.3961 8.00383C9.3397 8.19998 9.23842 8.36472 9.09225 8.49805L6.78265 10.7461C7.15445 11.4269 7.57913 12.0708 8.0567 12.6779C8.53427 13.2849 9.05125 13.8647 9.60765 14.4173C10.1564 14.966 10.7397 15.4756 11.3577 15.9462C11.9756 16.4167 12.6429 16.8545 13.3596 17.2596L15.6038 14.9962C15.7602 14.8333 15.9497 14.7192 16.1721 14.6539C16.3945 14.5885 16.6256 14.5724 16.8654 14.6058L19.6423 15.1712C19.8948 15.2378 20.1009 15.3667 20.2605 15.5577C20.4201 15.7487 20.5 15.9654 20.5 16.2077V19.45C20.5 19.75 20.399 20 20.1972 20.2C19.9954 20.4 19.7431 20.5 19.4403 20.5ZM6.07305 9.32693L7.85768 7.61923C7.88973 7.59358 7.91056 7.55832 7.92018 7.51345C7.92979 7.46857 7.92819 7.4269 7.91538 7.38845L7.48075 5.15383C7.46793 5.10254 7.4455 5.06408 7.41345 5.03845C7.3814 5.0128 7.33973 4.99998 7.28845 4.99998L5.14997 4.99998C5.11152 4.99998 5.07948 5.0128 5.05383 5.03845C5.02818 5.06408 5.01535 5.09613 5.01535 5.1346C5.06663 5.81793 5.17849 6.51217 5.35092 7.2173C5.52337 7.92243 5.76408 8.62564 6.07305 9.32693ZM14.773 17.9692C15.4359 18.2782 16.1272 18.5144 16.8471 18.6779C17.567 18.8413 18.2397 18.9384 18.8654 18.9692C18.9038 18.9692 18.9359 18.9564 18.9615 18.9308C18.9872 18.9051 19 18.873 19 18.8346V16.7308C19 16.6795 18.9872 16.6378 18.9615 16.6057C18.9359 16.5737 18.8974 16.5512 18.8461 16.5384L16.7461 16.1115C16.7077 16.0987 16.674 16.0971 16.6452 16.1067C16.6163 16.1163 16.5859 16.1372 16.5538 16.1692L14.773 17.9692Z" fill="#484848" />
                            </svg>
                            <?php echo $contact_number; ?></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-01 filter-modal share-the-link language-and-currency reservation-details-modal ">
    <div class="modal fade" id="staticBackdrop19" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Reservation Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="reservation-details-modal-content">
                        <ul>
                            <li> <b>Booking:</b> #470063</li>
                            <li> <b>Name Reservation:</b> Cottage with Pool</li>
                            <li> <b>Status:</b>
                                <p><span><svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.05318 11.3372L11.5352 6.85514L10.8327 6.15259L7.05318 9.93207L5.15318 8.03207L4.45063 8.73462L7.05318 11.3372ZM8.00045 14.8346C7.12449 14.8346 6.30114 14.6684 5.53038 14.3359C4.75962 14.0035 4.08916 13.5523 3.51902 12.9824C2.94886 12.4125 2.49749 11.7424 2.1649 10.972C1.83231 10.2015 1.66602 9.37836 1.66602 8.5024C1.66602 7.62645 1.83224 6.80309 2.16468 6.03234C2.49713 5.26157 2.94829 4.59111 3.51818 4.02097C4.08808 3.45081 4.75824 2.99944 5.52867 2.66685C6.29908 2.33426 7.12226 2.16797 7.99822 2.16797C8.87417 2.16797 9.69753 2.33419 10.4683 2.66664C11.2391 2.99908 11.9095 3.45025 12.4796 4.02014C13.0498 4.59004 13.5012 5.2602 13.8338 6.03062C14.1664 6.80103 14.3327 7.62421 14.3327 8.50017C14.3327 9.37613 14.1664 10.1995 13.834 10.9702C13.5015 11.741 13.0504 12.4115 12.4805 12.9816C11.9106 13.5518 11.2404 14.0031 10.47 14.3357C9.69959 14.6683 8.8764 14.8346 8.00045 14.8346ZM7.99933 13.8346C9.48822 13.8346 10.7493 13.318 11.7827 12.2846C12.816 11.2513 13.3327 9.99018 13.3327 8.50129C13.3327 7.0124 12.816 5.75129 11.7827 4.71795C10.7493 3.68462 9.48822 3.16795 7.99933 3.16795C6.51044 3.16795 5.24933 3.68462 4.216 4.71795C3.18267 5.75129 2.666 7.0124 2.666 8.50129C2.666 9.99018 3.18267 11.2513 4.216 12.2846C5.24933 13.318 6.51044 13.8346 7.99933 13.8346Z" fill="#4CAF50"></path>
                                        </svg>
                                    </span>Confirmed</p>
                            </li>
                            <li> <b>Location:</b> Los Angeles, California</li>
                            <li> <b>Date:</b> Friday, August 10, 2023</li>
                            <li> <b>Time:</b> 12:00PM - 2:00PM</li>
                            <li> <b>Who’s Coming:</b> 4 Guests (2 Adult, 2 Pets)</li>
                            <li> <b>Address:</b> 1234 Saimptopia ér, Los Angeles, California</li>
                        </ul>
                        <div class="map-box">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Reservation-Details-map-img.png" alt="">
                        </div>
                        <div class="img-box">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hosted-person.png" alt="">
                            <div class="content">
                                <h6>Hosted by Yuri R.</h6>
                                <p>Superhost · 7 years hosting</p>
                            </div>
                        </div>
                        <div class="read-more">
                            <p>Hi! We are Jeremy from Belgium and Erle from Norway! We met in Thailand and later in Australia by chance, where we decided to travel and live in a self-converted campervan together. Now we live close to Oslo<span id="dots">...</span><span id="more">and have started up our tiny house/glamping brand "WonderInn" which you can soon find all over Norway! If there is one thing we might enjoy more than traveling it is hosting - people coming with different backgrounds and stories to our little corner of the world, and we do anything to make everyone feel at home! If you have any inquiries don't hesitate to contact us </span></p>
                            <button onclick="myFunction()" id="myBtn">Read More</button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary share" data-bs-toggle="modal">Ok</button>
                            <!-- <button type="button" class="btn btn-secondary share" data-bs-toggle="modal" data-bs-target="#staticBackdrop18">Message Host</button> -->
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-01 filter-modal share-the-link language-and-currency reservation-details-modal rate-and-review-modal">
    <div class="modal fade" id="staticBackdrop20" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Rate & Review</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rate-and-review-main">
                        <div class="two-img-boxes">
                            <div class="host-img-box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/contact-owner-img.png" alt="">
                                <h6>Hosted by Yuri R. </h6>
                            </div>
                            <div class="img-box">
                                <div class="content-box">
                                    <h5>Cottage with Pool</h5>
                                    <p>Hosted by stefanie J.Oakland, California</p>
                                </div>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/be-a-host-img-03.png" alt="">
                            </div>
                        </div>
                        <div class="two-content-box">
                            <h4>How was your stay at Cottage with Pool?</h4>
                            <p>Your host won't be able to read your review for 14 days<br> or until they write one too.</p>
                        </div>
                        <div class="review-box-star">
                            <p>You've given your host an overall rating. Let them know how they did in these areas too so they have a better idea of what went well and how they can improve.</p>
                            <form>
                                <h5>Cleanliness</h5>
                                <div class="stars" data-star-container="star-container-1">
                                    <input type="radio" name="cleanliness" class="star-1" id="cleanliness-1" />
                                    <label class="star-1" for="cleanliness-1">1</label>
                                    <input type="radio" name="cleanliness" class="star-2" id="cleanliness-2" />
                                    <label class="star-2" for="cleanliness-2">2</label>
                                    <input type="radio" name="cleanliness" class="star-3" id="cleanliness-3" checked />
                                    <label class="star-3" for="cleanliness-3">3</label>
                                    <input type="radio" name="cleanliness" class="star-4" id="cleanliness-4" />
                                    <label class="star-4" for="cleanliness-4">4</label>
                                    <input type="radio" name="cleanliness" class="star-5" id="cleanliness-5" />
                                    <label class="star-5" for="cleanliness-5">5</label>
                                    <span></span>
                                </div>

                                <h5>Accuracy</h5>
                                <div class="stars" data-star-container="star-container-2">
                                    <input type="radio" name="accuracy" class="star-1" id="accuracy-1" />
                                    <label class="star-1" for="accuracy-1">1</label>
                                    <input type="radio" name="accuracy" class="star-2" id="accuracy-2" />
                                    <label class="star-2" for="accuracy-2">2</label>
                                    <input type="radio" name="accuracy" class="star-3" id="accuracy-3" />
                                    <label class="star-3" for="accuracy-3">3</label>
                                    <input type="radio" name="accuracy" class="star-4" id="accuracy-4" checked />
                                    <label class="star-4" for="accuracy-4">4</label>
                                    <input type="radio" name="accuracy" class="star-5" id="accuracy-5" />
                                    <label class="star-5" for="accuracy-5">5</label>
                                    <span></span>
                                </div>

                                <h5>Check-in</h5>
                                <div class="stars" data-star-container="star-container-3">
                                    <input type="radio" name="checkin" class="star-1" id="checkin-1" />
                                    <label class="star-1" for="checkin-1">1</label>
                                    <input type="radio" name="checkin" class="star-2" id="checkin-2" />
                                    <label class="star-2" for="checkin-2">2</label>
                                    <input type="radio" name="checkin" class="star-3" id="checkin-3" />
                                    <label class="star-3" for="checkin-3">3</label>
                                    <input type="radio" name="checkin" class="star-4" id="checkin-4" checked />
                                    <label class="star-4" for="checkin-4">4</label>
                                    <input type="radio" name="checkin" class="star-5" id="checkin-5" />
                                    <label class="star-5" for="checkin-5">5</label>
                                    <span></span>
                                </div>

                                <h5>Communication</h5>
                                <div class="stars" data-star-container="star-container-4">
                                    <input type="radio" name="communication" class="star-1" id="communication-1" />
                                    <label class="star-1" for="communication-1">1</label>
                                    <input type="radio" name="communication" class="star-2" id="communication-2" />
                                    <label class="star-2" for="communication-2">2</label>
                                    <input type="radio" name="communication" class="star-3" id="communication-3" />
                                    <label class="star-3" for="communication-3">3</label>
                                    <input type="radio" name="communication" class="star-4" id="communication-4" checked />
                                    <label class="star-4" for="communication-4">4</label>
                                    <input type="radio" name="communication" class="star-5" id="communication-5" />
                                    <label class="star-5" for="communication-5">5</label>
                                    <span></span>
                                </div>

                                <h5>Location</h5>
                                <div class="stars" data-star-container="star-container-5">
                                    <input type="radio" name="location" class="star-1" id="location-1" />
                                    <label class="star-1" for="location-1">1</label>
                                    <input type="radio" name="location" class="star-2" id="location-2" />
                                    <label class="star-2" for="location-2">2</label>
                                    <input type="radio" name="location" class="star-3" id="location-3" checked />
                                    <label class="star-3" for="location-3">3</label>
                                    <input type="radio" name="location" class="star-4" id="location-4" />
                                    <label class="star-4" for="location-4">4</label>
                                    <input type="radio" name="location" class="star-5" id="location-5" />
                                    <label class="star-5" for="location-5">5</label>
                                    <span></span>
                                </div>

                                <h5>Value</h5>
                                <div class="stars" data-star-container="star-container-6">
                                    <input type="radio" name="value" class="star-1" id="value-1" />
                                    <label class="star-1" for="value-1">1</label>
                                    <input type="radio" name="value" class="star-2" id="value-2" />
                                    <label class="star-2" for="value-2">2</label>
                                    <input type="radio" name="value" class="star-3" id="value-3" checked />
                                    <label class="star-3" for="value-3">3</label>
                                    <input type="radio" name="value" class="star-4" id="value-4" />
                                    <label class="star-4" for="value-4">4</label>
                                    <input type="radio" name="value" class="star-5" id="value-5" />
                                    <label class="star-5" for="value-5">5</label>
                                    <span></span>
                                </div>

                        </div>
                        <div class="two-content-and-text-area-box">
                            <h5>Write a private note for Yuri R.</h5>
                            <p>Say thanks or offer a few suggestions. This is just for Yuri R.-other<br> guests won't be able to read it.</p>
                            <textarea placeholder="Add a private note" required></textarea>
                            <h5>Write a public review for Yuri R.</h5>
                            <p>Give other travelers a heads-up about what they can expect. After<br> the review period ends, we'll publish this on your host's listing.</p>
                            <textarea placeholder="Write a public review" required></textarea>

                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary share" data-bs-toggle="modal">Ok</button> -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-secondary share" data-bs-toggle="modal" data-bs-target="#staticBackdrop21">Submit Review</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal-01 filter-modal share-the-link language-and-currency reservation-details-modal rate-and-review-modal rate-and-review-modal-02">
    <div class="modal fade" id="staticBackdrop21" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Rate & Review</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rate-and-review-main">
                        <div class="two-img-boxes">
                            <div class="host-img-box">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/menu-person-img.png" alt="">
                                <div class="conte">
                                    <h6>Guest by Helena Bonham Carter </h6>
                                    <p>Bucharest, Romania</p>
                                </div>
                            </div>
                        </div>
                        <div class="review-box-star">
                            <form>
                                <h5>Cleanliness</h5>
                                <p>Did Lee leave your space clean?</p>
                                <div class="stars" data-star-container="star-container-1">
                                    <input type="radio" name="cleanliness" class="star-1" id="cleanliness-1-host" />
                                    <label class="star-1" for="cleanliness-1-host">1</label>
                                    <input type="radio" name="cleanliness" class="star-2" id="cleanliness-2-host" />
                                    <label class="star-2" for="cleanliness-2-host">2</label>
                                    <input type="radio" name="cleanliness" class="star-3" id="cleanliness-3-host" />
                                    <label class="star-3" for="cleanliness-3-host">3</label>
                                    <input type="radio" name="cleanliness" class="star-4" id="cleanliness-4-host" checked />
                                    <label class="star-4" for="cleanliness-4-host">4</label>
                                    <input type="radio" name="cleanliness" class="star-5" id="cleanliness-5-host" />
                                    <label class="star-5" for="cleanliness-5-host">5</label>
                                    <span></span>
                                </div>

                                <h5>Communication</h5>
                                <p>How clearly did Lee communicate their plans, questions and<br> concerns?</p>
                                <div class="stars" data-star-container="star-container-4">
                                    <input type="radio" name="communication" class="star-1" id="communication-1-host" />
                                    <label class="star-1" for="communication-1-host">1</label>
                                    <input type="radio" name="communication" class="star-2" id="communication-2-host" />
                                    <label class="star-2" for="communication-2-host">2</label>
                                    <input type="radio" name="communication" class="star-3" id="communication-3-host" checked />
                                    <label class="star-3" for="communication-3-host">3</label>
                                    <input type="radio" name="communication" class="star-4" id="communication-4-host" />
                                    <label class="star-4" for="communication-4-host">4</label>
                                    <input type="radio" name="communication" class="star-5" id="communication-5-host" />
                                    <label class="star-5" for="communication-5-host">5</label>
                                    <span></span>
                                </div>

                                <h5>Observance of House Rules</h5>
                                <p>Did Lee observe your House Rules?</p>
                                <div class="stars" data-star-container="star-container-2">
                                    <input type="radio" name="observance-of-house-rules" class="star-1" id="observance-of-house-rules-1" />
                                    <label class="star-1" for="observance-of-house-rules-1">1</label>
                                    <input type="radio" name="observance-of-house-rules" class="star-2" id="observance-of-house-rules-2" />
                                    <label class="star-2" for="observance-of-house-rules-2">2</label>
                                    <input type="radio" name="observance-of-house-rules" class="star-3" id="observance-of-house-rules-3" />
                                    <label class="star-3" for="observance-of-house-rules-3">3</label>
                                    <input type="radio" name="observance-of-house-rules" class="star-4" id="observance-of-house-rules-4" checked />
                                    <label class="star-4" for="observance-of-house-rules-4">4</label>
                                    <input type="radio" name="observance-of-house-rules" class="star-5" id="observance-of-house-rules-5" />
                                    <label class="star-5" for="observance-of-house-rules-5">5</label>
                                    <span></span>
                                </div>

                        </div>
                        <div class="two-content-and-text-area-box">
                            <div class="text-area-field">
                                <h5>Leave a public review</h5>
                                <p>Write a fair, honest review about Helena's stay so future hosts<br> know what to expect.</p>
                                <textarea placeholder="Say a few words about Helena’s stay" required></textarea>
                            </div>
                            <div class="text-area-field">
                                <h5>Add a private note</h5>
                                <p>Offer suggestions or say thanks for being a great guest. We won't<br> publish your note on Helena’s profile.</p>
                                <textarea placeholder="Add a private note (optional)"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="yes-no">
                        <h5>Would you host Helena again?</h5>
                        <p>We won't publish your answer anywhere and Helena won't receive it.</p>
                        <div class="two-inpu-boxes">
                            <div class="input-boxs">

                                <input type="radio" name="yes-no" id="yes-001">
                                <label for="yes-001">Yes</label>

                            </div>
                            <div class="input-boxs">

                                <input type="radio" name="yes-no" id="no-001">
                                <label for="no-001">No</label>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary share" data-bs-toggle="modal">Ok</button> -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-secondary share" data-bs-toggle="modal" data-bs-target="#staticBackdrop22">Submit Review</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="modal-01 filter-modal share-the-link delete-account-modal youre-all-set-modal thank-you-for-reviewing">
    <div class="modal fade" id="staticBackdrop22" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Thank You for Reviewing!</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-img-center text-center">
                        <svg width="284" height="192" viewBox="0 0 284 192" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.6" d="M141.739 162.939C183.451 162.939 217.265 159.774 217.265 155.87C217.265 151.966 183.451 148.801 141.739 148.801C100.027 148.801 66.2134 151.966 66.2134 155.87C66.2134 159.774 100.027 162.939 141.739 162.939Z" fill="#E9FBE8" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M147.901 71.1707L142.726 63.752C142.567 63.5243 142.231 63.5244 142.072 63.752L136.896 71.1707C135.453 73.2389 132.874 74.1804 130.443 73.5261L121.723 71.1792C121.455 71.1072 121.198 71.3239 121.222 71.6006L122.013 80.6198C122.233 83.1343 120.861 85.5182 118.579 86.5841L110.395 90.4071C110.144 90.5244 110.085 90.8563 110.281 91.0527L116.668 97.4522C118.449 99.2363 118.925 101.947 117.861 104.234L114.042 112.439C113.924 112.69 114.093 112.982 114.368 113.006L123.363 113.792C125.871 114.011 127.973 115.78 128.624 118.219L130.957 126.965C131.029 127.233 131.345 127.349 131.571 127.189L138.965 121.993C141.026 120.544 143.771 120.544 145.833 121.993L153.226 127.189C153.453 127.349 153.769 127.233 153.84 126.965L156.174 118.219C156.824 115.78 158.927 114.011 161.435 113.792L170.429 113.006C170.705 112.982 170.873 112.69 170.756 112.439L166.937 104.234C165.872 101.947 166.349 99.2363 168.13 97.4522L174.516 91.0527C174.712 90.8563 174.654 90.5244 174.403 90.4071L166.219 86.5841C163.937 85.5182 162.564 83.1343 162.785 80.6198L163.575 71.6006C163.6 71.3239 163.342 71.1072 163.075 71.1792L154.355 73.5261C151.924 74.1804 149.344 73.239 147.901 71.1707ZM145.013 62.1469C143.743 60.326 141.054 60.326 139.784 62.1469L134.609 69.5656C133.839 70.6687 132.463 71.1708 131.167 70.8218L122.447 68.4749C120.307 67.8989 118.247 69.6321 118.441 71.8458L119.231 80.865C119.349 82.206 118.617 83.4775 117.4 84.0459L109.216 87.869C107.207 88.8073 106.74 91.4627 108.308 93.0334L114.695 99.4329C115.644 100.384 115.898 101.83 115.331 103.05L111.512 111.254C110.574 113.268 111.919 115.603 114.126 115.796L123.121 116.581C124.458 116.698 125.58 117.642 125.927 118.942L128.26 127.689C128.832 129.835 131.359 130.758 133.174 129.482L140.567 124.286C141.667 123.513 143.131 123.513 144.23 124.286L151.624 129.482C153.438 130.758 155.965 129.835 156.538 127.689L158.871 118.942C159.218 117.642 160.339 116.698 161.677 116.581L170.671 115.796C172.879 115.603 174.223 113.268 173.286 111.254L169.467 103.05C168.899 101.83 169.153 100.384 170.103 99.4329L176.49 93.0334C178.057 91.4627 177.59 88.8073 175.582 87.869L167.398 84.0459C166.181 83.4775 165.449 82.206 165.566 80.865L166.357 71.8458C166.551 69.6321 164.491 67.8989 162.351 68.4749L153.631 70.8218C152.334 71.1708 150.959 70.6687 150.189 69.5656L145.013 62.1469Z" fill="#484848" />
                            <path d="M138.84 107.998C138.183 107.998 137.559 107.725 137.1 107.247L129.152 98.9863C128.2 97.9963 128.2 96.3578 129.152 95.3678C130.105 94.3778 131.681 94.3778 132.633 95.3678L138.84 101.82L152.962 87.1409C153.914 86.1509 155.49 86.1509 156.443 87.1409C157.395 88.1309 157.395 89.7695 156.443 90.7593L140.581 107.247C140.121 107.725 139.497 107.998 138.84 107.998Z" fill="#4CAF50" />
                            <path d="M70.6922 124.532C72.227 128.765 76.9048 130.953 81.1414 129.42C85.3774 127.886 87.5673 123.212 86.0325 118.979C84.4978 114.746 79.82 112.558 75.5833 114.091C71.3474 115.625 69.1575 120.299 70.6922 124.532ZM83.271 119.978C84.253 122.687 82.8515 125.679 80.1405 126.66C77.4295 127.642 74.4351 126.241 73.4531 123.532C72.4711 120.823 73.8725 117.831 76.5836 116.85C79.2946 115.869 82.2883 117.269 83.271 119.978Z" fill="#DBF9D8" />
                            <path d="M187.962 56.5325C189.497 60.7651 194.174 62.9533 198.411 61.4198C202.647 59.8862 204.837 55.212 203.302 50.9786C201.767 46.7459 197.089 44.5577 192.853 46.0913C188.617 47.6248 186.427 52.2991 187.962 56.5325ZM200.541 51.9781C201.523 54.687 200.121 57.6791 197.41 58.6604C194.699 59.6416 191.705 58.2412 190.723 55.5323C189.741 52.8233 191.142 49.8312 193.853 48.85C196.564 47.8687 199.559 49.2691 200.541 51.9781Z" fill="#DBF9D8" />
                            <path d="M93.7706 67.1553C94.4153 65.3767 93.4949 63.4126 91.7149 62.7684C89.9349 62.1242 87.9693 63.0438 87.3246 64.8224C86.6799 66.6011 87.6002 68.5652 89.3802 69.2094C91.1602 69.8536 93.1259 68.934 93.7706 67.1553Z" fill="#4CAF50" />
                            <path d="M217.042 137.788C219.407 136.376 220.176 133.304 218.76 130.927C217.343 128.55 214.278 127.768 211.913 129.179C209.547 130.592 208.778 133.663 210.194 136.04C211.611 138.417 214.676 139.2 217.042 137.788ZM212.836 130.728C214.35 129.825 216.312 130.326 217.218 131.847C218.124 133.368 217.632 135.334 216.118 136.238C214.605 137.141 212.643 136.64 211.736 135.119C210.83 133.598 211.322 131.632 212.836 130.728Z" fill="#DBF9D8" />
                            <path d="M118.918 40.1861C121.283 38.7744 122.053 35.7025 120.636 33.3257C119.22 30.9485 116.154 30.166 113.789 31.5777C111.424 32.9899 110.654 36.0613 112.07 38.4381C113.487 40.8154 116.552 41.5984 118.918 40.1861ZM114.712 33.1269C116.226 32.2235 118.188 32.724 119.094 34.2454C120.001 35.7668 119.509 37.7326 117.995 38.6359C116.481 39.5393 114.519 39.0388 113.613 37.5174C112.706 35.996 113.198 34.0303 114.712 33.1269Z" fill="#DBF9D8" />
                            <path d="M190.914 112.46C192.652 111.722 193.459 109.709 192.716 107.963C191.974 106.218 189.963 105.402 188.225 106.14C186.487 106.878 185.68 108.891 186.423 110.637C187.165 112.382 189.176 113.199 190.914 112.46Z" fill="#4CAF50" />
                        </svg>


                    </div>
                    <div class="modal-content-delet text-center">
                        <p>Thank you for reviewing your guest. Your review will be visible on their profile page after they complete their part of the review or when the review period ends (14 days after checkout).</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                    </div>

                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
            </div>
        </div>
    </div>
</div>



<div class="modal-01 filter-modal share-the-link delete-account-modal what-are-your-interests-modal">
    <div class="modal fade" id="staticBackdrop23" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">What are your Interests?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="multi-select-box">

                        <label id="select-drop-down-icon">Interests</label>
                        <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                            <option value="AL"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.0125 16.1238V8.9627H5.13748V14.9988H10.575V11.4594L12.4861 9.5411C12.863 9.16418 13.155 8.73749 13.3622 8.26104C13.5695 7.7846 13.6731 7.28051 13.6731 6.74878C13.6731 6.22474 13.5687 5.7257 13.3601 5.25166C13.1514 4.77761 12.8625 4.35213 12.4933 3.9752L11.8875 3.35068L9.4269 5.81126H6.61442L5.62065 6.80503L4.81875 6.02188L6.15433 4.68629H8.96681L11.8875 1.76562L13.2952 3.1661C13.7759 3.64686 14.1454 4.19325 14.4036 4.80526C14.6617 5.41729 14.7932 6.06513 14.798 6.74878C14.7932 7.43243 14.6617 8.08026 14.4036 8.69229C14.1454 9.3043 13.7759 9.85069 13.2952 10.3315L11.7 11.9194V16.1238H4.0125ZM7.51153 12.7185L3.74856 8.9627C3.62548 8.83963 3.53246 8.69636 3.46948 8.53291C3.40649 8.36945 3.375 8.19974 3.375 8.02378C3.375 7.84781 3.40649 7.68123 3.46948 7.52401C3.53246 7.36681 3.62548 7.22668 3.74856 7.1036L5.19375 5.64688L7.38893 7.8161C7.7245 8.15168 7.98195 8.53556 8.16128 8.96776C8.3406 9.39998 8.43026 9.85406 8.43026 10.33C8.43026 10.7723 8.35334 11.1976 8.19951 11.6057C8.04566 12.0139 7.81633 12.3848 7.51153 12.7185Z" fill="#484848" />
                                </svg>
                                Animals</option>
                            <option value="WY"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.71539 7.73078C3.8327 7.3 3.83438 6.91202 3.72043 6.56683C3.60649 6.22163 3.39856 5.84519 3.09664 5.4375C2.7226 4.9423 2.47356 4.48605 2.34952 4.06875C2.22549 3.65144 2.1952 3.17019 2.25866 2.625H3.36776C3.29661 3.07116 3.30262 3.45146 3.3858 3.76588C3.46897 4.08029 3.66152 4.44135 3.96345 4.84905C4.37595 5.3904 4.64422 5.86973 4.76826 6.28703C4.89229 6.70434 4.91104 7.18559 4.82451 7.73078H3.71539ZM6.68655 7.73078C6.80385 7.3 6.80745 6.91202 6.69735 6.56683C6.58726 6.22163 6.38126 5.84519 6.07933 5.4375C5.70529 4.9423 5.45433 4.48605 5.32644 4.06875C5.19857 3.65144 5.16636 3.17019 5.22981 2.625H6.33892C6.26777 3.07116 6.27379 3.45146 6.35696 3.76588C6.44014 4.08029 6.63268 4.44135 6.93459 4.84905C7.34709 5.3904 7.61536 5.86973 7.7394 6.28703C7.86344 6.70434 7.88219 7.18559 7.79565 7.73078H6.68655ZM9.68655 7.73078C9.80385 7.3 9.80625 6.91202 9.69375 6.56683C9.58125 6.22163 9.37404 5.84519 9.07211 5.4375C8.69807 4.9423 8.44832 4.48605 8.32284 4.06875C8.19737 3.65144 8.16636 3.17019 8.22981 2.625H9.33892C9.26777 3.07116 9.27379 3.45146 9.35696 3.76588C9.44014 4.08029 9.63268 4.44135 9.93459 4.84905C10.3471 5.3904 10.6154 5.86973 10.7394 6.28703C10.8634 6.70434 10.8822 7.18559 10.7956 7.73078H9.68655ZM3.74998 14.625C3.22596 14.625 2.78245 14.4435 2.41946 14.0805C2.05649 13.7175 1.875 13.274 1.875 12.75V9.375H12.0115C12.05 8.97405 12.1935 8.61901 12.442 8.30987C12.6906 8.00073 13.0053 7.78223 13.386 7.65435L16.6961 6.54233L17.0495 7.60673L13.7394 8.71873C13.5557 8.77836 13.4074 8.88822 13.2944 9.04832C13.1814 9.20841 13.125 9.38653 13.125 9.58269V12.75C13.125 13.2692 12.9435 13.7115 12.5805 14.0769C12.2175 14.4423 11.774 14.625 11.25 14.625H3.74998ZM3.74998 13.5H11.25C11.4625 13.5 11.6406 13.4281 11.7844 13.2844C11.9281 13.1406 12 12.9625 12 12.75V10.5H2.99998V12.75C2.99998 12.9625 3.07186 13.1406 3.21561 13.2844C3.35936 13.4281 3.53748 13.5 3.74998 13.5Z" fill="#484848" />
                                </svg>
                                Cooking</option>
                            <option value="WY"><svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.6665 14.8346C9.6494 14.8346 8.78402 14.4778 8.07035 13.7641C7.35668 13.0504 6.99984 12.185 6.99984 11.168C6.99984 10.1509 7.35668 9.28549 8.07035 8.57182C8.78402 7.85814 9.6494 7.5013 10.6665 7.5013C11.6836 7.5013 12.549 7.85814 13.2626 8.57182C13.9763 9.28549 14.3331 10.1509 14.3331 11.168C14.3331 12.185 13.9763 13.0504 13.2626 13.7641C12.549 14.4778 11.6836 14.8346 10.6665 14.8346ZM10.6665 13.8346C11.3998 13.8346 12.0276 13.5735 12.5498 13.0513C13.072 12.5291 13.3332 11.9013 13.3332 11.168C13.3332 10.4346 13.072 9.80684 12.5498 9.28462C12.0276 8.7624 11.3998 8.50129 10.6665 8.50129C9.93316 8.50129 9.30538 8.7624 8.78315 9.28462C8.26093 9.80684 7.99982 10.4346 7.99982 11.168C7.99982 11.9013 8.26093 12.5291 8.78315 13.0513C9.30538 13.5735 9.93316 13.8346 10.6665 13.8346ZM2.87164 13.5013C2.53488 13.5013 2.24984 13.3846 2.0165 13.1513C1.78317 12.9179 1.6665 12.6329 1.6665 12.2961V7.47309C1.6665 7.3842 1.67912 7.2889 1.70434 7.18719C1.72955 7.08547 1.75882 6.99017 1.79215 6.90129L3.20242 3.7064H2.88445C2.71693 3.7064 2.58104 3.65427 2.47677 3.55C2.37249 3.44572 2.32035 3.30982 2.32035 3.1423V2.73207C2.32035 2.56455 2.37249 2.42865 2.47677 2.32439C2.58104 2.22011 2.71693 2.16797 2.88445 2.16797H7.11519C7.28271 2.16797 7.4186 2.22011 7.52287 2.32439C7.62715 2.42865 7.67929 2.56455 7.67929 2.73207V3.1423C7.67929 3.30982 7.62715 3.44572 7.52287 3.55C7.4186 3.65427 7.28271 3.7064 7.11519 3.7064H6.79722L8.1793 6.85517C8.02803 6.93636 7.88251 7.02525 7.74277 7.12184C7.60303 7.21841 7.46905 7.32739 7.34085 7.44875L5.72289 3.7064H4.27675L2.66649 7.41539V12.2961C2.66649 12.356 2.68572 12.4051 2.72419 12.4436C2.76265 12.4821 2.8118 12.5013 2.87164 12.5013H5.846C5.88874 12.6791 5.94557 12.853 6.0165 13.0231C6.08745 13.1931 6.17035 13.3525 6.26522 13.5013H2.87164ZM10.6665 6.70644C10.2896 6.66797 9.97313 6.51006 9.71714 6.23272C9.46116 5.95536 9.33317 5.62182 9.33317 5.23209C9.33317 4.84234 9.46116 4.5088 9.71714 4.23145C9.97313 3.95411 10.2896 3.7962 10.6665 3.75774V6.70644C10.705 6.32951 10.8629 6.01306 11.1402 5.75709C11.4175 5.50111 11.7511 5.37312 12.1408 5.37312C12.5306 5.37312 12.8641 5.50111 13.1415 5.75709C13.4188 6.01306 13.5767 6.32951 13.6152 6.70644H10.6665Z" fill="#484848" />
                                </svg>
                                Food</option>
                            <option value="WY"><svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.606 15.4037L9.95889 10.771L10.7493 9.98067L15.3964 14.6278L14.606 15.4037ZM4.46947 14.6768C3.83967 13.9893 3.37236 13.2273 3.06755 12.3907C2.76275 11.5542 2.61035 10.7013 2.61035 9.83212C2.61035 8.90038 2.78319 7.99485 3.12886 7.11554C3.47454 6.23622 4.00315 5.44319 4.71468 4.73645C5.42621 4.02492 6.22356 3.4944 7.10673 3.14487C7.98991 2.79536 8.89255 2.62061 9.81465 2.62061C10.6887 2.62061 11.5408 2.77493 12.3711 3.08358C13.2014 3.39223 13.9627 3.86146 14.655 4.49126L4.46947 14.6768ZM4.59061 12.9518L5.77621 11.7662C5.57621 11.4941 5.38198 11.2109 5.19352 10.9167C5.00506 10.6225 4.83583 10.3186 4.68583 10.0052C4.53583 9.6917 4.41058 9.36742 4.3101 9.03232C4.20962 8.69722 4.13486 8.35755 4.08583 8.01331C3.78966 8.83736 3.68893 9.67944 3.78363 10.5395C3.87835 11.3996 4.14734 12.2037 4.59061 12.9518ZM6.60406 10.9759L10.9541 6.58835C10.4166 6.17585 9.87235 5.84629 9.32139 5.59966C8.77043 5.35302 8.25144 5.18644 7.76443 5.0999C7.2774 5.01336 6.83725 5.00615 6.44398 5.07826C6.05071 5.15037 5.74543 5.29509 5.52811 5.5124C5.3108 5.7374 5.16609 6.04654 5.09398 6.43981C5.02186 6.83307 5.02788 7.27514 5.11201 7.76602C5.19614 8.25688 5.36152 8.77707 5.60816 9.32658C5.8548 9.87611 6.18676 10.4259 6.60406 10.9759ZM11.7589 5.79798L12.9675 4.6124C12.1993 4.1547 11.3839 3.88018 10.5214 3.78884C9.65885 3.69749 8.81558 3.79894 7.99153 4.09319C8.34826 4.13742 8.69418 4.21217 9.02928 4.31746C9.36438 4.42275 9.68866 4.54847 10.0021 4.69462C10.3156 4.84078 10.6187 5.00809 10.9115 5.19654C11.2043 5.385 11.4868 5.58548 11.7589 5.79798Z" fill="#484848" />
                                </svg>
                                Restaurants</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Save</button>
                    </div>

                </div>
                <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
            </div>
        </div>
    </div>
</div>

<div class="modal-01 filter-modal share-the-link reviews-modal">
    <div class="modal fade" id="staticBackdrop24" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Reviews (14)</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-tabs-main">
                        <nav>
                            <div class="nav nav-tabs" id="myNavTabs" role="tablist">
                                <button class="nav-link active" id="written-about-tab" data-bs-toggle="tab" data-bs-target="#written-about-content" type="button" role="tab" aria-controls="written-about-content" aria-selected="true">Written about you</button>
                                <button class="nav-link" id="written-by-tab" data-bs-toggle="tab" data-bs-target="#written-by-content" type="button" role="tab" aria-controls="written-by-content" aria-selected="false">Written by you</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="written-about-content" role="tabpanel" aria-labelledby="written-about-tab">
                                <!-- Your content for the first tab goes here -->
                                <div class="pool-box">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cottage-with-pool-img.png" alt="">
                                    <div class="content">
                                        <h6>Cottage with Pool</h6>
                                        <p>Hosted by Stefanie J. Oakland, California</p>
                                    </div>
                                </div>
                                <div class="gelu-main-box">
                                    <div class="img-box">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Gelu.png" alt="">
                                        <div class="content">
                                            <h5>Gelu</h5>
                                            <p>Bucharest, Romania</p>
                                        </div>
                                    </div>
                                    <div class="list">
                                        <p>
                                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.295 12.5L3.27 8.06316L0 5.07895L4.32 4.68421L6 0.5L7.68 4.68421L12 5.07895L8.73 8.06316L9.705 12.5L6 10.1474L2.295 12.5Z" fill="#484848"></path>
                                            </svg>
                                            5,0
                                        </p>
                                        <p>· 3 weeks ago</p>
                                    </div>
                                    <div class="main-content">
                                        <p>A superb villa, properly equipped and very practical. Score 10/10. Perfect for larger groups and families with children</p>
                                    </div>
                                </div>
                                <div class="pool-box">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cottage-with-pool-img.png" alt="">
                                    <div class="content">
                                        <h6>Cottage with Pool</h6>
                                        <p>Hosted by Stefanie J. Oakland, California</p>
                                    </div>
                                </div>
                                <div class="gelu-main-box">
                                    <div class="img-box">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Gelu.png" alt="">
                                        <div class="content">
                                            <h5>Gelu</h5>
                                            <p>Bucharest, Romania</p>
                                        </div>
                                    </div>
                                    <div class="list">
                                        <p>
                                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.295 12.5L3.27 8.06316L0 5.07895L4.32 4.68421L6 0.5L7.68 4.68421L12 5.07895L8.73 8.06316L9.705 12.5L6 10.1474L2.295 12.5Z" fill="#484848"></path>
                                            </svg>
                                            5,0
                                        </p>
                                        <p>· 3 weeks ago</p>
                                    </div>
                                    <div class="main-content">
                                        <p>A superb villa, properly equipped and very practical. Score 10/10. Perfect for larger groups and families with children</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="written-by-content" role="tabpanel" aria-labelledby="written-by-tab">
                                <div class="gelu-main-box">
                                    <div class="img-box">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/menu-person-img.png" alt="">
                                        <div class="content">
                                            <h5>Helena Bonham Carter</h5>
                                            <p>Bucharest, Romania</p>
                                        </div>
                                    </div>
                                    <div class="list">
                                        <p>
                                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.295 12.5L3.27 8.06316L0 5.07895L4.32 4.68421L6 0.5L7.68 4.68421L12 5.07895L8.73 8.06316L9.705 12.5L6 10.1474L2.295 12.5Z" fill="#484848"></path>
                                            </svg>
                                            5,0
                                        </p>
                                        <p>· 3 weeks ago</p>
                                    </div>
                                    <div class="main-content">
                                        <p>Wonderful guest!</p>
                                    </div>
                                </div>
                                <div class="gelu-main-box">
                                    <div class="img-box">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/menu-person-img.png" alt="">
                                        <div class="content">
                                            <h5>Helena Bonham Carter</h5>
                                            <p>Bucharest, Romania</p>
                                        </div>
                                    </div>
                                    <div class="list">
                                        <p>
                                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.295 12.5L3.27 8.06316L0 5.07895L4.32 4.68421L6 0.5L7.68 4.68421L12 5.07895L8.73 8.06316L9.705 12.5L6 10.1474L2.295 12.5Z" fill="#484848"></path>
                                            </svg>
                                            5,0
                                        </p>
                                        <p>· 3 weeks ago</p>
                                    </div>
                                    <div class="main-content">
                                        <p>Wonderful guest!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal-01 filter-modal share-the-link whats-happening-modal">
    <div class="modal fade" id="staticBackdrop25" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="staticBackdropLabel">What’s Happening?</h1> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="main-modal-step-form">
                        
                            <form id="multi-step-form">
                                <div class="step step-1">
                                    <h3>What’s Happening?</h3>
                                <p>This will only be shared with Lucky Backyards</p>
                                    <!-- Step 1 form fields here -->
                                    <div class="radio-box-main">
                                        <input type="radio"  id="i-think-theyre" name="radio-box-main" >
                                        <label for="i-think-theyre">I think they’re scamming or spamming me</label>
                                    </div>
                                    <div class="radio-box-main">
                                        <input type="radio"  id="theyre-being" name="radio-box-main" >
                                        <label for="theyre-being"   >They’re being offensive</label>
                                    </div>
                                    <div class="radio-box-main">
                                        <input type="radio"  id="something-else" name="radio-box-main" checked >
                                        <label for="something-else"   >Something else</label>
                                    </div>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>

                                <div class="step step-2">
                                <h3>What’s Happening?</h3>
                                <p>This will only be shared with Lucky Backyards</p>
                                    <!-- Step 2 form fields here -->
                                    <div class="radio-box-main">
                                        <input type="radio"  id="the-host-is" name="radio-box-main" >
                                        <label for="the-host-is">The host is unresponsive</label>
                                    </div>
                                    <div class="radio-box-main">
                                        <input type="radio"  id="they-collect-fees-or" name="radio-box-main" >
                                        <label for="they-collect-fees-or">They collect fees or deposits outside of Lucky Backyards</label>
                                    </div>
                                    <div class="radio-box-main">
                                        <input type="radio"  id="my-host-is" name="radio-box-main" >
                                        <label for="my-host-is">My host is asking me to cancel</label>
                                    </div>
                                    <div class="radio-box-main">
                                        <input type="radio"  id="im-concerned-theyre" name="radio-box-main" >
                                        <label for="im-concerned-theyre">I’m concerned they’re hosting in my neighborhood</label>
                                    </div>
                                    <div class="radio-box-main">
                                        <input type="radio"  id="something-on-this-page-is-broken" name="radio-box-main" checked >
                                        <label for="something-on-this-page-is-broken">Something on this page is broken</label>
                                    </div>
                                                    <div class="two-btns-box">
                                                    <button type="button" class="btn btn-primary prev-step">Back</button>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                                    </div>
                                </div>

                                <div class="step step-3">
                                <h3>Application sent</h3>
                                    <div class="application-sent-box">
                                        <svg width="284" height="192" viewBox="0 0 284 192" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.6" d="M141.739 162.939C183.451 162.939 217.265 159.774 217.265 155.87C217.265 151.966 183.451 148.801 141.739 148.801C100.027 148.801 66.2134 151.966 66.2134 155.87C66.2134 159.774 100.027 162.939 141.739 162.939Z" fill="#E9FBE8"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M147.901 71.1707L142.726 63.752C142.567 63.5243 142.231 63.5244 142.072 63.752L136.896 71.1707C135.453 73.2389 132.874 74.1804 130.443 73.5261L121.723 71.1792C121.455 71.1072 121.198 71.3239 121.222 71.6006L122.013 80.6198C122.233 83.1343 120.861 85.5182 118.579 86.5841L110.395 90.4071C110.144 90.5244 110.085 90.8563 110.281 91.0527L116.668 97.4522C118.449 99.2363 118.925 101.947 117.861 104.234L114.042 112.439C113.924 112.69 114.093 112.982 114.368 113.006L123.363 113.792C125.871 114.011 127.973 115.78 128.624 118.219L130.957 126.965C131.029 127.233 131.345 127.349 131.571 127.189L138.965 121.993C141.026 120.544 143.771 120.544 145.833 121.993L153.226 127.189C153.453 127.349 153.769 127.233 153.84 126.965L156.174 118.219C156.824 115.78 158.927 114.011 161.435 113.792L170.429 113.006C170.705 112.982 170.873 112.69 170.756 112.439L166.937 104.234C165.872 101.947 166.349 99.2363 168.13 97.4522L174.516 91.0527C174.712 90.8563 174.654 90.5244 174.403 90.4071L166.219 86.5841C163.937 85.5182 162.564 83.1343 162.785 80.6198L163.575 71.6006C163.6 71.3239 163.342 71.1072 163.075 71.1792L154.355 73.5261C151.924 74.1804 149.344 73.239 147.901 71.1707ZM145.013 62.1469C143.743 60.326 141.054 60.326 139.784 62.1469L134.609 69.5656C133.839 70.6687 132.463 71.1708 131.167 70.8218L122.447 68.4749C120.307 67.8989 118.247 69.6321 118.441 71.8458L119.231 80.865C119.349 82.206 118.617 83.4775 117.4 84.0459L109.216 87.869C107.207 88.8073 106.74 91.4627 108.308 93.0334L114.695 99.4329C115.644 100.384 115.898 101.83 115.331 103.05L111.512 111.254C110.574 113.268 111.919 115.603 114.126 115.796L123.121 116.581C124.458 116.698 125.58 117.642 125.927 118.942L128.26 127.689C128.832 129.835 131.359 130.758 133.174 129.482L140.567 124.286C141.667 123.513 143.131 123.513 144.23 124.286L151.624 129.482C153.438 130.758 155.965 129.835 156.538 127.689L158.871 118.942C159.218 117.642 160.339 116.698 161.677 116.581L170.671 115.796C172.879 115.603 174.223 113.268 173.286 111.254L169.467 103.05C168.899 101.83 169.153 100.384 170.103 99.4329L176.49 93.0334C178.057 91.4627 177.59 88.8073 175.582 87.869L167.398 84.0459C166.181 83.4775 165.449 82.206 165.566 80.865L166.357 71.8458C166.551 69.6321 164.491 67.8989 162.351 68.4749L153.631 70.8218C152.334 71.1708 150.959 70.6687 150.189 69.5656L145.013 62.1469Z" fill="#484848"></path>
                            <path d="M138.84 107.998C138.183 107.998 137.559 107.725 137.1 107.247L129.152 98.9863C128.2 97.9963 128.2 96.3578 129.152 95.3678C130.105 94.3778 131.681 94.3778 132.633 95.3678L138.84 101.82L152.962 87.1409C153.914 86.1509 155.49 86.1509 156.443 87.1409C157.395 88.1309 157.395 89.7695 156.443 90.7593L140.581 107.247C140.121 107.725 139.497 107.998 138.84 107.998Z" fill="#4CAF50"></path>
                            <path d="M70.6922 124.532C72.227 128.765 76.9048 130.953 81.1414 129.42C85.3774 127.886 87.5673 123.212 86.0325 118.979C84.4978 114.746 79.82 112.558 75.5833 114.091C71.3474 115.625 69.1575 120.299 70.6922 124.532ZM83.271 119.978C84.253 122.687 82.8515 125.679 80.1405 126.66C77.4295 127.642 74.4351 126.241 73.4531 123.532C72.4711 120.823 73.8725 117.831 76.5836 116.85C79.2946 115.869 82.2883 117.269 83.271 119.978Z" fill="#DBF9D8"></path>
                            <path d="M187.962 56.5325C189.497 60.7651 194.174 62.9533 198.411 61.4198C202.647 59.8862 204.837 55.212 203.302 50.9786C201.767 46.7459 197.089 44.5577 192.853 46.0913C188.617 47.6248 186.427 52.2991 187.962 56.5325ZM200.541 51.9781C201.523 54.687 200.121 57.6791 197.41 58.6604C194.699 59.6416 191.705 58.2412 190.723 55.5323C189.741 52.8233 191.142 49.8312 193.853 48.85C196.564 47.8687 199.559 49.2691 200.541 51.9781Z" fill="#DBF9D8"></path>
                            <path d="M93.7706 67.1553C94.4153 65.3767 93.4949 63.4126 91.7149 62.7684C89.9349 62.1242 87.9693 63.0438 87.3246 64.8224C86.6799 66.6011 87.6002 68.5652 89.3802 69.2094C91.1602 69.8536 93.1259 68.934 93.7706 67.1553Z" fill="#4CAF50"></path>
                            <path d="M217.042 137.788C219.407 136.376 220.176 133.304 218.76 130.927C217.343 128.55 214.278 127.768 211.913 129.179C209.547 130.592 208.778 133.663 210.194 136.04C211.611 138.417 214.676 139.2 217.042 137.788ZM212.836 130.728C214.35 129.825 216.312 130.326 217.218 131.847C218.124 133.368 217.632 135.334 216.118 136.238C214.605 137.141 212.643 136.64 211.736 135.119C210.83 133.598 211.322 131.632 212.836 130.728Z" fill="#DBF9D8"></path>
                            <path d="M118.918 40.1861C121.283 38.7744 122.053 35.7025 120.636 33.3257C119.22 30.9485 116.154 30.166 113.789 31.5777C111.424 32.9899 110.654 36.0613 112.07 38.4381C113.487 40.8154 116.552 41.5984 118.918 40.1861ZM114.712 33.1269C116.226 32.2235 118.188 32.724 119.094 34.2454C120.001 35.7668 119.509 37.7326 117.995 38.6359C116.481 39.5393 114.519 39.0388 113.613 37.5174C112.706 35.996 113.198 34.0303 114.712 33.1269Z" fill="#DBF9D8"></path>
                            <path d="M190.914 112.46C192.652 111.722 193.459 109.709 192.716 107.963C191.974 106.218 189.963 105.402 188.225 106.14C186.487 106.878 185.68 108.891 186.423 110.637C187.165 112.382 189.176 113.199 190.914 112.46Z" fill="#4CAF50"></path>
                        </svg>
                        <p>Thank you for helping us uphold our community standards.</p>
                                    </div>
                                    <button type="submit" class="btn btn-success">Done</button>
                                </div>
                            </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal-01 filter-modal share-the-link delete-account-modal rename-wishlist-modal ">
    <div class="modal fade" id="addWishlist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add to Wishlist</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="wishlist-box">
                        <button id="btn-create-new-wishlist">
                        <div class="new">
                            <div class="d-flex align-items-center gap-3">
                                <div class="icon-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                      <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="text-wrapper">Create a new wishlist</div>
                            </div>
                        </div>
                        </button>
                        <hr/>
                        <div class="wish-boxes">
                        <form>
                        <div class="box">
                            <input type="radio" value="1" id="cat1" name="category"/>
                            <div class="d-flex align-items-center gap-3">
                                <div class="category-wrapper">
                                    <img src="https://luckybackyards.com/staging/wp-content/uploads/2024/03/ideas-for-family-travel-img-01.png" />
                                </div>
                                <div class="text-wrapper">Create a new wishlist</div>
                            </div>
                        </div>
                        <div class="box">
                            <input type="radio" value="2" id="cat2" name="category"/>
                            <div class="d-flex align-items-center gap-3">
                                <div class="category-wrapper">
                                    <img src="https://luckybackyards.com/staging/wp-content/uploads/2024/03/ideas-for-family-travel-img-01.png" />
                                </div>
                                <div class="text-wrapper">Create a new wishlist</div>
                            </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="share">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-01 filter-modal share-the-link delete-account-modal rename-wishlist-modal ">
    <div class="modal fade" id="create-new-wishlist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Create a new wishlist</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="rename-wishlist-modal-input">
                        <form id="form-create-category">
                            <label>Name</label>
                            <input type="text" name="category-name" required="required">
                            <div class="error"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="share" id="btn-create-category">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
