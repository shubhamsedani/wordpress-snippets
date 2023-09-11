<?php
/**
 * Add a custom tab to WooCommerce product pages.
 *
 * @param array $tabs An array of product tabs.
 * @return array Modified product tabs.
 */
function add_custom_product_tabs($tabs)
{
    // Add a custom tab.
    $tabs['my_custom_tab'] = array(
        'title'     => __('My Custom Tab', 'woocommerce'),
        'priority'  => 110,
        'callback'  => 'custom_tab_content',
    );

    return $tabs;
}

/**
 * Callback function for the custom tab content.
 */
function custom_tab_content()
{
    echo '<h2>' . __('My Custom Tab', 'woocommerce') . '</h2>';
    // Add your custom content here.
}

// Hook the custom tabs function to the 'woocommerce_product_tabs' filter.
add_filter('woocommerce_product_tabs', 'add_custom_product_tabs');
