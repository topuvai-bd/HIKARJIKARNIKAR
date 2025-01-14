"use strict";
! function (p) {

    var $window = $(window);

    /* WOW JS
    * ------------------------------------------------------ */
    if ($window.width() > 1100) {
        new WOW().init();
    }

    /*-----------------------------------
     * NAVBAR CLOSE ON CLICK
     *-----------------------------------*/

    $('.mobile-toggle').click(function () {
        $(this).toggleClass('show');
        $('.main-menu').toggleClass('show');
        $('html').toggleClass('menushow');
        $('.overlay').toggleClass('show');
    });

    $('.overlay').click(function () {
        $(this).removeClass('show');
        $('.main-menu').removeClass('show');
        $('html').removeClass('menushow');
        $('.mobile-toggle').removeClass('show');
    });


    if ($window.width() > 992) {
        $(".dropdown").hover(function (e) {
            $(this).toggleClass("active");
        });
    }
    // Mobile dropdown on click
    if ($window.width() < 992) {
        $(".dropdown-toggle").click(function (e) {
            $(this).toggleClass("active");
            if (!$(this).next(".dropdown-menu").hasClass("collapse")) {
                return $(this).next(".dropdown-menu").addClass("collapse").slideDown(300);
            } else {
                $(this).next(".dropdown-menu").removeClass("collapse").slideUp(300);
            }

        });
    }


    /* Back to Top
    * ------------------------------------------------------ */
    var element = $('#scrollUp');
    $(window).scroll(function () {
        if ($(window).scrollTop() > 200) {
            element.addClass('active');
        } else {
            element.removeClass('active');
        }
    });
    element.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '800');
    });



    /* TOOLTIP */
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip()
    });


    // Carousel
    $('.kyc-slider').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: false,
        navText: ["<i class='fal fa-chevron-left'></i>", "<i class='fal fa-chevron-right'></i>"],
        nav: false,
        dots: true,
        dotsEach: true,
        items: 1.2,
    });



}(jQuery);