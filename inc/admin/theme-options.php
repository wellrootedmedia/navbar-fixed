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

                settings_fields('social_network_group');
                do_settings_sections('social-settings-admin');
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
            'my_option_group',
            'my_option_name',
            array($this, 'sanitize')
        );
        add_settings_section(
            'setting_section_id',
            'My Custom Settings',
            array($this, 'print_section_info'),
            'my-setting-admin'
        );
        add_settings_field(
            'category_ids',
            'Categories to display on frontend',
            array($this, 'category_ids_callback'),
            'my-setting-admin',
            'setting_section_id'
        );
        add_settings_field(
            'portfolio_category_ids',
            'Portfolio categories to display',
            array($this, 'portfolio_category_ids_callback'),
            'my-setting-admin',
            'setting_section_id'
        );

        register_setting(
            'social_network_group',
            'my_option_name',
            array($this, 'sanitize')
        );
        add_settings_section(
            'social_section_id',
            'Social Networks',
            array($this, 'social_section_info'),
            'social-settings-admin'
        );
        add_settings_field(
            'facebook_link',
            'Enter facebook link',
            array($this, 'facebook_link_callback'),
            'social-settings-admin',
            'social_section_id'
        );
        add_settings_field(
            'twitter_link',
            'Enter Twitter link',
            array($this, 'twitter_link_callback'),
            'social-settings-admin',
            'social_section_id'
        );
        add_settings_field(
            'linkedin_link',
            'Enter LinkedIn link',
            array($this, 'linkedin_link_callback'),
            'social-settings-admin',
            'social_section_id'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input) {
        $new_input = array();

        $homePageCats = $input['category_ids'];
        $catString = $this->replaceStringForIntegers($homePageCats);
        $portfolioPageCats = $input['portfolio_category_ids'];
        $portCatString = $this->replaceStringForIntegers($portfolioPageCats);

        if (isset($homePageCats))
            $new_input['category_ids'] = $catString;

        if (isset($portfolioPageCats))
            $new_input['portfolio_category_ids'] = $portCatString;

        if (isset($input['facebook_link']))
            $new_input['facebook_link'] = sanitize_text_field( $input['facebook_link'] );

        if (isset($input['twitter_link']))
            $new_input['twitter_link'] = sanitize_text_field( $input['twitter_link'] );

        if (isset($input['linkedin_link']))
            $new_input['linkedin_link'] = sanitize_text_field( $input['linkedin_link'] );

        return $new_input;
    }

    private function replaceStringForIntegers($string) {
        $array = array_filter(explode(",", $string));
        $string = implode(",", $array);

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

        return $string;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    public function social_section_info() {
        print 'Enter your social settings below:';
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
    public function portfolio_category_ids_callback()
    {
        printf(
            '<input type="text" id="portfolio_category_ids" name="my_option_name[portfolio_category_ids]" value="%s" />',
            isset($this->options['portfolio_category_ids']) ? esc_attr($this->options['portfolio_category_ids']) : ''
        );
    }

    public function facebook_link_callback() {
        printf(
            '<input type="text" id="facebook_link" name="my_option_name[facebook_link]" value="%s" />',
            isset($this->options['facebook_link']) ? esc_attr($this->options['facebook_link']) : ''
        );
    }

    public function twitter_link_callback() {
        printf(
            '<input type="text" id="twitter_link" name="my_option_name[twitter_link]" value="%s" />',
            isset($this->options['twitter_link']) ? esc_attr($this->options['twitter_link']) : ''
        );
    }

    public function linkedin_link_callback() {
        printf(
            '<input type="text" id="linkedin_link" name="my_option_name[linkedin_link]" value="%s" />',
            isset($this->options['linkedin_link']) ? esc_attr($this->options['linkedin_link']) : ''
        );
    }

}

if (is_admin())
    $my_settings_page = new MySettingsPage();