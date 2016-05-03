<?php
require_once("config.inc");
header("content-type: application/json");
sleep(2);
$num = isset($_GET['num'])?$_GET['num']-1:0;
$res = mysqli_query($link, "select id, title, content, picture, date_time from news order by id desc limit " . NEWSPERPAGE . " offset " . $num*NEWSPERPAGE);

if(!$res){
    header(mysqli_error($link),false,500);
    echo mysqli_error($link);
}
else{
    $array=[];
    while($rows=mysqli_fetch_array($res)){
        //--------------определение переменных для передачи в массив json --------------/
        $content = $rows['content'];
        $title =   $rows['title'];
        $id =      $rows['id'];
        $picture = $rows['picture'];
        //--------------конец определения переменных --------------/
        if (strlen($content)>120){//если длина строки больше 120 символов, тогда
            $content = substr($content,0,120);//обрезать строку до 120 символов
            $content=$content."...";
        }
        $array[] = ['title'=>   iconv(mb_detect_encoding($title), "UTF-8", $title),
                    'content'=> iconv(mb_detect_encoding($content), "UTF-8", $content),
                    'id'=>      $id,
                    'picture'=> $picture
        ];
    }

    if(!json_encode($array)){
        echo json_last_error();
    }
    else{
        echo json_encode($array);
    }
}
?>


