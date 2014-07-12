<?php
get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if($paged <= 1) : ?>

    <!-- Carousel
        ================================================== -->
    <div id="main-slider">
        <section class="featured-slider">
            <article class="post hentry slides demo-image displayblock">
                <figure class="slider-image">
                    <a title="Seto Ghumba" href="#">
                        <img src="http://localhost/xampp/wordpress/wp-content/themes/adventurous/images/demo/slider-1-1600x600.jpg" class="wp-post-image img-responsive" alt="Seto Ghumba" title="Seto Ghumba">
                    </a>
                </figure>
            </article><!-- .slides -->
            <article class="post hentry slides demo-image displaynone">
                <figure class="slider-image">
                    <a title="Kathmandu Durbar Square" href="#">
                        <img src="http://localhost/xampp/wordpress/wp-content/themes/adventurous/images/demo/slider-2-1600x600.jpg" class="wp-post-image img-responsive" alt="Kathmandu Durbar Square" title="Kathmandu Durbar Square">
                    </a>
                </figure>
            </article><!-- .slides -->
        </section>
        <div id="slider-nav">
            <a class="slide-previous"><span>Previous</span></a>
            <a class="slide-next"><span>Next</span></a>
        </div>
        <div id="controllers"></div>
    </div>

<?php endif; ?>

<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<?php if($paged <= 1 )
    get_template_part('content','featured'); ?>

<?php get_template_part('pagination'); ?>

<?php
$args = array(
        'category_name' => 'photography',
        'posts_per_page' => '8',
        'order' => 'DESC',
        'paged' => $paged,
        'status' => 'publish'
    );
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :
    // Start the Loop.
    while ( $the_query->have_posts() ) : $the_query->the_post();

        /*
         * Include the post format-specific template for the content. If you want to
         * use this in a child theme, then include a file called called content-___.php
         * (where ___ is the post format) and that will be used instead.
         */
        get_template_part('content','loop');

    endwhile;

    get_template_part('pagination');
    wp_reset_postdata();

endif;

get_footer(); ?>