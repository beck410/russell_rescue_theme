<?php get_header() ?>
	<?php
        $args = array( 'post_type' => 'dog_adoption', 'posts_per_page' => 10 );
        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
            $age = get_post_meta( $post->ID, 'adopt_age', true );
            $breed = get_post_meta( $post->ID, 'adopt_breed', true );
            $little_excerpt = substr(get_the_excerpt(),0,200);
            $id = $post->ID;
    ?>
            <div class="col-md-10 col-md-push-1 box">
                <div class="box-title orange-box-title cf">
                    <div class="col-md-8 col-xs-4 orange-title-header">
                         <h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                    </div><!-- col-8 -->
                    <div class="col-md-4 col-xs-4"></div>
                </div><!-- box-title -->
                <div class="orange-box-content cf">
                    <div class="col-md-4 col-xs-6 archive-image">
                        <?php
                        if( has_post_thumbnail() ) { ?>
                            <img src= "<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID) ); ?>" />
                        <?php
                        }
                        else{
                            echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/archive-dog-default.jpg" />';
                        }
                        ?>
                    </div> <!-- col 4 -->
                    <div class="col-md-8 col-xs-6">
                        <p><strong>Breed: </strong><?php echo $breed; ?></p>
                        <p><strong>Age: </strong><?php echo $age; ?></p>
                        <p><strong>Description: </strong><?php echo $little_excerpt; ?><span><a href="<?php the_permalink(); ?>">...</span> More Info<span></p>
                    </div> <!-- col 8 -->
                </div> <!-- organge-box-content -->
            </div><!-- box -->
            
    <?php
        endwhile;
    ?>

<?php get_footer() ?>