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
    <title>Admin Registration Form</title>
     

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
 .navbar {
    position: relative;
    min-height: 50px;
    margin-bottom: 0;
    background-color: black;
}
.navbar-nav>li>a {
    padding-top: 75px;
    padding-bottom: 15px;
    
}
.btn{
    margin: auto 110px;
    width: 75px;
    border: 1px solid white;
    text-emphasis-color: black;
}
 </style>
 </head>
 <body>

    <section>
        <div class="reg_img">
        <br>
        <div class="box2">
            <h1 style="text-align: center;font-size: 35px;font-family: lucida Console;color: white;">Library Management System</h1>
            <h1 style="text-align: center;font-size: 23px;font-family: lucida Console;color:white">User Registration Form</h1>

            <form name="Registration" action="" method="post">
                <br>
                <div class="login">
                    <input  class="form-control" type="text"name="first" placeholder="First Name" required=""><br>
                    <input class="form-control" type="text"name="last" placeholder="Last Name" required=""><br>
                <input  class="form-control"type="text"name="username" placeholder="Username" required=""><br>
                <input class="form-control" type="password"name="password" placeholder="Password" required=""><br>
                
                <input  class="form-control"type="text"name="email" placeholder="Email" required=""><br>
                <input  class="form-control"type="text"name="phone" placeholder="Phone No" required=""><br>
                 <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: none; width: 80px;height: 35px;">
                </div>

            </form>
           
        </div>
    </div>
     </section>
<?php
if(isset($_POST['submit'])){
    $count=0;
    $sql="SELECT username from `admin`";
    $res=mysqli_query($db,$sql);

    while($row=mysqli_fetch_assoc($res))
{
    if($row['username']==$_POST['username']){
        $count=$count+1;
    }
}
if($count==0){
    mysqli_query($db,"INSERT INTO `admin` VALUES('','$_POST[first]','$_POST[last]','$_POST[username]','$_POST[password]','$_POST[email]','$_POST[phone]','p.jpg');");
?>
<script type="text/javascript">
 alert("Registration success");
 </script>
 <?php
}
else{
    ?>
<script type="text/javascript">
 alert("Username already exist!!");
 </script>
 <?php
}
}
?>
</body>
</html>