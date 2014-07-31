
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
        'include'                  => retrieveCatsForHomepage(),
        'number'                   => '',
        'taxonomy'                 => 'category',
        'pad_counts'               => false

    );
    $categories = get_categories($args);

    if(!function_exists('showCategoryImage')) {
        $imageUrl = "";
        function showCategoryImage($id, $size) {
            if (function_exists('z_taxonomy_image_url')) {
                $imageUrl = z_taxonomy_image_url($id, $size);
                ?>
                <img
                    class="featurette-image img-thumbnail"
                    src="<?php
                    echo $imageUrl;
                    ?>" />
                <?php
            } else {
                ?>
                <img class="img-square img-thumbnail" src="data:image/png;base64," data-src="holder.js/300x200/text:placeholder" alt="140x140" style="width: 140px; height: 140px;">
                <?php
            }
        }
    }

    foreach ( $categories as $category ) {
        ?>
        <div class="col-md-3 featured-content">
            <h2><?php echo $category->name; ?></h2>
            <a class="btn btn-default" href="<?php echo get_category_link($category->cat_ID); ?>"><?php showCategoryImage($category->cat_ID, 'loop-thumb'); ?>
            <p>View <?php echo $category->name; ?> category »</p></a>
        </div><!-- /.col-md-3 -->
        <?php
    }
    ?>

</div>

<hr class="featurette-divider">
