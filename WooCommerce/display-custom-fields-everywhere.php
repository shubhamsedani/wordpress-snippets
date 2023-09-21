<?php
/**
 * WooCommerce Custom Cart Item Meta Data Handling
 *
 * This code enhances WooCommerce functionality to handle custom cart item meta data.
 * It allows for displaying and saving additional custom data for items in the WooCommerce cart,
 * both on the cart and checkout pages. The entered data is also saved with the order.
 *
 * @link https://stackoverflow.com/questions/54505642/display-and-save-added-custom-cart-item-data-on-woocommerce-cart-checkout-and-o
 */

// Display custom cart item meta data (in cart and checkout)
add_filter('woocommerce_get_item_data', 'display_cart_item_custom_meta_data', 10, 2);
function display_cart_item_custom_meta_data($item_data, $cart_item)
{
    $meta_key = 'PR CODE';
    if (isset($cart_item['add_size']) && isset($cart_item['add_size'][$meta_key])) {
        $item_data[] = array(
            'key'       => $meta_key,
            'value'     => $cart_item['add_size'][$meta_key],
        );
    }
    return $item_data;
}

// Save cart item custom meta as order item meta data and display it everywhere on orders and email notifications.
add_action('woocommerce_checkout_create_order_line_item', 'save_cart_item_custom_meta_as_order_item_meta', 10, 4);
function save_cart_item_custom_meta_as_order_item_meta($item, $cart_item_key, $values, $order)
{
    $meta_key = 'PR CODE';
    if (isset($values['add_size']) && isset($values['add_size'][$meta_key])) {
        $item->update_meta_data($meta_key, $values['add_size'][$meta_key]);
    }
}
