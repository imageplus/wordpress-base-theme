<?php

//for translations define the theme domain
define('BT_DOMAIN', 'base-theme');

//this will disable the plugin and theme editors as they shouldn't be used when using GIT
define('DISALLOW_FILE_EDIT', true);

/**
 * bt_add_imageplus_logo
 *
 * Adds the imageplus logo to the admin login pages
 *
 * @hooked login_enqueue_scripts
 * @link   https://developer.wordpress.org/reference/hooks/login_enqueue_scripts/
 */
if(!function_exists('bt_add_imageplus_logo')){
    function bt_add_imageplus_logo(){
        echo '
            <style type="text/css">
                #login h1 a, .login h1 a {
                    background: url(' . get_stylesheet_directory_uri() . '/assets/images/imageplus-logo.png) no-repeat center/cover;
                    
                    height: 80px;
                    width: 248px;   
                }
            </style>
        ';
    }
    add_action('login_enqueue_scripts', 'bt_add_imageplus_logo');
}

/**
 * bt_upload_mime_types
 *
 * Adds svg support to the admin
 *
 * @hooked upload_mimes
 * @link   https://developer.wordpress.org/reference/hooks/upload_mimes/
 */
if(!function_exists('bt_upload_mime_types')){
    function bt_upload_mime_types($mimes){
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'bt_upload_mime_types');
}


/**
 * get_post_index
 *
 * Gets the index for the current iteration of WP_Query
 *
 * @param  ?WP_Query $query
 * @return int
 * @link   https://developer.wordpress.org/reference/classes/wp_query/
 */
if(!function_exists('get_post_index')){
    function get_post_index(WP_Query $query = null): int
    {
        global $wp_query;

        //if we haven't passed a query object use the global query object
        $used_query = is_a($query, WP_Query::class)
            ? $query
            : $wp_query;

        //return the current index
        return $used_query->current_post;
    }
}

/**
 * get_post_count
 *
 * Gets the count for the current number of posts in WP_Query
 *
 * @param  ?WP_Query $query
 * @return int
 * @link   https://developer.wordpress.org/reference/classes/wp_query/
 */
if(!function_exists('get_post_count')){
    function get_post_count(WP_Query $query = null): int
    {
        global $wp_query;

        //if we haven't passed a query object use the global query object
        $used_query = is_a($query, WP_Query::class)
            ? $query
            : $wp_query;

        //return the number of posts disabled on the page
        return $used_query->post_count;
    }
}