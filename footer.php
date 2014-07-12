<hr class="featurette-divider">

<!-- FOOTER -->
<footer>
    <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php wp_footer(); ?>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/bootstrap.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/holder.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.cycle.js"></script>
<!--<script src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/js/jquery.cycle2.video.js"></script>-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.slider.js"></script>
<script>
    $(function() {

        $('.gallery-icon a').each(function(item) {
            $(this).find('img').addClass('img-thumbnail');
        });

        $('.navbar-nav').find('.menu-item-has-children').each(function(){
            $(this).addClass('dropdown');
            $(this).find('.sub-menu').addClass('dropdown-menu');
        });

        $('ul.nav li.dropdown').hover(function() {
            console.log($(this).html());
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