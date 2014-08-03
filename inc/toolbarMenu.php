<?php
function toolbar_link_to_mypage( $wp_admin_bar ) {

    $my_theme = wp_get_theme();
    $say = $my_theme->get( 'Name' ) . " [ " . $my_theme->get( 'Version' ) . " ]";
    $blogUrl = get_site_url() . '/wp-admin/themes.php?page=navbar-theme-options';

    $args = array(
        'id'    => 'theme_version',
        'title' => $say,
        'href'  => $blogUrl,
        'meta'  => array( 'class' => 'current-theme-version' )
    );
    $wp_admin_bar->add_node( $args );
}
add_action( 'admin_bar_menu', 'toolbar_link_to_mypage', 999 );