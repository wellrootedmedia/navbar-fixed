<?php global $post; ?>
<div>
    <?php
    $postContent = $post->post_content;
    $beforeColon = substr($postContent, 0, strpos($postContent,'[gallery'));
    echo $beforeColon;
    echo '<br/>';
    $images = get_attached_media( 'image' );
    if(is_array($images)):
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
    no images
    <?php endif; ?>
</div>