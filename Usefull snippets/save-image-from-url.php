<?php
/**
 * Save Image from URL
 *
 * This function checks if an image exists locally in the media library based on its URL.
 * If not, it fetches the image from the URL and uploads it to the WordPress media library.
 *
 * @param string $url  The URL of the image to fetch and save.
 */
function saveImageFromURL($url)
{
    // Check if the file exists locally in the media library based on its URL
    $attachment_id = attachment_url_to_postid($url);

    if (!$attachment_id) {
        // The image doesn't exist locally, so fetch it from the URL
        $imageData = wp_remote_get($url);

        if (is_wp_error($imageData)) {
            die('Failed to fetch image from URL: ' . $imageData->get_error_message());
        }

        $imageData = $imageData['body'];

        // Determine the image format based on MIME type
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $finfo->buffer($imageData);
        $supported_formats = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
        ];

        if (!isset($supported_formats[$mime_type])) {
            die('Unsupported image format.');
        }

        $format = $supported_formats[$mime_type];

        // Create a unique file name for the image
        $file_name = uniqid() . '.' . $format;

        // Upload the image to the WordPress media library
        $upload = wp_upload_bits($file_name, null, $imageData);

        if (!$upload['error']) {
            // The image was successfully uploaded
            $attachment_id = wp_insert_attachment([
                'post_mime_type' => $mime_type,
                'post_title' => sanitize_file_name($file_name),
                'post_content' => '',
                'post_status' => 'inherit',
            ], $upload['file']);

            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
            wp_update_attachment_metadata($attachment_id, $attachment_data);
        } else {
            die('Failed to upload the image to the media library.');
        }
    }
}

// Example usage:
$url = 'https://upload.wikimedia.org/wikipedia/commons/7/70/Example.png';
saveImageFromURL($url);
