<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package r_rescue
 */

get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="col-md-12 box page_info"> 
		<div class="box-title orange-box-title cf">
			<div class="col-md-8 col-xs-8 orange-title-header">
 				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>  
            </div><!-- col-8 -->
            <div class="col-md-4 col-xs-4"></div>
		</div>
		<div class="orange-box-content cf">
			<?php the_content(); ?>
		</div>
	</div>

	<?php endwhile; // end of the loop. 
	get_footer(); ?>
