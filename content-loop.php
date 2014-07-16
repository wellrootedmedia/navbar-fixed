<!-- START THE FEATURETTES -->

<div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?>. </a>
        </h2>
        <p class="lead"><?php the_excerpt(); //display_excerpt( $post->ID ); ?></p>
        <p class="lead">Categories: <?php echo get_the_category_list(' | '); ?></p>
        <p class="lead">
            <?php the_tags( 'Tags: ', ', ', '' ); ?>
        </p>
    </div>
    <div class="col-md-5">
        <?php
        if ( has_post_thumbnail() ) {
            echo the_post_thumbnail('loop-thumb', array('class' => 'featurette-image img-thumbnail') );
        } else {
            ?>
            <img class="featurette-image img-thumbnail" src="data:image/png;base64," data-src="holder.js/300x300/auto" alt="Generic placeholder image">
        <?php
        }
        ?>
    </div>
</div>

<hr class="featurette-divider">

<!-- /END THE FEATURETTES -->