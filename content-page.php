<style type="text/css">

</style>
<div class="well">

    <div class="social-sharing">
        <div class="twitter share">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo wp_get_shortlink(); ?>" data-via="" data-hashtags="ShawnNolanPhotography">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
        <div class="shortlink share">
            <input type="text" value="<?php echo wp_get_shortlink(); ?>" />
        </div>
        <div class="clear"></div>
    </div>

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="clear"></div>

        <div class="entry-meta">
            <?php navbar_fixed_posted_on(); ?>
            <?php edit_post_link( __( 'Edit', 'navbar-fixed' ), '<span class="edit-link">', '</span>' ); ?>
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
        the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'navbar-fixed' ) );
        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'navbar-fixed' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
        ) );
        ?>
    </div><!-- .entry-content -->
</div>