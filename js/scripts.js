$(document).ready(function(){
    $(document).on('click','a.pagination',function (event) {//функция определяет какая страница нажата ->
        // -> и открывает страницу с новостями и пагинацию перегружает
        var num = $(this).attr('value');
        event.preventDefault();
        showNews(num);
        showPagination(num);
    });//функция обработки события нажатия на страницы пагинации

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
                    $("p#forNews").append(
                        "<div class='col-md-4'>\
                                <div class='thumbnail'>\
                                    <img class='img-rounded' src='img/news_img/" + val.picture + "'>\
                                    <h3>" + val.title + "</h3>\
                                    <p>" + val.content + "</p>\
                                    <p>\
                                        <a class='btn btn-primary' href='/page_news.php?new=" + val.id + "'>Подробнее</a>\
                                    </p>\
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
    function showPagination(page) {
        $.ajax({
            url: "/pagination.php",
            type: "get",
            dataType: "json",
            data: {page:page},
            success: function (data) {
                $("p#forPagination").empty();
                $("p#forPagination").append("<ul class='pagination'></ul>")
                $.each(data, function (key, val) {//массив json всегда перебирается таким способом
                    // через each + 2 параметра, data и function, у функции еще 2 параметра - ключ и значение
                    //у значения могут быть поля - например - val.pages, имена полей берутся из php массива который
                    // формируется на странице php в качестве ключа - это и есть поля
                    $("ul.pagination").append("<li><a class='pagination' href='#' value='" + val.value + "'>" + val.pages + "</a></li>");//добавить в ul
                    // class="pagination" для ссылки
                });
            }
        });
    }//функция показа навигации

    showNews(1);
    showPagination(1);



});
