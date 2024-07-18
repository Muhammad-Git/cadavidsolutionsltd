jQuery(document).ready(function($) {
    
    $('#signUp').submit(function(e) {
        e.preventDefault();
        jQuery('.overlay_loader').show();
        
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: ajax_object.ajax_url,
            data: formData + '&action=custom_register_user',
            success: function(response) {
                $('#signup-message').html('<div class="alert alert-success mt-3 text-center"  role="alert">'+response.data+'</div>');
                jQuery('.overlay_loader').hide();
                $('#signUp').trigger("reset");
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



