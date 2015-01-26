<?php get_header() ?>

    <div class="row">
        <div class="col-md-6">
            <div class="green-box">
                <div class="green-box-title cf">
                    <div class="col-md-8 col-xs-8 green-box-words">
                        <h3>Dog of the Week</h3>
                    </div> <!-- .col 8 #home-week-title -->
                    <div class="col-md-4 col-xs-4 green-box-stripes">
                    </div>
                </div>
                <div class="row">
                <?php 
                $week_args = array( 'post_type' => 'dog_adoption', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => 1, 'category_name' => 'dog-of-week' );
                $week_loop = new WP_Query( $week_args );
                
                if( $week_loop->have_posts() ) {
                    while ($week_loop -> have_posts() ) : $week_loop->the_post(); ?>
                        <?php
                        $age = get_post_meta( $post->ID, 'adopt_age', true );
                        $breed = get_post_meta( $post->ID, 'adopt_breed', true );
                        $little_excerpt = substr(get_the_excerpt(),1,150);
                         ?>
                        <div id="dog-of-week-content">
                            <div class="col-md-6 col-xs-6">
                                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>" />
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <h4><strong><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></strong></a></h4>
                                <p><strong>Breed: </strong><?php echo $breed ?></p>
                                <p><strong>Description: </strong><?php echo $little_excerpt; ?><span>... </span><a href="<?php the_permalink(); ?>"></span>More Info<span></p>
                            </div>
                        </div>
                        <?php 
                    endwhile;
                }
                else {
                    echo '<p>No Dogs</p>';
                }
                ?>
                
                </div> <!-- row -->
            </div> <!-- green box -->
        </div> <!-- .col 6  -->
        <div class="col-md-6">
            <div class="orange-box">
                <div class="orange-box-title cf">
                    <div class="col-md-8 col-xs-8 orange-box-words">
                        <h3>Upcoming Events</h3>
                    </div> <!-- .col 8 #home-events-title -->
                    <div class="col-md-4 col-xs-4 orange-box-stripes">
                    </div>
                </div> <!-- orange-box-title -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <img id="home-events-img"  src="<?php echo get_template_directory_uri(); ?>/img/rescue.jpg" />
                </div>
                <div class="col-md-8 col-xs-6">
                <?php
                    $args = array( 'post_type' => 'events', 'posts_per_page' => 3 );
                    $event_loop = new WP_Query( $args );
                    while ( $event_loop->have_posts() ) : $event_loop->the_post();
                        $location = get_post_meta( $post->ID, 'event_location', true );
                        $date = get_post_meta( $post->ID, 'event_date', true );
                    ?>
                    <h4><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h4>
                    <p><?php echo $date ?></p>

                    
                    <?php
                    endwhile;
                    ?>
                </div>
            </div> <!-- row -->
            </div> <!-- #home-events -->
        </div> <!-- .col-6 #home-events -->               
    </div> <!-- row --> 
    <div class="row">
        <div class="col-md-12">
            <div class="blue-box">
                <div class="blue-box-title cf">
                    <div class="col-md-8 col-xs-8 blue-box-words">
                        <h3>About Russell Rescue</h3>
                    </div> <!-- .col 8 #home-about-title -->
                    <div class="col-md-4 col-xs-4" id="green-box-stripes">
                    </div> <!-- col 4 #home-about-stripes -->
                </div><!-- blue-box-title -->
                <div class="row">
                    <div class="col-md-12">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <div id="about-rr-content">
                    	        <?php the_content(); ?>
                            </div>
                        <?php endwhile ?>
                    </div> <!-- col 12 -->
                </div>
            </div> <!-- blue-box-->
        </div> <!-- .col 12  -->
    </div> <!-- row --> 
<?php get_footer() ?>












