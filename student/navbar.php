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
            <li><a href="fine.php">FINE</a></li>
            </ul>
            
            
            <ul  class="nav navbar-nav navbar-right">
            <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span> &nbsp <span class="badge bg-green">0</span></a></li>
                <li><a href="">
                <div style="color:white;">
            <?php
                echo "<img class='img-circle profile_img' height=42 width=42 src='images/".$_SESSION['pic']."'>";
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
            <li><a href="studentlogin.php"><span class="glyphicon glyphicon-log-in"> LOGIN </span></a></li>
            
            <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP </span></a></li>
        </ul>
            <?php
        }
        ?>

        
    </div>
    </nav>
<?php
if(isset($_SESSION['login_user'])){
$day=0;
$exp='<p style="color:yellow;background-color:red;">EXPIRED</p>';
$res=mysqli_query($db," SELECT `return` from `issue_book` where username='$_SESSION[login_user]'and approve='$exp'  ;");
while($row=mysqli_fetch_assoc($res)){
$d=strtotime($row['return']);            //converts into secs
$c=strtotime(date("Y-m-d"));
$diff=$c-$d;
if($diff>=0){
   
   $day= $day+floor($diff/(60*60*24));     //days

   
}

}
$_SESSION['fine']=$day*.10;
}
?>
</body>
</html>