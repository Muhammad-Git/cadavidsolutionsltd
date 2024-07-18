jQuery(document).ready(function($) {
    
    $('#signUp').submit(function(e) {
        e.preventDefault();
        jQuery('.overlay_loader').show();
        
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData + '&action=custom_register_user',
            // success: function(response) {
            //     $('#signup-message').html('<div class="alert alert-success mt-3 text-center"  role="alert">'+response.data+'</div>');
            //     jQuery('.overlay_loader').hide();
            //     $('#signUp').trigger("reset");
            // },
            success: function(response) {
                console.log(response);
                $('#lb_signup-message').html('<div class="alert alert-success mt-3 text-center"  role="alert">'+response.registration_text+'</div>');
                jQuery('.overlay_loader').hide();
                $('#signUp').trigger("reset");
                window.location.href = response.verification_url;
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    
    
    $('#forgot-password-form').submit(function(e) {
        e.preventDefault(); 
        jQuery('.overlay_loader').show();

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData + '&action=forgot_password',
            success: function(response) {
                
                    $('#forgot-password-message').html('<div class="alert alert-success mt-3 text-center"  role="alert">'+response+'</div>');
                    
                    jQuery('.overlay_loader').hide();
                    $('#forgot-password-form').trigger("reset");
                
            }
        });
    });
    
    
    $('#reset-password-form').submit(function(e) {
        e.preventDefault();
        jQuery('.overlay_loader').show();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData + '&action=reset_password',
            success: function(response) {
                let data = JSON.parse(response);
                if(data.status == 'success'){
                    $('#reset-password-form').trigger("reset");
                    $('#reset-password-message').html('<div class="alert alert-success mt-3 text-center"  role="alert">'+data.msg+'</div>');
                    setTimeout(function(){
                        $('#staticBackdrop').modal('show');
                    }, 1000);
                }
                else{
                $('#reset-password-message').html('<div class="alert alert-danger mt-3 text-center"  role="alert">'+data.msg+'</div>');
                }
                jQuery('.overlay_loader').hide();
                
            }
        });
    });
    
    
    
    // scroll
    $('.scrollable-container').on('scroll', function() {
      $('#scrollLeftBtn').toggle(this.scrollLeft > 0);
      $('#scrollRightBtn').toggle(this.scrollWidth - this.scrollLeft !== $(this).outerWidth());
    });
    $('#scrollLeftBtn').click(function() {
      $('.scrollable-container').animate({scrollLeft: '-=200'}, 200);
    });

    $('#scrollRightBtn').click(function() {
      $('.scrollable-container').animate({scrollLeft: '+=200'}, 200);
    });
    // scroll
    
    // get property count
    $('#property_filter_form').on('change', 'input, select', function() {

        var formData = $('#property_filter_form').serialize();
        $.ajax({
            url: ajax_object.ajax_url, 
            type: 'POST',
            data: {
                action: 'property_filter',
                formData: formData
            },
            success: function(response) {
                $('.hm_fillter_btn').text('Show '+response+' Places');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    
    // get property count


    
});



document.addEventListener("DOMContentLoaded", function() {
    var copyLinkBtns = document.querySelectorAll(".copy-link-btn");
    copyLinkBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            var linkToCopy = this.getAttribute("data-link");
            navigator.clipboard.writeText(linkToCopy).then(function() {
                alert("Link copied to clipboard!");
            }, function() {
                console.error("Failed to copy link to clipboard.");
            });
        });
    });
});


jQuery(document).on('change', '#deleteYourAccount #country', function(){
    let country = jQuery(this).val();
    if(country == 'US'){
        jQuery('.for_unired_states').removeClass('d-none');
        jQuery('.for_unired_states .state').attr('name', 'state');
    }
    else{
        jQuery('.for_unired_states').addClass('d-none');
        jQuery('.for_unired_states .state').removeAttr('name', 'state');
    }
});


function validateForm() {

    // Example validation: Checking if the country and reason fields are selected
    var country = document.getElementById("country").value;
    var sl_format = document.getElementById("sl_format").value;
    // var reason = document.getElementById("why-are").value;


    if (country == "") {
        alert("Please select your country for deleting your account.");
        return false;
    }
    if (sl_format == "") {
        alert("Please select your format for deleting your account.");
        return false;
    }
    jQuery('#staticBackdrop8').modal('show');
    
    return false;
}

function submitModalForm() {
    
    jQuery('.overlay_loader').show();
    
    var formData = $('#deleteYourAccount').serialize();

    formData += '&action=handle_delete_account_ajax&nonce=' + ajax_object.nonce;

    $.ajax({
        type: 'POST',
        url: ajax_object.ajax_url,
        data: formData,
        // beforeSend: function(xhr) {
        //     xhr.setRequestHeader('X-WP-Nonce', ajax_object.nonce);
        // },
        success: function(response) {
            console.log(response.data);
            if(response.success){
                $('#staticBackdrop8').modal('hide');
                $('#staticBackdrop9').modal('show');
            }
            jQuery('.overlay_loader').hide();
            $('#deleteYourAccount').trigger("reset");
            
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
            alert('An error occurred. Please try again later.');
            jQuery('.overlay_loader').hide();
        }
    });
}



// home page amenity

jQuery(document).on('click', '.amenity_link', function(){
    var amenity_slug = jQuery(this).data('slug');
    var amenity_count = (jQuery(this).data('count')) ? jQuery(this).data('count') : '1' ;
    if(jQuery(this).hasClass('t-btn')){
        jQuery(this).remove();
        jQuery('#amenity_response').append('<div class="overlay_loader"><div class="rz-preloader"><i class="fas fa-sync"></i></div></div>');
    }
    else{
        jQuery('#amenity_response').html('<div class="overlay_loader"><div class="rz-preloader"><i class="fas fa-sync"></i></div></div>');
    }
    jQuery.ajax({
        url: ajax_object.ajax_url,
        type: 'POST',
        data: {
            action: 'get_properties_by_amenity',
            amenity_slug: (amenity_slug == 'all') ? 'all' : amenity_slug,
            amenity_count: amenity_count
        },
        success: function(response) {

            //console.log(response);
            var id = '';
            var title = '';
            var content = '';
            var img = '';
            var bed = '';
            var bath = '';
            var hourly = '';
            var permalink = '';
            var site_url = '';
            var propertyHTML = '';
            // var current_amenity = '';
            // var current_amenity_count = '';

            
            if(response.no_data){
                if(amenity_count == 1){
                    jQuery(this).remove();
                    propertyHTML = '<p class="text-center fs-3 mt-3">No properties found for this amenity.</p>';
                }
                else{
                    propertyHTML = '<p class="text-center fs-3 mt-3">No more properties found.</p>';
                }
                
            }
            else {
            // current_amenity = response.current_amenity;
            // current_amenity_count = response.current_amenity_count;
            
            response.forEach(function(property) {
            id = property.id;
            title = property.title;
            content = property.content;
            img = property.image;
            bed = property.bedrooms;
            bath = property.bathrooms;
            hourly = property.hourly_price;
            charge_type = property.charge_type;
            permalink = property.permalink;
            site_url = property.site_url;
            // current_amenitys = property.current_amenity;
            // current_amenity_counts = property.current_amenity_count;
            
            if(hourly){
                if(charge_type == 'nightly'){
                    charge_type = '/ night';
                }
                else{
                    charge_type = '/ hourly';
                }
            }
            else{
                charge_type = '';
            }
            
                
               propertyHTML += `<div class="main-icon-img-box">
                        <div class="img-box">
                            <div class="img-box-content">
                                <h6>Guest Favorite</h6>
                                    <div id="add-to-wishlist" data-id="<?php echo $pro_id; ?>" class="<?php echo $is_favorite ? 'favourite' : ''; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="heart">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </div>
                            </div>
                            <a href="${permalink}">
                                <img src="${img}" class="w-100 hm_ani_img" alt="">
                            </a>
                        </div>
                        <div class="content-box">
                            <div class="title-content">
                                <h5> <a href="${permalink}">${title}</a> </h5>
                                <p> <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.295 12.5L3.27 8.06316L0 5.07895L4.32 4.68421L6 0.5L7.68 4.68421L12 5.07895L8.73 8.06316L9.705 12.5L6 10.1474L2.295 12.5Z" fill="#484848"></path>
</svg>
 4,5</p>
                            </div>
                            <p>${content}</p>
                            <ul class="main-listing-cat">
                                <li> <img src="${site_url}/wp-content/themes/luckybackyard/assets/images/bed.png" alt=""> ${bed} Bed</li>
                                <li> <img src="${site_url}/wp-content/themes/luckybackyard/assets/images/bathroom.png" alt=""> ${bath} Bathroom</li>
                                <li> <img src="${site_url}/wp-content/themes/luckybackyard/assets/images/wifi.png" alt="">Wifi</li>
                            </ul>
                            <div class="price-box">
                                <h4>${hourly}</h4>
                                <p>${charge_type}</p>
                            </div>
                        </div>
                    </div>`;
                    
                    
                    //console.log(hourly);
                
                
                
                //var propertyHTML = '<div class="property">';
                //propertyHTML += '<h2>' + property.title + '</h2>';
                //propertyHTML += '<div class="content">' + property.content + '</div>';
                // Add more fields as needed
                //propertyHTML += '</div>';
                
            });
            
            propertyHTML += `<div class="btn-box">
                                <a href="javascript:;" class="t-btn t-btn-b amenity_link" data-slug="${amenity_slug}" data-count="${parseInt(amenity_count)+1}">Show More</a>
                            </div>`;
            }
            
            jQuery('#amenity_response').append(propertyHTML);
            jQuery('#amenity_response .overlay_loader').remove();
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error(error);
        }
    });
});




// Updating Select Dates Modal Start

function formatDate(dateStr) {
    const date = new Date(dateStr);
    return new Intl.DateTimeFormat('en-US', { year: 'numeric', month: 'long', day: '2-digit' }).format(date);
}

function convertMinutesToTime(minutes) {
    // Calculate hours and minutes
    let hours = Math.floor(minutes / 60);
    let mins = minutes % 60;

    // Determine AM or PM suffix
    let suffix = hours >= 12 ? 'PM' : 'AM';
    
    // Convert 24-hour format to 12-hour format
    hours = hours % 12;
    hours = hours ? hours : 12; // if hours is 0, set it to 12
    
    // Format hours and minutes with leading zeros if needed
    let formattedTime = `${String(hours).padStart(2, '0')}:${String(mins).padStart(2, '0')} ${suffix}`;

    return formattedTime;
}

function setTimeInSelect(startTime, endTime) {
    document.getElementById('start-time').value = startTime;
    document.getElementById('end-time').value = endTime;
}

var charge_type = null;
if(typeof myScriptData !== 'undefined' && (myScriptData.charge_type)) {
    charge_type = myScriptData.charge_type;
    console.log(charge_type);
}

jQuery(document).on('show.bs.modal', '#staticBackdrop15', function(event){
    const button = event.relatedTarget
    if(charge_type==='nightly') {
        const start_date = button.getAttribute('data-start_date');
        const end_date = button.getAttribute('data-end_date');
        const formattedStartDate = formatDate(start_date);
        const formattedEndDate = formatDate(end_date);
        picker.setDateRange(formattedStartDate, formattedEndDate);
        // jQuery('#rangestart input').val(start_date);
        // jQuery('#rangeend input').val(end_date);
    } else {
        const date = button.getAttribute('data-date');
        const formattedDate = formatDate(date);
        hourly_picker.setDate(formattedDate);
        const start_time = button.getAttribute('data-start-time');
        const end_time = button.getAttribute('data-end-time');
        setTimeInSelect(start_time, end_time);
        const formatted_start_time = convertMinutesToTime(start_time);
        const formatted_end_time = convertMinutesToTime(end_time);
        // console.log("Date: ", date, "Formatted Date: ", formattedDate, "Start Time: ", start_time, "End Time: ", end_time, "Formatted: ", formatted_start_time, " - ", formatted_end_time);
    }
});

// Updating Select Dates Modal End



// Updating Select Dates Fields in the URL Start

 // Wait for the DOM content to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Add event listener to the modal when it is hidden
        document.getElementById('staticBackdrop15').addEventListener('hidden.bs.modal', function (event) {
            // Get the updated start and end dates from the modal inputs
            // var startDate = document.querySelector('#rangestart input[name="start_date"]').value;
            // var endDate = document.querySelector('#rangeend input[name="end_date"]').value;
            // console.log("Charge Type: hidden", charge_type);
            if(charge_type==='nightly') {
            var startDate = picker.getStartDate();
            var endDate = picker.getEndDate();
            startDate = startDate.toLocaleDateString('en-CA');
            endDate = endDate.toLocaleDateString('en-CA');
            // Update the fields in the main page with the updated dates
            document.querySelector('.box p').innerHTML = "<b>Date:</b> " + startDate + " - " + endDate;
            
            // Update the URL parameters
            var url = window.location.href;
            var newUrl = updateQueryStringParameter(url, 'start_date', startDate);
            newUrl = updateQueryStringParameter(newUrl, 'end_date', endDate);
            window.history.replaceState({}, '', newUrl);
            } else {
            var date = hourly_picker.getDate();
            date = date.toLocaleDateString('en-CA');
            var start_time = document.getElementById('start-time').value;
            var end_time = document.getElementById('end-time').value;
            const formatted_start_time = convertMinutesToTime(start_time);
            const formatted_end_time = convertMinutesToTime(end_time);
            document.querySelector('.box p').innerHTML = "<b>Date:</b> " + date + " <b>Time:</b> " + formatted_start_time + " - " + formatted_end_time;
            var url = window.location.href;
            var newUrl = updateQueryStringParameter(url, 'date', date);
            newUrl = updateQueryStringParameter(newUrl, 'start_time', start_time);
            newUrl = updateQueryStringParameter(newUrl, 'end_time', end_time);
            window.history.replaceState({}, '', newUrl);
            }

        });

        // Add event listener to the Save button in the modal
        document.getElementById('saveButton').addEventListener('click', function (event) {
            // Trigger the hidden.bs.modal event to update the fields and URL
            document.getElementById('staticBackdrop15').dispatchEvent(new Event('hidden.bs.modal'));

            // Reload the page
            location.reload();
        });
    });

    // Function to update a query string parameter in a URL
    function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
        }
        else {
            return uri + separator + key + "=" + value;
        }
    }
    
// Updating Select Dates Fields in the URL End



// Updating Guests Modal Start

jQuery(document).on('show.bs.modal', '#staticBackdrop14', function(event){
    const button = event.relatedTarget;
    const adults = parseInt(button.getAttribute('data-adults'));
    const childrens = parseInt(button.getAttribute('data-childrens'));
    const infants = parseInt(button.getAttribute('data-infants'));
    const pets = parseInt(button.getAttribute('data-pets'));
    
    // Populate the values in the modal inputs
    jQuery('#staticBackdrop14 .two-main-content:nth-child(1) input').val(adults);
    jQuery('#staticBackdrop14 .two-main-content:nth-child(2) input').val(childrens);
    jQuery('#staticBackdrop14 .two-main-content:nth-child(3) input').val(infants);
    jQuery('#staticBackdrop14 .two-main-content:nth-child(4) input').val(pets);
});

// Updating Guests Modal Start



// Updating Guests Modal Fields in URL Parameters Start

document.addEventListener("DOMContentLoaded", function() {
    // Event listener for the Save button in the modal
    document.getElementById('guestmodal').addEventListener('click', function() {
        // Fetch the updated values from the modal inputs
        var adults = document.querySelector('input[name="adults"]').value;
        var childrens = document.querySelector('input[name="childrens"]').value;
        var infants = document.querySelector('input[name="infants"]').value;
        var pets = document.querySelector('input[name="pets"]').value;

        // Update the display with the new values (you might want to adjust this based on your HTML structure)
        var displayContent = '<b>Guests:</b> ' + adults + ' Adults, ' + childrens + ' Children, ' + infants + ' Infants, ' + pets + ' Pets';
        document.querySelector('.tow-content p').innerHTML = displayContent;

        // Update the URL parameters
        var urlParams = new URLSearchParams(window.location.search);
        urlParams.set('adults', adults);
        urlParams.set('childrens', childrens);
        urlParams.set('infants', infants);
        urlParams.set('pets', pets);
        var newUrl = window.location.pathname + '?' + urlParams.toString();

        // Redirect to the new URL
        window.location.href = newUrl;
    });
});

// Updating Guests Modal Fields in URL Parameters End


