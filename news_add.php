<?php
print_r($_FILES);
if (isset($_POST["hotnews"])){
    $link=mysqli_connect("localhost", "root", "123", "insuarance");
    if (!mysqli_query($link,"insert into news(title, content, picture) values ('$_POST[title]', '$_POST[content]', '" . $_FILES["picture"]["name"] . "')")){
        echo mysqli_error($link);
    }
    else{
        $filename = __DIR__."/img/news_img/" . $_FILES["picture"]["name"];
        move_uploaded_file($_FILES["picture"]["tmp_name"], $filename);
    }
    mysqli_close($link);
}

require_once ("header.php");
?>

<form class="" role="form" action="news_add.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">title</label>
        <input class="form-control" id="exampleInputEmail1" placeholder="title" type="text" name="title">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Content</label>
        <textarea class="form-control" id="exampleInputPassword1" placeholder="content" type="text" name="content"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input id="exampleInputFile" type="file" name="picture">
        <p class="help-block">Example block-level help text here.</p>
    </div>
    <button type="submit" class="btn btn-default" name="hotnews">Submit</button>
</form>
