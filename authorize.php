<?php
session_start();


$link=mysqli_connect("localhost", "root", "", "insuarance");

$query="select login, password from user where login=('$_POST[username]') and password=('$_POST[password]')";

if ($rez=mysqli_query($link,$query)){
    if (mysqli_num_rows($rez)){
        $_SESSION['user'] = $_POST['username'];
        echo "добро пожаловать . $_SESSION[user]!!!";
    }
}
else{
    echo mysqli_error($link);
}



mysqli_close($link);