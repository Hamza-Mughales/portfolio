$(document).ready(function () {


    // Coloring services
    $('.srevice').mouseenter(function () {
        $(this).children('i').css('color', '#f1c40f')
    });
    $('.srevice').mouseleave(function () {
        $(this).children('i').css('color', '#000000ad')
    });


    // Go Up Button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });
    //Click event to scroll to top
    $('.scrollToTop').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });


});
