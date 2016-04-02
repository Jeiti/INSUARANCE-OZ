<?php
session_start();

if(function_exists("imagepng")){
    header("content-type: image/png");
    $img = imagecreatetruecolor(200,40);
    $color = imagecolorallocate($img, 222, 184, 135);

    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $collectstr="";
    for ($i=0;$i<=5;$i++){
        $number = rand(1,strlen($str));
        $letter = substr($str, $number, 1);
        $collectstr = $collectstr . $letter;
        if ($i % 2){
            $y=10;
        }
        else{
            $y=20;
        }
        imagestring($img, 5, ($i+1)*20, $y , $letter, $color);
    }

    $_SESSION["captcha"] = $collectstr;
    imagepng($img);
    imagedestroy($img);
}