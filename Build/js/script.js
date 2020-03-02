$(document).ready(function() {


    /* ##################################################### */
    /* ############## SMOOTH SCROLL ######################## */
    /* ##################################################### */

    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function() {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });

    /* ##################################################### */
    /* ############## TOTOP LINK ########################### */
    /* ##################################################### */

    $("a.back-to-top").hide();
    $(window).scroll(function() {
        var e = 200;
        var t = $(window).scrollTop();
        if (t > e) {
            $("a.back-to-top").fadeIn()
        } else {
            $("a.back-to-top").fadeOut()
        }
    })

    /* ##################################################### */
    /* ############## SWIPER ############################### */
    /* ##################################################### */

    //initialize swiper when document ready
    var mySwiper = new Swiper('.swiper-container', {
        // Optional parameters
        autoplay: {
            delay: 5000,
        },
        grabCursor: true,
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        // Responsive breakpoints
        breakpoints: {
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1400: {
                slidesPerView: 4
            },
            2000: {
                slidesPerView: 5
            },
            2500: {
                slidesPerView: 6
            },
            3000: {
                slidesPerView: 7
            }
        }
    })

    /* ##################################################### */
    /* ############## LIGHTBOX ############################# */
    /* ##################################################### */

    $('a[data-rel^=lightcase]').lightcase({
        showTitle: false,
        maxWidth: 1200,
        maxHeight: 800
    });

    /* ##################################################### */
    /* ############## MENU AKKORDEON ####################### */
    /* ##################################################### */

    $('.accordeon .icon').hover(function() {
        $(this).parent().next().slideToggle();
        $(this).parent().siblings().removeClass('active');
        $(this).parent().toggleClass('active');
        return false;
    });

    /* ##################################################### */
    /* ############## RECHERCHE AKKORDEON ################## */
    /* ##################################################### */

    $(".tx-dlf-morevolumes").click(function() {
        $(this).parent().find('.tx-dlf-volume').slideToggle("slow", function() {
            // Animation complete.
        });
        $(this).toggleClass("open");
    });

    /* ##################################################### */
    /* ############## MOBILE MENU ########################## */
    /* ##################################################### */

    $("#menuslide").click(function() {
        event.stopPropagation();
        $("aside").toggleClass("show");
    })

    $("main").click(function() {
        $("aside").removeClass("show");
    })

    /* ##################################################### */
    /* ############## BACKGROUND IMAGE SLIDER ############## */
    /* ##################################################### */

    $('.fadein img:gt(0)').hide();

    var slider = function() {
        $('.fadein :first-child').fadeOut(3000).next('img').fadeIn(3000).end().appendTo('.fadein');
    };
    setInterval(slider, 7000);
    slider();

    /* ##################################################### */
    /* ############## COOKIEBAR ############################ */
    /* ##################################################### */

    $('.cookie-message').cookieBar({ closeButton : '.my-close-button' });

});
