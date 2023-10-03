<?php
/**
 * Custom Rewrite Rule for CPT Page
 *
 * This code adds a custom rewrite rule to handle cases where the CPT name and page name are the same.
 */

// Hook the code to the 'init' action.
add_action('init', function () {
    // Define the rewrite rule.
    // When the URL matches 'cptname/', it will be redirected to 'index.php?pagename=cptname'.
    add_rewrite_rule('cptname/?$', 'index.php?pagename=cptname', 'top');

    // Flush rewrite rules to ensure the new rule is applied.
    flush_rewrite_rules();
}, 2000);
