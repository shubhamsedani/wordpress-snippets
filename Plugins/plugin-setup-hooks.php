<?php

/**
 * Plugin Activation Hook
 *
 * Registers the activation hook for the plugin.
 * @package YourPluginName
 * @author shubhamsedani
 */

register_activation_hook(__FILE__, 'ss_install');

/**
 * Plugin Setup on Activation
 *
 * Handles the initial setup and sets default values for the plugin options.
 */
function ss_install()
{
    // Create a custom table for the plugin.
    // Important: Call this function when using custom post types in the plugin.
    flush_rewrite_rules();
}

/**
 * Plugin Deactivation Hook
 *
 * Registers the deactivation hook for the plugin.
 */
register_deactivation_hook(__FILE__, 'ss_deactivate');

/**
 * Plugin Setup on Deactivation
 *
 * Handles actions when the plugin is deactivated.
 */
function ss_deactivate()
{
    // Perform actions during deactivation.
}

/**
 * Plugin Uninstall Hook
 *
 * Registers the uninstall hook for the plugin.
 */
register_uninstall_hook(__FILE__, 'ss_uninstall');

/**
 * Plugin Setup on Uninstall
 *
 * Handles actions when the plugin is uninstalled.
 */
function ss_uninstall()
{
    // Drop the custom table for the plugin.
}
