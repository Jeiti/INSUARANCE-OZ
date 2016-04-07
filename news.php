<?php
require_once("config.inc");

$res_count = mysqli_query($link, "select count(*) from news");
$row = mysqli_fetch_array($res_count);
$count = $row[0];
$page_count = floor($count/NEWSPERPAGE)+1;
$num = isset($_GET['num'])?$_GET['num']-1:0;
$res = mysqli_query($link, "select title, content, picture from news order by id desc limit " . NEWSPERPAGE . " offset " . $num*NEWSPERPAGE);
if(!$res){
    echo mysqli_error($link);
}
else{
    while($rows=mysqli_fetch_array($res)){
        echo "<div class=\"col-md-4\">
        <div class=\"thumbnail\">
            <img alt=\"Bootstrap Thumbnail First\" src=\"img/news_img/$rows[picture]\">
            <div class=\"caption\">
                <h3>$rows[title]</h3>
                <p>$rows[content]</p>
                <p><a class=\"btn btn-primary\" href=\"#\">Action</a> 
                <a class=\"btn\" href=\"#\">Action</a></p>
            </div>
        </div>
    </div>";
    }
}





?>

<div class="view">
    <ul class="pagination">
        <li><a href="#">Prev</a></li>
        <?php
        for ($i=1; $i<=$page_count;$i++){
            echo ("<li><a href=\"index.php?num=$i\">$i</a></li>");
        }
        ?>
        <li><a href="#">Next</a></li>
    </ul>
</div>
