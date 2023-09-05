<?php
/**
 * Loop Through ACF Repeater Field
 *
 * This code demonstrates how to loop through a repeater field created with
 * Advanced Custom Fields (ACF) and display the 'text' subfield values.
 *
 * @link https://www.advancedcustomfields.com/ For more information on ACF.
 * 
 * @author shubhamsedani
 */

if (have_rows('repeater')) {
    // Loop through the rows of data.
    while (have_rows('repeater')) {
        the_row();
        $text = get_sub_field('text');

        // Check if 'text' subfield is not empty.
        if (!empty($text)) {
            echo $text;
        }
    }
} else {
    echo 'Nothing found';
}
?>
