<?php
register_nav_menu( 'primary', 'Primary Menu' );
add_theme_support( 'post-thumbnails' );
add_image_size( 'loop-thumb', 300, 300 );
add_image_size( 'single-image', 848, 270 );
add_image_size( 'featured-image', 1600, 600 );
add_theme_support( 'post-formats', array(
    //'aside',
    'image',
    'video',
    //'audio',
    //'quote',
    //'link',
    'gallery'
) );

function codex_custom_init() {
    $args = array(
        'public' => true,
        'label'  => 'Books',
        'capability_type' => 'post',
        'supports' => array('title', 'editor', 'author', 'post-formats')
    );
    register_post_type( 'book', $args );
}
add_action( 'init', 'codex_custom_init' );



function custom_page_tag_categories() {
    register_taxonomy_for_object_type('post_tag', 'page');
    register_taxonomy_for_object_type('category', 'page');
}
add_action( 'admin_init', 'custom_page_tag_categories' );


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



class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
//        add_options_page(
//            'Settings Admin',
//            'My Settings',
//            'manage_options',
//            'my-setting-admin',
//            array( $this, 'create_admin_page' )
//        );
        add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'navbar-theme-options', array( $this, 'create_admin_page' ));
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'my_option_name' );
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>My Settings</h2>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields( 'my_option_group' );
                do_settings_sections( 'my-setting-admin' );
                submit_button();
                ?>
            </form>
        </div>
    <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'my_option_group', // Option group
            'my_option_name', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'My Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );

        add_settings_field(
            'id_number', // ID
            'ID Number', // Title
            array( $this, 'id_number_callback' ), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section
        );

        add_settings_field(
            'title',
            'Title',
            array( $this, 'title_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );

        add_settings_field(
            'featured_page',
            'Featured Page Id',
            array( $this, 'featured_page_callback' ),
            'my-setting-admin',
            'setting_section_id'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['id_number'] ) )
            $new_input['id_number'] = absint( $input['id_number'] );

        if( isset( $input['title'] ) )
            $new_input['title'] = sanitize_text_field( $input['title'] );

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function id_number_callback()
    {
        printf(
            '<input type="text" id="id_number" name="my_option_name[id_number]" value="%s" />',
            isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function title_callback()
    {
        printf(
            '<input type="text" id="title" name="my_option_name[title]" value="%s" />',
            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
        );
    }

    public function featured_page_callback()
    {
        printf(
            '<input type="text" id="featured_page" name="my_option_name[featured_page]" value="%s" />',
            isset( $this->options['featured_page'] ) ? esc_attr( $this->options['featured_page']) : ''
        );
    }
}

if( is_admin() )
    $my_settings_page = new MySettingsPage();