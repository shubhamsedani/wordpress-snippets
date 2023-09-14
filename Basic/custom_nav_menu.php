<?php
/**
 * Custom Navigation Menu
 *
 * This code registers and displays a custom navigation menu.
 *
 * @package YourTheme
 */

/**
 * Register Custom Navigation Menu
 *
 * This function registers a custom navigation menu with WordPress.
 */
function yourtheme_register_custom_menu()
{
    register_nav_menu('custom-menu', __('Custom Navigation Menu', 'yourtheme'));
}
add_action('init', 'yourtheme_register_custom_menu');

/**
 * Display Custom Navigation Menu
 *
 * This function displays the custom navigation menu in your theme.
 *
 * @param string $menu_class CSS class for the menu.
 */
function yourtheme_display_custom_menu($menu_class = 'custom-menu')
{
    wp_nav_menu(array(
        'theme_location' => 'custom-menu',
        'menu_class'     => $menu_class,
    ));
}
