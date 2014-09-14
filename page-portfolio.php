<?php
/* Template Name: page-portfolio */
get_header();
global $post;
?>
    <div class="row">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <?php
            $args = array(
                'type' => 'post',
                'child_of' => '',
                'parent' => retrieveParentPortfolioCat(),
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'hide_empty' => 1,
                'hierarchical' => 1,
                'exclude' => '',
                'include' => '',
                'number' => '',
                'taxonomy' => 'category',
                'pad_counts' => false
            );
            $categories = get_categories($args);
            if(!function_exists('showCategoryImage')) {
                $imageUrl = "";
                function showCategoryImage($cat, $size) {
                    ?>
                    <div class="col-md-3 featured-content">
                        <a class="btn btn-default" href="<?php echo get_category_link($cat->cat_ID); ?>">
                            <h2><?php echo $cat->name; ?> &raquo;</h2>
                            <?php
                            if (function_exists('z_taxonomy_image_url')) {
                                $imageUrl = z_taxonomy_image_url($cat->cat_ID, $size);
                                if(empty($imageUrl)) {
                                    ?>
                                    <img
                                        class="img-square img-responsive"
                                        src="data:image/png;base64,"
                                        data-src="holder.js/237x160/text:View category"
                                        alt="140x140" />
                                <?php
                                } else {
                                    ?>
                                    <img
                                        class="featurette-image img-responsive"
                                        src="<?php echo $imageUrl; ?>" />
                                <?php
                                }
                            }
                            ?>
                        </a>
                    </div>
                    <?php
                }
            }
            if(!empty($categories)) :
                ?>
                <div>
                    <?php the_content(); ?>
                </div>
                <?php
                foreach ( $categories as $category ) {
                    showCategoryImage($category, 'loop-thumb'); ?>
                <?php
                }
            else :
                echo 'Currently no posts...';
            endif;
            wp_reset_query();
            ?>
        <?php endwhile; endif; ?>
    </div>
    <hr class="featurette-divider">
<?php get_footer(); ?>