<?php

/* Template Name: Privacy Policy Template */
get_header();
$privacy_policys = get_field('privacy_policy');
$privacy_repeater = $privacy_policys['repeater'];
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

<?php
	if($privacy_policys){
?>
<section class="main-site-listing">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <?php 
				   if(is_array($privacy_repeater)){ 
				   foreach($privacy_repeater as $key => $privacy_repeaters){  
				   if($privacy_repeaters){     
				?>
                <ul>
                    <li> <a href="#privacypolicy-01<?php echo $key;?>"><?php echo $privacy_repeaters['heading'];?></a> </li>
                </ul>
                <?php } } } ?>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="main-box">
                    <?php 
					   if(is_array($privacy_repeater)){ 
					   foreach($privacy_repeater as $key => $privacy_repeaters){  
					   if($privacy_repeaters){     
				    ?>
                    <div class="text-box" id="privacypolicy-01<?php echo $key;?>">
                        <div class="text" >
                            <?php if($privacy_repeaters['heading']){?>
                            <h3><?php echo $privacy_repeaters['heading'];?></h3>
                            <?php } ?>
                            
                            <?php if($privacy_repeaters['paragraph']){?>
                            <?php echo $privacy_repeaters['paragraph'];?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } } } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>






<?php
get_footer();
?>