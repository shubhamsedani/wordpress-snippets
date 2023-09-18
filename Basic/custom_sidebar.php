<?php
/**
 * Register Custom Sidebar
 *
 * This code registers a custom sidebar for use in the theme.
 *
 * @package Your_Theme
 */

// Register a custom sidebar
function ss_custom_register_sidebar()
{
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'your-theme-textdomain'),
        'id'            => 'custom-sidebar',
        'description'   => __('Add widgets here to display in the custom sidebar.', 'your-theme-textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'ss_custom_register_sidebar');
