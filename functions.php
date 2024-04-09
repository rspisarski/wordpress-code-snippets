<?php

add_action( 'add_attachment', 'ada_image_alt_upload' );

function ada_image_alt_upload( $post_ID ) {

  // Check if uploaded file is an image, else do nothing

	if ( wp_attachment_is_image( $post_ID ) ) {

		$my_image_title = get_post( $post_ID )->post_title;

		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

		// Sanitize the title:  capitalize first letter of every word (other letters lower case):
		$my_image_title = ucwords( strtolower( $my_image_title ) );

		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
		'ID'		=> $post_ID,			// Specify the image (ID) to be updated
		'post_title'	=> $my_image_title,		// Set image Title to sanitized title
		);

		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );

	}
}

function ad_field($field_name = '', $html_tag = 'div', $class = '', $reveal_effect = '', $reveal_delay = 0) {
    $field_value = get_field($field_name);

    if ($field_value !== null && $field_value !== false) {
        $output = sprintf(
            '<%1$s class="%2$s" data-reveal="%3$s" data-reveal-delay="%4$d">%5$s</%1$s>',
            $html_tag,
            esc_attr($class),
            esc_attr($reveal_effect),
            intval($reveal_delay),
            $field_value
        );

        echo $output;
    }
}
