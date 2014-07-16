<?php
get_header(); ?>

	<div class="col-md-8">

        <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'navbar-fixed-top' ), get_search_query() ); ?></h1>
        </header><!-- .page-header -->

            <?php
                // Start the Loop.
                while ( have_posts() ) : the_post();

                    /*
                     * Include the post format-specific template for the content. If you want to
                     * use this in a child theme, then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );

                endwhile;
                // Previous/next post navigation.
                //navbar_fixed_top_paging_nav();

            else :
                // If no content, include the "No posts found" template.
                get_template_part( 'content', 'none' );

            endif;
        ?>

	</div><!-- #primary -->

<?php
//get_sidebar( 'content' );
get_sidebar();
get_footer();
