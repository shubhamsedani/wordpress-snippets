<?php
/**
 * WooCommerce - Insert an Ad Banner Between Product Listings on the Shop Page
 *
 * This code adds a banner with a link to shubhamsedani.com between WooCommerce shop page product listings at specific positions.
 * You can customize the product positions where the banner should be inserted and the link URL.
 */

// Initialize a counter to keep track of product positions.
add_action("woocommerce_before_shop_loop", function () {
    $GLOBALS['product_position'] = 1;
});

// Hook to add a banner between WooCommerce shop page product listings.
add_action("woocommerce_shop_loop", function () {
    global $product;

    // Define the positions where you want to insert the banner.
    $positions_to_insert_banner = [3, 5]; // You can customize this array.

    // Define the link URL.
    $link_url = 'https://shubhamsedani.com'; // Customize this URL as needed.

    // Check if the current product position is in the defined positions.
    if (in_array($GLOBALS['product_position'], $positions_to_insert_banner)) {
        ?>
        <li <?php wc_product_class('', $product); ?>>
            <a href="<?php echo esc_url($link_url); ?>">
                <img src="https://shubhamsedani.com/wp-content/themes/shubhamsedani/assets/images/body_background.jpg" alt="">
            </a>
        </li>
        <?php
    }

    // Increment the product position counter.
    $GLOBALS['product_position']++;
}, 1);
