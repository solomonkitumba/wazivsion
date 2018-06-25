// add class main menu
jQuery('ul.menu').addClass('nav navbar-nav');
jQuery('ul.menu li.expanded').addClass('dropdown');
jQuery('ul.menu li.expanded a').addClass('dropdown-toggle');
jQuery('ul.menu li.expanded a').attr('data-toggle', 'dropdown');
jQuery('ul.menu li.expanded ul').addClass('dropdown-menu');
jQuery('ul.menu li.expanded ul').removeClass('navbar-nav');
jQuery('ul.menu li.expanded ul a').removeClass('dropdown-toggle');
jQuery('ul.menu li.expanded a.dropdown-toggle').append('<span class="icon-angle-down"></span>');
jQuery('ul.menu li.expanded ul a').attr('data-toggle', '');

// add class blog pagination
jQuery('.pagination .item-list').addClass('container');
jQuery('.col-md-9 .pagination .item-list').removeClass('container');
jQuery('.page-search .pagination .item-list').removeClass('container');

// add class panel
jQuery('.container-style .panels-flexible-row-inside').addClass('container');
jQuery('.container-style .wishlist-block').addClass('container');

// add class webform
jQuery('#edit-actions').addClass('button-wrapper');

// add class form
jQuery('.form-text').addClass('form-control');
jQuery('.form-submit').addClass('btn btn-primary');
jQuery('textarea').addClass('form-control');
jQuery('select').addClass('form-control');
jQuery('#edit-cancel').removeClass('checkout-cancel');
jQuery('#edit-back').removeClass('checkout-back');

// add class wishlist page
jQuery('.view-wishlist-block .view-empty').addClass('container');
jQuery('.view-wishlist-block .view-empty').parent().addClass('white-wrapper');

// remove placeholder subscribe form
jQuery('.form-item-email input').click(function () {
    var email = jQuery(this).val();
    if (email === 'user@example.com') {
        jQuery(this).val('');
    }
});

// add class blog paginator
jQuery('.view-display-id-block_fullwidth .pagination .item-list').removeClass('container');
jQuery('.view-display-id-block_fullwidth .pagination').addClass('container');
jQuery('.view-display-id-block_fullwidth .pagination .item-list').addClass('col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1');

// animated for contact form
jQuery('.service-widget .webform-client-form').addClass('contact-widget wow bounceInRight clearfix animated');