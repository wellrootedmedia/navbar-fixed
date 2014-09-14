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

//function myLoginFooter() {
//    $args = array(
//        //'echo'           => true,
//        'redirect'       => site_url( $_SERVER['REQUEST_URI'] ),
//        'form_id'        => 'loginform',
//        'label_username' => __( 'Username' ),
//        'label_password' => __( 'Password' ),
//        'label_remember' => __( 'Remember Me' ),
//        'label_log_in'   => __( 'Log In' ),
//        'id_username'    => 'user_login',
//        'id_password'    => 'user_pass',
//        'id_remember'    => 'rememberme',
//        'id_submit'      => 'wp-submit',
//        'remember'       => true,
//        'value_username' => NULL,
//        'value_remember' => false
//    );
//
//    wp_login_form( $args );
//}
//add_action('login_message', 'myLoginFooter');
//function my_login_logo_url() {
//    return home_url();
//}
//add_filter( 'login_headerurl', 'my_login_logo_url' );
//
//function my_login_logo_url_title() {
//    return 'Your Site Name and Info';
//}
//add_filter( 'login_headertitle', 'my_login_logo_url_title' );



function retrieveCategories() {
    $catOptions = get_option('my_option_name');

    if($catOptions) {
        return $catOptions['category_ids'];
    }

    return 0;
}

function retrieveParentPortfolioCat() {
    $catOptions = get_option('my_option_name');

    if($catOptions) {
        return $catOptions['parent_portfolio_id'];
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

    if( !empty( $socialNetworks['linkedin_link'] ) && $socialNetworks['linkedin_link'] )
        echo '<div class="social-icon social-linkedin"><a href="' . $socialNetworks['linkedin_link'] . '" target="_blank" data-original-title="LinkedIn">LinkedIn</a></div>';

    echo '</div>';
}

function getCategoryPermalink() {
    $categoryId = get_cat_ID( 'Blog' );
    $categoryLink = get_category_link( $categoryId );

    return $categoryLink;
}