(function($) {
 "use strict";

	/* ==============================================
	LOADER
	=============================================== */

	jQuery(window).load( function() {
		setTimeout( function() {
	        jQuery("#loader").delay(400).fadeOut(500);
	        jQuery(".loader-logo");
	        jQuery(".loader-back-text");
	        jQuery(".loader");
	    }, 4000 );
	}); 

    /* ==============================================
    PARALLAX
    =============================================== */

	$.stellar({
		horizontalScrolling: false,
		verticalOffset: 40
	});

    /* ==============================================
    TOOLTIP
    =============================================== */

     $('[rel="tooltip"]').tooltip();

    /* ==============================================
    WOW EFFECTS
    =============================================== */

	var wow = new WOW(
	  {
	    boxClass:     'wow',      // animated element css class (default is wow)
	    animateClass: 'animated', // animation css class (default is animated)
	    offset:       100,          // distance to the element when triggering the animation (default is 0)
	    mobile:       true,       // trigger animations on mobile devices (default is true)
	    live:         true        // act on asynchronously loaded content (default is true)
	  }
	);
	wow.init();


	/* ==============================================
	DROP HOVER
	=============================================== */

    $(".menu-wrapper").affix({
        offset: {
            top: 200, 
            bottom: function () {
            return (this.bottom = $('.footer').outerHeight(true))
            }
        }
    })

	/* ==============================================
	BACK TO TOP
	=============================================== */

    jQuery('.backtotop').click(function(){
        jQuery('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

	/* ==============================================
	LIGHTBOX
	=============================================== */

	jQuery('a[data-gal]').each(function() {
		jQuery(this).attr('rel', jQuery(this).data('gal')); });     
	jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',slideshow:false,overlay_gallery: false,theme:'light_square',social_tools:false,deeplinking:false});


})(jQuery);
