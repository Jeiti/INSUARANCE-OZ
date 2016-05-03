<?php
if ((isset($_POST["hotnews"])) && (!empty($_POST["title"])) && (!empty($_POST["content"]))){
    require_once("config.inc");
    if (!mysqli_query($link,"insert into news(title, content, picture, date_time) values ('$_POST[title]', '$_POST[content]', '" . $_FILES['picture']['name'] . "', '" . date("y.m.d H:i") . "')")){
        //todo:посмотреть как передавать данные в кодировке utf-8
        echo mysqli_error($link);
    }
    else{
        chmod("/img/news_img/", 0777);
        $filename = __DIR__."/img/news_img/" . $_FILES["picture"]["name"];
        move_uploaded_file($_FILES["picture"]["tmp_name"], $filename);
    }
    mysqli_close($link);
}

require_once ("header.php");
print_r($_FILES["avatar"]);
?>
    <form role="form" action="news_add.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Название новости</label>
            <input class="form-control" id="title" placeholder="введите название новости" type="text" name="title">
        </div>
        <div class="form-group">
            <label for="content">Новость</label>
            <textarea class="form-control" id="content" placeholder="введите текст новости" type="text" name="content"></textarea>
        </div>
        <div class="form-group">
            <label for="inputfile">Выберите файл для загрузки</label>
            <input id="inputfile" type="file" name="picture">
        </div>
        <button type="submit" class="btn btn-default" name="hotnews">Загрузить новость</button>
    </form>

<?php
require_once ("footer.php");