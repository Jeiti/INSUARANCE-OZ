<?php
require_once("config.inc");

$res_count = mysqli_query($link, "select count(*) from news");
$row = mysqli_fetch_array($res_count);
$count = $row[0];
$page_count = floor($count/NEWSPERPAGE)+1;
$num = isset($_GET['num'])?$_GET['num']-1:0;
$res = mysqli_query($link, "select id, title, content, picture, date_time from news order by id desc limit " . NEWSPERPAGE . " offset " . $num*NEWSPERPAGE);
if(!$res){
    echo mysqli_error($link);
}
else{
    echo"<div class='row'>";
    while($rows=mysqli_fetch_array($res)){
        if (strlen($rows["content"])<=120){
            echo "<div class='col-md-4'>
                <div class='thumbnail'>
                    <img class='img-rounded' src='img/news_img/$rows[picture]'>
                    <h3>$rows[title]</h3>
                    <p>$rows[content]</p>
                    <p><a class='btn btn-primary' href='/page_news.php?new=$rows[id]'>Подробнее</a>
                </div>
            </div>";
        }
        else{
            $echo_row = substr($rows['content'],0,120);
            echo "<div class='col-md-4'>
                <div class='thumbnail'>
                    <img class='img-rounded' src='img/news_img/$rows[picture]'>
                    <h3>$rows[title]</h3>
                    <p>$echo_row...</p>
                    <p><a class='btn btn-primary' href='/page_news.php?new=$rows[id]'>Подробнее</a>
                </div>
            </div>";
        }
    }
    echo "</div>";
}
?>

<div class="row">
    <ul class="pagination">
        <li><a href="index.php?num=1">&lt;&lt;</a></li>
        <li><a href="index.php?num=<?php print($_GET['num']-1);?>">&lt;</a></li>
            <?php
                /*for ($i=1; $i<=$page_count;$i++){*/
            for ($i=1; $i<=OUTPUTNEWS;$i++){
                if($page_count>OUTPUTNEWS){
                    echo ("<li><a href='index.php?num=$i'>$i</a></li>");
                    /*-------------------------------------------------------------------------------------------*/
                        if($i==OUTPUTNEWS){
                            echo "<li><a href='index.php?num=$_GET[num]'>...</a></li>";
                        }
                    /*-------------------------------------------------------------------------------------------*/
                }
                else{
                    echo ("<li><a href='index.php?num=$i'>$i</a></li>");
                }
            }
            ?>
        <li><a href="index.php?num=<?php print($_GET['num']+1);?>">&gt;</a></li>
        <li><a href="index.php?num=<?php print($page_count);?>">&gt;&gt;</a></li>
    </ul>
</div>