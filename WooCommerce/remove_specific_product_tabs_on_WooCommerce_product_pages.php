<?php
/**
 * Custom function to modify WooCommerce product tabs.
 *
 * @param array $tabs An array of product tabs.
 * @return array Modified product tabs.
 */
function remove_custom_product_tabs($tabs)
{
    // Remove the 'description' tab.
    unset($tabs['description']);
    // Remove the 'reviews' tab.
    unset($tabs['reviews']);
    // Remove the 'additional_information' tab.
    unset($tabs['additional_information']);
    // Return the modified tabs array.
    return $tabs;
}

// Hook the custom function to the 'woocommerce_product_tabs' filter.
add_filter('woocommerce_product_tabs', 'remove_custom_product_tabs');
