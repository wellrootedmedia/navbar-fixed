
<?php
$args = array(
    'category_name' => 'featured',
    'posts_per_page' => '4',
    'order' => 'menu_order',
    'paged' => $paged,
    'status' => 'publish',
    'post_type' => 'post'
);
$posts = query_posts($args);

if(!empty($posts)) :
?>
<div class="row">

    <?php
    $args = array(
        'type'                     => 'post',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'name',
        'order'                    => 'ASC',
        'hide_empty'               => 1,
        'hierarchical'             => 1,
        'exclude'                  => '',
        'include'                  => '9,6',
        'number'                   => '',
        'taxonomy'                 => 'category',
        'pad_counts'               => false

    );
    $categories = get_categories($args);
    //print_r($categories);
    if (function_exists('z_taxonomy_image_url')) {
        function showCategoryImage($id, $size) {
            $imageUrl = z_taxonomy_image_url($id, $size);
            ?>
            <img
                class="featurette-image img-thumbnail"
                src="<?php
                echo $imageUrl;
                ?>" />
        <?php
        }
    } else {
        function showCategoryImage($id, $size) {}
    }
    foreach ( $categories as $category ) {
        ?>
        <div class="col-md-3 featured-content">
            <h2><?php echo $category->name; ?></h2>
            <?php showCategoryImage($category->cat_ID, 'loop-thumb'); ?>
            <p><a class="btn btn-default" href="<?php echo get_category_link($category->cat_ID); ?>">View <?php echo $category->name; ?> category »</a></p>
        </div><!-- /.col-md-3 -->
        <?php
    }
    ?>

</div>

<hr class="featurette-divider">

<?php endif; ?>