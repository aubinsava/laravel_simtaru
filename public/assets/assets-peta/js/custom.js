"use strict";
$(document).ready(function () {
    $(window).on('load', function () {
        jQuery("#load").fadeOut();
        jQuery("#loading").delay(0).fadeOut("slow");
        $(".navbar a").on("click", function (event) {
            if (!$(event.target).closest(".nav-item.dropdown").length) {
                $(".navbar-collapse").collapse('hide');
            }
        });
        $('.isotope').isotope({
            itemSelector: '.iq-grid-item',
        });
        $('.isotope-filters').on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $('.isotope').isotope({
                resizable: true,
                filter: filterValue
            });
            $('.isotope-filters button').removeClass('active');
            $(this).addClass('active');
        });

        function sticky_relocate() {
            var window_top = $(window).scrollTop();
            if ($('.iq-works').length && $('.iq-features').length) {
                var div_top = $('.iq-works').offset().top + 900;
                var div_features = $('.iq-features').offset().top - 155;
                if (window_top > div_top) {
                    $('.our-info').addClass('menu-sticky').show();
                    if (window_top > div_features) {
                        $('.our-info').removeClass('menu-sticky').hide();
                    }
                } else {
                    $('.our-info').removeClass('menu-sticky').show();
                }
            }
        }
        $(function () {
            $(window).scroll(sticky_relocate);
            sticky_relocate();
        });
        var $msnry = $('.iq-masonry-block .iq-masonry');
        if ($msnry) {
            var $filter = $('.iq-masonry-block .isotope-filters');
            $msnry.isotope({
                percentPosition: true,
                resizable: true,
                itemSelector: '.iq-masonry-block .iq-masonry-item',
                masonry: {
                    gutterWidth: 0
                }
            });
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $msnry.isotope({
                    filter: filterValue
                });
            });
            $filter.each(function (i, buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'button', function () {
                    $buttonGroup.find('.active').removeClass('active');
                    $(this).addClass('active');
                });
            });
        }
        $('.iq-progress-bar > span').each(function () {
            var $this = $(this);
            var width = $(this).data('percent');
            $this.css({
                'transition': 'width 2s'
            });
            setTimeout(function () {
                $this.appear(function () {
                    $this.css('width', width + '%');
                });
            }, 500);
        });
        if ($("#chartContainer").length) {
            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "light2",
                animationEnabled: true,
                data: [{
                    type: "pie",
                    indexLabelFontSize: 18,
                    radius: 80,
                    indexLabel: "{label} - {y}",
                    yValueFormatString: "###0.0\"%\"",
                    click: explodePie,
                    dataPoints: [{
                        y: 42,
                        label: "Data Analysis"
                    }, {
                        y: 21,
                        label: "Social Media Marketing"
                    }, {
                        y: 24.5,
                        label: "Business Analysis"
                    }, {
                        y: 9,
                        label: "Research And Strategy"
                    }]
                }]
            });
            chart.render();

            function explodePie(e) {
                for (var i = 0; i < e.dataSeries.dataPoints.length; i++) {
                    if (i !== e.dataPointIndex)
                        e.dataSeries.dataPoints[i].exploded = false;
                }
            }
        }
    });
    $('#menu-1').megaMenu({
        logo_align: 'left',
        links_align: 'left',
        socialBar_align: 'left',
        searchBar_align: 'right',
        trigger: 'hover',
        effect: 'fade',
        effect_speed: 400,
        sibling: true,
        outside_click_close: true,
        top_fixed: false,
        sticky_header: true,
        sticky_header_height: 200,
        menu_position: 'horizontal',
        full_width: true,
        mobile_settings: {
            collapse: true,
            sibling: true,
            scrollBar: true,
            scrollBar_height: 400,
            top_fixed: false,
            sticky_header: true,
            sticky_header_height: 200
        }
    });
    $('#back-to-top').fadeOut();
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 250) {
            $('#back-to-top').fadeIn(1400);
        } else {
            $('#back-to-top').fadeOut(400);
        }
    });
    $('#top').on('click', function () {
        $('top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    $('.iq-accordion .iq-ad-block .ad-details').hide();
    $('.iq-accordion .iq-ad-block:first').addClass('ad-active').children().slideDown('slow');
    $('.iq-accordion .iq-ad-block').on("click", function () {
        if ($(this).children('div').is(':hidden')) {
            $('.iq-accordion .iq-ad-block').removeClass('ad-active').children('div').slideUp('slow');
            $(this).toggleClass('ad-active').children('div').slideDown('slow');
        }
    });
    $('.popup-gallery').magnificPopup({
        delegate: 'a.popup-img',
        tLoading: 'Loading image #%curr%...',
        type: 'image',
        mainClass: 'mfp-img-mobile',
        gallery: {
            navigateByImgClick: true,
            enabled: true,
            preload: [0, 1]
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
        }
    });
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        type: 'iframe',
        disableOn: 700,
        mainClass: 'mfp-fade',
        preloader: false,
        removalDelay: 160,
        fixedContentPos: false
    });
    new WOW().init();
    $('.owl-carousel').each(function () {
        var $carousel = $(this);
        $carousel.owlCarousel({
            items: $carousel.data("items"),
            loop: $carousel.data("loop"),
            margin: $carousel.data("margin"),
            nav: $carousel.data("nav"),
            dots: $carousel.data("dots"),
            autoplay: $carousel.data("autoplay"),
            autoplayTimeout: $carousel.data("autoplay-timeout"),
            navText: ['<i class="ion-arrow-left-c"></i>', '<i class="ion-arrow-right-c"></i>'],
            responsiveClass: true,
            responsive: {
                0: {
                    items: $carousel.data("items-mobile-sm")
                },
                480: {
                    items: $carousel.data("items-mobile")
                },
                786: {
                    items: $carousel.data("items-tab")
                },
                1023: {
                    items: $carousel.data("items-laptop")
                },
                1199: {
                    items: $carousel.data("items")
                }
            }
        });
    });
    $('#countdown').countdown({
        date: '10/06/2020 23:59:59',
        day: 'Day',
        days: 'Days'
    });

    function animateElements() {
        $('.progressbar').each(function () {
            var elementPos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            var percent = $(this).find('.circle').attr('data-percent');
            var percentage = parseInt(percent, 10) / parseInt(100, 10);
            var animate = $(this).data('animate');
            if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                $(this).data('animate', true);
                $(this).find('.circle').circleProgress({
                    startAngle: -Math.PI / 2,
                    value: percent / 100,
                    thickness: 9,
                    fill: {
                        color: '#1B58B8'
                    }
                }).stop();
                $(this).find('.circle.purple').circleProgress({
                    fill: {
                        color: '#6934cb'
                    }
                });
                $(this).find('.circle.light-purple').circleProgress({
                    fill: {
                        color: '#2920ad'
                    }
                });
                $(this).find('.circle.green').circleProgress({
                    fill: {
                        color: '#ffd400'
                    }
                });
            }
        });
    }
    animateElements();
    $(window).scroll(animateElements);
    $(document).ready(function () {
        $('.our-info ul.about-us li a').on('click', function () {
            var id = $(this).attr('href');
            $(id).css({
                "padding-top": "250px"
            });
            $('.our-info ul.about-us li a.active').removeClass('active');
            $(this).addClass('active');
        });
    });
    $(function () {
        $('body').addClass('js');
        var $hamburger = $('.hamburger'),
            $nav = $('#site-nav'),
            $masthead = $('#masthead');
        $hamburger.click(function () {
            $(this).toggleClass('is-active');
            $nav.toggleClass('is-active');
            $masthead.toggleClass('is-active');
            return false;
        })
    });
});