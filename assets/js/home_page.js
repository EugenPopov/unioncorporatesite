$(document).ready(function () {
    
    let last_news = [];
    let relevant_news = [];
    let union_news = [];
    Object.keys(div_news).forEach(function (key) {
        if(last_news.length < 3){
            last_news.push(div_news[key]);
        }
        if(relevant_news.length < 3 && div_news[key]['type'] === 'Актуальні'){
            relevant_news.push(div_news[key]);
        }
        if(union_news.length < 3 && div_news[key]['type'] === 'Про профспілку'){
            union_news.push(div_news[key]);
        }
    });

    console.log(last_news, relevant_news, union_news);
    
    $(document).on('click', '.relevant-news', function () {
        $('.last_news').removeClass('nav__link_theme-dark_active');
        $('.union-news').removeClass('nav__link_theme-dark_active');
        $(this).addClass('nav__link_theme-dark_active');
        render_news_block(relevant_news);
    });

    $(document).on('click', '.last_news', function () {
        $('.relevant-news').removeClass('nav__link_theme-dark_active');
        $('.union-news').removeClass('nav__link_theme-dark_active');
        $(this).addClass('nav__link_theme-dark_active');
        render_news_block(last_news);
    });

    $(document).on('click', '.union-news', function () {
        $('.relevant-news').removeClass('nav__link_theme-dark_active');
        $('.last_news').removeClass('nav__link_theme-dark_active');
        $(this).addClass('nav__link_theme-dark_active');
        render_news_block(union_news);
    })
});

function render_news_block(array) {
    let main_div = $('#news-div');
    main_div.html('');
    console.log(array[0]);
    Object.keys(array).forEach(function (key) {
        let item = array[key];
        let article = $('<article class="feed-card news__feed-card news__feed-card">\n' +
            '                    <div class="feed-card__img-wrapper">\n' +
            '                        <img class="feed-card__img" src="/uploads/'+item['image']+'" alt="'+item['title']+'">\n' +
            '                        <time class="feed-card__date-label">'+item['created_at']+'</time>\n' +
            '                    </div>\n' +
            '                    <span class="feed-card__title">'+item['title']+'</span>\n' +
            '                    <p class="feed-card__text">'+item['description']+'</p>\n' +
            '                </article>');

        if(key == 0)
            article.addClass('news__feed-card_main');


        main_div.append(article);


    });

}