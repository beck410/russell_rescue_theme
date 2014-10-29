<?php get_header(); ?>


    <?php while ( have_posts() ) : the_post(); ?>

    <section class="col-md-12 green-box">
        	<div class="row">
        		<div class="col-md-8 col-xs-8 green-box-title box-titles">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div> <!-- green-box-title -->
				<div class="col-md-4 col-xs-4 green-box-stripes">
				</div> <!-- green-box-stripes -->
			<div><!-- row -->
			
		<section class="single-dog-content">
		   	<div class="row">
		   		<div class="col-md-8 col-md-push-2 col-xs-6">
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
		   		<div class="adopt-dog-info col-md-8 col-md-push-2 col-xs-6">
		       		<?php 
		        	$age = get_post_meta( $post->ID, 'adopt_age', true );
	            	$breed = get_post_meta( $post->ID, 'adopt_breed', true );
		        	if( !empty($age) ) { 
	            		echo '<p><strong>Age:</strong> '.$age. ' years old'. '</p>';
	            	} ;
	            	if( !empty($breed) ) { 
	            		echo '<p><strong>breed:</strong> '.$breed.'</p>';
	            	};
	            	?>
	       		</div> <!-- col 8 -->
		   	</div> <!-- row adopt-dog-info -->
		   	
		   	<div class="row">
		   		<div class="entry-content col-md-12">
			    	<?php the_content(); ?>
			   	</div><!-- col 12 entry-content -->
			</div> <!-- row -->
		   
		   	<div class="row">
				<div class="adopt-contact col-md-12">
					<?php
					$contact_person = get_post_meta( $post->ID, 'adopt_contact_p', true );
	        		$contact_email = get_post_meta( $post->ID, 'adopt_contact_e', true );
		    		if( !empty($contact_person && $contact_email && is_email($contact_email)) ) { 
	        			echo '<p><strong>If interested in '. get_the_title() . ' contact ' . $contact_person .' at ' . $contact_email . '</strong></p>';
		    		}
		    		else {
		    			echo '<p><strong>If interested in ' . get_the_title() . ' contact Ruseel Rescue at russellrescuetn@gmail.com</strong></p>';
		    		}
					?>
				</div><!-- adopt-contact col-12 -->
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
	</section> <!-- green box -->
<?php get_footer() ?>