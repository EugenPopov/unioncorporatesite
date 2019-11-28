$(document).ready(function () {
    console.log(articles);
    $(document).on('click', '.switch-article', function () {
        if(!$(this).hasClass('navbar_link-active')){
            let id = $(this).attr('data-id');
            if(articles[id] !== undefined){
                $('.navbar_link-active').removeClass('navbar_link-active');
                renderArticle(articles[id]);
                $(this).addClass('navbar_link-active');
            }
        }
    })
});

function renderArticle(array) {
    let files_div = $('#files');
    files_div.text('');
    $('.laws-content_wrapper_title').text(array.title);
    $('.laws-content_wrapper_text').text(array.description);
    Object.keys(array.files).forEach(function (item) {
        let elem = array.files[item];
        let file_div = $('<div></div>');
        file_div.append(`<br>${elem.name}<a href="/uploads/${elem.path}" download> Скачать </a><a href="/uploads/${elem.path}" target="_blank"> Открыть </a><hr>`);
        files_div.append(file_div);
    });
}