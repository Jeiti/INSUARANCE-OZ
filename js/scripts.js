$(document).ready(function(){

    $("#reload_captcha").click(function(){
        $("#img_captcha").attr("src", "/captcha.php?" + (new Date()).getTime());
    });


    $("a#pagination").click(function(){
        var page = $(this).html();
    });

    $.ajax({
        url: "/news.php",//страница обработчик - где код php, который формирует json
        type: "GET",//метод обращения к странице
        dataType: "json",//это формат ответа от сервера, т.е. с news.php (url)
        data: {num: 4},
        success: function (data) {
            console.log(data);
            $("p#forPagination").append("<div class='row'></div>");
            $.each(data, function(key,val){
                $("p#forPagination>.row").append("<div class='col-md-4'>\
                    <div class='thumbnail'>\
                    <img class='img-rounded' src='img/news_img/"+val.picture+"'>\
                    <h3>"+val.title+"</h3>\
                    <p>"+val.content+"</p>\
                    <p><a class='btn btn-primary' href='/page_news.php?new="+val.id+"'>Подробнее</a>\
                    </div>\
                    </div>");
            });
        }
    });

});
