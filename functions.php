<?php
register_nav_menu( 'primary', 'Primary Menu' );
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
    //'quote',
    //'link',
    'gallery'
) );

function custom_page_tag_categories() {
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page');
}
add_action( 'admin_init', 'custom_page_tag_categories' );



// [bartag foo="bar"]
function bartag_func($atts) {
    extract(shortcode_atts(array(
            'foo' => 'no foo',
            'baz' => 'default baz',
    ), $atts));

    return "foo = {$foo}";
}
add_shortcode('bartag', 'bartag_func');



if ( ! function_exists( 'navbar_fixed_posted_on' ) ) :
    function navbar_fixed_posted_on() {
        if ( is_sticky() && is_home() && ! is_paged() ) {
            echo '<span class="featured-post">' . __( 'Sticky', 'navbar-fixed-top' ) . '</span>';
        }

        // Set up and print post meta information.
        printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
            esc_url( get_permalink() ),
            esc_attr( get_the_date( 'c' ) ),
            esc_html( get_the_date() ),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            get_the_author()
        );
    }
endif;

if ( ! function_exists( 'navbar_fixed_top_paging_nav' ) ) :
    function navbar_fixed_top_paging_nav() {
        // Don't print empty markup if there's only one page.
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return;
        }

        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links( array(
            'base'     => $pagenum_link,
            'format'   => $format,
            'total'    => $GLOBALS['wp_query']->max_num_pages,
            'current'  => $paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $query_args ),
            'prev_text' => __( '&laquo;', 'navbar-fixed-top' ),
            'next_text' => __( '&raquo;', 'navbar-fixed-top' ),
            'type'  => 'array'
        ) );

        if( is_array( $links ) ) {
            echo '<div class="pagination-wrap"><ul class="pagination">';
            foreach ( $links as $page ) {
                echo '<li>'.$page.'</li>';
            }
            echo '</ul></div>';
        } else {
            echo '<div class="pagination-wrap"></div>';
        }
    }
endif;


function custom_excerpt_more($more) {
    global $post;
    //return '...<br/><button href="'. get_permalink($post->ID) . '" type="button" class="btn btn-default">Read More</button>';
    //return '...<br/><a class="more-link btn btn-default" href="'. get_permalink($post->ID) . '">'. __('Read More', 'navbar-fixed-top') .'</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');

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




require_once( get_template_directory() . '/inc/admin/theme-options.php' );

function retrieveCatsForHomepage() {
    $catOptions = get_option('my_option_name');
    $cats = "";

    if($catOptions) {
        foreach($catOptions as $option) {
            $cats = $option;
        }

        return $cats;
    }

    return 0;

}












//function codex_custom_init() {
//    $args = array(
//        'public' => true,
//        'label'  => 'Books',
//        'capability_type' => 'post',
//        'supports' => array('title', 'editor', 'author', 'post-formats')
//    );
//    register_post_type( 'book', $args );
//}
//add_action( 'init', 'codex_custom_init' );

//function setupCarousel()
//{
//    do something here...
//}
//add_action( 'addCarousel', 'setupCarousel', 1 );




//function theme_options_menu() {
//    add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'navbar-theme-options', 'page1_options');
//    add_action( 'admin_init', 'register_mysettings' );
//}
//add_action('admin_menu', 'theme_options_menu');
//
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