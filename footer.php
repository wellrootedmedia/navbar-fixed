
<footer>
    <div class="col-md-6">
        <p><a href="<?php bloginfo('url'); ?>"><?php echo get_bloginfo( 'description' ); ?></a> <a href="<?php bloginfo('url'); ?>/<?php echo date('Y'); ?>"><?php echo date('Y'); ?></a></p>
    </div>

    <?php retrieveSocialNetworks(); ?>
</footer>

<?php wp_footer(); ?>

<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-11053306-5']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/holder.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/helpers/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
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

        $('.comment-form').find('#submit').addClass('btn btn-lg btn-success');

    });
</script>

</body>
</html>