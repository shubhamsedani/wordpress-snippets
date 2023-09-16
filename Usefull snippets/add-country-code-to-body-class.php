<?php
/**
 * Add Country Code to Body Class
 *
 * Add the user's country code to the body class of the WordPress site.
 */

/**
 * Add the country code to the body class.
 *
 * @param array $classes Current body classes.
 * @return array Modified body classes.
 */
function add_country_code_to_body_class($classes)
{
    // Get the country code (you can replace this with your own logic)
    $country_code = get_country_code(); // Replace with your function to get the country code

    error_log('Country Code: ' . $country_code); // Log the country code

    // Add the country code to the body classes
    if (!empty($country_code)) {
        $classes[] = 'country-' . sanitize_html_class($country_code);
    }

    return $classes;
}
add_filter('body_class', 'add_country_code_to_body_class');

/**
 * Get the user's country code based on IP address.
 *
 * @return string User's country code or an empty string if not found.
 */
function get_country_code()
{
    $ip = $_SERVER['REMOTE_ADDR']; // Get the user's IP address

    // Make a request to ipinfo.io to get location information
    // To get the token, you need to sign up at https://ipinfo.io/
    $response = wp_safe_remote_get("http://ipinfo.io/{$ip}?token=YOUR_TOKEN_HERE");

    if (!is_wp_error($response)) {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body);

        // Check if the 'country' property is available in the response
        if (isset($data->country)) {
            return sanitize_text_field($data->country); // Return the country code
        }
    }

    return ''; // Return an empty string if the country code is not found
}
