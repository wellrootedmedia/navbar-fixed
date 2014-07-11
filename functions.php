<?php
register_nav_menu( 'primary', 'Primary Menu' );
add_theme_support( 'post-thumbnails' );
add_image_size( 'loop-thumb', 300, 300 );
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