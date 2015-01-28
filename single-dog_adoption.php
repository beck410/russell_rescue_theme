<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <div class="col-md-12 box">
            <div class="box-title green-box-title cf">
                <div class="col-md-8 col-xs-8 green-title-header">
 					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>  
                </div><!-- col-8 -->
                <div class="col-md-4 col-xs-4"></div>
            </div><!-- box-title -->
            <div class="green-box-content cf">
            	<div class="col-md-8 col-md-push-2 single-image">
	       			<?php 
	                    if( has_post_thumbnail() ) { ?>
	                        <img src= "<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID) ); ?>" />
	                    <?php
	                    }
	                    else{
	                        echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/archive-dog-default.jpg" />';
	                    }
	                ?>
	       		</div> <!-- single-image -->
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
	       		</div> <!-- col 8 aodopt-dog-info -->	
		   		<div class="entry-content col-md-12">
			    	<?php the_content(); ?>
			   	</div><!-- col 12 entry-content -->	  
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
				<div class="col-md-10 col-md-push-1 pagination">
			    	<?php
				    	wp_link_pages( array(
					    	'before' => '<div class="page-links">' . __( 'Pages:', 'r_rescue' ),
					    	'after'  => '</div>',
			    		) );
			    	?>
	        		<!-- navigates to next dog -->
	        		<?php r_rescue_post_nav(); ?>

	 			</div> <!-- col 12 pagination -->
			</div><!-- green-box-content -->
			

	<?php endwhile; ?>
<?php get_footer() ?>