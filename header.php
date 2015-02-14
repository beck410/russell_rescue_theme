<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package r_rescue
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='https://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Quando' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="container" class="hfeed site">
		<div id="site-header" class="row">	
			<div class="col-md-6 col-xs-6">
				<img id="header-rr-logo" src="<?php echo get_template_directory_uri(); ?>/img/RRlogo.png" />
			</div>
			<div class="col-md-6 col-xs-6 text-right" id="header-rr-social">
				<img id="header-rr-paw"  src="<?php echo get_template_directory_uri(); ?>/img/paw.png" />
				<div id=rr-social-text>Follow Us!</div>
				<a href="https://www.facebook.com/russellrescuetn"><img id="header-rr-fb" src="<?php echo get_template_directory_uri(); ?>/img/fb-64.png" /></a>
			</div>
		</div>
	<div id="content" class="site-content">
	    <div id="primary" class="content-area">
	        <div class="row">
	            <main id="main" class="col-md-12 site-main" role="main">
	                    <section class="col-md-2  col-md-push-10 sidebar-container">
	                        <?php get_sidebar() ?>
	                    </section><!-- .col 2 sidebar-container -->
	                    <section class="col-md-10 col-md-pull-2 content"> <!-- content col -->
