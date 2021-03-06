<?php if(!is_single()) : ?>
    <?php get_template_part('content', 'loop'); ?>
<?php else: ?>

<div class="well">
    <?php
    if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'single-featured-image', array('class' => 'img-responsive') );
    }
    ?>

    <header class="entry-header">
        <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
            <div class="entry-meta">
                <span class="cat-links">Categories: <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'navbar-fixed' ) ); ?></span>
            </div>
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
                <a class="entry-format" href="<?php echo esc_url( get_post_format_link( 'gallery' ) ); ?>"><?php echo get_post_format_string( 'gallery' ); ?></a>
            </span>

            <?php navbar_fixed_posted_on(); ?>

            <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'navbar-fixed' ), __( '1 Comment', 'navbar-fixed' ), __( '% Comments', 'navbar-fixed' ) ); ?></span>
            <?php endif; ?>

            <?php edit_post_link( __( 'Edit', 'navbar-fixed' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <hr class="featurette-divider">

    <div class="entry-content">
        <?php
        the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'navbar-fixed' ) );
        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'navbar-fixed' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );
        ?>
    </div><!-- .entry-content -->
    <div class="entry-content mobile">
        <?php get_template_part('mobile','gallery'); ?>
    </div>

    <div>
        <?php the_tags( '<footer class="entry-meta">Tags: <span class="tag-links">', ', ', '</span></footer>' ); ?>
    </div>

    <?php get_template_part('social', 'media-block'); ?>
</div>

<?php endif; ?>