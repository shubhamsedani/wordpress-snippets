<?php
/**
 * Custom Endpoint for WooCommerce My Account Page
 *
 * This code adds a custom page to the "My Account" section in WooCommerce.
 * It involves rewriting URLs and displaying content for the custom page.
 *
 * @package YourTheme
 * @author shubhamsedani
 */

// Add the new page in my account page
add_filter('woocommerce_account_menu_items', 'wpsh_custom_endpoint', 40);

function wpsh_custom_endpoint($menu_links)
{

    $menu_links = array_slice($menu_links, 0, 5, true)
            // Add your own slug (support, for example) and tab title here below
            + array('custom-page' => 'Custom Page') + array_slice($menu_links, 5, NULL, true);

    return $menu_links;
}

// Add Rewrite to custom Endpoint
add_action('init', "add_rewrite_url_endpoint");

function add_rewrite_url_endpoint()
{
    add_rewrite_endpoint('custom-page', EP_ROOT | EP_PAGES);
}

// Display Endpoint Functions
add_action('woocommerce_account_custom-page_endpoint', 'custom_page_endpoint_function');

function custom_page_endpoint_function()
{
    $custom_content = [];  // Replace with function to return content for the current logged-in user

    wc_get_template('myaccount/custom-page.php');
}
