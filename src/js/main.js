$(function() {
    var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 300
    });
    $('.carousel').carousel({
        interval: 5000
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
    });
    $('#goToPage').click(function() {
        $('header').addClass('on');
        $('header').addClass('over');
    });
    $('#all').click(function(e) {
        e.preventDefault();
        $('.works').isotope({ filter: '*' });
        changeClass($(this));
    })
    $('#jobs').click(function(e) {
        e.preventDefault();
        $('.works').isotope({ filter: '.job' });
        changeClass($(this));
    });
    $('#personal').click(function(e) {
        e.preventDefault();
        $('.works').isotope({ filter: '.personal' });
        changeClass($(this));
    });
    $('.hover-text').click(function() {
        var container = $('<div class="work-detail"><div class="container"></div></div>');
        var title = $(this).find('h3').clone();
        var subtitle = $(this).find('p').clone();
        // text.addClass('work-text');
        container.css({
            height: $(this).outerHeight(),
            left: $(this).offset().left - 9,
            top: $(this).offset().top - $(document).scrollTop() + 6,
            width: $(this).outerWidth(),
        });
        title.css({
            'font-size': '1.125rem',
            color: '#f28f10',
            'font-weight': 600,
            left: $(this).find('h3').offset().left,
            position: 'fixed',
            top: $(this).find('h3').offset().top - $(document).scrollTop() + 1,
            'z-index': 6
        });
        subtitle.css({
            color: '#c8c8c8',
            left: $(this).find('p').offset().left,
            position: 'fixed',
            top: $(this).find('p').offset().top - $(document).scrollTop(),
            'z-index': 6
        })
        $('body').append(container);
        $('body').append(title);
        $('body').append(subtitle);
        container.animate({
            left: 0,
            height: '100vh',
            margin: 0,
            padding: 0,
            top: 0,
            width: '100%'
        }, function() {
            $('body').css('overflow', 'hidden');
            container.css({
                background: 'black',
                'border-radius': 0,
                transform: 'scale(1)'
            });
            title.animate({
                'font-size': '1.802rem',
                left: $('#works .container').offset().left + 15,
                top: '.6em',
                width: '100%'
            }, 400);
            subtitle.delay(100).animate({
                left: $('#works .container').offset().left + 15,
                top: '3.5em',
            }, 400, function() {
                $('.work-detail .container').css({
                    position: 'fixed',
                    top: '1em'
                }).append('<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>')
                    .append(title)
                    .append(subtitle);
                $('.close').css({
                    color: 'white',
                    'font-size': '2.566rem',
                    'line-height': '.5'
                });
                title.css({
                    position: 'static'
                });
                subtitle.css({
                    position: 'static'
                });
                $('.close').click(function() {
                    title.fadeOut('fast', function() {
                        $(this).remove();
                        $('body').css('overflow', 'scroll');
                    });
                    subtitle.fadeOut('fast', function() {
                        $(this).remove();
                    });
                    container.fadeOut('fast', function() {
                        $(this).remove();
                    });
                });
            });
        });
    });
    function changeClass(dis) {
        $('.filters a').removeClass('active');
        dis.addClass('active');
    }
});
$(window).on('load', function() {
    $('.works').isotope({
        itemSelector: '.work',
        layoutMode: 'fitRows'
    });
});