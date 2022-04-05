jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader              = $('#loader');
    var loader_container    = $('#preloader');
    var scroll              = $(window).scrollTop();  
    var scrollup            = $('.backtotop');
    var menu_toggle         = $('.menu-toggle');
    var dropdown_toggle     = $('.main-navigation button.dropdown-toggle');
    var nav_menu            = $('.main-navigation ul.nav-menu');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    $('#top-bar').click(function(){
        $('#top-bar .wrapper').slideToggle();
        $('#top-bar').toggleClass('top-menu-active');
    });

    menu_toggle.click(function(){
        nav_menu.slideToggle();
        $('.main-navigation').toggleClass('menu-open');
        $('.menu-overlay').toggleClass('active');
        $(this).toggleClass('active');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
        $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('#site-navigation').removeClass('menu-open');
            $('#primary-menu').slideUp();
            $('.menu-overlay').removeClass('active');
        }
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.fixed-header #masthead').addClass('nav-shrink');
        }
        else {
            $('.fixed-header #masthead').removeClass('nav-shrink');
        }
    });

    if ($(window).width() < 1024) {
        $( ".nav-menu ul.sub-menu li:last-child" ).focusout(function() {
            dropdown_toggle.removeClass('active');
            $('.main-navigation .sub-menu').slideUp();
        });
    }

/*------------------------------------------------
            SLICK SLIDER
------------------------------------------------*/

$('#featured-slider').slick();

$('.gallery-slider').slick({
    asNavFor: '.gallery-slider-nav'
});

$('.gallery-slider-nav').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: '.gallery-slider',
    arrows: true,
    dots: false,
    infinite: true,
    focusOnSelect: true,
    responsive: [
    {
    breakpoint: 1200,
        settings: {
            slidesToShow: 5,
            arrows: false
        }
    },
    {
        breakpoint: 900,
            settings: {
            slidesToShow: 4,
            arrows: false
        }
    },
    {
        breakpoint: 767,
            settings: {
            slidesToShow: 3,
            arrows: false
        }
    },
    {
        breakpoint: 500,
            settings: {
            slidesToShow: 2,
            arrows: false
        }
    }
    ]
});

$('.testimonial-slider').slick({
    asNavFor: '.testimonial-slider-nav'
});

$('.testimonial-slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.testimonial-slider',
    arrows: false,
    dots: false,
    infinite: true,
    focusOnSelect: true,
    responsive: [
    {
    breakpoint: 992,
        settings: {
            slidesToShow: 2
        }
    },
    {
        breakpoint: 767,
            settings: {
            slidesToShow: 1        
        }
    }
    ]
});

$('.clients-slider').slick({
    responsive: [
    {
        breakpoint: 1024,
        settings: {
            slidesToShow: 1,
            arrows: false,
            dots: true
        }
    }
    ]
});

$('#business-slider-section').slick();
$('#business-testimonial-section .testimonial-slider-wrapper').slick();
$('#magazine-trending-news .trending-news-wrapper').slick();

$('.matchHeight').matchHeight();

/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });
}
else {
    $('#primary-menu').find("li").unbind('keydown');
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $('#primary-menu').find("li").unbind('keydown');
    }
});

menu_toggle.on('keydown', function (e) {
    tabKey = e.keyCode === 9;
    shiftKey = e.shiftKey;

    if( menu_toggle.hasClass('active') ) {
        if ( shiftKey && tabKey ) {
            e.preventDefault();
            nav_menu.slideUp();
            $('.main-navigation').removeClass('menu-open');
            $('.menu-overlay').removeClass('active');
            menu_toggle.removeClass('active');
        };
    }
});

/*------------------------------------------------
                MAGNIFIC POPUP
------------------------------------------------*/

$('.gallery-popup').magnificPopup( {
    delegate:'.popup', type:'image', tLoading:'Loading image #%curr%...', 
    gallery: {
        enabled: true, navigateByImgClick: true, preload: [0, 1]
    }
    , image: {
        tError:'<a href="%url%">The image #%curr%</a> could not be loaded.', titleSrc:function(item) {
            return item.el.attr('title');
        }
    }
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});