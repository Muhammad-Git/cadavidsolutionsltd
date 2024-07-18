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


// jQuery('#start_date').calendar({
//   type: 'date'
// });
// jQuery('#end_date').calendar({
//   type: 'date'
// });
jQuery('#start_with').calendar({
  type: 'time'
});
jQuery('#end_with').calendar({
  type: 'time'
});

// Calculate today's date
var today = new Date();
// today.setHours(0, 0, 0, 0); // Ensure time part is set to midnight

// Calculate the date one year from today
var nextYear = new Date(today);
nextYear.setFullYear(nextYear.getFullYear() + 1);
// Array of disabled dates (example)
var disabledDates = [
    {
        date: new Date('2024-06-15'),
        message: 'test'
    },
    {
        date: new Date('2024-07-04'),
        message: 'test'
    },
    {
        date: new Date('2024-05-30'),
        message: 'test'
    }
    ]
// console.log(disabledDates);

jQuery('.rangestart').calendar({
    type: 'date',
    endCalendar: jQuery('.rangeend'),
    // minDate: today,
    initialDate: today,
    disabledDates: [{
              date: new Date('2024-05-25'),
              message: 'xmas gift shopping'
          },
          {
              date: new Date('2024-05-26'),
              message: 'Santa Clause is coming to town',
              inverted: true,
              variation: 'basic'
          },
        //   new Date('2024-12-31')  /* No Reason. Everybody knows why ;) */
      ]
  });
jQuery('.rangeend').calendar({
    type: 'date',
    startCalendar: jQuery('.rangestart'),
    // minDate: today,
    // maxDate: nextYear,
    disabledDates: [{
              date: new Date('2024-12-22'),
              message: 'xmas gift shopping'
          },
          {
              date: new Date('2024-12-25'),
              message: 'Santa Clause is coming to town',
              inverted: true,
              variation: 'basic'
          },
          new Date('2024-12-31')  /* No Reason. Everybody knows why ;) */
      ]
    // disabledDates: disabledDates
});

// console.log("Dates in str: ", booked_dates);
// START-Easepick Calendar
 const DateTime = easepick.DateTime;
 let bookedDates = [];

 if(typeof myScriptData !== 'undefined' && Array.isArray(myScriptData.booked_dates)) {
    bookedDates = myScriptData.booked_dates.map(dateStr => {
                // Convert YYYYMMDD to YYYY-MM-DD
                const formattedDateStr = `${dateStr.slice(0, 4)}-${dateStr.slice(4, 6)}-${dateStr.slice(6, 8)}`;
                return new DateTime(formattedDateStr, 'YYYY-MM-DD');
            });
            // console.log('Booked Dates: ', bookedDates);
}
        // const bookedDates = [
        //     '2024-05-02',
        //     ['2024-05-06', '2024-05-11'],
        //     '2024-05-18',
        //     '2024-05-19',
        //     '2024-05-20',
        //     '2024-05-25',
        //     '2024-05-28',
        // ].map(d => {
        //     if (d instanceof Array) {
        //         const start = new DateTime(d[0], 'YYYY-MM-DD');
        //         const end = new DateTime(d[1], 'YYYY-MM-DD');

        //         return [start, end];
        //     }
        //     return new DateTime(d, 'YYYY-MM-DD');
        // });
    var charge_type = null;
    var price = null;
    
    if(typeof myScriptData !== 'undefined') {
        charge_type = myScriptData.charge_type;
        price = myScriptData.price;
        // console.log(charge_type);
        // console.log("Price: ", price);
    }
    
    var picker = null;
    
    if(charge_type==='nightly') {
            picker = new easepick.create({
            element: document.getElementById('booking-datepicker'),
            autoApply: false,
            format: 'MMMM DD, YYYY',
            // grid: 2,
            // calendars: 2,
            zIndex: 10,
            css: [
                'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css',
                // 'https://easepick.com/css/demo_hotelcal.css',
                'https://luckybackyards.com/staging/wp-content/themes/luckybackyard/assets/css/datepicker.css?ver=6.5.3',
            ],
            setup(picker) {
                picker.on('select', (e) => {
                    const { start, end } = e.detail;
                    // Calculate the number of nights
                    const nights = calculateNights(start, end);
                    // console.log("Number of nights:", nights);
                    const pricePerNight = price;
                    const totalPrice = calculateTotalPrice(nights, pricePerNight);
                    // console.log("Total Price: ", totalPrice);
                    displayItems(nights,totalPrice, pricePerNight);

                    // console.log("Start:", start);
                    // console.log("End:", end);
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
                filter(date, picked) {
                    if (picked.length === 1) {
                        const incl = date.isBefore(picked[0]) ? '[)' : '(]';
                        return !picked[0].isSame(date, 'day') && date.inArray(bookedDates, incl);
                    }

                    return date.inArray(bookedDates, '[)');
                },
            }
        });
    }
// Function to calculate the number of nights between two dates
function calculateNights(startDate, endDate) {
    const start = new Date(startDate);
    const end = new Date(endDate);

    // Calculate the difference in time
    const timeDifference = end - start;

    // Calculate the difference in days
    const nightDifference = timeDifference / (1000 * 3600 * 24);
    return nightDifference;
}

function calculateTotalPrice(nights, pricePerNight) {
    return nights * pricePerNight;
}

function displayItems(nights, totalPrice, pricePerNight) {
    // Set the values in the HTML
    // Determine whether to use "night" or "nights"
    const nightText = nights === 1 ? 'night' : 'nights';
    document.getElementById('pernight').textContent = `$${pricePerNight} x ${nights} ${nightText}`;
    document.getElementById('price').textContent = `$${totalPrice.toFixed(2)}`;

    // Show the .nights container
    document.querySelector('.nights').style.display = 'block';
}

// END-Easepick Calendar



function displayItemsHours(hours, totalPrice, pricePerHour) {
    // Set the values in the HTML
    // Determine whether to use "hour" or "hours"
    const hourText = hours === 1 ? 'hour' : 'hours';
    if(document.getElementById('pernight') != null && document.getElementById('price') != null && document.querySelector('.nights') != null ) {
    document.getElementById('pernight').textContent = `$${pricePerHour} x ${hours} ${hourText}`;
    document.getElementById('price').textContent = `$${totalPrice.toFixed(2)}`;

    // Show the .hours container
    document.querySelector('.nights').style.display = 'block';
    }
}

function calculateTotalPrice(hours, pricePerHour) {
    return hours * pricePerHour;
}


// START-Time Dropdown

var hourly_picker= null;
var bookedTimes = {};
var blockedTimes = [];

  if(typeof myScriptData !== 'undefined' && typeof myScriptData.booked_times === 'object') {
        bookedTimes = myScriptData.booked_times || {};
        // console.log('Booked Times: ', bookedTimes);
    }

document.addEventListener('DOMContentLoaded', function() {
  

    const startTimeSelect = document.getElementById('start-time');
    const endTimeSelect = document.getElementById('end-time');
    
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

    function populateTimeOptions(selectElement, start, end, increment, bookedTimes, defaultOption) {
        selectElement.innerHTML = '';
    
        // Add the default option
        const defaultOptionElement = document.createElement('option');
        defaultOptionElement.value = '';
        defaultOptionElement.textContent = defaultOption;

        selectElement.appendChild(defaultOptionElement);
    
        for (let i = start; i <= end; i += increment) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = formatTime(i);
            if (bookedTimes.includes(i)) {
                option.disabled = true;
            }
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
        populateTimeOptions(endTimeSelect, newMinEndTime, maxTime, timeIncrement, blockedTimes, 'Select end time');
    }



        // Adjust end time options when start time changes
    startTimeSelect.addEventListener('change', function() {
        updateEndTimeOptions();
        updateStartTimeOptions(); // Call the function to update start time options
             // Example usage of displayItemsHours function
    const hours = calculateHoursDifference(); // Example: 2 hours
    const pricePerHour = price;
    const totalPrice = calculateTotalPrice(hours, pricePerHour);
    displayItemsHours(hours, totalPrice, pricePerHour);
    });
    
    // Adjust start time options when end time changes
    endTimeSelect.addEventListener('change', function() {
        updateStartTimeOptions();
             // Example usage of displayItemsHours function
    const hours = calculateHoursDifference(); // Example: 2 hours
    const pricePerHour = price;
    const totalPrice = calculateTotalPrice(hours, pricePerHour);
    displayItemsHours(hours, totalPrice, pricePerHour);
    });
    
     // Example usage of displayItemsHours function
    // const hours = calculateHoursDifference(); // Example: 2 hours
    // const pricePerHour = document.getElementById("price_per_night").getAttribute("data-price");
    // const totalPrice = calculateTotalPrice(hours, pricePerHour);
    // displayItemsHours(hours, totalPrice, pricePerHour);
    
    // START-Easepick Calendar Hourly

if(charge_type==='hourly') {
    hourly_picker = new easepick.create({
            element: document.getElementById('hourly-datepicker'),
            autoApply: false,
            format: 'MMMM DD, YYYY',
            // grid: 2,
            // calendars: 2,
            zIndex: 10,
            css: [
                'https://cdn.jsdelivr.net/npm/@easepick/bundle@1.2.1/dist/index.css',
                'https://luckybackyards.com/staging/wp-content/themes/luckybackyard/assets/css/datepicker.css?ver=6.5.3',
            ],
            setup(picker) {
                picker.on('select', (e) => {
                    const { date } = e.detail;
                    const formattedDate = `${date.getFullYear()}${padZero(date.getMonth() + 1)}${padZero(date.getDate())}`;
                    console.log('Date selected (Hourly): ', formattedDate);
                    
                    const bookedTimesForSelectedDate = bookedTimes[formattedDate] || [];
                    // Example of how to use bookedTimesForSelectedDate
                    blockedTimes = getBlockedTimes(bookedTimesForSelectedDate);

                    // Example of how to use bookedTimesForSelectedDate
                    // console.log('Blocked Times for Selected Date: ', blockedTimes);
                    console.log('Booked Times for Selected Date: ', bookedTimesForSelectedDate);
                    
                    populateTimeOptions(startTimeSelect, minTime, maxTime, timeIncrement, blockedTimes, 'Select start time');
                    updateEndTimeOptions(); // Ensure end time is updated based on initial start time selection
                    // console.log("Start:", start);
                    // console.log("End:", end);
                });
            },
            plugins: ['LockPlugin'],
            // RangePlugin: {
            //     tooltipNumber(num) {
            //         return num - 1;
            //     },
            //     locale: {
            //         one: 'night',
            //         other: 'nights',
            //     },
            // },
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
}

    function timeStringToMinutes(timeStr) {
        const [time, period] = timeStr.split(' ');
        let [hours, minutes] = time.split(':').map(Number);

        if (period.toLowerCase() === 'pm' && hours !== 12) {
            hours += 12;
        } else if (period.toLowerCase() === 'am' && hours === 12) {
            hours = 0;
        }

        return hours * 60 + minutes;
    }

    function getBlockedTimes(bookings) {
        const blockedTimes = [];

        bookings.forEach(booking => {
            const startTime = timeStringToMinutes(booking.start_time);
            const endTime = timeStringToMinutes(booking.end_time);
            for (let time = startTime; time < endTime; time += timeIncrement) {
                blockedTimes.push(time);
            }
            // Ensure the end time is also included
            blockedTimes.push(endTime);
        });

        return blockedTimes;
    }

// END-Easepick Calendar Hourly
    
    
});
// END-Time Dropdown


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
  
  
  
