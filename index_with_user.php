<?php

if(session_status()==PHP_SESSION_NONE){
    session_start();
}

?>

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

                    <ul class="nav navbar-nav navbar-right whitecolor">
                        <li>Добро пожаловать <?php print_r($_SESSION["user"]);?></li>
                        <a class="btn btn-success" href="index.php">Выход</a>
                    </ul>

                </div>
            </nav>
        </div>
    </div>



    <!-- Collect the nav links, forms, and other content for toggling -->




    <!--Body-->
    <div class="row">
        <div class="col-md-4">
            <div class="media">
                <a href="#" class="pull-left"><img alt="Bootstrap Media Preview" src="/img/car-bmw-headlight.jpg" class="media-object" /></a>
                <div class="media-body">
                    <h4 class="media-heading">
                        Nested media heading
                    </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </div>
            </div>
            <hr>
            <div class="media">
                <a href="#" class="pull-left"><img alt="Bootstrap Media Preview" src="/img/car-bmw-headlight.jpg" class="media-object" /></a>
                <div class="media-body">
                    <h4 class="media-heading">
                        Nested media heading
                    </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </div>
            </div>
            <hr>
            <div class="media">
                <a href="#" class="pull-left"><img alt="Bootstrap Media Preview" src="/img/car-bmw-headlight.jpg" class="media-object" /></a>
                <div class="media-body">
                    <h4 class="media-heading">
                        Nested media heading
                    </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-8">
            <div class="jumbotron">
                <h1>Привет - это сайт о страховании</h1>
                <p>Любой текст</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Ещё ...</a></p>
            </div>
        </div>
    </div>
    <div class="view">
        <blockquote class="" contenteditable="true">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <small>Someone famous <cite title="Source Title">Source Title</cite></small>
        </blockquote>
    </div>
    <!--Body-->

<?php
require_once("footer.php");
