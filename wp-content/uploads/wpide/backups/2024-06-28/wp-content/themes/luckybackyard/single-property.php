<?php
get_header();
$property_id = get_the_ID();
$gallery = get_field('property_gallery');
$address = get_field('address');
$city = get_field('city');
$area = get_field('area');
$zip = get_field('zip');
$country = get_field('country');
$detail = get_field('detail');
$room_and_beds = get_field('room_and_beds');
$bathroom_product = get_field('bathroom_product');
$price = get_field('price');
$current_date = date('M d, Y'); 
$charge_type = get_field('charge_type');

$children = get_field('children');
$adults = get_field('adults');
$infants = get_field('infants');
$pets = get_field('pets');

$guestsnumer = $children + $adults + $infants;

// Check if the property is in the user's wishlist
if ( is_user_logged_in() ) {
    global $wpdb;
    $user_id = get_current_user_id();
    $wishlist_table = $wpdb->prefix . 'wishlist';
    $is_favorite = $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM $wishlist_table WHERE user_id = %d AND property_id = %d",
        $user_id,
        $property_id
    ));
}
?>


<style>
    .custom-number {
    width: 100%;
    top: 70px;
    padding: 20px 0 0;
    z-index: 99999999;
}


.two-main-content {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #DFDEDE;
    margin-bottom: 25px;
    padding-bottom: 25px;
}

 .two-main-content .content {
    width: 200px;
}

.two-main-content .content h6{
        font-size: 16px;
}

.two-main-content .content p{
        font-size: 13px;
    color: #9B9B9B;
}

.two-main-content .number{
        display: flex;
    align-items: center;
    justify-content: center;
}

.two-main-content .number span{
        border: 1px solid #535353;
    width: 26px !important;
    height: 26px !important;
    border-radius: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000000;
    cursor: pointer;
}

.two-main-content .number input{
        width: 40px;
    text-align: center;
    font-size: 14px;
    font-weight: 600;
    color: #484848;
    border: none;
}

.two-main-content .number span{
        border: 1px solid #535353;
    width: 26px !important;
    height: 26px !important;
    border-radius: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #000000;
    cursor: pointer;
}

.property-page-sec-03 .main-form-box .main-total-pricing h6{
    display: flex;
    justify-content: space-between;
}

.property-page-sec-03 .main-form-box .main-total-pricing .content-01{
    width:100%;
}







</style>

<section class="map-property-list-sec-01 property-page-sec-01" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/main-title-bg.png);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-drop-down">
                    <label class="dropdown">
                        <div class="dd-button">
                            <?php echo get_field('country');?>
                        </div>
                        <input type="checkbox" class="dd-input" id="test">
                        <ul class="dd-menu">
                            <li>Action</li>
                            <li>Another action</li>
                            <li>Something else here</li>
                        </ul>

                    </label>
                    <label class="dropdown">
                        <div class="dd-button">
                            8-10 Jun 2024
                        </div>
                        <input type="checkbox" class="dd-input" id="test">
                        <ul class="dd-menu">
                            <li>Action</li>
                            <li>Another action</li>
                            <li>Something else here</li>
                            <li class="divider"></li>
                        </ul>

                    </label>
                    <label class="dropdown">
                        <div class="dd-button">
                            Guests <?php echo $guestsnumer;?>, Pets <?php echo $pets;?>
                        </div>
                        <input type="checkbox" class="dd-input" id="test">
                        <ul class="dd-menu">
                            <li>Action</li>
                            <li>Another action</li>
                            <li>Something else here</li>
                            <li class="divider"></li>
                        </ul>

                    </label>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="property-page-sec-02">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text">
                    <h3><?php echo get_the_title();?></h3>
                </div>
                <div class="amazing-main-box">
                    <div class="box-01">
                        <ul>
                            <li><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-01.png" alt=""> 4,9</a></li>
                            <li><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-02.png" alt=""> <u>42 Reviews</u> </a></li>
                        
                            <?php if ($address = get_field('address')): ?>
                            <li><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-03.png" alt=""> <?php echo $address; ?></a></li>
                            <?php endif; ?>
                        
                            <?php if ($maximum_guests = get_field('maximum_number_of_guests_allowed')): ?>
                            <li><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-04.png" alt=""> Up to <?php echo $maximum_guests; ?> guests allowed</a></li>
                            <?php endif; ?>
                        
                            <?php if ($bedrooms = get_field('bedrooms')): ?>
                            <li><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-05.png" alt=""> <?php echo $bedrooms; ?></a></li>
                            <?php endif; ?>
                        
                            <?php if ($bathrooms = get_field('bathrooms')): ?>
                            <li><a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-06.png" alt=""> <?php echo $bathrooms; ?></a></li>
                            <?php endif; ?>
                        </ul>

                    </div>
                    <div class="box-02">
                        <ul>
                            <li class="d-flex gap-1 align-items-center">
                            <div id="add-to-wishlist-single" data-id="<?php echo $property_id; ?>" class="<?php echo $is_favorite ? 'favourite' : ''; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="heart">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </div>
                            Add to favourite
                            </li>
                            <li><a href="javascript:void(0)"> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-08.png" alt=""> Share</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
         <?php
// Check if the post has a 'property_gallery' field
if (have_rows('property_gallery')) :
    // Retrieve the gallery field
    $gallery = get_field('property_gallery');
    
    // Ensure the gallery has images
    if ($gallery) :
        // Get the first image
        $first_image = $gallery[0];
        // Get the other images (up to 4)
        $other_images = array_slice($gallery, 1, 4);
    endif;
endif;
?>

<div class="row">
    <!-- Main Image -->
    <div class="col-lg-6 col-md-12 p-0">
        <div class="img-box">
            <?php if (!empty($first_image)): ?>
                <a href="<?php echo esc_url($first_image['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($first_image['caption']); ?>">
                    <img src="<?php echo esc_url($first_image['url']); ?>" alt="<?php echo esc_attr($first_image['alt']); ?>">
                </a>
            <?php endif; ?>
            <!--<div class="virtual-box">-->
            <!--    <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/virtual-tour.png" alt=""> Virtual Tour </a>-->
            <!--</div>-->
        </div>
    </div>
    
    <!-- Other Images -->
    <?php if (!empty($other_images)): ?>
        <div class="col-lg-3 col-md-12">
            <?php if (isset($other_images[0])): ?>
                <div class="img-box">
                    <a href="<?php echo esc_url($other_images[0]['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($other_images[0]['caption']); ?>">
                        <img src="<?php echo esc_url($other_images[0]['url']); ?>" alt="<?php echo esc_attr($other_images[0]['alt']); ?>">
                    </a>
                    <!--<div class="virtual-box">-->
                    <!--    <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/virtual-tour.png" alt=""> Virtual Tour </a>-->
                    <!--</div>-->
                </div>
            <?php endif; ?>
            <?php if (isset($other_images[1])): ?>
                <div class="img-box">
                    <a href="<?php echo esc_url($other_images[1]['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($other_images[1]['caption']); ?>">
                        <img src="<?php echo esc_url($other_images[1]['url']); ?>" alt="<?php echo esc_attr($other_images[1]['alt']); ?>">
                    </a>
                    <!--<div class="virtual-box">-->
                    <!--    <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/virtual-tour.png" alt=""> Virtual Tour </a>-->
                    <!--</div>-->
                </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-3 col-md-12 p-0">
            <?php if (isset($other_images[2])): ?>
                <div class="img-box">
                    <a href="<?php echo esc_url($other_images[2]['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($other_images[2]['caption']); ?>">
                        <img src="<?php echo esc_url($other_images[2]['url']); ?>" alt="<?php echo esc_attr($other_images[2]['alt']); ?>">
                    </a>
                    <!--<div class="virtual-box">-->
                    <!--    <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/virtual-tour.png" alt=""> Virtual Tour </a>-->
                    <!--</div>-->
                </div>
            <?php endif; ?>
            <?php if (isset($other_images[3])): ?>
                <div class="img-box">
                    <a href="<?php echo esc_url($other_images[3]['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($other_images[3]['caption']); ?>">
                        <img src="<?php echo esc_url($other_images[3]['url']); ?>" alt="<?php echo esc_attr($other_images[3]['alt']); ?>">
                    </a>
                    <!--<div class="virtual-box">-->
                        <!--<a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/virtual-tour.png" alt=""> Virtual Tour </a>-->
                    <!--    <a href="<?php echo esc_url($other_images[3]['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($other_images[3]['caption']); ?>">-->
                    <!--        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/img-gallery.png" alt="">-->
                    <!--    </a>-->
                    <!--</div>-->
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

    </div>

</section>

                <!--<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-img-01.png" data-fancybox="gallery" data-caption="Caption Images 1"></a>-->
                <!--<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-img-02.png" data-fancybox="gallery" data-caption="Caption Images 1"></a>-->
                <!--<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-img-03.png" data-fancybox="gallery" data-caption="Caption Images 1"></a>-->
                <!--<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-img-04.png" data-fancybox="gallery" data-caption="Caption Images 1"></a>-->
                <!--<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-img-05.png" data-fancybox="gallery" data-caption="Caption Images 1"></a>-->
                <!--<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-img-01.png" data-fancybox="gallery" data-caption="Caption Images 1"></a>-->
                <!--<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-img-02.png" data-fancybox="gallery" data-caption="Caption Images 1"></a>-->
                <!--<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-img-03.png" data-fancybox="gallery" data-caption="Caption Images 1"></a>-->
                <!--<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-img-04.png" data-fancybox="gallery" data-caption="Caption Images 1"></a>-->
                <!--<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-img-05.png" data-fancybox="gallery" data-caption="Caption Images 1"></a>-->

<section class="property-page-sec-03">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-drop-listing">
                    <ul>
                        <li><a href="#in-page-link-01"> Description </a></li>
                        <li><a href="#in-page-link-02"> About Property </a></li>
                        <li><a href="#in-page-link-03"> Rooms & Beds </a></li>
                        <li><a href="#in-page-link-04"> Details </a></li>
                        <li><a href="#in-page-link-05"> Proposal </a></li>
                        <li><a href="#in-page-link-06"> Terms & Condition </a></li>
                        <li><a href="#in-page-link-07"> Reviews </a></li>
                        <li><a href="#in-page-link-08"> Address </a></li>
                        <li><a href="#in-page-link-09"> Location </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="main-box-border" id="in-page-link-01">
                    <div class="person-img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/hosted-person.png" alt="">
                        <div class="text">
                            <h6>Hosted by <?php echo get_field('host_name');?>.</h6>
                            <p>Superhost · 7 years hosting</p>
                        </div>
                    </div>
                </div>
                <div class="main-box-border">
                    <div class="circle-icon-boxes">
                        <ul>
                            <li> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-icon-01.png" alt=""> Up to <?php echo get_field('maximum_number_of_guests_allowed');?> guests allowed</li>
                            <li> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-icon-02.png" alt=""> Pets welcome (not in pool) </li>
                            <li> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-icon-03.png" alt=""> Cancel anytime! </li>
                            <li> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-icon-04.png" alt=""> All ages welcome</li>
                            <li> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/circle-icon-05.png" alt=""> Available for up 6 cars <a href="javascript:void(0)">details</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="main-box-border" id="in-page-link-02">
                    <div class="text-box-content-01 heading">
                        <h4><?php echo get_the_title();?></h4>
                        <p><?php echo get_the_content();?></p>
                    </div>
                </div>
                <div class="main-box-border" id="in-page-link-03">
                    <div class="heading">
                        <h4>Rooms & Beds</h4>
                        <h5>5 Bedrooms (sleeps 8)</h5>
                    </div>
                    <div class="main-squares-boxes">
                        <?php 
    				    if(is_array($room_and_beds)){ 
    					foreach($room_and_beds as $key => $room){
				    ?>
                        <div class="square-boxes">
                            <div class="main-images-boxes">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rooms-beds-icon-01.png" alt="">
                            </div>
                            <div class="content-box">
                                <h6><?php echo $room['select_room'];?></h6>
                                <p>1 Queen Bed</p>
                            </div>
                        </div>
                        
                        <?php } } ?>	
                        
                        <!--<div class="square-boxes">-->
                        <!--    <div class="main-images-boxes">-->
                        <!--        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rooms-beds-icon-01.png" alt="">-->
                        <!--    </div>-->
                        <!--    <div class="content-box">-->
                        <!--        <h6>Harry Potter Bedroom</h6>-->
                        <!--        <p>1 Queen Bed</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="square-boxes">-->
                        <!--    <div class="main-images-boxes">-->
                        <!--        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rooms-beds-icon-02.png" alt="">-->
                        <!--    </div>-->
                        <!--    <div class="content-box">-->
                        <!--        <h6>Princess & Avengers Bedroom</h6>-->
                        <!--        <p>Princess & Avengers Bedroom</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="square-boxes">-->
                        <!--    <div class="main-images-boxes">-->
                        <!--        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rooms-beds-icon-01.png" alt="">-->
                        <!--    </div>-->
                        <!--    <div class="content-box">-->
                        <!--        <h6>Master Bedroom</h6>-->
                        <!--        <p>1 King Bed</p>-->
                        <!--    </div>-->
                        <!--</div>-->

                    </div>



                </div>
                <div class="main-box-border">
                    <div class="heading">
                        <h5>3 Bedrooms</h5>
                    </div>
                    <div class="main-squares-boxes">
                        <?php 
    				    if(is_array($bathroom_product)){ 
    					foreach($bathroom_product as $key => $product){
				    ?>
                        <div class="square-boxes">
                            <div class="main-images-boxes">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bathrooms-icon-01.png" alt="">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bathrooms-icon-02.png" alt="">
                            </div>
                            <div class="content-box">
                                <h6>Bathroom 2</h6>
                                <p><?php echo implode(', ', $product['select']); ?></p>
                            </div>
                        </div>
                        <?php } } ?>
                        
                        <!--<div class="square-boxes">-->
                        <!--    <div class="main-images-boxes">-->
                        <!--        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bathrooms-icon-01.png" alt="">-->
                        <!--        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bathrooms-icon-02.png" alt="">-->
                        <!--    </div>-->
                        <!--    <div class="content-box">-->
                        <!--        <h6>Bathroom 3</h6>-->
                        <!--        <p>Soap · Towels provided · Bathtub or shower · Toilet · Shampoo · Hair dryer</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="square-boxes">-->
                        <!--    <div class="main-images-boxes">-->
                        <!--        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bathrooms-icon-01.png" alt="">-->
                        <!--        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bathrooms-icon-02.png" alt="">-->
                        <!--        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bathrooms-icon-03.png" alt="">-->
                        <!--    </div>-->
                        <!--    <div class="content-box">-->
                        <!--        <h6>Master Ensuite</h6>-->
                        <!--        <p>Soap · Towels provided · Bathtub or shower · Toilet · Shampoo · Hair dryer</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="main-box-border">
                    <div class=" heading">
                        <h4>Space</h4>
                    </div>
                    <div class="circle-icon-boxes">
                        <ul>
                            <li> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/space-icon-01.png" alt=""> Night lighting </li>
                            <li> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/space-icon-02.png" alt=""> Shaded area </li>
                            <li> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/space-icon-03.png" alt=""> Patio </li>
                            <li> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/space-icon-04.png" alt=""> Hot tub</li>
                        </ul>
                    </div>
                </div>
                <div class="main-box-border" id="in-page-link-04">
                    <div class="heading">
                        <h4>Details</h4>
                    </div>
                    <div class="circle-icon-boxes details-boxes">
                        <ul>
                            <?php 
        				    if(is_array($detail)){ 
        					foreach($detail as $key => $details){
    				        ?>
                            <li> <b><?php echo $details['title'];?>:</b> <?php echo $details['description'];?> </li>
                            <?php } } ?>
                            <!--<li> <b>Property :</b> Size: 850 m2 </li>-->
                            <!--<li> <b>Pool Size:</b> 40*x13* </li>-->
                            <!--<li> <b>Depth:</b> 3*-10* </li>-->
                        </ul>
                    </div>
                </div>
                <div class="main-box-border">
                    <div class="heading">
                        <h4>Features</h4>
                    </div>
                    <div class="main-features-boxes">
                        
                        
                        <?php
                        
                        $amenities = get_the_terms($property_id, 'amenity');
                        
                        //$counter = 0; // Initialize counter
                        
                        if (!empty($amenities)) {
                            foreach ($amenities as $key => $amenity) {
                                // Check if the counter exceeds six, then break out of the loop
                                if ($key >= 6) {
                                    break;
                                }
                        
                                // Get the icon for the amenity
                                // $icon = get_field('select_icon', $amenity);
                                $img_url = $icon['url'] ? $icon['url'] : get_stylesheet_directory_uri() . '/assets/images/features-img.png';
                        
                                // Output the amenity HTML
                                echo '<div class="box">';
                                echo '<img src="' . $img_url . '" alt="' . $amenity->name . '">';
                                echo '<p>' . $amenity->name . '</p>';
                                echo '</div>';
                        
                               // $counter++; // Increment counter
                            }
                        } else {
                            echo 'No amenities found.';
                        }
                        
                        
                        ?>



                    
                        <!--<div class="box">-->
                        <!--    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/features-img.png" alt="">-->
                        <!--    <p>Heated Pool</p>-->
                        <!--    <div class="price-box">-->
                        <!--        <p>$0</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="box">-->
                        <!--    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/features-img.png" alt="">-->
                        <!--    <p>Sound System</p>-->
                        <!--    <div class="price-box">-->
                        <!--        <p>$0</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="box">-->
                        <!--    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/features-img.png" alt="">-->
                        <!--    <p>Pool Toys</p>-->
                        <!--    <div class="price-box">-->
                        <!--        <p>$30</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="box">-->
                        <!--    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/features-img.png" alt="">-->
                        <!--    <p>Wifi Access </p>-->
                        <!--    <div class="price-box">-->
                        <!--        <p>$0</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="box">-->
                        <!--    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/features-img.png" alt="">-->
                        <!--    <p>Fire Pit</p>-->
                        <!--    <div class="price-box">-->
                        <!--        <p>$0</p>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    
                    <div class="read-all-btn-with-arrow">
                        <button type="button" class="allamenittes" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                        Show all 24 Amenities
                     </button>
                    </div>
                </div>
                
                
                <div class="main-box-border" id="in-page-link-06">
                    <div class=" heading">
                        <h4>Terms & Condition</h4>
                    </div>
                    <div class="circle-icon-boxes">
                        <ul>
                            <li> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/smoking-allowed-icon.png" alt=""> Smoking Allowed </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">

                <div class="main-form-box" id="in-page-link-05">
                    <div class="price-box">
                        <h4>$<span id="price_per_night" data-price="<?php echo $price;?>"><?php echo $price;?>/</span><?php if($charge_type==='nightly') { echo'Night'; } else { echo 'Hourly'; } ?></h4>
                        <!--<p>hourly</p>-->
                    </div>
                    <form id="booking-form"> 
                    <!--action="<?php //echo esc_url( home_url( '/request_to_book/' ) ); ?>" method="get"-->
                        <!-- HTML with JavaScript -->
<!-- HTML with JavaScript -->
<?php if($charge_type === 'nightly'): ?>
<div class="my-3 d-flex border rounded-4 p-3 gap-2 easepick-dp">
       <i class="calendar icon opacity-50"></i><input class="w-100 border-0" id="booking-datepicker" placeholder="Check In/Check Out"/>
</div>
<?php else: ?>
<div class="my-3 d-flex border rounded-4 p-3 gap-2 easepick-dp">
       <i class="calendar icon opacity-50"></i><input class="w-100 border-0" id="hourly-datepicker" placeholder="Select Date"/>
</div>
    <div class="timepicker-container">
        <label for="start-time">Start Time:</label>
        <select class="border rounded-4 p-3" id="start-time" required="required">
            <!-- Options will be populated by JavaScript -->
        </select>
        
        <label for="end-time">End Time:</label>
        <select class="border rounded-4 p-3" id="end-time" required="required">
            <!-- Options will be populated by JavaScript -->
        </select>
    </div>
<?php endif; ?>
<!--<div class="ui container p-0">-->
<!--        <div class="ui form">-->
<!--            <div class="field">-->
<!--                <label for="start-time">Start Time:</label>-->
<!--                <div class="ui selection dropdown border rounded-4 p-3" id="start-time-dropdown">-->
<!--                    <input type="hidden" id="start-time">-->
<!--                    <i class="dropdown icon"></i>-->
<!--                    <div class="default text">Select Start Time</div>-->
<!--                    <div class="menu" id="start-time-menu">-->
                        <!-- Options will be populated by JavaScript -->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="field">-->
<!--                <label for="end-time">End Time:</label>-->
<!--                <div class="ui selection dropdown border rounded-4 p-3" id="end-time-dropdown">-->
<!--                    <input type="hidden" id="end-time">-->
<!--                    <i class="dropdown icon"></i>-->
<!--                    <div class="default text">Select End Time</div>-->
<!--                    <div class="menu" id="end-time-menu">-->
                        <!-- Options will be populated by JavaScript -->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--<div class="input-box">-->
<!--    <div class="ui calendar rangestart" id="start_date">-->
<!--        <p>Check In</p>-->
<!--        <div class="ui input left icon">-->
<!--            <i class="calendar icon"></i>-->
<!--            <input type="text" name="start_date" placeholder="<?php echo esc_attr($current_date); ?>" onblur="getDays()">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="input-box">-->
<!--    <div class="ui calendar rangeend" id="end_date">-->
<!--        <p>Check Out</p>-->
<!--        <div class="ui input left icon">-->
<!--            <i class="calendar icon"></i>-->
<!--            <input type="text" name="end_date" placeholder="<?php echo esc_attr($current_date); ?>" onblur="getDays()">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<p id="days"></p>-->



                       

                       <div class="input-box mt-3">
                            <div class="ui calendar">
                                <p>Guests</p>
                                
                                <div class="where-dest add-number-fields">
                                            
                                    <div class="down-content">
                                        <?php
                                        // Fetch ACF values for the post
                                        $children = get_field('children');
                                        $adults = get_field('adults');
                                        $infants = get_field('infants');
                                        $pets = get_field('pets');
                                        
                                        ?>
                                        <p id="summary">Adults 2, Childrens 1, Infant 2, Pets 1</p>

                                        <div class="custom-number">
                                           <div class="two-main-content">
                                            <div class="content">
                                                <h6>Adults</h6>
                                                <p>Ages 13 or above</p>
                                            </div>
                                           <div class="number">
                                                <span  onclick="updateAdults(event, -1,<?= $adults ?>)">-</span>
                                                <input type="text" name="adults" value="<?= max(0, min($adults, 0)) ?>" oninput="this.value = Math.max(0, Math.min(this.value, <?= $adults ?>))">
                                                <span  onclick="updateAdults(event, 1, <?= $adults ?>)">+</span>
                                            </div>
                                            
                                            </div>
                           
                                        <div class="two-main-content">
                                            <div class="content">
                                                <h6>Children</h6>
                                                <p>Ages 13 or below</p>
                                            </div>
                                            <div class="number">
                                                <span  onclick="updateAdults(event, -1,<?= $children ?>)">-</span>
                                                <input type="text" name="childrens" value="<?= max(0, min($children, 0)) ?>" oninput="this.value = Math.max(0, Math.min(this.value, <?= $children ?>))">
                                                <span  onclick="updateAdults(event, 1, <?= $children ?>)">+</span>
                                            </div>
                                        </div>
                                        
                                        <div class="two-main-content">
                                            <div class="content">
                                                <h6>Infants</h6>
                                                <p>Ages 13 or above</p>
                                            </div>
                                            <div class="number">
                                                <span  onclick="updateAdults(event, -1,<?= $infants ?>)">-</span>
                                                <input type="text" name="infants" value="<?= max(0, min($infants, 0)) ?>" oninput="this.value = Math.max(0, Math.min(this.value, <?= $infants ?>))">
                                                <span  onclick="updateAdults(event, 1, <?= $infants ?>)">+</span>
                                            </div>
                                        </div>
                                        
                                        <div class="two-main-content">
                                            <div class="content">
                                                <h6>Pets</h6>
                                                <p> Bringing a service animal? </p>
                                            </div>
                                            <div class="number">
                                                <span  onclick="updateAdults(event, -1,<?= $pets ?>)">-</span>
                                                <input type="text" name="pets" value="<?= max(0, min($pets, 0)) ?>" oninput="this.value = Math.max(0, Math.min(this.value, <?= $pets ?>))">
                                                <span  onclick="updateAdults(event, 1, <?= $pets ?>)">+</span>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="main-total-pricing">
                            <div class="content-01">
                                <div class="cal-total" style="display: none;">
                                    <h6>Total: <span><?php echo $price; ?> × <span id="days"></span></span>  </h6>
                                    
                                    
                                    <h6>Total Before Taxes: <span id="total"></span></h6>
                                </div>
                                <div class="nights" style="display: none;">
                                    <h6>Per <?php if($charge_type==='nightly') { echo 'Night'; } else { echo 'Hour'; } ?>:<span id="pernight"></span></h6>
                                    <h6>Total Price: <span id="price"></span></h6>
                                </div>
                                
                            </div>
                            <!--<div class="content-01">-->
                            <!--    <h6>$630</h6>-->
                            <!--    <a href="#">Price details</a>-->
                            <!--</div>-->
                        </div>
                        <input type="hidden" name="property_id" value="<?php echo esc_attr($property_id); ?>">
                        <div class="all-three-btns">
                            <button type="submit" class="submit-btn" name="booking_submit">Book Now</button>
                            <a href="#" class="t-btn-1"> <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.25961 9.02878V3.30289C9.25961 3.11083 9.32476 2.94983 9.45506 2.81991C9.58536 2.68997 9.74681 2.625 9.93941 2.625H14.6981C14.8907 2.625 15.0516 2.68997 15.181 2.81991C15.3103 2.94983 15.375 3.11083 15.375 3.30289V6.50477C15.375 6.69683 15.31 6.85783 15.1801 6.98777C15.0501 7.11769 14.8891 7.18266 14.6971 7.18266H11.1057L9.25961 9.02878ZM10.3846 6.05768H14.25V3.74998H10.3846V6.05768ZM14.5802 15.375C13.1668 15.375 11.7468 15.0464 10.3204 14.3891C8.89397 13.7319 7.58341 12.8048 6.38871 11.6077C5.19399 10.4105 4.26803 9.09998 3.61082 7.67595C2.95361 6.25191 2.625 4.83317 2.625 3.41972C2.625 3.19266 2.7 3.00344 2.85 2.85206C3 2.70069 3.1875 2.625 3.4125 2.625H5.85862C6.04805 2.625 6.21512 2.68678 6.35983 2.81034C6.50454 2.93391 6.59661 3.08655 6.63602 3.26828L7.06583 5.47498C7.09564 5.67979 7.08939 5.85576 7.04708 6.00287C7.00478 6.14998 6.92881 6.27354 6.81919 6.37354L5.08699 8.0596C5.36584 8.57017 5.68435 9.0531 6.04253 9.50839C6.4007 9.96369 6.78844 10.3986 7.20574 10.813C7.61729 11.2245 8.05479 11.6067 8.51826 11.9596C8.98172 12.3125 9.4822 12.6409 10.0197 12.9447L11.7029 11.2471C11.8202 11.125 11.9623 11.0394 12.1291 10.9904C12.2959 10.9414 12.4692 10.9293 12.649 10.9543L14.7317 11.3784C14.9211 11.4284 15.0757 11.525 15.1954 11.6683C15.3151 11.8115 15.375 11.974 15.375 12.1558V14.5875C15.375 14.8125 15.2993 15 15.1479 15.15C14.9965 15.3 14.8073 15.375 14.5802 15.375ZM4.55479 6.99519L5.89326 5.71442C5.91729 5.69518 5.93292 5.66874 5.94013 5.63509C5.94734 5.60143 5.94614 5.57018 5.93653 5.54134L5.61056 3.86537C5.60095 3.82691 5.58413 3.79806 5.56009 3.77884C5.53605 3.7596 5.5048 3.74998 5.46634 3.74998H3.86248C3.83364 3.74998 3.80961 3.7596 3.79037 3.77884C3.77113 3.79806 3.76151 3.8221 3.76151 3.85095C3.79998 4.36345 3.88387 4.88413 4.01319 5.41298C4.14253 5.94183 4.32306 6.46923 4.55479 6.99519ZM11.0798 13.4769C11.5769 13.7086 12.0954 13.8858 12.6353 14.0084C13.1752 14.131 13.6798 14.2038 14.149 14.2269C14.1779 14.2269 14.2019 14.2173 14.2211 14.1981C14.2404 14.1788 14.25 14.1548 14.25 14.1259V12.5481C14.25 12.5096 14.2404 12.4783 14.2211 12.4543C14.2019 12.4303 14.1731 12.4134 14.1346 12.4038L12.5596 12.0836C12.5308 12.074 12.5055 12.0728 12.4839 12.08C12.4622 12.0872 12.4394 12.1029 12.4154 12.1269L11.0798 13.4769Z" fill="#484848"></path>
                                </svg>
                                Contact Owner</a>
                            <a href="#" class="t-btn-1 t-btn-2"> <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.99998 13.2459L7.17211 12.5017C5.92885 11.3738 4.90072 10.4046 4.08774 9.59402C3.27476 8.78344 2.63054 8.06205 2.15506 7.42984C1.67957 6.79763 1.34736 6.22094 1.15842 5.69979C0.969475 5.17864 0.875 4.6498 0.875 4.11326C0.875 3.04885 1.23389 2.15775 1.95168 1.43996C2.66947 0.722176 3.56057 0.363281 4.62498 0.363281C5.27979 0.363281 5.89854 0.516413 6.48123 0.822676C7.06392 1.12893 7.57017 1.56811 7.99998 2.14022C8.42979 1.56811 8.93604 1.12893 9.51873 0.822676C10.1014 0.516413 10.7202 0.363281 11.375 0.363281C12.4394 0.363281 13.3305 0.722176 14.0483 1.43996C14.7661 2.15775 15.125 3.04885 15.125 4.11326C15.125 4.6498 15.0305 5.17864 14.8415 5.69979C14.6526 6.22094 14.3204 6.79763 13.8449 7.42984C13.3694 8.06205 12.7264 8.78344 11.9158 9.59402C11.1053 10.4046 10.0759 11.3738 8.82785 12.5017L7.99998 13.2459ZM7.99998 11.7258C9.19998 10.646 10.1875 9.72047 10.9625 8.94932C11.7375 8.17817 12.35 7.50822 12.8 6.93947C13.25 6.37072 13.5625 5.86567 13.7375 5.42432C13.9125 4.98297 14 4.54595 14 4.11326C14 3.36326 13.75 2.73826 13.25 2.23826C12.75 1.73826 12.125 1.48826 11.375 1.48826C10.7827 1.48826 10.2353 1.65629 9.73291 1.99236C9.23051 2.32841 8.83268 2.79596 8.5394 3.39501H7.46056C7.16249 2.79116 6.76345 2.3224 6.26345 1.98874C5.76345 1.65509 5.21729 1.48826 4.62498 1.48826C3.87979 1.48826 3.25599 1.73826 2.75358 2.23826C2.25118 2.73826 1.99998 3.36326 1.99998 4.11326C1.99998 4.54595 2.08748 4.98297 2.26248 5.42432C2.43748 5.86567 2.74998 6.37072 3.19998 6.93947C3.64998 7.50822 4.26248 8.17697 5.03748 8.94572C5.81248 9.71447 6.79998 10.6412 7.99998 11.7258Z" fill="#484848" />
                                </svg>Add to Favorites</a>
                        </div>

                        <div class="social-box">
                            <h6>Share with friends</h6>
                            <div class="social-links">
                                <ul>
                                    <li><a href="#"><svg width="17" height="20" viewBox="0 0 17 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.52397 18.5505C2.25713 17.8191 1.43613 16.7533 1.06095 15.3532C0.685765 13.953 0.863876 12.6195 1.59528 11.3527L6.99915 1.9929C7.52535 1.0815 8.30033 0.488644 9.32409 0.214341C10.3478 -0.0599707 11.3154 0.0659736 12.2268 0.592174C13.1382 1.11837 13.7311 1.89335 14.0054 2.91709C14.2797 3.94084 14.1538 4.90841 13.6276 5.81982L8.75254 14.2636C8.4187 14.8418 7.93687 15.2153 7.30706 15.384C6.67724 15.5527 6.07318 15.4702 5.49488 15.1363C4.91658 14.8024 4.5431 14.3206 4.37446 13.6909C4.20584 13.0612 4.28845 12.4572 4.62229 11.879L9.49731 3.43522L10.5298 4.03135L5.65483 12.4751C5.48593 12.7677 5.4433 13.0701 5.52695 13.3822C5.61059 13.6944 5.7987 13.935 6.09125 14.1039C6.38381 14.2728 6.68618 14.3154 6.99837 14.2318C7.31055 14.1481 7.55109 13.96 7.72 13.6674L12.595 5.22368C12.9639 4.58481 13.055 3.91744 12.8684 3.22158C12.6818 2.52569 12.269 1.99327 11.63 1.6243C10.9909 1.25534 10.3236 1.16418 9.62816 1.35081C8.93271 1.53744 8.40056 1.95019 8.03171 2.58905L2.62785 11.9488C2.06503 12.9236 1.92932 13.9548 2.22073 15.0424C2.51214 16.13 3.14526 16.9552 4.12011 17.518C5.09495 18.0808 6.12615 18.2165 7.21371 17.9251C8.30128 17.6337 9.12647 17.0006 9.68929 16.0257L15.0932 6.66598L16.1257 7.26213L10.7218 16.6219C9.99044 17.8887 8.92465 18.7097 7.52449 19.0849C6.12431 19.4601 4.7908 19.2819 3.52397 18.5505Z" fill="#484848" />
                                            </svg>
                                        </a></li>
                                    <li><a href="#"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.23896 16V8.70218H11.6875L12.0549 5.85725H9.23896V4.04118C9.23896 3.21776 9.46667 2.65661 10.6488 2.65661L12.154 2.65599V0.111384C11.8937 0.0775563 11.0002 0 9.96017 0C7.78849 0 6.30172 1.32557 6.30172 3.75942V5.85725H3.8457V8.70218H6.30172V16H9.23896Z" fill="#484848" />
                                            </svg>
                                        </a></li>
                                    <li><a href="#"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_273_11760)">
                                                    <path d="M11.9997 0H3.9999C1.80015 0 0 1.80015 0 3.9999V12.0001C0 14.1993 1.80015 16 3.9999 16H11.9997C14.1995 16 15.9996 14.1993 15.9996 12.0001V3.9999C15.9996 1.80015 14.1995 0 11.9997 0ZM14.6662 12.0001C14.6662 13.4701 13.4705 14.6666 11.9997 14.6666H3.9999C2.52974 14.6666 1.33337 13.4701 1.33337 12.0001V3.9999C1.33337 2.52955 2.52974 1.33337 3.9999 1.33337H11.9997C13.4705 1.33337 14.6662 2.52955 14.6662 3.9999V12.0001Z" fill="#484848" />
                                                    <path d="M12.334 4.66694C12.8862 4.66694 13.3339 4.21924 13.3339 3.66697C13.3339 3.1147 12.8862 2.66699 12.334 2.66699C11.7817 2.66699 11.334 3.1147 11.334 3.66697C11.334 4.21924 11.7817 4.66694 12.334 4.66694Z" fill="#484848" />
                                                    <path d="M7.9999 4C5.79035 4 4 5.79054 4 7.9999C4 10.2084 5.79035 12.0002 7.9999 12.0002C10.2088 12.0002 11.9998 10.2084 11.9998 7.9999C11.9998 5.79054 10.2088 4 7.9999 4ZM7.9999 10.6668C6.52732 10.6668 5.33337 9.47287 5.33337 7.9999C5.33337 6.52693 6.52732 5.33337 7.9999 5.33337C9.47248 5.33337 10.6664 6.52693 10.6664 7.9999C10.6664 9.47287 9.47248 10.6668 7.9999 10.6668Z" fill="#484848" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_273_11760">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a></li>
                                    <li><a href="#"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_273_11771)">
                                                    <path d="M15.9958 16.0005L15.9998 15.9998V10.1318C15.9998 7.26114 15.3818 5.0498 12.0258 5.0498C10.4125 5.0498 9.32985 5.93514 8.88785 6.77447H8.84118V5.3178H5.65918V15.9998H8.97251V10.7105C8.97251 9.31781 9.23651 7.97114 10.9612 7.97114C12.6605 7.97114 12.6858 9.56047 12.6858 10.7998V16.0005H15.9958Z" fill="#484848" />
                                                    <path d="M0.263672 5.31836H3.58101V16.0004H0.263672V5.31836Z" fill="#484848" />
                                                    <path d="M1.92133 0C0.860667 0 0 0.860667 0 1.92133C0 2.982 0.860667 3.86067 1.92133 3.86067C2.982 3.86067 3.84267 2.982 3.84267 1.92133C3.842 0.860667 2.98133 0 1.92133 0Z" fill="#484848" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_273_11771">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </a></li>
                                    <li><a href="#"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_273_11776)">
                                                    <path d="M9.4893 6.77491L15.3176 0H13.9365L8.87577 5.88256L4.8338 0H0.171875L6.28412 8.89547L0.171875 16H1.55307L6.8973 9.78782L11.1659 16H15.8278L9.48896 6.77491H9.4893ZM7.59756 8.97384L6.97826 8.08805L2.05073 1.03974H4.17217L8.14874 6.72795L8.76804 7.61374L13.9371 15.0075H11.8157L7.59756 8.97418V8.97384Z" fill="#484848" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_273_11776">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>

                                        </a></li>
                                </ul>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="row main-full-design" id="in-page-link-07">
            <div class="col-md-12">
                <div class="heading">
                    <h4>Reviews</h4>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="small-box">
                            <h6>Overall Rating</h6>
                        </div>
                        <div class="main-progress-bar">
                            <p>5</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="max-width: 90%">
                                </div>
                            </div>
                        </div>
                        <div class="main-progress-bar">
                            <p>4</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="max-width: 20%">
                                </div>
                            </div>
                        </div>
                        <div class="main-progress-bar">
                            <p>3</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="max-width: 0%">
                                </div>
                            </div>
                        </div>
                        <div class="main-progress-bar">
                            <p>2</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="max-width: 0%">
                                </div>
                            </div>
                        </div>
                        <div class="main-progress-bar">
                            <p>1</p>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="max-width: 0%">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="small-box">
                            <h6>Cleanliness</h6>
                        </div>
                        <div class="vertical-icon-box">
                            <p>4,8</p>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vertical-icon-01.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="small-box">
                            <h6>Accuracy</h6>
                        </div>
                        <div class="vertical-icon-box">
                            <p>5,0</p>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vertical-icon-02.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="small-box">
                            <h6>Check-in</h6>
                        </div>
                        <div class="vertical-icon-box">
                            <p>5,0</p>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vertical-icon-03.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="small-box">
                            <h6>Communication</h6>
                        </div>
                        <div class="vertical-icon-box">
                            <p>5,0</p>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vertical-icon-04.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="small-box">
                            <h6>Location</h6>
                        </div>
                        <div class="vertical-icon-box">
                            <p>5,0</p>
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vertical-icon-05.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="test-client-main-box">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gelu-img.png" alt="">
                        <div class="text">
                            <h6>Gelu</h6>
                            <p>Bucharest, Romania</p>
                        </div>
                    </div>
                    <div class="content-box">
                        <ul>
                            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-01.png" alt="">5,0</li>
                            <li>· 3 weeks ago</li>
                        </ul>
                        <p>A superb villa, properly equipped and very practical. Score 10/10.Perfect for larger groups and families with children...</p>
                        <a href="javascript:void(0)" class="show-link">Show More</a>
                    </div>
                </div>
                <div class="test-client-main-box">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gelu-img.png" alt="">
                        <div class="text">
                            <h6>Gelu</h6>
                            <p>Bucharest, Romania</p>
                        </div>
                    </div>
                    <div class="content-box">
                        <ul>
                            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-01.png" alt="">5,0</li>
                            <li>· 3 weeks ago</li>
                        </ul>
                        <p>A superb villa, properly equipped and very practical. Score 10/10.Perfect for larger groups and families with children...</p>
                        <a href="javascript:void(0)" class="show-link">Show More</a>
                    </div>
                </div>
                <div class="test-client-main-box">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gelu-img.png" alt="">
                        <div class="text">
                            <h6>Gelu</h6>
                            <p>Bucharest, Romania</p>
                        </div>
                    </div>
                    <div class="content-box">
                        <ul>
                            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-01.png" alt="">5,0</li>
                            <li>· 3 weeks ago</li>
                        </ul>
                        <p>A superb villa, properly equipped and very practical. Score 10/10.Perfect for larger groups and families with children...</p>
                        <a href="javascript:void(0)" class="show-link">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="test-client-main-box">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gelu-img.png" alt="">
                        <div class="text">
                            <h6>Gelu</h6>
                            <p>Bucharest, Romania</p>
                        </div>
                    </div>
                    <div class="content-box">
                        <ul>
                            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-01.png" alt="">5,0</li>
                            <li>· 3 weeks ago</li>
                        </ul>
                        <p>A superb villa, properly equipped and very practical. Score 10/10.Perfect for larger groups and families with children...</p>
                        <a href="javascript:void(0)" class="show-link">Show More</a>
                    </div>
                </div>
                <div class="test-client-main-box">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gelu-img.png" alt="">
                        <div class="text">
                            <h6>Gelu</h6>
                            <p>Bucharest, Romania</p>
                        </div>
                    </div>
                    <div class="content-box">
                        <ul>
                            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-01.png" alt="">5,0</li>
                            <li>· 3 weeks ago</li>
                        </ul>
                        <p>A superb villa, properly equipped and very practical. Score 10/10.Perfect for larger groups and families with children...</p>
                        <a href="javascript:void(0)" class="show-link">Show More</a>
                    </div>
                </div>
                <div class="test-client-main-box">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/gelu-img.png" alt="">
                        <div class="text">
                            <h6>Gelu</h6>
                            <p>Bucharest, Romania</p>
                        </div>
                    </div>
                    <div class="content-box">
                        <ul>
                            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/amazing-icon-01.png" alt="">5,0</li>
                            <li>· 3 weeks ago</li>
                        </ul>
                        <p>A superb villa, properly equipped and very practical. Score 10/10.Perfect for larger groups and families with children...</p>
                        <a href="javascript:void(0)" class="show-link">Show More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="read-all-btn-with-arrow test-btn">
                    <a href="#">Show all 41 Reviews </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="heading address-content" id="in-page-link-08">
                    <h4>Address</h4>
                    <ul>
                        <li><b>Address:</b> <?php echo get_field('address');?></li>
                        <li><b>Area:</b> <?php echo get_field('area');?></li>
                        <li><b>Country:</b> <?php echo get_field('country');?> </li>
                        <li><b>City:</b> <?php echo get_field('city');?></li>
                        <li><b>Zip:</b> <?php echo get_field('zip');?></li>
                    </ul>
                </div>
                <div class="heading full-width-map" id="in-page-link-09">
                    <h4>Where you’ll be</h4>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/full-width-map.png" alt="">
                </div>
                <div class="contact-owner-box">
                    <div class="img-box">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/contact-owner-img.png" alt="">
                        <div class="text">
                            <h6>Yuri R.</h6>
                            <p>See Profile</p>
                        </div>
                    </div>
                    <div class="buton-box">
                        <a href="#"> <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.25961 9.02878V3.30289C9.25961 3.11083 9.32476 2.94983 9.45506 2.81991C9.58536 2.68997 9.74681 2.625 9.93941 2.625H14.6981C14.8907 2.625 15.0516 2.68997 15.181 2.81991C15.3103 2.94983 15.375 3.11083 15.375 3.30289V6.50477C15.375 6.69683 15.31 6.85783 15.1801 6.98777C15.0501 7.11769 14.8891 7.18266 14.6971 7.18266H11.1057L9.25961 9.02878ZM10.3846 6.05768H14.25V3.74998H10.3846V6.05768ZM14.5802 15.375C13.1668 15.375 11.7468 15.0464 10.3204 14.3891C8.89397 13.7319 7.58341 12.8048 6.38871 11.6077C5.19399 10.4105 4.26803 9.09998 3.61082 7.67595C2.95361 6.25191 2.625 4.83317 2.625 3.41972C2.625 3.19266 2.7 3.00344 2.85 2.85206C3 2.70069 3.1875 2.625 3.4125 2.625H5.85862C6.04805 2.625 6.21512 2.68678 6.35983 2.81034C6.50454 2.93391 6.59661 3.08655 6.63602 3.26828L7.06583 5.47498C7.09564 5.67979 7.08939 5.85576 7.04708 6.00287C7.00478 6.14998 6.92881 6.27354 6.81919 6.37354L5.08699 8.0596C5.36584 8.57017 5.68435 9.0531 6.04253 9.50839C6.4007 9.96369 6.78844 10.3986 7.20574 10.813C7.61729 11.2245 8.05479 11.6067 8.51826 11.9596C8.98172 12.3125 9.4822 12.6409 10.0197 12.9447L11.7029 11.2471C11.8202 11.125 11.9623 11.0394 12.1291 10.9904C12.2959 10.9414 12.4692 10.9293 12.649 10.9543L14.7317 11.3784C14.9211 11.4284 15.0757 11.525 15.1954 11.6683C15.3151 11.8115 15.375 11.974 15.375 12.1558V14.5875C15.375 14.8125 15.2993 15 15.1479 15.15C14.9965 15.3 14.8073 15.375 14.5802 15.375ZM4.55479 6.99519L5.89326 5.71442C5.91729 5.69518 5.93292 5.66874 5.94013 5.63509C5.94734 5.60143 5.94614 5.57018 5.93653 5.54134L5.61056 3.86537C5.60095 3.82691 5.58413 3.79806 5.56009 3.77884C5.53605 3.7596 5.5048 3.74998 5.46634 3.74998H3.86248C3.83364 3.74998 3.80961 3.7596 3.79037 3.77884C3.77113 3.79806 3.76151 3.8221 3.76151 3.85095C3.79998 4.36345 3.88387 4.88413 4.01319 5.41298C4.14253 5.94183 4.32306 6.46923 4.55479 6.99519ZM11.0798 13.4769C11.5769 13.7086 12.0954 13.8858 12.6353 14.0084C13.1752 14.131 13.6798 14.2038 14.149 14.2269C14.1779 14.2269 14.2019 14.2173 14.2211 14.1981C14.2404 14.1788 14.25 14.1548 14.25 14.1259V12.5481C14.25 12.5096 14.2404 12.4783 14.2211 12.4543C14.2019 12.4303 14.1731 12.4134 14.1346 12.4038L12.5596 12.0836C12.5308 12.074 12.5055 12.0728 12.4839 12.08C12.4622 12.0872 12.4394 12.1029 12.4154 12.1269L11.0798 13.4769Z" fill="#484848" />
                            </svg>
                            Contact Owner</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-sec-06 blog-sec-05 main-post-imgbox property-page-sec-04">
    <div class="container">
        <div class="row">
            <div class="text">
                <h3>Similar Listings</h3>
            </div>
        </div>
        <div class="row">
    <?php
    $args = array(
        'post_type' => 'property',
        'posts_per_page' => 3,
        'orderby' => 'rand',
    );

    $index_query = new WP_Query($args);
    if ($index_query->have_posts()) :
        while ($index_query->have_posts()) : $index_query->the_post();
            $pro_gallery = get_field('property_gallery');
    ?>
            <div class="col-lg-4 col-md-4">
                <div class="home-sec-02">
                    <div class="icon-tabbing-main-box">
                        <div class="main-icon-img-box">
                            <div class="img-box">
                                <div class="img-box-content">
                                    <h6>Guest Favorite</h6>
                                    <a href="javascript:void(0)"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/like.png" alt=""></a>
                                </div>
                                <a href="<?php echo get_permalink();?>">
                                    <?php
                                    if (!empty($pro_gallery[0]['url'])) {
                                        echo '<img src="' . esc_url($pro_gallery[0]['url']) . '" class="w-100 hm_ani_img" alt="">';
                                    } else {
                                        echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/main-icon-img-01.png" class="w-100 hm_ani_img" alt="">';
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="title-content">
                                    <h5><a href="<?php echo get_permalink();?>"><?php the_title(); ?></a></h5>
                                    <p>
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.295 12.5L3.27 8.06316L0 5.07895L4.32 4.68421L6 0.5L7.68 4.68421L12 5.07895L8.73 8.06316L9.705 12.5L6 10.1474L2.295 12.5Z" fill="#484848"/>
                                        </svg>
                                        4.5
                                    </p>
                                </div>
                                <ul class="main-listing-cat">
                                    <?php if ($bedrooms = get_field('bedrooms')): ?>
                                        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bed.png" alt=""> <?php echo esc_html($bedrooms); ?> Bed</li>
                                    <?php endif; ?>

                                    <?php if ($bathrooms = get_field('bathrooms')): ?>
                                        <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bathroom.png" alt=""> <?php echo esc_html($bathrooms); ?> Bathroom</li>
                                    <?php endif; ?>
                                    <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/wifi.png" alt="">Wifi</li>
                                </ul>
                                <div class="price-box">
                                    <?php if ($prop_price = get_field('property_price')): ?>
                                        <h4>$<?php echo esc_html($prop_price); ?></h4><p>night</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; wp_reset_query(); ?>
</div>

        <!--<div class="row">-->
        <!--    <div class="col-md-12">-->
        <!--        <div class="read-all-btn-with-arrow">-->
        <!--            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Pagination.png" alt="">-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
</section>


<div class="modal fade" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>This is some placeholder content to show a vertically centered modal. We've added some extra copy here to show how vertically centering the modal works when combined with scrollable modals. We also use some repeated line breaks to quickly extend the height of the content, thereby triggering the scrolling. When content becomes longer than the predefined max-height of modal, content will be cropped and scrollable within the modal.</p>
        <br><br><br><br><br><br><br><br><br><br>
        <p>Just like that.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

                            


                        
                    
                 <script>
    function updateAdults(e, offset, maxValue) {
        let input = e.target.parentNode.querySelector('input');
        let currentValue = parseInt(input.value);
        if (isNaN(currentValue)) {
            currentValue = 0; // Set current value to 0 if NaN
        }
        if (offset > 0 && (isNaN(maxValue) || currentValue >= maxValue || maxValue === 0)) {
            return; // Don't increment if already at max value or max value is not defined
        }
        input.value = Math.max(0, Math.min(currentValue + offset, maxValue));
        updateSummary();
    }
    
    let adults, children, infants, pets;

    function updateSummary() {
        adults = parseInt(document.getElementsByName('adults')[0].value) || 0;
        children = parseInt(document.getElementsByName('childrens')[0].value) || 0;
        infants = parseInt(document.getElementsByName('infants')[0].value) || 0;
        pets = parseInt(document.getElementsByName('pets')[0].value) || 0;
        
        // console.log("Adults: ",adults,"Children: ",children,"Infants: ",infants,"Pets: ",pets);

        let summary = `<p>Adults ${adults}, Childrens ${children}, Infant ${infants}, Pets ${pets}</p>`;
        document.getElementById('summary').innerHTML = summary;

        // Get the maximum values from ACF fields
        let adultsMax = parseInt("<?php echo $adultsMax; ?>") || 0;
        let childrenMax = parseInt("<?php echo $childrenMax; ?>") || 0;
        let infantsMax = parseInt("<?php echo $infantsMax; ?>") || 0;
        let petsMax = parseInt("<?php echo $petsMax; ?>") || 0;

        // Disable plus icons if corresponding ACF fields are empty or if ACF field value is not numeric
        let adultsSpan = document.querySelector('.number.adults span:last-child');
        if (adultsSpan) {
            adultsSpan.style.display = (isNaN(adultsMax) || adults >= adultsMax || adultsMax === 0) ? 'none' : 'inline';
        }

        let childrenSpan = document.querySelector('.number.childrens span:last-child');
        if (childrenSpan) {
            childrenSpan.style.display = (isNaN(childrenMax) || children >= childrenMax || childrenMax === 0) ? 'none' : 'inline';
        }

        let infantsSpan = document.querySelector('.number.infants span:last-child');
        if (infantsSpan) {
            infantsSpan.style.display = (isNaN(infantsMax) || infants >= infantsMax || infantsMax === 0) ? 'none' : 'inline';
        }

        let petsSpan = document.querySelector('.number.pets span:last-child');
        if (petsSpan) {
            petsSpan.style.display = (isNaN(petsMax) || pets >= petsMax || petsMax === 0) ? 'none' : 'inline';
        }
    }

    // Call updateSummary initially to set the initial values
    updateSummary();
</script>


<script>
    function getDays() {
        // console.log('St:',start);
        var start_date = document.getElementsByName('start_date')[0].value;
        var end_date = document.getElementsByName('end_date')[0].value;
        var daysResult = document.getElementById('days');
        var price = <?php echo $price; ?>; // Price value
        
        // Check if both start_date and end_date are not empty
        if (start_date && end_date) {
            var ajax = new XMLHttpRequest();
            var url = '<?php echo admin_url('admin-ajax.php'); ?>';
            var params = 'action=calculate_days&start_date=' + start_date + '&end_date=' + end_date;
            ajax.open('POST', url, true);
            ajax.onreadystatechange = function() {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    var response = JSON.parse(ajax.responseText);
                    if (response.success) {
                        daysResult.innerHTML = response.data;
                        var totalDays = parseInt(response.data);
                        var total = totalDays * price;
                        document.getElementById('total').innerHTML = total.toFixed(2); // Displaying total with 2 decimal places
                        document.querySelector('.cal-total').style.display = 'block'; // Show the cal-total div
                    } else {
                        daysResult.innerHTML = response.data;
                        document.getElementById('total').innerHTML = ''; // Clear total if there's an error
                        document.querySelector('.cal-total').style.display = 'none'; // Hide the cal-total div
                    }
                }
            };
            ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            ajax.send(params);
        } else {
            // Clear the days result and total if either start_date or end_date is empty
            daysResult.innerHTML = '';
            document.getElementById('total').innerHTML = '';
            document.querySelector('.cal-total').style.display = 'none'; // Hide the cal-total div
        }
    }
</script>

<script>
// START-Form Submission
    const charge_type_submit = "<?php echo $charge_type; ?>";
        console.log("Charge Type Submit: ", charge_type_submit);
        document.getElementById('booking-form').addEventListener('submit', function(event) {
        event.preventDefault();
        // Target URL (modify as needed)
        var targetUrl = '<?php echo site_url("request_to_book") ?>';
        if(charge_type_submit==='nightly') {
            var start_date = picker.getStartDate();
            var end_date = picker.getEndDate();

            if(start_date && end_date) {
            start_date = start_date.toLocaleDateString('en-CA');
            end_date = end_date.toLocaleDateString('en-CA');
            // Build URL with parameters
            var urlWithParams = targetUrl + '?property_id=' + encodeURIComponent(<?php echo $property_id; ?>) + '&start_date=' + encodeURIComponent(start_date) + '&end_date=' + encodeURIComponent(end_date) + '&adults=' + encodeURIComponent(adults) + '&childrens=' + encodeURIComponent(children) + '&infants=' + encodeURIComponent(infants) + '&pets=' + encodeURIComponent(pets);
            // console.log("Start: ", start_date, "End: ", end_date);
            // Redirect to the target page with URL parameters
            window.location.href = urlWithParams;
            } else {
                Swal.fire({
                  toast: true,
                  position: "bottom-end",
                  icon: "error",
                  title: "Select date",
                  showConfirmButton: false,
                  timer: 1500,
                  timerProgressBar: true,
                });
            }
        } else {
            var HPdate = hourly_picker.getDate();
            var start_time = document.getElementById('start-time').value;
            var end_time = document.getElementById('end-time').value;
            
            if(HPdate) {
            HPdate = HPdate.toLocaleDateString('en-CA');
            var urlWithParams = targetUrl + '?property_id=' + encodeURIComponent(<?php echo $property_id; ?>) + '&date=' + encodeURIComponent(HPdate) + '&start_time=' + encodeURIComponent(start_time) + '&end_time=' + encodeURIComponent(end_time) + '&adults=' + encodeURIComponent(adults) + '&childrens=' + encodeURIComponent(children) + '&infants=' + encodeURIComponent(infants) + '&pets=' + encodeURIComponent(pets);
            window.location.href = urlWithParams;
            } else {
                Swal.fire({
                  toast: true,
                  position: "bottom-end",
                  icon: "error",
                  title: "Select date",
                  showConfirmButton: false,
                  timer: 1500,
                  timerProgressBar: true,
                });
            }
        }
    });
// END-Form Submission
</script>

<?php
get_footer();
?>

<script>
jQuery(document).ready(function($) {
    $('#add-to-wishlist-single').on('click', function(e) {
        e.preventDefault();
        var $element = $(this);
        var property_id = $element.data('id');
        if($element.hasClass('favourite')) {
            $.ajax({
                url: "<?php echo admin_url( 'admin-ajax.php' ) ?>",
                type: 'POST',
                data: {
                    action: 'remove_from_wishlist',
                    property_id: property_id,
                },
                success: function(response) {
                    if (response.success) {
                        if(response.data === 'removed') {
                            $element.removeClass('favourite');
                        }
                        console.log(response);
                    } else {
                        console.error(response);
                    }
                }
            });
        } else {
            $('#addWishlist').attr('data-property-id', property_id)
            populateWishlistCategories();
        }

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
                        $('#add-to-wishlist-single[data-id="' + property_id + '"]').addClass('favourite heart-throb');
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
    
});
</script>