<?php
/* Template Name: Verification page */
get_header();
if (isset($_GET['lb_unverified']) && !empty($_GET['lb_unverified'])) { ?>
    <section class="title-banner" style="background-image: url(<?php echo home_url(); ?>/wp-content/uploads/2024/03/About-banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text text-center">
                        <h3>User Verification</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us-sec-01">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text text-center">
                        <p>User identity verification failed or pending you are not allowed to login.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="about-us-sec-02">
    </section>
<?php }
if (isset($_GET['lb_user_id']) && !empty($_GET['lb_user_id'])) {
?>
    <section class="title-banner" style="background-image: url(<?php echo home_url(); ?>/wp-content/uploads/2024/03/About-banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text text-center">
                        <h3>User Verification</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us-sec-01">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text text-center">
                        <h6>User identity verification</h6>
                        <p>Please click "Start Verification" to begin the identity verification process. Have your proof of identity and phone ready for a selfie.</p>
                    </div>
                    <div class="text text-center">
                    <?php
                        echo do_shortcode('[ab_complycube_snippet]');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us-sec-02">
    </section>
<?php
}
if (isset($_GET['lb_verified']) && !empty($_GET['lb_verified']) && ($_GET['lb_verified'] == 'true')) { ?>
    <section class="title-banner" style="background-image: url(<?php echo home_url(); ?>/wp-content/uploads/2024/03/About-banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text text-center">
                        <h3>User Verification</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us-sec-01">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text text-center">
                        <h6>User identity successfully verified</h6>
                        <p>Please login to access website.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us-sec-02">
    </section>
<?php }
get_footer();
