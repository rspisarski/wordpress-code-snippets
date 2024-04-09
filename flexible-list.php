<?php 

require ( PARTIALS . 'flexible-args.php');

$text_color = $args['content_settings']['text_color'] ?: 'transparent-text-color';
$list_type = get_sub_field('list_type');
$balance_text = (get_sub_field('balance_text')) ? 'balance-text' : '';
$content_font_size = get_sub_field('content_font_size') ?: 'default-font-sizes';
$list_columns = get_sub_field('list_columns') ?: 'one-column';
$list_classes = "content-block__list content-block__list--{$component} {$text_color} {$content_font_size} {$list_columns} {$balance_text}";

if (have_rows('list_content')) : 

echo "<div class='{$list_classes}' data-reveal='fade-up-xsmall' data-reveal-delay='{$animation_delay}'>";

switch ($list_type) {
    
    case 'checkmarks':
    
        echo "<ul class='list-reset checkmarks {$list_classes}'>";
    
    break;
    
    case 'bullets':
        
        echo "<ul class='bullets {$list_classes}'>";
    
    break;
    
    case 'no-bullets':
        
        echo "<ul class='no-bullets {$list_classes}'>";
    
    break;
    
    case 'carets':
        
        echo "<ul class='list-reset carets {$list_classes}'>";
        
    break;
    
    case 'ordered':
            
        echo "<ol class='list-reset {$list_classes}'>";
            
    break;
    
    default:
            
            echo "<ul class='{$list_classes}'>";
            
    break;
            
};

while (have_rows('list_content')) : the_row(); 

    $list_item = get_sub_field('list_item') ?: false;

    if ($list_item) { echo "<li>{$list_item}</li>"; }

endwhile; 
            
switch ($list_type) {
    
    case 'ordered':
        echo "</ol>";
        break;
    
    default:
        echo "</ul>";
        break;
};

echo "</div>";

endif;
?>
