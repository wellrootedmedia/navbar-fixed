<?php get_header(); ?>

<div class="">
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if($paged <= 1)
{
    get_template_part('content', 'featuredSlider');
}


if($paged <= 1 )
{
    get_template_part('content','featuredContent');
}
?>

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

if ( $the_query->have_posts() )
    :
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
?>
</div>

<?php get_footer(); ?>