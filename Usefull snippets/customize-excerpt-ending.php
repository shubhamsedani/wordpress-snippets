<?php
/**
 * Customize the ending of shortened excerpts in WordPress.
 *
 * @param string $more The current excerpt ending.
 * @return string The modified excerpt ending.
 */

function custom_excerpt_more($more)
{
    return '...'; // Change this to your desired ending, like 'Read more'.
}

add_filter('excerpt_more', 'custom_excerpt_more');
