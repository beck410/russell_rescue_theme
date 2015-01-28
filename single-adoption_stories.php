<?php get_header(); ?>


    <?php while ( have_posts() ) : the_post(); ?>
		<div class="col-md-12 box">
            <div class="box-title blue-box-title cf">
                <div class="col-md-8 col-xs-8 blue-title-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </div><!-- col-8 -->
                <div class="col-md-4 col-xs-4"></div>
            </div><!-- box-title -->
            <div class="blue-box-content cf">
            	<div class="col-md-8 col-md-push-2 single-image">
	       			<?php 
       				if( has_post_thumbnail() ){
	       				?>
						<img src= "<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID) ); ?>" />			
	       			<?php } ?>
	       		</div> <!-- single-image -->
	       		<div class="entry-content col-md-12">
			    	<?php the_content(); ?>
			   	</div><!-- col 12 entry-content -->
			   	<div class="story-contact col-md-12">
					<?php
		    			echo '<p><strong>If interested in ' . get_the_title() . ' contact Ruseel Rescue at russellrescuetn@gmail.com</strong></p>';
					?>
				</div><!-- story-contact -->
					<div class="col-md-10 col-md-push-1 pagination">
			    		<?php
				    	wp_link_pages( array(
					    	'before' => '<div class="page-links">' . __( 'Pages:', 'r_rescue' ),
					    	'after'  => '</div>',
			    		) );
			    		?>
	        			<!-- navigates to next dog -->
	        			<?php r_rescue_post_nav(); ?>
	 				</div> <!-- pagination -->
           	</div>
        </div><!-- box -->
   
	<?php endwhile; ?>
<?php get_footer() ?>