<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
add_action( 'widgets_init', 'shawn_nolan_widgets_init' );
function shawn_nolan_widgets_init() {
    $args = array(
        'name'          => __( 'Shawn Nolan Widgets', 'navbar-fixed' ),
        'id'            => 'unique-sidebar-id',
        'description'   => '',
        'class'         => 'nav',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h1 class="widgettitle">',
        'after_title'   => '</h1>' );
    register_sidebar($args);
}

add_action( 'widgets_init', 'category_widgets_init' );
function category_widgets_init() {
    $args = array(
        'name'          => __( 'Category Widgets', 'navbar-fixed' ),
        'id'            => 'category-widget',
        'description'   => '',
        'class'         => 'nav',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h1 class="widgettitle">',
        'after_title'   => '</h1>' );
    register_sidebar($args);
}