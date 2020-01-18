/* Noticias stories slider
* ------------------------------------------------------ */
var storiesSlider = () => {
        
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


// Exports:
export { storiesSlider }