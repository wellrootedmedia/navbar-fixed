<?php get_header(); ?>

    <section id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php if ( have_posts() ) : ?>

                <header class="archive-header">
                    <h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'navbar-fixed-top' ), single_cat_title( '', false ) ); ?></h1>

                    <?php
                    // Show an optional term description.
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) :
                        printf( '<div class="taxonomy-description">%s</div>', $term_description );
                    endif;
                    ?>
                </header><!-- .archive-header -->

                <?php
                navbar_fixed_top_paging_nav();

                while ( have_posts() ) : the_post();
                    get_template_part( 'content', get_post_format() );
                endwhile;

                navbar_fixed_top_paging_nav();
                wp_reset_query();

            else :

                get_template_part( 'content', 'none' );

            endif;
            ?>
        </div><!-- #content -->
    </section><!-- #primary -->

<?php
//get_sidebar( 'content' );
//get_sidebar();
get_footer();
