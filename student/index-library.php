<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>online library management system!</title>
    <!--style CSS-->
    <link rel="stylesheet" type="text/css" href="style_project.css">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
.wrapper{
    height: 700px;
    width: 1520px;
    background-color:black;
}
  nav{
    float: right;
     word-spacing: 30px;
     padding: 30px;
}
nav li {
    display: inline;
   line-height: 110px; 
}
a{
  color: white;
}
</style>
  </head>
  <body>
    <div class="wrapper">
        <header>
          <div class="logo">
            <img src="images/9.png">
            <h4 style="color: white;word-spacing: 10px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h4>
          </div>
  <?php
  if(isset( $_SESSION['login_user']))
  {
    ?>
    <nav>
            
            <ul>
                <li><a href="index-library.php">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
                <li><a href="registration.php">REGISTRATION</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
        </nav>
        <?php

  }
  else{
    ?>
    <nav>
            
            <ul>
                <li><a href="index-library.php">HOME</a></li>
                <li><a href="books.php">BOOKS</a></li>
                <li><a href="studentlogin.php">STUDENT-LOGIN</a></li>
                <li><a href="registration.php">REGISTRATION</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
            </ul>
        </nav>
        <?php
  }
  ?>



          
        
        </header>
        <section>
          <div class="sec_img">
          <br><br><br>
          <div class="box">
            <br><br><br>
            <h1 style="text-align: center; font-size: 35px;">Welcome to library</h1><br>
            <h1 style="text-align: center;font-size:25px;">Opens at 09:00 a.m.</h1><br>
            <h1 style="text-align: center;font-size:25px;">closes at 15:00 p.m.</h1 style="text-align: center;">
          </div>
          </div>
        </section>
    </div>
    
    <?php
    include "footer.php";
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
