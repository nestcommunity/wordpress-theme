$(document).ready(function() {
    //Menu scroll
    $(window).on('scroll', function() {
        if ($(window).width() > 640) {
            var menuPosition = $(".header").outerHeight();
            var bodyTextPosition = $(".contents").position().top - $(window).scrollTop();

            if (menuPosition > bodyTextPosition) {
                $(".header").css({
                    'position': 'absolute',
                    'top': $(".contents").position().top - menuPosition,
                    'right': 0
                });
            }

            if ($(".contents").position().top - $(window).scrollTop() - menuPosition > 0) {
                $(".header").css({
                    'position': 'fixed',
                    'top': 0,
                    'right': 0
                });
            }
        }
    });

    var companiesDisplayed = true;
    var individualsDisplayed = true;
    $('.company-selector').click(function() {
        if (companiesDisplayed) {
            $(this).removeClass('active');
            $('.member.company').each(function() {
                $(this).fadeOut();
            });
            companiesDisplayed = false;
        } else {
            $(this).addClass('active');
            $('.member.company').each(function() {
                $(this).show();
            });
            companiesDisplayed = true;
        }
    });
    $('.individual-selector').click(function() {
        if (individualsDisplayed) {
            $(this).removeClass('active');
            $('.member.individual').each(function() {
                $(this).fadeOut();
            });
            individualsDisplayed = false;
        } else {
            $(this).addClass('active');
            $('.member.individual').each(function() {
                $(this).show();
            });
            individualsDisplayed = true;
        }
    });
});