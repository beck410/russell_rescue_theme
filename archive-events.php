<?php get_header() ?>

	<?php
        $args = array( 'post_type' => 'events', 'posts_per_page' => 10 );
        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
            $location = get_post_meta( $post->ID, 'event_location', true );
            $date = get_post_meta( $post->ID, 'event_date', true );
            $cost = get_post_meta( $post->ID, 'event_cost', true );
            $little_excerpt = substr(get_the_excerpt(),0,200);
            $id = $post->ID;

            ?>
            <div class="row">
                <div class="col-md-10 col-md-push-1 green-box">
                    <div class="row">
                        <div class="col-md-8 col-xs-8 box-titles green-box-title">
                            <h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                        </div> <!-- .col 8 green-box-title -->
                        <div class="col-md-4 col-xs-4 green-box-stripes">
                        </div> <!-- green-box-stripes --> 
                    </div> <!-- row--> 
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <?php
                            if( has_post_thumbnail() ) { ?>
                                <img src= "<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" />
                            <?php
                            }
                            else {
                                echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/default_events.jpg" />';
                            }
                            ?>
                        </div> <!-- col 4 -->
                        <div class="col-md-8 col-xs-6">
                            <p><strong>Where: </strong><span><?php echo $location ?></span></p>
                            <p><strong>When: </strong><span><?php echo $date ?></span></p>
                            <?php
                            if( !empty( $cost ) ) {
                              echo '<p><strong>Cost:</strong> $<span>'.$cost.'</span></p>';  
                            }
                            ?>
                            <p><strong>Description: </strong><?php echo $little_excerpt; ?><span>... </span><a href="<?php the_permalink(); ?>"></span>More Info<span></p>
                        </div> <!-- col 8 -->  
                    </div> <!-- row -->
                </div><!-- col 12 green-box -->
            </div><!--row -->
        <?php endwhile; ?>

<?php get_footer() ?>