<?php
/**
 * Add a custom field for price range to a WooCommerce product in the backend.
 *
 * This code adds a custom field for specifying the maximum price for a price range
 * to a product in the WooCommerce backend.
 *
 * @link https://stackoverflow.com/questions/50502449/set-price-range-on-woocommerce-products-without-setting-up-variables
 */

add_action('woocommerce_product_options_pricing', 'add_field_product_options_pricing');
function add_field_product_options_pricing()
{
    global $post;

    echo '<div class="options_group show_if_simple">';

    woocommerce_wp_text_input(array(
        'id'            => '_max_price_for_range',
        'label'         => __('Max price for range', 'woocommerce') . ' (' . get_woocommerce_currency_symbol() . ')',
        'placeholder'   => __('Set the max price for range', 'woocommerce'),
        'description'   => __('Set the max price for range to activate it…', 'woocommerce'),
        'desc_tip'      => 'true',
    ));

    echo '</div>';
}

/**
 * Save product custom field to the database when submitted in the Backend.
 */
add_action('woocommerce_process_product_meta', 'save_product_options_custom_fields', 30, 1);
function save_product_options_custom_fields($post_id)
{
    // Saving custom field value
    if (isset($_POST['_max_price_for_range'])) {
        update_post_meta($post_id, '_max_price_for_range', sanitize_text_field($_POST['_max_price_for_range']));
    }
}

/**
 * Frontend: display a price range when the max price is set for the product.
 */
add_filter('woocommerce_get_price_html', 'custom_range_price_format', 10, 2);
function custom_range_price_format($price, $product)
{
    // Only for simple product type
    if ($product->is_type('simple')) {
        // Get the max price for range
        $max_price = get_post_meta($product->get_id(), '_max_price_for_range', true);

        if (empty($max_price)) {
            return $price; // exit
        }

        $active_price = wc_get_price_to_display($product, array('price' => $product->get_price()));

        $price = sprintf('%s &ndash; %s', wc_price($active_price), wc_price($max_price));
    }
    return $price;
}
