<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
     <!--style CSS-->
      <!--style CSS-->
      <link rel="stylesheet" type="text/css" href="style_project.css">
      <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
 <!-- jQuery library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
 <!-- Latest compiled JavaScript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <style type="text/css">
 .navbar{
    position: relative;
    min-height: 50px;
    margin-bottom: 0px;
    border: 1px solid transparent;
    background-color: black;
}
.navbar-nav>li>a {
    padding-top: 75px;
    padding-bottom: 15px;

}</style>
</head>
<body>
<nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <div class="logo">
            <img src="images/9.png">
            <h4 style="color: white;word-spacing: 10px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h4>
          </div>
  
            <ul class="nav navbar-nav"
            style="padding-left: 50px;" >
            <li><a href="index-library.php">HOME</a></li>
            <li><a href="books.php">BOOKS</a></li>
            <li><a href="feedback.php">FEEDBACK</a></li>
        </ul>

        <?php
        if(isset($_SESSION['login_user'])){
            ?>
            <ul class="nav navbar-nav"
             >
            <li><a href="profile.php">PROFILE</a></li>
            </ul>
            <ul  class="nav navbar-nav ">
            <li><a href="student.php">STUDENT-INFORMATION</a></li>
            <li><a href="fine.php">FINES</a></li>
            </ul>
            
            <ul  class="nav navbar-nav navbar-right">
                <li><a href="profile.php">
                <div style="color:white;">
            <?php
            echo "<img class='img-circle profile_img' height=35 width=35 src='images/".$_SESSION['pic']."'>";
            echo " ".$_SESSION['login_user'];
            ?>
            </div>
        </a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT </span></a></li>
           </ul>
            <?php
        }
        else{
            ?>
            <ul  class="nav navbar-nav navbar-right">
            <li><a href="adminlogin.php"><span class="glyphicon glyphicon-log-in"> LOGIN </span></a></li>
            
            <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP </span></a></li>
        </ul>
            <?php
        }
        ?>

        
    </div>
    </nav>

</body>
</html>