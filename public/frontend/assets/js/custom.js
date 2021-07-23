$(document).ready(function() {
    $('.icon-wrapper').on('click', function() {
        
        $('.header-middle-box').collapse('toggle');
        $('.icon-inner').toggleClass('active');
    }); 


    // $('.main-menu .link').click(function(){
    //     $('.main-menu .link').removeClass('active');
    //     $(this).addClass('active');
    //  })

    $('.clients-slide').owlCarousel({
        loop: true,
        margin: 30,
        autoplay: true,
        autoPlayTimeout: 2000,
        smartSpeed: 3000,
        nav: false,
        navText: ['<i class="fas fa-angle-up"></i>', '<i class="fas fa-angle-down"></i>'],
        dots: false,
        responsive: {
            0: {
                items: 3
            },
            768: {
                items: 4
            },
            992: {
                items: 7
            }
        }
    });

    $('.news-slide').owlCarousel({
        loop: false,
        margin: 30,
        autoplay: false,
        autoPlayTimeout: 2000,
        // smartSpeed: 1000,
        nav: true,
        navText: ['<img src="assets/img/icon-svg/left-arrow.svg" alt="right arrow">', '<img src="assets/img/icon-svg/right-arrow.svg" alt="right arrow">'],
        dots: true,
        responsive: {
            0: {
                items: 2,
                dots: false,
                center: true
            },
            576: {
                items: 2,
                margin: 30,
                dots: false
            },
            768: {
                items: 2,
                margin: 30
            },
            992: {
                items: 3,
                margin: 70
            }
        }
    });


    $('.related-news-slide').owlCarousel({
        loop: false,
        margin: 30,
        autoplay: false,
        autoPlayTimeout: 2000,
        // smartSpeed: 1000,
        nav: false,
        navText: ['<img src="assets/img/icon-svg/left-arrow.svg" alt="right arrow">', '<img src="assets/img/icon-svg/right-arrow.svg" alt="right arrow">'],
        dots: false,
        mouseDrag: false,
        responsive: {
            0: {
                items: 2,
                nav: true,
                center: true
            },
            576: {
                items: 2,
                nav: true
            },
            992: {
                items: 3,
                margin: 70
            }
        }
    });

});