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
            $("a.back-to-top").fadeIn();
            $(".banner").addClass("scrolled");
        } else {
            $("a.back-to-top").fadeOut()
            $(".banner").removeClass("scrolled");
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
        showTitle: true,
        showCaption: false,
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

    var $imgtoggler = $("<div></div>", {class:"imgtoggler"});

    $( ".pageresult" ).wrapInner(function() {
        return "<a href='" + $(this).find(".tx-dlf-metadata-title a").attr("href") + "'></a>";
    });

    $( ".pageresult" ).prepend( $imgtoggler );

    $(".imgtoggler").click(function() {
        $(this).parent().find('.tx-dlf-listview-thumbnail').slideToggle("slow", function() {
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
        $(this).toggleClass('open');
    })

    $("main").click(function() {
        $("aside").removeClass("show");
    })

    /* ##################################################### */
    /* ############## BACKGROUND IMAGE SLIDER ############## */
    /* ##################################################### */

    /*$('.fadein img:gt(0)').hide();

    var slider = function() {
        $('.fadein :first-child').fadeOut(3000).next('img').fadeIn(3000).end().appendTo('.fadein');
    };
    setInterval(slider, 7000);
    slider();*/

    /* ##################################################### */
    /* ########### BACKGROUND IMAGE SLIDER RANDOM ########## */
    /* ##################################################### */

    function random(n) {
        return Math.floor(Math.random() * n);
    }
    var transition_time = 3000;
    var waiting_time = 7000;
    var images = $('div.fadein img');
    var n = images.length;
    var current = random(n);
    images.hide();
    images.eq(current).fadeIn(3000);


    window.setInterval(swapImages, waiting_time);

    function swapImages() {

        var $currentImg = $('.background:visible');
        var $nextImg = $('.background:hidden').eq(Math.floor(Math.random() * $('.background:hidden').length));

        // animation speed should be the same for both images so we have a smooth change
        $currentImg.fadeOut(transition_time);
        $nextImg.fadeIn(transition_time);
    }

    /* ##################################################### */
    /* ############## COOKIEBAR ############################ */
    /* ##################################################### */

    $('.cookie-message').cookieBar({ closeButton : '.my-close-button' });

    /* ##################################################### */
    /* ############## IE10 & IE11 DETECTION ################ */
    /* ##################################################### */

    var ua = navigator.userAgent,
        doc = document.documentElement;

        if ((ua.match(/MSIE 10.0/i))) {
        doc.className = doc.className + " ie10";

        } else if((ua.match(/rv:11.0/i))){
        doc.className = doc.className + " ie11";
        }

});
