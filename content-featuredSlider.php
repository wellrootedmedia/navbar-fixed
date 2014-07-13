<div id="main-slider">
    <section class="featured-slider">
        <?php
        $args = array(
            'category_name' => 'featured',
            'posts_per_page' => '5',
            'order' => 'DESC',
            'status' => 'publish',
            array( 'post_type' => 'page', 'post_type' => 'post' )
        );
        $queries = query_posts( $args );

        foreach($queries as $query) {
        ?>
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($query->ID, 'thumbnail') ); ?>
            <article class="post hentry slides demo-image displayblock">
                <figure class="slider-image">
                    <a title="<?php echo $query->post_title; ?>" href="<?php echo get_the_permalink($query->ID); ?>">
                        <img src="<?php echo $url; ?>" class="wp-post-image img-responsive" alt="<?php echo $query->post_title; ?>" title="<?php echo $query->post_title; ?>">
                        <p><?php echo $query->post_title; ?></p>
                    </a>
                </figure>
            </article>
        <?php
        }
        wp_reset_query();
        ?>
    </section>

    <div id="slider-nav">
        <a class="slide-previous"><span>Previous</span></a>
        <a class="slide-next"><span>Next</span></a>
    </div>
    <div id="controllers"></div>
</div>
<hr class="featurette-divider">