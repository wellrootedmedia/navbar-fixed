
<?php
$args = array(
    'category_name' => 'featured',
    'posts_per_page' => '4',
    'order' => 'menu_order',
    'paged' => $paged,
    'status' => 'publish',
    'post_type' => 'page'
);
$posts = query_posts($args);

if(!empty($posts)) :
?>
<div class="row">
<?php


if ( have_posts() ) :
    navbar_fixed_top_paging_nav();

    while ( have_posts() ) : the_post();
        // Get the ID of a given category
        $category_id = get_cat_ID( the_title('', '', false) );
        // Get the URL of this category
        $category_link = get_category_link( $category_id );
        ?>
        <div class="col-md-3 featured-content">
            <h2><?php the_title(); ?></h2>
            <?php
            if ( has_post_thumbnail() ) {
                echo the_post_thumbnail('loop-thumb', array('class' => 'featurette-image img-thumbnail') );
            } else {
                ?>
                <img class="img-circle img-thumbnail" src="data:image/png;base64," data-src="holder.js/293x196" alt="140x140" style="width: 140px; height: 140px;">
            <?php
            }
            ?>
            <p><a class="btn btn-default" href="<?php echo $category_link; ?>">View <?php the_title(); ?> details »</a></p>
        </div><!-- /.col-md-3 -->
        <?php
    endwhile;

    navbar_fixed_top_paging_nav();
endif;
?>

</div>

<hr class="featurette-divider">

<?php endif; ?>