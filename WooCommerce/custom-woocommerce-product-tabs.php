<?php
/**
 * Remove unnecessary product tabs.
 *
 * @param array $product_tabs An array of product tabs.
 * @return array Modified array of product tabs.
 */

function custom_remove_product_tabs($product_tabs)
{
    unset($product_tabs['description']); // Remove the 'description' tab
    unset($product_tabs['reviews']); // Remove the 'reviews' tab
    unset($product_tabs['additional_information']); // Remove the 'additional_information' tab
    return $product_tabs;
}

// Hook into WooCommerce to modify product tabs
add_filter('woocommerce_product_tabs', 'custom_remove_product_tabs');
