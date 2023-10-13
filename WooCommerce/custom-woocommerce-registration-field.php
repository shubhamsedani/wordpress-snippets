<?php
/**
 * Add custom field to WooCommerce registration page.
 */
function custom_woocommerce_register_form()
{
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="company_name"><?php esc_html_e('Company Name', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="company_name" id="company_name" autocomplete="organization" value="<?php if(!empty($_POST['company_name'])) echo esc_attr($_POST['company_name']); ?>" />
    </p>
    <?php
}
add_action('woocommerce_register_form_start', 'custom_woocommerce_register_form');

/**
 * Validate and save the custom field during registration.
 *
 * @param int $user_id User ID.
 */
function custom_woocommerce_process_registration($user_id)
{
    if (isset($_POST['company_name'])) {
        update_user_meta($user_id, 'company_name', sanitize_text_field($_POST['company_name']));
    }
}
add_action('woocommerce_created_customer', 'custom_woocommerce_process_registration');
