(function ($) {
    "use strict";

    //Preloader
    $(window).on('load', function (event) {
        $('.js-preloader').delay(500).fadeOut(500);
    });
    
    //Open Search Box
    $('.searchbtn').on('click', function() {
        $('.search-area').toggleClass('open');
    });
    $('.close-searchbox').on('click', function() {
        $('.search-area').removeClass('open');
    }); 

    // Language Dropdown
    $(".language-option").each(function () {
        var each = $(this)
        each.find(".lang-name").html(each.find(".language-dropdown-menu a:nth-child(1)").text());
        var allOptions = $(".language-dropdown-menu").children('a');
        each.find(".language-dropdown-menu").on("click", "a", function () {
            allOptions.removeClass('selected');
            $(this).addClass('selected');
            $(this).closest(".language-option").find(".lang-name").html($(this).text());
        });
    })
    // Menu JS
    $('.navbar .navbar-nav li a').on('click', function(e){
        var anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $(anchor.attr('href')).offset().top - 0
        }, 50);
        e.preventDefault();
    });

    $(document).on('click','.navbar-collapse.in',function(e) {
        if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
            $(this).collapse('hide');
        }
    });
    
    $('.navbar .navbar-nav li a').on('click', function(){
        $('.navbar-collapse').collapse('hide');
        $(this).addClass('active');
    });

    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '.navbar-expand-lg'
    })
      

    //Tweenmax js
    // $('.hero-wrap').mousemove(function (e) {
    //     var wx = $(window).width();
    //     var wy = $(window).height();
    //     var x = e.pageX - this.offsetLeft;
    //     var y = e.pageY - this.offsetTop;
    //     var newx = x - wx / 2;
    //     var newy = y - wy / 2;
    //     $('.hero-content').each(function () {
    //         var speed = $(this).attr('data-speed');
    //         if ($(this).attr('data-revert')) speed *= -.4;
    //         TweenMax.to($(this), 1, { x: (1 - newx * speed), y: (1 - newy * speed) });
    //     });
    // });
    
    //Hero  Slider 
    $(".hero-slider-one").owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        margin: 20,
        rtl:true,
        items: 1,
        navText: ['<i class="ri-arrow-left-s-line"></i>', '<i class="ri-arrow-right-s-line"></i>'],
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
    });

    $(".hero-slider-two").owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        margin: 20,
        rtl:true,
        items: 1,
        navText: ['<i class="ri-arrow-left-s-line"></i>', '<i class="ri-arrow-right-s-line"></i>'],
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
    });

    $(".hero-slider-three").owlCarousel({
        nav: false,
        dots: false,
        loop: true,
        margin: 20,
        rtl:true,
        items: 1,
        navText: ['<i class="ri-arrow-left-s-line"></i>', '<i class="ri-arrow-right-s-line"></i>'],
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
    });

    //Service Slider 
    $(".service-slider-one").owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        margin: 25,
        rtl:true,
        navText: ['<i class="ri-arrow-left-s-line"></i>', '<i class="ri-arrow-right-s-line"></i>'],
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            },
            1400: {
                items: 4,
            }
        }
    });

    $(".service-slider-two").owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        margin: 25,
        rtl:true,
        navText: ['<i class="ri-arrow-left-s-line"></i>', '<i class="ri-arrow-right-s-line"></i>'],
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });
    $(".service-slider-three").owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        margin: 25,
        rtl:true,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });
    $(".service-slider-four").owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        margin: 25,
        rtl:true,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    });

    //Gallery Slider 
    $(".gallery-slider-one").owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        margin: 25,
        items: 1,
        rtl:true,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });
    $(".gallery-slider-two").owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        margin: 5,
        rtl:true,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            }
        }
    });

    //Department Slider
    $(".dp-img-slider").owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        margin: 5,
        rtl:true,
        items:1,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
    });

    //Testimonial Slider 
    $(".testimonial-slider-one").owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        navText: ['<i class="ri-arrow-left-s-line"></i>', '<i class="ri-arrow-right-s-line"></i>'],
        margin: 25,
        items: 1,
        rtl:true,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });

    $(".testimonial-slider-two").owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        margin: 25,
        rtl:true,
        items: 1,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
    });

    $(".testimonial-slider-three").owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        margin: 25,
        items: 1,
        rtl:true,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            },
            1400: {
                items: 4,
            }
        }
    });

    $(".testimonial-slider-four").owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        margin: 25,
        items: 1,
        rtl:true,
        navText: ['<i class="ri-arrow-left-s-line"></i>', '<i class="ri-arrow-right-s-line"></i>'],
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 1,
            },
            992: {
                items: 1,
            },
            1200: {
                items: 2,
            }
        }
    });

    //Team Slider
    $(".team-slider-one").owlCarousel({
        nav: false,
        dots: true,
        loop: true,
        margin: 25,
        items: 1,
        rtl:true,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });
    $(".team-slider-two").owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        margin: 25,
        navText: ['<i class="ri-arrow-left-s-line"></i>', '<i class="ri-arrow-right-s-line"></i>'],
        items: 1,
        rtl:true,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });

    //Partner Slider
    $(".partner-slider").owlCarousel({
        nav: false,
        dots: false,
        loop: true,
        margin: 20,
        rtl:true,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 2,
                margin: 10,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            },
            1200: {
                items: 5,
            },
            1400: {
                items: 5,
            }
        }
    });

    //Blog Slider
    $(".blog-slider-one").owlCarousel({
        nav: true,
        dots: false,
        loop: true,
        navText: ['<i class="ri-arrow-left-s-line"></i>', '<i class="ri-arrow-right-s-line"></i>'],
        margin: 22,
        items: 1,
        rtl:true,
        thumbs: false,
        smartSpeed: 1300,
        autoplay: false,
        autoplayTimeout: 4000,
        autoplayHoverPause: false,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });

    //sticky Header
    var wind = $(window);
    var sticky = $('.header-wrap');
    wind.on('scroll', function () {
        var scroll = wind.scrollTop();
        if (scroll < 100) {
            sticky.removeClass('sticky');
        } else {
            sticky.addClass('sticky');
        }
    });

    // Scroll animation
    AOS.init();

    //Back To top
    function BackToTop() {
        $('.back-to-top').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 100);
            return false;
        });

        $(document).scroll(function () {
            var y = $(this).scrollTop();
            if (y > 600) {
                $('.back-to-top').fadeIn();
                $('.back-to-top').addClass('open');
            } else {
                $('.back-to-top').fadeOut();
                $('.back-to-top').removeClass('open');
            }
        });
    }
    BackToTop();

})(jQuery);

// function to set a given theme/color-scheme
function setTheme(themeName) {
    localStorage.setItem('duch_rtl_theme', themeName);
    document.documentElement.className = themeName;
}

// function to toggle between light and dark theme
function toggleTheme() {
    if (localStorage.getItem('duch_rtl_theme') === 'theme-dark') {
        setTheme('theme-light');
    } else {
        setTheme('theme-dark');
    }
}

// Immediately invoked function to set the theme on initial load
(function () {
    if (localStorage.getItem('duch_rtl_theme') === 'theme-dark') {
        setTheme('theme-dark');
        document.getElementById('slider').checked = false;
    } else {
        setTheme('theme-light');
        document.getElementById('slider').checked = true;
    }
})();