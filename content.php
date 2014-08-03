<?php if(!is_single()) : ?>
    <?php get_template_part('content', 'loop'); ?>
<?php else: ?>

<div class="well">
    <header class="entry-header">
        <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
            <div class="entry-meta">
                <span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'navbar-fixed' ) ); ?></span>
            </div>
        <?php
        endif;

        the_title( '<h1 class="entry-title">', '</h1>' );
        ?>

        <div class="entry-meta">
            <?php
            if ( 'post' == get_post_type() )
                navbar_fixed_posted_on();

            if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
                ?>
                <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'navbar-fixed' ), __( '1 Comment', 'navbar-fixed' ), __( '% Comments', 'navbar-fixed' ) ); ?></span>
            <?php
            endif;

            edit_post_link( __( 'Edit', 'navbar-fixed' ), '<span class="edit-link">', '</span>' );
            ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <hr class="featurette-divider">

    <?php if ( is_search() ) : ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    <?php else : ?>
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
<!--        --><?php //if(!is_category('Videos')): ?>
<!--        <div class="entry-content mobile">-->
<!--            --><?php //get_template_part('mobile','gallery'); ?>
<!--        </div>-->
<!--        --><?php //endif; ?>
    <?php endif; ?>

    <div>
        <?php the_tags( '<footer class="entry-meta">Tags: <span class="tag-links">', ', ', '</span></footer>' ); ?>
    </div>
</div>

<?php endif; ?>