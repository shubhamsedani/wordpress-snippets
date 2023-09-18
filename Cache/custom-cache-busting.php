<?php
/**
 * Custom WordPress Function to Change Asset Version for Caching
 *
 * This function modifies the version of CSS and JS assets to prevent caching issues.
 * It replaces the default version (e.g., '6.0') with a random number to ensure
 * assets are loaded fresh when changes are made.
 *
 * @param string $src    The original asset source URL.
 * @param string $handle The asset handle.
 * @return string        The modified asset source URL.
 */

// Change the CSS and JS version for caching
add_filter('style_loader_src', 'custom_remove_version_css_js', 9999, 2);
add_filter('script_loader_src', 'custom_remove_version_css_js', 9999, 2);

function custom_remove_version_css_js($src, $handle)
{
    $rand_no = rand(10, 1000);
    $handles_with_version = ['style'];
    // Add other script handles here if needed

    if (strpos($src, 'ver=') && !in_array($handle, $handles_with_version, true)) {
        $src = preg_replace('/(ver=)[0-9]+\.[0-9]+\.[0-9]+/', '$1' . '5.2.' . $rand_no, $src);
    }

    return $src;
}
