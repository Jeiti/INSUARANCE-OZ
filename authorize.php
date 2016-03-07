<?php

if (session_status() === PHP_SESSION_NONE)
    session_start();

$link=mysqli_connect("localhost", "root", "123", "insuarance");

if (isset($_COOKIE['auth'])){
    $query = "select token from user where login = $_POST[login] and token=$_COOKIE[auth]";
    if ($rez=mysqli_query($link,$query)){
        if (mysqli_num_rows($rez)){
            $_SESSION['user'] = $_POST['username'];
            echo "добро пожаловать . $_SESSION[user]!!!";
        }
    }
    else{
        echo mysqli_error($link);
    }
}
else{
    $query="select login, password from user where login=('$_POST[username]') and password=('$_POST[password]')";

    if ($rez=mysqli_query($link,$query)){
        if (mysqli_num_rows($rez)){
            if (isset($_POST['remember'])){
                setcookie('auth', $_POST['login'], time() + 3600*24*7, '/', $_SERVER['SERVER_NAME'], false, true);
            }
            $_SESSION['user'] = $_POST['username'];
            echo "добро пожаловать . $_SESSION[user]!!!";
        }
    }
    else{
        echo mysqli_error($link);
    }
}


//необходимо сделать update token


mysqli_close($link);