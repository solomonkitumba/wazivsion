<?php
global $theme_root;
if (theme_get_setting('use_preloader')) :
    ?>
    <div id="loader">
        <div class="loader-container">
            <h3 class="loader-back-logo wow fadeIn"><?php print t('Loading'); ?> <img src="<?php echo $theme_root; ?>/images/loader-icon.gif" alt="" class="loader"></h3>
            <h3 class="loader-back-text wow fadeInDown"><?php echo $site_name; ?>.</h3>
        </div>
    </div>
<?php endif; ?>
<div class="wrapper">
    <header class="header">
        <div class="menu-wrapper">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
                            <span class="icon-menu-3"></span>
                        </button>
                        
						<!-- Logo -->  
						<?php if ($logo): ?>
							<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="logo">
								<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
							</a>
						<?php else: ?>
							<a class="navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php echo $site_name; ?></a>
						<?php endif; ?>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <?php print render($page['menu']); ?>
                        <?php if ($page['header_right']) : ?>
                            <?php print render($page['header_right']); ?>
                        <?php endif; ?>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        </div><!-- end menu-wrapper -->
    </header><!-- end header -->
    <?php if ($title) : ?>
        <section id="single-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-title">
                            <?php if ($page['breadcrumbs']) : ?>
                                <?php print render($page['breadcrumbs']); ?>
                            <?php endif; ?>
                        </div>
                        <?php if (theme_get_setting('breadcrumbs') == '1'): ?>
                            <?php if ($breadcrumb): ?>
                                <?php print $breadcrumb; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div><!-- end row -->
            </div>  
        </section>
    <?php endif; ?>
    <?php if ($tabs = render($tabs)): ?>
        <div class="block block-tabs clearfix">
            <?php print render($tabs); ?>
        </div>
    <?php endif; ?>
    <?php if ($action_links): ?>
        <div class="block block-tabs clearfix">
            <?php print render($action_links); ?>
        </div>
    <?php endif; ?>
    <?php if ($messages != ''): ?>
        <?php print $messages; ?>
    <?php endif; ?>
    <?php if ($page['content']) : ?>
        <?php print render($page['content']); ?>
    <?php endif; ?>
    <?php if ($page['after_content']) : ?>
        <?php print render($page['after_content']); ?>
    <?php endif; ?>

    <?php if ($page['footer']) : ?>
        <?php print render($page['footer']); ?>
    <?php endif; ?>
</div><!-- end wrapper -->