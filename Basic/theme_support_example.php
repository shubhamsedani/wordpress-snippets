<?php
/**
 * Theme Functions and Setup
 *
 * @package Theme_name
 */

/**
 * Setup theme support and features after theme setup.
 */
function theme_setup()
{
    // Add support for post thumbnails.
    add_theme_support('post-thumbnails');

    // Add support for custom logo.
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'theme_setup');
