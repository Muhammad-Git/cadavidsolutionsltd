<?php

/* Template Name: Terms & Conditions Template */
get_header();
$terms_condition = get_field('terms_and_condition');
$terms_repeater = $terms_condition['repeater'];
?>

<section class="title-banner" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
                    <h3><?php echo get_the_title();?></h3>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="main-site-listing terms&conditions">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <ul>
                    <?php 
    			    if(is_array($terms_repeater)){ 
    				foreach($terms_repeater as $key => $terms_repeaters){
    				if($terms_repeaters){    
    			    ?>
                    <li> <a href="#terms-&-conditions-01<?php echo $key;?>"><?php echo $terms_repeaters['heading'];?></a> </li>
                    <?php } } } ?>
                </ul>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="main-box">
                <?php 
    			    if(is_array($terms_repeater)){ 
    				foreach($terms_repeater as $key => $terms_repeaters){
    				if($terms_repeaters){    
    			?>
                <div class="text-box" id="terms-&-conditions-01<?php echo $key;?>">
                    <div class="text" >
                        <h3><?php echo $terms_repeaters['heading'];?></h3>
                        <p><?php echo $terms_repeaters['paragraph'];?></p>
                    </div>
                </div>
                <?php } } } ?>	
            </div>
        </div>
    </div>

</section>







<?php
get_footer();
?>