<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package r_rescue
 */
?>
<div class="row">
<button class="donate-button">DONATE TODAY!</button>
</div>

<div class="row">
	<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Menu', 'r_rescue' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'top-menu' ) ); ?>
	</nav><!-- #site-navigation -->
</div>