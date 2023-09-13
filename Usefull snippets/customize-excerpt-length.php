<?php
/**
 * Customize the character limit of excerpts in WordPress.
 *
 * @param int $length The default character limit for excerpts.
 * @return int The custom character limit for excerpts.
 */
function customize_excerpt_length($length)
{
    return 50; // Change this value to set your desired character limit.
}

add_filter('excerpt_length', 'customize_excerpt_length');
