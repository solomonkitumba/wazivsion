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
<?php if (!$page): ?>
    <div class="white-wrapper nopadding product-item">
        <div class="container">
            <div class="single-post row wow fadeIn blog-list m-bottom-0">
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
        </div>
    </div>
<?php else : ?>
    <section class="nopadding">
        <div class="row">
            <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="single-post row wow fadeIn blog-list">
                    <div class="item col-md-4 col-sm-4 col-xs-12">
                        <div class="media-element entry">
                            <img src="<?php echo $image; ?>" class="img-responsive" alt="">
                            <div class="magnifier outline-outward">
                                <div class="buttons">
                                    <a class="portfoliobuttons" href="<?php print $base_url . '/product/add/' . $id; ?>" title=""><i class="icon-cart"></i></a> 
                                    <a class="portfoliobuttons" href="<?php echo $image; ?>" data-gal="prettyPhoto[product-gallery]" title=""><i class="icon-search"></i></a>
                                </div>
                            </div>
                        </div><!-- end entry -->
                    </div>
                    <div class=" col-md-8 col-sm-8 col-xs-12">
                        <h3 class="section-sub-title">
                            <?php echo $title; ?>
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
                                <span class="pull-right">
                                    <span class="rating">
                                        <?php /* ?>
                                          <i class="icon-star"></i>
                                          <i class="icon-star"></i>
                                          <i class="icon-star"></i>
                                          <i class="icon-star"></i>
                                          <i class="icon-star-empty"></i>
                                          <?php */ ?>
                                        <span><?php print $comment_count; ?> customer reviews</span>
                                    </span>
                                </span>
                            </p>
                            <div class="clearfix"></div>
                            <hr>
                            <div>
                                <?php
                                if (isset($node->body['und'])) {
                                    echo $node->body['und'][0]['summary'];
                                }
                                ?>
                            </div>
                            <div class="clearfix button-wrapper">
                                <a class="btn btn-primary" href="<?php print $base_url . '/product/add/' . $id; ?>">add to cart</a>
                            </div>
                        </div><!-- end desc -->
                    </div>
                </div><!-- end single-post -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="shop-tab">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Description</a></li>
                                <li><a href="#profile" data-toggle="tab">Reviews (<?php print $comment_count; ?>)</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <?php
                                    if (isset($node->body['und'])) {
                                        echo $node->body['und'][0]['value'];
                                    }
                                    ?>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <?php print render($content['comments']); ?>
                                </div>
                            </div>
                        </div><!-- end tab -->
                    </div><!-- end col -->
                </div><!-- end row -->
                <hr>
                <div class="related clearfix">
                    <div class="masonry_wrapper row clearfix">
                        <?php
                        if (isset($node->field_relate_products['und'])):
                            foreach ($node->field_relate_products['und'] as $r_product) :
                                // get product detail
                                $r_product_detail = commerce_product_load($r_product['product_id']);
                                // get node by product_id
                                $query = new EntityFieldQuery;
                                $query->entityCondition('entity_type', 'node', '=')
                                        ->propertyCondition('type', 'product')
                                        ->fieldCondition('field_product', 'product_id', $r_product['product_id'], '=')
                                        ->range(0, 1);
                                if ($r_product_display = $query->execute()) :
                                    foreach ($r_product_display['node'] as $key => $value) :
                                        // load node
                                        $r_product_node = node_load($key);
                                        // get image
                                        if (isset($r_product_node->field_image['und'])) {
                                            $r_product_image = file_create_url($r_product_node->field_image['und'][0]['uri']);
                                        } else {
                                            $r_product_image = $theme_root . '/images/defaults/img_product.png';
                                        }
                                        // get url
                                        $options = array('absolute' => TRUE);
                                        $r_product_node_url = url('node/' . $key, $options);
                                        // get price
                                        $r_product_price = commerce_product_calculate_sell_price($r_product_detail);
                                        $r_product_price_display = commerce_currency_format($r_product_price['amount'], $r_product_price['currency_code'], $r_product_detail);
                                        ?>
                                        <div class="item box wow fadeIn col-md-4 col-sm-4 col-xs-12 wow fadeIn">
                                            <div class="media-element entry">
                                                <img src="<?php echo $r_product_image; ?>" class="img-responsive" alt="">
                                                <div class="magnifier outline-outward">
                                                    <div class="buttons">
                                                        <a class="portfoliobuttons" href="<?php print $base_url . '/product/add/' . $r_product_detail->product_id; ?>" title=""><i class="icon-cart"></i></a> 
                                                        <a class="portfoliobuttons" href="<?php echo $r_product_node_url; ?>" title=""><i class="icon-link"></i></a>
                                                    </div>
                                                </div>
                                            </div><!-- end entry -->
                                            <h3 class="section-sub-title">
                                                <a href="<?php echo $r_product_node_url; ?>"><?php echo $r_product_node->title; ?></a>
                                            </h3><!-- end section-title -->
                                            <div class="desc">
                                                <p>
                                                    <span class="pricewrap pull-left"><?php echo $r_product_price_display; ?>
                                                        <?php
                                                        if (count($r_product_detail->field_regular_price) > 0):
                                                            $r_product_regular_price = $r_product_detail->field_regular_price['und'][0];
                                                            $r_product_regular_price_display = commerce_currency_format($r_product_regular_price['amount'], $r_product_regular_price['currency_code'], $r_product_detail);
                                                            ?>
                                                            <span class="price-old"><?php echo $r_product_regular_price_display; ?></span>
                                                        <?php endif; ?>
                                                    </span>
                                                    <?php
                                                    global $user;
                                                    if ($user->uid) :
                                                        if (module_exists('flag')) {
                                                            $full_link_html = flag_create_link('shop', $key);
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
                                            </div><!-- end desc -->
                                        </div>
                                        <?php
                                        break;
                                    endforeach;
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </div><!-- end masonry -->
                </div><!-- end related -->
            </div><!-- end content -->
            <div id="sidebar" class="col-md-3 col-sm-4 col-xs-12">
                <?php
                $block_search = module_invoke('search', 'block_view', 'search');
                print render($block_search);
                $shop_sidebar = block_get_blocks_by_region('shop_sidebar');
                print render($shop_sidebar);
                $blog_newsletter = block_get_blocks_by_region('newsletter');
                print render($blog_newsletter);
                ?>
            </div><!-- end sidebar -->
        </div><!-- end container -->
    </section><!-- end white -->
    <?php
    $bottom_content = block_get_blocks_by_region('bottom_content');
    print render($bottom_content);
    ?>
<?php endif; ?>