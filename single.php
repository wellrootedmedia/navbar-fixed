<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="container marketing">

        <div class="row">
            <div class="col-md-8">
                <div class="well">
<!--                --><?php
//                if ( has_post_thumbnail() ) {
//                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'full' );
//                    ?>
<!--                    <div class="jumbotron" style="background-image: url('--><?php //echo $image[0]; ?><!--'); background-position: center;">-->
<!--                        <div class="container">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    --><?php
//                }
//                ?>
                <div class="row">
                    <div class="col-md-12">
                        <h1><?php the_title(); ?></h1>

                        <?php the_content(); ?>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="well sidebar">
                    <ul class="nav">
                        <li>Sidebar</li>
                        <li class="active"><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li>Sidebar</li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li>Sidebar</li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                </div><!--/.well -->
            </div><!--/span-->

        </div>

        <hr class="featurette-divider">

<?php endwhile; endif; ?>

<?php get_template_part('paginate','single'); ?>

<?php get_footer(); ?>