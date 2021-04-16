<?php
 include "connection.php";include "navbar.php";

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit Profile</title>
     <style type="text/css">
     .form-control{
         width:300px;
         height:38px;
     }
     form{
         padding-left:610px
     }
     lable{
         color:white;
     }
     </style>
 </head>
 <body style="background-color:#004528;">
     <h2 style="text-align:center;color:white;">Edit Information</h2>
     <?php
        $sql="SELECT * FROM admin WHERE username='$_SESSION[login_user]'";
        $result= mysqli_query($db,$sql)or die(mysql_error());
        while($row=mysqli_fetch_assoc($result)){
            $first=$row['first'];
            $last=$row['last'];
            $username=$row['username'];
            $password=$row['password'];
            $email=$row['email'];
            $phone=$row['phone'];
        }
      ?>
    
     <div class= "profile_info" style="text-align:center;">
      <h3><span style="color:white;">Welcome</span></h3>
     <h4 style="color:white;"><?php echo $_SESSION['login_user']; ?></h4>
     </div><br>
     <form action=" " method="post" enctype="multipart/form-data">
     <input type="file" name="file" class="form-control">
     <lable><h4><b>First Name:</b></h4></label>
           
           <input class="form-control"  type="text" name="first" value="<?php echo $first;?> "> 
           <lable><h4><b>Last Name :</b></h4></label>
           <input class="form-control"  type="text" name="last" value="<?php echo $last;?> ">
           <lable><h4><b>Username :</b></h4></label>
           <input class="form-control"  type="text" name="username" value="<?php echo $username;?> ">
           <lable><h4><b>Password :</b></h4></label>
           <input class="form-control"  type="text" name="password" value="<?php echo $password;?> ">
           <lable><h4><b>Email :</b></h4></label>
           <input class="form-control"  type="text" name="email" value="<?php echo $email;?> ">
           <lable><h4><b>Phone No. :</b></h4></label>
           <input class="form-control"  type="text" name="phone" value="<?php echo $phone;?> ">
           <br>
           <button style="margin-left:110px;" class="btn btn-default" type="submit"name="submit">Save</button>
</form>
</div>
<?php
 if(isset($_POST['submit'])){

    move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);
            $first=$_POST['first'];
            $last=$_POST['last'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $pic=$_FILES['file']['name'];

    $sql1= "UPDATE admin SET pic='$pic',first='$first',last='$last',username='$username',password='$password',email='$email',phone='$phone'WHERE username='".$_SESSION['login_user']."';";
    if(mysqli_query($db,$sql1)){
        ?>
        <script type="text/javascript">
    alert("Updated successfully!!");
    window.location="profile.php";
   </script>
        <?php
    }
}
?>
 </body>
 </html>