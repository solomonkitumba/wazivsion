<?php
global $theme_root;
// get image
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
} else {
    $image = $theme_root . '/images/defaults/img_portfolio.png';
}
// get horizontal image
if (isset($node->field_horizontal_image['und'])) {
    $horizontal_image = file_create_url($node->field_horizontal_image['und'][0]['uri']);
} else {
    $horizontal_image = $theme_root . '/images/defaults/img_portfolio_horizontal.png';
}
// random wide or square
$random_number = rand(1, 3);
$wide_class = '';
if ($random_number == 1) {
    $image = $horizontal_image;
    $wide_class = 'item-w2';
}
?>
<div class="item entry item-h2 <?php echo $wide_class; ?> wow fadeIn <?php echo $classes; ?>">
    <img src="<?php echo $image; ?>" alt="">
    <div class="magnifier outline-outward">
        <div class="buttons">
            <a class="portfoliobuttons" href="<?php echo $image; ?>" data-gal="prettyPhoto[product-gallery]" title=""><i class="icon-search"></i></a> 
            <a class="portfoliobuttons" rel="bookmark" href="<?php echo $node_url; ?>"><i class="icon-link"></i></a>
        </div><!-- end buttons -->
    </div><!-- end magnifier -->
</div><!-- end item -->