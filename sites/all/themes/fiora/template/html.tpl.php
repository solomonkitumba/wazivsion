<?php global $theme_root; ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

    <head>

        <?php print $head; ?>
        <title><?php print $head_title; ?></title>
		<?php print $styles; ?>
		
        <script src="<?php echo $theme_root; ?>/js/jquery.js"></script>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
		
    </head>
    <body class="<?php print $classes; ?>" <?php print $attributes; ?>>

        <?php print $page_top; ?>
        <?php print $page; ?>
        <?php print $page_bottom; ?>
        <?php print $scripts; ?>
        
        <script>
            /* ==============================================
             GOOGLE MAP
             =============================================== */
            (function ($) {
                "use strict";
                var locations = [
                    ['<div class="infobox"><h3 class="title"><a href="<?php echo theme_get_setting('contactmap_website'); ?>"><?php echo theme_get_setting('contactmap_title'); ?></a></h3><span><?php echo theme_get_setting('contactmap_address'); ?></span><br><?php echo theme_get_setting('contactmap_phone'); ?></p></div></div></div>', <?php echo theme_get_setting('contactmap_lat'); ?>, <?php echo theme_get_setting('contactmap_long'); ?>, 2]
                ];

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: <?php echo theme_get_setting('contactmap_zoom'); ?>,
                    scrollwheel: false,
                    navigationControl: true,
                    mapTypeControl: false,
                    scaleControl: false,
                    draggable: true,
					<?php if(theme_get_setting('contactmap_styles') == 1) : ?>
                    styles: [{"stylers": [{"hue": "<?php echo theme_get_setting('contactmap_hue'); ?>"}, {saturation: <?php echo theme_get_setting('contactmap_saturation'); ?>},
                                {gamma: <?php echo theme_get_setting('contactmap_gamma'); ?>}]}],
					<?php endif; ?>
                    center: new google.maps.LatLng(<?php echo theme_get_setting('contactmap_lat'); ?>, <?php echo theme_get_setting('contactmap_long'); ?>),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                var infowindow = new google.maps.InfoWindow();
                var marker, i;
                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        <?php if( theme_get_setting('contact_icon') ) :?>
							icon: '<?php echo file_create_url(theme_get_setting('contact_icon')); ?>'
						<?php else :?>
							icon: '<?php echo $theme_root; ?>/images/marker.png'
						<?php endif; ?>
                    });
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            })(jQuery);
        </script>
    </body>
</html>