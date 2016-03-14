<?php

if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(!empty($_SESSION["user"])){
    unset($_SESSION["user"]);
    setcookie('user_insuarance', '', time() - 3600);
}
header("location: ./index.php");
