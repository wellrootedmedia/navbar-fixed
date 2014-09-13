<?php
/* Template Name: page-no-sidebar */
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="container marketing">
        <div class="row">
            <div class="col-md-12">
                <?php get_template_part( 'content', 'page' ); ?>
            </div>
        </div>
    </div><!-- /.container -->
<?php
endwhile;
    wp_reset_query();
    //get_template_part('paginate','single');
endif;
?>

    <hr class="featurette-divider">

<?php get_footer(); ?>