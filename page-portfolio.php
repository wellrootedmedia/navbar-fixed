<?php
/* Template Name: page-portfolio */
get_header();
global $post;
?>
    <div class="row">
        <?php
        $args = array(
            'type'                     => 'post',
            'child_of'                 => '',
            'parent'                   => '',
            'orderby'                  => 'menu_order',
            'order'                    => 'ASC',
            'hide_empty'               => 1,
            'hierarchical'             => 1,
            'exclude'                  => '',
            'include'                  => retrievePortfolioCats(),
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
                    if(empty($imageUrl)) {
                        ?>
                        <img
                            class="img-square img-thumbnail"
                            src="data:image/png;base64,"
                            data-src="holder.js/237x160/text:placeholder"
                            alt="140x140" />
                    <?php
                    } else {
                        ?>
                        <img
                            class="featurette-image img-thumbnail"
                            src="<?php
                            echo $imageUrl;
                            ?>" />
                    <?php
                    }
                }
            }
        }
        foreach ( $categories as $category ) {
            ?>
            <div class="col-md-3 featured-content">
                <a class="btn btn-default" href="<?php echo get_category_link($category->cat_ID); ?>">
                    <h2><?php echo $category->name; ?> &raquo;</h2>
                    <?php showCategoryImage($category->cat_ID, 'loop-thumb'); ?>
                </a>
            </div>
        <?php
        }
        wp_reset_query();
        ?>
    </div>
    <hr class="featurette-divider">
<?php get_footer(); ?>