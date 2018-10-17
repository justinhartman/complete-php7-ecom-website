// AJAX DATE PICKER
$(document).ajaxComplete(function() {
    var picker = new Pikaday({
        field: $('#datepicker')[0]
    });
});

$(document).ready(function() {

    "use strict";

    // INTRO
    jQuery(function() {
        function banner_height() {
            var height = jQuery(window).height();
            var bannerheight = (height);
            bannerheight = parseInt(bannerheight) + 'px';
            $("#main-nav").css('height', bannerheight);
        }

        banner_height();
        $(window).bind('resize', banner_height);
    });

    // FULLWIDTH SEARCH
    $(".s-search").on('click', function() {
        $(".search-block").addClass("search-block-act");
        $(".close-btn").addClass("close-btn-active");
    });

    $(".close-btn").on('click', function() {
        $(".search-block").removeClass("search-block-act");
        $(".close-btn").removeClass("close-btn-active");
    });

    $(".mob-menu-trigger").on('click', function() {
        $(".mob-menu").toggleClass("active");
    });

    $(".mob-menu ul li a").on('click', function() {
        $(".mob-menu").removeClass("active");
    });

    $('.remove').on('click', function() {
        $(this).parent().parent().fadeOut();
    });

    // SCROLLSPY
    $("body").scrollspy({
        target: ".navbar-collapse",
        offset: 200
    });

    // BLOG SLIDER	  
    $("#blog-slider").owlCarousel({

        navigation: true, // Show next and prev buttons
        slideSpeed: 300,
        pagination: false,
        paginationSpeed: 400,
        singleItem: true
    });

    // CAROUSEL

    var owl = $(".ts-testimonial-slide");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 1],
            [600, 1],
            [700, 2],
            [1000, 3]
        ],
        autoPlay: 4000,
        slideSpeed: 1000,
        navigation: false,
        pagination: true
    });

    //PRICE RANGE
    $('#slider-container').slider({
        range: true,
        min: 69,
        max: 199,
        values: [69, 199],
        create: function() {
            $("#amount").val("$69 - $199");
        },
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            var mi = ui.values[0];
            var mx = ui.values[1];
        }
    })

    // Gallery Slider
    $('#gal-slider').flexslider({
        animation: "fade",
        slideshow: false,
        directionNav: false,
        controlsContainer: ".gal-wrap",
        controlNav: true,
        manualControls: ".gal-nav li"
    });

    // HOME SHOP CAROUSEL
    var owl = $("#home-shop-carousel");
    owl.owlCarousel({
        itemsCustom: [
            [0, 1],
            [450, 1],
            [600, 1],
            [700, 2],
            [1000, 4]
        ],
        autoPlay: 4000,
        slideSpeed: 1000,
        navigation: false,
        pagination: true
    });

    var owl = $("#home-slider2");
    owl.owlCarousel({
        autoPlay: 4000,
        navigation: false,
        singleItem: true,
        transitionStyle: "fade"
    });

    // TWITTERFEED
    $('#tweetcool').tweecool({
        profile_image: false,
        username: 'envato',
        limit: 1
    });

    // FIXED NAVBAR
    $(window).load(function() {
        $(".one-menu-top").sticky({
            topSpacing: 0
        });

        $(".one-menu-top-ipad").sticky({
            topSpacing: 0
        });

        $(".one-menu-top-mob").sticky({
            topSpacing: 0
        });

    });

    // ACCORDION
    $('#accordion-e1 .collapse').on('shown.bs.collapse', function() {
        $(this).parent().find(".fa-angle-right").removeClass("fa-angle-right").addClass("fa-angle-down");
    }).on('hidden.bs.collapse', function() {
        $(this).parent().find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-right");
    });

    // SLIDER REVOLUTION
    jQuery('.tp-banner').show().revolution({
        dottedOverlay: "none",
        delay: 9000,
        startwidth: 1170,
        startheight: 700,
        hideThumbs: 200,
        thumbWidth: 100,
        thumbHeight: 50,
        thumbAmount: 5,
        navigationType: "none",
        navigationArrows: "solo",
        navigationStyle: "preview1",
        touchenabled: "on",
        onHoverStop: "on",
        swipe_velocity: 0.7,
        swipe_min_touches: 1,
        swipe_max_touches: 1,
        drag_block_vertical: false,
        keyboardNavigation: "on",
        navigationHAlign: "center",
        navigationVAlign: "bottom",
        navigationHOffset: 0,
        navigationVOffset: 20,
        soloArrowLeftHalign: "left",
        soloArrowLeftValign: "center",
        soloArrowLeftHOffset: 20,
        soloArrowLeftVOffset: 0,
        soloArrowRightHalign: "right",
        soloArrowRightValign: "center",
        soloArrowRightHOffset: 20,
        soloArrowRightVOffset: 0,
        shadow: 0,
        fullWidth: "off",
        fullScreen: "on",
        spinner: "spinner0",
        stopLoop: "off",
        stopAfterLoops: -1,
        stopAtSlide: -1,
        shuffle: "off",
        forceFullWidth: "off",
        fullScreenAlignForce: "off",
        minFullScreenHeight: "400",
        hideThumbsOnMobile: "off",
        hideNavDelayOnMobile: 1500,
        hideBulletsOnMobile: "off",
        hideArrowsOnMobile: "off",
        hideThumbsUnderResolution: 0,
        hideSliderAtLimit: 0,
        hideCaptionAtLimit: 0,
        hideAllCaptionAtLilmit: 0,
        startWithSlide: 0,
        fullScreenOffsetContainer: ".header"
    });

    $('.navbar-collapse a').click(function(e) {
        $('.navbar-collapse').collapse('toggle');
    });

    $(' #da-thumbs > li ').each(function() {
        $(this).hoverdir();
    });

    $("a[class^='prettyPhoto']").prettyPhoto({
        theme: 'pp_default'
    });
});

// RESPONSIVE MENU
$(window).load(function() {
    $('#mobnav-btn').click(
        function() {
            $('.sf-menu').toggleClass("xactive");
        });
    $('.mobnav-subarrow').click(
        function() {
            $(this).parent().toggleClass("xpopdrop");
        });
});

// FLEXSLIDER
$(window).load(function() {
    // FLEXSLIDER
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: true,
        directionNav: true,
        smoothHeight: true
    });

    // MASONRY
    var $container = $('#blog-mason');
    $container.isotope({
        itemSelector: '.bm-item'
    });
    var $optionSets = $('#portfolio .folio-filter'),
        $optionLinks = $optionSets.find('a');
    $optionLinks.on('click', function() {
        var $this = $(this);
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('.folio-filter');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            changeLayoutMode($this, options);
        } else {
            $container.isotope(options);
        }
        return false;
    });

    // MASONRY
    var $container = $('#shop-mason');
    $container.isotope({
        itemSelector: '.sm-item'
    });
    var $optionSets = $('#portfolio .folio-filter'),
        $optionLinks = $optionSets.find('a');
    $optionLinks.on('click', function() {
        var $this = $(this);
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('.folio-filter');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            changeLayoutMode($this, options);
        } else {
            $container.isotope(options);
        }
        return false;
    });

    // MASONRY
    var $container = $('#portfolio-home');
    $container.isotope({
        itemSelector: '.project-item'
    });
    var $optionSets = $('#portfolio-section .filter'),
        $optionLinks = $optionSets.find('a');
    $optionLinks.on('click', function() {
        var $this = $(this);
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('.filter');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            changeLayoutMode($this, options);
        } else {
            $container.isotope(options);
        }
        return false;
    });

    // MASONRY
    var $container = $('.portfolio-gal');
    $container.isotope({
        itemSelector: '.folio-item'
    });
    var $optionSets = $('#portfolio-gal .portfolio-gal-filter'),
        $optionLinks = $optionSets.find('a');
    $optionLinks.on('click', function() {
        var $this = $(this);
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('.portfolio-gal-filter');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            changeLayoutMode($this, options);
        } else {
            $container.isotope(options);
        }
        return false;
    });

    //STICKY MENU
    $(".one-header").sticky({
        topSpacing: 0
    });

});

// SETTINGS PANEL
$(document).ready(function() {

    $('.btn-settings').on('click', function() {
        $(this).parent().toggleClass('active');
    });

    $('.switch-handle').on('click', function() {
        $(this).toggleClass('active');
        $('.wrapper').toggleClass('boxed');
    });

    $(".switch-handle").on('click', function() {
        $(".portfolio-gal").isotope("layout");
    });

    $('.color-list div').on('click', function() {
        if ($(this).hasClass('active')) return false;
        $('link.color-scheme-link').remove();
        $(this).addClass('active').siblings().removeClass('active');
        var src = $(this).attr('data-src'),
            colorScheme = $('<link class="color-scheme-link" rel="stylesheet" />');
        colorScheme
            .attr('href', src)
            .appendTo('head');
    });

    $('.reset').on('click', function() {
        $(".bg-list div").removeClass('active');
        $(".switch-handle").removeClass('active');
        $('.wrapper').removeClass('boxed');
        $(".color-list div").removeClass('active');
        $(".body").removeClass('boxed');
        if ($(this).hasClass('active')) return false;
        $('link.color-scheme-link').remove();
        var src = $(this).attr('data-src'),
            colorScheme = $('<link class="color-scheme-link" rel="stylesheet" />');
        colorScheme
            .attr('href', src)
            .appendTo('head');
    });

    $('.reset span').on('click', function() {
        $("body").removeClass("bg-shattered bg-vichy bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-wood_pattern");
    });

    $('.bg-wood_pattern').on('click', function() {
        $("body").removeClass("bg-shattered bg-vichy bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-wood_pattern");
    });

    $('.bg-shattered').on('click', function() {
        $("body").removeClass("bg-wood_pattern bg-vichy bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-shattered");
    });

    $('.bg-vichy').on('click', function() {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-vichy");
    });


    $('.bg-random-grey-variations').on('click', function() {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-vichy bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-random-grey-variations");
    });

    $('.bg-irongrip').on('click', function() {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-vichy bg-random-grey-variations bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-irongrip");
    });

    $('.bg-gplaypattern').on('click', function() {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-random-grey-variations bg-irongrip bg-vichy bg-diamond_upholstery bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-gplaypattern");
    });

    $('.bg-diamond_upholstery').on('click', function() {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-random-grey-variations bg-irongrip bg-gplaypattern bg-vichy bg-denim bg-crissXcross bg-climpek");
        $("body").addClass("bg-diamond_upholstery");
    });

    $('.bg-denim').on('click', function() {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-vichy bg-crissXcross bg-climpek");
        $("body").addClass("bg-denim");
    });

    $('.bg-crissXcross').on('click', function() {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-vichy bg-climpek");
        $("body").addClass("bg-crissXcross");
    });

    $('.bg-climpek').on('click', function() {
        $("body").removeClass("bg-wood_pattern bg-shattered bg-vichy bg-random-grey-variations bg-irongrip bg-gplaypattern bg-diamond_upholstery bg-denim bg-crissXcross ");
        $("body").addClass("bg-climpek");
    });

});

