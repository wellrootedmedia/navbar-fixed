
<?php
$args = array(
    'category_name' => 'featured',
    'posts_per_page' => '6',
    'order' => 'DESC',
    'paged' => $paged,
    'status' => 'publish',
    'post_type' => 'page'
);
$posts = query_posts($args);

if(!empty($posts)) :
?>
<h2>Featured Content</h2>
<div class="row">
<?php


if ( have_posts() ) :
    navbar_fixed_top_paging_nav();

    while ( have_posts() ) : the_post();
        ?>
        <div class="col-md-3">
            <?php
            if ( has_post_thumbnail() ) {
                echo the_post_thumbnail('loop-thumb', array('class' => 'featurette-image img-thumbnail') );
            } else {
                ?>
                <img class="img-circle img-thumbnail" src="data:image/png;base64," data-src="holder.js/293x196" alt="140x140" style="width: 140px; height: 140px;">
            <?php
            }
            ?>
            <h2><?php the_title(); ?></h2>
            <p><?php the_excerpt(); ?></p>
            <p><a class="btn btn-default" href="<?php the_permalink(); ?>">View details »</a></p>
        </div><!-- /.col-md-3 -->
        <?php
    endwhile;

    navbar_fixed_top_paging_nav();
endif;
?>

</div>

<hr class="featurette-divider">

<?php endif; ?>