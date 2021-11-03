$('.main-slider .owl-carousel').owlCarousel({
	autoplay:true,
    loop:true,
    margin:10,
    nav:true,
    animateIn: 'fadeIn', // add this
  animateOut: 'fadeOut',
  slideSpeed: 300,
  paginationSpeed: 400,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})


$('.brands .owl-carousel').owlCarousel({
    autoplay:true,
    loop:true,
    margin:10,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:4
        },
        1000:{
            items:6
        }
    }
})


$('.testi .owl-carousel').owlCarousel({
    autoplay:true,
    loop:true,
    margin:10,
    nav:true,  
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})