<?php
global $theme_root;
if (!$page) :
    ?>
<?php else: ?>
    <section class="nopadding">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row single-portfolio">
                        <div class="portfolio-media col-md-6 col-sm-6 col-xs-12">
                            <?php
                            if (isset($node->field_image['und'])) :
                                $count_image = 1;
                                foreach ($node->field_image['und'] as $image) :
                                    ?>
                                    <?php if ($count_image != 1): ?>
                                        <hr class="clearfix">
                                    <?php endif; ?>
                                    <div class="media-element entry <?php if ($count_image != 1): ?>clearfix<?php endif; ?>">
                                        <img src="<?php echo file_create_url($image['uri']); ?>" class="img-responsive" alt="">
                                        <div class="magnifier outline-outward">
                                            <div class="buttons">
                                                <a class="portfoliobuttons" href="<?php echo file_create_url($image['uri']); ?>" data-gal="prettyPhoto[product-gallery]" title=""><i class="icon-search"></i></a> 
                                            </div>
                                        </div>
                                    </div><!-- end entry -->
                                    <?php
                                    $count_image++;
                                endforeach;
                            else :
                                ?>
                                <div class="media-element entry">
                                    <img src="<?php echo $theme_root . '/images/defaults/img_portfolio.png'; ?>" class="img-responsive" alt="">
                                    <div class="magnifier outline-outward">
                                        <div class="buttons">
                                            <a class="portfoliobuttons" href="<?php echo $theme_root . '/images/defaults/img_portfolio.png'; ?>" data-gal="prettyPhoto[product-gallery]" title=""><i class="icon-search"></i></a> 
                                        </div>
                                    </div>
                                </div><!-- end entry -->
                            <?php
                            endif;
                            ?>
                        </div><!-- end portfolio-media -->

                        <div class="portfolio-desc col-md-6 col-sm-6 col-xs-12">
                            <div class="title text-left">
                                <h3 class="section-title"><?php echo $title; ?></h3>
                                <p class="lead"><?php echo strip_tags($node->body['und'][0]['summary']); ?></p>
                            </div><!-- end section-title -->

                            <?php echo $node->body['und'][0]['value']; ?>

                            <div class="clearfix button-wrapper">
                                <a class="btn btn-primary" href="<?php echo file_create_url('portfolio-classic'); ?>">ALL ITEMS</a>
                            </div>
                        </div><!-- end portfolio-desc -->
                    </div><!-- end single-portfolio -->
                </div><!-- end content -->
            </div><!-- end row -->
    </section><!-- end white -->
    <?php
    $bottom_content = block_get_blocks_by_region('bottom_content');
    print render($bottom_content);
    ?>
<?php endif; ?>