    (function($) {
     "use strict";
        /* ==============================================
        CAROUSEL
        =============================================== */
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:15,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:2,
                    nav:false
                },
                1000:{
                    items:3,
                    nav:false,
                    loop:false
                }
            }
        })

        /* ==============================================
        SMOOTH SCROLL
        =============================================== */
        smoothScroll.init({
            speed: 800, // Integer. How fast to complete the scroll in milliseconds
            easing: 'easeInOutCubic', // Easing pattern to use
            updateURL: true, // Boolean. Whether or not to update the URL with the anchor hash on scroll
            offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
            callbackBefore: function ( toggle, anchor ) {}, // Function to run before scrolling
            callbackAfter: function ( toggle, anchor ) {} // Function to run after scrolling
        });
        
        /* ==============================================
        GOOGLE MAP
        =============================================== */
        var locations = [
            ['<div class="infobox"><h3 class="title"><a href="about1.html">OUR USA OFFICE</a></h3><span>NEW YORK CITY 2045 / 65</span><br>+90 555 666 77 88</p></div></div></div>', -15.501578, 15.160508, 2]
            ];
            
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 5,
                scrollwheel: false,
                navigationControl: true,
                mapTypeControl: false,
                scaleControl: false,
                draggable: true,
                styles: [ { "stylers": [ { "hue": "#404347" },  {saturation: -90},
                    {gamma: 0.15} ] } ],
                center: new google.maps.LatLng(-15.501578, 15.160508),
            mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var infowindow = new google.maps.InfoWindow();
                var marker, i;
                for (i = 0; i < locations.length; i++) {  
                    marker = new google.maps.Marker({ 
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]), 
                    map: map ,
                    icon: 'images/marker.png'
                    });
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    })(jQuery);