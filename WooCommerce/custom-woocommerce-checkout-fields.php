<?php
/**
 * Custom WooCommerce Checkout Fields
 *
 * This code snippet removes specific fields from the WooCommerce checkout page.
 */

// Remove Billing Address Fields
function remove_billing_fields($fields)
{
    unset($fields['billing_company']);
    unset($fields['billing_country']);
    unset($fields['billing_state']);
    return $fields;
}
add_filter('woocommerce_billing_fields', 'remove_billing_fields', 10, 1);

// Remove Shipping Address Fields
function remove_shipping_fields($fields)
{
    unset($fields['shipping_company']);
    unset($fields['shipping_country']);
    unset($fields['shipping_state']);
    return $fields;
}
add_filter('woocommerce_shipping_fields', 'remove_shipping_fields', 10, 1);

// Remove Additional Fields
function remove_additional_checkout_fields($fields)
{
    unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_phone']);
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'remove_additional_checkout_fields');
