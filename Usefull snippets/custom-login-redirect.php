<?php
/**
 * Custom Login Redirect
 *
 * Redirects users to specific pages after login based on their role.
 *
 * @param string $redirect_to   The original redirect destination.
 * @param string $request       The login request.
 * @param WP_User $user         The logged-in user object.
 * @return string               The updated redirect URL.
 */
function custom_login_redirect($redirect_to, $request, $user)
{
    // Check if the user object is valid and exists.
    if (is_a($user, 'WP_User') && $user->exists()) {
        $url = '';

        // Check if the user has 'administrator' role.
        if ($user->has_cap('administrator')) {
            $url = admin_url();
        } else {
            // Redirect other users to the welcome page.
            $url = home_url('/welcomepage/');
        }

        return $url;
    }

    // Return the original redirect destination if the user is not valid.
    return $redirect_to;
}

// Hook the custom login redirect function to the 'login_redirect' filter.
add_filter('login_redirect', 'custom_login_redirect', 10, 3);
