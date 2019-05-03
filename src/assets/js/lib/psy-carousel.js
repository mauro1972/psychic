/**
 * 
 */

class Psy_Carousel {

    constructor() {
        this.events();
        this.slider();
    }

    events() {
        console.log('hola');
    }

    slider() {
        $('.responsive').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  infinite: true,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
          });        
    }
}

module.exports = Psy_Carousel;