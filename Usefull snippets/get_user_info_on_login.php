<?php
/**
 * Hook function to retrieve user login details on login.
 *
 * @param string   $user_login User login name.
 * @param WP_User  $user       WP_User object representing the logged-in user.
 */
function custom_get_login_details($user_login, $user) {
    // Get user ID, login name, email, and password.
    $user_id      = $user->ID;
    $user_name    = $user->user_login;
    $user_email   = $user->user_email;
    $user_password = $user->user_pass;

    // Log user details to the debug log (optional).
    error_log("User ID: $user_id, Username: $user_name, Email: $user_email, Password: $user_password");

    /*
     * The $user object is an instance of the WP_User class, representing the logged-in user.
     * It contains various properties and capabilities related to the user.
     *
     * Here is the structure of the $user object:
     * WP_User Object
     * (
     *     [data] => stdClass Object
     *         (
     *             [ID] => 1
     *             [user_login] => admin
     *             [user_pass] => $P$BCJKhBniAYJMMWlclIpNAi0KCU5g/0/
     *             [user_nicename] => admin
     *             [user_email] => admin@gmail.com
     *             [user_url] => http://localhost/github-snippet-test
     *             [user_registered] => 2023-09-27 17:48:51
     *             [user_activation_key] => Activation key (if applicable)
     *             [user_status] => 0
     *             [display_name] => admin
     *         )
     *
     *     [ID] => 1
     *     [caps] => Array
     *         (
     *             [administrator] => 1
     *         )
     *
     *     [cap_key] => wp_capabilities
     *     [roles] => Array
     *         (
     *             [0] => administrator
     *         )
     *
     *     [allcaps] => Array
     *         (
     *             [capabilities] => Array of all user capabilities
     *         )
     *
     *     [filter] =>
     *     [site_id:WP_User:private] => 1
     * )
     */

    // You can perform additional actions with the retrieved user details here.
}

// Hook the custom_get_login_details function to the 'wp_login' action.
add_action('wp_login', 'custom_get_login_details', 10, 2);
