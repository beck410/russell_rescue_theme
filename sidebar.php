<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package r_rescue
 */
?>
<div class="row">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="paypal_button" class="paypal_button widget-area" role="complementary">
		<?php dynamic_sidebar( 'paypal_button' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>
</div>

<div class="row">
	<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'r_rescue' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'top-menu' ) ); ?>
	</nav><!-- #site-navigation -->
</div>