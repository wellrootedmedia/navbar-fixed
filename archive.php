<?php
get_header();
if ( have_posts() ) : ?>
    <header class="page-header">
        <h1 class="page-title">
            <?php
            if ( is_day() ) :
                printf( __( 'Daily Archives: %s', 'navbar-fixed-top' ), get_the_date() );
            elseif ( is_month() ) :
                printf( __( 'Monthly Archives: %s', 'navbar-fixed-top' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'navbar-fixed-top' ) ) );
            elseif ( is_year() ) :
                printf( __( 'Yearly Archives: %s', 'navbar-fixed-top' ), get_the_date( _x( 'Y', 'yearly archives date format', 'navbar-fixed-top' ) ) );
            else :
                _e( 'Archives', 'navbar-fixed-top' );
            endif;
            ?>
        </h1>
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

<?php
//get_sidebar( 'content' );
//get_sidebar();
get_footer();
