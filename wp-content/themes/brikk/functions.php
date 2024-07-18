<?php

/*
 * call the framework
 *
 */
require get_template_directory() . '/includes/autoload.php';


add_action('admin_footer', 'my_custom_script');
function my_custom_script() {
?>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      // get the two buttons by their IDs
      var socialLoginButton = $('#social_login_btn');
      var utillzLoginButton = $('#utillz_login_btn');

      // attach a click event handler to the first button
      socialLoginButton.click(function() {
        // set a timeout of 2 seconds (2000 milliseconds)
        setTimeout(function() {
          // trigger a click event on the second button after 2 seconds
          utillzLoginButton.trigger('click');
        }, 2000);
      });
    });
  </script>
<?php
}
