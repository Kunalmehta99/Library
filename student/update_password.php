<?php
include "connection.php";
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <style type="text/css">
    
        body{
            width:1520px;
            height:800px;
            background-color:#E7BA4E;
            

        }
         .wrapper{
            width:450px;
            margin: 40px auto;
            height:460px;
            background-color:black;
            opacity:.8;
            color:white;
            padding:20px;
        }
        .form-control{
            width:300px;
margin-left:60px;        }
    
    </style>
</head>
<body>
<div class="img">
<div class="wrapper">
<div>
<h1 style="text-align: center;font-size: 35px;font-family: lucida Console;color: white;">Library Management System</h1>
<h3 style="text-align: center;font-size: 25px;font-family: lucida Console;color: white;">Change Your Password</h3><br>
</div>
<form action="" method="post">
<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
<input type="password" name="password" class="form-control" placeholder="New Password" required=""><br>
<button class="btn btn-default" type="submit" name="submit" style=" margin-left:170px;">Update</button>
</div>
</div> 
<?php
if(isset($_POST['submit'])){
  if( mysqli_query($db,"UPDATE student SET password='$_POST[password]' WHERE username='$_POST[username]' AND email='$_POST[email]';"))
  {
    ?>
    <script type="text/javascript">
     alert("The Password Updated Successfully!!");
     </script>
     <?php
  }
}
?>   
</body>
</html>