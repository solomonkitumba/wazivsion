<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php global $theme_root; ?>
<div class="container">
    <nav class="portfolio-filter text-center">
        <ul>
            <li><a class="active" href="#" data-filter="*"><span></span> All</a></li>
            <?php foreach ($categories as $key => $c): ?>
                <li><a href="#" data-filter=".<?php echo $key; ?>"><?php echo $c; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <div id="boxed-portfolio" class="masonry_wrapper clearfix">
        <?php foreach ($rows as $id => $row): ?>
            <?php print $row; ?>
        <?php endforeach; ?>
    </div>
</div>
<script src="<?php echo $theme_root; ?>/js/masonry.js"></script>
