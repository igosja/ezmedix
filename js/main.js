function initialize(lat, lng) {
    var myLatlng = new google.maps.LatLng(lat, lng);
    var mapOptions = {
        zoom: 17,
        center: myLatlng
    };
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
    var image = '/img/map-icon.png';
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        icon: image,
        title: ''
    });
}


jQuery(document).ready(function ($) {
    $(".phone_mask").mask("(999) 999-99-99");

    $('a[href^="#"]').click(function () {
        var el = $(this).attr('href');
        $('body').animate({
            scrollTop: $(el).offset().top
        }, 2000);
        return false;
    });


    $('.nav-h').hover(function () {
        $('.nav__drop').stop().fadeIn(600);
        $('.nav__arrow').addClass('active');
    }, function () {
        $('.nav__drop').stop().fadeOut(600);
        $('.nav__arrow').removeClass('active');
    });

    $('.lang-select > select').selectmenu();

    var map_div = $("#map");
    if (map_div.length) {
        initialize(map_div.data('lat'), map_div.data('lng'));
    }

    $('.overlayElementTrigger').on('click', function () {
        if ($('.overlay-forms').is(':visible')) {
            $('.of-form').stop().fadeOut();
        } else {
            $('.overlay-forms').stop().fadeIn();
        }

        $('.' + $(this).data('selector')).stop().fadeIn();
    });

    $('.form-overlay').on('click', function () {
        $('.of-form').stop().fadeOut();
        $('.overlay-forms').stop().fadeOut();
        if ($('.popup.youtube').length) {
            $('.youtube .video-container').find('iframe').attr('src', '');
            $('.popup.youtube').hide();
        }
    });

    $('.of-close').on('click', function () {
        $('.of-form').stop().fadeOut();
        $('.overlay-forms').stop().fadeOut();
        if ($('.popup.youtube').length) {
            $('.youtube .video-container').find('iframe').attr('src', '');
            $('.popup.youtube').hide();
        }
    });

    $('.show-b').on('click', function () {
        if ($(this).hasClass('active')) {
            $(this).next('.hidden-b').slideUp();
            $(this).removeClass('active');
        }
        else {
            $(this).next('.hidden-b').slideDown();
            $(this).addClass('active');
        }

    });

    var footerHeight = $("footer").outerHeight();
    $("footer").css({'margin-top': -footerHeight});
    $(".clearfix-footer").css({'height': footerHeight});

    $(".acrdn-item-head").click(function (e) {
        e.preventDefault();
        if (!($(this).parent().hasClass("opened"))) {
            $(".acrdn-item-body").slideUp();
            $(".acrdn-item").removeClass("opened");
            $(this).parent().children(".acrdn-item-body").slideDown();
            $(this).parent().addClass("opened");
        } else {
            $(".acrdn-item-body").slideUp();
            $(this).parent().removeClass("opened");
        }
    });

    var slide = $("#slider");
    slide.owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        items: 1,
        singleItem: true,
        responsive: true,
        responsiveRefreshRate: 1,
        pagination: true,
        navigationText: false,
        navigation: true,
        autoPlay: 5000,
        transitionStyle: "fade"
    });

    $("#transitionType").change(function () {
        var newValue = $(this).val();
        slide.data("owlCarousel").transitionTypes(newValue);
        slide.trigger("owl.play");
    });

    var slideTov = $(".prod-more");
    slideTov.owlCarousel({
        navigation: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        items: 5,
        responsive: true,
        responsiveRefreshRate: 1,
        pagination: false,
        navigationText: false,
        autoPlay: false,
        loop: false
    });

    if ($(".slider").length) {
        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            fade: true,
            cssEase: 'linear',
            variableWidth: false,
            variableHeight: false,
            centerMode: false,
            asNavFor: '.slider-nav',
            prevArrow: $('.prev'),
            nextArrow: $('.next')
        });
    }

    if ($(".slider").length) {
        $('.slider-nav').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            asNavFor: '.slider',
            vertical: false,
            dots: false,
            arrows: false,
            infinite: false
        });
    }
});