$(document).ready(function(){
/*    $(document).click('a.pagination', function (event) {
        var num = $("a.pagination").html();//todo: не правильно работает нажатие на ссылку
        alert(num);
    });*/

    $("#reload_captcha").click(function () {
        $("#img_captcha").attr("src", "/captcha.php?" + (new Date()).getTime());
    });//перезагрузка капчи


    function showNews(num) {//функция показа новостей
        $("#ajax_info").show();//показать кружок загрузки анимированный
        //для новостей
        $.ajax({
            url: "/news.php",//страница обработчик - где код php, который формирует массив json
            type: "GET",//метод обращения к странице
            dataType: "json",//это формат ответа от сервера, т.е. с news.php (url)
            data: {num: num},//что передаем в данном случае в массив GET
            success: function (data) {//в случае удачного выполнения скрипта
                console.log(data);//вывести в консоль полученные данные
                $("p#forNews").empty();//очистить все в теге p с id='forNews'
                $("p#forNews").append("<div class='row'></div>");//добавить в тот же абзац блок div class='row'
                $.each(data, function (key, val) {//перебрать полученный массив в формате json
                    $("p#forNews").append("<div class='col-md-4'>\
                        <div class='thumbnail'>\
                        <img class='img-rounded' src='img/news_img/" + val.picture + "'>\
                        <h3>" + val.title + "</h3>\
                        <p>" + val.content + "</p>\
                        <p><a class='btn btn-primary' href='/page_news.php?new=" + val.id + "'>Подробнее</a>\
                        </div>\
                    </div>");//вывести блок новостей
                });
                $("#ajax_info").hide();//скрыть анимацию
            },
            error: function(xhr,status,message){//если ошибка, то вывести в сообщении что за ошибка, ее статус
                $("#ajax_info").hide();//скрыть анимацию
                alert(status+" / "+message);
            }
        });
    }//функция показа новостей

    showNews(1);

    //для пагинации
    $.ajax({
        url: "/pagination.php",
        type: "get",
        dataType: "json",
        success: function (data) {
            $("p#forPagination").append("<ul class='pagination'></ul>")
            $.each(data, function (key, val) {//массив json всегда перебирается таким способом 
                // через each + 2 параметра, data и function, у функции еще 2 параметра - ключ и значение
                //у значения могут быть поля - например - val.pages, имена полей берутся из php массива который
                // формируется на странице php в качестве ключа - это и есть поля
                $("ul.pagination").append("<li><a class='pagination' href='#' value='"+val.value+"'>" + val.pages + "</a></li>");//добавить в ul class="pagination" ссылки
            });
            //ниже функция определяет какая страница нажата
            $("a.pagination").click(function (event) {//дело в том, что необходимо поместить в success
                // обработчик нажатия - это нюанс, function (event) - это для блокирования перехода по ссылке
                var num = $(this).attr('value');
                event.preventDefault();//само блокирование перехода по ссылке, т.е. при нажатии на ссылку перехода не будет
                showNews(num);
            });
        }
    });
});
