/* 
==================================================
- Template Name: Gstar
- Author: Mountain Theme
- Description: Gstar - Personal Portfolio HTML Template
- Version: 1.0.0
==================================================
*/

(function ($) {

    "use strict";

    /* -------------------------------------------------------- */
    /* - Preloader
    /* -------------------------------------------------------- */
    $(window).on('load', function () {
        $('.loader').fadeOut();
        $('.preloader').delay(333).fadeOut("slow");
        $('body').delay(333);
    });

    /* -------------------------------------------------------- */
    /* - Hamburger Menu
    /* -------------------------------------------------------- */
    $('.hamburger-menu').on('click', function () {
        $('.hamburger-menu').toggleClass('active');
    });

    let navBar = document.querySelectorAll(".nav-link");
    let navbarCollapse = document.querySelector(".navbar-collapse");
    navBar.forEach((a) => {
        a.addEventListener("click", () => {
            navbarCollapse.classList.remove("show");
            $('.hamburger-menu').removeClass('active');
        });
    });

    /* -------------------------------------------------------- */
    /* - Dark Mode
    /* -------------------------------------------------------- */
    let navLogo = document.querySelector(".navbar-brand img");

    // Function to toggle the dark theme
    function toggleDarkTheme() {
        // Toggle the class on the body tag
        $("body").toggleClass("dark-theme");

        // Store the preference in local storage
        const isDarkTheme = $("body").hasClass("dark-theme");
        localStorage.setItem("darkTheme", isDarkTheme);

        if (isDarkTheme) {
            navLogo.src = "assets/images/logo/white-logo.png";
            $("meta")[2].content = "dark";
        } else {
            navLogo.src = "assets/images/logo/dark-logo.png";
            $("meta")[2].content = "light";
        }
    }

    // Check if the user preference is already stored in local storage
    $(document).ready(function () {
        const isDarkTheme = localStorage.getItem("darkTheme") === "true";

        // Apply the dark theme if the preference is set to true
        if (isDarkTheme) {
            $("body").addClass("dark-theme");
            navLogo.src = "assets/images/logo/white-logo.png";
            $("meta")[2].content = "dark";
        }

        // Attach click event to the specified div
        $(".mode-toggle").on("click", toggleDarkTheme);
    });

    /* -------------------------------------------------------- */
    /* - Typed
    /* -------------------------------------------------------- */
    $(".typed").each(function () {
        var typed = new Typed('.typed', {
            stringsElement: '.typed-strings',
            loop: true,
            typeSpeed: 100,
            backSpeed: 50,
            backDelay: 1500,
        });
    });

    /* -------------------------------------------------------- */
    /* - Clients Owl Carousel
    /* -------------------------------------------------------- */
    if ($("html").attr("dir") == 'rtl') {
        var rtlVal = true;
        var navArrow = ["<i class='fa-regular fa-chevron-right'></i>", "<i class='fa-regular fa-chevron-left'></i>"];
    } else {
        var rtlVal = false;
        var navArrow = ["<i class='fa-regular fa-chevron-left'></i>", "<i class='fa-regular fa-chevron-right'></i>"];
    }

    $('.clients-review-carousel').owlCarousel({
        rtl: rtlVal,
        margin: 16,
        smartSpeed: 1000,
        responsiveClass: true,
        dots: false,
        loop: true,
        nav: true,
        navText: navArrow,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            767: {
                items: 1
            },
            1000: {
                items: 1
            },
            1200: {
                items: 2
            },
            1920: {
                items: 2
            }
        }
    });

    /* -------------------------------------------------------- */
    /* - Isotope Project Filter
    /* -------------------------------------------------------- */
    $(window).on('load', function () {
        $(".project-filter-items").each(function () {
            var e = $(this);
            if ($("html").attr("dir") == 'rtl') {
                var rtlVal = false
            } else {
                var rtlVal = true;
            }
            var $grid = e.isotope({
                layoutMode: "masonry",
                originLeft: rtlVal
            });
            $(".project-filter").find("a").on("click", function () {
                var filterValue = $(this).attr("data-filter");
                return $(".project-filter").find("a").removeClass("current"), $(this).addClass("current"),
                    $grid.isotope({
                        filter: filterValue
                    }), !1
            });
        });
    });

    /* -------------------------------------------------------- */
    /* - Brands Owl Carousel
    /* -------------------------------------------------------- */
    $('.brands-carousel').owlCarousel({
        rtl: rtlVal,
        margin: 16,
        smartSpeed: 2000,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsiveClass: true,
        dots: false,
        loop: true,
        nav: false,
        navText: ["<i class='fa-regular fa-chevron-left'></i>", "<i class='fa-regular fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 3
            },
            767: {
                items: 4
            },
            1000: {
                items: 4
            },
            1024: {
                items: 5
            },
            1200: {
                items: 5
            },
            1920: {
                items: 5
            }
        }
    });

    /* -------------------------------------------------------- */
    /* - Back to Top
    /* -------------------------------------------------------- */
    $(function () {
        let scrollTopButton = $('#back-top-top');

        $(window).on('scroll', function () {
            let scroll = $(document).scrollTop();

            // Apply Transition
            if (scroll >= 250) {
                scrollTopButton.addClass("active");
            } else {
                scrollTopButton.removeClass("active");
            }
        });
    });

    /* -------------------------------------------------------- */
    /* - Copyright Year Change
    /* -------------------------------------------------------- */
    $('#currentYear').text(new Date().getFullYear());

})(jQuery);