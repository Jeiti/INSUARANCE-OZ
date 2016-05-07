<?php
error_reporting(E_ALL);
if (session_status()==PHP_SESSION_NONE){
    session_start();
}

if(isset($_COOKIE["user_insuarance"])){
    $_SESSION["user"]=$_COOKIE["user_insuarance"];
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
        <div class="col-md-12">
            <nav class="navbar navbar-default navbar-inverse" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" id="ontop">Insuarance-oz</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Products</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contacts</a></li>
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
                                                <div class="row">
                                                    <div class="col-md-12 column ui-sortable">
                                                        <a href="register.php" class="btn btn-success" type="button">Register</a>
                                                        <button type="submit" class="btn btn-success" name="auth"><span class="glyphicon glyphicon-log-in"></span> Sign in</button>
                                                    </div>
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
                            <div class="row">
                                <div class="col-md-12 column ui-sortable">
                                    <li class="navbar-text"><?php print_r($_SESSION["user"]);?>
                                        <a href="logout.php" class="btn btn-success navbar-btn" type="button">Выход</a>
                                    </li>
                                </div>
                            </div>
                        <?php endif;?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
    </div>














<?php
print_r($_FILES["avatar"]["name"]);
 ?>

    <?php
    if (isset($_SESSION["flash"]["info"])){
        ?>
        <div class="alert alert-danger fade in">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>Добро пожаловать на сайт Insuarance-oz. Мы очень рады Вам - <?php print_r($_SESSION["user"]);?></h4>
        </div>
        <?php
        unset($_SESSION["flash"]);
    }



