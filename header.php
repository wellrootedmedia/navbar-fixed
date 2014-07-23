<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/ico/favicon.png">

    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/jquery.slider.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/social.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />

    <?php wp_head(); ?>

    <?php wp_enqueue_script('jquery'); ?>

    <?php if ( is_user_logged_in() ) {
        ?>
        <style>
            .navbar-fixed-top {
                top: 32px;
            }
            .container.marketing {
                margin-top: 33px;
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

<?php //do_action( 'addCarousel' ); ?>

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
<!--            <ul class="nav navbar-nav navbar-right">-->
<!--                <li>-->
<!--                    <div class="social-icon social-facebook"><a href="#" target="_blank" data-original-title="Facebook">Facebook</a></div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <div class="social-icon social-twitter"><a href="#" target="_blank" data-original-title="Twitter">Twitter</a></div>-->
<!--                </li>-->
<!--            </ul>-->
        </div>

    </div>
</div>

<div class="clear"></div>

<div class="container marketing">
