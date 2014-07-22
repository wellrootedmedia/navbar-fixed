
<!-- FOOTER -->
<footer>
    <div class="col-md-6">
        <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </div>
    <div class="col-md-6 social-icons">
        <div class="social-icon social-facebook"><a href="#" target="_blank" data-original-title="Facebook">Facebook</a></div>
        <div class="social-icon social-twitter"><a href="#" target="_blank" data-original-title="Twitter">Twitter</a></div>
        <div class="social-icon social-vimeo"><a href="#" target="_blank" data-original-title="Vimeo">Vimeo</a></div>
        <div class="social-icon social-youtube"><a href="#" target="_blank" data-original-title="Youtube">Youtube</a></div>
        <div class="social-icon social-linkedin"><a href="#" target="_blank" data-original-title="Linkedin">Linkedin</a></div>
        <div class="social-icon social-wordpress"><a href="#" target="_blank" data-original-title="Wordpress">Wordpress</a></div>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php wp_footer(); ?>
<!--<script src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/js/jquery.js"></script>-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/holder.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.cycle.js"></script>
<!--<script src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/js/jquery.cycle2.video.js"></script>-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.slider.js"></script>
<script>
    jQuery(function($) {

        $('.gallery-icon a').each(function() {
            $(this).find('img').addClass('img-thumbnail');
        });

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

    });
</script>
</body>
</html>