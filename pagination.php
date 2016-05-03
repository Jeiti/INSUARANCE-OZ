<?php
require_once("config.inc");
$res_count = mysqli_query($link, "select count(*) from news");
$row = mysqli_fetch_array($res_count);
$count = $row[0];//сколько всего новостей
$page_count = floor($count/NEWSPERPAGE)+1;//считает сколько будет страниц - всего
/*$num = isset($_GET['num'])?$_GET['num']-1:0;//определяет какая страница нажата-1, это для в бд*/
$page=$_GET['num'];//какая выбрана страница
$selected_page = ceil(OUTPUTNEWS/2)+1;//определяет после какго номера идет середина пагинации
$start_count_pages = ceil(OUTPUTNEWS/2)-1;//определяет сколько влево и вправо можно сдвигать
$pagination_array=[];
$pagination_array[] = ['pages'=>'&lt;&lt;','value'=>1];
$pagination_array[] = ['pages'=>'&lt;','value'=>0];//todo: не знаю как отловить нажатие на эту кнопку и сделать "текущая_страница - 1"

if(!isset($page) || $page<$selected_page){
    for ($i=1; $i<=OUTPUTNEWS;$i++){
        if($page_count>OUTPUTNEWS){
            $pagination_array[]=['pages'=>$i,'value'=>$i];
            if($i==OUTPUTNEWS){
                $pagination_array[]=['pages'=>'...'];
            }
        }
    }
}
else{
    if($page>=$selected_page){
        $pagination_array[]=['pages'=>'...'];
        for($i=$start_count_pages;$i<=$start_count_pages+$selected_page;$i++){
            $pagination_array[]=['pages'=>$i,'value'=>$i];
        }
        if ($page<$selected_page){
            $pagination_array[]=['pages'=>'...'];
        }
    }
}
$pagination_array[]=['pages'=>'&gt;','value'=>'num+1'];//todo: не знаю как отловить нажатие на эту кнопку и сделать "текущая_страница + 1"
$pagination_array[]=['pages'=>'&gt;&gt;'];//todo: как перейти на последнюю страницу
echo json_encode($pagination_array);//обязательная функция для отправки json массива + обязательно через echo
