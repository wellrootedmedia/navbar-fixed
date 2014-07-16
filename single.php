<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="container marketing">
        <div class="row">
            <div class="col-md-8">
                <?php get_template_part( 'content', get_post_format() ); ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>

    </div><!-- /.container -->

<?php
endwhile;
    get_template_part('paginate','single');
endif;
?>

    <hr class="featurette-divider">

<?php get_footer(); ?>