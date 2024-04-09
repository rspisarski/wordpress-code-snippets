<?php 
require ( PARTIALS . 'flexible-args.php');

$image = get_sub_field('image') ?: false;
$object_position = get_sub_field('object_position') ?: 'top';
$object_fit = get_sub_field('object_size') ?: 'cover';

$img_args = array(
    'style' => "--object-position: {$object_position}; --object-fit: {$object_fit};",
    'class' => "content-block__image content-block__image--{$component}"
);

echo "<div class='content-block__image-container' data-reveal='fade-up-xsmall' data-reveal-delay='{$animation_delay}'>";
    echo "<figure class='content-block__figure'>";
        echo wp_get_attachment_image( $image, 'full', '', $img_args );
    echo "</figure>";
echo "</div>";

?>
