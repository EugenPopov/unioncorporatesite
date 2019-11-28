$(document).ready(function () {
    $('.page-hero__nav-toggle').on('click', function () {
        $('.page-hero__nav-toggle').toggleClass('active');
        $('#sidebar').slideToggle();
    });

});
