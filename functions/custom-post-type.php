<?php

/**
 * bt_create_custom_post_types
 *
 * Creates custom post types inside of the CMS
 *
 * @hooked init
 * @link   https://developer.wordpress.org/reference/functions/register_post_type/
 */
if(!function_exists('bt_create_custom_post_types')){
    function bt_create_custom_post_types(){
        if(function_exists('register_post_type')) {
            register_post_type('custom-post-type', [
                'labels'      => [
                    'name'          => 'Custom Post Type',
                    'singular_name' => 'Custom Post Type'
                ],

                'public'      => false,
                'show_ui'     => true,
                'has_archive' => false
            ]);
        }
    }
    add_action('init', 'bt_create_custom_post_types');
}
