<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>bwt_test</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
  <link href="/template/css/style.css" rel="stylesheet" type="text/css" media="screen" />
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
 <body>
    <div class="container">
     <div class="row ">
       <div class="col-md-offset-3 col-md-6">
        
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="navbar-brand" href="login">Main</a>
                    <a class="navbar-brand" href="weather">Weather</a>
                    <a class="navbar-brand" href="feedback">Feedback</a>
                    <a class="navbar-brand" href="feeds">Feedbacks</a>
                </div>
            </div>
    </div>
       <div class="col-md-3">
                    <form class="form-horizontal" action="login" method="post">
                    <p class="login">
                    <?php 
                    if (isset($_SESSION['name'])) {
                      echo "{$_SESSION['name']} {$_SESSION['surname']}  ";
                      echo '<input type="submit" class="btn_log" value="Logout" name="logout">'; 
                    } else{
                      echo '<a href="login">Login</a>';
                    }
                    ?>
                  </p>
          </form>
       </div>
    </div>
</div>