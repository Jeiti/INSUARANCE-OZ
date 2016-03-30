<?php
session_start();

if(function_exists("imagepng")){
    header("content-type: image/png");
    $img = imagecreatetruecolor(300,50);
    $color = imagecolorallocate($img, 255, 0, 50);
    $_SESSION["captcha"] = "test";
    imagestring($img, 5, 50, 20, $_SESSION["captcha"], $color);
    imagepng($img);
    imagedestroy($img);
}