<?php
/**
 * WordPress SVG Support and Styles
 *
 * This code snippet adds support for SVG image uploads and applies necessary styles for proper rendering.
 * It is compatible with WordPress version 4.7.1 and higher.
 *
 * Author: [Your Name]
 */

// Add SVG support
add_filter('wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype($filename, $mimes);
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

// Define SVG as an allowed mime type
function cc_mime_types($mimes){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Apply styles for SVG rendering
function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'fix_svg');
