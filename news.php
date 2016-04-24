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
/*    echo"<div class='row'>";*/
    $array=[];
    while($rows=mysqli_fetch_array($res)){
        $content = $rows['content'];
        if (strlen($rows["content"])>120){
            $content = substr($content,0,120);
            /*echo "<div class='col-md-4'>
                <div class='thumbnail'>
                    <img class='img-rounded' src='img/news_img/$rows[picture]'>
                    <h3>$rows[title]</h3>
                    <p>$rows[content]</p>
                    <p><a class='btn btn-primary' href='/page_news.php?new=$rows[id]'>Подробнее</a>
                </div>
            </div>";*/
        }
        $array[] = ['title'=>$rows['title'],
            'content'=>$content,
            'id'=>$rows['id'],
            'picture'=>$rows['picture']
        ];
    }
}
echo json_encode($array);
?>

