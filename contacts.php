<?php
header("content-type:text/html; charset=utf-8");
require_once ("header.php");
?>
<h2 class="h2"><i>Мы находимся тут!!!</i></h2>
<br>
<address>
    <i>    Наш офис расположен по адресу:</i><br>
    <i>    Московская область, г.Орехово-Зуево, ул. Володарского, д. 5</i><br>
    <i>    тел.: 8-968-989-07-77</i>
</address>
<br>
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=cSqIAIe1jDfxJpTfHVXUGrA48f2YoiAg&width=100%&height=400&lang=ru_RU&sourceType=constructor&scroll=true"></script>
<hr>
<?php
require_once ("footer.php");
