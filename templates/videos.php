<?php
/* Template Name: videos */
get_header();

$args = array(
    'type'                     => 'post',
    'child_of'                 => 9,
    'parent'                   => '',
    'orderby'                  => 'name',
    'order'                    => 'DESC',
    'hide_empty'               => 1,
    'hierarchical'             => 1,
    'exclude'                  => '',
    'include'                  => '',
    'number'                   => '',
    'taxonomy'                 => 'category',
    'pad_counts'               => false

);
$cats = get_categories($args);
//echo '<pre>';
//print_r($cats);
//echo '</pre>';



?>
    <section id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php if ( have_posts() ) : ?>

                <header class="archive-header">
                    <h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'navbar-fixed' ), single_cat_title( '', false ) ); ?></h1>

                    <?php
                    // Show an optional term description.
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) :
                        printf( '<div class="taxonomy-description">%s</div>', $term_description );
                    endif;
                    ?>
                </header><!-- .archive-header -->
                <div class="container clearfix">

                    <!-- START PORTFOLIO FILTERING -->
                    <div id="filters" class="sixteen columns">

                        <ul class="clearfix">
                            <li><a href="#" data-filter="*" class="active"><h3>All</h3></a></li>
                            <li><a href="#" data-filter=".branding" class=""><h3>Branding</h3></a></li>
                            <li><a href="#" data-filter=".design"><h3>Design</h3></a></li>
                            <li><a href="#" data-filter=".photography"><h3>Photography</h3></a></li>
                            <li><a href="#" data-filter=".videography"><h3>Videography</h3></a></li>
                            <li><a href="#" data-filter=".web"><h3>Web</h3></a></li>
                        </ul>
                    </div><!-- END PORTFOLIO FILTERING -->
                </div>
                <div id="portfolio-wrap" style="position: relative; overflow: hidden; height: 612px;" class="isotope">
                <?php
                query_posts('cat=9');
                while ( have_posts() ) : the_post();
                    get_template_part( 'inc/video', 'format' );
                endwhile;
                ?>
                </div>
            <?php
            endif;
            ?>
        </div><!-- #content -->
    </section><!-- #primary -->

<?php
//get_sidebar( 'content' );
//get_sidebar();
get_footer();
