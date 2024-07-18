var myInput = jQuery('#password');
var myIcon = jQuery('#icon');
myInput.focus(function() {
    myIcon.css('right', '3px');
});
myInput.blur(function() {
    myIcon.css('right', '14px');
});
myIcon.click(function() {
    if (myIcon.hasClass('fa-eye')) {
        myIcon.toggleClass('fa-eye-slash fa-eye');
        myInput.attr('type', 'text');
    } else {
        myInput.attr('type', 'password');
        myIcon.toggleClass('fa-eye-slash fa-eye');
    }
});


var myInput = jQuery('#password1');
var myIcon = jQuery('#icon1');
myInput.focus(function() {
    myIcon.css('right', '3px');
});
myInput.blur(function() {
    myIcon.css('right', '14px');
});
myIcon.click(function() {
    if (myIcon.hasClass('fa-eye')) {
        myIcon.toggleClass('fa-eye-slash fa-eye');
        myInput.attr('type', 'text');
    } else {
        myInput.attr('type', 'password');
        myIcon.toggleClass('fa-eye-slash fa-eye');
    }
});


jQuery(document).ready(function(){
    jQuery(".delete").click(function(){
      jQuery(this).parent(".parent").remove();
    });
  });
// form-js
// jQuery(document).ready(function () {
//   jQuery("#myForm input").on("keyup", function () {
//     checkForm();
//   });

//   jQuery("#myCheckbox").on("change", function () {
//     checkForm();
//   });

//   function checkForm() {
//     var username = jQuery("#username").val().trim();
//     var email = jQuery("#email").val().trim();
//     var phoneNumber = jQuery("#phoneNumber").val().trim();
//     var checkbox = jQuery("#myCheckbox").is(":checked");

//     if (username !== "" && email !== "" && phoneNumber !== "" && checkbox) {
//       jQuery("#submitButton").prop("disabled", false);
//     } else {
//       jQuery("#submitButton").prop("disabled", true);
//     }
//   }
// });

jQuery(document).on('ready', function () {



  

    wow = new WOW(
        {
            animateClass: 'animated',
            offset: 100,
            callback: function (box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        }
    );

    wow.init();

});


// blogslider start
jQuery(".suggestions-slider").slick({
    dots: false,
    arrows: true,
    autoplay: false,
    infinite: true,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    speed: 300,
    centerMode: true,
    centerPadding: '50px', 
    slidesToShow: 7,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
            },
        },
    ],
});


jQuery(".blog-slider").slick({
    dots: false,
    arrows: true,
    autoplay: false,
    infinite: true,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
            },
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            },
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
            },
        },
    ],
});


jQuery(".post-singal-slider").slick({
    dots: true,
    arrows: true,
    autoplay: false,
    infinite: true,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
});

// Fancybox Config
jQuery('[data-fancybox="gallery"]').fancybox({
    buttons: [
      "slideShow",
      "thumbs",
      "zoom",
      "fullScreen",
      "share",
      "close"
    ],
    loop: true,
    protect: true
  });
  





let count = document.querySelectorAll(".count")
let arr = Array.from(count)



arr.map(function(item){
  let startnumber = 0

  function counterup(){
  startnumber++
  item.innerHTML= startnumber
   
  if(startnumber == item.dataset.number){
      clearInterval(stop)
  }
}

let stop =setInterval(function(){
  counterup()
},50)

})



//     jQuery('#example1').calendar();
// jQuery('#example2').calendar({
//   type: 'date'
// });
// jQuery('#example3').calendar({
//   type: 'time'
// });
// jQuery('#rangestart').calendar({
//   type: 'date',
//   endCalendar: jQuery('#rangeend')
// });
// jQuery('#rangeend').calendar({
//   type: 'date',
//   startCalendar: jQuery('#rangestart')
// });
// jQuery('#example4').calendar({
//   startMode: 'year'
// });
// jQuery('#example5').calendar();
// jQuery('#example6').calendar({
//   ampm: false,
//   type: 'time'
// });
// jQuery('#example7').calendar({
//   type: 'month'
// });
// jQuery('#example8').calendar({
//   type: 'year'
// });
// jQuery('#example9').calendar();
// jQuery('#example10').calendar({
//   on: 'hover'
// });
// var today = new Date();
// jQuery('#example11').calendar({
//   minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() - 5),
//   maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 5)
// });
// jQuery('#example12').calendar({
//   monthFirst: false
// });
// jQuery('#example13').calendar({
//   monthFirst: false,
//   formatter: {
//     date: function (date, settings) {
//       if (!date) return '';
//       var day = date.getDate();
//       var month = date.getMonth() + 1;
//       var year = date.getFullYear();
//       return day + '/' + month + '/' + year;
//     }
//   }
// });
// jQuery('#example14').calendar({
//   inline: true
// });
// jQuery('#example15').calendar();


jQuery('#select_date').calendar({
  type: 'date'
});
jQuery('#start_with').calendar({
  type: 'time'
});
jQuery('#end_with').calendar({
  type: 'time'
});
jQuery('#rangestart').calendar({
    type: 'date',
    endCalendar: jQuery('#rangeend')
  });
  jQuery('#rangeend').calendar({
    type: 'date',
    startCalendar: jQuery('#rangestart')
  });


var $range = jQuery(".js-range-slider"),
    $from = jQuery(".from"),
    $to = jQuery(".to"),
    range,
    min = parseInt($range.data('min')),  // Parse as integer
    max = parseInt($range.data('max')),  // Parse as integer
    from,
    to;

var updateValues = function () {
    $from.val(from);  // Use .val() instead of .prop("value", ...)
    $to.val(to);      // Use .val() instead of .prop("value", ...)
};

$range.ionRangeSlider({
    onChange: function (data) {
        from = data.from;
        to = data.to;
        updateValues();
    }
});

range = $range.data("ionRangeSlider");
var updateRange = function () {
    range.update({
        from: from,
        to: to
    });
};

$from.on("input", function () {
    from = +jQuery(this).val();  // Use .val() instead of .prop("value", ...) and parse as a number
    if (from < min) {
        from = min;
    }
    if (from > to) {
        from = to;
    }
    updateValues();
    updateRange();
});

$to.on("input", function () {
    to = +jQuery(this).val();  // Use .val() instead of .prop("value", ...) and parse as a number
    if (to > max) {
        to = max;
    }
    if (to < from) {
        to = from;
    }
    updateValues();
    updateRange();
});


jQuery(document).ready(function() {
    // Call the function initially on document ready
    updateButtonOpacities(jQuery('.number input'));

    jQuery('.minus').click(function () {
        var $input = jQuery(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 0 ? 0 : count;
        $input.val(count);
        $input.change();
        updateButtonOpacities($input);
        return false;
    });

    jQuery('.plus').click(function () {
        var $input = jQuery(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        updateButtonOpacities($input);
        return false;
    });

    // Function to update button opacities based on input value
    function updateButtonOpacities($input) {
        var count = parseInt($input.val());
        var $minusButton = $input.siblings('.minus');
        var $plusButton = $input.siblings('.plus');

        // Set opacity for minus button
        $minusButton.css('opacity', count === 0 ? 0.5 : 1);

        // Set opacity for plus button
        $plusButton.css('opacity', 1);
    }
});


jQuery(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    var current = 1;
    var steps = jQuery("fieldset").length;
    
    setProgressBar(current);
    
    jQuery(".next").click(function(){
    
    current_fs = jQuery(this).parent();
    next_fs = jQuery(this).parent().next();
    
    //Add Class Active
    jQuery("#progressbar li").eq(jQuery("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    next_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(++current);
    });
    
    jQuery(".previous").click(function(){
    
    current_fs = jQuery(this).parent();
    previous_fs = jQuery(this).parent().prev();
    
    //Remove class active
    jQuery("#progressbar li").eq(jQuery("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show();
    
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;
    
    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    previous_fs.css({'opacity': opacity});
    },
    duration: 500
    });
    setProgressBar(--current);
    });
    
    function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    jQuery(".progress-bar")
    .css("width",percent+"%")
    }
    
    jQuery(".submit").click(function(){
    return false;
    })
    
    });


    function myFunction() {
        var dropdown = document.getElementById("myDropdown");
        var arrowIcon = document.getElementById("arrow-icon");
      
        dropdown.classList.toggle("show");
      
        // Toggle the arrow icon direction
        if (dropdown.classList.contains("show")) {
          arrowIcon.classList.remove("fa-angle-down");
          arrowIcon.classList.add("fa-angle-up");
        } else {
          arrowIcon.classList.remove("fa-angle-up");
          arrowIcon.classList.add("fa-angle-down");
        }
      }
      
      window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var arrowIcons = document.getElementsByClassName("fa-angle-up");
      
          for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            var arrowIcon = arrowIcons[i];
      
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
              arrowIcon.classList.remove('fa-angle-up');
              arrowIcon.classList.add('fa-angle-down');
            }
          }
        }
      }

      
      jQuery(".main-box-payment-02").hide();
      jQuery("#manage-payments").click(function(){
            jQuery(".main-box-payment-01").hide();
            jQuery(".main-box-payment-02").show();
      }
      )
      jQuery("#page-ayment").click(function(){
        jQuery(".main-box-payment-01").show();
        jQuery(".main-box-payment-02").hide();
  }
  )

  jQuery(".uploaded-avatar-box").hide();
  jQuery("#upload-avatar").click(function(){
        jQuery(".upload-avatar-box").hide();
        jQuery(".uploaded-avatar-box").show();
  }
  )
  jQuery("#change").click(function(){
    jQuery(".upload-avatar-box").show();
    jQuery(".uploaded-avatar-box").hide();
}
)
jQuery("#delete").click(function(){
    jQuery(".upload-avatar-box").show();
    jQuery(".uploaded-avatar-box").hide();
}
)

// jQuery(".main-listings-box").hide();
// jQuery("#show-more-reviews").click(function(){
//       jQuery(".main-listings-box").show();
// }
// )
jQuery(".main-listings-box").hide();
jQuery(document).ready(function(){
    jQuery("#show-more-reviews").click(function(){
      jQuery(".main-listings-box").toggle();
    });
  });

  function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");
  
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read more"; 
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "Read less"; 
      moreText.style.display = "inline";
    }
  }


  jQuery(document).ready(function() {

    jQuery('.js-example-basic-multiple').select2();
    jQuery('.js-example-basic-single').select2();
  
    // Initialize Select2 when the modal is shown
    jQuery('#staticBackdrop23').on('shown.bs.modal', function () {
        jQuery('.js-example-basic-multiple').select2({
            dropdownParent: jQuery('#staticBackdrop23') // Ensure Select2 dropdown is within the modal
        });
    });

    // Destroy Select2 instance when the modal is hidden
    jQuery('#staticBackdrop23').on('hidden.bs.modal', function () {
        jQuery('.js-example-basic-multiple').select2('destroy');

    });
});


//   jQuery(document).ready(function() {
//     jQuery('.js-example-basic-single').select2();
//     jQuery('.js-example-basic-multiple').select2();

//     jQuery('#staticBackdrop23').on('shown.bs.modal', function () {
//         setTimeout(function () {
//           jQuery('.js-example-basic-multiple').select2();
//           alert("kjhdkf");
//         }, 1000);
//       });
    
// });




      


    // document.addEventListener("DOMContentLoaded", function() {
    //     // Hide loader after 5 seconds
    //     setTimeout(function() {
    //       document.getElementById("loader").style.display = "none";
    //       document.body.style.overflow = "auto"; // Allow scroll after hiding loader
    //     }, 5000);
    //   });



    var currentStep = 1;
var updateProgressBar;

  function displayStep(stepNumber) {
    if (stepNumber >= 1 && stepNumber <= 3) {
      jQuery(".step-" + currentStep).hide();
      jQuery(".step-" + stepNumber).show();
      currentStep = stepNumber;
      updateProgressBar();
    }
  }

  jQuery(document).ready(function() {
    jQuery('#multi-step-form').find('.step').slice(1).hide();
  
    jQuery(".next-step").click(function() {
      if (currentStep < 3) {
        jQuery(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
        currentStep++;
        setTimeout(function() {
          jQuery(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
          jQuery(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
          updateProgressBar();
        }, 500);
      }
    });

    jQuery(".prev-step").click(function() {
      if (currentStep > 1) {
        jQuery(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
        currentStep--;
        setTimeout(function() {
          jQuery(".step").removeClass("animate__animated animate__fadeOutRight").hide();
          jQuery(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
          updateProgressBar();
        }, 500);
      }
    });

    updateProgressBar = function() {
      var progressPercentage = ((currentStep - 1) / 2) * 100;
      jQuery(".progress-bar").css("width", progressPercentage + "%");
    }
  });
  