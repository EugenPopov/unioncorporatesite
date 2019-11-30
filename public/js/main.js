let toggle_off = true;

$(document).ready(function () {
    $('.page-hero__nav-toggle').on('click', function () {
        if(toggle_off){
            toggle_off = false;
            $('.page-hero__nav-toggle').toggleClass('active');
            $('#sidebar').toggleClass('overflow_hidden').slideToggle(function () {
                toggle_off = true;
            });
        }
    });

    $('.nav__link').each(function () {
        let elem = $(this);
        if(elem.attr('href') === location.pathname)
            elem.addClass('nav__link_theme-light_active');
    });

    $(window).bind('load', function() {
        $('img').each(function() {
            if((typeof this.naturalWidth != "undefined" &&
                this.naturalWidth === 0 )
                || this.readyState === 'uninitialized' ) {
                $(this).attr('src', '/img/nopicture.jpg');
            }
        }); })

    // $(document).on('error', 'img', function () {
    //     console.log($(this));
    //     $(this).attr('src', '/uploads/img/nopicture.jpg');
    // });
});
