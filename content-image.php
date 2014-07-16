<?php if(!is_single()) : ?>
    <!-- START THE FEATURETTES -->

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?>. <span class="text-muted">It'll blow your mind.</span></a>
            </h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
            <p class="lead">Categories: <?php echo get_the_category_list(' | '); ?></p>
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
<?php else: ?>

    <div class="well">
        <header class="entry-header">
            <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
                <div class="entry-meta">
                    <span class="cat-links">Categories: <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'navbar-fixed-top' ) ); ?></span>
                </div><!-- .entry-meta -->
            <?php
            endif;

            if ( is_single() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
            endif;
            ?>
            <div class="entry-meta">
            <span class="post-format">
                <a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'image' ) ); ?>"><?php echo get_post_format_string( 'image' ); ?></a>
            </span>

                <?php navbar_fixed_posted_on(); ?>

                <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                    <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'navbar-fixed-top' ), __( '1 Comment', 'navbar-fixed-top' ), __( '% Comments', 'navbar-fixed-top' ) ); ?></span>
                <?php endif; ?>

                <?php edit_post_link( __( 'Edit', 'navbar-fixed-top' ), '<span class="edit-link">', '</span>' ); ?>
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            if(is_single()) :
                the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'navbar-fixed-top' ) );
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'navbar-fixed-top' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            endif;
            ?>
        </div><!-- .entry-content -->

        <div>
            <?php the_tags( '<footer class="entry-meta">Tags: <span class="tag-links">', ', ', '</span></footer>' ); ?>
        </div>
    </div>

<?php endif; ?>