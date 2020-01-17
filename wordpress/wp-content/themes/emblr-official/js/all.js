/* ===================================================================
 * Ensambler - All JS
 *
 * ------------------------------------------------------------------- */

(function($) {

    "use strict";
    
    window.cfg = {
        scrollDuration : 800, // smoothscroll duration
        mailChimpURL   : 'https://facebook.us8.list-manage.com/subscribe/post?u=cdb7b577e41181934ed6a6a44&amp;id=e6957d85dc',   // mailchimp url
        formSendURL    : '/wp-content/themes/emblr-official/actions/enviar-contacto.php'  // contact send url
    },

    window.$WIN = $(window);

    // Add the User Agent to the <html>
    // will be used for IE10 detection (Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0))
    var doc = document.documentElement;
    doc.setAttribute('data-useragent', navigator.userAgent);

    // svg fallback
    if (!Modernizr.svg) {
        $(".header-logo img").attr("src", "images/logo.png");
    }


   /* Preloader
    * -------------------------------------------------- */
    var ssPreloader = function() {
        
        $("html").addClass('ss-preload');

        $WIN.on('load', function() {

            //force page scroll position to top at page refresh
            // $('html, body').animate({ scrollTop: 0 }, 'normal');

            // will first fade out the loading animation 
            $("#loader").fadeOut("slow", function() {
                // will fade out the whole DIV that covers the website.
                $("#preloader").delay(200).fadeOut("slow");
            }); 
            
            // for hero content animations 
            $("html").removeClass('ss-preload');
            $("html").addClass('ss-loaded');
        
        });
    };


    /* scrollTo: target
    * ------------------------------------------------------ */
    window.scrollTo = function( target_id, callback ) {

        $('html, body')
            .stop()
            .animate({
                'scrollTop': $( target_id ).offset().top
            }, cfg.scrollDuration, 'swing' )
            .promise().done(function() {
                if ( typeof callback === 'function' )
                    callback()
                ;
            })
        ;

    };


   /* Menu on Scrolldown
    * ------------------------------------------------------ */
    var ssMenuOnScrolldown = function() {
        
        var menuTrigger = $('.opaque-controls');
        var searchField = $('.search-border');
        var $icon_search = $('.icon-search');

        $WIN.on('scroll', function() {

            if ($WIN.scrollTop() > 150) {
                menuTrigger.addClass('opaque');
                searchField.addClass('opaque');

                if( $icon_search.find('#search').is(':checked') && !$icon_search.hasClass('on-opaque-movement') ) {
                    $icon_search.addClass('on-opaque-movement');
                }
            }
            else {
                menuTrigger.removeClass('opaque');
                searchField.removeClass('opaque');

                if( $icon_search.hasClass('on-opaque-movement') )
                    $icon_search.removeClass('on-opaque-movement');
            }

        });
    };


   /* OffCanvas Menu
    * ------------------------------------------------------ */
    var ssOffCanvas = function() {

        var menuTrigger     = $('.header-menu-toggle'),
            nav             = $('.header-nav'),
            closeButton     = nav.find('.header-nav__close'),
            siteBody        = $('body'),
            mainContents    = $('section, footer');

        // open-close menu by clicking on the menu icon
        menuTrigger.on('click', function(e){
            e.preventDefault();
            //pJSDom[pJSDom.length - 1].pJS.particles.move.speed = 1.5;
            $(".target-section").toggleClass('blurred-back');
            siteBody.toggleClass('menu-is-open');
        });

        // close menu by clicking the close button
        closeButton.on('click', function(e){
            e.preventDefault();
            //pJSDom[pJSDom.length - 1].pJS.particles.move.speed = 2;
            menuTrigger.trigger('click');
        });

        // close menu clicking outside the menu itself
        siteBody.on('click', function(e){
            if( !$(e.target).is('.header-nav, .header-nav__content, .header-menu-toggle, .header-menu-toggle span') ) {
                //pJSDom[pJSDom.length - 1].pJS.particles.move.speed = 2;
                siteBody.removeClass('menu-is-open');
                $(".target-section").removeClass('blurred-back');
            }
        });

    };


   /* Masonry
    * ---------------------------------------------------- */ 
    var ssMasonryFolio = function () {
        
        var containerBricks = $('.masonry');

        containerBricks.imagesLoaded(function () {
            containerBricks.masonry({
                itemSelector: '.masonry__brick',
                resize: true
            });
        });
    };


   /* photoswipe
    * ----------------------------------------------------- */
    var ssPhotoswipe = function() {
        var items = [],
            $pswp = $('.pswp')[0],
            $folioItems = $('.item-folio'),
            $projectLink = $folioItems.find('.item-folio__project-link');

        // get items
        $folioItems.each( function(i) {

            var $folio = $(this),
                $thumbLink =  $folio.find('.thumb-link'),
                $title = $folio.find('.item-folio__title'),
                $caption = $folio.find('.item-folio__caption'),
                $titleText = '<h4>' + $.trim($title.html()) + '</h4>',
                $captionText = $.trim($caption.html()),
                $href = $thumbLink.attr('href'),
                $size = $thumbLink.data('size').split('x'),
                $width  = $size[0],
                $height = $size[1];
        
            var item = {
                src  : $href,
                w    : $width,
                h    : $height
            }

            if ($caption.length > 0) {
                item.title = $.trim($titleText + $captionText);
            }

            items.push(item);
        });

        $projectLink.on('click', function(e) {
            e.stopPropagation();
        });

        // bind click event
        $folioItems.each(function(i) {

            $(this).on('click', function(e) {
                e.preventDefault();
                var options = {
                    index: i,
                    showHideOpacity: true,
                    getDoubleTapZoom: function() {
                        return 0.7;
                    }
                }

                // initialize PhotoSwipe
                var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                lightBox.init();
            });

        });
    };


    /* Smooth Scrolling
    * ------------------------------------------------------ */
   var ssSmoothScroll = function() {
            
        $('.smoothscroll').on('click', function (e) {
            var target = this.hash;
            
            if ( $('body').attr('id') === 'main-page' ) {
                e.preventDefault();
                e.stopPropagation();
            }

            // checks if menu is open
            if ( $('body').hasClass('menu-is-open') ) {
                $('.header-menu-toggle').trigger('click');
            }

            scrollTo( target );
        });

    };

    /* Alert Boxes
    * ------------------------------------------------------ */
    var ssAlertBoxes = function() {

        $('.alert-box').on('click', '.alert-box__close', function() {
            $(this).parent().fadeOut(300);
        }); 

    };


    /* Animate On Scroll
    * ------------------------------------------------------ */
    var ssAOS = function() {
        
        AOS.init( {
            offset: 150,
            duration: 500,
            easing: 'ease-in-sine',
            delay: 200,
            once: true,
            disable: 'mobile'
        });

    };


    /* Focus in search field (home)
    * ------------------------------------------------------ */
   var focusInSearchField = function() {
        $(".search-field").focus(function() {
            $(".search-border").addClass('focus');
        });

        $(".search-field").focusout(function() {
            $(".search-border").removeClass('focus');
        });
    };


    /* Focus in search field (home)
    * ------------------------------------------------------ */
   var focusInSearchField = function() {
        $(".search-field").focus(function() {
            $(".search-border").addClass('focus');
        });

        $(".search-field").focusout(function() {
            $(".search-border").removeClass('focus');
        });
    };


    /* Opaque displacement on Search
    * ------------------------------------------------------ */
   var seachOpaqueDisplacement = function() {

        $('.search-init').click(function() {
            if( $('.icon-search').find('.search-border').hasClass('opaque') )
                $('.icon-search').addClass('on-opaque-movement');

            setTimeout(function() { //work-around
                $('#search-field').focus();
            }, 400);
        });

        $('.icon-search').find('.search-active').click(function() {
            if( $('.icon-search').hasClass('on-opaque-movement') )
                setTimeout(function() { //work-around
                    $('.icon-search').removeClass('on-opaque-movement');
                }, 10);
        });

    };


    /* Switch theme button
    * ------------------------------------------------------ */
    var botonSwitchToggle = function() {

        const chk = document.getElementById('chk')
        
        chk.addEventListener('change', () => {
            document.body.classList.add('in-transition')
            document.body.classList.toggle('light-theme')
            document.body.classList.toggle('dark-theme')

            setTimeout(() => {
                document.body.classList.remove('in-transition')
            }, 100);
        })

    };


    /* Return to top scroll button
    * ------------------------------------------------------ */
   var scrollToTopButton = function() {

        let handler = function () {
            $('#return-to-top').toggleClass('dissapear')
            $('#qlwapp').toggleClass('no-return-to-top')
        }

        if ( document.body.id === 'main-page' ) {

            $('#inicio').waypoint({
                offset: '-50%',
                handler: handler
            })

            $('#return-to-top').click(function () {
                scrollTo('#inicio')
            })

        } else {

            $('body').waypoint({
                offset: '-50%',
                handler: handler
            })

            $('#return-to-top').click(function () {
                scrollTo('body')
            })

        }

    };


    /* Initialize
    * ------------------------------------------------------ */
   (function clInit() {

        ssPreloader();
        ssMenuOnScrolldown();
        ssOffCanvas();
        ssMasonryFolio();
        ssPhotoswipe();
        ssSmoothScroll();
        ssAlertBoxes();
        ssAOS();
        focusInSearchField();
        seachOpaqueDisplacement();
        botonSwitchToggle();
        scrollToTopButton();

    })();

})( jQuery );