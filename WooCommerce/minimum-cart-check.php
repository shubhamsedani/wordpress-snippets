<?php

/**
 * Minimum Order Total Check for WooCommerce
 *
 * This code snippet ensures that the WooCommerce cart total meets a minimum requirement
 * before allowing the customer to place an order.
 *
 * Author: shubhamsedani
 *
 * @package YourThemeOrPluginName
 */

add_action('woocommerce_checkout_process', 'wc_minimum_order_amount');
add_action('woocommerce_before_cart', 'wc_minimum_order_amount');

function wc_minimum_order_amount()
{
    // Set this variable to specify a minimum order value
    $minimum = 8000;

    if (WC()->cart->total < $minimum) {
        if (is_cart()) {
            wc_print_notice(
                sprintf(
                    'Your current order total is %s — you must have an order with a minimum of %s to place your order',
                    wc_price(WC()->cart->total),
                    wc_price($minimum)
                ),
                'error'
            );
        } else {
            wc_add_notice(
                sprintf(
                    'Your current order total is %s — you must have an order with a minimum of %s to place your order',
                    wc_price(WC()->cart->total),
                    wc_price($minimum)
                ),
                'error'
            );
        }
    }
}
