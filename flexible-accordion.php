<?php 

require ( PARTIALS . 'flexible-args.php');

$text_color = $args['content_settings']['text_color'] ?: 'transparent-text-color';
$accordion_type = get_sub_field('accordion_type') ?: 'standard' ;
$first_opened = get_sub_field('first_opened') ? 'open' : 'closed';
$multi_expanded = get_sub_field('multi_expanded') ? 'true' : 'false';
$accordion_icon_style = get_sub_field('accordion_icon_style') ?: 'arrow';
$content_font_size = get_sub_field('content_font_size') ?: 'default-font-sizes';

$accordion_classes = "content-block__accordion content-block__accordion--{$component} {$text_color} {$content_font_size}";

if (have_rows('accordion')) : 
    
    echo "<div class='{$accordion_classes}' data-reveal='fade-up-xsmall' data-reveal-delay='{$animation_delay}'>";
    
    switch ($accordion_type) {
        
        case 'faq':
        case 'this':
            
            echo "<dl class='accordion' data-style='{$accordion_icon_style}' data-first='{$first_opened}' data-multiple-expanded='{$multi_expanded}'>";
            
            break;
            
            default:
            
            echo "<div class='accordion' data-style='{$accordion_icon_style}' data-first='{$first_opened}' data-multiple-expanded='{$multi_expanded}'>";
            
            break;
            
        };
        
        while (have_rows('accordion')) : the_row(); 
        
        $label = get_sub_field('label') ?: false;
        $content = get_sub_field('content') ?: false;
        
        switch ($accordion_type) {
            
        case 'faq':
        case 'this':
                echo "<div class='accordion__item'>";
                
                echo "<dt>";
                echo "<button class='accordion__title'>{$label}</button>";
                echo "</dt>";
                
                echo '<dd class="accordion__content">';
                echo $content;
                echo '</dd>';
                
                echo "</div>";
                break;
                
            default:
                echo "<div class='accordion__item'>";
                
                echo "<h3>";
                echo "<button class='accordion__title'>{$label}</button>";
                echo "</h3>";
                
                echo '<div class="accordion__content">';
                echo $content;
                echo '</div>';
                
                echo "</div>";
                break;
                
        };
        
    endwhile; 
    
    switch ($accordion_type) {
        
        case 'faq':
        case 'this':
            echo "</dl>";
            break;
            
        default:
            echo "</div>";
            break;
            
        };
        
        echo "</div>";
    
endif;
?>
