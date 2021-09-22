<?php
if(!function_exists('bt_woocommerce_setup')){
    /**
     * Defines all theme support required for woocommerce functionality
     */
    function bt_woocommerce_setup(){
        add_theme_support( 'woocommerce' );

        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }

    add_action('after_setup_theme', 'bt_woocommerce_setup');
}
