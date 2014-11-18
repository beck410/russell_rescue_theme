<?php get_header(); ?>


    <?php while ( have_posts() ) : the_post(); ?>

    <section class="col-md-12 blue-box">
        	<div class="row">
        		<div class="col-md-12 box-titles">
	        		<div class="col-md-8 col-xs-8 blue-box-title">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div> <!-- blue-box-title -->
					<div class="col-md-4 col-xs-4 blue-box-stripes">
					</div> <!-- blue-box-stripes -->
				</div>
			<div><!-- row -->
			
		<section class="single-story-content">
		   	<div class="row">
		   		<div class="col-md-8 col-md-push-2 single-image">
	       			<?php 
	       			if( has_post_thumbnail() ){
	       				?>
						<img src= "<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID) ); ?>" />			
	       				<?php
	       			}
	       			?>
	       		</div> <!-- col 8 -->
	       	</div><!-- row -->
	       	
	       	<div class="row">
		   		<div class="story-info col-md-8 col-md-push-2 col-xs-6">
		       		
	       		</div> <!-- col 8 -->
		   	</div> <!-- row story-dog-info -->
		   	
		   	<div class="row">
		   		<div class="entry-content col-md-12">
			    	<?php the_content(); ?>
			   	</div><!-- col 12 entry-content -->
			</div> <!-- row -->
		   
		   	<div class="row">
				<div class="story-contact col-md-12">
					<?php
		    			echo '<p><strong>If interested in ' . get_the_title() . ' contact Ruseel Rescue at russellrescuetn@gmail.com</strong></p>';
					?>
				</div><!-- story-contact col-12 -->
			</div><!-- row -->
			
			<div class="row">
				<div class="col-md-10 col-md-push-1 pagination">
			    	<?php
				    	wp_link_pages( array(
					    	'before' => '<div class="page-links">' . __( 'Pages:', 'r_rescue' ),
					    	'after'  => '</div>',
			    		) );
			    	?>
	        		<!-- navigates to next dog -->
	        		<?php r_rescue_post_nav(); ?>
	    			<?php endwhile; ?>
	 			</div> <!-- col 12 pagination -->
	 		</div> <!-- row -->
	 	</section> <!-- single-dog-entry -->
	</section> <!-- blue box -->
<?php get_footer() ?>