<?php

if (session_status() == PHP_SESSION_NONE)
    session_start();
?>

<?php
$link=mysqli_connect("localhost", "root", "123", "insuarance");

if($_POST["remember"]){
    $_SESSION["user"] = $_POST["username"];
    setcookie("user_insuarance", $_SESSION["user"],time()+3600*24*30);
    $_SESSION["flash"]["info"] = "welcome";
    require_once("index.php");
}
else{
    $_SESSION["user"] = $_POST["username"];
    $_SESSION["flash"]["info"] = "WELCOME";
    require_once("index.php");
}

mysqli_close($link);