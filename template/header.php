<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bwt_test</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="col-md-offset-4">
                <ul class="nav navbar-nav">
                    <li><a href="login">Main</a></li>
                    <li><a href="weather">Weather</a></li>
                    <li><a href="feedback">Feedback</a></li>
                    <li><a href="feeds">Feedbacks</a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['name'])) { ?>
                    <li>
                        <form class="form-horizontal" action="login" method="post">
                            <?= "{$_SESSION['name']} {$_SESSION['surname']}  "; ?>
                            <input type="submit" class="navbar-btn btn_log" value="Logout" name="logout">
                        </form>
                    </li>
                <?php } else {
                    echo '<li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                } ?>
            </ul>
        </div>
    </div>
</nav>