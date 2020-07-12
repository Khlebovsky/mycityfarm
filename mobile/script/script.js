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

$(function () {
    $('.category h2').click(function () {
        $cat = $(this).parent();
        $($cat).find($('.sub-category-wrap')).slideToggle(300, function () {
            if ($(this).is(':hidden')) {
                $($cat).find($('h2 .arrow')).html('<i class="fa fa-angle-right" aria-hidden="true"></i>');
            } else {
                $($cat).find($('h2 .arrow')).html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
            }
        });
    });
});

$(function () {
    $('.sub-category h3').click(function () {
        $cat = $(this).parent();
        $($cat).find($('.article-wrap')).slideToggle(300, function () {
            if ($(this).is(':hidden')) {
                $($cat).find($('h3 .arrow')).html('<i class="fa fa-angle-right" aria-hidden="true"></i>');
            } else {
                $($cat).find($('h3 .arrow')).html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
            }
        });
    });
});