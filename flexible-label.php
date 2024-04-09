<?php

require ( PARTIALS . 'flexible-args.php');

$label_color = $args['content_settings']['label_color'] ?: 'transparent-label-color';


$label = get_sub_field('label');
echo "<div class='label content-block__label {$label_color} content-block__content--{$component}' data-reveal='fade-up-xsmall' data-reveal-delay='{$animation_delay}'>{$label}</div>";

?>
