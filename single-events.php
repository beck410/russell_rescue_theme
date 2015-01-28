<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="col-md-12 box single-events">
            <div class="box-title orange-box-title cf">
                <div class="col-md-8 col-xs-8 orange-title-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </div><!-- col-8 -->
                <div class="col-md-4 col-xs-4"></div>
            </div><!-- box-title -->
	        <div class="orange-box-content cf">
				<div class="col-md-8 col-md-push-2 single-image">
					<?php
	       			if( has_post_thumbnail() ) { ?>
	        			<img src= "<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID) ); ?>" />
	        		<?php
	       			} else {
	       				echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/archive-dog-default.jpg" />';		
	       			}
	       			?>
	       		</div> <!-- col 8 -->
	       		<div class="col-md-8 col-md-push-2 col-xs-6 single-meta">
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
	    		<div class="entry-content col-md-12">
			    	<?php the_content(); ?>
				</div><!-- entry content col 12 -->
				<div class="adopt-contact col-md-12">
	            	<p><strong>For more information contact Russell Rescue at russellrescuetn@gmail.com</strong></p>
				</div><!-- event-contact -->
			</div>
    	</div> <!-- box -->
    <?php endwhile; ?>
    

<?php get_footer(); ?>