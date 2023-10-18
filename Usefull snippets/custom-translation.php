<?php
/**
 * Custom translation function using gettext filter in WordPress.
 *
 * This function translates strings based on the text domain and original string.
 *
 * @param string $translated Translated string.
 * @param string $text       Original string.
 * @param string $domain     Text domain.
 * @return string            Translated string.
 */
function custom_translate_strings($translated, $text, $domain) {
    switch ($domain) {
        case 'your-theme-text-domain':
            switch ($text) {
                case 'Hello, World!':
                    $translated = 'Hola, Mundo!';
                    break;
                // Add more cases for other strings in your theme.
            }
            break;

        // Add cases for other text domains if needed.

        default:
            break;
    }

    return $translated;
}

add_filter('gettext', 'custom_translate_strings', 10, 3);
