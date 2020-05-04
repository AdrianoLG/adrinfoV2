$(function() {
    var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 300
    });
    var winHeight = $(window).height();
    var headerHeight = $('header').outerHeight();
    $(window).scroll(function() {
        var navHeight = (winHeight / 10 * 3) - (headerHeight / 3) + 30;
        if (window.scrollY > navHeight) {
            $('header').addClass('on');
            if (window.scrollY > (winHeight - 60)) {
                $('header').addClass('over');
            } else {
                $('header').removeClass('over');
            }
        } else {
            $('header').removeClass('on');
        }
    });
    $(window).resize(function() {
        winHeight = $(window).height();
        headerHeight = $('header').outerHeight();
        console.log(winHeight + ', ' + headerHeight);
    });
});
$('#goToPage').click(function() {
    $('header').addClass('on');
    $('header').addClass('over');
})