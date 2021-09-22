<?php
/**
 * enqueue_google_maps
 *
 * Adds google maps scripts to the pages where they're required
 */
if(!function_exists('enqueue_google_maps')) {
    function enqueue_google_maps(){
        $key = acf_get_setting('google_api_key');

        wp_enqueue_script(
            'bt-google-maps',
            "https://maps.googleapis.com/maps/api/js?key={$key}&callback=initMap&libraries=&v=weekly",
            [],
            wp_get_theme()->get('Version'),
            true
        );
    }
}

/**
 * bt_acf_add_google_maps_key
 *
 * Add the google maps api key to the site for acf
 *
 * @return void
 *
 * @hooked acf/init
 */
if(!function_exists('bt_acf_add_google_maps_key')){
    function bt_acf_add_google_maps_key(){
        acf_update_setting('google_api_key', 'YOUR_MAP_KEY_HERE');
    }

    add_action('acf/init', 'bt_acf_add_google_maps_key');
}
