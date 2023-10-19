<?php
/**
 * WooCommerce Free Shipping Notice
 *
 * This script displays a notice in the WooCommerce cart to encourage customers to add more
 * products to qualify for free shipping.
 */

function custom_free_shipping_notice() {
    $min_amount = 50; // Set the minimum amount for free shipping
    $cart_total = WC()->cart->get_cart_contents_total();

    if ($cart_total < $min_amount) {
        $remaining_amount = wc_price($min_amount - $cart_total);
        $message = "Spend an additional $remaining_amount to qualify for free shipping!";
        wc_print_notice($message, 'notice');
    }
}
add_action('woocommerce_before_cart', 'custom_free_shipping_notice');
