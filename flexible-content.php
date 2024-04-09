<?php 

require ( PARTIALS . 'flexible-args.php');


$content = get_sub_field("content");
$content_font_size = get_sub_field("content_font_size") ?: 'default-size';
$content_width = get_sub_field("content_width") ?: 100;

$balance_text = (get_sub_field('balance_text')) ? 'balance-text' : '';

$text_color = $args['content_settings']['text_color'] ?: 'no-bg-text-color';

echo "<div class='content-block__content content-block__content--{$component} {$content_font_size} {$balance_text} {$text_color}' style='--content-width: {$content_width}%' data-reveal='fade-up-xsmall' data-reveal-delay='{$animation_delay}'>";
    echo $content;
echo "</div>";

?>