<?php

/* Template Name: Deactivate Form Template */
get_header();
?>




<style>

footer {
    display: none;
}

</style>


<div class="deactivate-form-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="step-container">
                    <div class="step-circle" id="step-circle-1" onclick="displayStep(1)">Select Reason</div>
                    <div class="step-circle" id="step-circle-2" onclick="displayStep(2)">Confirm</div>
                    <div class="step-circle" id="step-circle-3" onclick="displayStep(3)">Done</div>
                </div>

                <form id="multi-step-form">
                    <div class="step step-1">
                      <h3>What prompted you to deactivate?</h3>
                      <div class="main-radio-boxes">
    <div class="box">
        <input type="radio" name="deactivate" id="i-have-safety">
        <label for="i-have-safety">I have safety or privacy concerns</label>
    </div>
    <div class="box">
        <input type="radio" name="deactivate" id="i-cant-host">
        <label for="i-cant-host">I can’t host anymore</label>
    </div>
    <div class="box">
        <input type="radio" name="deactivate" id="i-cant-comply-with-lucky">
        <label for="i-cant-comply-with-lucky">I can't comply with Lucky Backyard’s Terms of Service /<br> Community Commitment.</label>
    </div>
    <div class="box">
        <input type="radio" name="deactivate" id="other">
        <label for="other">Other</label>
    </div>
    <div class="textarea-box">
        <label>Reason</label>
        <textarea placeholder="Why are you leaving?" required></textarea>
    </div>
</div>
<div class="two-btns-inline">
    <button type="button" class="btn btn-primary back-t-btn" id="myButton">
        <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9.65383 19.6534L0 9.99953L9.65383 0.345703L11.073 1.7649L2.83843 9.99953L11.073 18.2342L9.65383 19.6534Z" fill="#484848"/>
        </svg>
        Back
    </button>
    <button type="button" class="btn btn-primary next-step" id="continueBtn" disabled>
        Continue
    </button>
</div>
                    </div>

                    <div class="step step-2">
                    <h3>Deactivate Account?</h3>
                    <div class="tow-details-boxes">
                      <div class="box">
                      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="30" height="30" rx="15" fill="#F7F7F7"/>
<path d="M13.3665 18.7702L9.81006 15.2138L10.5229 14.501L13.3665 17.3446L19.4767 11.2344L20.1895 11.9472L13.3665 18.7702Z" fill="#484848"/>
</svg>
<p>The profile and listings associated with this account will disappear.</p>
                      </div>
                      <div class="box">
                      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="30" height="30" rx="15" fill="#F7F7F7"/>
<path d="M13.3665 18.7702L9.81006 15.2138L10.5229 14.501L13.3665 17.3446L19.4767 11.2344L20.1895 11.9472L13.3665 18.7702Z" fill="#484848"/>
</svg>
<p>You won’t be able to access the account info or past reservations.</p>
                      </div>
                    </div>

                    <div class="two-btns-inline">
                       <button type="button" class="btn btn-primary back-t-btn prev-step" id="myButton"><svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.65383 19.6534L0 9.99953L9.65383 0.345703L11.073 1.7649L2.83843 9.99953L11.073 18.2342L9.65383 19.6534Z" fill="#484848"/>
</svg>
Back</button>
                       <button type="button" class="btn btn-primary next-step">Continue</button>
                       </div>
                  
                     
                    </div>

                    <div class="step step-3">
                    <h3>Account Deactivated</h3>
                    <div class="tow-details-boxes">
                      <div class="box">
                      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="30" height="30" rx="15" fill="#F7F7F7"/>
<path d="M13.3665 18.7702L9.81006 15.2138L10.5229 14.501L13.3665 17.3446L19.4767 11.2344L20.1895 11.9472L13.3665 18.7702Z" fill="#484848"/>
</svg>
<p>Your profile and listings are no longer visible</p>
                      </div>
                      <div class="box">
                      <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect width="30" height="30" rx="15" fill="#F7F7F7"/>
<path d="M13.3665 18.7702L9.81006 15.2138L10.5229 14.501L13.3665 17.3446L19.4767 11.2344L20.1895 11.9472L13.3665 18.7702Z" fill="#484848"/>
</svg>
<p>You won't be able to access this account or reservations<br> associated with it</p>
                      </div>
                    </div>
                    <div class="two-btns-inline">
                       <button type="button" class="btn btn-primary next-step" id="myButtonn">Close</button>
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>








<?php
get_footer();
?>
<!-- Your custom JavaScript code -->
<script>
      $(document).ready(function () {
        // Listen for change event on radio buttons
        $('input[name="deactivate"]').change(function () {
            // Enable or disable the Continue button based on radio button selection
            $('#continueBtn').prop('disabled', !$('input[name="deactivate"]:checked').length);
        });
    });
     $(document).ready(function () {
        $("#myButton").click(function () {
            // Change the window location to the desired page URL
            window.location.href = "https://luckybackyards.com/staging-custom/account.php";
        });
    });
    $(document).ready(function () {
        $("#myButtonn").click(function () {
            // Change the window location to the desired page URL
            window.location.href = "https://luckybackyards.com/staging-custom/account.php";
        });
    });
     $(document).ready(function () {
        $(".textarea-box").hide();
        $("input[name='deactivate']").change(function () {
            if ($(this).is(":checked") && $(this).attr("id") === "other") {
                $(".textarea-box").show();
            } else {
                $(".textarea-box").hide();
            }
        });
    });
    $(document).ready(function () {
        var currentStep = 1;

        function displayStep(stepNumber) {
            if (stepNumber >= 1 && stepNumber <= 3) {
                $(".step").hide();
                $(".step-" + stepNumber).show();
                $(".step-circle").removeClass("active");
                for (var i = 1; i <= stepNumber; i++) {
                    $("#step-circle-" + i).addClass("active");
                }
                currentStep = stepNumber;
                updateProgressBar();
            }
        }

        // Set the initial active class to step one circle by default
        displayStep(1);

        $("#multi-step-form").find(".step").slice(1).hide();

        $(".step-circle").click(function () {
            var stepNumber = parseInt($(this).attr("id").split("-")[2]);
            displayStep(stepNumber);
        });

        $(".next-step, .next-step-2").click(function () {
            if (currentStep < 3) {
                $(".step-" + currentStep).hide();
                currentStep++;
                $(".step-" + currentStep).show();
                updateProgressBar();

                // Activate "Done" step circle when Next button is clicked on the second step
                if (currentStep === 2) {
                    $("#step-circle-2").addClass("active");
                } else if (currentStep === 3) {
                    // Activate "Done" step circle when Next - 2 button is clicked on the third step
                    $("#step-circle-3").addClass("active");
                }
            }
        });

        $(".prev-step").click(function () {
            if (currentStep > 1) {
                $(".step-" + currentStep).hide();
                currentStep--;
                $(".step-" + currentStep).show();
                updateProgressBar();

                // Remove the "active" class from all steps before adding it to the current step
                $(".step-circle").removeClass("active");
                for (var i = 1; i <= currentStep; i++) {
                    $("#step-circle-" + i).addClass("active");
                }
            }
        });

        function updateProgressBar() {
            var progressPercentage = ((currentStep - 1) / 2) * 100;
            $(".progress-bar").css("width", progressPercentage + "%");
        }
    });
</script>





