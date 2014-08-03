<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
function shawn_nolan_widgets_init() {
//    <h1>Archives</h1>
//    <ul class="nav">
//        <li><a href="#">January 2012</a></li>
//        <li><a href="#">February 2012</a></li>
//        <li><a href="#">March 2012</a></li>
//    </ul>
    $args = array(
        'name'          => __( 'Shawn Nolan Widgets', 'theme_text_domain' ),
        'id'            => 'unique-sidebar-id',
        'description'   => '',
        'class'         => 'nav',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h1 class="widgettitle">',
        'after_title'   => '</h1>' );
    register_sidebar($args);
}
add_action( 'widgets_init', 'shawn_nolan_widgets_init' );