<div class="row featurette ">
    <div class="col-md-7">
        <h2 class="featurette-heading">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?>. </a>
        </h2>

        <div class="remove-mobile">
            <p class="lead"><?php the_excerpt(); ?></p>
        </div>
        <p class="lead">Categories: <?php echo get_the_category_list(' | '); ?></p>
        <p class="lead">
            <?php the_tags( 'Tags: ', ', ', '' ); ?>
        </p>
    </div>

    <div class="col-md-5">
        <?php
        if ( has_post_thumbnail() ) {
            echo the_post_thumbnail('loop-thumb', array('class' => 'featurette-image loop-image img-thumbnail') );
        }
        ?>
    </div>
</div>

<hr class="featurette-divider">