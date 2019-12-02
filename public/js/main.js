let toggle_off = true;

$(document).ready(function () {
    $('.page-hero__nav-toggle').on('click', function () {
        if(toggle_off){
            toggle_off = false;
            $('#main-header-toggle').toggleClass('active');
            if(!$('#main-header-toggle').hasClass('active')){
                $('.page-wrapper').toggleClass('hide-wrapper');
                $('#main-header-toggle').hide();
                $('#mobile-toggle').removeClass('active');
                $('#main-header-toggle').removeClass('active');
                setTimeout(function () {
                    $('#mobile-toggle').hide();
                    $('#main-header-toggle').show();
                }, 220)
            }
            else{
                $('#mobile-toggle').addClass('active');
                $('#main-header-toggle').addClass('active');
                setTimeout(function () {
                    $('#mobile-toggle').show();
                    $('#main-header-toggle').hide();
                }, 220)
            }

            $('#sidebar').toggleClass('overflow_hidden').slideToggle(function () {
                toggle_off = true;
                if($('#main-header-toggle').hasClass('active')) {
                    $('.page-wrapper').toggleClass('hide-wrapper');
                }
            });

        }
    });



    $('.nav__link').each(function () {
        let elem = $(this);
        if(elem.attr('href') === location.pathname)
            elem.addClass('nav__link_theme-light_active');
    });

    $("body").bind("DOMSubtreeModified", function() {
        setTimeout(function () {
            $('img').each(function() {
                if ((typeof this.naturalWidth != "undefined" &&
                    this.naturalWidth === 0)
                    || this.readyState === 'uninitialized') {
                    $(this).attr('src', '/img/nopicture.jpg');
                }
            });
        }, 200)
    });

});
