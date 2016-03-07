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
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
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
                    <form class="navbar-form navbar-right" role="form" action="authorize.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="e-mail" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="password" name="password">
                        </div>
                        <a href="register.php" class="btn btn-success" type="button">Register</a>
                        <button type="submit" class="btn btn-success" name="auth">Sign in</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>