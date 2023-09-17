<?php
/**
 * Ajax example for WordPress.
 *
 * @package YourThemeOrPlugin
 */

/**
 * Callback function for the Ajax request.
 */
function ss_ajax_function()
{
    if (wp_verify_nonce($_POST['_wpnonce'], 'wp_rest')) {
        echo json_encode(array('youSent' => $_POST['some_content']));
        exit;
    } else {
        echo 'nonce check failed';
        exit;
    }
}

add_action('wp_ajax_nopriv_ss_ajax_function', 'ss_ajax_function');
add_action('wp_ajax_ss_ajax_function', 'ss_ajax_function');

/**
 * Enqueue scripts and localize variables for the Ajax functionality.
 */
function ss_enqueue_scripts()
{
    // Enqueue the Ajax script.
    wp_enqueue_script('ajax-script', get_template_directory_uri() . '/js/ajax-script.js', array(), '', true);

    // Create a nonce for the REST API request.
    $rest_nonce = wp_create_nonce('wp_rest');

    // Localize script variables.
    wp_localize_script('ajax-script', 'some_variable', array('ajaxurl' => admin_url('admin-ajax.php'), 'nonce' => $rest_nonce));
}

add_action('wp_enqueue_scripts', 'ss_enqueue_scripts');
