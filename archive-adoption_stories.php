<?php get_header() ?>
<?php
    $args = array( 'post_type' => 'adoption_stories', 'posts_per_page' => 10 );
    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
        $little_excerpt = substr(get_the_excerpt(),0,400);
        ?>
        <div class="row">
            <div class="col-md-10 col-md-push-1 blue-box">
                <div class="row">
                    <div class="col-md-8 col-xs-8 box-titles blue-box-title">
                        <h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                    </div> <!-- .col 8 blue-box-title -->
                    <div class="col-md-4 col-xs-4 blue-box-stripes">
                    </div> <!-- col 4 blue-box-stripes --> 
                </div> <!-- row--> 
                <div class="row">
                <?php if(has_post_thumbnail() ) { ?>
                    <div class="col-md-6 col-md-push-3 archive-image">
                        <img src = "<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID) ); ?>" />
                    </div> <!-- col 12 -->
                <?php
                    }
                ?>
                </div> <!--row --> 
                <div class="row">
                    <div class="col-md-12">
                        <h3><strong><?php echo the_title() ?>'s Happily Furever After</strong></h3>
                        <p><?php echo $little_excerpt; ?><span><a href="<?php the_permalink(); ?>"></span>Read More...<span></p>
                    </div><!-- col 12 -->
                </div> <!-- row -->
            </div> <!-- col 10 blue-box -->
        </div> <!-- row -->
    <?php endwhile; ?>
    
<?php get_footer() ?>