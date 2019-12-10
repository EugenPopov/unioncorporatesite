$(document).ready(function () {
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
    $('.wrap').fadeOut('fast', function () {
        let files_div = $('#files');
        let files_wrap = $('<div class="files_wrap"></div>');
        files_div.text('');
        $('.laws-content_wrapper_title').text(array.title);
        $('.laws-content_wrapper_text').text(array.description);
        Object.keys(array.files).forEach(function (item) {
            let elem = array.files[item];
            let file_div = $('<div class="file"></div>');
            file_div.append(`${elem.name}<div class="manipulations"><a href="/uploads/${elem.path}" download> Завантажити </a><a href="/uploads/${elem.path}" target="_blank"> Відкрити </a></div>`);
            files_wrap.append(file_div);
        });
        files_div.append(files_wrap);

        $('.wrap').fadeIn('fast');
    });
}
