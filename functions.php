<?php
/* shortcodes */
require_once(get_template_directory() . '/inc/shortcodes.php');
/* toolbar menu*/
require_once(get_template_directory() . '/inc/toolbarMenu.php');
/* theme support */
require_once(get_template_directory() . '/inc/themeSupport.php');
/* sidebar */
require_once(get_template_directory() . '/inc/sidebar.php');
/* theme options */
require_once( get_template_directory() . '/inc/admin/theme-options.php' );


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

//function doSomethingLater()
//{
//    do something here...
//}
//add_action( 'addCarousel', 'doSomethingLater', 1 );

register_nav_menu( 'primary', 'Primary Menu' );

add_action( 'admin_init', 'custom_page_tag_categories' );
function custom_page_tag_categories() {
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page');
}

if ( ! function_exists( 'navbar_fixed_posted_on' ) ) :
    function navbar_fixed_posted_on() {
        if ( is_sticky() && is_home() && ! is_paged() ) {
            echo '<span class="featured-post">' . __( 'Sticky', 'navbar-fixed' ) . '</span>';
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
            'prev_text' => __( '&laquo;', 'navbar-fixed' ),
            'next_text' => __( '&raquo;', 'navbar-fixed' ),
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

add_filter('excerpt_more', 'custom_excerpt_more');
function custom_excerpt_more($more) {
    global $post;
    //return '...<br/><button href="'. get_permalink($post->ID) . '" type="button" class="btn btn-default">Read More</button>';
    //return '...<br/><a class="more-link btn btn-default" href="'. get_permalink($post->ID) . '">'. __('Read More', 'navbar-fixed') .'</a>';
}

function retrieveCatsForHomepage() {
    $catOptions = get_option('my_option_name');

    if($catOptions) {
        return $catOptions['category_ids'];
    }

    return 0;

}

function retrieveSocialNetworks() {
    $socialNetworks = get_option('my_option_name');

    echo '<div class="col-md-6 social-icons">';

    if( !empty( $socialNetworks['facebook_link'] ) && $socialNetworks['facebook_link'] )
        echo '<div class="social-icon social-facebook"><a href="' . $socialNetworks['facebook_link'] . '" target="_blank" data-original-title="Facebook">Facebook</a></div>';

    if( !empty( $socialNetworks['twitter_link'] ) && $socialNetworks['twitter_link'] )
        echo '<div class="social-icon social-twitter"><a href="' . $socialNetworks['twitter_link'] . '" target="_blank" data-original-title="Twitter">Twitter</a></div>';

    if( !empty( $socialNetworks['youtube_link'] ) && $socialNetworks['youtube_link'] )
        echo '<div class="social-icon social-youtube"><a href="' . $socialNetworks['youtube_link'] . '" target="_blank" data-original-title="YouTube">YouTube</a></div>';

    echo '</div>';
}