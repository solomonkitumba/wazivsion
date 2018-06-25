<?php
global $base_url;
global $theme_root;
// get image
if (isset($node->field_image['und'])) {
    $image = file_create_url($node->field_image['und'][0]['uri']);
} else {
    $image = $theme_root . '/images/defaults/img_product.png';
}
// get product
$product = commerce_product_load($node->field_product['und'][0]['product_id']);
$id = $product->product_id;
$price = commerce_product_calculate_sell_price($product);
$price_display = commerce_currency_format($price['amount'], $price['currency_code'], $product);
?>
<div class="single-post row wow fadeIn blog-list">
    <div class="item col-md-4 col-sm-4 col-xs-12">
        <div class="media-element entry">
            <img src="<?php echo $image; ?>" class="img-responsive" alt="">
            <div class="magnifier outline-outward">
                <div class="buttons">
                    <a class="portfoliobuttons" href="<?php print $base_url . '/product/add/' . $id; ?>" title=""><i class="icon-cart"></i></a> 
                    <a class="portfoliobuttons" href="<?php echo $node_url; ?>" title=""><i class="icon-link"></i></a>
                </div>
            </div>
        </div><!-- end entry -->
    </div>
    <div class=" col-md-8 col-sm-8 col-xs-12">
        <h3 class="section-sub-title">
            <a href="<?php echo $node_url; ?>"><?php echo $title; ?></a>
        </h3><!-- end section-title -->
        <div class="desc clearfix">
            <p>
                <span class="pricewrap pull-left">
                    <?php echo $price_display; ?>
                    <?php
                    if (count($product->field_regular_price) > 0):
                        $regular_price = $product->field_regular_price['und'][0];
                        $regular_price_display = commerce_currency_format($regular_price['amount'], $regular_price['currency_code'], $product);
                        ?>
                        <span class="price-old"><?php echo $regular_price_display; ?></span>
                    <?php endif; ?>
                </span>
                <?php
                global $user;
                if ($user->uid) :
                    if (module_exists('flag')) {
                        $full_link_html = flag_create_link('shop', $node->nid);
                        preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $full_link_html, $matches);
                    }
                    if (strpos($matches[2][0], 'unflag') !== false) :
                        ?>
                        <a href="<?php echo $matches[2][0]; ?>" class="wishlistwrap pull-right"><i class="icon-heart is-in-wishlist"></i> Remove from Wishlist</a>
                    <?php else: ?>
                        <a href="<?php echo $matches[2][0]; ?>" class="wishlistwrap pull-right"><i class="icon-heart"></i> Add to Wishlist</a>
                    <?php
                    endif;
                endif;
                ?>
            </p>
            <div class="clearfix"></div>
            <hr>
            <p>
                <?php
                if (isset($node->body['und'])) {
                    $summary = strip_tags($node->body['und'][0]['summary']);
                    echo $summary;
                }
                ?>
            </p>
            <a href="<?php echo $node_url; ?>" class="readmore">View Item</a>
        </div><!-- end desc -->
    </div>
</div><!-- end single-post -->