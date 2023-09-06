<?php
/**
 * Add a custom page to the WooCommerce "My Account" section.
 *
 * @param array $menu_links My Account menu links.
 * @return array Updated My Account menu links.
 */

function wpsh_custom_endpoint($menu_links)
{
    // Insert your custom page slug and title below.
    $menu_links = array_slice($menu_links, 0, 5, true)
        + array('custom-page' => 'Custom Page') + array_slice($menu_links, 5, NULL, true);

    return $menu_links;
}
add_filter('woocommerce_account_menu_items', 'wpsh_custom_endpoint', 40);

/**
 * Redirect the custom page to the 'contact' page on click.
 *
 * @param string $url       The endpoint URL.
 * @param string $endpoint  The endpoint being checked.
 * @param string $value     The endpoint value.
 * @param bool   $permalink Whether to use permalinks.
 * @return string Updated endpoint URL.
 */
add_filter('woocommerce_get_endpoint_url', function ($url, $endpoint, $value, $permalink) {
    if ($endpoint === 'custom-page') {
        $url = home_url('custom-page');
    }
    return $url;
}, 10, 4);
