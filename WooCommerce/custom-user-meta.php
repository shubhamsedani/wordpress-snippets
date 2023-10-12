<?php
/**
 * Add custom user meta field to the WooCommerce dashboard.
 *
 * @param int $user_id User ID.
 */
function custom_add_user_meta_to_account_details($user_id)
{
    if (isset($_POST['account_address'])) {
        update_user_meta($user_id, 'address', sanitize_text_field($_POST['account_address']));
    }
}
add_action('woocommerce_save_account_details', 'custom_add_user_meta_to_account_details');

/**
 * Display the custom user meta field in the account details form.
 */
function custom_add_user_meta_to_account_details_form()
{
    $user_id = get_current_user_id();
    $address = get_user_meta($user_id, 'address', true);
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="account_address"><?php esc_html_e('Address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_address" id="account_address" autocomplete="street-address" value="<?php echo esc_attr($address); ?>" />
    </p>
    <?php
}
add_action('woocommerce_edit_account_form', 'custom_add_user_meta_to_account_details_form');
