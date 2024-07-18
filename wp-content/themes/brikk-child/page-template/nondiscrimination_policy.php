<?php

/* Template Name: Nondiscrimination Policy Template */
get_header();
$nondiscrimination = get_field('nondiscrimination_policy');
// $nons = get_field_object('nondiscrimination_policy');
?>


<section class="title-banner nondiscrimination-policy" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
                    <h3><?php echo get_the_title();?></h3>
                    <h4>Revised: <?php echo $nondiscrimination['revised'];?></h4>
                    <!--// < ?php-->
                    <!--// echo '<pre>';-->
                    <!--// print_r($nondiscriminationnn);-->
                    <!--// echo '</pre>';-->
                    
                    <!--// ?>-->
                </div>
            </div>
        </div>
    </div>
</section>


<section class="nondiscrimination-policy-sec-01">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
            <?php echo get_the_content();?>
                        
            </div>
        </div>
    </div>

</section>


<?php
get_footer();
?>