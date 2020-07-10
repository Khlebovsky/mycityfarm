$(document).ready(function () {
    document.getElementById("horizontal-scroller")
        .addEventListener('wheel', function (event) {
            if (event.deltaMode == event.DOM_DELTA_PIXEL) {
                var modifier = 1;
                // иные режимы возможны в Firefox
            } else if (event.deltaMode == event.DOM_DELTA_LINE) {
                var modifier = parseInt(getComputedStyle(this).lineHeight);
            } else if (event.deltaMode == event.DOM_DELTA_PAGE) {
                var modifier = this.clientHeight;
            }
            if (event.deltaY != 0) {
                // замена вертикальной прокрутки горизонтальной
                this.scrollLeft += modifier * event.deltaY;
                event.preventDefault();
            }
        });
});

$(function () {
    $('.open-menu').click(function () {
        $('.menu').fadeIn(300);
        $('.menu').css('display', 'flex');
        $('.open-menu').animate({
            opacity: 0
        }, 300)
    });
    $('.close-menu').click(function () {
        $('.menu').fadeOut(300);
        $('.open-menu').animate({
            opacity: 1
        }, 300)
    });
    $('.menu .links a').click(function () {
        $('.menu').fadeOut(300);
        $('.open-menu').animate({
            opacity: 1
        }, 300)
    });
});

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
};

$(function () {
    $("a[href^='#']").click(function () {
        var _href = $(this).attr("href");
        $("html, body").animate({
            scrollTop: $(_href).offset().top - 50
        }, getRandomInt(300, 1000));
        return false;
    });
});