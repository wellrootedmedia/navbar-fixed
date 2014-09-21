<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shawn Nolan Jr knows WordPress, Photography, video editing & programming. Shawn Nolan Jr enjoys surfing, motox, snowboarding, being with his family and outdoors.">
    <meta name="author" content="Shawn Nolan A.K.A. intractvmedia">

    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/respond.min.js"></script>
    <![endif]-->

    <?php
    wp_head();
    wp_enqueue_script('jquery');
    ?>

    <?php if ( is_user_logged_in() ) {
        ?>
        <style type="text/css">
            .navbar-fixed-top {
                top: 32px;
            }

            .container.marketing {
                margin-top: 33px;
            }

            .fancybox-overlay {
                z-index: 999999999;
            }

            @media screen and (max-width: 600px) {

                #wpadminbar {
                    position: fixed;
                }
            }
            @media (max-width: 782px) {

                .navbar-fixed-top {
                    top: 46px;
                }
            }
        </style>
    <?php
    } ?>
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1374650836096330&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
            </div>

            <div class="navbar-collapse collapse">
                <?php
                $defaults = array(
                    'theme_location' => '',
                    'menu' => 'main menu',
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => 'nav navbar-nav',
                    'menu_id' => '',
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' => 0,
                    'walker' => ''
                ); wp_nav_menu($defaults);
                ?>

                <form role="search" method="get" id="searchform" class="searchform navbar-form navbar-left" action="<?php bloginfo('url'); ?>/index.php">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" value="" name="s" id="s">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right"><!-- right side menu --></ul>
            </div>

        </div>
    </div>

    <div class="clear"></div>

    <div class="container marketing">
