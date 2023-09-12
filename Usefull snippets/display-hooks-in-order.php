<?php
/**
 * Display WordPress hooks in execution order.
 *
 * This code snippet will display WordPress hooks in the order they are executed.
 *
 * @package YourThemeOrPlugin
 * @link https://wordpress.stackexchange.com/questions/162862/how-to-get-wordpress-hooks-actions-run-sequence
 */

// Add an action hook to display WordPress hooks on shutdown.
add_action( 'shutdown', 'display_wordpress_hooks_in_execution_order' );

/**
 * Display WordPress hooks in execution order.
 *
 * This function will be called on shutdown to display WordPress hooks.
 */
function display_wordpress_hooks_in_execution_order() {
    // Get the list of WordPress actions.
    global $wp_actions;

    // Check if the $wp_actions global variable is set.
    if ( isset( $wp_actions ) && is_array( $wp_actions ) ) {
        // Loop through the actions and counts.
        foreach ( $wp_actions as $action => $count ) {
            // Output the action name and the number of times it was executed.
            printf( '%s (%d) <br/>' . PHP_EOL, $action, $count );
        }
    } else {
        // If $wp_actions is not set or not an array, display an error message.
        echo 'WordPress actions not available.';
    }
}
