// Jquery UI
$(document).ready(function() {
    $('.header').mouseover(function() {
        $('.header li span').addClass('show-menu');
    });
    $('.header').mouseout(function() {
        $('.header li span').removeClass('show-menu').delay(800);
    });


});