<?php

require_once get_template_directory() ."/functions/site-setup.php";

//setup acf if it exists
if(!class_exists('ACF')){
    require_once get_template_directory() ."/functions/acf-setup.php";

    //if you want a custom options page (requires ACF)
    //require_once get_template_directory() ."/functions/options-page.php";
}

//setup woocommerce if it is installed and active
if(!class_exists('WooCommerce')){
    require_once get_template_directory() ."/functions/woocommerce.php";
}

//if you want custom post types
//require_once get_template_directory() ."/functions/custom-post-type.php";

//if you want to assign extra permissions to the editor role
//require_once get_template_directory() ."/functions/editor-permissions.php";


/**
 * bt_theme_setup
 *
 * Intialise the theme
 *
 * @hooked after_theme_setup
 * @link   https://developer.wordpress.org/reference/hooks/after_setup_theme/
 */
if(!function_exists('bt_theme_setup')){
    function bt_theme_setup(){
        /**
         * this allows Wordpress to add its own <title> tag
         * by adding theme support we're saying we do not use it
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
         */
        add_theme_support('title-tag');

        /**
         * Our themes use post thumbnails so define support
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /**
         * the post default thumbnail size is the default max width for background images on the site
         * 9999 just so images don't actually crop width based on being too tall
         * @link https://developer.wordpress.org/reference/functions/set_post_thumbnail_size/
         */
        set_post_thumbnail_size(2560, 9999);

        /**
         * use custom logo so the logo of the site is changeable through the admin
         * this allows us to use the_custom_logo to display the site logo
         * @link https://developer.wordpress.org/themes/functionality/custom-logo/
         */
        add_theme_support(
            'custom-logo',
            [
                //add width and height in here to define it on the <img> tag
                'flex-width' => true,
                'flex-height' => true,
                'unlink-homepage-logo' => true
            ]
        );

        /**
         * Adds default menus used by all sites
         * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
         * @link https://developer.wordpress.org/reference/functions/register_nav_menu/
         */
        register_nav_menus([
            //header menus (unused by base theme but all sites should have a menu)
            'main'      => 'Main Menu',

            //error 404 page menu
            'error_404' => 'Error Page Menu'
        ]);
    }
    add_action('after_setup_theme', 'bt_theme_setup');
}

/**
 * we_styles
 *
 * Add stylesheets and scrips to Wordpress so they're rendered in wp_head/wp_footer
 *
 * @return void
 * @hooked wp_enqueue_scripts
 */
if(!function_exists('bt_queue_scripts_and_styles')){
    function bt_queue_scripts_and_styles(){

        //adds the default theme stylesheet (tailwindcss)
        wp_enqueue_style(
            'bt-main-styles',
            get_template_directory_uri() . '/assets/css/app.css',
            [],
            wp_get_theme()->get('Version')
        );

        //adds the default theme scripts
        wp_enqueue_script(
            'bt-main-scripts',
            get_template_directory_uri() . '/assets/js/app.js',
            [],
            wp_get_theme()->get('Version'),
            true //this should be loaded after the page in the footer in case its not deferred for some reason
        );

        /**
         * If you want cookie consent enabled remove the below comments
         * and another inside app.js to compile ./modules/cookie-consent.js
         * @link https://www.osano.com/cookieconsent/documentation/javascript-api/
         */

        //wp_enqueue_style(
        //    'we-cookie-consent-styles',
        //    'https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css',
        //    [],
        //    wp_get_theme()->get('Version')
        //);

        //cookie consent js
        //wp_enqueue_script(
        //    'we-cookie-consent-script',
        //    'https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js',
        //    [],
        //    wp_get_theme()->get('Version'),
        //    true
        //);
    }
    add_action('wp_enqueue_scripts', 'bt_queue_scripts_and_styles');
}