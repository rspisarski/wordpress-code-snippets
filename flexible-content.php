<!-- Begin Flexible Block component -->

<?php

$layout_title = get_sub_field("layout_title") ? get_sub_field("layout_title") : "Content Block";
$layout_type = 'flexible-block';
$args['component'] = $layout_type;

require get_parent_theme_file_path('/template-parts/components/partials/section-setup.php');
require get_parent_theme_file_path('/template-parts/components/partials/structured-data.php');
require get_parent_theme_file_path('/template-parts/components/partials/image-video-bg.php');

?>

<div class="row row-site column <?php echo implode(' ', $row_classes); ?>">

<?php

$vertical_alignment = get_sub_field("vertical_alignment") ?: 'top';

switch ($vertical_alignment) {
    
    case 'top' :
    $vertical_alignment = 'flex-start';
        break;

    case 'bottom'  : 
    $vertical_alignment = 'flex-end';
        break;

    case 'center' :  
    $vertical_alignment = 'center';
        break;
    
}
            
echo "<div class='flexible-block__grid' style='--alignment: {$vertical_alignment};'>";

if (have_rows('columns')) : while (have_rows('columns')) : the_row(); 

    echo "<div class='flexible-block__column'>";

    get_template_part('template-parts/components/flexible-loop', '', $args);

    echo "</div>";
    
endwhile;
endif; 

echo "</div>";

?>

</div>
</section>

<!-- End Flexible Block component -->
