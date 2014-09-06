<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="container marketing">
        <div class="row">
            <div class="col-md-8">
                <?php get_template_part( 'content', get_post_format() ); ?>
                <?php
                /*$defaults = array(
                    'before'           => '<p>' . __( 'Posts:' ),
                    'after'            => '</p>',
                    'link_before'      => '',
                    'link_after'       => '',
                    'next_or_number'   => 'number',
                    'separator'        => ' ',
                    'nextpagelink'     => __( 'Next page' ),
                    'previouspagelink' => __( 'Previous page' ),
                    'pagelink'         => '%',
                    'echo'             => 1
                );
                wp_link_pages($defaults);*/
                ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
                ?>
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