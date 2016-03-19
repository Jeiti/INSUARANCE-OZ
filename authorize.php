<?php
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE)
    session_start();

$link=mysqli_connect("localhost", "a96898g5_ins", "123456", "a96898g5_ins");

if($_POST["remember"]){
    $_SESSION["user"] = $_POST["username"];
    setcookie("user_insuarance", $_SESSION["user"],time()+3600*24*30);
    $_SESSION["flash"]["info"] = "welcome";
    header("location: /index.php");
    exit;
}
else{
    $_SESSION["user"] = $_POST["username"];
    $_SESSION["flash"]["info"] = "WELCOME";
    header("location: /index.php");
    exit;
}

mysqli_close($link);