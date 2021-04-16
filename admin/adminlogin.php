<?php
 include "connection.php";
 include "navbar.php";
 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin login</title>
    

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

}.btn{
    margin: auto 110px;
    width: 75px;
    border: 1px solid white;
    text-emphasis-color: black;
}
</style>
</head>
<body>

     <section>
         
        <div class="login_img">
        <br><br><br>
        <div class="box1">
            <h1 style="text-align: center;font-size: 35px;font-family: lucida Console;color: white;">Library Management Form</h1>
            <h1 style="text-align: center;font-size: 25px;font-family: lucida Console;color:white">User Login Form</h1>

            <form name="login" action="" method="post">
                <br>
                <div class="login">
                <input class="form-control"   type="text"name="username" placeholder="username" required=""><br>
                <input class="form-control" type="password"name="password" placeholder="password" required=""><br>
                <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: none; width: 80px;height: 35px;">
                </div>

            </form>
            <p style="color: white;padding-left: 15px;"><br>
                <a href="update_password.php" style="color: yellow;">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                New to this website?<a href="registration.html" style="color: yellow;">Sign Up</a>
            </p>
        </div>
        </div>
    
     </section>
    
<?php
    if(isset($_POST['submit'])){
        $count=0;
        $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
        $row= mysqli_fetch_assoc($res);
        $count=mysqli_num_rows($res);

        if($count==0){
            ?>  
            <!--  
            <script type="text/javascript">
 alert("Username and password doesn't match.");
 </script>  -->
 <div class="alert alert-danger"
 style="width: 400px; margin-left:560px; background-color:black;color:white;text-align:center">
 <strong>The username and password doesn't match.</strong>
 </div>
 <?php
        }
        else{
            /*---------if username and password matches------------------*/
            $_SESSION['login_user']=$_POST['username'];
            $_SESSION['pic']=$row['pic'];
            ?>    
            <script type="text/javascript">
 window.location="index-library.php";
 </script>
 <?php

        }    
    }
?>
   
</body>
</html>