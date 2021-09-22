<?php
/**
 * bt_add_theme_settings_option_page
 *
 * Adds a custom page into the settings menu of Wordpress for theme sections
 *
 * @hooked acf/init
 * @link   https://www.advancedcustomfields.com/resources/acf-init/
 * @link   https://www.advancedcustomfields.com/resources/acf_add_options_page/
 */
function bt_add_theme_settings_option_page() {
    if(function_exists('acf_add_options_page')){
        acf_add_options_page([
            'page_title'  => 'Theme Settings',
            'menu_title'  => 'Theme Settings',
            'menu_slug'   => 'theme-settings',
            'capability'  => 'edit_posts',
            'redirect'    => false,

            //this is added as a submenu inside appearance
            'parent_slug' => 'themes.php'
        ]);
    }
}
add_action('acf/init', 'bt_add_theme_settings_option_page');

/**
 * get_the_option
 *
 * To avoid calling get_field with option as a second parameter make a helper function
 *
 * @param $field
 * @return mixed
 */
if(!function_exists('get_the_option') && function_exists('get_field')){
    $btSelfDefinedOptionFunction = true;

    function get_the_option($field){
        return get_field($field, 'option');
    }
}

/**
 * the_option
 *
 * as most content output functions in Wordpress have an echo variant give the option for one as well
 *
 * @param $field
 */
if(!function_exists('the_option') && isset($btSelfDefinedOptionFunction) && $btSelfDefinedOptionFunction){
    function the_option($field){
        echo get_the_option($field);
    }
}
