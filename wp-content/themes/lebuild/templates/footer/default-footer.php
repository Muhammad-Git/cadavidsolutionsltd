<?php
/**
 * Footer Template  File
 *
 * @package LEBUILD
 * @author  Tona Theme
 * @version 1.0
 */

$options = lebuild_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>

    <footer class="mrfooter">
        <div class="container">
            <div class="row">
              <?php dynamic_sidebar( 'footer-sidebar' ); ?>
            </div>
        </div>
    </footer>



<button class="scroll-top scroll-to-target rtl" data-target="html">
    <span class="fa fa-angle-up"></span>
</button>