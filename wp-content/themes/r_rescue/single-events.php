<?php get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
    <section class="col-md-12 orange-box">
    	<div class="row">
        	<header class="col-md-11 orange-box-title box-titles">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	     	</header><!-- .entry-header -->
	     	<div class="col-md-1 orange-box-stripes">
	     	</div>
		</div> <!-- row -->
		
		<section class="single-events-content">     
			<div class="row">
				<div class="col-md-8 col-md-push-2 col-xs-6">
					<?php
	       			if( has_post_thumbnail() ) { ?>
	        			<img src= "<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID) ); ?>" />
	        		<?php
	       			} ?>
	       		</div> <!-- col 8 -->
        	</div> <!-- row -->  	  

	   		<div class="single-event-info row">
	   			<div class="col-md-8 col-md-push-2 col-xs-6">
	    	   		<?php 
	    	    	$location = get_post_meta( $post->ID, 'event_location', true );
	    	    	$cost = get_post_meta( $post->ID, 'event_cost', true );
        	    	$date = get_post_meta( $post->ID, 'event_date', true );
	    	    	
	    	    	if( !empty($location) ) { 
        	    		echo '<p><strong>Where:</strong> '.$location.'</p>';
        	    	} ;
        	    	if( !empty($date) ) { 
        	    		echo '<p><strong>When: </strong>'.$date.'</p>';
        	    	};
        	    	if( !empty($cost) && $cost != 0) {
        	      		echo '</p><strong>Cost: $</strong>' . $cost .'</p>';
            		}
        	    	?>
        	    </div> <!-- col 8 -->
	   		</div><!--row single-event-info -->
	   		
	   		<div class="row">
	    		<div class="entry-content col-md-12">
		    		<?php the_content(); ?>
				</div><!-- entry content col 12 -->
			</div><!-- row -->
			
			<div class="row">
				<div class="adopt-contact col-md-12">
            		<p><strong>For more information contact Russell Rescue at russellrescuetn@gmail.com</strong></p>
				</div><!-- event-contact -->
			</div><!-- row -->

    	<?php endwhile; ?>
    	</section><!-- single-events-content -->
	</section> <!-- green-box col 12 -->

<?php get_footer(); ?>