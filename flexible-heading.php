<?php 

    require ( PARTIALS . 'flexible-args.php');

    // check if the Page Hero Heading is the H1 for the page, this setting is in the Page Hero Component
    $page_hero_is_h1 = get_field( 'page_hero_heading_is_h1' );
    
    $heading_tag = get_sub_field("heading_tag");
    
    if (!$page_hero_is_h1 && $section_number == 1 ) {
        // page hero is not the H1, so if this is the first component make it the H1, the code below handles the rest
        $heading_tag = 'h1';
        $heading_size = get_sub_field("heading_size") ?: $heading_tag;
    } elseif ($page_hero_is_h1 && $heading_tag == 'h1' ) {
        // If there is a h1 for the hero, prevent h1 from being outputted
        $heading_tag = 'h2';
        $heading_size = 'h1';
    } else {
        $make_heading_h1 = false;
        $heading_size = get_sub_field("heading_custom_size") ? get_sub_field("heading_size") ?: $heading_tag : $heading_tag;
    }
    
    
    $heading_width = get_sub_field("heading_width");
    $heading_color = $args['content_settings']['heading_color'] ?: 'transparent-heading-color';
    
    $heading_classes = "content-block__heading {$heading_size} content-block__heading--{$component} {$heading_color}";
    
    if (get_sub_field('balance_text')) {
        $heading_classes.= " balance-text";
    }

    echo "<div class='content-block__heading-container content-block__heading-container--{$component}' style='--heading-width: {$heading_width}%' data-reveal='fade-up-xsmall' data-reveal-delay='{$animation_delay}'>";
        echo ad_sub_field('heading', $heading_tag, $heading_classes, '', '' );
    echo "</div>";
    

?>