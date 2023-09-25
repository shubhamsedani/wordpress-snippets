<?php
/**
 * WooCommerce Custom User Registration Validation
 *
 * This code handles custom validation during user registration on WooCommerce.
 * It adds validation for first name, last name, and privacy policy consent.
 *
 * This is also be usefull to add the validation for the privacy policy checkbox
 */

function validate_extra_register_fields($username, $email, $validation_errors)
{
    if (isset($_POST['first_name']) && empty($_POST['first_name'])) {
        $validation_errors->add('first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
    }
    if (isset($_POST['last_name']) && empty($_POST['last_name'])) {
        $validation_errors->add('last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));
    }
    if (!is_checkout()) {
        if (!(int) isset($_POST['privacy_policy_reg'])) {
            $validation_errors->add('privacy_policy_reg_error', __('Privacy Policy consent is required!', 'woocommerce'));
        }
    }
    return $validation_errors;
}

add_action('woocommerce_register_post', 'validate_extra_register_fields', 10, 3);
