<?php
/**
 * bt_add_editor_capabilities
 *
 * Adds additional permissions to the 'editor' role (this is the role a client account should be given)
 * @link https://developer.wordpress.org/reference/functions/get_role/
 * @link https://developer.wordpress.org/reference/classes/wp_role/
 */
if(!function_exists('bt_add_editor_capabilities')){
    function bt_add_editor_capabilities(){
        $editor = get_role('editor');
        //we need permission to view contact form submissions, edit the theme menu and yoast seo
        //as well as the shop manager permissions which is part of wc core capabilities

        //if the WC_Install class exists we should get the permissions for Woocommerce from it
        $wcPermissions = class_exists('WC_Install')
            ? array_reduce(
                WC_Install::get_core_capabilities(),
                function($wcPermissions, $corePermissions){
                    return array_merge($wcPermissions, $corePermissions);
                },
                []
            ) : [];

        //combine our permissions with the woocommerce permissions
        $permissionsToAdd = array_merge([
            'cfdb7_access',           //allows them to see contact form submissions
            'edit_theme_options',     //allows them to edit menus
            'wpseo_manage_options',   //allows them to manage SEO
            'view_site_health_checks' //allows them to see site health
        ], $wcPermissions);

        foreach ($permissionsToAdd as $permissionToAdd){
            //only assign the permissions to the role if they don't have it already
            if(!$editor->has_cap($permissionToAdd)){
                $editor->add_cap($permissionToAdd);
            }
        }
    }
    add_action('admin_init', 'bt_add_editor_capabilities');
}
