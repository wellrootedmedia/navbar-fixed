<?php global $post; ?>
<div>
    <?php
    $postContent = $post->post_content;
    $beforeColon = substr($postContent, 0, strpos($postContent,'[gallery'));

    $images = get_attached_media( 'image' );
    //print_r($images);
    $gallery = get_post_gallery_images( $post );

    if(!empty($images)):
        echo $beforeColon;
    ?>
        <div id="main-slider" class="mobile-slider">
            <section class="featured-slider">
                <?php
                foreach($images as $image) {
                    ?>
                    <article class="post hentry slides demo-image displayblock">
                        <figure class="slider-image">
                            <img src="<?php echo $image->guid; ?>"
                                 class="wp-post-image img-responsive"
                                 alt="<?php echo $image->post_title; ?>"
                                 title="<?php echo $image->post_title; ?>">
                        </figure>
                    </article>
                <?php
                }
                wp_reset_query();
                ?>
            </section>

            <div id="slider-nav" class="mobile-slider-nav">
                <a class="slide-previous"><span>Previous</span></a>
                <a class="slide-next"><span>Next</span></a>
            </div>
        </div>
    <?php else : ?>
        <?php
        echo $beforeColon;
        ?>
    <?php endif; ?>
</div>