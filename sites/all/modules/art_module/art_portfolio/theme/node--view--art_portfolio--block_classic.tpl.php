<?php
global $theme_root;
// get image
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
} else {
    $image = $theme_root . '/images/defaults/img_portfolio.png';
}
?>
<div class="item box wow fadeIn col-md-4 col-sm-4 col-xs-12 wow fadeIn <?php print $classes; ?>">
    <div class="media-element entry">
        <img src="<?php echo $image; ?>" class="img-responsive" alt="">
        <div class="magnifier outline-outward">
            <div class="buttons">
                <a class="portfoliobuttons" href="<?php echo $image; ?>" data-gal="prettyPhoto[product-gallery]" title=""><i class="icon-search"></i></a> 
                <a class="portfoliobuttons" href="<?php echo $node_url; ?>" title=""><i class="icon-link"></i></a>
            </div>
        </div>
    </div><!-- end entry -->
    <h3 class="section-sub-title">
        <?php echo $title; ?>
    </h3><!-- end section-title -->
    <div class="desc">
        <p><?php echo strip_tags($node->body['und'][0]['summary']); ?></p>
    </div><!-- end desc -->
</div>