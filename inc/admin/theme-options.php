<?php

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
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
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
        add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'navbar-theme-options', array($this, 'create_admin_page'));
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option('my_option_name');
        ?>
        <div class="wrap">
            <?php screen_icon(); ?>
            <h2>My Settings</h2>

            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('my_option_group');
                do_settings_sections('my-setting-admin');
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
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'My Custom Settings', // Title
            array($this, 'print_section_info'), // Callback
            'my-setting-admin' // Page
        );

        add_settings_field(
            'category_ids', // ID
            'Categories to display on frontend', // Title
            array($this, 'category_ids_callback'), // Callback
            'my-setting-admin', // Page
            'setting_section_id' // Section
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = array();
        $string = $input['category_ids'];

        $string = preg_replace(
            array(
                '/[^\d,]/', // Matches anything that's not a comma or number.
                '/(?<=,),+/', // Matches consecutive commas.
                '/^,+/', // Matches leading commas.
                '/,+$/' // Matches trailing commas.
            ),
            '', // Remove all matched substrings.
            $string
        );
        $array = array_filter(explode(",", $string));
        $string = implode(",", $array);

        if (isset($string))
            $new_input['category_ids'] = $string;

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
    public function category_ids_callback()
    {
        printf(
            '<input type="text" id="category_ids" name="my_option_name[category_ids]" value="%s" />',
            isset($this->options['category_ids']) ? esc_attr($this->options['category_ids']) : ''
        );
    }

}

if (is_admin())
    $my_settings_page = new MySettingsPage();