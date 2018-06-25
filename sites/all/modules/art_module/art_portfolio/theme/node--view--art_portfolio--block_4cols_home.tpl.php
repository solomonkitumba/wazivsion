<?php
global $theme_root;
// get image
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
} else {
    $image = $theme_root . '/images/defaults/img_portfolio.png';
}
// get categories
$categories_string = '';
if (isset($node->field_portfolio_category['und'])) {
    foreach ($node->field_portfolio_category['und'] as $category) {
        $categories_string .= $category['taxonomy_term']->name . ' ';
    }
}
?>
<div class="item col-md-3 col-sm-6 col-xs-12 wow fadeIn <?php print $classes; ?>">
    <div class="media_element entry">
        <a href="<?php echo $node_url; ?>" title="">
            <img src="<?php echo $image; ?>" class="img-responsive" alt="">
            <div class="magnifier outline-outward">
                <div class="buttons">
                    <h3><?php echo $title; ?></h3>
                    <small><?php echo $categories_string; ?></small>
                </div>
            </div>
        </a>
    </div><!-- media_element -->
</div>