<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Insuarance-oz</title>
    <meta name="author" content="Insuarance-oz">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <!--Navbar-->


    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-default navbar-inverse" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display-->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">Insuarance-oz</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="#">Products</a>
                            </li>
                            <li>
                                <a href="#">About us</a>
                            </li>
                            <li>
                                <a href="#">Contacts</a>
                            </li>
                        </ul>
                    </div>
            </nav>
        </div>
    </div>



<?php

if (session_status() === PHP_SESSION_NONE)
    session_start();

$link=mysqli_connect("localhost", "root", "123", "insuarance");

if (isset($_COOKIE['auth'])){
    $query = "select * from user where login = $_POST[login] and token=$_COOKIE[auth]";
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
    $query="select login, password from user where login=('$_POST[username]') and password=('".md5($_POST['password'])."')";
    if ($rez=mysqli_query($link,$query)){
        if (mysqli_num_rows($rez)){
            if (isset($_POST['remember'])){
                setcookie('auth', $_POST['login'], time() + 3600*24*7, '/', $_SERVER['SERVER_NAME'], false, true);
            }
            $_SESSION['user'] = $_POST['username'];
            echo "<h1>Добро пожаловать на сайт $_SESSION[user]!!!</h1>";
        }
    }
    else{
        echo mysqli_error($link);
    }
}


//необходимо сделать update token


mysqli_close($link);