<style type="text/css">

</style>
<div class="well">
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="clear"></div>

        <div class="entry-meta">
            <?php navbar_fixed_posted_on(); ?>
            <?php edit_post_link( __( 'Edit', 'navbar-fixed-top' ), '<span class="edit-link">', '</span>' ); ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <div class="rightimage">
        <?php
        if ( has_post_thumbnail() ) {
            echo the_post_thumbnail('loop-thumb', array('class' => 'featurette-image img-thumbnail page-featured-image rightimage') );
        } else {
            ?>
            <img class="featurette-image img-thumbnail" src="data:image/png;base64," data-src="holder.js/300x300/auto" alt="Generic placeholder image">
        <?php
        }
        ?>
    </div>

    <hr class="featurette-divider">

    <div class="entry-content page">
        <?php
        the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'navbar-fixed-top' ) );
        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'navbar-fixed-top' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );
        ?>
    </div><!-- .entry-content -->
</div>