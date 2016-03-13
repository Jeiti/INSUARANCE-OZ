<?php error_reporting(E_ALL);
if (session_status()==PHP_SESSION_NONE){
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

    <?php
    if (isset($_SESSION["flash"]["info"])){
        echo "<aside id=\"message\">";
        echo $_SESSION["flash"]["info"];
        unset($_SESSION["flash"]["info"]);
        echo "</aside>";
    }
    ?>

<div class="container">
    <!--Navbar-->


    <div class="row">
        <div class="col-lg-12">
            <nav class="navbar navbar-default navbar-inverse" role="navigation">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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

                        <ul class="nav navbar-nav navbar-right">
                            <?php if(!isset($_SESSION["user"])):?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login/Register<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="col-md-12 nav navbar-form">
                                                <form role="form" action="authorize.php" method="post">
                                                    <div class="enlarge_interval">
                                                        <input type="text" class="form-control" placeholder="e-mail" name="username">
                                                    </div>
                                                    <div class="enlarge_interval">
                                                        <input type="password" class="form-control" placeholder="password" name="password">
                                                    </div>
                                                    <div class="col-md-6 nav">
                                                        <a href="register.php" class="btn btn-success" type="button">Register</a>
                                                    </div>
                                                    <div class="col-md-6 nav navbar-right">
                                                        <button type="submit" class="btn btn-success" name="auth"><span class="glyphicon glyphicon-log-in"></span>Sign in</button>
                                                    </div>
                                                    <div>
                                                        <input class="navbarckeckbox" id="navbarcheckbox" type="checkbox" name="remember">
                                                        <label class="navbarckeckboxlabel" for="navbarcheckbox"> Remember me</label>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            <?php else:?>
                                    <li class="navbar-text">Добро пожаловать <?php print_r($_SESSION["user"]);?></li>
                                    <a href="logout.php" class="btn btn-success navbar-btn" type="button">Выход</a>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>



            <!-- Collect the nav links, forms, and other content for toggling -->


