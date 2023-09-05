<?php
/**
 * WooCommerce Shipping Cost Adjustment
 *
 * This code snippet adjusts the shipping cost by adding an extra charge of 10 units for each item 
 * if the cart contains more than 15 products.
 *
 * Author: shubhamsedani
 */

add_filter('woocommerce_package_rates', 'filter_shipping_rates_costs', 10, 2);

function filter_shipping_rates_costs($rates, $package)
{
    // Initialize the product count with a base value of -15.
    $product_count = -15;

    // Calculate the total product count in the cart.
    if (!empty($package['contents'])) {
        foreach ($package['contents'] as $cart_item) {
            $product_count += $cart_item['quantity'];
        }
    }

    // Check if there are shipping rates and the product count is greater than 0.
    if (!empty($rates) && $product_count > 0) {
        foreach ($rates as $rate_key => $rate) {
            // Check if the shipping method is 'flat_rate'.
            if ('flat_rate' == $rate->method_id) {

                // Calculate the new cost by adding an extra charge of 10 units for each item.
                $original_cost = $rate->cost;
                $new_cost = $original_cost + ($product_count * 10);

                // Calculate new tax rates proportionally.
                $new_tax_rates = $rates[$rate_key]->taxes;

                foreach ($rate->taxes as $key => $value) {
                    $new_tax_rates[$key] = (($new_cost * (($value / $original_cost) * 100)) / 100);
                }

                // Update the shipping cost and tax rates.
                $rates[$rate_key]->cost = $new_cost;
                $rates[$rate_key]->taxes = $new_tax_rates;
            }
        }
    }

    return $rates;
}
