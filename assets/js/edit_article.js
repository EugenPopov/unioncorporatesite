

$(document).ready(function() {
    let arr = [];
    for (const qq of files_already) {
        arr.push(qq);
    }
    let elem = $('#article_files');
    let all_products = JSON.parse(elem.val());
    elem.val('');
    let recommend = $('#recommending').magicSuggest({
        allowFreeEntries: false,
        useCommaKey: false,
        data: arr,
        placeholder: 'Почніть вводити назву файла'
    });
    recommend.addToSelection(all_products);

    elem.after($('#recommending-group').show());
    $('.ms-trigger').click();
    $('.ms-res-ctn.dropdown-menu').removeClass('dropdown-menu');

    $(recommend).on('blur', function () {
        elem.val(JSON.stringify(this.getValue()));
    });

});