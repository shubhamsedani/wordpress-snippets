<?php
/**
 * Function to get the post view count.
 *
 * @param int $post_id The post ID.
 * @return int The post view count.
 */
function get_post_view_count($post_id)
{
    $count = get_post_meta($post_id, 'post_view_count', true);
    return empty($count) ? 0 : (int)$count;
}

/**
 * Function to set and update the post view count.
 *
 * @param int $post_id The post ID.
 */
function set_post_view_count($post_id)
{
    $count = get_post_view_count($post_id);
    $count++;
    update_post_meta($post_id, 'post_view_count', $count);
}

/**
 * Function to display the post view count in the single post view.
 */
function display_post_view_count()
{
    if (is_single()) {
        $post_id = get_the_ID();
        $count = get_post_view_count($post_id);
        echo '<p>Views: ' . $count . '</p>';
        set_post_view_count($post_id);
    }
}

add_action('wp_head', 'display_post_view_count');
