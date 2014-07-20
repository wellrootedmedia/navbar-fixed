<?php get_header(); ?>

<div class="">
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if($paged <= 1) {
    get_template_part('featured', 'slider');
}

if($paged <= 1 ) {
    get_template_part('featured','content');
}
?>

<?php
$postsPerPage = ($paged <= 1 ) ? '4' : '8';

$args = array(
        'category_name' => 'photography',
        'posts_per_page' => $postsPerPage,
        'order' => 'DESC',
        'paged' => $paged,
        'status' => 'publish'
    );

query_posts($args);

if ( have_posts() ) :
    navbar_fixed_top_paging_nav();

    while ( have_posts() ) : the_post();
        get_template_part( 'content', get_post_format() );
    endwhile;

    navbar_fixed_top_paging_nav();
endif;
?>
</div>

<?php get_footer(); ?>