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

    //Company & Individual Selector
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

    //Overlay Display
    var overlayDisplayed = false;
    $('#cross').click(function(event) {
       $('.overlay').fadeOut();
        event.preventDefault();
        overlayDisplayed = false;
    });
    $('.member').click(function(event) {
        event.preventDefault();
        var memberId = $(this).attr('href');
        var url = "/wp-content/themes/nest-community/ajax/member.php?id=" + memberId;
        $.get(url, function(data) {
            var data = JSON.parse(data);
            $('.overlay-heading').html(data.heading);
            $('.overlay-description').html(data.description);
            $('.image').attr('src', data.image);
            $('.facebook').attr('href', data.facebook);
            $('.twitter').attr('href', data.twitter);
            $('.linkedin').attr('href', data.linkedin);
            $('.website').attr('href', data.website);
            $('.email').html(data.email);
            $('.phone').html(data.phone);

            if (data.facebook == '') {
                $('.facebook-container').hide();
            }
            if (data.twitter == '') {
                $('.twitter-container').hide();
            }
            if (data.linkedin == '') {
                $('.linkedin-container').hide();
            }
            if (data.website == '') {
                $('.website').hide();
            }
            if (data.email == '') {
                $('.email-container').hide();
            }
            if (data.phone == '') {
                $('.phone-container').hide();
            }

            if (data.email == '' && data.phone == '') {
                $('.contact-details').hide();
            }

            $('.overlay').fadeIn();
            overlayDisplayed = true;
        });
    });
});