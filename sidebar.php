<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package r_rescue
 */
?>
<div class="row sidebar-links">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="col-xs-6 col-md-12">
		<div id="paypal_button" class="paypal_button widget-area" role="complementary">
			<?php dynamic_sidebar( 'paypal_button' ); ?>
		</div><!-- #primary-sidebar -->
	</div>
	<div class="col-md-12 col col-xs-6" id="store-link">
		<a href="http://www.cafepress.com/russellrescuetn" target="_blank">Visit Russell Rescue Store</a>	
	</div>
	<?php endif; ?>
</div>

<div class="row">
	<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'r_rescue' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'top-menu' ) ); ?>
	</nav><!-- #site-navigation -->
</div>