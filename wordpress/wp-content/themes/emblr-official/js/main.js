/* ===================================================================
 * Ensambler - Main JS
 *
 * ------------------------------------------------------------------- */

(function($) {

    "use strict";
    
    var cfg = {
        scrollDuration : 800, // smoothscroll duration
        mailChimpURL   : 'https://facebook.us8.list-manage.com/subscribe/post?u=cdb7b577e41181934ed6a6a44&amp;id=e6957d85dc',   // mailchimp url
        formSendURL    : '/wp-content/themes/emblr-official/actions/enviar-contacto.php'  // contact send url
    },

    $WIN = $(window);

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
            $('html, body').animate({ scrollTop: 0 }, 'normal');

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


    /* scrollDownTo: target
    * ------------------------------------------------------ */
    var scrollDownTo = function( target_id, callback ) {

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


   /* slick slider
    * ------------------------------------------------------ */
    var ssSlickSlider = function() {
        
        $('.testimonials__slider').slick({
            arrows: false,
            dots: true,
            infinite: true, 
            slidesToShow: 1,
            slidesToScroll: 1,
            pauseOnFocus: true,
            autoplaySpeed: 3500,
            autoplay: true
        });
    }; 


   /* Smooth Scrolling
    * ------------------------------------------------------ */
    var ssSmoothScroll = function() {
        
        $('.smoothscroll').on('click', function (e) {
            var target = this.hash;
            
            e.preventDefault();
            e.stopPropagation();

            // checks if menu is open
            if ( $('body').hasClass('menu-is-open') ) {
                $('.header-menu-toggle').trigger('click');
            }

            scrollDownTo( target );
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

    /* Particles!
    * ------------------------------------------------------ */
    var loadParticles = function() {

        if ( $('#particles').length )
            /* particlesJS.load( @dom-id, @path-json, @callback (optional) ) */
            particlesJS.load('particles', 'wp-content/themes/emblr-official/js/particles.json');

    };


    /* Waypoint for scroll dissapear
    * ------------------------------------------------------ */
    var scrollWaypoint = function() {

        $('.home-content__scroll').waypoint({
            handler: function(direction) {
                $('.home-content__scroll').toggleClass('blurred-element');
            },

            offset: '80%'
        });

        $('footer').waypoint({
            handler: function(direction) {
                $('.page-dots, .page-counter').toggleClass('blurred-element');
            },

            offset: '75%'
        });

    };


    /* Header logo particles enable/disable action
    * ------------------------------------------------------ */

    var logoEnableDisableParticles = function() {
        $(".header-logo").click(function() {
            if( pJSDom[pJSDom.length - 1].pJS.particles.move.enable == true )
                pJSDom[pJSDom.length - 1].pJS.particles.move.enable = false;
            else
                ;//loadParticles();
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


    /* Typeit.js
    * ------------------------------------------------------ */

    var typeitInit = function() {
        var string = $('#spot-text').text();

        $('#spot-text').text('');

        new TypeIt('span#spot-text', {
          strings: string,
          speed: 60,
          loop: true,
          //startDelay: 250,
          //loopDelay: 750,
          waitUntilVisible: true,
          deleteSpeed: 15,
          cursorChar: '|',
          beforeString: (s, q, instance) => {
            $(window.text).animate({ opacity: 0 }, 1000);
          },
          afterString: (s, q, instance) => {
             $(window.text).css({ opacity: 1 });
             window.shuffle_text.start();
          }
        }).pause(6000).go();
    };


    /* Shuffle text
    * ------------------------------------------------------ */

    var shuffleText = function() {
        window.text = document.getElementById("spot-shuffle-text");

        window.shuffle_text = new ShuffleText(text);
        window.shuffle_text.duration = 2000;
        window.shuffle_text.emptyCharacter = '&nbsp;';
        window.shuffle_text.sourceRandomCharacter = '01';
        window.shuffle_text._requestAnimationFrameId = 2000;
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
    }


    /* noticias
    * ------------------------------------------------------ */
    var storiesSlider = function() {
        
        $('.noticias-stories').slick({
            arrows: true,
            prevArrow: $('.slick-stories-prev'),
            nextArrow: $('.slick-stories-next'),
            dots: false,
            infinite: false,
            slidesToScroll: 1,
            mobileFirst: true,
            focusOnSelect: false,

            responsive: [
            {
                breakpoint: 1920, // or more
                settings: {
                    slidesToShow: 7
                }
            },

            {
                breakpoint: 1600, // or more
                settings: {
                    slidesToShow: 6
                }
            },


            {
                breakpoint: 1400, // or more
                settings: {
                    slidesToShow: 5
                }
            },

                        {
                breakpoint: 1024, // or more
                settings: {
                    slidesToShow: 4
                }
            },

            // {
            //     breakpoint: 800, // or more
            //     settings: {
            //         slidesToShow: 6
            //     }
            // },

            {
                breakpoint: 768, // or more
                settings: {
                    slidesToShow: 6
                }
            },

            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 5
              }
            },

            /*{
                breakpoint: 414, // or more
                settings: {
                    slidesToShow: 5
                }
            }*/,

            {
                breakpoint: 376, // or more
                settings: {
                    slidesToShow: 4
                }
            },

            {
                breakpoint: 320, // or more
                settings: {
                    slidesToShow: 4
                }
            },

            {
                breakpoint: 240, // or more
                settings: {
                    slidesToShow: 4
                }
            },

            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
        });
    }; 


var teamSlider = function() {
        
        $('.container-team').slick({
            arrows: false,
            dots: true,
            infinite: true,
            slidesToScroll: 1,
            mobileFirst: true,
            focusOnSelect: false,
            autoplay: true,
            autoplaySpeed: 3500,

            responsive: [
                {
                    breakpoint: 1024, // or more
                    settings: {
                        slidesToShow: 3
                    }
                },

                {
                    breakpoint: 768, // or more
                    settings: {
                        slidesToShow: 2
                    }
                },

                {
                    breakpoint: 240, // or more
                    settings: {
                        slidesToShow: 1
                    }
                },

                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    }; 
    var aboutUsAnimation = function () {
        var selectors = {
            nav: '[data-features-nav]',
            tabs: '[data-features-tabs]',
            active: '.__active'
        }
        var classes = {
            active: '__active'
        }
        $('a', selectors.nav).on('click', function() {
            let $this = $(this)[0];
            $(selectors.active, selectors.nav).removeClass(classes.active);
            $($this).addClass(classes.active);
            $('div', selectors.tabs).removeClass(classes.active);
            $($this.hash, selectors.tabs).addClass(classes.active);
            return false
        });
    }

$(".btn-with-icon").on("click", function() {
    $(".wave-anim").addClass('visible').one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd", function() {
        $(".wave-anim").removeClass('visible');
    });
});

    /* Services
    * ------------------------------------------------------ */

    var more_services_button = function() {

        $("#more-services").on("click", function() {
            $("#nuestros-servicios").find(".hidden-service").show("normal");
            $(this).hide();
        });

    }

    /* Portafolio
    * ------------------------------------------------------ */

    /*
    *
    *       NOT REGISTERED AT "Initialize" MASTER FUNCTION !
    * 
    */
    var filterList = {

        init: function () {

            $('#gallery').mixItUp({
                selectors: {
                    target: '.gallery-item',
                    filter: '.filter'
                },

                load: {
                    // show all items on page load:
                    filter: $('#filters').find('.filter.active').data('filter')
                }
            });

        }

    };

    // Filter ALL the things
    filterList.init();


    /* Contacto
    * ------------------------------------------------------ */

    var contactCursorDissapear = function() {

        $('input#prompt').one('click', function() {
            $('.s-contact .cursor').hide()
        })

    };


    /* Page right navigation Functions
    * ------------------------------------------------------ */

    var buildNavigationControl = function() {

        var $pagedots = $( '#page-dots' )
        let $pagecounter = $( '#page-counter' )

        var $pages = $( '.target-section' )

        // 1. Crea botón por cada sección con clase target-section (página) en ul.page-dots
        $pages.each(function( i, page ) {
            
            var $li_button = $( '<li><button type="button"></button></li>' )

            if ( i == 0 )
                $li_button.addClass( 'active' )
            ;

            $li_button.attr({
                'data-section': $(page).attr('id'),
                'data-position': i + 1
            })

            $pagedots.append( $li_button )

        });

        // 2. Inserta número de páginas total en page-counter
        $pagecounter.find( 'span:last-child' )
            .text(function() {
                return ( $pages.length < 10 ) ?
                    '0' + $pages.length : $pages.length
                ;
            })
        ;


        // 3. Añade listener para acción "llevar a la página" al clickear el botón
        $pagedots.find( 'li button' )
            .on('click', function() {

                let $target = $( this )
                let target_id = $target.parent().data( 'section' )

                $target.addClass( 'clicked' )
                
                // Se hace ScrollTo a la página
                scrollDownTo( `#${target_id}`, function() {
                    $( '#page-dots' ).find( 'button.clicked' )
                        .removeClass( 'clicked' )
                    ;
                })

            })
        ;

        // 4. Actualiza controles de navegación a medida que se hace scroll sobre las páginas
        var pages_waypoint_handler = function() {

            let page_target = this.element.id

            let $target = $( '#page-dots' )
                .find( `li[data-section="${page_target}"]` )
                .find( 'button' )
            ;

            updateNavigationControl( 'page-dots', $target )
            updateNavigationControl( 'page-counter', $target )
            updateNavigationControl( 'hash', page_target )

        };

        $pages.waypoint({
            offset: '50%',
            handler: function( direction ) {
                if ( direction === 'down' )
                    pages_waypoint_handler.call( this )
                ;
            }
        })

        $pages.waypoint({
            offset: '-50%',
            handler: function( direction ) {
                if ( direction === 'up' )
                    pages_waypoint_handler.call( this )
                ;
            }
        })

    };


    /* UpdateRightNavigation
    * ------------------------------------------------------ */
   var updateNavigationControl = function( control, $target ) {

        switch ( control ) {

            case 'page-dots':

                // Actualiza dot en page-dots
                $( '#page-dots' ).find( 'li.active' )
                    .removeClass( 'active' )
                ;

                $target.parent()
                    .addClass( 'active' )
                ;

                break

            ;

            case 'page-counter':

                // Actualiza el número de sección en page-counter
                $( '#page-counter' ).find( 'span:first-child' )
                    .text(function() {
                        let position = $target.parent().data( 'position' )
                        
                        if ( position < 10 )
                            position = '0' + position
                        ;

                        return position
                    })
                ;

                break
                
            ;

            case 'hash':
                // $target: section string
                window.location.hash = `!${$target}`
                break

            ;

        }

   };


   /* Send Contact Form: General send (terminal and traditional)
    * ---------------------------------------------------------- */
   window.sendContactForm = function( form, callback ) {

        let data = {
            nombre  : $( 'input[name="nombre"]', form ).val(),
            email   : $( 'input[name="email"]', form ).val(),
            consulta: $( 'textarea[name="consulta"]', form ).val()
        }

        $.post( cfg.formSendURL, data, function( response ) {
            if ( typeof callback === 'function' )
                callback( response )
            ;
        })

   };


   /* Traditional form
    * ------------------------------------------------------ */
   var traditionalFormValidate = function() {

        $('#traditional-form').on('submit', function(e) {
            e.preventDefault()

            sendContactForm( '#traditional-form', function( response ) {
                // callback

                if ( 'OK' === response )
                    // success
                    alert( 'envío finalizado' )    // REEMPLAZAR POR ALERT BOX MODAL

                else
                    // failure
                    alert( `no se envió el mensaje: ${response}` )   // REEMPLAZAR POR ALERT BOX MODAL
            })
        })

   };


   /* Initialize
    * ------------------------------------------------------ */
    (function clInit() {

        ssPreloader();
        ssMenuOnScrolldown();
        ssOffCanvas();
        ssMasonryFolio();
        ssPhotoswipe();
        ssSlickSlider();
        ssSmoothScroll();
        ssAlertBoxes();
        ssAOS();
        loadParticles();
        scrollWaypoint();
        logoEnableDisableParticles();
        focusInSearchField();
        storiesSlider();
        shuffleText();
        typeitInit();
        seachOpaqueDisplacement();
        teamSlider();
        more_services_button();
        aboutUsAnimation();
        contactCursorDissapear();
        buildNavigationControl();
        traditionalFormValidate();

    })();

})(jQuery);