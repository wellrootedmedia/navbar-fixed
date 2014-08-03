
<!-- FOOTER -->
<footer>
    <div class="col-md-6">
        <p><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> <a href="<?php bloginfo('url'); ?>/<?php echo date('Y'); ?>"><?php echo date('Y'); ?></a></p>
<!--        <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>-->
    </div>

    <?php retrieveSocialNetworks(); ?>
</footer>

<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/jquery.slider.min.css" rel="stylesheet">
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/social.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Placed at the end of the document so the pages load faster -->

<?php wp_footer(); ?>

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<!--<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css" />-->
<!--<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>-->

<!--<script src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/js/jquery.js"></script>-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/holder.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.cycle.min.js"></script>
<!--<script src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/js/jquery.cycle2.video.js"></script>-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.slider.min.js"></script>

<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<!-- Add Button helper (this is optional) -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<!-- Add Thumbnail helper (this is optional) -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>



<script type="text/javascript">
    jQuery(function($) {

        /* fancybox stuff */

        $('.gallery-icon a').each(function() {
            $(this).addClass('fancybox');
            $(this).attr( "data-fancybox-group", "gallery" );
            $(this).find('img').addClass('img-thumbnail');
        });

        $('.entry-content img').each(function() {
            $( this ).parent().addClass('fancybox');
        });

        $('.fancybox').fancybox({ padding: 0 });

        /* end fancybox stuff */

        $('.navbar-nav').find('.menu-item-has-children').each(function() {
            $(this).addClass('dropdown');
            $(this).find('.sub-menu').addClass('dropdown-menu');
        });

        var liCount = $('.dropdown-menu li').length;

        $('.dropdown-menu li').each(function(item) {
            if (item == liCount) {
                return false;
            }
            $(this).append('<li class="divider"></li>');
        });

        $('ul.nav li.dropdown').hover(function() {
            $(this)
                .find('.dropdown-menu')
                .stop(true, true)
                .delay(200)
                .fadeIn();
        }, function() {
            $(this)
                .find('.dropdown-menu')
                .stop(true, true)
                .delay(200)
                .fadeOut();
        });

        $('.size-full, .size-medium').addClass('img-thumbnail');

    });
</script>

</body>
</html>