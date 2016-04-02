<?php
session_start();

if(function_exists("imagepng")){
    header("content-type: image/png");
    $img = imagecreatetruecolor(80,40);
    $color = imagecolorallocate($img, 222, 184, 135);

    $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $collectstr="";
    for ($i=0;$i<=5;$i++){
        $number = rand(1,strlen($str));
        $collectstr = $collectstr . substr($str, $number, 1);
    }

    $_SESSION["captcha"] = $collectstr;
    imagestring($img, 5, 15, 12, $_SESSION["captcha"], $color);
    imagepng($img);
    imagedestroy($img);
}