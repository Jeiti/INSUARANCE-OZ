<?php

if(session_status()==PHP_SESSION_NONE){
    session_start();
}
if(!empty($_SESSION["user"])){
    unset($_SESSION["user"]);
}
header("location: ./index.php");
