<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package r_rescue
 */
?>
<div class="row rr_donate">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="paypal_button" class="paypal_button widget-area" role="complementary">
		<?php dynamic_sidebar( 'paypal_button' ); ?>
	</div><!-- #paypal_button -->
	<div id="rr_shop">
		<a href="http://www.cafepress.com/russellrescuetn" target="_blank">Purchase Russell Rescue Goodies</a>	
	</div>
	<?php endif; ?>
</div>

<div class="row">
	<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'r_rescue' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'top-menu' ) ); ?>
	</nav><!-- #site-navigation -->
</div>