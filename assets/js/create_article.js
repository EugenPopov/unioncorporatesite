$(document).ready(function() {
    let elem = $('#article_files');
    let all_products = JSON.parse(elem.val());
    elem.val('');
    let recommend = $('#recommending').magicSuggest({
        allowFreeEntries: false,
        useCommaKey: false,
        data: all_products,
        placeholder: 'Почніть вводити назву файла'
    });
    $(recommend).on('blur', function () {
        elem.val(JSON.stringify(this.getValue()));
        console.log(elem.val());
    });
    elem.after($('#recommending-group').show());
    $('.ms-trigger').click();
    $('.ms-res-ctn.dropdown-menu').removeClass('dropdown-menu');

});