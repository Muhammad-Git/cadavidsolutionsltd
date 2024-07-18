<?php
/**
 * Search Form template
 *
 * @package LEBUILD
 * @author template_path
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="sidebar-search-box wow fadeInUp animated animated" data-wow-delay="0.1s" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 0.1s; animation-name: fadeInUp;">
	<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	
		<input type="search" name="s" value="" placeholder="<?php echo esc_attr__( 'Search Your Keywords...', 'lebuild' ); ?>" required="">
	
		<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	</form>
</div>