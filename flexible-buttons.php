<?php

require ( PARTIALS . 'flexible-args.php');

echo "<div class='content-block__buttons' data-reveal='fade-up-xsmall' data-reveal-delay='{$animation_delay}'>";
echo "<div class='button__container'>";

while (have_rows('buttons')) : 

	the_row();

	$button_style_classes = ['button']; // set default
    $button_style_classes[] = get_sub_field("button_style") ?: 'button--no-class';

	$link_or_popup = get_sub_field("link_or_popup_form") ?: false;
	switch ($link_or_popup) {
	
		case 'popup':
			$formid = get_sub_field("button_popup")['value'];
			$form_heading_section = get_sub_field("form_heading_section");

			switch ($form_heading_section) {
				case 'no-heading':
					$show_me = false;
					break;
				case 'form-heading':
					$show_me = true;
					break;
				case 'custom-heading':
					$custom_heading_section = get_sub_field("custom_heading_section");
					$show_me = false;
					break;
				default:
					break;
			}

			$popup_button_text = get_sub_field("popup_button_text");

			echo '<a href="#popup-' . $section_number . '" class="popup-inline ' . implode(' ', $button_style_classes) . '">' . $popup_button_text . '</a>';
			echo '<div id="popup-' . $section_number . '" class="white-popup-block mfp-hide">';
			if ($form_heading_section == "custom-heading" && $custom_heading_section) {
				echo $custom_heading_section;
			}
			gravity_form($formid, $display_title = $show_me, $display_description = $show_me, $display_inactive = false, $field_values = null, $ajax = true, $echo = true);
			echo '</div>';
			break;

		default:
		
			$button_url = get_sub_field('button')['url'];
			$button_target = get_sub_field('button')['target'];
			$button_title = get_sub_field('button')['title'];

			echo '<a href="' . $button_url . '" class="' . implode(' ', $button_style_classes) . '"';

			if ($button_target) {
				echo ' target="' . $button_target . '"';
			}

			echo '>' . $button_title . '</a>';
			break;
	}

endwhile;

echo '</div>';
echo '</div>';
?>
