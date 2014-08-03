<?php get_header(); ?>

    <section id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'navbar-fixed' ), get_search_query() ); ?></h1>
                </header><!-- .page-header -->

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