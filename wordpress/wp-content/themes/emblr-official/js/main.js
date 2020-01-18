/* ===================================================================
 * Ensambler - Main JS
 *
 * ------------------------------------------------------------------- */

(function($) {

    "use strict";


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
                $('.home-content__scroll').toggleClass('dissapear');
            },

            offset: '80%'
        });

        $('footer').waypoint({
            handler: function(direction) {
                $('.page-dots, .page-counter').toggleClass('dissapear');
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


    /* equipo
    * ------------------------------------------------------ */
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


    /* about-us
    * ------------------------------------------------------ */
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
                scrollTo( `#${target_id}`, function() {
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

            if ( page_target === 'inicio' && window.location.hash.substr(0, 2) !== '#!' ) {
                let target = document.querySelector( `#${page_target}` )
                
                // fast scroll to:
                target.scrollIntoView( true )

                return true
            }

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

        ssSlickSlider();
        loadParticles();
        scrollWaypoint();
        logoEnableDisableParticles();
        shuffleText();
        typeitInit();
        teamSlider();
        more_services_button();
        aboutUsAnimation();
        filterList.init();
        contactCursorDissapear();
        buildNavigationControl();
        traditionalFormValidate();

    })();

})(jQuery);