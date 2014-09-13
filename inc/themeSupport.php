<?php
add_theme_support( 'post-thumbnails' );

if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'single-featured-image', 1000, 200, true ); //(cropped)
    add_image_size( 'loop-thumb', 300, 200, true );
    add_image_size( 'image-thumbnail', 100, 100);
    add_image_size( 'featured-image', 1600, 600 );
}
add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    //'audio',
    'quote',
    //'link',
    'gallery'
) );

//add_action('admin_menu', 'theme_options_menu');
//function theme_options_menu() {
//    add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'navbar-theme-options', 'page1_options');
//    add_action( 'admin_init', 'register_mysettings' );
//}
//
//function register_mysettings() {
//    //register our settings
//    register_setting( 'baw-settings-group', 'new_option_name' );
//    register_setting( 'baw-settings-group', 'some_other_option' );
//    register_setting( 'baw-settings-group', 'option_etc' );
//}
//
//function page1_options() {
//    include( get_template_directory() . '/inc/admin/page1.php' );
//}