<?php

/* Template Name: About Us Template */
get_header();

$about = get_field('home_financing');
$counter = get_field('home_financing_counter');
$about_video = get_field('about_video');
$Frequently = get_field('frequently_asked');
$faq_repeater = $Frequently['faqs'];
?>


<style>
    .title-banner {
    padding: 40px 0 100px;
}
</style>

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

<section class="about-us-sec-01">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text text-center">
                    <h6><?php echo get_field('our_goal')?></h6>
                    <p><?php echo get_the_content();?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
	if($about){
?>
<section class="about-us-sec-02">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="text">
                    <?php if($about['home_financing_title']){?>
                        <?php echo $about['home_financing_title'];?>
                    <?php } ?>
                    
                    <?php if($about['home_financing_paragraph']){?>
                        <?php echo $about['home_financing_paragraph'];?>
                    <?php } ?>
                </div>
            </div>
            
            <?php if($about['home_financing_images']){?>
            <div class="col-lg-6 col-md-12">
                <div class="img sec-2-img">
                    <img src="<?php echo $about['home_financing_images'];?>" alt="">
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<?php
	if($counter){
?>
<section class="about-us-sec-03">
    <div class="container">
        <div class="row">
            <?php
                if(is_array($counter)) { 
                    foreach(array_chunk($counter, 2) as $chunk) { // Split the array into chunks of size 2
                        echo '<div class="col-lg-3 col-md-6">';
                        foreach($chunk as $counteritems) {
                            echo '<div class="item">
                                    <div class="main-counter-number">';
                            if($counteritems['prefix']) {
                                echo '<span>'. $counteritems['prefix'] .'</span>';
                            }
                            if($counteritems['number']) {
                                echo '<h1 class="count" data-number="'. $counteritems['number'] .'"></h1>';
                            }
                            if($counteritems['sufix']) {
                                echo '<span>'. $counteritems['sufix'] .'</span>';
                            }
                            echo '</div>';
                            if($counteritems['counter_title']) {
                                echo '<p class="text">'. $counteritems['counter_title'] .'</p>';
                            }
                            echo '</div>';
                        }
                        echo '</div>';
                    }
                }
            ?>

        </div>
    </div>
</section>
<?php } ?>

<?php
	if($about_video){
?>
<section class="about-us-sec-04">
    <div class="container">
        <div class="row">
            <?php if($about_video['video']){?>
            <div class="col-md-12">
                <div class="video-box">
                    <video controls poster="<?php echo $about_video['video_poster'];?>">
                        <source src="<?php echo $about_video['video'];?>" type="video/mp4">
                    </video>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <?php if($about_video['video_heading_content']){?>
            <div class="col-lg-6 col-md-12">
                <div class="text">
                    <?php echo $about_video['video_heading_content'];?>
                </div>
            </div>
            <?php } ?>
            
            <?php if($about_video['video_content_paragraph']){?>
            <div class="col-lg-6 col-md-12">
                <div class="text">
                   <?php echo $about_video['video_content_paragraph'];?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>

<?php
	if($Frequently){
?>
<section class="about-us-sec-05">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if($Frequently['faqs_heading']){?>
                <div class="text">
                    <h2><?php echo $Frequently['faqs_heading'];?></h2>
                </div>
                <?php } ?>
                <div class="accordion-tabs">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php 
        				    if(is_array($faq_repeater)){ 
        					foreach($faq_repeater as $key => $faq_repeaters){
        					if($faq_repeaters){    
        				?>
                        <div class="accordion-item">
                            <?php if($faq_repeaters['question']){?>
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $key;?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $key;?>">
                                   <?php echo $faq_repeaters['question'];?>
                                </button>
                            </h2>
                            <?php } ?>
                            
                            <?php if($faq_repeaters['answer']){?>
                            <div id="flush-collapse<?php echo $key;?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body"><?php echo $faq_repeaters['answer'];?></div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } } } ?>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>





<?php
get_footer();
?>