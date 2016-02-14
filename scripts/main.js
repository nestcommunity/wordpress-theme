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
});